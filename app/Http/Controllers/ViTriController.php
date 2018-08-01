<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ViTri;
use App\ViTri_CauThu;
use App\ViTri_CauThu_TranDau;
use App\ViTri_DoiHinh;

class ViTriController extends Controller
{
    public function getDanhSach(){
    	$vitri = ViTri::all();
    	return view('admin.pages.vitri.danhsach', compact('vitri'));
    }

    public function getThem(){
    	return view('admin.pages.vitri.them');
    }

    public function postThem(Request $request){
    	$this->validate($request, [
    		'tenvitri'				=>		'required|
                                             unique:vitri,TenViTri|
                                             min:2|
                                             max:4|
                                             regex:/^[A-Z]+$/',

    		'chuthich'				=>		'required|
                                             unique:vitri,ChuThich|
                                             regex:/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\-\s]+$/',
    	], 
    	[
    		'tenvitri.required'		=>		'Không được bỏ trống',
    		'tenvitri.unique'		=>		'Tên vị trí đã tồn tại',
            'tenvitri.min'          =>      'Tên vị trí tối thiểu 2 ký tự',
            'tenvitri.max'          =>      'Tên vị trí tối đa 4 ký tự',
            'tenvitri.regex'        =>      'Vui lòng nhập ký tự in hoa',

    		'chuthich.required'		=>		'Không được bỏ trống',
    		'chuthich.unique'		=>		'Tên chú thích đã tồn tại',
            'chuthich.regex'        =>      'Chỉ được nhập chữ và số',
    	]);

    	$vitri = new ViTri();
    	$vitri->TenViTri 	= 	$request->tenvitri;
    	$vitri->ChuThich 	= 	$request->chuthich;

    	$vitri->save();

    	return redirect()->route('DanhSachViTri')->with('success','Thêm vị trí thành công');
    }

    public function getXoa($id){
        $vitri_cauthu = ViTri_CauThu::all();
        $vitri_cauthu_trandau = ViTri_CauThu_TranDau::all();
        $vitri_doihinh = ViTri_DoiHinh::all();
        $vitri = ViTri::find($id);

        foreach($vitri_cauthu as $vtct){
            if($vitri->id == $vtct->idViTri){
                return redirect()->route('DanhSachViTri')->with('error','Vị trí đã có cầu thủ sở hữu');
            }
        }

        foreach($vitri_cauthu_trandau as $vtcttd){
            if($vitri->id == $vtcttd->idViTri){
                return redirect()->route('DanhSachViTri')->with('error','Vị trí đã tồn tại trong trận đấu');
            }
        }

        foreach($vitri_doihinh as $vtdh){
            if($vitri->id == $vtdh->idViTri){
                return redirect()->route('DanhSachViTri')->with('error','Vị trí đã tồn tại trong đội hình');
            }
        }



        $vitri->delete();
        return redirect()->route('DanhSachViTri')->with('success','Xoá vị trí thành công');
    }

    public function getSua($id){
    	$vitri = ViTri::find($id);
    	return view('admin.pages.vitri.sua', compact('vitri'));
    }

    public function postSua($id, Request $request){
    	$this->validate($request, [
            'tenvitri'              =>      'required|
                                             unique:vitri,TenViTri,'.$id.',id|
                                             min:2|
                                             max:4|
                                             regex:/^[A-Z]+$/',

            'chuthich'              =>      'required|
                                             unique:vitri,ChuThich,'.$id.',id|
                                             regex:/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\-\s]+$/',
        ], 
        [
            'tenvitri.required'     =>      'Không được bỏ trống',
            'tenvitri.unique'       =>      'Tên vị trí đã tồn tại',
            'tenvitri.min'          =>      'Tên vị trí tối thiểu 2 ký tự',
            'tenvitri.max'          =>      'Tên vị trí tối đa 4 ký tự',
            'tenvitri.regex'        =>      'Vui lòng nhập ký tự in hoa',

            'chuthich.required'     =>      'Không được bỏ trống',
            'chuthich.unique'       =>      'Tên chú thích đã tồn tại',
            'chuthich.regex'        =>      'Chỉ được nhập chữ và số',
        ]);

    	$vitri = ViTri::find($id);
    	$vitri->TenViTri 	= 	$request->tenvitri;
    	$vitri->ChuThich 	= 	$request->chuthich;

    	$vitri->save();

    	return redirect()->route('DanhSachViTri')->with('success','Cập nhật vị trí thành công');
    }
}
