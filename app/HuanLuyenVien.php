<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HuanLuyenVien extends Model
{
    protected $table = 'huanluyenvien';
	public $timestamps = false;

    public function NguoiDung(){
        return $this->belongsTo('App\NguoiDung', 'idNguoiDung', 'id');
    }
}
