<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauLacBo extends Model
{
    protected $table = 'caulacbo';
	public $timestamps = false;

    public function BangXepHang(){
        return $this->hasMany('App\BangXepHang', 'idCauLacBo', 'id');
    } 
    public function GiaiDau(){
        return $this->belongsToMany('App\GiaiDau', 'caulacbo_giaidau', 'idCauLacBo', 'idGiaiDau');
    }
    public function TranDau(){
        return $this->belongsToMany('App\TranDau', 'tiso', 'idCauLacBo', 'idTranDau');
    }
    public function TiSo(){
        return $this->hasMany('App\TiSo', 'idCauLacBo', 'id');
    } 
    public function BangXepHangCLB(){
        return $this->hasOne('App\BangXepHangCLB', 'idCauLacBo', 'id');
    }
}
