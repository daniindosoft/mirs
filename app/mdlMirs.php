<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mdlMirs extends Model
{
    protected $table = 'mirs';
    
    public function line()
    {
    	return $this->hasMany('App\mdlMirsLine', 'id_mirs', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'request_by', 'id');
    }
}
