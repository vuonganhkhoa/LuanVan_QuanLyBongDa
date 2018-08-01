<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiSo extends Model
{
    protected $table = 'tiso';
	public $timestamps = false;

	public function CauLacBo(){
        return $this->belongsTo('App\CauLacBo', 'idCauLacBo', 'id');
    }
    public function TranDau(){
        return $this->belongsTo('App\TranDau', 'idTranDau', 'id');
    }
    public function GiaiDau(){
        return $this->belongsTo('App\GiaiDau', 'idGiaiDau', 'id');
    }     
}
