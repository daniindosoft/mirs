<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function divisi() { 
      return $this->hasOne('App\mdlDivisi', 'id', 'id_divisi'); 
    }

    public function id_hirarki()
    {
        return $this->belongsTo('App\mdlHirarkiLine', 'id', 'id_karyawan');
        // return $this->belongsTo('App\User', 'request_by', 'id');

    }
}
