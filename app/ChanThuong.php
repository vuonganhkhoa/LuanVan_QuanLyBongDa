<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChanThuong extends Model
{
    protected $table = 'chanthuong';
	public $timestamps = false;

    public function ThongTinCauThuChanThuong(){
    	return $this->hasMany('App\ThongTinCauThuChanThuong', 'idChanThuong', 'id');
    }
}
