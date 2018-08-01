<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\LichKham;
use App\Thuoc;
Use App\ToaThuoc;
use App\Thuoc_ToaThuoc;

class ToaThuocController extends Controller
{
    public function getDanhSach(){
    	$toathuoc = DB::SELECT('
                        SELECT
                        toathuoc.id,
                        toathuoc.ChanDoan,
                        toathuoc.NgayTaiKham,
                        lichkham.NoiDungDieuTri,
                        lichkham.NgayKham,
                        nguoidung.HoTen
                        FROM
                        toathuoc
                        INNER JOIN lichkham ON toathuoc.idLichKham = lichkham.id
                        INNER JOIN phacdodieutri ON lichkham.idPhacDoDieuTri = phacdodieutri.id
                        INNER JOIN thongtinchanthuong_cauthu ON thongtinchanthuong_cauthu.idPhacDoDieuTri = phacdodieutri.id
                        INNER JOIN cauthu ON thongtinchanthuong_cauthu.idCauThu = cauthu.id
                        INNER JOIN nguoidung ON cauthu.idNguoiDung = nguoidung.id




    		');

    	return view('nhanvienyte.pages.toathuoc.danhsach', compact('toathuoc'));
    }

    public function getThem(){
    	// $lichkham = LichKham::with('ToaThuoc')->get();
    	$thuoc = Thuoc::all();
        $lichkham = DB::SELECT('
                                SELECT
                                nguoidung.HoTen,
                                thongtinchanthuong_cauthu.idCauThu,
                                lichkham.id,
                                lichkham.NgayKham,
                                lichkham.CaKham,
                                lichkham.DiaDiem,
                                lichkham.NoiDungDieuTri
                                FROM
                                lichkham
                                INNER JOIN phacdodieutri ON lichkham.idPhacDoDieuTri = phacdodieutri.id
                                INNER JOIN thongtinchanthuong_cauthu ON thongtinchanthuong_cauthu.idPhacDoDieuTri = phacdodieutri.id
                                INNER JOIN cauthu ON thongtinchanthuong_cauthu.idCauThu = cauthu.id
                                INNER JOIN nguoidung ON cauthu.idNguoiDung = nguoidung.id
                                WHERE
                                thongtinchanthuong_cauthu.TinhTrangChanThuong = 1
                                ORDER BY
                                lichkham.NgayKham ASC

            ');
    	return view('nhanvienyte.pages.toathuoc.them', compact('lichkham','thuoc','lichkham_cauthu'));
    }

    public function postThem(Request $request){

    	$thuoc = DB::SELECT('
    				SELECT
					thuoc.id,
					thuoc.TenThuoc,
					thuoc.GhiChu
					FROM
					thuoc
    		');

        $kiemtratoathuoc = ToaThuoc::all();
        foreach($kiemtratoathuoc as $kttt){
            if($request->lichkham == $kttt->idLichKham)
                return redirect()->back()->with('error','Lịch khám bạn chọn đã có toa thuốc.');
        }

        $lichkham = LichKham::where('id', $request->lichkham)->first();

        if(strtotime($request->ngaytaikham) - strtotime($lichkham->NgayKham) < 0){
            return redirect()->back()->with('error','Ngày tái khám không thể nhỏ hơn ngày khám.');
        }

    	$toathuoc = new ToaThuoc;
    	$toathuoc->NgayKham 		=		$lichkham->NgayKham;
    	$toathuoc->NgayTaiKham 		=		$request->ngaytaikham;
    	$toathuoc->ChanDoan 		=		$request->chandoan;
    	$toathuoc->idLichKham 		=		$request->lichkham;
    	$toathuoc->save();

        foreach($request->lieuluong as $ll){
            if(isset($ll)){
                $lieuluong[] = $ll;
            }
        }
        
        foreach($request->soluong as $sl){
            if(isset($sl)){
                $soluong[] = $sl;
            }
        }

        foreach($request->ghichu as $gc){
            if(isset($gc)){
                $ghichu[] = $gc;
            }
        }

        $i = 0;
    	foreach($request->thuoc as $t){
    		$thuoc_toathuoc 					= 		new Thuoc_ToaThuoc;
    		$thuoc_toathuoc->idToaThuoc 		=		$toathuoc->id;
    		$thuoc_toathuoc->idThuoc 			=		$t;
    		$thuoc_toathuoc->SoLuong			=		$soluong[$i];
    		$thuoc_toathuoc->LieuLuong			=		$lieuluong[$i];
    		$thuoc_toathuoc->GhiChu				=		$ghichu[$i];            
    		$thuoc_toathuoc->save();
            $i++;
    	}

    	return redirect()->route('DanhSachToaThuoc')->with('success','Thêm toa thuốc thành công');
    }

    public function getXoa($id){
        $toathuoc = ToaThuoc::find($id);
        $toathuoc->delete();
        return redirect()->route('DanhSachToaThuoc')->with('success','Xoá toa thuốc thành công');   
    }

	public function getSua($id){
        // $lichkham = LichKham::with('ToaThuoc')->get();
        $lichkham = DB::SELECT('
                                SELECT
                                nguoidung.HoTen,
                                thongtinchanthuong_cauthu.idCauThu,
                                lichkham.id,
                                lichkham.NgayKham,
                                lichkham.CaKham,
                                lichkham.DiaDiem,
                                lichkham.NoiDungDieuTri
                                FROM
                                lichkham
                                INNER JOIN phacdodieutri ON lichkham.idPhacDoDieuTri = phacdodieutri.id
                                INNER JOIN thongtinchanthuong_cauthu ON thongtinchanthuong_cauthu.idPhacDoDieuTri = phacdodieutri.id
                                INNER JOIN cauthu ON thongtinchanthuong_cauthu.idCauThu = cauthu.id
                                INNER JOIN nguoidung ON cauthu.idNguoiDung = nguoidung.id
                                WHERE
                                thongtinchanthuong_cauthu.TinhTrangChanThuong = 1
                                ORDER BY
                                lichkham.NgayKham ASC

            ');
        $thuoc = Thuoc::all();
        $toathuoc = ToaThuoc::find($id);
        $toathuoc_thuoc = Thuoc_ToaThuoc::find($id);
	    return view('nhanvienyte.pages.toathuoc.sua', compact('lichkham', 'thuoc', 'toathuoc', 'toathuoc_thuoc'));
	}

    public function postSua($id, Request $request){
        $thuoc = DB::SELECT('
                    SELECT
                    thuoc.id,
                    thuoc.TenThuoc,
                    thuoc.GhiChu
                    FROM
                    thuoc
            ');

        $lichkham = LichKham::where('id', $request->lichkham)->first();


        $toathuoc = ToaThuoc::find($id);
        $toathuoc->NgayKham         =       $lichkham->NgayKham;
        $toathuoc->NgayTaiKham      =       $request->ngaytaikham;
        $toathuoc->ChanDoan         =       $request->chandoan;
        $toathuoc->idLichKham       =       $request->lichkham;
        $toathuoc->save();

        return redirect()->route('DanhSachToaThuoc')->with('success','Cập nhật toa thuốc thành công');

        // foreach($request->lieuluong as $ll){
        //     if(isset($ll)){
        //         $lieuluong[] = $ll;
        //     }
        // }
        
        // foreach($request->soluong as $sl){
        //     if(isset($sl)){
        //         $soluong[] = $sl;
        //     }
        // }

        // foreach($request->ghichu as $gc){
        //     if(isset($gc)){
        //         $ghichu[] = $gc;
        //     }
        // }

        // $i = 0;
        // foreach($request->thuoc as $t){
        //     $thuoc_toathuoc                     =       Thuoc_ToaThuoc;
        //     $thuoc_toathuoc->idToaThuoc         =       $toathuoc->id;
        //     $thuoc_toathuoc->idThuoc            =       $t;
        //     $thuoc_toathuoc->SoLuong            =       $soluong[$i];
        //     $thuoc_toathuoc->LieuLuong          =       $lieuluong[$i];
        //     $thuoc_toathuoc->GhiChu             =       $ghichu[$i];            
        //     $thuoc_toathuoc->save();
        //     $i++;
        // }
    }
}
