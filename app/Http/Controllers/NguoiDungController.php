<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Auth;
use App\NguoiDung;
use App\CauThu;

class NguoiDungController extends Controller
{
    public function getDanhSach(){
    	$nguoidung = NguoiDung::all();
    	return view('admin.pages.nguoidung.danhsach', compact('nguoidung'));
    }

    public function getThem(){
    	return view('admin.pages.nguoidung.them');
    }

    public function postThem(Request $request){
    	$this->validate($request, [
    		'hoten' 			=> 		'required|
                                         regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

    		'tendangnhap'		=>		'required|
                                         unique:nguoidung,username|
                                         regex:/^[a-zA-Z0-9]+$/',

    		'email'             =>      'required|
                                         unique:nguoidung,Email',  
            'email'             =>      ['regex:/^[a-z][a-z0-9_\.]{1,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/'],

    		'quoctich'			=> 		'required|
                                         regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

    		'noisinh'			=>		'required|
                                         regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

    		'hinhdaidien'       =>      'image|
                                         mimes:jpeg,jpg,png,gif,svg|
                                         max:10000'

    	],
    	[
    		'hoten.required'				=>		'Không được để trống họ tên',
            'hoten.regex'                   =>      'Vui lòng nhập chữ cái',

    		'tendangnhap.required'			=>		'Không được để trống tên đăng nhập',
    		'tendangnhap.unique'			=>		'Tên đăng nhập đã tồn tại',
            'tendangnhap.regex'             =>      'Vui lòng nhập chữ thường và số',

    		'email.required'				=>		'Không được để trống email',
    		'email.email'					=>		'Email không hợp lệ',
            'email.regex'                   =>      'Email không hợp lệ',
    		'email.unique'					=>		'Email đã tồn tại',

    		'quoctich.required'				=>		'Không được để trống quốc tịch',
            'quoctich.regex'                =>      'Vui lòng nhập chữ cái',

    		'noisinh.required'				=>		'Không được để trống nơi sinh',
            'noisinh.regex'                 =>      'Vui lòng nhập chữ cái',

    		'hinhdaidien.image'             =>      'Hình đại diện không đúng định dạng',
            'hinhdaidien.mimes'             =>      'Hình ảnh phải có định dạng : jpeg,jpg,png,gif,svg',
            'hinhdaidien.max'               =>      'Kích thước hình ảnh quá lớn'
    	]);

        $date = date('Y');

        $ngaysinh = date_create($request->ngaysinh);

        if($date - date_format($ngaysinh, 'Y') < 0){
            return redirect()->route('ThemNguoiDung')->with('error', 'Bạn nhập sai ngày sinh');
        }

        if($date - date_format($ngaysinh, 'Y') < 18){
            return redirect()->route('ThemNguoiDung')->with('error', 'Bạn chưa đủ tuổi để tham gia');
        }

        // if($date - date_format($ngaysinh, 'Y') > 60){ 
        //     return redirect()->route('ThemNguoiDung')->with('error', 'Bạn đã quá số tuổi tham gia');
        // }

        

    	$nguoidung = new NguoiDung;

    	$nguoidung->HoTen 			= 		$request->hoten;
    	$nguoidung->ChucVu	 		= 		$request->chucvu;
    	$nguoidung->username 		= 		$request->tendangnhap;
    	$nguoidung->password 		=		Hash::make($request->tendangnhap);
    	$nguoidung->Email 			= 		$request->email;
    	$nguoidung->NgaySinh 		= 		$request->ngaysinh;
    	$nguoidung->QuocTich 		= 		$request->quoctich;
    	$nguoidung->GioiTinh 		= 		$request->gioitinh;
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
    	return redirect()->route('DanhSachNguoiDung')->with('success','Thêm người dùng thành công');

    }

    public function getXoa($id){
        $nguoidung = NguoiDung::with('CauThu')->get();
    	$nguoidung = NguoiDung::find($id);
        if($nguoidung->ChucVu == 'cauthu'){
            return redirect()->back()->with('error','Tồn tại cầu thủ');
        }
        else{
            $nguoidung->delete();
            return redirect()->route('DanhSachNguoiDung')->with('success','Xoá người dùng thành công');
        }
    }

    public function getSua($id){
        $nguoidung = NguoiDung::find($id);
    	return view('admin.pages.nguoidung.sua', compact('nguoidung'));
    }

    public function postSua($id, Request $request){
    	$this->validate($request, [
            'hoten'             =>      'required|
                                         regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

            'tendangnhap'       =>      'required|
                                         unique:nguoidung,username,'.$id.',id|
                                         regex:/^[a-zA-Z0-9]+$/',

            'email'             =>      'required|
                                         email|
                                         unique:nguoidung,Email,'.$id.',id',

            'email'             =>      ['regex:/^[a-z][a-z0-9_\.]{1,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/'],

            'quoctich'          =>      'required|
                                         regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

            'noisinh'           =>      'required|
                                         regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

            'hinhdaidien'       =>      'image|
                                         mimes:jpeg,jpg,png,gif,svg|
                                         max:10000'

        ],
        [
            'hoten.required'                =>      'Không được để trống họ tên',
            'hoten.regex'                   =>      'Vui lòng nhập chữ cái',

            'tendangnhap.required'          =>      'Không được để trống tên đăng nhập',
            'tendangnhap.unique'            =>      'Tên đăng nhập đã tồn tại',
            'tendangnhap.regex'             =>      'Vui lòng nhập chữ thường và số',

            'email.required'                =>      'Không được để trống email',
            'email.email'                   =>      'Email không hợp lệ',
            'email.regex'                   =>      'Email không hợp lệ',
            'email.unique'                  =>      'Email đã tồn tại',

            'quoctich.required'             =>      'Không được để trống quốc tịch',
            'quoctich.regex'                =>      'Vui lòng nhập chữ cái',

            'noisinh.required'              =>      'Không được để trống nơi sinh',
            'noisinh.regex'                 =>      'Vui lòng nhập chữ cái',

            'hinhdaidien.image'             =>      'Hình đại diện không đúng định dạng',
            'hinhdaidien.mimes'             =>      'Hình ảnh phải có định dạng : jpeg,jpg,png,gif,svg',
            'hinhdaidien.max'               =>      'Kích thước hình ảnh quá lớn'
        ]);

        $date = date('Y');

        $ngaysinh = date_create($request->ngaysinh);

        if($date - date_format($ngaysinh, 'Y') < 0){
            return redirect('admin/nguoi-dung/sua/'.$id.'')->with('error', 'Bạn nhập sai ngày sinh');
        }

        if($date - date_format($ngaysinh, 'Y') < 18){
            return redirect('admin/nguoi-dung/sua/'.$id.'')->with('error', 'Bạn chưa đủ tuổi để tham gia');
        }

        // if($date - date_format($ngaysinh, 'Y') > 60){
        //     return redirect('admin/nguoi-dung/sua/'.$id.'')->with('error', 'Bạn đã quá số tuổi tham gia');
        // }

    	$nguoidung = NguoiDung::find($id);

    	$nguoidung->HoTen 			= 		$request->hoten;
    	$nguoidung->ChucVu	 		= 		$request->chucvu;
    	$nguoidung->username 		= 		$request->tendangnhap;
    	$nguoidung->Email 			= 		$request->email;
    	$nguoidung->NgaySinh 		= 		$request->ngaysinh;
    	$nguoidung->QuocTich 		= 		$request->quoctich;
    	$nguoidung->GioiTinh 		= 		$request->gioitinh;
    	$nguoidung->NoiSinh 		= 		$request->noisinh;

    	if($request->hasFile('hinhdaidien')){
    		$img = $request->file('hinhdaidien');
    		$img->move('Client/images/players/', time().$img->getClientOriginalName());
    		$nguoidung->HinhDaiDien =  time().$img->getClientOriginalName();
    	}

    	$nguoidung->save();
    	return redirect()->route('DanhSachNguoiDung')->with('success','Cập nhật người dùng thành công');
    }


    public function getCapNhatAdmin(){
        return view('admin.pages.capnhatthongtin');
    }

    public function postCapNhatAdmin(Request $request){

        $idNguoiDung =  Auth::user()->id;
        $emailNguoiDung = Auth::user()->Email;

        $this->validate($request, [
            'hoten'             =>      'required|
                                         regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

            'tendangnhap'       =>      'required|
                                         unique:nguoidung,username,'.$idNguoiDung.',id|
                                         regex:/^[a-zA-Z0-9]+$/',

            'email'             =>      'required|
                                         email|
                                         unique:nguoidung,Email,'.$idNguoiDung.',id',

            'email'             =>      ['regex:/^[a-z][a-z0-9_\.]{1,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/'],

            'quoctich'          =>      'required|
                                         regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

        ],
        [
            'hoten.required'                =>      'Không được để trống họ tên',
            'hoten.regex'                   =>      'Vui lòng nhập chữ cái',

            'tendangnhap.required'          =>      'Không được để trống tên đăng nhập',
            'tendangnhap.unique'            =>      'Tên đăng nhập đã tồn tại',
            'tendangnhap.regex'             =>      'Vui lòng nhập chữ thường và số',

            'email.required'                =>      'Không được để trống email',
            'email.email'                   =>      'Email không hợp lệ',
            'email.regex'                   =>      'Email không hợp lệ',
            'email.unique'                  =>      'Email đã tồn tại',

            'quoctich.required'             =>      'Không được để trống quốc tịch',
            'quoctich.regex'                =>      'Vui lòng nhập chữ cái',
        ]);

        $nguoidung              =       NguoiDung::find(Auth::user()->id);
        $nguoidung->HoTen       =       $request->hoten;
        $nguoidung->username    =       $request->tendangnhap;
        $nguoidung->Email       =       $request->email;
        $nguoidung->NgaySinh    =       $request->ngaysinh;
        $nguoidung->QuocTich    =       $request->quoctich;

        if($request->DoiMatKhau === 'on'){
            $this->validate($request, [
                'matkhauhientai'            =>      'required',
                'matkhau'                   =>      'required',
                'nhaplaimatkhau'            =>      'required|same:matkhau'
            ], 
            [
                'matkhauhientai.required'   =>      'Bạn cần nhập mật khẩu.',
                'matkhau.required'          =>      'Bạn cần nhập mật khẩu mới.',
                'nhaplaimatkhau.required'   =>      'Bạn cần nhập lại mật khẩu.',
                'nhaplaimatkhau.same'       =>      'Mật khẩu nhập lại không đúng.'
            ]);

            if(!Hash::check($request->matkhauhientai, $nguoidung->password)){
                return back()->with('error','Mật khẩu cũ bạn nhập vào chưa đúng.');
            }else{
                $nguoidung->password = Hash::make($request->matkhau);
            }

        }

        $nguoidung->save();
        return redirect()->route('TrangChu_Admin')->with('success','Cập nhật thông tin cá nhân thành công');
    }

    public function getCapNhatNhanVienYTe(){
        return view('nhanvienyte.pages.capnhatthongtin');
    }

    public function postCapNhatNhanVienYTe(Request $request){
        $idNguoiDung =  Auth::user()->id;
        $emailNguoiDung = Auth::user()->Email;

        $this->validate($request, [
            'hoten'             =>      'required|
                                         regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

            'tendangnhap'       =>      'required|
                                         unique:nguoidung,username,'.$idNguoiDung.',id|
                                         regex:/^[a-zA-Z0-9]+$/',

            'email'             =>      'required|
                                         email|
                                         unique:nguoidung,Email,'.$idNguoiDung.',id',

            'email'             =>      ['regex:/^[a-z][a-z0-9_\.]{1,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/'],

            'quoctich'          =>      'required|
                                         regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

        ],
        [
            'hoten.required'                =>      'Không được để trống họ tên',
            'hoten.regex'                   =>      'Vui lòng nhập chữ cái',

            'tendangnhap.required'          =>      'Không được để trống tên đăng nhập',
            'tendangnhap.unique'            =>      'Tên đăng nhập đã tồn tại',
            'tendangnhap.regex'             =>      'Vui lòng nhập chữ thường và số',

            'email.required'                =>      'Không được để trống email',
            'email.email'                   =>      'Email không hợp lệ',
            'email.regex'                   =>      'Email không hợp lệ',
            'email.unique'                  =>      'Email đã tồn tại',

            'quoctich.required'             =>      'Không được để trống quốc tịch',
            'quoctich.regex'                =>      'Vui lòng nhập chữ cái',
        ]);

        $nguoidung              =       NguoiDung::find(Auth::user()->id);
        $nguoidung->HoTen       =       $request->hoten;
        $nguoidung->username    =       $request->tendangnhap;
        $nguoidung->Email       =       $request->email;
        $nguoidung->NgaySinh    =       $request->ngaysinh;
        $nguoidung->QuocTich    =       $request->quoctich;

        if($request->DoiMatKhau === 'on'){
            $this->validate($request, [
                'matkhauhientai'            =>      'required',
                'matkhau'                   =>      'required',
                'nhaplaimatkhau'            =>      'required|same:matkhau'
            ], 
            [
                'matkhauhientai.required'   =>      'Bạn cần nhập mật khẩu.',
                'matkhau.required'          =>      'Bạn cần nhập mật khẩu mới.',
                'nhaplaimatkhau.required'   =>      'Bạn cần nhập lại mật khẩu.',
                'nhaplaimatkhau.same'       =>      'Mật khẩu nhập lại không đúng.'
            ]);

            if(!Hash::check($request->matkhauhientai, $nguoidung->password)){
                return back()->with('error','Mật khẩu cũ bạn nhập vào chưa đúng.');
            }else{
                $nguoidung->password = Hash::make($request->matkhau);
            }

        }

        $nguoidung->save();
        return redirect()->route('TrangChu_NhanVienYTe')->with('success','Cập nhật thông tin cá nhân thành công');
    }
}
