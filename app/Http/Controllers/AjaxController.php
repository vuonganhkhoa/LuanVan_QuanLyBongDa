<?php

namespace App\Http\Controllers;

use Request;
use App\DoiHinh;
use App\ChienThuat;
use App\VaiTro;
use App\ViTri;
use App\ViTriDoiHinh;
use DB;

class AjaxController extends Controller
{
    public function getAjaxSapXepDoiHinhChienThuat($idDoiHinh, $idTranDau, Request $request){

    	$ViTriDoiHinh = DB::SELECT("
										SELECT vitri.*
										FROM doihinh
										INNER JOIN vitri_doihinh ON vitri_doihinh.idDoiHinh = doihinh.id
										INNER JOIN vitri ON vitri_doihinh.idViTri = vitri.id
										WHERE doihinh.id='$idDoiHinh'
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

		$html = ''; 
		$data = '';
		
        if($request::ajax()){

            $doihinhAJAX = DoiHinh::where('id', $idDoiHinh)->first();

            $html .= '
				<div class="col-md-12" id="formSapXepDoiHinhChienThuat">
					<div class="ftb_tabs_drop">
						<h5>Đội hình ra sân</h5>
					</div>
					<table class="formation">
							<tbody class="text-center">';

								for($dong=0; $dong<8; $dong++){

								$html .= '<tr>';
									for ($cot=0; $cot<5; $cot++){
										
										$html .= '<td>';
											for ($i=0; $i<11; $i++){
											if ($dong===$ViTriDoiHinh[$i]->ChiSoDong && $cot===$ViTriDoiHinh[$i]->ChiSoCot){

												$html .= '<select name="CauThu[]"  class="form-control" id="CauThu'.$i.'">';
													foreach ($CauThuDuocRaSan as $cauthu)
													{
													if($ViTriDoiHinh[$i]->id===$cauthu->ViTriID)
													{
														if(isset($cauthu->ViTriID)){

															$html .= '<option value="'. $cauthu->id .'" title="Client/images/arrows/'.$cauthu->ChiSoPhongDo.'_.png">'. $cauthu->HoTen;
															
															if(!empty($ThePhatCauThu)){
															foreach($ThePhatCauThu as $thephat){
																if($thephat->idCauThu === $cauthu->id && $thephat->TongTheDo != 0){
																	$html .= ' ( thẻ đỏ)';
																}
															}
															}
															if(!empty($CauThuBiChanThuong)){
																foreach($CauThuBiChanThuong as $chanthuong){
																	if($chanthuong->id === $cauthu->id){
																		$html .= ' ( chấn thương)';
																	}
																}
																}
															if(!empty($ThePhatCauThu)){
																foreach($ThePhatCauThu as $thephat){
																	if($thephat->idCauThu === $cauthu->id && $thephat->TongTheVang == 2){
																		$html .= ' ( 2 thẻ vàng)';
																	}
																}
																}
													
																// if(!empty($TongThePhatCauThu)){
																// 	foreach($TongThePhatCauThu as $thephat){
																// 		if($thephat->idCauThu === $cauthu->id && $thephat->TongTheVang != 0){
																// 			$html .= ' ( '. $thephat->TongTheVang .' thẻ vàng)';
																// 		}
																// 	}
																// 	}
															
															
															$html .= '</option>';

														}
													}
													}
												$html .= '</select><input class="form-control" type="text" name="NhiemVuCauThu[]" value="Đá tổng lực" placeholder="Nhiệm vụ">'.
												$ViTriDoiHinh[$i]->TenViTri;

											}
											}
										$html .= '</td>';

									
									}
								$html .= '</tr>';
								}

							$html .= '</tbody>
					</table>
				</div>
            ';
    
        }
        $data = array( 
        	'DoiHinh' => "$html", 
        );
        die(json_encode($data));

    }

    public function getAjaxSuaDoiHinhChienThuat( $idDoiHinh, $idTranDau, Request $request){

    	$CauThu = DB::SELECT("
								SELECT
								vitri_cauthu_trandau.*
								FROM trandau
								INNER JOIN vitri_cauthu_trandau ON vitri_cauthu_trandau.idTranDau = trandau.id
								WHERE trandau.id='$idTranDau'
							");

    	$ViTriDoiHinh = DB::SELECT("
										SELECT vitri.*
										FROM doihinh
										INNER JOIN vitri_doihinh ON vitri_doihinh.idDoiHinh = doihinh.id
										INNER JOIN vitri ON vitri_doihinh.idViTri = vitri.id
										WHERE doihinh.id='$idDoiHinh'
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

		$html = ''; 
		$data = '';
		
        if($request::ajax()){

            $doihinhAJAX = DoiHinh::where('id', $idDoiHinh)->first();

            $html .= '
				<div class="col-md-12" id="formSapXepDoiHinhChienThuat">
					<div class="ftb_tabs_drop">
						<h5>Đội hình ra sân</h5>
					</div>
					<table class="formation">
							<tbody class="text-center">';

								for($dong=0; $dong<8; $dong++){

								$html .= '<tr>';
									for ($cot=0; $cot<5; $cot++){
										
										$html .= '<td>';
											for($i=0; $i<11; $i++){
											if($dong===$ViTriDoiHinh[$i]->ChiSoDong && $cot===$ViTriDoiHinh[$i]->ChiSoCot){

												$html .= '<select name="CauThu[]"  class="form-control"  id="CauThu'.$i.'">';
												foreach ($CauThuDuocRaSan as $cauthu)
												{
												if($ViTriDoiHinh[$i]->id===$cauthu->ViTriID)
												{
													if(isset($cauthu->ViTriID)){

													$html .= '<option value="'. $cauthu->id .'"'. ($CauThu[$i]->idCauThu===$cauthu->id ? "selected" : "") .'  title="Client/images/arrows/'.$cauthu->ChiSoPhongDo.'_.png">'. $cauthu->HoTen ;
														
													if(!empty($CauThuBiChanThuong)){
														foreach($CauThuBiChanThuong as $chanthuong){
															if($chanthuong->id === $cauthu->id){
																$html .= ' ( chấn thương)';
															}
														}
														}
													
													if(!empty($ThePhatCauThu)){
														foreach($ThePhatCauThu as $thephat){
															if($thephat->idCauThu === $cauthu->id && $thephat->TongTheDo != 0){
																$html .= ' ( thẻ đỏ)';
															}
														}
														}

														if(!empty($ThePhatCauThu)){
															foreach($ThePhatCauThu as $thephat){
																if($thephat->idCauThu === $cauthu->id && $thephat->TongTheVang == 2){
																	$html .= ' ( 2 thẻ vàng)';
																}
															}
															}
							
															// if(!empty($TongThePhatCauThu)){
															// foreach($TongThePhatCauThu as $thephat){
															// 	if($thephat->idCauThu === $cauthu->id && $thephat->TongTheVang != 0){
															// 		$html .= ' ( '. $thephat->TongTheVang .' thẻ vàng)';
															// 	}
															// }
															// }
														
														
														$html .= '</option>';

													}
												}
												}
												$html .= '</select><input class="form-control" type="text" name="NhiemVuCauThu[]" value="'.$CauThu[$i]->NhiemVuCauThu.'" placeholder="Nhiệm vụ">'.
												$ViTriDoiHinh[$i]->TenViTri;
											}
											}
										$html .= '</td>';

									
									}
								$html .= '</tr>';
								}

							$html .= '</tbody>
					</table>
				</div>
            ';
    
        }
        $data = array( 
        	'DoiHinh' => "$html", 
        );
        die(json_encode($data));

    }
}


