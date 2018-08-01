<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoiHinh extends Model
{
    protected $table = 'doihinh';
	public $timestamps = false;

    public function TranDau(){
        return $this->hasMany('App\TranDau', 'idDoiHinh', 'id');
    }
    public function ViTri(){
        return $this->belongsToMany('App\ViTri', 'vitri_doihinh', 'idViTri', 'idDoiHinh');
    }
}
