<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BangXepHang extends Model
{
    protected $table = 'bangxephangclbgiaidau';
	public $timestamps = false;

    public function GiaiDau(){
        return $this->belongsTo('App\GiaiDau', 'idGiaiDau', 'id');
    }
    public function CauLacBo(){
        return $this->belongsTo('App\CauLacBo', 'idCauLacBo', 'id');
    }
}
