<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\TranDau;
use App\GiaiDau;
use App\CauLacBo;
use App\TiSo;
use App\BangXepHang;
use App\ThanhTichCauThu;
use App\CauThu;
use App\DoiHinh;
use App\PhongDo_CauThu;


class LichThiDauController extends Controller
{
    public function getDanhSach(){
    	$lichthidau = DB::SELECT("
    								SELECT
                                    trandau.VongDau,
                                    caulacbo.TenDayDu,
                                    trandau.NgayThiDau,
                                    trandau.GioThiDau,
                                    trandau.DiaDiem,
                                    trandau.id,
                                    tiso.idCauLacBo,
                                    tiso.TiSo,
                                    caulacbo.HinhAnhCauLacBo,
                                    giaidau.TenGiaiDau,
                                    giaidau.NamBatDauMuaGiai,
                                    giaidau.NamKetThucMuaGiai
                                    FROM
                                    trandau
                                    INNER JOIN tiso ON tiso.idTranDau = trandau.id
                                    INNER JOIN caulacbo ON tiso.idCauLacBo = caulacbo.id
                                    INNER JOIN giaidau ON tiso.idGiaiDau = giaidau.id
                                    ORDER BY
                                    tiso.id ASC
    							");

        $date = date('Y-m-d');
        
        $giaidau = GiaiDau::all();

    	return view('admin.pages.lichthidau.danhsach', compact('lichthidau','giaidau','date'));
    }

    public function getThem(){
        $giaidau = GiaiDau::all();
        $caulacbo = CauLacBo::all();
        $vongdau = TranDau::orderBy('id', 'DESC')->first();
        if($vongdau->TranDauCuaCLB == 1){
            $vongdau->VongDau += 1;
        }
    	return view('admin.pages.lichthidau.them', compact('caulacbo','vongdau','giaidau'));
    }

    public function postThem(Request $request){

        $tiso = DB::SELECT("
                        SELECT
                        tiso.idCauLacBo,
                        tiso.idTranDau,
                        tiso.idGiaiDau,
                        trandau.VongDau
                        FROM
                        tiso
                        INNER JOIN trandau ON tiso.idTranDau = trandau.id
                        ORDER BY
                        tiso.id ASC

            ");


        for ($i=0; $i < count($tiso); $i++) { 
            if($request->doia == $tiso[$i]->idCauLacBo && $request->doib == $tiso[$i+1]->idCauLacBo && $request->giaidau == $tiso[$i]->idGiaiDau){
                return redirect()->route('ThemLichThiDau')->with('error','Lịch thi đấu bị trùng');
            }
            $i++;
        }
        
        if($request->doia == 'macdinh'|| $request->doib == 'macdinh'){
            return redirect()->back()->with('error','Bạn chưa chọn đội bóng.');
        }
        if($request->doib == $request->doia){
            return redirect()->back()->with('error','Lịch thi đấu không được trùng câu lạc bộ.');
        }
        if($request->diadiem == 'macdinh'){
            return redirect()->back()->with('error','Bạn chưa chọn sân vận động.');
        }
        if($request->giaidau == 'macdinh'){
            return redirect()->back()->with('error','Bạn chưa chọn giải đấu.');
        }
        if($request->giothidau > 19 || $request->giothidau < 14){
            return redirect()->back()->with('error','Giờ thi đấu không đúng quy định');
        }
        if(strtotime($request->ngaythidau) < strtotime('Y-m-d')){
            return redirect()->back()->with('error','Ngày thi đấu không đúng quy định');
        }
        if($request->vongdau > 38 || $request->vongdau < 1){
            return redirect()->back()->with('error','Vòng đấu không đúng quy định');
        }

        $lichthidau = new TranDau();
        $lichthidau->VongDau            =       $request->vongdau;
        $lichthidau->NgayThiDau         =       $request->ngaythidau;
        $lichthidau->GioThiDau          =       $request->giothidau;
        $lichthidau->DiaDiem            =       $request->diadiem;
        $lichthidau->TranDauCuaCLB      =       $request->trandaucuaCLB;
        $lichthidau->save();

        $tiso1 = new TiSo();
        $tiso1->idCauLacBo = $request->doia;
        $tiso1->idTranDau = $lichthidau->id;
        $tiso1->idGiaiDau = $request->giaidau;
        $tiso1->save();

        $tiso2 = new TiSo();
        $tiso2->idCauLacBo = $request->doib;
        $tiso2->idTranDau = $lichthidau->id;
        $tiso2->idGiaiDau = $request->giaidau;
        $tiso2->save();


        return redirect()->route('DanhSachLichThiDau')->with('success','Thêm lịch thi đấu thành công');

    }

    public function getXoa($id){
        $lichthidau = TranDau::find($id);
        $lichthidau->delete();
        return redirect()->route('DanhSachLichThiDau')->with('success','Xoá lịch thi đấu thành công');
    }

    public function getSua($id){
        $giaidau = GiaiDau::all();
        $caulacbo = CauLacBo::all();
        $tiso = TiSo::where('idTranDau', $id)->get();
        $vongdau = TranDau::orderBy('id', 'DESC')->first();
        $trandau = TranDau::with('TiSo')->where('id', $id)->first();

    	return view('admin.pages.lichthidau.sua', compact('caulacbo', 'vongdau', 'trandau', 'tiso','giaidau'));
    }

    public function postSua($id, Request $request){

        $caulacbo = CauLacBo::all();

        $tiso = DB::SELECT("
                        SELECT
                        tiso.idCauLacBo,
                        tiso.idTranDau,
                        tiso.idGiaiDau,
                        trandau.VongDau
                        FROM
                        tiso
                        INNER JOIN trandau ON tiso.idTranDau = trandau.id
                        WHERE
                        tiso.idTranDau = '$id'
                        ORDER BY
                        tiso.id ASC


            ");


        // for ($i=0; $i < count($tiso); $i++) { 
        //     if($request->doia == $tiso[$i]->idCauLacBo && $request->doib == $tiso[$i+1]->idCauLacBo && $request->giaidau == $tiso[$i]->idGiaiDau){
        //         if($request->doia == $tiso[0]->idCauLacBo && $request->doib == $tiso[1]->idCauLacBo){
        //             return true;
        //         }
        //         else{
        //             return redirect('admin/lich-thi-dau/sua/'.$id.'')->with('error','Lịch thi đấu bị trùng');
        //         }
        //     }
            
        //     $i++;
        // }

        if($request->doia == 'macdinh'|| $request->doib == 'macdinh'){
            return redirect()->back()->with('error','Bạn chưa chọn đội bóng.');
        }
        if($request->doib == $request->doia){
            return redirect()->back()->with('error','Lịch thi đấu không được trùng câu lạc bộ.');
        }
        if($request->diadiem == 'macdinh'){
            return redirect()->back()->with('error','Bạn chưa chọn sân vận động.');
        }
        if($request->giothidau > 19 || $request->giothidau < 14){
            return redirect()->back()->with('error','Giờ thi đấu không đúng quy định');
        }
        if(strtotime($request->ngaythidau) < strtotime('Y-m-d')){
            return redirect()->back()->with('error','Ngày thi đấu không đúng quy định');
        }
        if($request->vongdau > 38 || $request->vongdau < 1){
            return redirect()->back()->with('error','Vòng đấu không đúng quy định');
        }

        $lichthidau = TranDau::find($id);
        $lichthidau->VongDau            =       $request->vongdau;
        $lichthidau->NgayThiDau         =       $request->ngaythidau;
        $lichthidau->GioThiDau          =       $request->giothidau;
        $lichthidau->DiaDiem            =       $request->diadiem;
        $lichthidau->TranDauCuaCLB      =       $request->trandaucuaCLB;
        $lichthidau->save();

        $tisoID = TiSo::where('idTranDau',$id)->get();

        $tiso1 = TiSo::find($tisoID[0]->id);
        $tiso1->idCauLacBo = $request->doia;
        $tiso1->idTranDau = $lichthidau->id;
        $tiso1->idGiaiDau = $request->giaidau;
        $tiso1->save();

        $tiso2 = TiSo::find($tisoID[1]->id);
        $tiso2->idCauLacBo = $request->doib;
        $tiso2->idTranDau = $lichthidau->id;
        $tiso2->idGiaiDau = $request->giaidau;
        $tiso2->save();


        return redirect()->route('DanhSachLichThiDau')->with('success','Cập nhật lịch thi đấu thành công');
    }

    public function getCapNhatTiSo($id){
        $trandau = DB::SELECT("
                        SELECT
                        caulacbo.TenDayDu,
                        caulacbo.HinhAnhCauLacBo_lon,
                        tiso.idGiaiDau,
                        tiso.TiSo,
                        tiso.id,
                        trandau.VongDau,
                        trandau.NgayThiDau,
                        trandau.GioThiDau,
                        trandau.DiaDiem
                        FROM
                        caulacbo
                        INNER JOIN tiso ON tiso.idCauLacBo = caulacbo.id
                        INNER JOIN trandau ON tiso.idTranDau = trandau.id
                        WHERE trandau.id = '$id'
        ");

        return view('admin.pages.lichthidau.capnhattiso', compact('trandau'));
    }

    public function postCapNhatTiSo($idTiSoA, $idTiSoB, Request $request){

    	if($request->tisoa == null || $request->tisob == null){
    		return redirect()->back()->with('error', 'Không được để trống tỉ số');
    	}
        
        $tisoa = TiSo::find($idTiSoA);
        $tisoa->TiSo = $request->tisoa;
        if($request->tisoa == $request->tisob){
            $tisoa->TrangThai = 0;
        }
        else if($request->tisoa > $request->tisob){
            $tisoa->TrangThai = 1;
        }
        else{
            $tisoa->TrangThai = -1;
        }
        $tisoa->save();


        $tisob = TiSo::find($idTiSoB);
        $tisob->TiSo = $request->tisob;
        if($request->tisoa == $request->tisob){
            $tisob->TrangThai = 0;
        }
        else if($request->tisoa > $request->tisob){
            $tisob->TrangThai = -1;
        }
        else{
            $tisob->TrangThai = 1;
        }
        $tisob->save();

        $bxha = BangXepHang::where('idGiaidau',$tisoa->idGiaiDau)->where('idCauLacBo', $tisoa->idCauLacBo)->first();
        $bxhb = BangXepHang::where('idGiaidau',$tisoa->idGiaiDau)->where('idCauLacBo', $tisob->idCauLacBo)->first();

        
        $bxh = BangXepHang::find($bxha->id);
        $bxh->TheVang           +=       $request->thevanga;
        $bxh->TheDo             +=       $request->thedoa;

        if($request->thevanga %2 == 1){
        	$request->thevanga = $request->thevanga -1;
        	$request->thevanga = ($request->thevanga/2)*(-3) + (-1);
        	$bxh->ChiSoFairplay     +=     $request->thevanga   + ($request->thedoa*(-4));
        }

        else if($request->thevanga %2 == 0){
        	$request->thevanga = ($request->thevanga/2)*(-3);
        	$bxh->ChiSoFairplay     +=     $request->thevanga   + ($request->thedoa*(-4));
        }
        

        if($tisoa->TrangThai == 1){
            $bxh->SoTran +=1;
            $bxh->SoTranThang +=1;
            $bxh->BanThang += $request->tisoa;
            $bxh->BanThua += $request->tisob;
            $bxh->HieuSo += ($request->tisoa - $request->tisob );
            $bxh->Diem += 3;
        }
        else if($tisoa->TrangThai == 0){
            $bxh->SoTran += 1;
            $bxh->SoTranHoa += 1;
            $bxh->BanThang += $request->tisoa;
            $bxh->BanThua += $request->tisob;
            $bxh->Diem += 1;
        }
        else{
            $bxh->SoTran +=1;
            $bxh->SoTranThua +=1;
            $bxh->BanThang += $request->tisoa;
            $bxh->BanThua += $request->tisob;
            $bxh->HieuSo += ($request->tisoa - $request->tisob );
            $bxh->Diem += 0;
        }
        $bxh->save();


        $bxh = BangXepHang::find($bxhb->id);
        $bxh->TheVang           +=       $request->thevangb;
        $bxh->TheDo             +=       $request->thedob;
        
        if($request->thevangb %2 == 1){
        	$request->thevangb = $request->thevangb -1;
        	$request->thevangb = ($request->thevangb/2)*(-3) + (-1);
        	$bxh->ChiSoFairplay     +=     $request->thevangb   + ($request->thedob*(-4));
        }

        else if($request->thevangb %2 == 0){
        	$request->thevangb = ($request->thevangb/2)*(-3);
        	$bxh->ChiSoFairplay     +=     $request->thevangb   + ($request->thedob*(-4));
        }

        if($tisob->TrangThai == 1){
            $bxh->SoTran +=1;
            $bxh->SoTranThang +=1;
            $bxh->BanThang += $request->tisob;
            $bxh->BanThua += $request->tisoa;
            $bxh->HieuSo += ($request->tisob - $request->tisoa );
            $bxh->Diem += 3;
        }
        else if($tisob->TrangThai == 0){
            $bxh->SoTran += 1;
            $bxh->SoTranHoa += 1;
            $bxh->BanThang += $request->tisob;
            $bxh->BanThua += $request->tisoa;
            $bxh->Diem += 1;
        }
        else{
            $bxh->SoTran +=1;
            $bxh->SoTranThua +=1;
            $bxh->BanThang += $request->tisob;
            $bxh->BanThua += $request->tisoa;
            $bxh->HieuSo += ($request->tisob - $request->tisoa );
            $bxh->Diem += 0;
        }
        $bxh->save();


        $trandauCLB = TranDau::where('id',$tisoa->idTranDau)->where('TranDauCuaCLB',1)->first();
        if(isset($trandauCLB)){

            $trandau_doihinh = DoiHinh::where('id', $trandauCLB->idDoiHinh)->first();
            $caulacboa = CauLacBo::where('id',$tisoa->idCauLacBo)->first();
            $caulacbob = CauLacBo::where('id',$tisob->idCauLacBo)->first();

            if($request->tisoa < $request->tisob){
                if($caulacboa->TenDayDu == 'Liverpool'){
                    $trandau_doihinh->SoTranThua += 1;
                }
                else if($caulacbob->TenDayDu == 'Liverpool'){
                    $trandau_doihinh->SoTranThang += 1;
                }
            }

            if($request->tisoa == $request->tisob){
                if($caulacboa->TenDayDu == 'Liverpool'){
                    $trandau_doihinh->SoTranHoa += 1;
                }
                else if($caulacbob->TenDayDu == 'Liverpool'){
                    $trandau_doihinh->SoTranHoa += 1;
                }
            }

            if($request->tisoa > $request->tisob){
                if($caulacboa->TenDayDu == 'Liverpool'){
                    $trandau_doihinh->SoTranThang += 1;
                }
                else if($caulacbob->TenDayDu == 'Liverpool'){
                    $trandau_doihinh->SoTranThua += 1;
                }
            }

            $trandau_doihinh->save();
                
        }

        return redirect()->route('DanhSachLichThiDau')->with('success','Cập nhật tỉ số thành công'); 
    }

    public function getDanhSachLiverpool(){
        $lichthidau_liverpool = DB::SELECT("
                                    SELECT
                                    trandau.id,
                                    trandau.VongDau,
                                    trandau.NgayThiDau,
                                    trandau.DiaDiem,
                                    tiso.TiSo,
                                    caulacbo.TenDayDu,
                                    caulacbo.HinhAnhCauLacBo,
                                    doihinh.TenDoiHinh,
                                    chienthuat.TenChienThuat
                                    FROM
                                    trandau
                                    LEFT JOIN doihinh ON trandau.idDoiHinh = doihinh.id
                                    LEFT JOIN chienthuat ON trandau.idChienThuat = chienthuat.id
                                    INNER JOIN tiso ON tiso.idTranDau = trandau.id
                                    INNER JOIN caulacbo ON tiso.idCauLacBo = caulacbo.id
                                    WHERE
                                    trandau.TranDauCuaCLB = '1' AND
                                    tiso.TiSo IS NOT NULL
                                    ORDER BY
                                    trandau.NgayThiDau DESC,
                                    tiso.id DESC
                                ");
        foreach($lichthidau_liverpool as $ltd){
            $thanhtich_trandau[] = ThanhTichCauThu::where('idTranDau',$ltd->id)->get();
        }
        

        return view('admin.pages.lichthidau.danhsachliverpool', compact('lichthidau_liverpool','thanhtich_trandau'));
    }

    public function getThemThanhTich($id){
        $cauthu_trandau = DB::SELECT("
                                SELECT
                                tiso.idTranDau,
                                caulacbo.TenDayDu,
                                trandau.VongDau,
                                nguoidung.HoTen,
                                vitri.TenViTri,
                                cauthu.id
                                FROM
                                tiso
                                INNER JOIN caulacbo ON tiso.idCauLacBo = caulacbo.id
                                INNER JOIN trandau ON tiso.idTranDau = trandau.id
                                INNER JOIN vitri_cauthu_trandau ON vitri_cauthu_trandau.idTranDau = trandau.id
                                INNER JOIN vitri ON vitri_cauthu_trandau.idViTri = vitri.id
                                INNER JOIN cauthu ON vitri_cauthu_trandau.idCauThu = cauthu.id
                                INNER JOIN nguoidung ON cauthu.idNguoiDung = nguoidung.id
                                WHERE
                                vitri_cauthu_trandau.idTranDau = '$id' AND
                                caulacbo.TenDayDu = 'Liverpool'
                                ORDER BY
                                trandau.id ASC, vitri_cauthu_trandau.id ASC

        ");

        $trandau = DB::SELECT("
                        SELECT
                        caulacbo.TenDayDu,
                        caulacbo.HinhAnhCauLacBo_lon,
                        tiso.idGiaiDau,
                        tiso.TiSo,
                        tiso.id,
                        trandau.id,
                        trandau.VongDau,
                        trandau.NgayThiDau,
                        trandau.GioThiDau,
                        trandau.DiaDiem
                        FROM
                        caulacbo
                        INNER JOIN tiso ON tiso.idCauLacBo = caulacbo.id
                        INNER JOIN trandau ON tiso.idTranDau = trandau.id
                        WHERE trandau.id = '$id'
        ");


        return view('admin.pages.lichthidau.themthanhtich', compact('trandau','cauthu_trandau'));
    }

    public function postThemThanhTich($id, Request $request){
        $cauthu_trandau = DB::SELECT("
                                SELECT
                                tiso.idTranDau,
                                caulacbo.TenDayDu,
                                trandau.VongDau,
                                nguoidung.HoTen,
                                vitri.TenViTri,
                                cauthu.id
                                FROM
                                tiso
                                INNER JOIN caulacbo ON tiso.idCauLacBo = caulacbo.id
                                INNER JOIN trandau ON tiso.idTranDau = trandau.id
                                INNER JOIN vitri_cauthu_trandau ON vitri_cauthu_trandau.idTranDau = trandau.id
                                INNER JOIN vitri ON vitri_cauthu_trandau.idViTri = vitri.id
                                INNER JOIN cauthu ON vitri_cauthu_trandau.idCauThu = cauthu.id
                                INNER JOIN nguoidung ON cauthu.idNguoiDung = nguoidung.id
                                WHERE
                                vitri_cauthu_trandau.idTranDau = '$id' AND
                                caulacbo.TenDayDu = 'Liverpool'
                                ORDER BY
                                trandau.id ASC, vitri_cauthu_trandau.id ASC

        ");

        $trandau = DB::SELECT("
                        SELECT
                        caulacbo.TenDayDu,
                        caulacbo.HinhAnhCauLacBo_lon,
                        tiso.idGiaiDau,
                        tiso.TiSo,
                        tiso.id,
                        trandau.VongDau,
                        trandau.id,
                        trandau.NgayThiDau,
                        trandau.GioThiDau,
                        trandau.DiaDiem
                        FROM
                        caulacbo
                        INNER JOIN tiso ON tiso.idCauLacBo = caulacbo.id
                        INNER JOIN trandau ON tiso.idTranDau = trandau.id
                        WHERE trandau.id = '$id'

        ");

        for($i = 0 ; $i < count($request->soduongchuyen); $i++){

            $thanhtich = new ThanhTichCauThu;
            $thanhtich->SoDuongChuyen               =       $request->soduongchuyen[$i];
            $thanhtich->ChuyenThanhCong             =       $request->chuyenthanhcong[$i];
            $thanhtich->SoKienTao                   =       $request->sokientao[$i];
            $thanhtich->SoLanSut                    =       $request->solansut[$i];
            $thanhtich->SoBanThang                  =       $request->sobanthang[$i];
            $thanhtich->SoTranGiuSachLuoi           =       $request->sotrangiusachluoi[$i];
            $thanhtich->SoLanCanPha                 =       $request->solancanpha[$i];
            $thanhtich->TheVang                     =       $request->thevang[$i];
            $thanhtich->TheDo                       =       $request->thedo[$i];
            $thanhtich->idTranDau                   =       $trandau[0]->id;
            $thanhtich->idCauThu                    =       $cauthu_trandau[$i]->id;


            if($request->soduongchuyen[$i]* 0.3 > 10){
                $soduongchuyen = 10;
            }
            else{
                $soduongchuyen = ($request->soduongchuyen[$i]* 0.3);
            }
            

            if($request->chuyenthanhcong[$i]* 0.6 > 10){
                $chuyenthanhcong = 10;
            }
            else{
                $chuyenthanhcong = ($request->chuyenthanhcong[$i]* 0.6);
            }

            if($request->sokientao[$i]* 5 > 10){
                $sokientao = 10;
            }
            else{
                $sokientao = ($request->sokientao[$i]* 5);
            }

            if($request->solansut[$i]* 2 > 10){
                $solansut = 10;
            }
            else{
                $solansut = ($request->solansut[$i]* 2);
            }

            if($request->sobanthang[$i]* 7 > 10){
                $sobanthang = 10;
            }
            else{
                $sobanthang = ($request->sobanthang[$i]* 7);
            }

            if($request->sotrangiusachluoi[$i] == 1){
                $sotrangiusachluoi = 10;
            }
            else{
                $sotrangiusachluoi = 5;
            }

            if($request->solancanpha[$i]* 4 > 10){
                $solancanpha = 10;
            }
            else{
                $solancanpha = ($request->solancanpha[$i]* 4);
            }

            if($request->thevang[$i] == 0){
                $thevang = 10;
            }
            else if($request->thevang[$i] == 1){
                $thevang = 5;
            }
            else if($request->thevang[$i] == 2){
                $thevang = 0;
            }

            if($request->thedo[$i] == 0){
                $thedo = 10;
            }
            else{
                $thedo = 0;
            }

            // dd($soduongchuyen , $chuyenthanhcong , $sokientao , $solansut , $sobanthang , $sotrangiusachluoi , $solancanpha , $thevang , $thedo);

            $thanhtich->DiemSo = (($soduongchuyen + $chuyenthanhcong + $sokientao + $solansut + $sobanthang + $sotrangiusachluoi + $solancanpha + $thevang + $thedo)/9);

            number_format($thanhtich->DiemSo, 1);
            $thanhtich->save();

            $phongdo_cauthu = PhongDo_CauThu::where('idCauThu', $cauthu_trandau[$i]->id)->first();

            // dd($phongdo_cauthu);

            if($thanhtich->DiemSo < 4){
                $phongdo_cauthu->idPhongDo = 5;
            }
            else if($thanhtich->DiemSo < 6){
                $phongdo_cauthu->idPhongDo = 4;
            }
            else if($thanhtich->DiemSo < 7.5){
                $phongdo_cauthu->idPhongDo = 3;
            }
            else if($thanhtich->DiemSo < 9){
                $phongdo_cauthu->idPhongDo = 2;
            }
            else if($thanhtich->DiemSo < 10){
                $phongdo_cauthu->idPhongDo = 1;
            }

            $phongdo_cauthu->save();

        }

        return redirect()->route('DanhSachLiverpool')->with('success', 'Thêm thành tích cầu thủ thành công');
    }

    public function getCapNhatThanhTich($id){
        $cauthu_trandau = DB::SELECT("
                                SELECT
                                tiso.idTranDau,
                                caulacbo.TenDayDu,
                                trandau.VongDau,
                                nguoidung.HoTen,
                                vitri.TenViTri,
                                cauthu.id
                                FROM
                                tiso
                                INNER JOIN caulacbo ON tiso.idCauLacBo = caulacbo.id
                                INNER JOIN trandau ON tiso.idTranDau = trandau.id
                                INNER JOIN vitri_cauthu_trandau ON vitri_cauthu_trandau.idTranDau = trandau.id
                                INNER JOIN vitri ON vitri_cauthu_trandau.idViTri = vitri.id
                                INNER JOIN cauthu ON vitri_cauthu_trandau.idCauThu = cauthu.id
                                INNER JOIN nguoidung ON cauthu.idNguoiDung = nguoidung.id
                                WHERE
                                vitri_cauthu_trandau.idTranDau = '$id' AND
                                caulacbo.TenDayDu = 'Liverpool'
                                ORDER BY
                                trandau.id ASC

        ");

        $trandau = DB::SELECT("
                        SELECT
                        caulacbo.TenDayDu,
                        caulacbo.HinhAnhCauLacBo_lon,
                        tiso.idGiaiDau,
                        tiso.TiSo,
                        tiso.id,
                        trandau.id,
                        trandau.VongDau,
                        trandau.NgayThiDau,
                        trandau.GioThiDau,
                        trandau.DiaDiem
                        FROM
                        caulacbo
                        INNER JOIN tiso ON tiso.idCauLacBo = caulacbo.id
                        INNER JOIN trandau ON tiso.idTranDau = trandau.id
                        WHERE trandau.id = '$id'
        ");

        $thanhtich = DB::SELECT("
                        SELECT
                        nguoidung.HoTen,
                        cauthu.ViTriSoTruong,
                        thanhtichcauthu.DiemSo,
                        thanhtichcauthu.SoDuongChuyen,
                        thanhtichcauthu.ChuyenThanhCong,
                        thanhtichcauthu.SoKienTao,
                        thanhtichcauthu.SoLanSut,
                        thanhtichcauthu.SoBanThang,
                        thanhtichcauthu.SoTranGiuSachLuoi,
                        thanhtichcauthu.SoLanCanPha,
                        thanhtichcauthu.TheVang,
                        thanhtichcauthu.TheDo,
                        trandau.id,
                        cauthu.id,
                        vitri.TenViTri
                        FROM
                        nguoidung
                        INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
                        INNER JOIN thanhtichcauthu ON thanhtichcauthu.idCauThu = cauthu.id
                        INNER JOIN trandau ON thanhtichcauthu.idTranDau = trandau.id
                        INNER JOIN vitri_cauthu ON vitri_cauthu.idCauThu = cauthu.id
                        INNER JOIN vitri ON vitri_cauthu.idViTri = vitri.id
                        WHERE
                        trandau.id = '$id'
                        ORDER BY trandau.id ASC

        ");
        return view('admin.pages.lichthidau.capnhatthanhtich', compact('thanhtich','trandau','cauthu_trandau'));
    }

    public function postCapNhatThanhTich($id, Request $request){
        $cauthu_trandau = DB::SELECT("
                                SELECT
                                tiso.idTranDau,
                                caulacbo.TenDayDu,
                                trandau.VongDau,
                                nguoidung.HoTen,
                                vitri.TenViTri,
                                cauthu.id
                                FROM
                                tiso
                                INNER JOIN caulacbo ON tiso.idCauLacBo = caulacbo.id
                                INNER JOIN trandau ON tiso.idTranDau = trandau.id
                                INNER JOIN vitri_cauthu_trandau ON vitri_cauthu_trandau.idTranDau = trandau.id
                                INNER JOIN vitri ON vitri_cauthu_trandau.idViTri = vitri.id
                                INNER JOIN cauthu ON vitri_cauthu_trandau.idCauThu = cauthu.id
                                INNER JOIN nguoidung ON cauthu.idNguoiDung = nguoidung.id
                                WHERE
                                vitri_cauthu_trandau.idTranDau = '$id' AND
                                caulacbo.TenDayDu = 'Liverpool'
                                ORDER BY
                                trandau.id ASC

        ");

        $trandau = DB::SELECT("
                        SELECT
                        caulacbo.TenDayDu,
                        caulacbo.HinhAnhCauLacBo_lon,
                        tiso.idGiaiDau,
                        tiso.TiSo,
                        tiso.id,
                        trandau.VongDau,
                        trandau.id,
                        trandau.NgayThiDau,
                        trandau.GioThiDau,
                        trandau.DiaDiem
                        FROM
                        caulacbo
                        INNER JOIN tiso ON tiso.idCauLacBo = caulacbo.id
                        INNER JOIN trandau ON tiso.idTranDau = trandau.id
                        WHERE trandau.id = '$id'

        ");

        $thanhtich_cauthu = DB::SELECT("
                        SELECT
                        nguoidung.HoTen,
                        cauthu.ViTriSoTruong,
                        thanhtichcauthu.DiemSo,
                        thanhtichcauthu.SoDuongChuyen,
                        thanhtichcauthu.ChuyenThanhCong,
                        thanhtichcauthu.SoKienTao,
                        thanhtichcauthu.SoLanSut,
                        thanhtichcauthu.SoBanThang,
                        thanhtichcauthu.SoTranGiuSachLuoi,
                        thanhtichcauthu.SoLanCanPha,
                        thanhtichcauthu.TheVang,
                        thanhtichcauthu.TheDo,
                        cauthu.id,
                        vitri.TenViTri
                        FROM
                        nguoidung
                        INNER JOIN cauthu ON cauthu.idNguoiDung = nguoidung.id
                        INNER JOIN thanhtichcauthu ON thanhtichcauthu.idCauThu = cauthu.id
                        INNER JOIN trandau ON thanhtichcauthu.idTranDau = trandau.id
                        INNER JOIN vitri_cauthu ON vitri_cauthu.idCauThu = cauthu.id
                        INNER JOIN vitri ON vitri_cauthu.idViTri = vitri.id
                        WHERE
                        trandau.id = '$id'
                        ORDER BY trandau.id ASC

        ");

        for($i = 0 ; $i < count($request->soduongchuyen); $i++){

            $thanhtich = ThanhTichCauThu::where('idTranDau', $id)->where('idCauThu', $thanhtich_cauthu[$i]->id)->first();
            $thanhtich->SoDuongChuyen               =       $request->soduongchuyen[$i];
            $thanhtich->ChuyenThanhCong             =       $request->chuyenthanhcong[$i];
            $thanhtich->SoKienTao                   =       $request->sokientao[$i];
            $thanhtich->SoLanSut                    =       $request->solansut[$i];
            $thanhtich->SoBanThang                  =       $request->sobanthang[$i];
            $thanhtich->SoTranGiuSachLuoi           =       $request->sotrangiusachluoi[$i];
            $thanhtich->SoLanCanPha                 =       $request->solancanpha[$i];
            $thanhtich->TheVang                     =       $request->thevang[$i];
            $thanhtich->TheDo                       =       $request->thedo[$i];

            if($request->soduongchuyen[$i]* 0.3 > 10){
                $soduongchuyen = 10;
            }
            else{
                $soduongchuyen = ($request->soduongchuyen[$i]* 0.3);
            }
            

            if($request->chuyenthanhcong[$i]* 0.6 > 10){
                $chuyenthanhcong = 10;
            }
            else{
                $chuyenthanhcong = ($request->chuyenthanhcong[$i]* 0.6);
            }

            if($request->sokientao[$i]* 5 > 10){
                $sokientao = 10;
            }
            else{
                $sokientao = ($request->sokientao[$i]* 5);
            }

            if($request->solansut[$i]* 2 > 10){
                $solansut = 10;
            }
            else{
                $solansut = ($request->solansut[$i]* 2);
            }

            if($request->sobanthang[$i]* 7 > 10){
                $sobanthang = 10;
            }
            else{
                $sobanthang = ($request->sobanthang[$i]* 7);
            }

            if($request->sotrangiusachluoi[$i] == 1){
                $sotrangiusachluoi = 10;
            }
            else{
                $sotrangiusachluoi = 5;
            }

            if($request->solancanpha[$i]* 4 > 10){
                $solancanpha = 10;
            }
            else{
                $solancanpha = ($request->solancanpha[$i]* 4);
            }

            if($request->thevang[$i] == 0){
                $thevang = 10;
            }
            else if($request->thevang[$i] == 1){
                $thevang = 5;
            }
            else if($request->thevang[$i] == 2){
                $thevang = 0;
            }

            if($request->thedo[$i] == 0){
                $thedo = 10;
            }
            else{
                $thedo = 0;
            }

            // dd($soduongchuyen , $chuyenthanhcong , $sokientao , $solansut , $sobanthang , $sotrangiusachluoi , $solancanpha , $thevang , $thedo);

            $thanhtich->DiemSo = (($soduongchuyen + $chuyenthanhcong + $sokientao + $solansut + $sobanthang + $sotrangiusachluoi + $solancanpha + $thevang + $thedo)/9);

            number_format($thanhtich->DiemSo, 1);
            $thanhtich->save();

            $phongdo_cauthu = PhongDo_CauThu::where('idCauThu', $cauthu_trandau[$i]->id)->first();

            // dd($phongdo_cauthu);

            if($thanhtich->DiemSo < 4){
                $phongdo_cauthu->idPhongDo = 5;
            }
            else if($thanhtich->DiemSo < 6){
                $phongdo_cauthu->idPhongDo = 4;
            }
            else if($thanhtich->DiemSo < 7.5){
                $phongdo_cauthu->idPhongDo = 3;
            }
            else if($thanhtich->DiemSo < 9){
                $phongdo_cauthu->idPhongDo = 2;
            }
            else if($thanhtich->DiemSo < 10){
                $phongdo_cauthu->idPhongDo = 1;
            }

            $phongdo_cauthu->save();
        }

        // $thanhtich = ThanhTichCauThu::where('idTranDau', $id)->get();
        // $thevang = 0;
        // $thedo = 0;

        // for($i=0; $i < count($thanhtich); $i++){
        //     if($thanhtich[$i]->TheDo == 1){
        //         $thedo += 1;
        //     }
        //     if($thanhtich[$i]->TheVang == 1){
        //         $thevang += 1;
        //     }
        //     else if($thanhtich[$i]->TheVang == 2){
        //         $thevang += 2;
        //     }
        // }

        // $tiso = TiSo::where('idTranDau', $id)->get();
        
        // $bxha = BangXepHang::where('idGiaiDau', $tiso[0]->idGiaiDau)->where('idCauLacBo', $tiso[0]->idCauLacBo)->first();

        // dd()

        // $bxha = BangXepHang::find($bxha->id);
        // $bxha->TheVang = $thevang; 
        // $bxha->TheDo   = $thedo;
        // $bxha->ChiSoFairplay = -1*$thevang + -2*$thedo;
        // $bxha->save();

                
        return redirect()->route('DanhSachLiverpool')->with('success', 'Cập nhật thành tích cầu thủ thành công');
    }

}
