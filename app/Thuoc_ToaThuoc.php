<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thuoc_ToaThuoc extends Model
{
    protected $table = 'toathuoc_thuoc';
	public $timestamps = false;

    public function ToaThuoc(){
        return $this->hasMany('App\ToaThuoc', 'idToaThuoc', 'id');
    }
    public function Thuoc(){
        return $this->hasMany('App\Thuoc', 'idThuoc', 'id');
    }
}
