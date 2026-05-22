<?php
namespace App\Http\Controllers\Relatif;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
{
    protected $fastapiUrl = 'http://127.0.0.1:8001';

    public function index()
    {
        try {
            $response = Http::get("{$this->fastapiUrl}/menus");
            $menus = $response->json()['data'];
            
            // Kelompokin menu by category
            $menusByCategory = collect($menus)->groupBy('category');
        } catch (\Exception $e) {
            $menusByCategory = collect([]);
        }

        return view('relatif.customer.menu', compact('menusByCategory'));
    }

    public function cart()
    {
        return view('relatif.customer.cart', ['cartItems' => []]);
    }

    public function payment()
    {
        $defaultTotal = 102120;
        $defaultMethod = 'QRIS';
        return view('relatif.customer.payment', compact('defaultTotal', 'defaultMethod'));
    }

    public function orders()
    {
        $defaultOrder = [
            'order_number' => '#ORD-4829',
            'amount_paid' => 102120,
            'items' => [
                ['qty' => 2, 'title' => 'Cortado', 'options' => 'Oat Milk'],
                ['qty' => 1, 'title' => 'Almond Croissant', 'options' => 'Warm']
            ],
            'status' => 'Being Prepared by Barista',
            'est_time' => '5 Min'
        ];
        return view('relatif.customer.orders', compact('defaultOrder'));
    }

    public function scanTable($table_number)
    {
    // Simpan table number di session
    session(['table_number' => $table_number]);
    
    // Redirect ke menu
    return redirect()->route('relatif.menu');
    }
}