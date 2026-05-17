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
}
