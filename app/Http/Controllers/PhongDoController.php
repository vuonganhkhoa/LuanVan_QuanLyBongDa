<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\PhongDo;
use App\PhongDo_CauThu;

class PhongDoController extends Controller
{
    public function getDanhSach(){
    	$phongdo = PhongDo::orderBy('ChiSoPhongDo', 'DESC')->get();
    	return view('admin.pages.phongdo.danhsach', compact('phongdo'));
    }

    public function getThem(){
    	return view('admin.pages.phongdo.them');
    }

    public function postThem(Request $request){
    	$this->validate($request, [
    		'chisophongdo'			=>		'required|unique:phongdo,ChiSoPhongDo',
    	], 
    	[
    		'chisophongdo.required'       =>		'Không được bỏ trống',
    		'chisophongdo.unique'		  =>		'Chỉ số phong độ đã tồn tại',
    	]);

    	$phongdo = new PhongDo();
    	$phongdo->ChiSoPhongDo 	= 	$request->chisophongdo;

    	$phongdo->save();

    	return redirect()->route('DanhSachPhongDo')->with('success','Thêm phong độ thành công');
    }

    public function getXoa($id){
        $phongdo_cauthu = PhongDo_CauThu::all();
        $phongdo = PhongDo::find($id);

        foreach($phongdo_cauthu as $pdct){
            if($phongdo->id == $pdct->idPhongDo){
                return redirect()->route('DanhSachPhongDo')->with('error','Phong độ được sở hữu bởi cầu thủ');
            }
        }

        $phongdo->delete();
        return redirect()->route('DanhSachPhongDo')->with('success','Xoá phong độ thành công');
    }

    public function getSua($id){
    	$phongdo = PhongDo::find($id);
    	return view('admin.pages.phongdo.sua', compact('phongdo'));
    }

    public function postSua($id, Request $request){
    	$this->validate($request, [
    		'chisophongdo'			=>		'required|unique:phongdo,ChiSoPhongDo,'.$id.',id',
    	], 
    	[
    		'chisophongdo.required'	=>		'Không được bỏ trống',
            'chisophongdo.unique'         =>        'Chỉ số phong độ đã tồn tại',
    	]);

    	$phongdo = PhongDo::find($id);
    	$phongdo->ChiSoPhongDo 	= 	$request->chisophongdo;

    	$phongdo->save();

    	return redirect()->route('DanhSachPhongDo')->with('success','Cập nhật phong độ thành công');
    }
}
