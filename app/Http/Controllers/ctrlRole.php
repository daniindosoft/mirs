<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class ctrlRole extends Controller
{
    public static function cekRole()
    {
    	return Auth::user();
    }

    public static function dashboardByRole()
    {
    	/*
    	ROLE
    	1 = KELUARKAN STOK
    	2 = APPROVE
    	3 = APPROVE
    	4 = ORDER & APPROVE
    	5 = RECEIVED & ORDER
    	 */
    	
    	return view('layouts.form_order');
    	
    }
}
