<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChienThuat extends Model
{
    protected $table = 'chienthuat';
	public $timestamps = false;

    public function TranDau(){
        return $this->hasMany('App\TranDau', 'idChienThuat', 'id');
    }
}
