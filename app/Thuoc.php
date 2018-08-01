<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thuoc extends Model
{
    protected $table = 'thuoc';
	public $timestamps = false;


    public function Thuoc_ToaThuoc(){
        return $this->belongsTo('App\Thuoc_ToaThuoc', 'idThuoc', 'id');
    }
    public function ToaThuoc(){
    	return $this->belongsToMany('App\ToaThuoc', 'toathuoc_thuoc', 'idThuoc', 'idToaThuoc');
    }
}
