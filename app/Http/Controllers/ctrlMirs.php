<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\mdlMirs;
use App\mdlMirsLine;

class ctrlMirs extends Controller
{
    public function store(Request $req)
    {
        $date = date('Y-m-d h:i:s');

        $save = new mdlMirs();
        $save->no_mirs = 'mirs'.date('Ymdhis');
        $save->date = $date;
        $save->divisi = Auth::user()->id_divisi;
        $save->request_by = $date. '|' .Auth::user()->id;

        $save->save();


    }
}
