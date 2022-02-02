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
    	5 = KELUARKAN STOK
    	4 = APPROVE
    	3 = APPROVE
    	2 = ORDER & APPROVE
    	1 = RECEIVED & ORDER
    	 */
    	
    	return view('layouts.form_order');
    	
    }
}
