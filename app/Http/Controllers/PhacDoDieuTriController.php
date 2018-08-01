<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\PhacDoDieuTri;

class PhacDoDieuTriController extends Controller
{
    public function getDanhSach(){
    	$phacdodieutri = PhacDoDieuTri::all();
    	return view('nhanvienyte.pages.phacdodieutri.danhsach', compact('phacdodieutri'));
    }

    public function getThem(){
    	return view('nhanvienyte.pages.phacdodieutri.them');
    }

    public function postThem(Request $request){
    	$this->validate($request, [
    		'trinhtuthuchien'		=>		'required|
    										 unique:phacdodieutri,TrinhTuThucHien',

    		'tiendohoiphuc'			=>		'required|
    										 numeric',

			'ghichu'				=>		'required'

    	], 
    	[
    		'trinhtuthuchien.required'			=>		'Không được để trống',
    		'trinhtuthuchien.unique'			=>		'Trình tự đã tồn tại',

    		'tiendohoiphuc.required'			=>		'Không được để trống',
    		'tiendohoiphuc.numeric'				=>		'Vui lòng nhập số',

    		'ghichu.required'					=>		'Không được để trống',

    	]);

    	$phacdodieutri = new PhacDoDieuTri;
    	$phacdodieutri->TrinhTuThucHien 		= 		$request->trinhtuthuchien;
    	$phacdodieutri->TienDoHoiPhuc 			= 		$request->tiendohoiphuc;
    	$phacdodieutri->GhiChu 					= 		$request->ghichu;
    	$phacdodieutri->save();

    	return redirect()->route('DanhSachPhacDoDieuTri')->with('success', 'Thêm phác đồ điều trị thành công');
    }

    public function getXoa($id){
    	$phacdodieutri = PhacDoDieuTri::find($id);
    	$phacdodieutri->delete();
    	return redirect()->route('DanhSachPhacDoDieuTri')->with('success', 'Xoá phác đồ điều trị thành công');
    }

    public function getSua($id){
    	$phacdodieutri = PhacDoDieuTri::find($id);
    	return view('nhanvienyte.pages.phacdodieutri.sua', compact('phacdodieutri'));
    }

    public function postSua($id, Request $request){
    	$this->validate($request, [
    		'trinhtuthuchien'		=>		'required|
    										 unique:phacdodieutri,TrinhTuThucHien,'.$id.',id',

    		'tiendohoiphuc'			=>		'required|
    										 numeric',

			'ghichu'				=>		'required'

    	], 
    	[
    		'trinhtuthuchien.required'			=>		'Không được để trống',
    		'trinhtuthuchien.unique'			=>		'Trình tự đã tồn tại',

    		'tiendohoiphuc.required'			=>		'Không được để trống',
    		'tiendohoiphuc.numeric'				=>		'Vui lòng nhập số',

    		'ghichu.required'					=>		'Không được để trống',

    	]);

    	$phacdodieutri = PhacDoDieuTri::find($id);
    	$phacdodieutri->TrinhTuThucHien 		= 		$request->trinhtuthuchien;
    	$phacdodieutri->TienDoHoiPhuc 			= 		$request->tiendohoiphuc;
    	$phacdodieutri->GhiChu 					= 		$request->ghichu;
    	$phacdodieutri->save();

    	return redirect()->route('DanhSachPhacDoDieuTri')->with('success', 'Cập nhật phác đồ điều trị thành công');
    }
}
