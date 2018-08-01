<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichLuyenTap extends Model
{
    protected $table = 'lichluyentap';
	public $timestamps = false;

	public function GiaoTrinh_LuyenTap_CauThu(){
        return $this->hasMany('App\GiaoTrinh_LuyenTap_CauThu', 'idLichLuyenTap', 'id');
    }
}
