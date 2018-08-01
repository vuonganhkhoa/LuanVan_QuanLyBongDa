<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\CauThu;
use App\PhongDo_CauThu;
use App\NguoiDung;

class CauThuAdminController extends Controller
{
    public function getDanhSach(){
    	$cauthu = CauThu::with('NguoiDung')->get();
    	return view('admin.pages.cauthu.danhsach', compact('cauthu'));
    }

    public function getThem(){
    	return view('admin.pages.cauthu.them');
    }

    public function postThem(Request $request){
    	$this->validate($request, [
    		'hoten' 			=> 		'required|
                                         regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

    		'tendangnhap'		=>		'required|
                                         unique:nguoidung,username|
                                         regex:/^[a-z0-9]+$/',

    		'email'             =>      'required|
                                         email|
                                         unique:nguoidung,Email',

            'email'             =>      ['regex:/^[a-z][a-z0-9_\.]{1,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/'],

    		'quoctich'			=> 		'required|
                                         regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

    		'noisinh'			=>		'required',

    		'hinhdaidien'       =>      'image|
                                         mimes:jpeg,jpg,png,gif,svg|
                                         max:10000',

    		'soao'				=>		'unique:cauthu,SoAo',

    		'luocsucauthu'		=>		'required'

    	],
    	[
    		'hoten.required'                =>      'Không được để trống',
            'hoten.regex'                   =>      'Vui lòng nhập chữ cái',

            'tendangnhap.required'          =>      'Không được để trống',
            'tendangnhap.unique'            =>      'Tên đăng nhập đã tồn tại',
            'tendangnhap.regex'             =>      'Vui lòng nhập chữ thường và số',

            'email.required'                =>      'Không được để trống',
            'email.email'                   =>      'Email không hợp lệ',
            'email.regex'                   =>      'Email không hợp lệ',
            'email.unique'                  =>      'Email đã tồn tại',

            'quoctich.required'             =>      'Không được để trống',
            'quoctich.regex'                =>      'Vui lòng nhập chữ cái',

            'noisinh.required'              =>      'Không được để trống',

            'hinhdaidien.image'             =>      'Hình đại diện không đúng định dạng',
            'hinhdaidien.mimes'             =>      'Hình ảnh phải có định dạng : jpeg,jpg,png,gif,svg',
            'hinhdaidien.max'               =>      'Kích thước hình ảnh quá lớn',

            'soao.unique'					=>		'Số áo đã tồn tại',

    		'luocsucauthu.required'			=>		'Không được để trống'
    	]);

        $date = date('Y');

        $ngaysinh = date_create($request->ngaysinh);

        if($date - date_format($ngaysinh, 'Y') < 0){
            return redirect()->route('ThemCauThu')->with('error', 'Bạn nhập sai ngày sinh');
        }

        if($date - date_format($ngaysinh, 'Y') < 18){
            return redirect()->route('ThemCauThu')->with('error', 'Bạn chưa đủ tuổi để tham gia');
        }

        if($date - date_format($ngaysinh, 'Y') > 60){
            return redirect()->route('ThemCauThu')->with('error', 'Bạn đã quá số tuổi tham gia');
        }

    	$nguoidung = new NguoiDung;

    	$nguoidung->HoTen 			= 		$request->hoten;
    	$nguoidung->ChucVu	 		= 		'cauthu';
    	$nguoidung->username 		= 		$request->tendangnhap;
    	$nguoidung->password 		=		Hash::make($request->tendangnhap);
    	$nguoidung->Email 			= 		$request->email;
    	$nguoidung->NgaySinh 		= 		$request->ngaysinh;
    	$nguoidung->QuocTich 		= 		$request->quoctich;
    	$nguoidung->GioiTinh 		= 		'1';
    	$nguoidung->NoiSinh 		= 		$request->noisinh;
    	$nguoidung->HinhDaiDien 	= 		$request->hinhdaidien;

    	if($request->hasFile('hinhdaidien')){
    		$img = $request->file('hinhdaidien');
    		$img->move('Client/images/players/', time().$img->getClientOriginalName());
    		$nguoidung->HinhDaiDien =  time().$img->getClientOriginalName();
    	}
    	else{
    		$nguoidung->HinhDaiDien = 'noone.png';
    	}

    	$nguoidung->save();
    	


    	$cauthu = new CauThu;

    	$cauthu->ChieuCao 			=		$request->chieucao;
    	$cauthu->CanNang			=		$request->cannang;
    	$cauthu->ViTriSoTruong		=		$request->vitrisotruong;
    	$cauthu->SoAo				=		$request->soao;
    	$cauthu->ChanThuan			=		$request->chanthuan;
    	$cauthu->LuocSuCauThu		=		$request->luocsucauthu;
    	$cauthu->idNguoiDung		=		$nguoidung->id;

    	$cauthu->save();

        $cauthu_phongdo = new PhongDo_CauThu;
        $cauthu_phongdo->idCauThu           =       $cauthu->id;
        $cauthu_phongdo->idPhongDo          =       3;
        $cauthu_phongdo->save();


    	return redirect('admin/cau-thu/danh-sach')->with('success','Thêm cầu thủ thành công');

    }

    public function getXoa($id){
    	$cauthu = CauThu::with('NguoiDung')->find($id);
    	$cauthu->delete();
    	$cauthu->NguoiDung->delete();
    	return redirect('admin/cau-thu/danh-sach')->with('success','Xoá cầu thủ thành công');
    }

    public function getSua($id){
    	$cauthu = CauThu::with('NguoiDung')->find($id);
    	return view('admin.pages.cauthu.sua', compact('cauthu'));
    }

    public function postSua($id, Request $request){
        $cauthu = CauThu::find($id);
    	$this->validate($request, [
            'hoten'             =>      'required|
                                         regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

            'tendangnhap'       =>      'required|
                                         unique:nguoidung,username,'.$cauthu->idNguoiDung.',id|
                                         regex:/^[a-z0-9]+$/',

            'email'             =>      'required|
                                         email|
                                         unique:nguoidung,Email,'.$cauthu->idNguoiDung.',id',

            'email'             =>      ['regex:/^[a-z][a-z0-9_\.]{1,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/'],

            'quoctich'          =>      'required|
                                         regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

            'noisinh'           =>      'required',

            'hinhdaidien'       =>      'image|
                                         mimes:jpeg,jpg,png,gif,svg|
                                         max:10000',

            'soao'              =>      'unique:cauthu,SoAo,'.$id.',id',

            'luocsucauthu'      =>      'required'

        ],
        [
            'hoten.required'                =>      'Không được để trống',
            'hoten.regex'                   =>      'Vui lòng nhập chữ cái',

            'tendangnhap.required'          =>      'Không được để trống',
            'tendangnhap.unique'            =>      'Tên đăng nhập đã tồn tại',
            'tendangnhap.regex'             =>      'Vui lòng nhập chữ thường và số',

            'email.required'                =>      'Không được để trống',
            'email.email'                   =>      'Email không hợp lệ',
            'email.regex'                   =>      'Email không hợp lệ',
            'email.unique'                  =>      'Email đã tồn tại',

            'quoctich.required'             =>      'Không được để trống',
            'quoctich.regex'                =>      'Vui lòng nhập chữ cái',

            'noisinh.required'              =>      'Không được để trống',

            'hinhdaidien.image'             =>      'Hình đại diện không đúng định dạng',
            'hinhdaidien.mimes'             =>      'Hình ảnh phải có định dạng : jpeg,jpg,png,gif,svg',
            'hinhdaidien.max'               =>      'Kích thước hình ảnh quá lớn',

            'soao.unique'                   =>      'Số áo đã tồn tại',

            'luocsucauthu.required'         =>      'Không được để trống'
        ]);

        $date = date('Y');

        $ngaysinh = date_create($request->ngaysinh);

        if($date - date_format($ngaysinh, 'Y') < 0){
            return redirect('admin/cau-thu/sua/'.$id.'')->with('error', 'Bạn nhập sai ngày sinh');
        }

        if($date - date_format($ngaysinh, 'Y') < 18){
            return redirect('admin/cau-thu/sua/'.$id.'')->with('error', 'Bạn chưa đủ tuổi để tham gia');
        }

        if($date - date_format($ngaysinh, 'Y') > 60){
            return redirect('admin/cau-thu/sua/'.$id.'')->with('error', 'Bạn đã quá số tuổi tham gia');
        }

    	$cauthuID = CauThu::find($id);
    	
    	$nguoidungID = NguoiDung::where('id', $cauthuID->idNguoiDung)->first();

    	$nguoidung = NguoiDung::find($nguoidungID->id);
    	
    	$nguoidung->HoTen 			= 		$request->hoten;
    	$nguoidung->ChucVu	 		= 		'cauthu';
    	$nguoidung->username 		= 		$request->tendangnhap;
    	$nguoidung->Email 			= 		$request->email;
    	$nguoidung->NgaySinh 		= 		$request->ngaysinh;
    	$nguoidung->QuocTich 		= 		$request->quoctich;
    	$nguoidung->GioiTinh 		= 		'1';
    	$nguoidung->NoiSinh 		= 		$request->noisinh;

    	if($request->hasFile('hinhdaidien')){
            $img = $request->file('hinhdaidien');
            $img->move('Client/images/players/', time().$img->getClientOriginalName());
            $nguoidung->HinhDaiDien =  time().$img->getClientOriginalName();
        }

    	$nguoidung->save();
    	


    	$cauthu = CauThu::find($id);

    	$cauthu->ChieuCao 			=		$request->chieucao;
    	$cauthu->CanNang			=		$request->cannang;
    	$cauthu->ViTriSoTruong		=		$request->vitrisotruong;
    	$cauthu->SoAo				=		$request->soao;
    	$cauthu->ChanThuan			=		$request->chanthuan;
    	$cauthu->LuocSuCauThu		=		$request->luocsucauthu;
    	$cauthu->idNguoiDung		=		$nguoidung->id;

    	$cauthu->save();

    	return redirect('admin/cau-thu/danh-sach')->with('success','Cập nhật cầu thủ thành công');
    }
}
