<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\CauLacBo;
use App\BangXepHang;
use App\BangXepHangCLB;
use App\TiSo;
use App\CauLacBo_GiaiDau;

class CauLacBoController extends Controller
{
    public function getDanhSach(){
    	$caulacbo = CauLacBo::all();
    	return view('admin.pages.caulacbo.danhsach', compact('caulacbo'));
    }

    public function getThem(){
    	return view('admin.pages.caulacbo.them');
    }

    public function postThem(Request $request){
    	$this->validate($request, [
    		'tendaydu' 						=>		'required|
                                                     unique:caulacbo,TenDayDu|
                                                     regex:/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

    		'tenviettat'					=>		'required|
                                                     unique:caulacbo,TenVietTat|
                                                     regex:/^[A-Z\s]+$/',

    		'truso'							=>		'required',

    		'bietdanh'						=>		'required|
                                                     unique:caulacbo,BietDanh|
                                                     regex:/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

    		'lichsu'						=>		'required',

    		'sanvandong'					=>		'required|
                                                     unique:caulacbo,SanVanDong|
                                                     regex:/^[a-zA-Z\s]+$/',

            'succhua'                       =>      'required|
                                                     numeric',

            'chutich'                       =>      'required|
                                                     regex:/^[a-zA-Z\s]+$/',

    		'hinhanhcaulacbo'				=>		'image|
                                                     mimes:jpeg,jpg,png,gif,svg|
                                                     max:10',

    		'hinhanhcaulacbo_lon'			=>		'image|
                                                     mimes:jpeg,jpg,png,gif,svg|
                                                     max:100',
    		
    	], 
    	[
    		'tendaydu.required'						=>			'Không được để trống',
    		'tendaydu.unique'						=>			'Tên đầy đủ đã tồn tại',
            'tendaydu.regex'                        =>          'Chỉ được nhập chữ và số',

    		'lichsu.required'						=>			'Không được để trống',

    		'tenviettat.required'					=>			'Không được để trống',
    		'tenviettat.unique'						=>			'Tên viết tắt đã tồn tại',
            'tenviettat.regex'                      =>          'Chỉ được nhập chữ có 3 ký tự in hoa',

    		'truso.required'						=>			'Không được để trống',

    		'bietdanh.required'						=>			'Không được để trống',
            'bietdanh.unique'                       =>          'Biệt danh đã tồn tại',
            'bietdanh.regex'                        =>          'Chỉ được nhập chữ',

    		'sanvandong.required'					=>			'Không được để trống',
    		'sanvandong.unique'						=>			'Sân vận động đã tồn tại',
            'sanvandong.regex'                      =>          'Chỉ được nhập chữ',

            'succhua.required'                      =>          'Không được để trống',
            'succhua.numeric'                       =>          'Chỉ được nhập số',

            'chutich.required'                      =>          'Không được để trống',
            'chutich.regex'                         =>          'Chỉ được nhập chữ',

    		'hinhanhcaulacbo.image'					=>			'Sai định dạng hình ảnh',
    		'hinhanhcaulacbo.mimes'					=>			'Sai định dạng hình ảnh',
    		'hinhanhcaulacbo.max'					=>			'Kích thước tối đa là 10KB',

    		'hinhanhcaulacbo_lon.image'				=>			'Sai định dạng hình ảnh',
    		'hinhanhcaulacbo_lon.mimes'				=>			'Sai định dạng hình ảnh',
    		'hinhanhcaulacbo_lon.max'				=>			'Kích thước tối đa là 100KB',
    		
    	]);

    	$caulacbo = new CauLacBo;


    	$caulacbo->TenDayDu				=		$request->tendaydu;
    	$caulacbo->TenVietTat			=		$request->tenviettat;
    	$caulacbo->TruSo				=		$request->truso;
    	$caulacbo->NgayThanhLap			=		$request->ngaythanhlap;
    	$caulacbo->BietDanh				=		$request->bietdanh;
    	$caulacbo->SanVanDong			=		$request->sanvandong;
        $caulacbo->SucChua              =       $request->succhua;
        $caulacbo->ChuTich              =       $request->chutich;
    	$caulacbo->HinhAnhCauLacBo		=		$request->hinhanhcaulacbo;
    	$caulacbo->HinhAnhCauLacBo_Lon  =		$request->hinhanhcaulacbo_lon;
    	$caulacbo->LichSu				=		$request->lichsu;


    	if($request->hasFile('hinhanhcaulacbo', 'hinhanhcaulacbo_lon')){

    		$img = $request->file('hinhanhcaulacbo');
            $img->move('Client/images/logos/', time().$img->getClientOriginalName());
            $caulacbo->HinhAnhCauLacBo =  time().$img->getClientOriginalName();
    		
    		$img2 = $request->file('hinhanhcaulacbo_lon');
    		$img2->move('Client/images/logos/', time().$img2->getClientOriginalName());
    		$caulacbo->HinhAnhCauLacBo_Lon =  time().$img2->getClientOriginalName();
    	}
    	else{
    		$caulacbo->HinhAnhCauLacBo = 'noone.png';
    		$caulacbo->HinhAnhCauLacBo_Lon = 'noone.png';
    	}

    	$caulacbo->save();


    	return redirect()->route('DanhSachCauLacBo')->with('success','Thêm câu lạc bộ thành công');
    }

    public function getXoa($id){
    	$caulacbo = CauLacBo::find($id);

        $bangxephang_caulacbo = BangXepHangCLB::all();
        foreach($bangxephang_caulacbo as $bxhclb){
            if($caulacbo->id == $bxhclb->idCauLacBo){
                return redirect()->back()->with('error', 'Tồn tại câu lạc bộ trong bảng xếp hạng');
            }
        }

        $bangxephang = BangXepHang::all();
        foreach($bangxephang as $bxh){
            if($caulacbo->id == $bxh->idCauLacBo){
                return redirect()->back()->with('error', 'Tồn tại câu lạc bộ trong bảng xếp hạng giải đấu');
            }
        }

        $caulacbo_giaidau = CauLacBo_GiaiDau::all();
        foreach($caulacbo_giaidau as $clbgd){
            if($caulacbo->id == $clbgd->idCauLacBo){
                return redirect()->back()->with('error', 'Tồn tại câu lạc bộ trong giải đấu');
            }
        }

        $tiso = TiSo::all();
        foreach($tiso as $ts){
            if($caulacbo->id == $ts->idCauLacBo){
                return redirect()->back()->with('error', 'Tồn tại câu lạc bộ trong trận đấu');
            }
        }

    	$caulacbo->delete();
    	return redirect()->route('DanhSachCauLacBo')->with('success','Xoá câu lạc bộ thành công');
    }

    public function getSua($id){
    	$caulacbo = CauLacBo::find($id);
    	return view('admin.pages.caulacbo.sua', compact('caulacbo'));
    }
    // .$id.',id

    public function postSua($id, Request $request){
    	$this->validate($request, [
            'tendaydu'                      =>      'required|
                                                     unique:caulacbo,TenDayDu,'.$id.',id|
                                                     regex:/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

            'tenviettat'                    =>      'required|
                                                     unique:caulacbo,TenVietTat,'.$id.',id|
                                                     regex:/^[A-Z\s]+$/',

            'truso'                         =>      'required',

            'bietdanh'                      =>      'required|
                                                     unique:caulacbo,BietDanh,'.$id.',id|
                                                     regex:/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/',

            'lichsu'                        =>      'required',

            'sanvandong'                    =>      'required|
                                                     unique:caulacbo,SanVanDong,'.$id.',id|
                                                     regex:/^[a-zA-Z\s]+$/',

            'succhua'                       =>      'required|
                                                     numeric',

            'chutich'                       =>      'required|
                                                     regex:/^[a-zA-Z\s]+$/',

            'hinhanhcaulacbo'               =>      'image|
                                                     mimes:jpeg,jpg,png,gif,svg|
                                                     max:10',

            'hinhanhcaulacbo_lon'           =>      'image|
                                                     mimes:jpeg,jpg,png,gif,svg|
                                                     max:100',
            
        ], 
        [
            'tendaydu.required'                     =>          'Không được để trống',
            'tendaydu.unique'                       =>          'Tên đầy đủ đã tồn tại',
            'tendaydu.regex'                        =>          'Chỉ được nhập chữ và số',

            'lichsu.required'                       =>          'Không được để trống',

            'tenviettat.required'                   =>          'Không được để trống',
            'tenviettat.unique'                     =>          'Tên viết tắt đã tồn tại',
            'tenviettat.regex'                      =>          'Chỉ được nhập chữ có 3 ký tự in hoa',

            'truso.required'                        =>          'Không được để trống',

            'bietdanh.required'                     =>          'Không được để trống',
            'bietdanh.unique'                       =>          'Biệt danh đã tồn tại',
            'bietdanh.regex'                        =>          'Chỉ được nhập chữ',

            'sanvandong.required'                   =>          'Không được để trống',
            'sanvandong.unique'                     =>          'Sân vận động đã tồn tại',
            'sanvandong.regex'                      =>          'Chỉ được nhập chữ',

            'succhua.required'                      =>          'Không được để trống',
            'succhua.numeric'                       =>          'Chỉ được nhập số',

            'chutich.required'                      =>          'Không được để trống',
            'chutich.regex'                         =>          'Chỉ được nhập chữ',

            'hinhanhcaulacbo.image'                 =>          'Sai định dạng hình ảnh',
            'hinhanhcaulacbo.mimes'                 =>          'Sai định dạng hình ảnh',
            'hinhanhcaulacbo.max'                   =>          'Kích thước tối đa là 10KB',

            'hinhanhcaulacbo_lon.image'             =>          'Sai định dạng hình ảnh',
            'hinhanhcaulacbo_lon.mimes'             =>          'Sai định dạng hình ảnh',
            'hinhanhcaulacbo_lon.max'               =>          'Kích thước tối đa là 100KB',
            
        ]);



    	$caulacbo = CauLacBo::find($id);


    	$caulacbo->TenDayDu				=		$request->tendaydu;
    	$caulacbo->TenVietTat			=		$request->tenviettat;
    	$caulacbo->TruSo				=		$request->truso;
    	$caulacbo->NgayThanhLap			=		$request->ngaythanhlap;
    	$caulacbo->BietDanh				=		$request->bietdanh;
    	$caulacbo->SanVanDong			=		$request->sanvandong;
        $caulacbo->SucChua              =       $request->succhua;
        $caulacbo->ChuTich              =       $request->chutich;
    	$caulacbo->LichSu				=		$request->lichsu;
        


    	if($request->hasFile('hinhanhcaulacbo', 'hinhanhcaulacbo_lon')){
    		$img = $request->file('hinhanhcaulacbo');
    		$img2 = $request->file('hinhanhcaulacbo_lon');

    		$img->move('Client/images/logos/', time().$img->getClientOriginalName());
    		$img2->move('Client/images/logos/', time().$img2->getClientOriginalName());

    		$caulacbo->HinhAnhCauLacBo =  time().$img->getClientOriginalName();
    		$caulacbo->HinhAnhCauLacBo_Lon =  time().$img2->getClientOriginalName();
    	}

    	$caulacbo->save();


    	return redirect()->route('DanhSachCauLacBo')->with('success','Cập nhật câu lạc bộ thành công');
    }
}