<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaoTrinhTap extends Model
{
    protected $table = 'giaotrinhtap';
	public $timestamps = false;

	public function GiaoTrinh_LuyenTap_CauThu(){
        return $this->hasMany('App\GiaoTrinh_LuyenTap_CauThu', 'idGiaoTrinhTap', 'id');
    }
}
