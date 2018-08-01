<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Thuoc;

class ThuocController extends Controller
{
    public function getDanhSach(){
    	$thuoc = Thuoc::all();
    	return view('nhanvienyte.pages.thuoc.danhsach', compact('thuoc'));
    }

    public function getThem(){
    	return view('nhanvienyte.pages.thuoc.them');
    }

    public function postThem(Request $request){
    	$this->validate($request, [
    		'tenthuoc'		=>		'required|
									 unique:thuoc,TenThuoc|
									 regex:/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

			'ghichu'		=>		'required'

    	], 
    	[
    		'tenthuoc.required'			=>		'Không được để trống',
    		'tenthuoc.unique'			=>		'Tên chấn thương đã tồn tại',
    		'tenthuoc.regex'			=>		'Vui lòng nhập chữ và số',

    		'ghichu.required'			=>		'Không được để trống',

    	]);

    	$thuoc = new Thuoc;
    	$thuoc->TenThuoc 		= 		$request->tenthuoc;
    	$thuoc->GhiChu 			= 		$request->ghichu;
    	$thuoc->save();

    	return redirect()->route('DanhSachThuoc')->with('success', 'Thêm thuốc thành công');
    }

    public function getXoa($id){
    	$thuoc = Thuoc::find($id);
    	$thuoc->delete();
    	return redirect()->route('DanhSachThuoc')->with('success', 'Xoá thuốc thành công');
    }

    public function getSua($id){
    	$thuoc = Thuoc::find($id);
    	return view('nhanvienyte.pages.thuoc.sua', compact('thuoc'));
    }

    public function postSua($id, Request $request){
    	$this->validate($request, [
    		'tenthuoc'		=>		'required|
									 unique:thuoc,TenThuoc,'.$id.',id|
									 regex:/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

			'ghichu'		=>		'required'

    	], 
    	[
    		'tenthuoc.required'			=>		'Không được để trống',
    		'tenthuoc.unique'			=>		'Tên chấn thương đã tồn tại',
    		'tenthuoc.regex'			=>		'Vui lòng nhập chữ và số',

    		'ghichu.required'			=>		'Không được để trống',

    	]);

    	$thuoc = Thuoc::find($id);
    	$thuoc->TenThuoc 		= 		$request->tenthuoc;
    	$thuoc->GhiChu 			= 		$request->ghichu;
    	$thuoc->save();

    	return redirect()->route('DanhSachThuoc')->with('success', 'Cập nhật thuốc thành công');
    }
}
