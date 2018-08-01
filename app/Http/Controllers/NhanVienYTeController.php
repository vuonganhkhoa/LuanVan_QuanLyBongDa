<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NhanVienYTeController extends Controller
{
    public function getIndex(){
    	return view('nhanvienyte.pages.trangchu');
    }
}
