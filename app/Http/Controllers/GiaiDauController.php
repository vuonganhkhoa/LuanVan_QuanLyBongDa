<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\GiaiDau;
use App\CauLacBo;
use App\BangXepHang;
use App\TiSo;
use App\CauLacBo_GiaiDau;

class GiaiDauController extends Controller
{




    #======================================================================================
    #     Thêm các Clb của 1 giải đấu -> để khi thêm giải đấu thì bxh sẽ được tạo mới
    #======================================================================================

    public function getThem_CauLacBo_GiaiDau($idGiaiDau){

        $CauLacBo   = CauLacBo::all() ;
        $GiaiDau    = GiaiDau::findOrFail($idGiaiDau);

        return view('admin.pages.them_caulacbo_giaidau', compact('idGiaiDau', 'GiaiDau', 'CauLacBo'));

    }

    public function postThem_CauLacBo_GiaiDau($idGiaiDau, Request $request){

        if($request->clb[0] !== 'ChonTatCa'){

            if(count($request->clb) < 20){
                return back()->with('error', 'Một giải đấu cần có ít nhất 20 câu lac bộ.');
            }

        }

        $KiemTraTonTaiGiaiDau = CauLacBo_GiaiDau::where('idGiaiDau', $idGiaiDau)->first();
        if(isset($KiemTraTonTaiGiaiDau)){
            return back()->with('error', 'Bạn đã thêm các câu lạc bộ cho giải này.');
        }

        $CauLacBo   = CauLacBo::all() ;
        if($request->clb[0] === 'ChonTatCa'){
            foreach($CauLacBo as $clb){

                $clb_giaidau                    = new CauLacBo_GiaiDau;
                $clb_giaidau->idGiaiDau         = $idGiaiDau;
                $clb_giaidau->idCauLacBo        = $clb->id; 
                $clb_giaidau->save();

                $bxh_clb_giaidau                = new BangXepHang;
                $bxh_clb_giaidau->SoTran        = 0;
                $bxh_clb_giaidau->SoTranThang   = 0;
                $bxh_clb_giaidau->SoTranHoa     = 0;
                $bxh_clb_giaidau->SoTranThua    = 0;
                $bxh_clb_giaidau->BanThang      = 0;
                $bxh_clb_giaidau->BanThua       = 0;
                $bxh_clb_giaidau->HieuSo        = 0;
                $bxh_clb_giaidau->TheVang       = 0;
                $bxh_clb_giaidau->TheDo         = 0;
                $bxh_clb_giaidau->ChiSoFairplay = 0;
                $bxh_clb_giaidau->Diem          = 0;
                $bxh_clb_giaidau->idGiaiDau     = $idGiaiDau;
                $bxh_clb_giaidau->idCauLacBo    = $clb->id;
                $bxh_clb_giaidau->save();

            }
        }
        else{
            foreach($request->clb as $clb){

                $clb_giaidau                    = new CauLacBo_GiaiDau;
                $clb_giaidau->idGiaiDau         = $idGiaiDau;
                $clb_giaidau->idCauLacBo        = $clb; 
                $clb_giaidau->save();

                $bxh_clb_giaidau                = new BangXepHang;
                $bxh_clb_giaidau->SoTran        = 0;
                $bxh_clb_giaidau->SoTranThang   = 0;
                $bxh_clb_giaidau->SoTranHoa     = 0;
                $bxh_clb_giaidau->SoTranThua    = 0;
                $bxh_clb_giaidau->BanThang      = 0;
                $bxh_clb_giaidau->BanThua       = 0;
                $bxh_clb_giaidau->HieuSo        = 0;
                $bxh_clb_giaidau->TheVang       = 0;
                $bxh_clb_giaidau->TheDo         = 0;
                $bxh_clb_giaidau->ChiSoFairplay = 0;
                $bxh_clb_giaidau->Diem          = 0;
                $bxh_clb_giaidau->idGiaiDau     = $idGiaiDau;
                $bxh_clb_giaidau->idCauLacBo    = $clb;
                $bxh_clb_giaidau->save();

            }
        }

        return redirect('admin/giai-dau/danh-sach')->with('success', 'Thêm danh sách câu lạc bộ vào giải đấu thành công.');
    }






    public function getDanhSach(){
    	$giaidau = GiaiDau::all();
    	return view('admin.pages.giaidau.danhsach', compact('giaidau'));
    }

    public function getThem(){
    	return view('admin.pages.giaidau.them');
    }

    public function postThem(Request $request){
        $thongtingiaidau = GiaiDau::all();
        $this->validate($request, [
            'tengiaidau'                =>      'required|
                                                 regex:/^[a-zA-Z0-9\s]+$/'
        ], 
        [
            'tengiaidau.required'       =>      'Tên giải đấu không được để trống',
            'tengiaidau.regex'          =>      'Tên giải đấu chỉ gồm chữ và số'
        ]);

        
        foreach($thongtingiaidau as $ttgd){
            if(date('Y', strtotime($request->nambatdau)) == date('Y', strtotime($ttgd->NamBatDauMuaGiai)) && date('Y', strtotime($request->namketthuc)) == date('Y', strtotime($ttgd->NamKetThucMuaGiai))){
                return redirect()->route('ThemGiaiDau')->with('error', 'Năm bắt đầu và năm kết thúc đã tồn tại');
            }
        }
        
        //86400s = 1d
        // 2678400s = 1m
        if(strtotime($request->namketthuc) - strtotime($request->nambatdau) < 2678400*5 || strtotime($request->namketthuc) - strtotime($request->nambatdau) > 2678400*10) {
            return redirect()->route('ThemGiaiDau')->with('error', 'Sai thông tin Năm của giải đấu');
        }

        else{
            $giaidau = new GiaiDau;
            $giaidau->TenGiaiDau            =       $request->tengiaidau;
            $giaidau->NamBatDauMuaGiai      =       $request->nambatdau;
            $giaidau->NamKetThucMuaGiai     =       $request->namketthuc;
            $giaidau->MuaGiaiHienTai     	=       $request->muagiaihientai;
            $giaidau->save();
            return redirect()->route('DanhSachGiaiDau')->with('success', 'Thêm giải đấu thành công.');
        }
    }

    public function getXoa($id){
        $giaidau = GiaiDau::find($id);
        $bangxephang = BangXepHang::all();
        $caulacbo_giaidau = CauLacBo_GiaiDau::all();
        $tiso = TiSo::all();

        foreach($bangxephang as $bxh){
            if($giaidau->id == $bxh->idGiaiDau){
                return redirect()->back()->with('error', 'Tồn tại bảng xếp hạng trong giải đấu.');
            }
        }

        foreach($caulacbo_giaidau as $clbgd){
            if($giaidau->id == $clbgd->idGiaiDau){
                return redirect()->back()->with('error', 'Tồn tại câu lạc bộ trong giải đấu.');
            }
        }

        foreach($tiso as $ts){
            if($giaidau->id == $ts->idGiaiDau){
                return redirect()->back()->with('error', 'Tồn tại trận đấu trong giải đấu.');
            }
        }

        $giaidau->delete();
        return redirect()->route('DanhSachGiaiDau')->with('success', 'Xóa giải đấu thành công.');
    }

    public function getSua($id){
        $giaidau = GiaiDau::find($id);
    	return view('admin.pages.giaidau.sua', compact('giaidau'));
    }

    public function postSua($id, Request $request){
        $this->validate($request, [
            'tengiaidau'                =>      'required|
                                                 regex:/^[a-zA-Z0-9\s]+$/'
        ], 
        [
            'tengiaidau.required'       =>      'Tên giải đấu không được để trống',
            'tengiaidau.regex'          =>      'Tên giải đấu chỉ gồm chữ và số'
        ]);

        //86400s = 1d
        // 2678400s = 1m

        if(strtotime($request->namketthuc) - strtotime($request->nambatdau) < 2678400*5 || strtotime($request->namketthuc) - strtotime($request->nambatdau) > 2678400*9) {
            return redirect()->route('ThemGiaiDau')->with('error', 'Sai thông tin Năm của giải đấu');
        }

        else{
            $giaidau = GiaiDau::find($id);
            $giaidau->TenGiaiDau            =       $request->tengiaidau;
            $giaidau->NamBatDauMuaGiai      =       $request->nambatdau;
            $giaidau->NamKetThucMuaGiai     =       $request->namketthuc;
            $giaidau->MuaGiaiHienTai     	=       $request->muagiaihientai;
            $giaidau->save();
            return redirect()->route('DanhSachGiaiDau')->with('success', 'Cập nhật giải đấu thành công.');
        }
    }
}
