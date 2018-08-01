<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaoTrinh_LuyenTap_CauThu extends Model
{
    protected $table = 'giaotrinh_luyentap_cauthu';
    protected $casts = [
        'attendees' => 'array',
    ];
	public $timestamps = false;

	public function CauThu(){
        return $this->belongsTo('App\CauThu', 'idCauThu', 'id');
    }
    public function GiaoTrinhTap(){
        return $this->belongsTo('App\GiaoTrinhTap', 'idGiaoTrinhTap', 'id');
    }
    public function LichLuyenTap(){
        return $this->belongsTo('App\LichLuyenTap', 'idLichLuyenTap', 'id');
    }
}
