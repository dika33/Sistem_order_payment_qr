from fastapi import FastAPI, HTTPException, Request
from fastapi.middleware.cors import CORSMiddleware
from supabase import create_client, Client
from dotenv import load_dotenv
from pydantic import BaseModel
from typing import List, Optional
import os
import midtransclient

load_dotenv()

SUPABASE_URL = os.getenv("SUPABASE_URL")
SUPABASE_KEY = os.getenv("SUPABASE_KEY")
MIDTRANS_SERVER_KEY = os.getenv("MIDTRANS_SERVER_KEY")
MIDTRANS_CLIENT_KEY = os.getenv("MIDTRANS_CLIENT_KEY")
MIDTRANS_IS_PRODUCTION = os.getenv("MIDTRANS_IS_PRODUCTION", "False") == "True"

snap = midtransclient.Snap(
    is_production=MIDTRANS_IS_PRODUCTION,
    server_key=MIDTRANS_SERVER_KEY
)

supabase: Client = create_client(SUPABASE_URL, SUPABASE_KEY)

app = FastAPI()

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

class OrderItem(BaseModel):
    menu_id: int
    quantity: int

class OrderCreate(BaseModel):
    table_id: int
    customer_name: Optional[str] = "Guest"
    is_member: Optional[bool] = False
    items: List[OrderItem]

class StaffLogin(BaseModel):
    employee_id: str
    pin: str

@app.get("/")
def root():
    return {"message": "FastAPI Backend Running!"}

@app.get("/menus")
def get_menus():
    try:
        result = supabase.table("menus").select("*").eq("is_available", True).execute()
        return {"status": "success", "data": result.data}
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

@app.get("/menus/{category}")
def get_menus_by_category(category: str):
    try:
        result = supabase.table("menus").select("*").eq("category", category).eq("is_available", True).execute()
        return {"status": "success", "data": result.data}
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

@app.post("/orders")
def create_order(order: OrderCreate):
    try:
        total = 0
        order_items = []

        for item in order.items:
            menu = supabase.table("menus").select("*").eq("id", item.menu_id).execute()
            if not menu.data:
                raise HTTPException(status_code=404, detail=f"Menu id {item.menu_id} tidak ditemukan")
            
            menu_data = menu.data[0]
            subtotal = menu_data["price"] * item.quantity
            total += subtotal
            order_items.append({
                "menu_id": item.menu_id,
                "quantity": item.quantity,
                "price": menu_data["price"],
                "subtotal": subtotal
            })

        discount = total * 0.20 if order.is_member else 0
        taxable = total - discount
        tax = taxable * 0.11
        grand_total = taxable + tax

        new_order = supabase.table("orders").insert({
            "table_id": order.table_id,
            "customer_name": order.customer_name,
            "total_amount": grand_total,
            "tax_amount": tax,
            "discount_amount": discount,
            "status": "pending",
            "payment_status": "unpaid"
        }).execute()


        order_id = new_order.data[0]["id"]

        for item in order_items:
            item["order_id"] = order_id
            supabase.table("order_items").insert(item).execute()

        return {
            "status": "success",
            "order_id": order_id,
            "total": grand_total,
            "tax": tax
        }

    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

@app.get("/orders/{order_id}")
def get_order(order_id: int):
    try:
        order = supabase.table("orders").select("*").eq("id", order_id).execute()
        if not order.data:
            raise HTTPException(status_code=404, detail="Order tidak ditemukan")
        
        items = supabase.table("order_items").select("*").eq("order_id", order_id).execute()
        
        return {
            "status": "success",
            "order": order.data[0],
            "items": items.data
        }
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

@app.post("/orders/{order_id}/pay")
def create_payment(order_id: int):
    try:
        order = supabase.table("orders").select("*").eq("id", order_id).execute()
        if not order.data:
            raise HTTPException(status_code=404, detail="Order tidak ditemukan")
        
        order_data = order.data[0]
        
        transaction = snap.create_transaction({
            "transaction_details": {
                "order_id": f"ORDER-{order_id}",
                "gross_amount": int(order_data["total_amount"])
            },
            "credit_card": {
                "secure": True
            }
        })

        supabase.table("orders").update({
            "midtrans_token": transaction["token"]
        }).eq("id", order_id).execute()

        return {
            "status": "success",
            "token": transaction["token"],
            "redirect_url": transaction["redirect_url"]
        }

    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

@app.post("/orders/{order_id}/webhook")
async def payment_webhook(order_id: int, request: Request):
    try:
        body = await request.json()
        transaction_status = body.get("transaction_status")
        
        if transaction_status in ["capture", "settlement"]:
            supabase.table("orders").update({
                "payment_status": "paid",
                "status": "preparing"
            }).eq("id", order_id).execute()
        elif transaction_status in ["cancel", "deny", "expire"]:
            supabase.table("orders").update({
                "payment_status": "failed"
            }).eq("id", order_id).execute()

        return {"status": "ok"}
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    
    
@app.post("/staff/login")
def staff_login(data: StaffLogin):
    try:
        staff = supabase.table("staff").select("*").eq("employee_id", data.employee_id.upper()).eq("pin", data.pin).eq("is_active", True).execute()
        
        if not staff.data:
            raise HTTPException(status_code=401, detail="Employee ID atau PIN salah!")
        
        staff_data = staff.data[0]
        
        return {
            "status": "success",
            "staff": {
                "id": staff_data["id"],
                "employee_id": staff_data["employee_id"],
                "name": staff_data["name"],
                "role": staff_data["role"]
            }
        }
    except HTTPException:
        raise
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))