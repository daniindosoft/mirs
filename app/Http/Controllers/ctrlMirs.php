<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\mdlMirs;
use App\mdlApprovedHistory;
use App\mdlMirsLine;
use App\mdlHirarkiLine;

class ctrlMirs extends Controller
{
    public function store(Request $req)
    {
        $date = date('Y-m-d h:i:s');

        $save = new mdlMirs();
        $save->no_mirs = 'mirs'.date('Ymdhis');
        $save->date = $date;
        $save->divisi = Auth::user()->id_divisi;
        $save->request_by = Auth::user()->id;

        $save->save();

        for ($i = 0; $i < count($req->qty); $i++) {
            $line = new mdlMirsLine;
            $line->id_mirs = $save->id;
            $line->id_zmm = $req->material_code[$i];
            $line->chargeto_id = $req->chargeto[$i];
            $line->qty = $req->qty[$i];
            $line->account_id = $req->account[$i];
            $line->ttl_amount = $req->ttlamount[$i];
            $line->save();
        }

    }
    public function getSingleMirs($id)
    {
        $master = mdlMirsLine::where('id_mirs', $id)->get();
        $data ='';
        foreach ($master as $mirsLine) {
            if (Auth::user()->divisi->level_access == 5) {
                $store = '<input type="number" name="qty[]" value="'.$mirsLine->qty_approved.'" class="custom-input" placeholder="Masukan QTY">';
            }else{
                $store = '<small>
                                Di isi oleh Store
                            </small>';
            }
            $data .= "
                <tr>
                    <td class='tg-0lax'>
                    <input type='hidden' name='line[]' value='".$mirsLine->id."'>
                        ".$mirsLine->zmm->material_code."
                    </td>
                    <td class='tg-0lax'>
                        ".$mirsLine->zmm->deskripsi."
                    </td>
                    <td class='tg-0lax'>
                        ".$mirsLine->block->block."
                    </td>
                    <td class='tg-0lax'>
                        ".$mirsLine->qty."
                    </td>
                    <td class='tg-0lax'>
                        ".$mirsLine->zmm->uom."
                    </td>
                    <td class='tg-0lax'>
                        ".$store."
                    </td>
                    <td class='tg-0lax'>
                        ".$mirsLine->block->ha."
                    </td>
                    <td class='tg-0lax'>
                        ".$mirsLine->qty/$mirsLine->block->ha."
                    </td>
                    <td class='tg-0lax'>
                        ".$mirsLine->zmm->begin."
                    </td>
                    <td class='tg-0lax'>
                        ".$mirsLine->zmm->end."
                    </td>
                    <td class='tg-0lax'>
                        ".$mirsLine->zmm->price."
                    </td>
                    <td class='tg-0lax'>
                        ".$mirsLine->zmm->price*$mirsLine->qty."
                    </td>
                    <td class='tg-0lax'>
                        ".$mirsLine->gl->kode."
                    </td>
                    <td class='tg-0lax'>".$mirsLine->gl->deskripsi."</td>
                </tr>";
        }
        
        $hirarkiQueryMaster = mdlHirarkiLine::join('users as u', 'hirarki_line.id_karyawan','u.id')
            ->join('divisi as d', 'd.id', 'u.id_divisi')
            ->where('id_hirarki', Auth::user()->id_hirarki->id_hirarki);

        $hirarkiQuery = $hirarkiQueryMaster->orderBy('d.level_access','asc')->get();
        $hirarki ='';
        $stt = 0;
        foreach ($hirarkiQuery as $hir) {
            $status = mdlApprovedHistory::where('user_id',$hir->user->id)->where('id_mirs', $id)->orderBy('id', 'desc')->limit(1)->get();
            // echo "<pre>";
            // var_dump($status['user_id']);
            // echo "</pre>";
            // if ($status['status'] == 1) {
            //     $badgeStatus = '<b class="green">Approved </b>';
            // }else{
            //     $badgeStatus = '<b class="red">Not Approved </b>';
            // }
                $css = '';
                if ($status->count() >= 1) {
                    if ($hir->user->id == Auth::user()->id) {
                        $stt = 1;
                    }
                    foreach ($status as $s) {
                        if ($s->status == 0) {
                            $badgeStatus = '<b class="green cursor-pointer" onclick="return alert(`'.$hir->user->nama_lengkap.' : '.$s->komentar.'`)">Approved </b>';
                        }else{
                            $badgeStatus = '<b class="red cursor-pointer" onclick="return alert(`'.$hir->user->nama_lengkap.' Tidak Menyetujui Karena : '.$s->komentar.'`)">Not Approved </b>';
                        }
                    }
                }else{
                    $badgeStatus = '<b class="blue">Belum Di Proses</b>';
                    $css = 'pending';
                }
            
            $hirarki .= '
                 <span class="'.$css.'"> <b>'.$hir->user->divisi->nama_divisi.'</b> - '.$hir->user->nama_lengkap.' '.$badgeStatus.'</span> &nbsp;&nbsp;
             ';
        }
                // <span> FO - Dani s <b class="red">Tidak Setuju </b></span> <i class="fa fa-arrow-right"></i>
                // <span> DM - Dani s </span> <i class="fa fa-arrow-right"></i>
                // <span> EM - Dani s </span> <i class="fa fa-arrow-right"></i>
                // <span>SK/KERANI - Dani s </span>
        $type ='';
        if (Auth::user()->divisi->level_access == 5) {
            $type ='<input type="hidden" name="sk" value="1">';
        }
        
        $tableData = $type.'
        <input name="id_mirs" value="'.$id.'" type="hidden">
        <hr>
        <label>Request By</label> <b> : '.mdlMirs::find($id)->user->nama_lengkap.'</b><br>
        <label>Tanggal Pengajuan</label> <b> : '.mdlMirs::find($id)->date.'</b><br>
        <label>No Mirs</label> <b> : '.mdlMirs::find($id)->no_mirs.'</b>
        <br>
        <label>STATUS : </label>
        <div class="hirarki">
            '.$hirarki.'</span>
        </div>
        
        <br>
        <hr>
        <div style="width:100%; overflow-x: scroll;">

        <table class="tg">
            <thead>
              <tr>
                <th class="tg-9wq8" rowspan="2">MATERIAL CODE</th>
                <th class="tg-9wq8" rowspan="2">DESCRIPTION</th>
                <th class="tg-baqh" colspan="3">REQUESTION</th>
                <th class="tg-baqh" colspan="3">ISSUE QTY</th>
                <th class="tg-baqh" colspan="2">STOCK</th>
                <th class="tg-baqh" colspan="4">FOR ACCOUNT DEPT</th>
              </tr>
              <tr>
                <th class="tg-0lax">CHARGE TO</th>
                <th class="tg-0lax">QTY</th>
                <th class="tg-0lax">UOM</th>
                <th class="tg-0lax">
                    QTY
                </th>
                <th class="tg-0lax">Luas Ha</th>
                <th class="tg-0lax">Dosage</th>
                <th class="tg-0lax">BEGIN</th>
                <th class="tg-0lax">END</th>
                <th class="tg-0lax">PRICE</th>
                <th class="tg-0lax">TTL AMOUNT</th>
                <th class="tg-0lax">ACCOUNT</th>
                <th class="tg-0lax">REMARKS</th>
              </tr>
            </thead>
            <tbody>
                '.$data.'
            </tbody>
        </table>
        </div>
        <br>
            <div class="row approved-mirs">
              <div class="col s3">
                <p>
                  <label>Pilih Status :</label><br>
                  <input name="status" type="radio" value="0" id="approved" checked />
                  <label for="approved">Approved</label>
               
                  <input name="status" type="radio" value="1" id="notapproved" />
                  <label for="notapproved">Not Approved</label>
                </p>
              </div>
              <div class="col s9">
                <label>Catatan/Komentar :</label>
                <textarea name="komen" placeholder="isikan bagian ini sesuai kebutuhan"></textarea>
              </div>
            </div>
        ';

        return ['data' => $tableData, 'status' => $stt];
    }
    public function approved(Request $req)
    {
        
        $approved = new mdlApprovedHistory();
        $approved->id_mirs = $req->id_mirs;
        $approved->status = $req->status;
        $approved->komentar = $req->komen;
        $approved->user_id = Auth::user()->id;
        $approved->save();

        if ($req->sk == 1 && $req->status == 0) {
            for ($i=0; $i < count($req->line); $i++) { 
                $mirs = mdlMirsLine::find($req->line[$i]);
                $mirs->qty_approved = $req->qty[$i];
                $mirs->save();
            }
        }
    }
}
