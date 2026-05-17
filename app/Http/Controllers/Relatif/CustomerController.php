<?php

namespace App\Http\Controllers\Relatif;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $signatures = [
            [
                'id' => 1,
                'title' => 'Kopi Susu Gula Aren',
                'price' => 35000,
                'description' => 'Our signature blend with rich espresso, creamy milk, and deep, caramel-like palm sugar.',
                'image' => 'https://images.unsplash.com/photo-1541167760496-1628856ab772?auto=format&fit=crop&q=80&w=600'
            ],
            [
                'id' => 2,
                'title' => 'Obsidian Black',
                'price' => 40000,
                'description' => 'Pure, unadulterated single-origin filter. Notes of dark chocolate and black cherry.',
                'image' => 'https://images.unsplash.com/photo-1497034825429-c343d7c6a68f?auto=format&fit=crop&q=80&w=600'
            ],
            [
                'id' => 3,
                'title' => 'V60 Ethiopia',
                'price' => 45000,
                'description' => 'Delicate and floral single-origin pour-over with notes of jasmine, bergamot, and sweet peach.',
                'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?auto=format&fit=crop&q=80&w=600'
            ]
        ];

        return view('relatif.customer.menu', compact('signatures'));
    }

    public function cart()
    {
        $cartItems = [
            [
                'id' => 1,
                'title' => 'Kopi Susu Gula Aren',
                'price' => 35000,
                'qty' => 2,
                'options' => 'Less Ice, Normal Sugar',
                'image' => 'https://images.unsplash.com/photo-1541167760496-1628856ab772?auto=format&fit=crop&q=80&w=600'
            ],
            [
                'id' => 3,
                'title' => 'V60 Ethiopia',
                'price' => 45000,
                'qty' => 1,
                'options' => 'Hot',
                'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?auto=format&fit=crop&q=80&w=600'
            ]
        ];

        return view('relatif.customer.cart', compact('cartItems'));
    }

    public function payment()
    {
        $defaultTotal = 102120; // Rp 102.120 matching Figma exactly
        $defaultMethod = 'QRIS';
        return view('relatif.customer.payment', compact('defaultTotal', 'defaultMethod'));
    }

    public function orders()
    {
        $defaultOrder = [
            'order_number' => '#ORD-4829',
            'amount_paid' => 102120, // Rp 102.120 matching the Figma design total exactly!
            'items' => [
                ['qty' => 2, 'title' => 'Cortado', 'options' => 'Oat Milk'],
                ['qty' => 1, 'title' => 'Almond Croissant', 'options' => 'Warm']
            ],
            'status' => 'Being Prepared by Barista',
            'est_time' => '5 Min'
        ];

        return view('relatif.customer.orders', compact('defaultOrder'));
    }
}
