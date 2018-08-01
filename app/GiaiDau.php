<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaiDau extends Model
{
    protected $table = 'giaidau';
	public $timestamps = false;

    public function BangXepHang(){
        return $this->hasMany('App\BangXepHang', 'idGiaiDau', 'id');
    }
    public function CauLacBo(){
        return $this->belongsToMany('App\CauLacBo', 'caulacbo_giaidau', 'idCauLacBo', 'idGiaiDau');
    }
}
