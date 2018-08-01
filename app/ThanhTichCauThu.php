<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhTichCauThu extends Model
{
    protected $table = 'thanhtichcauthu';
	public $timestamps = false;

    public function TranDau(){
        return $this->belongsTo('App\TranDau', 'idTranDau', 'id');
    }
    public function CauThu(){
        return $this->belongsTo('App\CauThu', 'idCauThu', 'id');
    }

}
