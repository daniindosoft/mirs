<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mdlMirsLine extends Model
{
    protected $table = 'mirs_line';
	
	public function zmm()
    {
    	return $this->hasOne('App\mdlMaterial', 'id', 'id_zmm');
    }

    public function block()
    {
    	// ke blok
    	return $this->hasOne('App\mdlBlock', 'id', 'chargeto_id');
    }

    public function gl()
    {
    	return $this->hasOne('App\mdlGl', 'id', 'account_id');
    }
}
