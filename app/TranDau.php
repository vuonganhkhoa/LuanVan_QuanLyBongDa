<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranDau extends Model
{
    protected $table = 'trandau';
	public $timestamps = false;

    public function CauLacBo(){
        return $this->belongsToMany('App\CauLacBo', 'tiso', 'idCauLacBo', 'idTranDau');
    }
    public function TiSo(){
        return $this->hasMany('App\TiSo', 'idTranDau', 'id');
    }
    public function ThanhTichCauThu(){
    	return $this->hasMany('App\ThanhTichCauThu', 'idTranDau', 'id');
    }
    public function DoiHinh(){
        return $this->belongsTo('App\DoiHinh', 'idDoiHinh', 'id');
    }
    public function ChienThuat(){
        return $this->belongsTo('App\ChienThuat', 'idChienThuat', 'id');
    }
}
