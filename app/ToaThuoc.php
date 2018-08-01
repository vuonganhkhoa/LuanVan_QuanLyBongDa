<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToaThuoc extends Model
{
    protected $table = 'toathuoc';
	public $timestamps = false;

    public function LichKham(){
        return $this->belongsTo('App\LichKham', 'idLichKham', 'id');
    }
    public function Thuoc_ToaThuoc(){
        return $this->belongsTo('App\Thuoc_ToaThuoc', 'idToaThuoc', 'id');
    }
    public function Thuoc(){
    	return $this->belongsToMany('App\Thuoc', 'toathuoc_thuoc', 'idThuoc', 'idToaThuoc');
    }
}
