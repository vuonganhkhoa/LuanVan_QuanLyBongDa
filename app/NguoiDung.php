<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NguoiDung extends Authenticatable
{
	use Notifiable;

	protected $table = 'nguoidung';
	public $timestamps = false;

    public function HuanLuyenVien(){
        return $this->hasOne('App\HuanLuyenVien', 'idNguoiDung', 'id');
    }
    public function CauThu(){
         return $this->hasOne('App\CauThu', 'idNguoiDung', 'id');
     }
}