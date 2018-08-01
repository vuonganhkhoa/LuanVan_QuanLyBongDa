<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\KyNang;
use App\KyNang_CauThu;
class KyNangController extends Controller
{
    public function getDanhSach(){
    	$kynang = KyNang::all();
    	return view('admin.pages.kynang.danhsach', compact('kynang'));
    }

    public function getThem(){
    	return view('admin.pages.kynang.them');
    }

    public function postThem(Request $request){
    	$this->validate($request, [
    		'tenkynang'			=>		'required|
                                         unique:kynang,TenKyNang|
                                         regex:/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\-\s]+$/',

    		'chitiet'			=>		'required|unique:kynang,ChiTiet',
    	], 
    	[
    		'tenkynang.required'		=>		'Không được bỏ trống',
    		'tenkynang.unique'			=>		'Tên kỹ năng đã tồn tại',
            'tenkynang.regex'           =>      'Chỉ được nhập chữ và số',

    		'chitiet.required'			=>		'Không được bỏ trống',
    		'chitiet.unique'			=>		'Chi tiết đã tồn tại',

    	]);

    	$kynang = new KyNang();
    	$kynang->TenKyNang 	= 	$request->tenkynang;
    	$kynang->ChiTiet 	=	$request->chitiet;

    	$kynang->save();

    	return redirect()->route('DanhSachKyNang')->with('success','Thêm kỹ năng thành công');
    }

    public function getXoa($id){
        $kynang_cauthu = KyNang_CauThu::all();
        $kynang = KyNang::find($id);

        foreach($kynang_cauthu as $knct){
            if($kynang->id == $knct->idKyNang){
                return redirect()->route('DanhSachKyNang')->with('error','Kỹ năng được sở hữu bởi cầu thủ');
            }
        }

        $kynang->delete();
        return redirect()->route('DanhSachKyNang')->with('success','Xoá kỹ năng thành công');
    }

    public function getSua($id){
    	$kynang = KyNang::find($id);
    	return view('admin.pages.kynang.sua', compact('kynang'));
    }

    public function postSua($id, Request $request){
    	$this->validate($request, [
            'tenkynang'         =>      'required|
                                         unique:kynang,TenKyNang,'.$id.',id|
                                         regex:/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\-\s]+$/',

            'chitiet'           =>      'required|unique:kynang,ChiTiet,'.$id.',id',
        ], 
        [
            'tenkynang.required'        =>      'Không được bỏ trống',
            'tenkynang.unique'          =>      'Tên kỹ năng đã tồn tại',
            'tenkynang.regex'           =>      'Chỉ được nhập chữ và số',

            'chitiet.required'          =>      'Không được bỏ trống',
            'chitiet.unique'            =>      'Chi tiết đã tồn tại',

        ]);

    	$kynang = KyNang::find($id);
    	$kynang->TenKyNang 	= 	$request->tenkynang;
    	$kynang->ChiTiet 	=	$request->chitiet;

    	$kynang->save();

    	return redirect()->route('DanhSachKyNang')->with('success','Cập nhật kỹ năng thành công');
    }
}
