<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BangXepHangCLB extends Model
{
    protected $table = 'bangxephangclb';
	public $timestamps = false;

	public function CauLacBo(){
        return $this->belongsTo('App\CauLacBo', 'idCauLacBo', 'id');
    }
}
