<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendar;
use Auth;
use Hash;
use DB;

use App\NguoiDung;
use App\CauThu;
use App\GiaoTrinh_LuyenTap_CauThu;
use App\LichLuyenTap;
use App\GiaoTrinhTap;
use App\VaiTro;
use App\ViTri;
use App\DoiHinh;
use App\ChienThuat;
use App\TranDau;
use App\ThongBao;
use App\ThongTinCauThuChanThuong;
use App\ViTriDoiHinh;
use App\ViTriCauThu;
use App\ViTriCauThuTranDau;
use App\VaiTroCauThuTranDau;
use App\VaiTro_CauThu;
use App\TinTuc;
use App\KyNang;
use App\KyNang_CauThu;

class HuanLuyenVienController extends Controller
{


	public function getHuanLuyenVien(){

		$TinTucMoiNhat = TinTuc::orderBy('id', 'DESC')->first();
        $CacTinTucKhac = TinTuc::orderBy('id', 'DESC')->skip(1)->take(4)->get();

        $KetQuaTranDauGanDay = DB::SELECT("
                                            SELECT
                                            caulacbo.TenDayDu,
                                            caulacbo.HinhAnhCauLacBo_lon,
                                            tiso.TiSo,
                                            trandau.VongDau,
                                            trandau.NgayThiDau,
                                            trandau.GioThiDau,
                                            trandau.DiaDiem,
                                            trandau.id
                                            FROM
                                            caulacbo
                                            INNER JOIN tiso ON tiso.idCauLacBo = caulacbo.id
                                            INNER JOIN trandau ON tiso.idTranDau = trandau.id
                                            WHERE tiso.TiSo IS NOT Null AND  trandau.TranDauCuaCLB='1'
                                            ORDER BY trandau.NgayThiDau DESC, tiso.id ASC
                                            LIMIT 2
                                        ");

        $CacTranDauTiepTheo = DB::SELECT("
                                            SELECT
                                            caulacbo.TenDayDu,
                                            caulacbo.HinhAnhCauLacBo,
                                            tiso.TiSo,
                                            trandau.VongDau,
                                            trandau.NgayThiDau,
                                            trandau.GioThiDau,
                                            trandau.DiaDiem,
                                            trandau.id
                                            FROM
                                            caulacbo
                                            INNER JOIN tiso ON tiso.idCauLacBo = caulacbo.id
                                            INNER JOIN trandau ON tiso.idTranDau = trandau.id
                                            WHERE tiso.TiSo IS Null AND  trandau.TranDauCuaCLB='1'
                                            ORDER BY trandau.NgayThiDau ASC, tiso.id ASC
                                            LIMIT 6 
										");
										
		return view('huanluyenvien.pages.trangchu', compact('TinTucMoiNhat', 'CacTinTucKhac', 'KetQuaTranDauGanDay', 'CacTranDauTiepTheo'));
	}




	#------------------------------------------------------------------------------------------------------------#
    #-------------------------------------------- Thông tin cá nhận ---------------------------------------------#
    #------------------------------------------------------------------------------------------------------------#

	public function getThongTinCaNhan(){
		$idNguoiDangNhap = Auth::user()->id;
		$HuanLuyenVien = NguoiDung::where('id', $idNguoiDangNhap)->first();
        $Tuoi = (int)date('Y') - (int)date('Y', strtotime($HuanLuyenVien->NgaySinh));
		return view('huanluyenvien.pages.thongtincanhan', compact('HuanLuyenVien', 'Tuoi'));
	}

	public function getSuaThongTinCaNhan(){
		$idNguoiDangNhap = Auth::user()->id;
		$HuanLuyenVien = NguoiDung::where('id', $idNguoiDangNhap)->first();
		return view('huanluyenvien.pages.suathongtincanhan', compact('HuanLuyenVien'));
	}
	public function postSuaThongTinCaNhan(Request $request) {

        $idNguoiDangNhap = Auth::user()->id;
		$HuanLuyenVien = NguoiDung::where('id', $idNguoiDangNhap)->first();

        $this->validate($request, [
            'TenDangNhap'          => 'required | regex : /^[a-zA-Z0-9]+$/ | unique:nguoidung,username,'.$idNguoiDangNhap.',id' ,
            'Email'                => 'required | email | unique:nguoidung,Email,'.$idNguoiDangNhap.',id'
        ], 
        [
            'TenDangNhap.required' => 'Tên đăng nhập không được để trống.',
            'TenDangNhap.unique'   => 'Tên đăng nhập đã có người sử dụng.',
            'TenDangNhap.regex'    => 'Tên đăng nhập không nên có kí tự đặc biệt.',
            'Email.required'       => 'Địa chỉ email không được để trống.',
            'Email.email'          => 'Địa chỉ email không đúng định dạng.',
            'Email.unique'         => 'Địa chỉ email đã có người sử dụng.'
        ]);

        $huanluyenvien = NguoiDung::findOrFail($idNguoiDangNhap);
        $huanluyenvien->username = $request->TenDangNhap;
        $huanluyenvien->Email = $request->Email;

        if($request->DoiMatKhau === 'on'){
            $this->validate($request, [
                'MatKhauHienTai'          => 'required',
                'MatKhauMoi'              => 'required',
                'MatKhauNhapLai'          => 'required|same:MatKhauMoi'
            ], 
            [
                'MatKhauHienTai.required' => 'Bạn cần nhập mật khẩu.',
                'MatKhauMoi.required'     => 'Bạn cần nhập mật khẩu mới.',
                'MatKhauNhapLai.required' => 'Bạn cần nhập lại mật khẩu.',
                'MatKhauNhapLai.same'     => 'Mật khẩu nhập lại không đúng.'
            ]);

            if(!Hash::check($request->MatKhauHienTai, $huanluyenvien->password)){
                return back()->with('loi','Mật khẩu cũ bạn nhập vào chưa đúng.');
            }else{
                $huanluyenvien->password = Hash::make($request->MatKhauMoi);
            }

        }

        $huanluyenvien->save();

        return redirect()->back()->with('thongbao', 'Cập nhật thông tin thành công.');
    }




	#------------------------------------------------------------------------------------------------------------#
    #---------------------------------------------- Các danh mục ------------------------------------------------#
    #------------------------------------------------------------------------------------------------------------#

	public function getThongBao(){
		$ThongBao = ThongBao::with('NguoiDung')->orderBy('NgayThongBao', 'DESC')->get();
        return view('huanluyenvien.pages.thongbao', compact('tenCauThu', 'ThongBao'));
	}

	public function getThemThongBao(){
		return view('huanluyenvien.pages.thongbaothem');
	}
	public function postThemThongBao(Request $request){
		$thongbao = new ThongBao;
		$thongbao->TieuDe	  	= $request->TieuDe;
		$thongbao->NoiDung	  	= $request->NoiDung;
		$thongbao->NgayThongBao	= date('Y-m-d');
		$thongbao->idNguoiGui 	= Auth::user()->id; 
		$thongbao->save();
		return redirect('huan-luyen-vien/thong-bao')->with('thongbao', 'Thêm thông báo thành công.');
	}

	public function getXoaThongBao($idThongBao){
		$thongbao = ThongBao::findOrFail($idThongBao);
		$thongbao->delete();
		return redirect('huan-luyen-vien/thong-bao')->with('thongbao', 'Xóa thông báo thành công.');
	}

	public function getSuaThongBao($idThongBao){
		$thongbao = ThongBao::findOrFail($idThongBao);
		return view('huanluyenvien.pages.thongbaosua', compact('thongbao'));
	}
	public function postSuaThongBao($idThongBao, Request $request){
		$thongbao = ThongBao::findOrFail($idThongBao);
		$thongbao->TieuDe	  	= $request->TieuDe;
		$thongbao->NoiDung	  	= $request->NoiDung;
		$thongbao->NgayThongBao	= date('Y-m-d');
		$thongbao->idNguoiGui 	= Auth::user()->id; 
		$thongbao->save();
		return redirect('huan-luyen-vien/thong-bao')->with('thongbao', 'Cập nhật thông báo thành công.');
	}







	public function getLichThiDau(){
		$TranDauTiepTheo = DB::SELECT("
                                            SELECT
                                            caulacbo.TenDayDu,
                                            caulacbo.HinhAnhCauLacBo_lon,
                                            tiso.TiSo,
                                            trandau.VongDau,
                                            trandau.NgayThiDau,
                                            trandau.GioThiDau,
                                            trandau.DiaDiem,
                                            trandau.id
                                            FROM
                                            caulacbo
                                            INNER JOIN tiso ON tiso.idCauLacBo = caulacbo.id
                                            INNER JOIN trandau ON tiso.idTranDau = trandau.id
                                            WHERE tiso.TiSo IS Null AND  trandau.TranDauCuaCLB='1'
                                            ORDER BY trandau.NgayThiDau ASC, tiso.id ASC
                                            LIMIT 2
                                        ");

        $CacTranDauTiepTheo = DB::TABLE('caulacbo')
                                ->join('tiso', 'tiso.idCauLacBo', '=', 'caulacbo.id')
                                ->join('trandau', 'tiso.idTranDau', '=', 'trandau.id')
                                ->select('caulacbo.TenDayDu', 'caulacbo.HinhAnhCauLacBo', 'caulacbo.HinhAnhCauLacBo_lon', 'tiso.TiSo', 'trandau.VongDau', 'trandau.NgayThiDau', 'trandau.GioThiDau', 'trandau.DiaDiem', 'trandau.id')
                                ->where('tiso.TiSo', NULL)->where('trandau.TranDauCuaCLB', '1')
                                ->orderBy('trandau.NgayThiDau', 'ASC')->orderBy('tiso.id', 'ASC')
                                ->paginate(8);

        $BangXepHang = DB::SELECT("
                                    SELECT
                                    caulacbo.TenDayDu,
                                    caulacbo.HinhAnhCauLacBo,
                                    bangxephangclbgiaidau.Diem
                                    FROM
                                    bangxephangclbgiaidau
                                    INNER JOIN caulacbo ON bangxephangclbgiaidau.idCauLacBo = caulacbo.id
                                    INNER JOIN giaidau ON bangxephangclbgiaidau.idGiaiDau = giaidau.id
                                    WHERE giaidau.MuaGiaiHienTai='1'
                                    ORDER BY
                                    bangxephangclbgiaidau.Diem DESC,
                                    bangxephangclbgiaidau.HieuSo DESC,
                                    bangxephangclbgiaidau.BanThang DESC,
                                    bangxephangclbgiaidau.ChiSoFairplay ASC
                                    LIMIT 10
                                ");
		return view('huanluyenvien.pages.lichthidau', compact('TranDauTiepTheo', 'CacTranDauTiepTheo', 'BangXepHang'));
	}

	public function getKetQua(){
		$CacTranDaDau = DB::TABLE('caulacbo')
                                ->join('tiso', 'tiso.idCauLacBo', '=', 'caulacbo.id')
                                ->join('trandau', 'tiso.idTranDau', '=', 'trandau.id')
                                ->select('caulacbo.TenDayDu', 'caulacbo.HinhAnhCauLacBo', 'caulacbo.HinhAnhCauLacBo_lon', 'tiso.TiSo', 'trandau.VongDau', 'trandau.NgayThiDau', 'trandau.GioThiDau', 'trandau.DiaDiem', 'trandau.id')
                                ->where('tiso.TiSo', '<>', NULL)->where('trandau.TranDauCuaCLB', '1')
                                ->orderBy('trandau.NgayThiDau', 'DESC')->orderBy('tiso.id', 'ASC')
                                ->paginate(8);

        $BangXepHang = DB::SELECT("
                                    SELECT
                                    caulacbo.TenDayDu,
                                    caulacbo.HinhAnhCauLacBo,
                                    bangxephangclbgiaidau.Diem
                                    FROM
                                    bangxephangclbgiaidau
                                    INNER JOIN caulacbo ON bangxephangclbgiaidau.idCauLacBo = caulacbo.id
                                    INNER JOIN giaidau ON bangxephangclbgiaidau.idGiaiDau = giaidau.id
                                    WHERE giaidau.MuaGiaiHienTai='1'
                                    ORDER BY
                                    bangxephangclbgiaidau.Diem DESC,
                                    bangxephangclbgiaidau.HieuSo DESC,
                                    bangxephangclbgiaidau.BanThang DESC,
                                    bangxephangclbgiaidau.ChiSoFairplay ASC
                                    LIMIT 10
                                ");
		return view('huanluyenvien.pages.ketqua', compact('CacTranDaDau', 'BangXepHang'));
	}







	#------------------------------------------------------------------------------------------------------------#
	#---------------------------------------------- Lịch luyện tập ----------------------------------------------#
	#------------------------------------------------------------------------------------------------------------#


	public function getLichLuyenTap(){

		$NguoiDangNhap 	= Auth::user()->id;
		$HuanLuyenVien 	= DB::TABLE('huanluyenvien')->where('idNguoiDung', $NguoiDangNhap)->first();
		$idHuanLuyenVien= $HuanLuyenVien->id;

		$CauThuTapNgayHomAy = DB::SELECT("
										SELECT cauthu.id as idCauThu, nguoidung.HoTen, lichluyentap.NgayLuyenTap, cauthu.ViTriSoTruong, lichluyentap.CaLuyenTap
										FROM nguoidung
										INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
										INNER JOIN giaotrinh_luyentap_cauthu ON giaotrinh_luyentap_cauthu.idCauThu = cauthu.id
										INNER JOIN lichluyentap ON giaotrinh_luyentap_cauthu.idLichLuyenTap = lichluyentap.id
										WHERE lichluyentap.NgayLuyenTap >= CAST(NOW() as DATE)
										AND lichluyentap.idHuanLuyenVien = '$idHuanLuyenVien'
										GROUP BY nguoidung.HoTen, lichluyentap.NgayLuyenTap, cauthu.id, cauthu.ViTriSoTruong, lichluyentap.CaLuyenTap
										ORDER BY lichluyentap.NgayLuyenTap
									");
		foreach($CauThuTapNgayHomAy as $data) {
			$cauthu = $data->idCauThu;
			$ngayluyentap = $data->NgayLuyenTap;
			$GiaoTrinhLuyenTapMoiCauThu[] = DB::SELECT("
		 										SELECT
		 										nguoidung.HoTen,
												giaotrinhtap.TenBaiTap,
												lichluyentap.NgayLuyenTap,
		 										cauthu.ViTriSoTruong,
		 										giaotrinh_luyentap_cauthu.id,
		 										lichluyentap.CaLuyenTap
	  	 										FROM nguoidung
		 										INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
		 										INNER JOIN giaotrinh_luyentap_cauthu ON giaotrinh_luyentap_cauthu.idCauThu = cauthu.id
		 										INNER JOIN lichluyentap ON giaotrinh_luyentap_cauthu.idLichLuyenTap = lichluyentap.id
		 										INNER JOIN giaotrinhtap ON giaotrinh_luyentap_cauthu.idGiaoTrinhTap = giaotrinhtap.id
												 WHERE lichluyentap.NgayLuyenTap >= CAST(NOW() as DATE) AND lichluyentap.NgayLuyenTap='$ngayluyentap' AND cauthu.id='$cauthu'
												 AND lichluyentap.idHuanLuyenVien = '$idHuanLuyenVien'
		 										ORDER BY lichluyentap.NgayLuyenTap ASC"
		 									);
		}
		$LichLuyenTap = LichLuyenTap::all();
		$NgayCauThuTap = $LichLuyenTap;
		$LichLuyenTap_DanhSach = [];
		foreach($LichLuyenTap as $lich){
			$LichLuyenTap_DanhSach[] = Calendar::event(
				$lich->DiaDiem,
				false,  
				new \Datetime($lich->NgayLuyenTap.$lich->GioLuyenTap),
				new \Datetime($lich->NgayLuyenTap),
				$lich->id
			); 
		}
		$LichLuyenTap = Calendar::addEvents($LichLuyenTap_DanhSach)
						->setOptions([ 
							'firstDay' => 1,
                            'contentHeight' => 700,
                            'themeSystem' => 'bootstrap3',
                            'columnHeader' => false,
                            'aspectRatio' => 1,
                            'allDayDefault'=> false,
						])
						->setCallbacks([ 
                            'eventClick' => 'function(event) {
                                 $("#LichTapModal"+event.id).modal("show")
                             }'
                        ]);
        foreach($NgayCauThuTap as $data) {
        	$ngay = $data->NgayLuyenTap;
        	$DanhSachCauThuTap[] = DB::SELECT("
												SELECT nguoidung.HoTen, lichluyentap.NgayLuyenTap, cauthu.ViTriSoTruong,lichluyentap.CaLuyenTap
												FROM nguoidung
												INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
												INNER JOIN giaotrinh_luyentap_cauthu ON giaotrinh_luyentap_cauthu.idCauThu = cauthu.id
												INNER JOIN lichluyentap ON giaotrinh_luyentap_cauthu.idLichLuyenTap = lichluyentap.id
												WHERE lichluyentap.NgayLuyenTap = '$ngay'
												AND lichluyentap.idHuanLuyenVien = '$idHuanLuyenVien'
												GROUP BY nguoidung.HoTen, lichluyentap.NgayLuyenTap, cauthu.ViTriSoTruong, lichluyentap.CaLuyenTap
								        	");
        }
        		return view('huanluyenvien.pages.lichluyentap', compact( 'cauthu', 'LichLuyenTap', 'DanhSachCauThuTap', 'NgayCauThuTap', 'GiaoTrinhLuyenTapMoiCauThu', 'CauThuTapNgayHomAy'));
	}






	public function getThemLichTap(){
		$LichTap = LichLuyenTap::orderBy('NgayLuyenTap', 'DESC')->get();
		return view('huanluyenvien.pages.lichluyentap.themlichtap', compact('LichTap'));
	}
	public function postThemLichTap( Request $request){
		$this->validate($request, [
			'NgayLuyenTap'     => 'required',
			'CaLuyenTap'      => 'required',
			'DiaDiem'          => 'required'
		], 
		[
			'NgayLuyenTap.required'     => 'Ngày luyện tập không được để trống',
			'CaLuyenTap.required'      => 'Ca luyện tập không được để trống',
			'DiaDiem.required'          => 'Địa điểm không được để trống.'               
		]);
		if( strtotime($request->NgayLuyenTap) < strtotime(date('Y-m-d')) ){
			return redirect('huan-luyen-vien/lich-luyen-tap/them-lich-tap')->with('loi', 'Thêm lịch luyện tập không thành công. Ngày luyện tập không thể nhỏ hơn ngày hiện tại.');
		}
		if( $request->CaLuyenTap != 'Ca sáng' && $request->CaLuyenTap != 'Ca trưa' ){
			return redirect('huan-luyen-vien/lich-luyen-tap/them-lich-tap')->with('loi', 'Thêm lịch luyện tập không thành công. Ca luyện tập phải là "ca sáng" hoặc "ca trưa".');
		}
		$LichLuyenTap = LichLuyenTap::all();
		foreach($LichLuyenTap as $lich){
			if( strtotime($request->NgayLuyenTap) == strtotime($lich->NgayLuyenTap) && $request->CaLuyenTap == $lich->CaLuyenTap ){
				return redirect('huan-luyen-vien/lich-luyen-tap/them-lich-tap')->with('loi', 'Thêm lịch luyện tập không thành công. Đã có ca luyện tập của ngày hôm đó.');
			}
		}

		$NguoiDangNhap = Auth::user()->id;
		$HuanLuyenVien = DB::TABLE('huanluyenvien')->where('idNguoiDung', $NguoiDangNhap)->first();

		if($request->CaLuyenTap == 'Ca sáng') {
			$lichLuyenTap = new LichLuyenTap;
			$lichLuyenTap->NgayLuyenTap = $request->NgayLuyenTap;
			$lichLuyenTap->CaLuyenTap = $request->CaLuyenTap;
			$lichLuyenTap->GioLuyenTap = '08:00:00';
			$lichLuyenTap->DiaDiem = $request->DiaDiem;
			$lichLuyenTap->idHuanLuyenVien = $HuanLuyenVien->id;
			$lichLuyenTap->save();
		}
		elseif($request->CaLuyenTap == 'Ca trưa') {
			$lichLuyenTap = new LichLuyenTap;
			$lichLuyenTap->NgayLuyenTap = $request->NgayLuyenTap;
			$lichLuyenTap->CaLuyenTap = $request->CaLuyenTap;
			$lichLuyenTap->GioLuyenTap = '13:30:00';
			$lichLuyenTap->DiaDiem = $request->DiaDiem;
			$lichLuyenTap->idHuanLuyenVien = $HuanLuyenVien->id;
			$lichLuyenTap->save();
		}
		
		return redirect('huan-luyen-vien/lich-luyen-tap/them-lich-tap')->with('thongbao', 'Thêm lịch luyện tập thành công.');	
	
	}

	public function getXoaLichTap( $idLichTap){
		$kiemTraLichCanXoa = GiaoTrinh_LuyenTap_CauThu::where('idLichLuyenTap', $idLichTap)->count();
		if($kiemTraLichCanXoa > 0){
			return redirect('huan-luyen-vien/lich-luyen-tap/them-lich-tap')->with('loi', 'Xóa lịch luyện tập không thành công. Lịch luyện tập đã có cầu thủ tập.');
		}
		else{
			$lichLuyenTap = LichLuyenTap::find($idLichTap);
			$lichLuyenTap->delete($idLichTap);
			return redirect('huan-luyen-vien/lich-luyen-tap/them-lich-tap')->with('thongbao', 'Xóa lịch luyện tập thành công.');
		}
	}

	public function getSuaLichTap( $idLichTap){
		$LichTap = LichLuyenTap::findOrFail($idLichTap);
		return view('huanluyenvien.pages.lichluyentap.sualichtap', compact('LichTap'));
	}
	public function postSuaLichTap( $idLichTap, Request $request){
		$this->validate($request, [
			'NgayLuyenTap'     => 'required ',
			'CaLuyenTap'      => 'required',
			'DiaDiem'          => 'required'
		], 
		[
			'NgayLuyenTap.required'     => 'Ngày luyện tập không được để trống',
			'CaLuyenTap.required'      => 'Ca luyện tập không được để trống',
			'DiaDiem.required'          => 'Địa điểm không được để trống.'               
		]);
		
		if( strtotime($request->NgayLuyenTap) < strtotime(date('Y-m-d')) ){
			return redirect('huan-luyen-vien/lich-luyen-tap/them-lich-tap')->with('loi', 'Thêm lịch luyện tập không thành công. Ngày luyện tập không thể nhỏ hơn ngày hiện tại.');
		}
		if( $request->CaLuyenTap != 'Ca sáng' && $request->CaLuyenTap != 'Ca trưa' ){
			return redirect('huan-luyen-vien/lich-luyen-tap/them-lich-tap')->with('loi', 'Thêm lịch luyện tập không thành công. Ca luyện tập phải là "ca sáng" hoặc "ca trưa".');
		}
		$lichluyenTap = LichLuyenTap::findOrFail($idLichTap);
		if($request->NgayLuyenTap != $lichluyenTap->NgayLuyenTap || $request->CaLuyenTap != $lichluyenTap->CaLuyenTap) {
			$LichLuyenTap = LichLuyenTap::all();
			foreach($LichLuyenTap as $lich){
				if( strtotime($request->NgayLuyenTap) == strtotime($lich->NgayLuyenTap) && $request->CaLuyenTap == $lich->CaLuyenTap ){
					return redirect('huan-luyen-vien/lich-luyen-tap/them-lich-tap')->with('loi', 'Thêm lịch luyện tập không thành công. Đã có ca luyện tập của ngày hôm đó.');
				}
			}
		}

		$NguoiDangNhap = Auth::user()->id;
		$HuanLuyenVien = DB::TABLE('huanluyenvien')->where('idNguoiDung', $NguoiDangNhap)->first();

		if($request->CaLuyenTap == 'Ca sáng') {
			$lichLuyenTap = LichLuyenTap::findOrFail($idLichTap);
			$lichLuyenTap->NgayLuyenTap = $request->NgayLuyenTap;
			$lichLuyenTap->CaLuyenTap = $request->CaLuyenTap;
			$lichLuyenTap->GioLuyenTap = '08:00:00';
			$lichLuyenTap->DiaDiem = $request->DiaDiem;
			$lichLuyenTap->idHuanLuyenVien = $HuanLuyenVien->id;
			$lichLuyenTap->save();
		}
		elseif($request->CaLuyenTap == 'Ca trưa') {
			$lichLuyenTap = LichLuyenTap::findOrFail($idLichTap);
			$lichLuyenTap->NgayLuyenTap = $request->NgayLuyenTap;
			$lichLuyenTap->CaLuyenTap = $request->CaLuyenTap;
			$lichLuyenTap->GioLuyenTap = '13:30:00';
			$lichLuyenTap->DiaDiem = $request->DiaDiem;
			$lichLuyenTap->idHuanLuyenVien = $HuanLuyenVien->id;
			$lichLuyenTap->save();
		}
		return redirect('huan-luyen-vien/lich-luyen-tap/them-lich-tap')->with('thongbao', 'Cập nhật lịch luyện tập thành công.');
	}






	public function getThemCauThuTap(){
		$NgayLuyenTap = DB::SELECT("SELECT * FROM lichluyentap WHERE lichluyentap.NgayLuyenTap >= CAST(NOW() as DATE) ORDER BY lichluyentap.NgayLuyenTap ASC");
		$CauThuTap = DB::SELECT("
									SELECT nguoidung.HoTen, cauthu.ViTriSoTruong, cauthu.id
									FROM nguoidung
									INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
									WHERE cauthu.id NOT IN (SELECT idCauThu FROM thongtinchanthuong_cauthu WHERE TinhTrangChanThuong='1')

								");
		$GiaoTrinhTap = GiaoTrinhTap::all();
		return view('huanluyenvien.pages.lichluyentap.themcauthutap', compact('NgayLuyenTap', 'GiaoTrinhTap', 'CauThuTap'));
	}
	public function postThemCauThuTap( Request $request){
		$this->validate($request, [
			'NgayLuyenTap'     => 'required',
			'CauThuTap'        => 'required',
			'GiaoTrinhTap'     => 'required'
		], 
		[
			'NgayLuyenTap.required'   => 'Ngày luyện tập không được để trống.',
			'CauThuTap.required'      => 'Bạn cần phải chọn cầu thủ.',
			'GiaoTrinhTap.required'   => 'Bạn cần phải chọn giáo trình cho cầu thủ.'               
		]);

		foreach($request->GiaoTrinhTap as $giaotrinhID){
			$GiaoTrinhDaChon[] = GiaoTrinhTap::where('id', $giaotrinhID)->get();
		}
		$TongThoiLuongTapCauThu = 0;
		for($i=0; $i<count($GiaoTrinhDaChon); $i++) {
			$TongThoiLuongTapCauThu = $TongThoiLuongTapCauThu + $GiaoTrinhDaChon[$i][0]->ThoiLuongTapToiDa;
		}
		if($TongThoiLuongTapCauThu > 180){
			return redirect('huan-luyen-vien/lich-luyen-tap/them-cau-thu-tap')->with('loi', 'Thêm lịch luyện tập cho cầu thủ không thành công. Tổng thời lượng các bài tập quá nhiều.');
		}
		
		if($request->CauThuTap[0] === "TatCaCauThu"){
			$DanhSachCauThu = CauThu::all();
			foreach($DanhSachCauThu as $cauthu){
				foreach($request->GiaoTrinhTap as $giaotrinh){
					if(GiaoTrinh_LuyenTap_CauThu::where('idLichLuyenTap', $request->NgayLuyenTap)->where('idGiaoTrinhTap', $giaotrinh)->where('idCauThu', $cauthu->id)->first() ) {
						return redirect('huan-luyen-vien/lich-luyen-tap/them-cau-thu-tap')->with('loi', 'Thêm lịch luyện tập cho cầu thủ không thành công. Cầu thủ này đã có bài tập này vào lịch tập đó.');
					}

					$giaotrinh_luyentap_cauthu                 = new GiaoTrinh_LuyenTap_CauThu;
					$giaotrinh_luyentap_cauthu->idLichLuyenTap = $request->NgayLuyenTap;
					$giaotrinh_luyentap_cauthu->idCauThu       = $cauthu->id;
					$giaotrinh_luyentap_cauthu->idGiaoTrinhTap = $giaotrinh;
                    $giaotrinh_luyentap_cauthu->KetQuaLuyenTap = 'Hoàn thành';
					$giaotrinh_luyentap_cauthu->save();
				}
			}
		}
		else{
			foreach($request->CauThuTap as $cauthu){
				foreach($request->GiaoTrinhTap as $giaotrinh) {

					if(GiaoTrinh_LuyenTap_CauThu::where('idLichLuyenTap', $request->NgayLuyenTap)->where('idGiaoTrinhTap', $giaotrinh)->where('idCauThu', $cauthu)->first() ) {
						return redirect('huan-luyen-vien/lich-luyen-tap/them-cau-thu-tap')->with('loi', 'Thêm lịch luyện tập cho cầu thủ không thành công. Cầu thủ này đã có bài tập này vào lịch tập đó.');
					}

					$giaotrinh_luyentap_cauthu = new GiaoTrinh_LuyenTap_CauThu;
					$giaotrinh_luyentap_cauthu->idLichLuyenTap = $request->NgayLuyenTap;
					$giaotrinh_luyentap_cauthu->idCauThu = $cauthu;
					$giaotrinh_luyentap_cauthu->idGiaoTrinhTap = $giaotrinh;
                    $giaotrinh_luyentap_cauthu->KetQuaLuyenTap = 'Hoàn thành';
					$giaotrinh_luyentap_cauthu->save();
				}
			}
		}
		return redirect('huan-luyen-vien/lich-luyen-tap/them-cau-thu-tap')->with('thongbao', 'Thêm lịch luyện tập cho cầu thủ thành công.');
	}

	public function getXoaCauThuTap( $idCauThu, $idNgayLuyenTap){

		$idLichLuyenTap = LichLuyenTap::select('id')->where('NgayLuyenTap', $idNgayLuyenTap)->first();
		$CacBaiTapTrongLichTapMoiCauThu = GiaoTrinh_LuyenTap_CauThu::select('id')->where('idCauThu', $idCauThu)->where('idLichLuyenTap', $idLichLuyenTap->id)->get();
		foreach($CacBaiTapTrongLichTapMoiCauThu as $idCacBaiTapTrongLichTapMoiCauThu) {
			$GiaoTrinhMuonXoa = GiaoTrinh_LuyenTap_CauThu::findOrFail($idCacBaiTapTrongLichTapMoiCauThu->id);
			$GiaoTrinhMuonXoa->delete();
		}
		return redirect('huan-luyen-vien/lich-luyen-tap')->with('thongbao', 'Xóa lịch luyện tập cho cầu thủ thành công.');
	}

	public function getSuaCauThuTap( $idCauThu, $idNgayLuyenTap){

		$idLichLuyenTap = LichLuyenTap::select('id')->where('NgayLuyenTap', $idNgayLuyenTap)->first();
		$CacBaiTapTrongLichTapMoiCauThu = GiaoTrinh_LuyenTap_CauThu::where('idCauThu', $idCauThu)->where('idLichLuyenTap', $idLichLuyenTap->id)->get();
		$NgayLuyenTap = DB::SELECT("SELECT * FROM lichluyentap WHERE lichluyentap.NgayLuyenTap >= CAST(NOW() as DATE) ORDER BY lichluyentap.NgayLuyenTap ASC");
		$CauThuTap = DB::SELECT("
									SELECT nguoidung.HoTen, cauthu.ViTriSoTruong, cauthu.id
									FROM nguoidung
									INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
									WHERE cauthu.id NOT IN (SELECT idCauThu FROM thongtinchanthuong_cauthu WHERE TinhTrangChanThuong='1')

								");
		foreach($CacBaiTapTrongLichTapMoiCauThu as $giaotrinhID){
			$ThoiLuongTap[] = GiaoTrinhTap::where('id', $giaotrinhID->idGiaoTrinhTap)->get();
		}
		$TongThoiLuongTapCauThu = 0;
		for($i=0; $i<count($ThoiLuongTap); $i++) {
			$TongThoiLuongTapCauThu = $TongThoiLuongTapCauThu + $ThoiLuongTap[$i][0]->ThoiLuongTapToiDa;
		}
		$GiaoTrinhTap = GiaoTrinhTap::all();
		return view('huanluyenvien.pages.lichluyentap.suacauthutap', compact('NgayLuyenTap', 'GiaoTrinhTap', 'CauThuTap', 'CacBaiTapTrongLichTapMoiCauThu', 'TongThoiLuongTapCauThu'));
	}
	public function postSuaCauThuTap( $idCauThu, $idNgayLuyenTap, Request $request){

		$this->validate($request, [
			'NgayLuyenTap'     => 'required',
			'CauThuTap'        => 'required',
			'GiaoTrinhTap'     => 'required'
		], 
		[
			'NgayLuyenTap.required'   => 'Ngày luyện tập không được để trống.',
			'CauThuTap.required'      => 'Bạn cần phải chọn cầu thủ.',
			'GiaoTrinhTap.required'   => 'Bạn cần phải chọn giáo trình cho cầu thủ.'               
		]);

		foreach($request->GiaoTrinhTap as $giaotrinhID){
			$ThoiLuongTap[] = GiaoTrinhTap::where('id', $giaotrinhID)->get();
		}
		$TongThoiLuongTapCauThu = 0;
		for($i=0; $i<count($ThoiLuongTap); $i++) {
			$TongThoiLuongTapCauThu = $TongThoiLuongTapCauThu + $ThoiLuongTap[$i][0]->ThoiLuongTapToiDa;
		}
		if($TongThoiLuongTapCauThu > 180){
			return redirect()->back()->with('loi', 'Cập nhật lịch luyện tập cho cầu thủ không thành công. Tổng thời lượng các bài tập quá nhiều.');
		}

		$CacBaiTapTrongLichTapMoiCauThu = GiaoTrinh_LuyenTap_CauThu::where('idCauThu', $idCauThu)->where('idLichLuyenTap', $idNgayLuyenTap)->get();


		$i=0;
		$SoLuongGiaoTrinhTapMoi = count($request->GiaoTrinhTap);
		$SoLuongGiaoTrinhTapCu  = count($CacBaiTapTrongLichTapMoiCauThu);

		if($SoLuongGiaoTrinhTapCu <= $SoLuongGiaoTrinhTapMoi){
			foreach($CacBaiTapTrongLichTapMoiCauThu as $cacbaitapcu){

				$giaotrinh_luyentap_cauthu = GiaoTrinh_LuyenTap_CauThu::find($cacbaitapcu->id);
				$giaotrinh_luyentap_cauthu->idLichLuyenTap = $request->NgayLuyenTap;
				$giaotrinh_luyentap_cauthu->idCauThu = $request->CauThuTap;
				$giaotrinh_luyentap_cauthu->idGiaoTrinhTap = $request->GiaoTrinhTap[$i];
                $giaotrinh_luyentap_cauthu->KetQuaLuyenTap = 'Hoàn thành';
				$giaotrinh_luyentap_cauthu->save();
				++$i;
			}
			if($i < $SoLuongGiaoTrinhTapMoi){
				for($j=$i; $j<$SoLuongGiaoTrinhTapMoi; $j++){
					$giaotrinh_luyentap_cauthu = new GiaoTrinh_LuyenTap_CauThu;
					$giaotrinh_luyentap_cauthu->idLichLuyenTap = $request->NgayLuyenTap;
					$giaotrinh_luyentap_cauthu->idCauThu = $request->CauThuTap;
					$giaotrinh_luyentap_cauthu->idGiaoTrinhTap = $request->GiaoTrinhTap[$j];
                    $giaotrinh_luyentap_cauthu->KetQuaLuyenTap = 'Hoàn thành';
					$giaotrinh_luyentap_cauthu->save();
				}
			}
		}
		else{

			foreach($CacBaiTapTrongLichTapMoiCauThu as $idCacBaiTapTrongLichTapMoiCauThu) {
				$GiaoTrinhMuonXoa = GiaoTrinh_LuyenTap_CauThu::findOrFail($idCacBaiTapTrongLichTapMoiCauThu->id);
				$GiaoTrinhMuonXoa->delete();
			}
			foreach($request->GiaoTrinhTap as $cacbaitapmoi){

				$giaotrinh_luyentap_cauthu = new GiaoTrinh_LuyenTap_CauThu;
				$giaotrinh_luyentap_cauthu->idLichLuyenTap = $request->NgayLuyenTap;
				$giaotrinh_luyentap_cauthu->idCauThu = $request->CauThuTap;
				$giaotrinh_luyentap_cauthu->idGiaoTrinhTap = $request->GiaoTrinhTap[$i];
				$giaotrinh_luyentap_cauthu->save();
				++$i;
			}
		}

		return redirect('huan-luyen-vien/lich-luyen-tap')->with('thongbao', 'Cập nhật lịch luyện tập cho cầu thủ thành công.');
	}










    public function getDanhSachLuyenTapDanhGia(){
        $NguoiDangNhap  = Auth::user()->id;
        $HuanLuyenVien  = DB::TABLE('huanluyenvien')->where('idNguoiDung', $NguoiDangNhap)->first();
        $idHuanLuyenVien= $HuanLuyenVien->id;

        $CauThuTapNgayHomAy = DB::SELECT("
                                        SELECT cauthu.id as idCauThu, nguoidung.HoTen, lichluyentap.NgayLuyenTap, cauthu.ViTriSoTruong, lichluyentap.CaLuyenTap
                                        FROM nguoidung
                                        INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
                                        INNER JOIN giaotrinh_luyentap_cauthu ON giaotrinh_luyentap_cauthu.idCauThu = cauthu.id
                                        INNER JOIN lichluyentap ON giaotrinh_luyentap_cauthu.idLichLuyenTap = lichluyentap.id
                                        WHERE lichluyentap.NgayLuyenTap < CAST(NOW() as DATE)
                                        AND lichluyentap.idHuanLuyenVien = '$idHuanLuyenVien'
                                        GROUP BY nguoidung.HoTen, lichluyentap.NgayLuyenTap, cauthu.id, cauthu.ViTriSoTruong, lichluyentap.CaLuyenTap
                                        ORDER BY lichluyentap.NgayLuyenTap
                                    ");
        foreach($CauThuTapNgayHomAy as $data) {
            $cauthu = $data->idCauThu;
            $ngayluyentap = $data->NgayLuyenTap;
            $GiaoTrinhLuyenTapMoiCauThu[] = DB::SELECT("
                                                SELECT
                                                nguoidung.HoTen,
                                                giaotrinhtap.TenBaiTap,
                                                lichluyentap.NgayLuyenTap,
                                                cauthu.ViTriSoTruong,
                                                giaotrinh_luyentap_cauthu.id,
                                                lichluyentap.CaLuyenTap,
                                                giaotrinh_luyentap_cauthu.KetQuaLuyenTap
                                                FROM nguoidung
                                                INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
                                                INNER JOIN giaotrinh_luyentap_cauthu ON giaotrinh_luyentap_cauthu.idCauThu = cauthu.id
                                                INNER JOIN lichluyentap ON giaotrinh_luyentap_cauthu.idLichLuyenTap = lichluyentap.id
                                                INNER JOIN giaotrinhtap ON giaotrinh_luyentap_cauthu.idGiaoTrinhTap = giaotrinhtap.id
                                                 WHERE lichluyentap.NgayLuyenTap < CAST(NOW() as DATE) AND lichluyentap.NgayLuyenTap='$ngayluyentap' AND cauthu.id='$cauthu'
                                                 AND lichluyentap.idHuanLuyenVien = '$idHuanLuyenVien'
                                                ORDER BY lichluyentap.NgayLuyenTap ASC"
                                            );
        }

        return view('huanluyenvien.pages.lichluyentap.danhsachluyentapdanhgia', compact( 'GiaoTrinhLuyenTapMoiCauThu', 'CauThuTapNgayHomAy'));
    }

    public function getDanhGia($idCauThu, $idNgay){

        $NguoiDangNhap  = Auth::user()->id;
        $HuanLuyenVien  = DB::TABLE('huanluyenvien')->where('idNguoiDung', $NguoiDangNhap)->first();
        $idHuanLuyenVien= $HuanLuyenVien->id;

        $CauThuTapNgayHomAy = DB::SELECT("
                                        SELECT cauthu.id as idCauThu, nguoidung.HoTen, lichluyentap.NgayLuyenTap, cauthu.ViTriSoTruong, lichluyentap.CaLuyenTap, lichluyentap.id as idLichLuyenTap
                                        FROM nguoidung
                                        INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
                                        INNER JOIN giaotrinh_luyentap_cauthu ON giaotrinh_luyentap_cauthu.idCauThu = cauthu.id
                                        INNER JOIN lichluyentap ON giaotrinh_luyentap_cauthu.idLichLuyenTap = lichluyentap.id
                                        WHERE lichluyentap.NgayLuyenTap = '$idNgay' AND cauthu.id = '$idCauThu'
                                        AND lichluyentap.idHuanLuyenVien = '$idHuanLuyenVien'
                                        GROUP BY nguoidung.HoTen, lichluyentap.NgayLuyenTap, cauthu.id, cauthu.ViTriSoTruong, lichluyentap.CaLuyenTap
                                        ORDER BY lichluyentap.NgayLuyenTap
                                    ");
        foreach($CauThuTapNgayHomAy as $data) {

            $GiaoTrinhLuyenTapMoiCauThu[] = DB::SELECT("
                                                SELECT
                                                nguoidung.HoTen,
                                                giaotrinhtap.TenBaiTap,
                                                lichluyentap.NgayLuyenTap,
                                                cauthu.ViTriSoTruong,
                                                giaotrinh_luyentap_cauthu.id,
                                                lichluyentap.CaLuyenTap,
                                                giaotrinh_luyentap_cauthu.KetQuaLuyenTap
                                                FROM nguoidung
                                                INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
                                                INNER JOIN giaotrinh_luyentap_cauthu ON giaotrinh_luyentap_cauthu.idCauThu = cauthu.id
                                                INNER JOIN lichluyentap ON giaotrinh_luyentap_cauthu.idLichLuyenTap = lichluyentap.id
                                                INNER JOIN giaotrinhtap ON giaotrinh_luyentap_cauthu.idGiaoTrinhTap = giaotrinhtap.id
                                                WHERE lichluyentap.NgayLuyenTap = '$idNgay' AND cauthu.id = '$idCauThu'
                                                 AND lichluyentap.idHuanLuyenVien = '$idHuanLuyenVien'
                                                ORDER BY lichluyentap.NgayLuyenTap ASC"
                                            );
        }

        return view('huanluyenvien.pages.lichluyentap.danhgialuyentap', compact( 'GiaoTrinhLuyenTapMoiCauThu', 'CauThuTapNgayHomAy', 'idCauThu', 'idNgay'));
        
    }

    public function postDanhGia($idCauThu, $idLich, Request $request){

        $i = 0;
        $CacBaiTap = GiaoTrinh_LuyenTap_CauThu::where('idCauThu',$idCauThu)->where('idLichLuyenTap', $idLich)->get() ;

        foreach($CacBaiTap as $baitap_can_danhgia){
 
                $giaotrinh_luyentap_cauthu                 = GiaoTrinh_LuyenTap_CauThu::findOrFail($baitap_can_danhgia->id);
                $giaotrinh_luyentap_cauthu->KetQuaLuyenTap = $request->DanhGia[$i];
                $giaotrinh_luyentap_cauthu->save();
                $i++;
            
        }

        return redirect('huan-luyen-vien/luyen-tap/danh-sach')->with('thongbao', 'Đánh giá quá trình tập luyện cầu thủ thành công.');
        
    }









	#-------------------------------------------------------------------------------------------------------------#
    #---------------------------------------------- Giáo trình tập -----------------------------------------------#
    #-------------------------------------------------------------------------------------------------------------#

	public function getGiaoTrinhTap(){
		$GiaoTrinhTap = GiaoTrinhTap::orderBy('id', 'DESC')->get();
		return view('huanluyenvien.pages.giaotrinhtap', compact('GiaoTrinhTap'));
	}

	public function getThemGiaoTrinhTap(){
		return view('huanluyenvien.pages.giaotrinhtap.them');
	}
	public function postThemGiaoTrinhTap(Request $request){
		$this->validate($request, [
			'TenBaiTap'              => 'required | unique:giaotrinhtap,TenBaiTap',
			'ThoiLuongLuyenTapToiDa' => 'required | numeric',
			'NoiDungBaiTap'          => 'required'
		], 
		[
			'TenBaiTap.required'     => 'Tên bài tập không được để trống',
			'TenBaiTap.unique'       => 'Tên bài tập này đã có trong cơ sỡ dữ liệu.',
			'ThoiLuongLuyenTapToiDa.required'     => 'Thời lượng tập không được để trống',
			'ThoiLuongLuyenTapToiDa.numeric'      => 'Thời lượng tập bắt buộc là số và không có kí tự đặc biệt.',
			'NoiDungBaiTap.required' => 'Nội dung bài tập không được để trống',
		]);
		$giaotrinh = new GiaoTrinhTap;
		$giaotrinh->TenBaiTap = $request->TenBaiTap;
		$giaotrinh->ThoiLuongTapToiDa = $request->ThoiLuongLuyenTapToiDa;
		$giaotrinh->NoiDungBaiTap = $request->NoiDungBaiTap;
		$giaotrinh->save();
		return redirect('huan-luyen-vien/giao-trinh-tap')->with('thongbao', 'Thêm giáo trình tập thành công.');
	}

	public function getXoaGiaoTrinhTap( $idGiaoTrinh){
		$kiemtraGiaoTrinhCanXoa = GiaoTrinh_LuyenTap_CauThu::where('idGiaoTrinhTap', $idGiaoTrinh)->count();
		if($kiemtraGiaoTrinhCanXoa > 0){
			return redirect('huan-luyen-vien/giao-trinh-tap')->with('loi', 'Xóa giáo trình tập không thành công. Giáo trình đã có cầu thủ tập.');
		}
		else{
			$giaotrinh = GiaoTrinhTap::find($idGiaoTrinh);
			$giaotrinh->delete($idGiaoTrinh);
			return redirect('huan-luyen-vien/giao-trinh-tap')->with('thongbao', 'Xóa giáo trình tập thành công.');
		}
	}

	public function getSuaGiaoTrinhTap( $idGiaoTrinh){
		$GiaoTrinh = GiaoTrinhTap::findOrFail($idGiaoTrinh);
		return view('huanluyenvien.pages.giaotrinhtap.sua', compact('GiaoTrinh'));
	}
	public function postSuaGiaoTrinhTap( $idGiaoTrinh, Request $request){
		$this->validate($request, [
			'TenBaiTap'     => 'required | unique:giaotrinhtap,TenBaiTap,'.$idGiaoTrinh.',id',
			'ThoiLuongLuyenTapToiDa' => 'required | numeric',
			'NoiDungBaiTap' => 'required'
		], 
		[
			'TenBaiTap.required'     => 'Tên bài tập không được để trống',
			'TenBaiTap.unique'       => 'Tên bài tập này đã có trong cơ sỡ dữ liệu.',
			'ThoiLuongLuyenTapToiDa.required'     => 'Thời lượng tập không được để trống',
			'ThoiLuongLuyenTapToiDa.numeric'      => 'Thời lượng tập bắt buộc là số và không có kí tự đặc biệt.',
			'NoiDungBaiTap.required' => 'Nội dung bài tập không được để trống',
		]);
		$giaotrinh = GiaoTrinhTap::find($idGiaoTrinh);
		$giaotrinh->TenBaiTap = $request->TenBaiTap;
		$giaotrinh->ThoiLuongTapToiDa = $request->ThoiLuongLuyenTapToiDa;
		$giaotrinh->NoiDungBaiTap = $request->NoiDungBaiTap;
		$giaotrinh->save();
		return redirect('huan-luyen-vien/giao-trinh-tap')->with('thongbao', 'Cập nhật giáo trình tập thành công.');
	}



    #-------------------------------------------------------------------------------------------------------------#
    #--------------------------------------------- Đội hình chiến thuật ------------------------------------------#
    #-------------------------------------------------------------------------------------------------------------#



	public function getDoiHinhChienThuat(){

		$DanhSachCacTranDau = DB::SELECT("
											SELECT
											trandau.id,
											trandau.VongDau,
											trandau.NgayThiDau,
											tiso.TiSo,
											caulacbo.TenDayDu,
											caulacbo.HinhAnhCauLacBo,
											doihinh.TenDoiHinh,
											chienthuat.TenChienThuat
											FROM trandau
											LEFT JOIN doihinh ON trandau.idDoiHinh = doihinh.id
											LEFT JOIN chienthuat ON trandau.idChienThuat = chienthuat.id
											INNER JOIN tiso ON tiso.idTranDau = trandau.id
											INNER JOIN caulacbo ON tiso.idCauLacBo = caulacbo.id
											WHERE trandau.TranDauCuaCLB='1'
											ORDER BY  trandau.NgayThiDau DESC, TiSo.id ASC
										");

		$TranDauTiepTheo = DB::SELECT("
                                            SELECT
                                            caulacbo.TenDayDu,
                                            caulacbo.HinhAnhCauLacBo_lon,
                                            tiso.TiSo,
                                            trandau.VongDau,
                                            trandau.NgayThiDau,
                                            trandau.GioThiDau,
                                            trandau.DiaDiem,
                                            trandau.id
                                            FROM caulacbo
                                            INNER JOIN tiso ON tiso.idCauLacBo = caulacbo.id
                                            INNER JOIN trandau ON tiso.idTranDau = trandau.id
                                            WHERE tiso.TiSo IS NULL AND trandau.TranDauCuaCLB='1'
                                            ORDER BY trandau.NgayThiDau ASC, TiSo.id ASC
                                            LIMIT 2
                                        ");
		return view('huanluyenvien.pages.doihinhchienthuat', compact('DanhSachCacTranDau', 'TranDauTiepTheo'));
	}

	public function getXemDoiHinhChienThuat( $idTranDau){
		$TranDauMuonXem = DB::SELECT("
                                            SELECT
                                            caulacbo.TenDayDu,
                                            caulacbo.HinhAnhCauLacBo_lon,
                                            tiso.TiSo,
                                            trandau.VongDau,
                                            trandau.NgayThiDau,
                                            trandau.GioThiDau,
                                            trandau.DiaDiem,
                                            trandau.id
                                            FROM caulacbo
                                            INNER JOIN tiso ON tiso.idCauLacBo = caulacbo.id
                                            INNER JOIN trandau ON tiso.idTranDau = trandau.id
                                            WHERE trandau.id='$idTranDau' 
                                            LIMIT 2
                                        ");
        if(!empty($TranDauMuonXem)){
            $DoiHinhChienThuat = DB::SELECT("
                                                SELECT
                                                doihinh.TenDoiHinh,
                                                doihinh.HinhAnhDoiHinh,
                                                chienthuat.TenChienThuat,
                                                chienthuat.NoiDungChienThuat,
                                                trandau.VongDau
                                                FROM
                                                trandau
                                                INNER JOIN doihinh ON trandau.idDoiHinh = doihinh.id
                                                INNER JOIN chienthuat ON trandau.idChienThuat = chienthuat.id
												WHERE trandau.id = '$idTranDau'
												
												
                                            ");
            $CauThuRaSan = DB::SELECT("
                                        SELECT
                                        nguoidung.HoTen,
                                        cauthu.SoAo,
                                        cauthu.id,
                                        vitri.TenViTri,
                                        doihinh.TenDoiHinh,
                                        vitri_cauthu_trandau.NhiemVuCauThu
                                        FROM
                                        nguoidung
                                        LEFT JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
                                        LEFT JOIN vitri_cauthu_trandau ON vitri_cauthu_trandau.idCauThu = cauthu.id
                                        LEFT JOIN vitri ON vitri_cauthu_trandau.idViTri = vitri.id
                                        INNER JOIN trandau ON vitri_cauthu_trandau.idTranDau = trandau.id
                                        INNER JOIN doihinh ON trandau.idDoiHinh = doihinh.id
										WHERE trandau.id = '$idTranDau'
										ORDER BY vitri_cauthu_trandau.id ASC
                                    ");
            $VaiTroCauThu = DB::SELECT("
                                        SELECT
                                        vaitro.TenVaiTro,
                                        cauthu.id
                                        FROM
                                        cauthu
                                        INNER JOIN vaitro_cauthu_trandau ON vaitro_cauthu_trandau.idCauThu = cauthu.id
                                        INNER JOIN vaitro ON vaitro_cauthu_trandau.idVaiTro = vaitro.id
                                        INNER JOIN trandau ON vaitro_cauthu_trandau.idTranDau = trandau.id
                                        WHERE trandau.id = '$idTranDau'
                                    ");
            return view('huanluyenvien.pages.doihinhchienthuat.xem', compact('DoiHinhChienThuat', 'TranDauMuonXem', 'CauThuRaSan', 'VaiTroCauThu'));
        }
        return view('huanluyenvien.pages.doihinhchienthuat.xem', compact('TranDauMuonXem'));
	}

























	public function getSapXepDoiHinhChienThuat( $idTranDau){

		$TranDauMuonSapXep = DB::SELECT("
                                            SELECT
                                            caulacbo.TenDayDu,
                                            caulacbo.HinhAnhCauLacBo_lon,
                                            tiso.TiSo,
                                            trandau.VongDau,
                                            trandau.NgayThiDau,
                                            trandau.GioThiDau,
                                            trandau.DiaDiem,
                                            trandau.id
                                            FROM caulacbo
                                            INNER JOIN tiso ON tiso.idCauLacBo = caulacbo.id
                                            INNER JOIN trandau ON tiso.idTranDau = trandau.id
                                            WHERE trandau.id='$idTranDau'
                                            LIMIT 2
                                        ");

		$CauThuDuocRaSan = DB::SELECT("
										SELECT
										nguoidung.HoTen,
										cauthu.id,
										cauthu.ChieuCao,
										cauthu.CanNang,
										cauthu.ViTriSoTruong,
										cauthu.SoAo,
										cauthu.ChanThuan,
										cauthu.LuocSuCauThu,
										cauthu.idNguoiDung,
										vitri.TenViTri,
										vitri.id AS ViTriID,
										phongdo.ChiSoPhongDo
										FROM
										nguoidung
										INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
										INNER JOIN vitri_cauthu ON vitri_cauthu.idCauThu = cauthu.id
										INNER JOIN vitri ON vitri_cauthu.idViTri = vitri.id
										INNER JOIN phongdo_cauthu ON phongdo_cauthu.idCauThu = cauthu.id
										INNER JOIN phongdo ON phongdo_cauthu.idPhongDo = phongdo.id
										WHERE
										cauthu.id NOT IN ((SELECT idCauThu FROM thongtinchanthuong_cauthu WHERE TinhTrangChanThuong='1'  AND TinhTrangRaSan='0'))
										ORDER BY phongdo.ChiSoPhongDo DESC
									");

        $CauThuBiChanThuong = DB::SELECT("
                                        SELECT
                                        cauthu.id
                                        FROM
                                        cauthu
                                        WHERE
                                        cauthu.id IN ((SELECT idCauThu FROM thongtinchanthuong_cauthu WHERE TinhTrangChanThuong='1' AND TinhTrangRaSan='1'))
                                    ");

		$CauThuPhongDoCao = DB::SELECT("
										SELECT
										nguoidung.HoTen,
										cauthu.*,
										phongdo.ChiSoPhongDo
										FROM nguoidung
										INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
										INNER JOIN phongdo_cauthu ON phongdo_cauthu.idCauThu = cauthu.id
										INNER JOIN phongdo ON phongdo_cauthu.idPhongDo = phongdo.id
										WHERE cauthu.id NOT IN ((SELECT idCauThu FROM thongtinchanthuong_cauthu WHERE TinhTrangChanThuong='1'  AND TinhTrangRaSan='0'))
										ORDER BY phongdo.ChiSoPhongDo DESC		
								");

		$ViTriDoiHinh = DB::SELECT("
										SELECT vitri.*
										FROM doihinh
										INNER JOIN vitri_doihinh ON vitri_doihinh.idDoiHinh = doihinh.id
										INNER JOIN vitri ON vitri_doihinh.idViTri = vitri.id
										WHERE doihinh.id='1'
									");

		$TranDauGanDay 	= DB::SELECT("
										SELECT
										caulacbo.TenDayDu,
										tiso.TiSo,
										trandau.id
										FROM caulacbo
										INNER JOIN tiso ON tiso.idCauLacBo = caulacbo.id
										INNER JOIN trandau ON tiso.idTranDau = trandau.id
										WHERE tiso.TiSo IS NOT Null AND  trandau.TranDauCuaCLB='1'
										ORDER BY trandau.NgayThiDau DESC, tiso.id ASC
										LIMIT 2"
									);
		if(!empty($TranDauGanDay)){
			$idTranDauGanDay= $TranDauGanDay[0]->id;
		}
		else{
			$idTranDauGanDay= '1';
		}

		$ThePhatCauThu = DB::SELECT("
										SELECT
										nguoidung.HoTen,
										cauthu.id as idCauThu,
										SUM(thanhtichcauthu.TheVang) as TongTheVang,
										SUM(thanhtichcauthu.TheDo) as TongTheDo
										FROM nguoidung
										INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
										INNER JOIN thanhtichcauthu ON thanhtichcauthu.idCauThu = cauthu.id
										WHERE thanhtichcauthu.idTranDau='$idTranDauGanDay'
										GROUP BY cauthu.id, nguoidung.HoTen		
									");

		$TongThePhatCauThu = DB::SELECT("
									SELECT
									nguoidung.HoTen,
									cauthu.id as idCauThu,
									SUM(thanhtichcauthu.TheVang) as TongTheVang,
									SUM(thanhtichcauthu.TheDo) as TongTheDo
									FROM nguoidung
									INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
									INNER JOIN thanhtichcauthu ON thanhtichcauthu.idCauThu = cauthu.id
									GROUP BY cauthu.id, nguoidung.HoTen		
								");
								
		$CauThuDuBi 	= DB::SELECT("
									SELECT
									vitri_cauthu_trandau.idCauThu,
									vitri_cauthu_trandau.idViTri,
									vitri_cauthu_trandau.idTranDau
									FROM trandau
									INNER JOIN vitri_cauthu_trandau ON vitri_cauthu_trandau.idTranDau = trandau.id
									WHERE trandau.id='$idTranDauGanDay'
								");

		$CauThuDuBiDanhSach = DB::SELECT("
								SELECT
								nguoidung.HoTen,
								cauthu.*
								FROM
								nguoidung
								INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
								WHERE cauthu.id NOT IN (SELECT idCauThu FROM thongtinchanthuong_cauthu WHERE TinhTrangChanThuong='1'  AND TinhTrangRaSan='0')	

						");

		$VaiTroCauThu = VaiTro::all();
		$DoiHinh      = DoiHinh::all();
		$ChienThuat   = ChienThuat::all();

		$VaiTroCauThuDB = VaiTro_CauThu::all();

        $ThongKeCauThuGhiBanChart = DB::SELECT("
                                        SELECT
                                        nguoidung.HoTen,
                                        SUM(thanhtichcauthu.SoBanThang) AS SoBanThang,
                                        SUM(thanhtichcauthu.SoKienTao) AS SoKienTao
                                        FROM cauthu
                                        INNER JOIN nguoidung ON cauthu.idNguoiDung = nguoidung.id
                                        INNER JOIN thanhtichcauthu ON thanhtichcauthu.idCauThu = cauthu.id
                                        GROUP BY nguoidung.HoTen
                                        ORDER BY SoBanThang DESC, SoKienTao DESC
                                        LIMIT 6
									");
		if(empty( $ThongKeCauThuGhiBanChart)){
			$ThongKeCauThuGhiBanChart[] = (object)[
													'HoTen'=>'Chưa xác định',
													'SoBanThang'=>0,
													'SoKienTao'=>0
												];
		}
        foreach ($ThongKeCauThuGhiBanChart as $ThongKe){
            $CauThuGhiBanChart[] = $ThongKe->HoTen;
            $SoBanThangChart[] = $ThongKe->SoBanThang;
            $SoKienTaoChart[] = $ThongKe->SoKienTao;
        }
        $CauThuGhiBanChart = json_encode($CauThuGhiBanChart);
        $SoBanThangChart = json_encode($SoBanThangChart);
        $SoKienTaoChart = json_encode($SoKienTaoChart);



        $ThongKeCauThuCoDiemSoCao = DB::SELECT("
                                        SELECT
                                        nguoidung.HoTen,
                                        AVG(thanhtichcauthu.DiemSo) AS DiemSo
                                        FROM cauthu
                                        INNER JOIN nguoidung ON cauthu.idNguoiDung = nguoidung.id
                                        INNER JOIN thanhtichcauthu ON thanhtichcauthu.idCauThu = cauthu.id
                                        GROUP BY nguoidung.HoTen
                                        ORDER BY DiemSo DESC
                                        LIMIT 6
									");
		if(empty( $ThongKeCauThuCoDiemSoCao)){
			$ThongKeCauThuCoDiemSoCao[] = (object)[
													'HoTen'=>'Chưa xác định',
													'DiemSo'=>0,
												];
		}							
        foreach ($ThongKeCauThuCoDiemSoCao as $ThongKe){
            $CauThuDiemChart[] = $ThongKe->HoTen;
            $DiemTrungBinhChart[] = $ThongKe->DiemSo;
        }
        $CauThuDiemChart = json_encode($CauThuDiemChart);
        $DiemTrungBinhChart = json_encode($DiemTrungBinhChart);



        $DoiHinhThuNhatChart = DoiHinh::orderBy('SoTranThang', 'DESC')->first();
        $DoiHinhThuHaiChart = DoiHinh::orderBy('SoTranThang', 'DESC')->skip(1)->take(1)->first();
        $DoiHinhThuBaChart = DoiHinh::orderBy('SoTranThang', 'DESC')->skip(2)->take(1)->first();


		
		return view('huanluyenvien.pages.doihinhchienthuat.sapxep', compact('ThePhatCauThu', 'TongThePhatCauThu', 'CauThuDuBi', 'CauThuDuBiDanhSach', 'CauThuPhongDoCao', 'VaiTroCauThuDB', 'idTranDau', 'TranDauMuonSapXep', 'DoiHinh', 'ChienThuat', 'CauThuDuocRaSan', 'ViTriDoiHinh', 'VaiTroCauThu', 'CauThuGhiBanChart', 'SoBanThangChart', 'CauThuDiemChart', 'DiemTrungBinhChart', 'DoiHinhThuNhatChart', 'DoiHinhThuHaiChart', 'DoiHinhThuBaChart', 'SoKienTaoChart', 'CauThuBiChanThuong'));
	}




	public function postSapXepDoiHinhChienThuat( $idTranDau, Request $request){

		if($request->DoiHinh === 'ChuaChon'){
			return redirect()->back()->with('loi', 'Sắp xếp đội hình chiến thuật không thành công. Bạn chưa chọn đội hình.');
		}
		if($request->ChienThuat === 'ChuaChon'){
			return redirect()->back()->with('loi', 'Sắp xếp đội hình chiến thuật không thành công. Bạn chưa chọn chiến thuật.');
		}
		for($i=0; $i<count($request->CauThuNhanVaiTro); $i++) {
			if($request->CauThuNhanVaiTro[$i] === 'ChonCauThuNhanVaiTro'){
				return redirect()->back()->with('loi', 'Sắp xếp đội hình chiến thuật không thành công. Bạn cần chọn tất cả vai trò cầu thủ.');
			}
		}	
		for($i=0; $i<count($request->CauThu); $i++){
			if($request->CauThu[$i] === 'ChonCauThu'){
				return redirect()->back()->with('loi', 'Sắp xếp đội hình chiến thuật không thành công. Bạn chọn không đủ cầu thủ ra sân.');
			}
			for($j=$i+1; $j<count($request->CauThu); $j++){
				if($request->CauThu[$j] == $request->CauThu[$i]){
					return redirect()->back()->with('loi', 'Sắp xếp đội hình chiến thuật không thành công. Không thể có cầu thủ trùng nhau.');
				}
			}
		}
		$TranDauGanDay 	= DB::SELECT("
										SELECT
										caulacbo.TenDayDu,
										tiso.TiSo,
										trandau.id
										FROM caulacbo
										INNER JOIN tiso ON tiso.idCauLacBo = caulacbo.id
										INNER JOIN trandau ON tiso.idTranDau = trandau.id
										WHERE tiso.TiSo IS NOT Null AND  trandau.TranDauCuaCLB='1'
										ORDER BY trandau.NgayThiDau DESC, tiso.id ASC
										LIMIT 2"
									);
		if(!empty($TranDauGanDay)){
			$idTranDauGanDay= $TranDauGanDay[0]->id;
		}
		else{
			$idTranDauGanDay= '1';
		}
		$ThePhatCauThu = DB::SELECT("
										SELECT
										nguoidung.HoTen,
										cauthu.id as idCauThu,
										SUM(thanhtichcauthu.TheVang) as TongTheVang,
										SUM(thanhtichcauthu.TheDo) as TongTheDo
										FROM nguoidung
										INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
										INNER JOIN thanhtichcauthu ON thanhtichcauthu.idCauThu = cauthu.id
										WHERE thanhtichcauthu.idTranDau='$idTranDauGanDay'
										GROUP BY cauthu.id, nguoidung.HoTen		
									");
		foreach($request->CauThu as $cauthu){
			foreach($ThePhatCauThu as $thephat){
				if($cauthu == $thephat->idCauThu && $thephat->TongTheDo!=0){
					return redirect()->back()->with('loi', 'Không thể chọn cầu thủ đã bị thẻ đỏ ở trận trước.');
				}
				if($cauthu == $thephat->idCauThu && $thephat->TongTheVang==2){
					return redirect()->back()->with('loi', 'Không thể chọn cầu thủ đã bị 2 thẻ vàng ở trận trước.');
				}
			}
		}
		
		$TranDau 				= TranDau::findOrFail($idTranDau);
		$TranDau->idDoiHinh 	= $request->DoiHinh;
		$TranDau->idChienThuat 	= $request->ChienThuat;
		$TranDau->save();

		$VaiTro = VaiTro::where('TenVaiTro', '<>', 'Dự bị')->orWhere('TenVaiTro', '<>', 'Dự Bị')->get();$i=0;
		foreach($request->CauThuNhanVaiTro as $cauthu) {
			$VaiTroCauThuTranDau 			= new VaiTroCauThuTranDau;
			$VaiTroCauThuTranDau->idCauThu 	= $cauthu;
			$VaiTroCauThuTranDau->idVaiTro 	= $VaiTro[$i]->id;
			$VaiTroCauThuTranDau->idTranDau = $idTranDau;
			$VaiTroCauThuTranDau->save();
			++$i;
		}

		$ViTriDoiHinh = ViTriDoiHinh::where('idDoiHinh', $TranDau->idDoiHinh)->get();$i=0;
		foreach($request->CauThu as $cauthu){
			if($i<11){
				$ViTriCauThuTranDau                     = new ViTriCauThuTranDau;
				$ViTriCauThuTranDau->idCauThu 	        = $request->CauThu[10-$i];
				$ViTriCauThuTranDau->idViTri 	        = $ViTriDoiHinh[$i]->idViTri;
				$ViTriCauThuTranDau->idTranDau          = $idTranDau;
                $ViTriCauThuTranDau->NhiemVuCauThu      = $request->NhiemVuCauThu[10-$i];
				$ViTriCauThuTranDau->save();
				++$i;	
			}
			else{
				$ViTriCauThuTranDau             = new ViTriCauThuTranDau;
				$ViTriCauThuTranDau->idCauThu 	= $cauthu;
				$ViTriCauThuTranDau->idTranDau  = $idTranDau;
				$ViTriCauThuTranDau->save();
				++$i;		
			}
		}

		return redirect('huan-luyen-vien/doi-hinh-chien-thuat')->with('thongbao', 'Sắp xếp đội hình chiến thuật trận đấu thành công.');

	}













	public function getSuaDoiHinhChienThuat( $idTranDau){
		
		$TranDauMuonSapXep = DB::SELECT("
                                            SELECT
                                            caulacbo.TenDayDu,
                                            caulacbo.HinhAnhCauLacBo_lon,
                                            tiso.TiSo,
                                            trandau.VongDau,
                                            trandau.NgayThiDau,
                                            trandau.GioThiDau,
                                            trandau.DiaDiem,
                                            trandau.id
                                            FROM caulacbo
                                            INNER JOIN tiso ON tiso.idCauLacBo = caulacbo.id
                                            INNER JOIN trandau ON tiso.idTranDau = trandau.id
                                            WHERE trandau.id='$idTranDau'
                                            LIMIT 2
                                        ");

		$CauThuDuocRaSan = DB::SELECT("
										SELECT
										nguoidung.HoTen,
										cauthu.id,
										cauthu.ChieuCao,
										cauthu.CanNang,
										cauthu.ViTriSoTruong,
										cauthu.SoAo,
										cauthu.ChanThuan,
										cauthu.LuocSuCauThu,
										cauthu.idNguoiDung,
										vitri.TenViTri,
										vitri.id AS ViTriID,
										phongdo.ChiSoPhongDo
										FROM
										nguoidung
										INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
										INNER JOIN vitri_cauthu ON vitri_cauthu.idCauThu = cauthu.id
										INNER JOIN vitri ON vitri_cauthu.idViTri = vitri.id
										INNER JOIN phongdo_cauthu ON phongdo_cauthu.idCauThu = cauthu.id
										INNER JOIN phongdo ON phongdo_cauthu.idPhongDo = phongdo.id
										WHERE
										cauthu.id NOT IN ((SELECT idCauThu FROM thongtinchanthuong_cauthu WHERE TinhTrangChanThuong='1'  AND TinhTrangRaSan='0'))
										ORDER BY phongdo.ChiSoPhongDo DESC
									");

        $CauThuBiChanThuong = DB::SELECT("
                                        SELECT
                                        cauthu.id
                                        FROM
                                        cauthu
                                        WHERE
                                        cauthu.id IN ((SELECT idCauThu FROM thongtinchanthuong_cauthu WHERE TinhTrangChanThuong='1'  AND TinhTrangRaSan='1'))
                                    ");
		
		$CauThuDuBiDanhSach = DB::SELECT("
									SELECT
									nguoidung.HoTen,
									cauthu.*
									FROM
									nguoidung
									INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
									WHERE cauthu.id NOT IN (SELECT idCauThu FROM thongtinchanthuong_cauthu WHERE TinhTrangChanThuong='1'  AND TinhTrangRaSan='0')	

							");

		$ViTriDoiHinh = DB::SELECT("
										SELECT vitri.*
										FROM doihinh
										INNER JOIN vitri_doihinh ON vitri_doihinh.idDoiHinh = doihinh.id
										INNER JOIN vitri ON vitri_doihinh.idViTri = vitri.id
										WHERE doihinh.id='1'
									");



		$VaiTroCauThu = VaiTro::all();
		$DoiHinh      = DoiHinh::all();
		$ChienThuat   = ChienThuat::all();

		

        $ThongKeCauThuGhiBanChart = DB::SELECT("
                                        SELECT
                                        nguoidung.HoTen,
                                        SUM(thanhtichcauthu.SoBanThang) AS SoBanThang,
                                        SUM(thanhtichcauthu.SoKienTao) AS SoKienTao
                                        FROM cauthu
                                        INNER JOIN nguoidung ON cauthu.idNguoiDung = nguoidung.id
                                        INNER JOIN thanhtichcauthu ON thanhtichcauthu.idCauThu = cauthu.id
                                        GROUP BY nguoidung.HoTen
                                        ORDER BY SoBanThang DESC, SoKienTao DESC
                                        LIMIT 6
									");
		if(empty( $ThongKeCauThuGhiBanChart)){
			$ThongKeCauThuGhiBanChart[] = (object)[
													'HoTen'=>'Chưa xác định',
													'SoBanThang'=>0,
													'SoKienTao'=>0
												];
		}
        foreach ($ThongKeCauThuGhiBanChart as $ThongKe){
            $CauThuGhiBanChart[] = $ThongKe->HoTen;
            $SoBanThangChart[] = $ThongKe->SoBanThang;
            $SoKienTaoChart[] = $ThongKe->SoKienTao;
        }
        $CauThuGhiBanChart = json_encode($CauThuGhiBanChart);
        $SoBanThangChart = json_encode($SoBanThangChart);
        $SoKienTaoChart = json_encode($SoKienTaoChart);



        $ThongKeCauThuCoDiemSoCao = DB::SELECT("
                                        SELECT
                                        nguoidung.HoTen,
                                        AVG(thanhtichcauthu.DiemSo) AS DiemSo
                                        FROM cauthu
                                        INNER JOIN nguoidung ON cauthu.idNguoiDung = nguoidung.id
                                        INNER JOIN thanhtichcauthu ON thanhtichcauthu.idCauThu = cauthu.id
                                        GROUP BY nguoidung.HoTen
                                        ORDER BY DiemSo DESC
                                        LIMIT 6
									");
		if(empty( $ThongKeCauThuCoDiemSoCao)){
			$ThongKeCauThuCoDiemSoCao[] = (object)[
													'HoTen'=>'Chưa xác định',
													'DiemSo'=>0,
												];
		}
        foreach ($ThongKeCauThuCoDiemSoCao as $ThongKe){
            $CauThuDiemChart[] = $ThongKe->HoTen;
            $DiemTrungBinhChart[] = $ThongKe->DiemSo;
        }
        $CauThuDiemChart = json_encode($CauThuDiemChart);
        $DiemTrungBinhChart = json_encode($DiemTrungBinhChart);

		$TranDauMuonSuaDoiHinhChienThuat   = DB::SELECT("
															SELECT
															trandau.id,
															doihinh.*,
															doihinh.id as idDoiHinh,
															chienthuat.id as idChienThuat
															FROM trandau
															INNER JOIN doihinh ON trandau.idDoiHinh = doihinh.id
															INNER JOIN chienthuat ON trandau.idChienThuat = chienthuat.id
															WHERE trandau.id='$idTranDau'
														");

		$TranDauGanDay 	= DB::SELECT("
			SELECT
			caulacbo.TenDayDu,
			tiso.TiSo,
			trandau.id
			FROM caulacbo
			INNER JOIN tiso ON tiso.idCauLacBo = caulacbo.id
			INNER JOIN trandau ON tiso.idTranDau = trandau.id
			WHERE tiso.TiSo IS NOT Null AND  trandau.TranDauCuaCLB='1'
			ORDER BY trandau.NgayThiDau DESC, tiso.id ASC
			LIMIT 2"
		);
		if(!empty($TranDauGanDay)){
			$idTranDauGanDay= $TranDauGanDay[0]->id;
		}
		else{
			$idTranDauGanDay= '1';
		}
		$ThePhatCauThu = DB::SELECT("
										SELECT
										nguoidung.HoTen,
										cauthu.id as idCauThu,
										SUM(thanhtichcauthu.TheVang) as TongTheVang,
										SUM(thanhtichcauthu.TheDo) as TongTheDo
										FROM nguoidung
										INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
										INNER JOIN thanhtichcauthu ON thanhtichcauthu.idCauThu = cauthu.id
										WHERE thanhtichcauthu.idTranDau='$idTranDauGanDay'
										GROUP BY cauthu.id, nguoidung.HoTen		
									");

		$TongThePhatCauThu = DB::SELECT("
									SELECT
									nguoidung.HoTen,
									cauthu.id as idCauThu,
									SUM(thanhtichcauthu.TheVang) as TongTheVang,
									SUM(thanhtichcauthu.TheDo) as TongTheDo
									FROM nguoidung
									INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
									INNER JOIN thanhtichcauthu ON thanhtichcauthu.idCauThu = cauthu.id
									GROUP BY cauthu.id, nguoidung.HoTen		
								");
		

		if(!empty($TranDauMuonSuaDoiHinhChienThuat[0])){

			$idTranDauMuonSuaDoiHinhChienThuat = $TranDauMuonSuaDoiHinhChienThuat[0]->id;

			$ViTriDoiHinh = DB::SELECT("
										SELECT vitri.*
										FROM doihinh
										INNER JOIN vitri_doihinh ON vitri_doihinh.idDoiHinh = doihinh.id
										INNER JOIN vitri ON vitri_doihinh.idViTri = vitri.id
										WHERE doihinh.id='$idTranDauMuonSuaDoiHinhChienThuat'
									");

		}

		$VaiTro = DB::SELECT("
									SELECT
									vaitro_cauthu_trandau.idTranDau,
									vaitro_cauthu_trandau.idVaiTro,
									vaitro_cauthu_trandau.idCauThu
									FROM trandau
									INNER JOIN vaitro_cauthu_trandau ON vaitro_cauthu_trandau.idTranDau = trandau.id
									WHERE trandau.id='$idTranDau'
								");

		$CauThu = DB::SELECT("
								SELECT
								vitri_cauthu_trandau.*
								FROM trandau
								INNER JOIN vitri_cauthu_trandau ON vitri_cauthu_trandau.idTranDau = trandau.id
								WHERE trandau.id='$idTranDau'
							");

		$DoiHinhThuNhatChart = DoiHinh::orderBy('SoTranThang', 'DESC')->first();
        $DoiHinhThuHaiChart = DoiHinh::orderBy('SoTranThang', 'DESC')->skip(1)->take(1)->first();
        $DoiHinhThuBaChart = DoiHinh::orderBy('SoTranThang', 'DESC')->skip(2)->take(1)->first();
		
		return view('huanluyenvien.pages.doihinhchienthuat.sua', compact('ThePhatCauThu', 'TongThePhatCauThu', 'idTranDau', 'CauThuDuBiDanhSach', 'TranDauMuonSapXep', 'DoiHinh', 'ChienThuat', 'CauThuDuocRaSan', 'ViTriDoiHinh', 'VaiTroCauThu', 'TranDauMuonSuaDoiHinhChienThuat', 'VaiTro', 'CauThu', 'CauThuGhiBanChart', 'SoBanThangChart', 'SoKienTaoChart', 'CauThuDiemChart', 'DiemTrungBinhChart', 'DoiHinhThuNhatChart', 'DoiHinhThuHaiChart', 'DoiHinhThuBaChart', 'CauThuBiChanThuong'));
	}








	public function postSuaDoiHinhChienThuat( $idTranDau, Request $request) {

		if($request->DoiHinh === 'ChuaChon'){
			return redirect()->back()->with('loi', 'Sắp xếp đội hình chiến thuật không thành công. Bạn chưa chọn đội hình.');
		}
		if($request->ChienThuat === 'ChuaChon'){
			return redirect()->back()->with('loi', 'Sắp xếp đội hình chiến thuật không thành công. Bạn chưa chọn chiến thuật.');
		}
		for($i=0; $i<count($request->CauThuNhanVaiTro); $i++) {
			if($request->CauThuNhanVaiTro[$i] === 'ChonCauThuNhanVaiTro'){
				return redirect()->back()->with('loi', 'Sắp xếp đội hình chiến thuật không thành công. Bạn cần chọn tất cả vai trò cầu thủ.');
			}
		}	
		for($i=0; $i<count($request->CauThu); $i++){
			if($request->CauThu[$i] === 'ChonCauThu'){
				return redirect()->back()->with('loi', 'Sắp xếp đội hình chiến thuật không thành công. Bạn chọn không đủ cầu thủ ra sân.');
			}
			for($j=$i+1; $j<count($request->CauThu); $j++){
				if($request->CauThu[$j] == $request->CauThu[$i]){
					return redirect()->back()->with('loi', 'Sắp xếp đội hình chiến thuật không thành công. Không thể có cầu thủ trùng nhau.');
				}
			}
		}

		$TranDauGanDay 	= DB::SELECT("
										SELECT
										caulacbo.TenDayDu,
										tiso.TiSo,
										trandau.id
										FROM caulacbo
										INNER JOIN tiso ON tiso.idCauLacBo = caulacbo.id
										INNER JOIN trandau ON tiso.idTranDau = trandau.id
										WHERE tiso.TiSo IS NOT Null AND  trandau.TranDauCuaCLB='1'
										ORDER BY trandau.NgayThiDau DESC, tiso.id ASC
										LIMIT 2"
									);
		if(!empty($TranDauGanDay)){
			$idTranDauGanDay= $TranDauGanDay[0]->id;
		}
		else{
			$idTranDauGanDay= '1';
		}
		$ThePhatCauThu = DB::SELECT("
										SELECT
										nguoidung.HoTen,
										cauthu.id as idCauThu,
										SUM(thanhtichcauthu.TheVang) as TongTheVang,
										SUM(thanhtichcauthu.TheDo) as TongTheDo
										FROM nguoidung
										INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
										INNER JOIN thanhtichcauthu ON thanhtichcauthu.idCauThu = cauthu.id
										WHERE thanhtichcauthu.idTranDau='$idTranDauGanDay'
										GROUP BY cauthu.id, nguoidung.HoTen		
									");
		foreach($request->CauThu as $cauthu){
			foreach($ThePhatCauThu as $thephat){
				if($cauthu == $thephat->idCauThu && $thephat->TongTheDo!=0){
					return redirect()->back()->with('loi', 'Không thể chọn cầu thủ đã bị thẻ đỏ ở trận trước.');
				}
				if($cauthu == $thephat->idCauThu && $thephat->TongTheVang==2){
					return redirect()->back()->with('loi', 'Không thể chọn cầu thủ đã bị 2 thẻ vàng ở trận trước.');
				}
			}
		}
	
		$TranDau 				= TranDau::findOrFail($idTranDau);
		$TranDau->idDoiHinh 	= $request->DoiHinh;
		$TranDau->idChienThuat 	= $request->ChienThuat;
		$TranDau->save();

		$VaiTro = VaiTro::where('TenVaiTro', '<>', 'Dự bị')->orWhere('TenVaiTro', '<>', 'Dự Bị')->get();$i=0;
		$VaiTroCauThuTranDau_DB = VaiTroCauThuTranDau::where('idTranDau', $idTranDau)->get();
		foreach($request->CauThuNhanVaiTro as $cauthu) {
			$VaiTroCauThuTranDau 			= VaiTroCauThuTranDau::findOrFail($VaiTroCauThuTranDau_DB[$i]->id);
			$VaiTroCauThuTranDau->idCauThu 	= $cauthu;
			$VaiTroCauThuTranDau->idVaiTro 	= $VaiTro[$i]->id;
			$VaiTroCauThuTranDau->idTranDau = $idTranDau;
			$VaiTroCauThuTranDau->save();
			++$i;
		}

		$ViTriDoiHinh = ViTriDoiHinh::where('idDoiHinh', $TranDau->idDoiHinh)->get();$i=0;
		$ViTriCauThuTranDau_DB = ViTriCauThuTranDau::where('idTranDau', $idTranDau)->get();
		foreach($request->CauThu as $cauthu){
			if($i<11){
				$ViTriCauThuTranDau = ViTriCauThuTranDau::findOrFail($ViTriCauThuTranDau_DB[$i]->id);
				$ViTriCauThuTranDau->idCauThu   	= $request->CauThu[10-$i];
				$ViTriCauThuTranDau->idViTri 	    = $ViTriDoiHinh[$i]->idViTri;
				$ViTriCauThuTranDau->idTranDau      = $idTranDau;
                $ViTriCauThuTranDau->NhiemVuCauThu  = $request->NhiemVuCauThu[10-$i];
				$ViTriCauThuTranDau->save();
				++$i;
			}
			else{
				if(isset($ViTriCauThuTranDau_DB[$i])){
					$ViTriCauThuTranDau = ViTriCauThuTranDau::findOrFail($ViTriCauThuTranDau_DB[$i]->id);
					$ViTriCauThuTranDau->idCauThu 	= $cauthu;
					$ViTriCauThuTranDau->idTranDau  = $idTranDau;
					$ViTriCauThuTranDau->save();
					++$i;	
				}
				else{
					$ViTriCauThuTranDau = new ViTriCauThuTranDau;
					$ViTriCauThuTranDau->idCauThu 	= $cauthu;
					$ViTriCauThuTranDau->idTranDau  = $idTranDau;
					$ViTriCauThuTranDau->save();
					++$i;	
				}	
			}
		}

		return redirect('huan-luyen-vien/doi-hinh-chien-thuat')->with('thongbao', 'Cập nhật đội hình chiến thuật trận đấu thành công.');
	}























	public function getDoiHinh(){
		$DanhSachDoiHinh = DoiHinh::all();
		return view('huanluyenvien.pages.doihinh', compact('DanhSachDoiHinh'));
	}

	public function getThemDoiHinh(){
		$ViTri = ViTri::all();
		return view('huanluyenvien.pages.doihinh.them', compact('ViTri'));
	}
	public function postThemDoiHinh( Request $request){
		$this->validate($request, [
			'TenDoiHinh'      => 'required  | unique:doihinh,TenDoiHinh',
			'HinhAnhDoiHinh'  => 'image',
		], 
		[
			'TenDoiHinh.required'          => 'Bạn cần nhập tên đội hình.',
			'TenDoiHinh.unique'            => 'Tên đội hình này đã có trong database.',
			'HinhAnhDoiHinh.image'         => 'Hình ảnh sai định dạng ( chỉ nhận ảnh đuôi *.png, *.jpeg, *.jpg).',       
		]);

		$KiemTraViTriThuMon = 0;
		$ViTriThuMon = ViTri::where('TenViTri', 'GK')->first();
		$j = 0;
		foreach($request->ViTri as $vitri) {
			if($vitri == $ViTriThuMon->id){
				$KiemTraViTriThuMon += 1; 
			}
			for($i=$j+1; $i<11; $i++){
				if($request->ViTri[$i] == $vitri) {
					return redirect()->back()->with('loi', 'Thêm không thành công. Đội hình không thể có vị trí trùng lặp.');
				}	
			}
			$j++;
		}
		if($KiemTraViTriThuMon != 1) {
			return redirect()->back()->with('loi', 'Thêm không thành công. Trong một đội hình cần có ít nhất một thủ môn.');
		}

		$doihinh 				= new DoiHinh;
		$doihinh->TenDoiHinh 	= $request->TenDoiHinh;
		$doihinh->SoTranThang 	= 0;
		$doihinh->SoTranHoa 	= 0;
		$doihinh->SoTranThua 	= 0;
		if($request->hasFile('HinhAnhDoiHinh')){
    		$image = $request->file('HinhAnhDoiHinh');
    		$duoi = $image->getClientOriginalExtension();
	        if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
	        	return redirect('huan-luyen-vien/doi-hinh/them')->with('loi',' Hình ảnh sai định dạng ( chỉ nhận ảnh đuôi *.png, *.jpeg, *.jpg).');
	        }
    		$image->move('Client/images/formations/', time().$image->getClientOriginalName());
    		$doihinh->HinhAnhDoiHinh = time().$image->getClientOriginalName();
    	}
    	else{
    		$doihinh->HinhAnhDoiHinh = 'unknown.png';
    	}
		$doihinh->save();

		foreach($request->ViTri as $vitri){
			$doihinh_vitri 				= new ViTriDoiHinh;
			$doihinh_vitri->idViTri 	= $vitri;
			$doihinh_vitri->idDoiHinh 	= $doihinh->id;
			$doihinh_vitri->save();
		}
		
		return redirect('huan-luyen-vien/doi-hinh')->with('thongbao', 'Thêm đội hình thành công.');
	}

	public function getXoaDoiHinh( $idDoiHinh){
		
		$KiemTraDoiHinhTrongTranDau = TranDau::where('idDoiHinh', $idDoiHinh)->count();
		if($KiemTraDoiHinhTrongTranDau > 0){
			return back()->with('loi', 'Xóa đội hình không thành công. Đội hình này đã được sử dụng.');
		}

		$doihinh = DoiHinh::findOrFail($idDoiHinh);
		$doihinh->delete();
		return redirect('huan-luyen-vien/doi-hinh')->with('thongbao', 'Xóa đội hình thành công.');
	}

	public function getSuaDoiHinh( $idDoiHinh){
		$ViTri = ViTri::all();
		$doihinh = DB::SELECT("
								SELECT
								doihinh.id,
								doihinh.TenDoiHinh,
								doihinh.HinhAnhDoiHinh,
								vitri.id as idViTri,
								vitri.TenViTri
								FROM doihinh
								INNER JOIN vitri_doihinh ON vitri_doihinh.idDoiHinh = doihinh.id
								INNER JOIN vitri ON vitri_doihinh.idViTri = vitri.id
								WHERE doihinh.id = '$idDoiHinh'
							");
		return view('huanluyenvien.pages.doihinh.sua', compact('doihinh', 'ViTri'));
	}
	public function postSuaDoiHinh( $idDoiHinh, Request $request){
		$this->validate($request, [
			'TenDoiHinh'      => 'required  | unique:doihinh,TenDoiHinh,'.$idDoiHinh.',id',
			'HinhAnhDoiHinh'  => 'image',
		], 
		[
			'TenDoiHinh.required'          => 'Bạn cần nhập tên đội hình.',
			'TenDoiHinh.unique'            => 'Tên đội hình này đã có trong database.',
			'HinhAnhDoiHinh.image'         => 'Hình ảnh sai định dạng ( chỉ nhận ảnh đuôi *.png, *.jpeg, *.jpg).',       
		]);

		$KiemTraViTriThuMon = 0;
		$ViTriThuMon = ViTri::where('TenViTri', 'GK')->first();
		$j = 0;
		foreach($request->ViTri as $vitri) {
			if($vitri == $ViTriThuMon->id){
				$KiemTraViTriThuMon += 1; 
			}
			for($i=$j+1; $i<11; $i++){
				if($request->ViTri[$i] == $vitri) {$j++;
					return redirect()->back()->with('loi', 'Thêm không thành công. Đội hình không thể có vị trí trùng lặp.');
				}	
			}
			$j++;
		}
		if($KiemTraViTriThuMon != 1) {
			return redirect()->back()->with('loi', 'Thêm không thành công. Trong một đội hình cần có ít nhất một thủ môn.');
		}
		
		$doihinh = DoiHinh::findOrFail($idDoiHinh);
		$doihinh->TenDoiHinh = $request->TenDoiHinh;
		if($request->hasFile('HinhAnhDoiHinh')){
    		$image = $request->file('HinhAnhDoiHinh');
    		$duoi = $image->getClientOriginalExtension();
	        if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
	        	return redirect('huan-luyen-vien/doi-hinh/them')->with('loi',' Hình ảnh sai định dạng ( chỉ nhận ảnh đuôi *.png, *.jpeg, *.jpg).');
	        }
    		$image->move('Client/images/formations/', time().$image->getClientOriginalName());
    		$doihinh->HinhAnhDoiHinh = time().$image->getClientOriginalName();
    	}
		$doihinh->save();

		$ViTriLap = 0;
		$ViTriCuaDoiHinhCanSua = ViTriDoiHinh::where('idDoiHinh', $idDoiHinh)->get();
		foreach($request->ViTri as $vitri){
			$doihinh_vitri 				= ViTriDoiHinh::find($ViTriCuaDoiHinhCanSua[$ViTriLap]->id);
			$doihinh_vitri->idViTri 	= $vitri;
			$doihinh_vitri->idDoiHinh 	= $doihinh->id;
			$doihinh_vitri->save();
			$ViTriLap++;
		}
		
		return redirect('huan-luyen-vien/doi-hinh')->with('thongbao', 'Cập nhật đội hình thành công.');
	}






	public function getChienThuat(){
		$DanhSachChienThuat = ChienThuat::all();
		return view('huanluyenvien.pages.chienthuat', compact('DanhSachChienThuat'));
	}

	public function getThemChienThuat(){
		return view('huanluyenvien.pages.chienthuat.them');
	}
	public function postThemChienThuat( Request $request){
		$this->validate($request, [
			'TenChienThuat'      => 'required  | unique:chienthuat,TenChienThuat',
			'NoiDungChienThuat'  => 'required',
		], 
		[
			'TenChienThuat.required'          => 'Bạn cần nhập tên chiến thuật.',
			'TenChienThuat.unique'            => 'Tên chiến thuật này đã có trong database.',
			'NoiDungChienThuat.required'      => 'Bạn cần phải nội dung chiến thuật.',       
		]);

		$chienthuat = new ChienThuat;
		$chienthuat->TenChienThuat = $request->TenChienThuat;
		$chienthuat->NoiDungChienThuat = $request->NoiDungChienThuat;
		$chienthuat->save();
		
		return redirect('huan-luyen-vien/chien-thuat')->with('thongbao', 'Thêm chiến thuật thành công.');
	}

	public function getXoaChienThuat( $idChienThuat){

		$KiemTraChienThuatTrongTranDau = TranDau::where('idChienThuat', $idChienThuat)->count();
		if($KiemTraChienThuatTrongTranDau > 0){
			return back()->with('loi', 'Xóa chiến thuật không thành công. Chiến thuật này đã được sử dụng.');
		}

		$chienthuat = ChienThuat::findOrFail($idChienThuat);
		$chienthuat->delete();
		return redirect('huan-luyen-vien/chien-thuat')->with('thongbao', 'Xóa chiến thuật thành công.');
	}

	public function getSuaChienThuat( $idChienThuat){
		$chienthuat = ChienThuat::findOrFail($idChienThuat);
		return view('huanluyenvien.pages.chienthuat.sua', compact('chienthuat'));
	}
	public function postSuaChienThuat( $idChienThuat, Request $request){
		$this->validate($request, [
			'TenChienThuat'      => 'required  | unique:chienthuat,TenChienThuat,'. $idChienThuat . ',id',
			'NoiDungChienThuat'  => 'required',
		], 
		[
			'TenChienThuat.required'          => 'Bạn cần nhập tên chiến thuật.',
			'TenChienThuat.unique'            => 'Tên chiến thuật này đã có trong database.',
			'NoiDungChienThuat.required'      => 'Bạn cần phải nội dung chiến thuật.',       
		]);

		$chienthuat = ChienThuat::findOrFail($idChienThuat);
		$chienthuat->TenChienThuat = $request->TenChienThuat;
		$chienthuat->NoiDungChienThuat = $request->NoiDungChienThuat;
		$chienthuat->save();
		
		return redirect('huan-luyen-vien/chien-thuat')->with('thongbao', 'Cập nhật chiến thuật thành công.');
	}






	#--------------------------------------------------------------------------------------------------------------#
    #---------------------------------------------- Sức khỏe cầu thủ ----------------------------------------------#
    #--------------------------------------------------------------------------------------------------------------#

	public function getSucKhoeCauThu(){

		$CauThuDangChanThuong = DB::SELECT("
											SELECT
											nguoidung.HoTen,
											cauthu.ViTriSoTruong,
											thongtinchanthuong_cauthu.ngaychanthuong,
											chanthuong.TenChanThuong,
											chanthuong.PhanLoaiChanThuong,
											chanthuong.ThoiGianHoiPhuc
											FROM
											nguoidung
											INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
											INNER JOIN thongtinchanthuong_cauthu ON thongtinchanthuong_cauthu.idCauThu = cauthu.id
											INNER JOIN chanthuong ON thongtinchanthuong_cauthu.idChanThuong = chanthuong.id
											WHERE thongtinchanthuong_cauthu.TinhTrangChanThuong='1'
											ORDER BY thongtinchanthuong_cauthu.ngaychanthuong ASC
										");

		$ThanhTichCacCauThuHienTai = DB::SELECT("
												SELECT
												nguoidung.HoTen,
												cauthu.ViTriSoTruong,
												nguoidung.HinhDaiDien,
												phongdo.ChiSoPhongDo,
												AVG(thanhtichcauthu.DiemSo) as Diem,
												SUM(thanhtichcauthu.SoKienTao) as KienTao,
												SUM(thanhtichcauthu.SoBanThang) as BanThang
												FROM
												nguoidung
												INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
												INNER JOIN phongdo_cauthu ON phongdo_cauthu.idCauThu = cauthu.id
												INNER JOIN phongdo ON phongdo_cauthu.idPhongDo = phongdo.id
												INNER JOIN thanhtichcauthu ON thanhtichcauthu.idCauThu = cauthu.id	
												GROUP BY nguoidung.HoTen, nguoidung.HinhDaiDien, cauthu.ViTriSoTruong, phongdo.ChiSoPhongDo
												ORDER BY ChiSoPhongDo DESC, Diem DESC, BanThang DESC, KienTao DESC
										");							
		return view('huanluyenvien.pages.suckhoecauthu', compact('CauThuDangChanThuong', 'ThanhTichCacCauThuHienTai'));
	}



	
	#--------------------------------------------------------------------------------------------------------------#
	#---------------------------------------------- Vai trò cầu thủ -----------------------------------------------#
	#--------------------------------------------------------------------------------------------------------------#

	public function getVaiTroCauThu(){
		$DanhSachCauThu = CauThu::with('NguoiDung')->get();
		$VaiTroCauThu 	= DB::SELECT("
										SELECT
										vaitro.TenVaiTro,
										vaitro.id,
										vaitro_cauthu.idCauThu as idCauThu,
										nguoidung.HoTen,
										cauthu.ViTriSoTruong
										FROM
										vaitro
										INNER JOIN vaitro_cauthu ON vaitro_cauthu.idVaiTro = vaitro.id
										INNER JOIN cauthu ON vaitro_cauthu.idCauThu = cauthu.id
										INNER JOIN nguoidung ON cauthu.idNguoiDung = nguoidung.id		
									");
		return view('huanluyenvien.pages.vaitrocauthu.danhsach', compact('DanhSachCauThu', 'VaiTroCauThu'));
	}
	public function postDieuChinhVaiTroCauThu(Request $request){
		$i = 0;
		$VaiTro 		= VaiTro::where('TenVaiTro', '<>', 'Dự bị')->orWhere('TenVaiTro', '<>', 'Dự Bị')->get();
		$VaiTroCauThuDB = VaiTro_CauThu::all();
		foreach($request->VaiTroCauThu as $cauthu){
			$VaiTroDieuChinh 			= VaiTro_CauThu::findOrFail($VaiTroCauThuDB[$i]->id);
			$VaiTroDieuChinh->idVaiTro 	= $VaiTro[$i]->id;
			$VaiTroDieuChinh->idCauThu 	= $cauthu;
			$VaiTroDieuChinh->save();
			++$i;
		}
		return redirect('huan-luyen-vien/vai-tro-cau-thu')->with('thongbao', 'Chỉnh sửa vai trò thành công.');
	}



	#--------------------------------------------------------------------------------------------------------------#
	#---------------------------------------------- Vị trí cầu thủ ------------------------------------------------#
	#--------------------------------------------------------------------------------------------------------------#

	public function getViTriCauThu(){
		$DanhSachCauThu = CauThu::with('NguoiDung')->get();
		$ViTriCuaCauThu = DB::SELECT("
										SELECT
										vitri.TenViTri,
										cauthu.ViTriSoTruong,
										cauthu.id as idCauThu,
										nguoidung.HoTen
										FROM
										cauthu
										INNER JOIN nguoidung ON cauthu.idNguoiDung = nguoidung.id
										INNER JOIN vitri_cauthu ON vitri_cauthu.idCauThu = cauthu.id
										INNER JOIN vitri ON vitri_cauthu.idViTri = vitri.id
									");
		return view('huanluyenvien.pages.vitri.danhsach', compact('ViTriCuaCauThu', 'DanhSachCauThu'));
	}

	public function getDieuChinhViTriCauThu($idCauThu){
		$CauThuCanDieuChinh = CauThu::with('NguoiDung')->where('id', $idCauThu)->first();
		$ViTriCuaCauThu = DB::SELECT("
										SELECT
										vitri.TenViTri,
										vitri.id as idViTri,
										cauthu.ViTriSoTruong,
										cauthu.id as idCauThu,
										nguoidung.HoTen,
										nguoidung.NgaySinh
										FROM
										cauthu
										INNER JOIN nguoidung ON cauthu.idNguoiDung = nguoidung.id
										INNER JOIN vitri_cauthu ON vitri_cauthu.idCauThu = cauthu.id
										INNER JOIN vitri ON vitri_cauthu.idViTri = vitri.id
										WHERE cauthu.id = '$idCauThu'
									");
		$ViTri = ViTri::where('TenViTri', '<>', 'Dự bị')->orWhere('TenViTri', '<>', 'Dự Bị')->get();
		return view('huanluyenvien.pages.vitri.dieuchinh', compact('ViTriCuaCauThu', 'CauThuCanDieuChinh', 'ViTri'));
	}

	public function postDieuChinhViTriCauThu($idCauThu, Request $request){

		if(empty($request->ViTriThiDau)) {
			return redirect()->back()->with('loi', 'Một cầu thủ phải có ít nhất một vị trí thi đấu.');
		}

		$ViTriCauThuDB 	= ViTriCauThu::where('idCauThu', $idCauThu)->get();
		$SoViTriCu 		= count($ViTriCauThuDB);
		$SoViTriMoi 	= count($request->ViTriThiDau);

		if($SoViTriMoi >= $SoViTriCu){
			$SoViTri=0;
			foreach($ViTriCauThuDB as $ViTri){
				$ViTriCauThuDieuChinh 			= ViTriCauThu::findOrFail($ViTri->id);
				$ViTriCauThuDieuChinh->idCauThu = $idCauThu;
				$ViTriCauThuDieuChinh->idViTri  = $request->ViTriThiDau[$SoViTri];
				$ViTriCauThuDieuChinh->save();
				$SoViTri++;
			}
			if($SoViTri < $SoViTriMoi){
				for($j=$SoViTri; $j<$SoViTriMoi; $j++){
					$ViTriCauThuDieuChinh 			= new ViTriCauThu;
					$ViTriCauThuDieuChinh->idCauThu = $idCauThu;
					$ViTriCauThuDieuChinh->idViTri  = $request->ViTriThiDau[$j];
					$ViTriCauThuDieuChinh->save();
					$SoViTri++;
				}
			}
		}
		else{
			foreach($ViTriCauThuDB as $ViTri){
				$ViTriCauThuDieuChinh = ViTriCauThu::findOrFail($ViTri->id);
				$ViTriCauThuDieuChinh->delete();
			}
			foreach($request->ViTriThiDau as $ViTri){
				$ViTriCauThuDieuChinh 			= new ViTriCauThu;
				$ViTriCauThuDieuChinh->idCauThu = $idCauThu;
				$ViTriCauThuDieuChinh->idViTri  = $ViTri;
				$ViTriCauThuDieuChinh->save();
			}
		}

		return redirect('huan-luyen-vien/vi-tri-cau-thu')->with('thongbao', 'Điều chỉnh vị trí cầu thủ thành công.');

	}





	#--------------------------------------------------------------------------------------------------------------#
	#---------------------------------------------- Ky Năng cầu thủ -----------------------------------------------#
	#--------------------------------------------------------------------------------------------------------------#

	public function getKyNangCauThu(){

		$DanhSachCauThu = CauThu::with('NguoiDung')->get();
		$KyNangCauThu 	= DB::SELECT("
										SELECT
										cauthu.id as idCauThu,
										kynang.TenKyNang,
										cauthu.ViTriSoTruong,
										nguoidung.HoTen
										FROM
										nguoidung
										INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
										INNER JOIN kynang_cauthu ON kynang_cauthu.idCauThu = cauthu.id
										INNER JOIN kynang ON kynang_cauthu.idKyNang = kynang.id				
									");

		return view('huanluyenvien.pages.kynang.danhsach', compact('DanhSachCauThu', 'KyNangCauThu'));
	}

	public function getDieuChinhKyNangCauThu($idCauThu){

		$CauThuCanDieuChinh = CauThu::with('NguoiDung')->where('id', $idCauThu)->first();
		$KyNangCauThu 	= DB::SELECT("
										SELECT
										kynang.id as idKyNang,
										kynang.TenKyNang,
										cauthu.ViTriSoTruong,
										cauthu.id as idCauThu,
										nguoidung.HoTen
										FROM
										nguoidung
										INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
										INNER JOIN kynang_cauthu ON kynang_cauthu.idCauThu = cauthu.id
										INNER JOIN kynang ON kynang_cauthu.idKyNang = kynang.id		
										WHERE cauthu.id = '$idCauThu'		
									");
		$DanhSachKyNang = KyNang::all();

		return view('huanluyenvien.pages.kynang.dieuchinh', compact('CauThuCanDieuChinh', 'KyNangCauThu', 'DanhSachKyNang'));

	}

	public function postDieuChinhKyNangCauThu($idCauThu, Request $request){

		
		$KyNangCauThuDB 	= KyNang_CauThu::where('idCauThu', $idCauThu)->get();

		if(empty($KyNangCauThuDB) && empty($request->KyNangDieuChinh)){
			return redirect('huan-luyen-vien/ky-nang-cau-thu');
		}
		elseif(isset($request->KyNangDieuChinh)){	
			$SoKyNangCu 		= count($KyNangCauThuDB);
			$SoKyNangMoi 		= count($request->KyNangDieuChinh);

			if($SoKyNangMoi >= $SoKyNangCu){
				$SoKyNang=0;
				foreach($KyNangCauThuDB as $KyNang){
					$KyNangCauThuDieuChinh 		     = KyNang_CauThu::findOrFail($KyNang->id);
					$KyNangCauThuDieuChinh->idCauThu = $idCauThu;
					$KyNangCauThuDieuChinh->idKyNang = $request->KyNangDieuChinh[$SoKyNang];
					$KyNangCauThuDieuChinh->save();
					$SoKyNang++;
				}
				if($SoKyNang < $SoKyNangMoi){
					for($j=$SoKyNang; $j<$SoKyNangMoi; $j++){
						$KyNangCauThuDieuChinh 		     = new KyNang_CauThu;
						$KyNangCauThuDieuChinh->idCauThu = $idCauThu;
						$KyNangCauThuDieuChinh->idKyNang = $request->KyNangDieuChinh[$j];
						$KyNangCauThuDieuChinh->save();
						$SoKyNang++;
					}
				}
			}
			else{
				foreach($KyNangCauThuDB as $KyNang){
					$KyNangCauThuDieuChinh = KyNang_CauThu::findOrFail($KyNang->id);
					$KyNangCauThuDieuChinh->delete();
				}
				if($SoKyNangCu > 0){
					foreach($request->KyNangDieuChinh as $KyNang){
						$KyNangCauThuDieuChinh 		     = new KyNang_CauThu;
						$KyNangCauThuDieuChinh->idCauThu = $idCauThu;
						$KyNangCauThuDieuChinh->idKyNang = $KyNang;
						$KyNangCauThuDieuChinh->save();
					}
				}
			}

			return redirect('huan-luyen-vien/ky-nang-cau-thu')->with('thongbao', 'Điều chỉnh kỹ năng cầu thủ thành công.');

		}
		else{
			foreach($KyNangCauThuDB as $KyNang){
				$KyNangCauThuDieuChinh = KyNang_CauThu::findOrFail($KyNang->id);
				$KyNangCauThuDieuChinh->delete();
			}
			return redirect('huan-luyen-vien/ky-nang-cau-thu')->with('thongbao', 'Điều chỉnh kỹ năng cầu thủ thành công.');
		}
	}

}


