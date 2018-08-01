<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongTinCauThuChanThuong extends Model
{
    protected $table = 'thongtinchanthuong_cauthu';
	public $timestamps = false;

    public function CauThu(){
        return $this->belongsTo('App\CauThu', 'idCauThu', 'id');
    }
    public function ChanThuong(){
        return $this->belongsTo('App\ChanThuong', 'idChanThuong', 'id');
    }
    public function PhacDoDieuTri(){
        return $this->hasOne('App\PhacDoDieuTri', 'idPhacDoDieuTri', 'id');
    }
}
