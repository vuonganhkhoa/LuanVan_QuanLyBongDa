<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendar;
use Hash;
use DB;

use App\NguoiDung;
use App\CauThu;
use App\ChanThuong;
use App\ThongTinChanThuong;
use App\PhacDoDieuTri;
use App\LichKham;
use App\ToaThuoc;
use App\Thuoc_ToaThuoc;
use App\Thuoc;
use App\TinTuc;
use App\ThongBao;
use App\GiaoTrinhTap;

class CauThuController extends Controller
{



    public function getCauThu($tenCauThu){

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

    	return view('cauthu.pages.trangchu', compact('tenCauThu', 'CacTranDauTiepTheo', 'TinTucMoiNhat', 'CacTinTucKhac', 'KetQuaTranDauGanDay'));
    }



    #------------------------------------------------------------------------------------------------------------#
    #---------------------------------------------- Thông tin cá nhân -------------------------------------------#
    #------------------------------------------------------------------------------------------------------------#

    public function getThongTinCaNhan($tenCauThu){

        $idNguoiDung = NguoiDung::select('id')->where('username', $tenCauThu)->first();
        $KiemTraCauThu = CauThu::select('id')->where('idNguoiDung', $idNguoiDung->id)->first();
        $idCauThu = $KiemTraCauThu->id;
        $CauThu = DB::SELECT("
                                SELECT
                                nguoidung.*,
                                cauthu.*
                                FROM nguoidung
                                INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
                                WHERE cauthu.id='$idCauThu'
                            ");
        $Tuoi = 0;
        if(!empty($CauThu)){
            $Tuoi = (int)date('Y') - (int)date('Y', strtotime($CauThu[0]->NgaySinh));
        }
        $ThanhTichCauThu = DB::SELECT("
                                        SELECT
                                        AVG(thanhtichcauthu.DiemSo) as Diem,
                                        SUM(thanhtichcauthu.SoDuongChuyen) as SoDuongChuyen,
                                        COUNT(thanhtichcauthu.DiemSo) as SoTran,
                                        SUM(thanhtichcauthu.SoKienTao) as SoKienTao,
                                        SUM(thanhtichcauthu.SoBanThang) as SoBanThang,
                                        SUM(thanhtichcauthu.TheVang) as SoTheVang,
                                        SUM(thanhtichcauthu.TheDo) as SoTheDo
                                        FROM cauthu
                                        INNER JOIN thanhtichcauthu ON thanhtichcauthu.idCauThu = cauthu.id
                                        WHERE cauthu.id='$idCauThu'
                                    ");

    	return view('cauthu.pages.thongtincanhan', compact('tenCauThu', 'Tuoi', 'CauThu', 'ThanhTichCauThu'));
    }

    public function getSuaThongTinCaNhan($tenCauThu){

        $idNguoiDung = NguoiDung::select('id')->where('username', $tenCauThu)->first();
        $KiemTraCauThu = CauThu::select('id')->where('idNguoiDung', $idNguoiDung->id)->first();
        $idCauThu = $KiemTraCauThu->id;

        $CauThu = DB::SELECT("
                                SELECT
                                nguoidung.*,
                                cauthu.*
                                FROM nguoidung
                                INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
                                WHERE cauthu.id='$idCauThu'
                            ");

    	return view('cauthu.pages.suathongtincanhan', compact('tenCauThu', 'CauThu'));
    }
    public function postSuaThongTinCaNhan($tenCauThu, Request $request) {

        $idNguoiDung = NguoiDung::select('id')->where('username', $tenCauThu)->first();
        $KiemTraCauThu = CauThu::select('id')->where('idNguoiDung', $idNguoiDung->id)->first();
        $idCauThu = $KiemTraCauThu->id;

        $this->validate($request, [
            'TenDangNhap'          => 'required | regex : /^[a-zA-Z0-9]+$/ | unique:nguoidung,username,'.$idNguoiDung->id.',id' ,
            'Email'                => 'required | email | unique:nguoidung,Email,'.$idNguoiDung->id.',id'
        ], 
        [
            'TenDangNhap.required' => 'Tên đăng nhập không được để trống.',
            'TenDangNhap.unique'   => 'Tên đăng nhập đã có người sử dụng.',
            'TenDangNhap.regex'    => 'Tên đăng nhập không nên có kí tự đặc biệt.',
            'Email.required'       => 'Địa chỉ email không được để trống.',
            'Email.email'          => 'Địa chỉ email không đúng định dạng.',
            'Email.unique'         => 'Địa chỉ email đã có người sử dụng.'
        ]);

        $cauthu = NguoiDung::findOrFail($idNguoiDung->id);
        $cauthu->username = $request->TenDangNhap;
        $cauthu->Email = $request->Email;

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

            if(!Hash::check($request->MatKhauHienTai, $cauthu->password)){
                return back()->with('loi','Mật khẩu cũ bạn nhập vào chưa đúng.');
            }else{
                $cauthu->password = Hash::make($request->MatKhauMoi);
            }

        }

        $cauthu->save();

        return redirect()->back()->with('thongbao', 'Cập nhật thông tin thành công.');
    }





    #------------------------------------------------------------------------------------------------------------#
    #---------------------------------------------- Lịch luyện tập ----------------------------------------------#
    #------------------------------------------------------------------------------------------------------------#

    public function getLichLuyenTap($tenCauThu){
        $GiaoTrinhTap = GiaoTrinhTap::all();
        $idNguoiDung = NguoiDung::select('id')->where('username', $tenCauThu)->first();
        $KiemTraCauThu = CauThu::select('id')->where('idNguoiDung', $idNguoiDung->id)->first();
        $idCauThu = $KiemTraCauThu->id;
        $LichLuyenTap = DB::SELECT("
                                        SELECT
                                        lichluyentap.id,
                                        lichluyentap.NgayLuyenTap,
                                        lichluyentap.CaLuyenTap,
                                        lichluyentap.GioLuyenTap,
                                        lichluyentap.DiaDiem
                                        FROM lichluyentap
                                        INNER JOIN giaotrinh_luyentap_cauthu ON giaotrinh_luyentap_cauthu.idLichLuyenTap = lichluyentap.id
                                        INNER JOIN cauthu ON giaotrinh_luyentap_cauthu.idCauThu = cauthu.id
                                        WHERE cauthu.id = '$idCauThu'
                                        GROUP BY lichluyentap.NgayLuyenTap, lichluyentap.CaLuyenTap, lichluyentap.GioLuyenTap,lichluyentap.DiaDiem, lichluyentap.id
                                    ");
        $NgayCauThuTap = $LichLuyenTap;
        $LichLuyenTap_DanhSach = [];
        foreach($LichLuyenTap as $lich){
            $LichLuyenTap_DanhSach[] = Calendar::event(
                $lich->DiaDiem,
                false,  
                new \Datetime($lich->NgayLuyenTap.$lich->GioLuyenTap),
                new \Datetime($lich->NgayLuyenTap.($lich->GioLuyenTap)),
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
                            'header' => [
                                'left' => 'today prev,next',
                                'center' =>'title',
                                'right' => false ]
                        ])
                        ->setCallbacks([ 
                            'eventClick' => 'function(event) {
                                 $("#LichModal"+event.id).modal("show")
                             }'
                        ]);
        foreach($NgayCauThuTap as $lich) {
            $ngay = $lich->NgayLuyenTap;
            $NoiDungLuyenTap[] = DB::SELECT("
                                SELECT
                                nguoidung.HoTen,
                                giaotrinhtap.TenBaiTap,
                                giaotrinhtap.NoiDungBaiTap,
                                lichluyentap.NgayLuyenTap,
                                lichluyentap.CaLuyenTap,
                                lichluyentap.DiaDiem
                                FROM lichluyentap
                                INNER JOIN giaotrinh_luyentap_cauthu ON giaotrinh_luyentap_cauthu.idLichLuyenTap = lichluyentap.id
                                INNER JOIN giaotrinhtap ON giaotrinh_luyentap_cauthu.idGiaoTrinhTap = giaotrinhtap.id
                                INNER JOIN cauthu ON giaotrinh_luyentap_cauthu.idCauThu = cauthu.id
                                INNER JOIN nguoidung ON cauthu.idNguoiDung = nguoidung.id
                                WHERE cauthu.id = '$idCauThu' AND lichluyentap.NgayLuyenTap = '$ngay'
                            ");
        }
    	return view('cauthu.pages.lichluyentap', compact('GiaoTrinhTap', 'tenCauThu', 'NoiDungLuyenTap', 'LichLuyenTap', 'NgayCauThuTap'));
    }





    #------------------------------------------------------------------------------------------------------------#
    #--------------------------------------------- Đội hình chiến thuật -----------------------------------------#
    #------------------------------------------------------------------------------------------------------------#

    public function getDoiHinhChienThuat($tenCauThu){

        $idNguoiDung = NguoiDung::select('id')->where('username', $tenCauThu)->first();
        $KiemTraCauThu = CauThu::select('id')->where('idNguoiDung', $idNguoiDung->id)->first();
        $idCauThu = $KiemTraCauThu->id;

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
                                            WHERE tiso.TiSo IS NULL AND  trandau.TranDauCuaCLB='1'
                                            ORDER BY trandau.NgayThiDau ASC
                                            LIMIT 2
                                        ");
        if(!empty($TranDauTiepTheo)){
            $idTranDau = $TranDauTiepTheo[0]->id;
            $DoiHinhChienThuat = DB::SELECT("
                                                SELECT
                                                doihinh.*,
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
                                        ORDER BY vitri_cauthu_trandau.id
                                    ");
            $VaiTroCauThu = DB::SELECT("
                                        SELECT
                                        vaitro.TenVaiTro,
                                        cauthu.id
                                        FROM
                                        cauthu
                                        LEFT JOIN vaitro_cauthu_trandau ON vaitro_cauthu_trandau.idCauThu = cauthu.id
                                        LEFT JOIN vaitro ON vaitro_cauthu_trandau.idVaiTro = vaitro.id
                                        INNER JOIN trandau ON vaitro_cauthu_trandau.idTranDau = trandau.id
                                        WHERE trandau.id = '$idTranDau'
                                    ");
            return view('cauthu.pages.doihinhchienthuat', compact('tenCauThu', 'DoiHinhChienThuat', 'TranDauTiepTheo', 'CauThuRaSan', 'VaiTroCauThu', 'idCauThu'));
        }
        return view('cauthu.pages.doihinhchienthuat', compact('tenCauThu', 'TranDauTiepTheo'));
    }





    #------------------------------------------------------------------------------------------------------------#
    #---------------------------------------------- Sức khỏe cầu thủ --------------------------------------------#
    #------------------------------------------------------------------------------------------------------------#

    public function getSucKhoe($tenCauThu){
        $idNguoiDung = NguoiDung::select('id')->where('username', $tenCauThu)->first();
        $KiemTraCauThu = CauThu::select('id')->where('idNguoiDung', $idNguoiDung->id)->first();
        $idCauThu = $KiemTraCauThu->id;
        $LichSuChanThuong = DB::SELECT("
                                        SELECT
                                        thongtinchanthuong_cauthu.ngaychanthuong AS NgayChanThuong,
                                        thongtinchanthuong_cauthu.NgayHoiPhuc AS NgayHoiPhuc,
                                        thongtinchanthuong_cauthu.TinhTrangChanThuong,
                                        chanthuong.TenChanThuong,
                                        DATEDIFF(NgayHoiPhuc,NgayChanThuong) AS TongNgay
                                        FROM
                                        cauthu
                                        INNER JOIN thongtinchanthuong_cauthu ON thongtinchanthuong_cauthu.idCauThu = cauthu.id
                                        INNER JOIN chanthuong ON thongtinchanthuong_cauthu.idChanThuong = chanthuong.id
                                        WHERE cauthu.id = '$idCauThu'
                                        ORDER BY thongtinchanthuong_cauthu.ngaychanthuong DESC
                                    ");
        $LichKham = DB::SELECT("
                                    SELECT
                                    chanthuong.TenChanThuong,
                                    lichkham.NoiDungDieuTri,
                                    thongtinchanthuong_cauthu.TinhTrangChanThuong,
                                    lichkham.NgayKham,
                                    lichkham.id
                                    FROM
                                    cauthu
                                    INNER JOIN thongtinchanthuong_cauthu ON thongtinchanthuong_cauthu.idCauThu = cauthu.id
                                    INNER JOIN chanthuong ON thongtinchanthuong_cauthu.idChanThuong = chanthuong.id
                                    INNER JOIN phacdodieutri ON thongtinchanthuong_cauthu.idPhacDoDieuTri = phacdodieutri.id
                                    INNER JOIN lichkham ON lichkham.idPhacDoDieuTri = phacdodieutri.id
                                    WHERE cauthu.id = '$idCauThu' AND thongtinchanthuong_cauthu.TinhTrangChanThuong='1'
                                    ORDER BY lichkham.NgayKham
                                ");
        if(isset($LichKham)){
            foreach($LichKham as $lich) {
                $ToaThuoc[] = ToaThuoc::where('idLichKham', $lich->id)->get();
            }
        }
        if(isset($ToaThuoc)){
            $stt=1;
            $Thuoc=[];
            foreach($ToaThuoc as $toathuoc) {
                if(!empty($ToaThuoc[$stt-1][0])){
                    $idToaThuoc = $ToaThuoc[$stt-1][0]->id;
                    $Thuoc[] = DB::SELECT("
                                            SELECT
                                            toathuoc.id,
                                            thuoc.TenThuoc,
                                            toathuoc_thuoc.SoLuong,
                                            toathuoc_thuoc.LieuLuong,
                                            toathuoc_thuoc.GhiChu
                                            FROM
                                            toathuoc
                                            INNER JOIN toathuoc_thuoc ON toathuoc_thuoc.idToaThuoc = toathuoc.id
                                            INNER JOIN thuoc ON toathuoc_thuoc.idThuoc = thuoc.id
                                            WHERE toathuoc.id='$idToaThuoc'
                                        ");
                }
                ++$stt;
            }
        }
        
        return view('cauthu.pages.suckhoe', compact('tenCauThu', 'LichSuChanThuong', 'LichKham', 'ToaThuoc', 'Thuoc'));
    }






    #------------------------------------------------------------------------------------------------------------#
    #---------------------------------------------------- Danh mục ----------------------------------------------#
    #------------------------------------------------------------------------------------------------------------#

    public function getThongBao($tenCauThu){
        $ThongBao = ThongBao::with('NguoiDung')->orderBy('NgayThongBao', 'DESC')->get();
        return view('cauthu.pages.thongbao', compact('tenCauThu', 'ThongBao'));
    }

    public function getYeuCau($tenCauThu){
        return view('cauthu.pages.yeucau', compact('tenCauThu'));
    }

    public function getLichThiDau($tenCauThu){

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

        return view('cauthu.pages.lichthidau', compact('tenCauThu', 'TranDauTiepTheo', 'CacTranDauTiepTheo', 'BangXepHang'));
    }

    public function getKetQua($tenCauThu){

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

        return view('cauthu.pages.ketqua', compact('tenCauThu', 'CacTranDaDau', 'BangXepHang'));
    }
}
