<?php

namespace App\Http\Controllers\Relatif;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function login()
    {
        return view('relatif.staff.login');
    }

    public function dashboard()
    {
        $activeOrders = [
            [
                'order_number' => '#ORD-4921',
                'table' => '02',
                'amount_paid' => 70000,
                'payment_method' => 'QRIS',
                'items' => [
                    ['qty' => 2, 'title' => 'Kopi Susu Gula Aren', 'options' => 'Less Ice, Normal Sugar']
                ],
                'status' => 'Pending',
                'est_time' => '10 Min'
            ],
            [
                'order_number' => '#ORD-4829',
                'table' => '04',
                'amount_paid' => 102120,
                'payment_method' => 'CARD',
                'items' => [
                    ['qty' => 2, 'title' => 'Cortado', 'options' => 'Oat Milk'],
                    ['qty' => 1, 'title' => 'Almond Croissant', 'options' => 'Warm']
                ],
                'status' => 'Preparing',
                'est_time' => '5 Min'
            ]
        ];

        return view('relatif.staff.dashboard', compact('activeOrders'));
    }
}
