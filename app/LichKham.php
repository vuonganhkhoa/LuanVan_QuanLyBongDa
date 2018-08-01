<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichKham extends Model
{
    protected $table = 'lichkham';
	public $timestamps = false;

    public function PhacDoDieuTri(){
        return $this->belongsTo('App\PhacDoDieuTri', 'idLichKham', 'id');
    }
    public function ToaThuoc(){
        return $this->hasOne('App\ToaThuoc', 'idLichKham', 'id');
    }
}
