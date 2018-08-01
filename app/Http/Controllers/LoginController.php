<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{

	public function getDangNhap(){
		return view('login');
	}   
	public function postDangNhap(Request $request){

		$this->validate($request, [
            'username' => 'required|max:255|min:3',
            'password' => 'required|min:3'
        ], [
            'username.required' => 'Bạn chưa nhập tên đăng nhập.',
            'username.max' 		=> 'Tên không quá 255 kí tự.',
            'username.min' 		=> 'Tên đăng nhập quá ngắn.',
            'password.required' => 'Bạn cần nhập mật khẩu.',
            'password.min' 		=> 'Mật khẩu phải trên 3 kí tự',
        ]);

		$loginCauThu = array(
            'username' => $request->username,
            'password' => $request->password,
            'ChucVu'   => 'cauthu'
        );
        $loginHuanLuyenVien = array(
            'username' => $request->username,
            'password' => $request->password,
            'ChucVu'   => 'huanluyenvien'
        );
        $loginNhanVienYTe = array(
            'username' => $request->username,
            'password' => $request->password,
            'ChucVu'   => 'nhanvienyte'
        );
        $loginAdmin = array(
            'username' => $request->username,
            'password' => $request->password,
            'ChucVu'   => 'admin'
        );
        if(Auth::attempt($loginCauThu)){
            return redirect('cau-thu/'.Auth::user()->username);
        }
        elseif(Auth::attempt($loginHuanLuyenVien)){
            return redirect()->route('HuanLuyenVien');
        }
        elseif(Auth::attempt($loginNhanVienYTe)){
            return redirect()->route('TrangChu_NhanVienYTe');
        }
        elseif(Auth::attempt($loginAdmin)){
            return redirect()->route('TrangChu_Admin');
        }
        else{
            return redirect()->back()->with('loi', 'Tên đăng nhập hoặc mật khẩu không đúng.');
        }
	}

    public function getDangXuat(){

        Session::flush();

        Auth::logout();

        return redirect()->route('Login');
    }
}
