<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mdlApprovedHistory extends Model
{
    protected $table = 'approve_history';
    // public function user()
    // {
    //     return $this->belongsTo('App\User', 'id_karyawan', 'id');
    // }

    // public function hirarki()
    // {
    //     return $this->belongsTo('App\mdlHirarki', 'id_hirarki', 'id');
    // }
}
