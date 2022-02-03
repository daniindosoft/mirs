<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\User;
use App\mdlMirs;
use App\mdlApprovedHistory;

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

    public static function persetujuan()
    {
        $id = Auth::user()->id;
        $idHirarki = User::join('hirarki_line as hl','hl.id_karyawan','users.id')->where('users.id',$id)->first();
        
        //$persetujuan = DB::select('SELECT * FROM mirs as m inner join hirarki_line as hl on hl.id_karyawan = m.request_by where m.request_by <> '.$id.' and hl.id_hirarki = '.$idHirarki->id_hirarki);
        $persetujuan = mdlMirs::select('*','mirs.id as idnya')->join('hirarki_line as hl', 'hl.id_karyawan', 'mirs.request_by')
        ->where('mirs.request_by', '<>', $id)
        ->where('hl.id_hirarki', $idHirarki->id_hirarki)->get();

        return $persetujuan;
    }

    public static function getStatusMirs($id)
    {   
        $status = mdlApprovedHistory::where('user_id',Auth::user()->id)->where('id_mirs', $id)->orderBy('id', 'desc')->get();
        
        if ($status->count() >= 1) {
            foreach ($status as $s) {
                if ($s->status == 0) {
                    $badgeStatus = '<label></label><br><b class="green badge">Approved </b> <br><label>Oleh Anda</label>';
                }else{
                    $badgeStatus = '<label></label><br><b class="red badge">Not Approved </b> <br><label>Oleh Anda</label>';
                }
            }
        }else{
            $badgeStatus = '<b class="blue badge">Perlu di Proses</b>';
        }

        return $badgeStatus;
    }
}
