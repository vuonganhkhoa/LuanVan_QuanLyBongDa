<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ChanThuong;

class ChanThuongController extends Controller
{
    public function getDanhSach(){
    	$chanthuong = ChanThuong::all();
    	return view('nhanvienyte.pages.chanthuong.danhsach', compact('chanthuong'));
    }

    public function getThem(){
    	return view('nhanvienyte.pages.chanthuong.them');
    }

    public function postThem(Request $request){
    	$this->validate($request, [
    		'tenchanthuong'		=>		'required|
    									 unique:chanthuong,TenChanThuong|
    									 regex:/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/'

    	], 
    	[
    		'tenchanthuong.required'		=>		'Không được để trống',
    		'tenchanthuong.unique'			=>		'Tên chấn thương đã tồn tại',
    		'tenchanthuong.regex'			=>		'Vui lòng nhập chữ và số',
    	]);

    	$chanthuong = new ChanThuong;
    	$chanthuong->TenChanThuong 				= 		$request->tenchanthuong;
    	$chanthuong->PhanLoaiChanThuong 		= 		$request->phanloaichanthuong;
    	$chanthuong->ThoiGianHoiPhuc 			= 		$request->thoigianhoiphuc;
    	$chanthuong->save();

    	return redirect()->route('DanhSachChanThuong')->with('success', 'Thêm chấn thương thành công');
    }

    public function getXoa($id){
    	$chanthuong = ChanThuong::find($id);
    	$chanthuong->delete();
    	return redirect()->route('DanhSachChanThuong')->with('success', 'Xoá chấn thương thành công');
    }

    public function getSua($id){
    	$chanthuong = ChanThuong::find($id);
    	return view('nhanvienyte.pages.chanthuong.sua', compact('chanthuong'));
    }

    public function postSua($id, Request $request){
    	$this->validate($request, [
    		'tenchanthuong'		=>		'required|
    									 unique:chanthuong,TenChanThuong,'.$id.',id|
    									 regex:/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/'

    	], 
    	[
    		'tenchanthuong.required'		=>		'Không được để trống',
    		'tenchanthuong.unique'			=>		'Tên chấn thương đã tồn tại',
    		'tenchanthuong.regex'			=>		'Vui lòng nhập chữ và số',
    	]);

    	$chanthuong = ChanThuong::find($id);
    	$chanthuong->TenChanThuong 				= 		$request->tenchanthuong;
    	$chanthuong->PhanLoaiChanThuong 		= 		$request->phanloaichanthuong;
    	$chanthuong->ThoiGianHoiPhuc 			= 		$request->thoigianhoiphuc;
    	$chanthuong->save();

    	return redirect()->route('DanhSachChanThuong')->with('success', 'Cập nhật chấn thương thành công');
    }
}
