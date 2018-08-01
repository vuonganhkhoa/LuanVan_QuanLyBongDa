<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\VaiTro;
use App\VaiTro_CauThu;
use App\VaiTro_CauThu_TranDau;

class VaiTroController extends Controller
{
    public function getDanhSach(){
    	$vaitro = VaiTro::all();
    	return view('admin.pages.vaitro.danhsach', compact('vaitro'));
    }

    public function getThem(){
    	return view('admin.pages.vaitro.them');
    }

    public function postThem(Request $request){
    	$this->validate($request, [
    		'tenvaitro'				=>		'required|
                                             unique:vaitro,TenVaiTro|
                                             regex:/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\-\s]+$/',

    		'mieuta'				=>		'required|unique:vaitro,MieuTa',
    	], 
    	[
    		'tenvaitro.required'	=>		'Không được bỏ trống',
    		'tenvaitro.unique'		=>		'Tên vai trò đã tồn tại',
            'tenvaitro.regex'       =>      'Chỉ được nhập chữ và số',

    		'mieuta.required'		=>		'Không được bỏ trống',
    		'mieuta.unique'			=>		'Miêu tả đã tồn tại',
    	]);

    	$vaitro = new VaiTro();
    	$vaitro->TenVaiTro 	= 	$request->tenvaitro;
    	$vaitro->MieuTa 	= 	$request->mieuta;

    	$vaitro->save();

    	return redirect()->route('DanhSachVaiTro')->with('success','Thêm vai trò thành công');
    }

    public function getXoa($id){
        $vaitro_cauthu = VaiTro_CauThu::all();
        $vaitro_cauthu_trandau = VaiTro_CauThu_TranDau::all();
        $vaitro = VaiTro::find($id);

        foreach($vaitro_cauthu as $vtct){
            if($vaitro->id == $vtct->idVaiTro){
                return redirect()->route('DanhSachVaiTro')->with('error','Vai trò đã có cầu thủ sở hữu');
            }
        }

        foreach($vaitro_cauthu_trandau as $vtcttd){
            if($vaitro->id == $vtcttd->idVaiTro){
                return redirect()->route('DanhSachVaiTro')->with('error','Vai trò tồn tại trong trận đấu');
            }
        }

        $vaitro->delete();
        return redirect()->route('DanhSachVaiTro')->with('success','Xoá vai trò thành công');  
    }

    public function getSua($id){
    	$vaitro = VaiTro::find($id);
    	return view('admin.pages.vaitro.sua', compact('vaitro'));
    }

    public function postSua($id, Request $request){
    	$this->validate($request, [
            'tenvaitro'             =>      'required|
                                             unique:vaitro,TenVaiTro,'.$id.',id|
                                             regex:/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\-\s]+$/',

            'mieuta'                =>      'required|unique:vaitro,MieuTa,'.$id.',id',
        ], 
        [
            'tenvaitro.required'    =>      'Không được bỏ trống',
            'tenvaitro.unique'      =>      'Tên vai trò đã tồn tại',
            'tenvaitro.regex'       =>      'Chỉ được nhập chữ và số',

            'mieuta.required'       =>      'Không được bỏ trống',
            'mieuta.unique'         =>      'Miêu tả đã tồn tại',
        ]);

    	$vaitro = VaiTro::find($id);
    	$vaitro->TenVaiTro 	= 	$request->tenvaitro;
    	$vaitro->MieuTa 	= 	$request->mieuta;

    	$vaitro->save();

    	return redirect()->route('DanhSachVaiTro')->with('success','Cập nhật vai trò thành công');
    }
}
