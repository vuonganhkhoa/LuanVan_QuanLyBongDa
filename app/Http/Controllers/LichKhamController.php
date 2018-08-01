<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\LichKham;
use App\NguoiDung;
use App\CauThu;
use App\PhacDoDieuTri;
use App\ChanThuong;
use App\ThongTinCauThuChanThuong;

class LichKhamController extends Controller
{
    public function getDanhSachCauThuChanThuong(){
        $nguoidung = DB::SELECT('
                        SELECT
                        nguoidung.id,
                        nguoidung.HoTen,
                        nguoidung.NgaySinh,
                        chanthuong.TenChanThuong,
                        phacdodieutri.TrinhTuThucHien
                        FROM
                        phacdodieutri
                        INNER JOIN thongtinchanthuong_cauthu ON thongtinchanthuong_cauthu.idPhacDoDieuTri = phacdodieutri.id
                        INNER JOIN chanthuong ON thongtinchanthuong_cauthu.idChanThuong = chanthuong.id
                        INNER JOIN cauthu ON thongtinchanthuong_cauthu.idCauThu = cauthu.id
                        INNER JOIN nguoidung ON cauthu.idNguoiDung = nguoidung.id
                        WHERE thongtinchanthuong_cauthu.TinhTrangChanThuong = 1
            
            ');
        return view('nhanvienyte.pages.lichkham.danhsach_cauthu_chanthuong', compact('nguoidung'));
    }

    public function getDanhSachCauThu(){
        $nguoidung = NguoiDung::where('ChucVu', 'cauthu')->get();
    	return view('nhanvienyte.pages.lichkham.danhsachlichkham', compact('nguoidung'));
    }

    public function getDanhSachLichKham(){
        $lichkham = DB::SELECT('
                          SELECT
                            lichkham.NgayKham,
                            lichkham.CaKham,
                            lichkham.NoiDungDieuTri,
                            lichkham.id,
                            phacdodieutri.TrinhTuThucHien,
                            chanthuong.TenChanThuong,
                            nguoidung.HoTen
                            FROM
                            lichkham
                            INNER JOIN phacdodieutri ON lichkham.idPhacDoDieuTri = phacdodieutri.id
                            INNER JOIN thongtinchanthuong_cauthu ON thongtinchanthuong_cauthu.idPhacDoDieuTri = phacdodieutri.id
                            INNER JOIN chanthuong ON thongtinchanthuong_cauthu.idChanThuong = chanthuong.id
                            INNER JOIN cauthu ON thongtinchanthuong_cauthu.idCauThu = cauthu.id
                            INNER JOIN nguoidung ON cauthu.idNguoiDung = nguoidung.id
                            ORDER BY
                            lichkham.NgayKham DESC

            ');
        return view('nhanvienyte.pages.lichkham.danhsach', compact('lichkham'));
    }

    public function getThem($id){
        $nguoidung = NguoiDung::find($id);
        $chanthuong = ChanThuong::all();
    	$phacdodieutri = PhacDoDieuTri::all();
    	return view('nhanvienyte.pages.lichkham.them', compact('phacdodieutri','nguoidung','chanthuong'));
    }

    public function postThem($id,Request $request){
        $this->validate($request, [
            'diadiem'               =>      'required|
                                             regex:/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/'
        ], 
        [
            'diadiem.required'              =>      'Không được để trống',
            'diadiem.regex'                 =>      'Chỉ được nhập chữ và số'
        ]);


        $nguoidung = NguoiDung::find($id);
        $cauthu = CauThu::where('idNguoiDung',$nguoidung->id)->first();
        $cauthuchanthuong = ThongTinCauThuChanThuong::where('idCauThu',$cauthu->id)->where('idChanThuong',$request->chanthuong)->where('TinhTrangChanThuong',1)->first();
        $lichkham = LichKham::where('NgayKham',$request->ngaykham)->where('CaKham',$request->cakham)->first();

        if(isset($lichkham)){
            return redirect('nhan-vien-y-te/lich-kham/them/'.$id.'')->with('error', 'Lịch khám đã tồn tại');
        }

        // if(!isset($cauthuchanthuong)){
        //         return redirect('nhan-vien-y-te/lich-kham/them/'.$id.'')->with('error', 'Cầu thủ không bị chấn thương này');
        // }

        if($request->ngaychanthuong === 'on' && $request->ngayhoiphuc === 'on'){
            return redirect('nhan-vien-y-te/lich-kham/them/'.$id.'')->with('error', 'Không thể chọn ngày chấn thương và ngày hồi phục cùng lúc');
        }

    	$date = date('Y-m-d');

    	if(strtotime($request->ngaykham) - strtotime($date) < 86400){
            return redirect('nhan-vien-y-te/lich-kham/them/'.$id.'')->with('error', 'Ngày khám không thể nhỏ hơn ngày hôm nay');
    	}

    	$lichkham = new LichKham();
    	$lichkham->NgayKham 			= 		$request->ngaykham;
    	$lichkham->CaKham 				= 		$request->cakham;
    	$lichkham->DiaDiem 				= 		$request->diadiem;
    	$lichkham->NoiDungDieuTri 		= 		$request->noidungdieutri;
    	$lichkham->idPhacDoDieuTri 		= 		$request->phacdodieutri;
    	$lichkham->save();

        if($request->ngaychanthuong === 'on'){
            if(isset($cauthuchanthuong)){
                return redirect('nhan-vien-y-te/lich-kham/them/'.$id.'')->with('error', 'Cầu thủ đang bị chấn thương này');
            }
            $thongtinchanthuong = new ThongTinCauThuChanThuong;
            $thongtinchanthuong->ngaychanthuong             =       $request->ngaykham;
            $thongtinchanthuong->NgayHoiPhuc                =       null;
            $thongtinchanthuong->TinhTrangChanThuong        =       1;
            $thongtinchanthuong->TinhTrangRaSan             =       $request->tinhtrangrasan;
            $thongtinchanthuong->idCauThu                   =       $cauthu->id;
            $thongtinchanthuong->idChanThuong               =       $request->chanthuong;
            $thongtinchanthuong->idPhacDoDieuTri            =       $request->phacdodieutri;
            $thongtinchanthuong->save();
        }

        else if($request->ngayhoiphuc === 'on'){
            $thongtinchanthuong = ThongTinCauThuChanThuong::where('idCauThu',$cauthu->id)->where('TinhTrangChanThuong',1)->where('idChanThuong',$request->chanthuong)->orderby('id','DESC')->first();
            if(!isset($cauthuchanthuong)){
                return redirect('nhan-vien-y-te/lich-kham/them/'.$id.'')->with('error', 'Cầu thủ không bị chấn thương này');
            }
            // dd($thongtinchanthuong);
            $thongtinchanthuong->NgayHoiPhuc                =       $request->ngaykham;
            $thongtinchanthuong->TinhTrangChanThuong        =       0;
            $thongtinchanthuong->TinhTrangRaSan             =       1;
            $thongtinchanthuong->save();
        }

    	return redirect()->route('DanhSachCauThu')->with('success', 'Thêm lịch khám thành công');
    }

    public function getXoa($id){
    	$lichkham = LichKham::find($id);
    	$lichkham->delete();
    	return redirect()->route('DanhSachLichKham')->with('success', 'Xoá lịch khám thành công');
    }

	public function getSua($id){
		$lichkham = LichKham::find($id);
        // $chanthuong = ChanThuong::all();
		$phacdodieutri = PhacDoDieuTri::all();
        // $thongso_lichkham = DB::SELECT('
        //                         SELECT
        //                         thongtinchanthuong_cauthu.idCauThu,
        //                         lichkham.id,
        //                         lichkham.NgayKham,
        //                         lichkham.CaKham,
        //                         lichkham.DiaDiem,
        //                         lichkham.NoiDungDieuTri,
        //                         chanthuong.TenChanThuong,
        //                         thongtinchanthuong_cauthu.TinhTrangRaSan,
        //                         phacdodieutri.TrinhTuThucHien,
        //                         lichkham.idPhacDoDieuTri,
        //                         thongtinchanthuong_cauthu.idChanThuong
        //                         FROM
        //                         lichkham
        //                         INNER JOIN phacdodieutri ON lichkham.idPhacDoDieuTri = phacdodieutri.id
        //                         INNER JOIN thongtinchanthuong_cauthu ON thongtinchanthuong_cauthu.idPhacDoDieuTri = phacdodieutri.id
        //                         INNER JOIN chanthuong ON thongtinchanthuong_cauthu.idChanThuong = chanthuong.id
        //     ');
	    return view('nhanvienyte.pages.lichkham.sua', compact('lichkham','phacdodieutri'));
	}

	public function postSua($id, Request $request){
		$this->validate($request, [
    		'diadiem'				=>		'required|
    								 		 regex:/^[a-zA-Z0-9_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/'
    	], 
    	[
    		'diadiem.required'				=>		'Không được để trống',
    		'diadiem.regex'					=>		'Chỉ được nhập chữ và số'
    	]);

    	// $date = date('Y-m-d');

    	// if(strtotime($request->ngaykham) - strtotime($date) < 86400){
    	// 	return redirect()->route('ThemLichKham')->with('error', 'Ngày khám không thể nhỏ hơn ngày hôm nay');
    	// }

    	$lichkham = LichKham::find($id);
    	$lichkham->NgayKham 			= 		$request->ngaykham;
    	$lichkham->CaKham 				= 		$request->cakham;
    	$lichkham->DiaDiem 				= 		$request->diadiem;
    	$lichkham->NoiDungDieuTri 		= 		$request->noidungdieutri;
    	$lichkham->idPhacDoDieuTri 		= 		$request->phacdodieutri;

    	$lichkham->save();
    	return redirect()->route('DanhSachLichKham')->with('success', 'Cập nhật lịch khám thành công');
	}

}
