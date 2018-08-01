<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\GiaiDau;
use App\BangXepHangCLB;
use App\CauLacBo;

class BangXepHangCLBController extends Controller
{
    public function getDanhSach(){
    	$bangxephangclb = BangXepHangCLB::with('CauLacBo')->orderBy('Diem', 'DESC')->get();
    	return view('admin.pages.bangxephang.danhsach', compact('bangxephangclb'));
    }

    public function getThem(){
        $caulacbo = CauLacBo::all();
    	return view('admin.pages.bangxephang.them', compact('caulacbo'));
    }

    public function postThem(Request $request){
        $bangxephang = BangXepHangCLB::with('CauLacBo')->get();

        if($request->caulacbo == 'macdinh'){
            return redirect()->back()->with('error', 'Chưa chọn câu lạc bộ');
        }

        foreach($bangxephang as $bxh){
            if($request->caulacbo == $bxh->idCauLacBo){
                return redirect()->back()->with('error', 'Tồn tại câu lạc bộ');
            }
        }

        $bangxephangclb = new BangXepHangCLB();
        $bangxephangclb->idCauLacBo = $request->caulacbo;
        $bangxephangclb->Diem = $request->diem;
        $bangxephangclb->HangCauLacBo = $request->hangcaulacbo;

        $bangxephangclb->save();
        return redirect()->route('DanhSachBangXepHangCLB')->with('success', 'Thêm bảng xếp hạng thành công');
        
    }

    public function getXoa($id){
        $caulacbo = CauLacBo::find($id);
        $bangxephangclb = BangXepHangCLB::find($id);

        if($bangxephangclb->idCauLacBo == $caulacbo->id){
            return redirect()->back()->with('error', 'Tồn tại câu lạc bộ trong bảng xếp hạng');
        }
        else{
            $bangxephangclb->delete();
            return redirect()->back()->with('success', 'Xoá bảng xếp hạng thành công');
        }
    }


    public function getSua($id){
        $caulacbo = CauLacBo::all();
        $bangxephangclb = BangXepHangCLB::find($id);
    	return view('admin.pages.bangxephang.sua', compact('caulacbo', 'bangxephangclb'));
    }

    public function postSua($id, Request $request){
        $this->validate($request, [
            'caulacbo'      =>      'unique:bangxephangclb,idCauLacBo,'.$id.',id'
        ], 
        [
            'caulacbo.unique'       =>      'Câu lạc bộ đã tồn tại'
        ]);

        $bangxephang = BangXepHangCLB::with('CauLacBo')->get();

        if($request->caulacbo == 'macdinh'){
            return redirect()->back()->with('error', 'Chưa chọn câu lạc bộ');
        }

        // foreach($bangxephang as $bxh){
        //     if($request->caulacbo != $request->caulacbo && $request->caulacbo  == $bxh->idCauLacBo){
        //         return redirect()->back()->with('error', 'Tồn tại câu lạc bộ');
        //     }
        // }

        $bangxephangclb = BangXepHangCLB::find($id);
        $bangxephangclb->idCauLacBo = $request->caulacbo;
        $bangxephangclb->Diem = $request->diem;
        $bangxephangclb->HangCauLacBo = $request->hangcaulacbo;

        $bangxephangclb->save();
        return redirect()->route('DanhSachBangXepHangCLB')->with('success', 'Cập nhật bảng xếp hạng thành công');
    }
}
