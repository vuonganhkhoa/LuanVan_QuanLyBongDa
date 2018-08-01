<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongBao extends Model
{
    protected $table = 'thongbao';
    public $timestamps = false;
    
    public function NguoiDung(){
        return $this->belongsTo('App\NguoiDung', 'idNguoiGui', 'id');
    }
}
