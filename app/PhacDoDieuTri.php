<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhacDoDieuTri extends Model
{
    protected $table = 'phacdodieutri';
	public $timestamps = false;

    public function ThongTinCauThuChanThuong(){
        return $this->belongsTo('App\ThongTinCauThuChanThuong', 'idPhacDoDieuTri', 'id');
    }
    public function LichKham(){
        return $this->hasMany('App\LichKham', 'idLichKham', 'id');
    }
}
