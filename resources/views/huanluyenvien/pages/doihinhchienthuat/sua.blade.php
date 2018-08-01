

@extends ('huanluyenvien.layouts.master')

@section ("title")
Liverpool FC - Cập nhật đội hình chiến thuật
@stop

@section ("style")
<script src="Client/js/Chart.bundle.min.js"></script>
<script src="Client/js/Chart.min.js"></script>
<script src="js/jquery.dd.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="dd.css" />
<style type="text/css" media="screen">
.kode_ply_table .kode_ply_two > td {
	padding: 5px;
}
table.kode_ply_table .kode_ThongKe:hover td{
    background-color: white ;
    color: black ;
}
.panel{
	max-width: 1100px;
	margin: 0px auto;
	padding: 0px;	
}
.panel-default{
	border: 1px solid #F5F1F1 !important;
	box-shadow: 0 -1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24) !important;
}

.widgetChart {

    border: 1px solid #F5F1F1;
    padding: 0px;
    box-shadow: 0 -1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);
    margin-bottom: 25px; 
}
.states-mdl{
    margin: 0 2%;
}
.charts,.row {
    margin: 2em 0 0;
}
.charts-grids {
    background-color: #fcfcfc;
    padding:1em;
}
.charts-grids canvas#bar {
    width: 100% !important;
}
.charts canvas#line {
    width: 100% !important;
}



.formation{
	border: 1px solid #F5F1F1;
    padding: 0px;
    box-shadow: 0 -1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);
    background-image: url(Client/images/formations/img.jpg);
    background-position: center bottom;
    background-size: cover;
    opacity: 0.8;
	text-shadow: 1px 0 0 green;
	color: black;
	font-weight: bold;
}
.formation td{
	padding: 20px;
}

@media (max-width: 1024px){
	.widgetChart{
		margin-top: 60px;
		width: 100% !important;
	}
}
</style>
@stop

@section ('content')

<div class="kode_benner1 bamnner2">
	<div class="kode_benner1_text">
		<h2>Đội hình chiến thuật</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="./huan-luyen-vien">Trang chủ</a></li>
				<li><a href="./huan-luyen-vien/doi-hinh-chien-thuat">Đội hình chiến thuật</a></li>
				<li class="active">Cập nhật </li>
			</ul>
		</div>
	</div>
</div>

<div class="kode-content">
	<div class="ft-match-slider">

		<div class="kode_player_wraper" style="  padding:50px 0px 10px;  border-bottom: 1px solid #fff">
			<div class="container">
				<div class="row">
					@if (!empty($TranDauMuonSapXep))
					<div class="kode_ticket_sig_row">
						<div class="ftb-result-wrap">
							<div class="ftb-result1">
								<div class="ftb-result-logo">
									<a><img src="./Client/images/logos/{{ $TranDauMuonSapXep[0]->HinhAnhCauLacBo_lon }}" alt=""></a>
								</div>
								<div class="text">
									<h6><a>{{ $TranDauMuonSapXep[0]->TenDayDu }}</a></h6>
								</div>
							</div>

							<div class="ftb-final-result">
								<em>{{ date('d/m/Y',strtotime($TranDauMuonSapXep[0]->NgayThiDau)) }} | {{ date('G:i',strtotime($TranDauMuonSapXep[0]->GioThiDau)) }} PM <i>{{ $TranDauMuonSapXep[0]->DiaDiem }}</i></em>
								<a class="btn-4">Vòng {{ $TranDauMuonSapXep[0]->VongDau }}</a>
							</div>

							<div class="ftb-result1 ftb-result2">
								<div class="ftb-result-logo">
									<a><img src="./Client/images/logos/{{ $TranDauMuonSapXep[1]->HinhAnhCauLacBo_lon }}" alt=""></a>
								</div>
								<div class="text">
									<h6><a>{{ $TranDauMuonSapXep[1]->TenDayDu }}</a></h6>
								</div>
							</div>
						</div>
					</div>
					@else
					<div class="alert alert-danger">Chưa có thông tin về trận đấu tiếp theo !</div>
					@endif
				</div>
			</div>
		</div>

		<section>
			<div class="container">
				
				<div class="panel-group">
					<div class="panel panel-default">
						<div class="panel-body">

							@if (session('thongbao'))
							<div class="alert alert-success">{{ session('thongbao') }}</div>
							@endif
							@if (session('loi'))
							<div class="alert alert-danger">{{ session('loi') }}</div>
							@endif



							<div class="col-md-6 charts-grids widgetChart">
								<canvas id="GhiBan" height="260" width="400"> </canvas>
							</div>

							<div class="col-md-6 charts-grids widgetChart">
								<canvas id="KienTao" height="260" width="400"> </canvas>
							</div>



							<div class="col-md-4 charts-grids widgetChart">
								<canvas id="DoiHinhThuNhat" height="320" width="400"> </canvas>
							</div>
							<div class="col-md-4 charts-grids widgetChart">
								<canvas id="DoiHinhThuHai" height="320" width="400"> </canvas>
							</div>
							<div class="col-md-4 charts-grids widgetChart">
								<canvas id="DoiHinhThuBa" height="320" width="400"> </canvas>
							</div>
							


							<script>
							var ctx1 = document.getElementById("GhiBan").getContext('2d');
							var GhiBan = new Chart(ctx1, {
								type: 'bar',
								data: {
									labels: {!! $CauThuGhiBanChart !!},
									datasets: [
									{	
										data: {!! $SoBanThangChart !!},
										backgroundColor: [
										'rgba(255, 99, 132, 0.2)',
										'rgba(255, 99, 132, 0.2)',
										'rgba(255, 99, 132, 0.2)',
										'rgba(255, 99, 132, 0.2)',
										'rgba(255, 99, 132, 0.2)',
										'rgba(255, 99, 132, 0.2)',
										],
										borderColor: [
										'rgba(255,99,132,1)',
										'rgba(255,99,132,1)',
										'rgba(255,99,132,1)',
										'rgba(255,99,132,1)',
										'rgba(255,99,132,1)',
										'rgba(255,99,132,1)',
										],
										borderWidth: 1
									},
									{
										data: {!! $SoKienTaoChart !!},
										backgroundColor: [
										'rgba(54, 162, 235, 0.2)',
										'rgba(54, 162, 235, 0.2)',
										'rgba(54, 162, 235, 0.2)',
										'rgba(54, 162, 235, 0.2)',
										'rgba(54, 162, 235, 0.2)',
										'rgba(54, 162, 235, 0.2)',
										],
										borderColor: [
										'rgba(54, 162, 235, 1)',
										'rgba(54, 162, 235, 1)',
										'rgba(54, 162, 235, 1)',
										'rgba(54, 162, 235, 1)',
										'rgba(54, 162, 235, 1)',
										'rgba(54, 162, 235, 1)',
										],
										borderWidth: 1
									}]
								},
								options: {
									title: {
							            display: true,
							            text: 'Xếp hạng cầu thủ đóng góp bàn thắng',
							            fontSize:20
							        },
									legend: {
										display: false
									},
									scales: {
										yAxes: [{
											ticks: {
												beginAtZero:true
											}
										}]
									},
									responsive: true
								}
							});

							var ctx1 = document.getElementById("KienTao").getContext('2d');
							var KienTao = new Chart(ctx1, {
								type: 'bar',
								data: {
									labels: {!! $CauThuDiemChart !!},
									datasets: [
									{
										data: {!! $DiemTrungBinhChart !!},
										backgroundColor: [
										'rgba(0, 178, 117, 0.2)',
										'rgba(0, 178, 117, 0.2)',
										'rgba(0, 178, 117, 0.2)',
										'rgba(0, 178, 117, 0.2)',
										'rgba(0, 178, 117, 0.2)',
										'rgba(0, 178, 117, 0.2)',
										],
										borderColor: [
										'rgba(0,178,117,1)',
										'rgba(0,178,117,1)',
										'rgba(0,178,117,1)',
										'rgba(0,178,117,1)',
										'rgba(0,178,117,1)',
										'rgba(0,178,117,1)',
										],
										borderWidth: 1
									}]
								},
								options: {
									title: {
							            display: true,
							            text: 'Xếp hạng điểm số cầu thủ ',
							            fontSize:20
							        },
									legend: {
										display: false
									},
									scales: {
										yAxes: [{
											ticks: {
												beginAtZero:true
											}
										}]
									},
									responsive: true
								}
							});
							</script>

							<script>
							var ctx3 = document.getElementById("DoiHinhThuNhat").getContext('2d');
							var DoiHinhThuNhat = new Chart(ctx3, {
								type: 'doughnut',
								data: {
									labels: ["Thắng", "Hòa", "Thua"],
									datasets: [{
										
										data: [
											{{ 
												ROUND(($DoiHinhThuNhatChart->SoTranThang)*100/($DoiHinhThuNhatChart->SoTranThang+$DoiHinhThuNhatChart->SoTranHoa+$DoiHinhThuNhatChart->SoTranThua)) 
											}},
											{{ 
												ROUND(($DoiHinhThuNhatChart->SoTranHoa)*100/($DoiHinhThuNhatChart->SoTranThang+$DoiHinhThuNhatChart->SoTranHoa+$DoiHinhThuNhatChart->SoTranThua)) 
											}},
											{{ 
												ROUND(($DoiHinhThuNhatChart->SoTranThua)*100/($DoiHinhThuNhatChart->SoTranThang+$DoiHinhThuNhatChart->SoTranHoa+$DoiHinhThuNhatChart->SoTranThua)) 
											}}
										],
										backgroundColor: [
										'#FF6384',
										'#36A2EB',
										'rgba(0, 0, 0, 0.85)',
				
										],
										borderColor: [
										'#FF6384',
										'#36A2EB',
										'rgba(0, 0, 0, 0.85)',
										],
										borderWidth: 1,
									}]
								},
								options: {
									legend: {
										display: true,
										position: 'bottom'
									},
									title: {
							            display: true,
							            text: 'Đội hình ' + {!! json_encode($DoiHinhThuNhatChart->TenDoiHinh) !!},
							            fontSize:20
							        },
									responsive: true
								}
							});

							var ctx3 = document.getElementById("DoiHinhThuHai").getContext('2d');
							var DoiHinhThuHai = new Chart(ctx3, {
								type: 'doughnut',
								data: {
									labels: ["Thắng", "Hòa", "Thua"],
									datasets: [{
										
										data: [
											{{ 
												ROUND(($DoiHinhThuHaiChart->SoTranThang)*100/($DoiHinhThuHaiChart->SoTranThang+$DoiHinhThuHaiChart->SoTranHoa+$DoiHinhThuHaiChart->SoTranThua)) 
											}},
											{{ 
												ROUND(($DoiHinhThuHaiChart->SoTranHoa)*100/($DoiHinhThuHaiChart->SoTranThang+$DoiHinhThuHaiChart->SoTranHoa+$DoiHinhThuHaiChart->SoTranThua)) 
											}},
											{{ 
												ROUND(($DoiHinhThuHaiChart->SoTranThua)*100/($DoiHinhThuHaiChart->SoTranThang+$DoiHinhThuHaiChart->SoTranHoa+$DoiHinhThuHaiChart->SoTranThua)) 
											}}
										],
										backgroundColor: [
										'#FF6384',
										'#36A2EB',
										'rgba(0, 0, 0, 0.85)',
				
										],
										borderColor: [
										'#FF6384',
										'#36A2EB',
										'rgba(0, 0, 0, 0.85)',
										],
										borderWidth: 1,
									}]
								},
								options: {
									legend: {
										display: true,
										position: 'bottom'
									},
									title: {
							            display: true,
							            text: 'Đội hình ' + {!! json_encode($DoiHinhThuHaiChart->TenDoiHinh) !!},
							            fontSize:20
							        },
									responsive: true
								}
							});

							var ctx3 = document.getElementById("DoiHinhThuBa").getContext('2d');
							var DoiHinhThuBa = new Chart(ctx3, {
								type: 'doughnut',
								data: {
									labels: ["Thắng", "Hòa", "Thua"],
									datasets: [{
										
										data: [
											{{ 
												ROUND(($DoiHinhThuBaChart->SoTranThang)*100/($DoiHinhThuBaChart->SoTranThang+$DoiHinhThuBaChart->SoTranHoa+$DoiHinhThuBaChart->SoTranThua)) 
											}},
											{{ 
												ROUND(($DoiHinhThuBaChart->SoTranHoa)*100/($DoiHinhThuBaChart->SoTranThang+$DoiHinhThuBaChart->SoTranHoa+$DoiHinhThuBaChart->SoTranThua)) 
											}},
											{{ 
												ROUND(($DoiHinhThuBaChart->SoTranThua)*100/($DoiHinhThuBaChart->SoTranThang+$DoiHinhThuBaChart->SoTranHoa+$DoiHinhThuBaChart->SoTranThua)) 
											}}
										],
										backgroundColor: [
										'#FF6384',
										'#36A2EB',
										'rgba(0, 0, 0, 0.85)',
				
										],
										borderColor: [
										'#FF6384',
										'#36A2EB',
										'rgba(0, 0, 0, 0.85)',
										],
										borderWidth: 1,
									}]
								},
								options: {
									legend: {
										display: true,
										position: 'bottom'
									},
									title: {
							            display: true,
							            text: 'Đội hình ' + {!! json_encode($DoiHinhThuBaChart->TenDoiHinh) !!},
							            fontSize:20
							        },
									responsive: true
								}
							});
							</script>

					        <form  class="form-horizontal" method="POST" action="huan-luyen-vien/doi-hinh-chien-thuat/sua/{{ $idTranDau }}">
							{{ csrf_field() }}

							<div class="col-md-6" style="margin: 30px 0px">
								<div class="form-group {{ $errors->has('DoiHinh') ? 'has-error' : '' }}">
									<div class="col-sm-12">
										<select name="DoiHinh" class="form-control" id="DoiHinh">
											<option value="ChuaChon">Chọn đội hình</option>
											@foreach ($DoiHinh as $doihinh)
											<option 
												value="{{$doihinh->id}}" 
												{{ $TranDauMuonSuaDoiHinhChienThuat[0]->idDoiHinh === $doihinh->id ? 'selected' : ''}}
											>
												{{ $doihinh->TenDoiHinh }}
											</option>
											@endforeach
										</select>
										@if ($errors->has('DoiHinh'))
										<span class="help-block"><strong style="color:#E01A22">{{ $errors->first('DoiHinh') }}</strong></span>
										@endif
									</div>
								</div>
							</div>
							<div class="col-md-6" style="margin: 30px 0px">
								<div class="form-group {{ $errors->has('ChienThuat') ? 'has-error' : '' }}">
									<div class="col-sm-12">
										<select name="ChienThuat" class="form-control">
											<option value="ChuaChon">Chọn chiến thuật</option>
											@foreach ($ChienThuat as $chienthuat)
											<option 
												value="{{ old('ChienThuat',$chienthuat->id) }}"
												{{ $TranDauMuonSuaDoiHinhChienThuat[0]->idChienThuat === $chienthuat->id ? 'selected' : ''}}
											>
												{{ $chienthuat->TenChienThuat }}
											</option>
											@endforeach
										</select>
										@if ($errors->has('ChienThuat'))
										<span class="help-block"><strong style="color:#E01A22">{{ $errors->first('ChienThuat') }}</strong></span>
										@endif
									</div>
								</div>
							</div>
							
							<div class="col-md-12" id="formSapXepDoiHinhChienThuat">
								<div class="ftb_tabs_drop">
									<h5>Đội hình ra sân</h5>
								</div>
								<table class="formation">
										<tbody class="text-center">
			                  
											@for ($dong=0; $dong<8; $dong++)
											<tr>
												@for ($cot=0; $cot<5; $cot++)
													
													<td>
														@for ($i=0; $i<11; $i++)
														@if ($dong===$ViTriDoiHinh[$i]->ChiSoDong && $cot===$ViTriDoiHinh[$i]->ChiSoCot)
														<select name="CauThu[]"  class="form-control " id="CauThu{{$i}}">
																<option value="ChonCauThu">Chọn cầu thủ</option>
																@foreach ($CauThuDuocRaSan as $cauthu)
																@if($ViTriDoiHinh[$i]->id===$cauthu->ViTriID)
																<option 
																	value="{{ $cauthu->id }}"
																	{{ $CauThu[$i]->idCauThu===$cauthu->id ? 'selected' : '' }}
																	title="Client/images/arrows/{{$cauthu->ChiSoPhongDo}}_.png"
																>
																	{{ $cauthu->HoTen }}

																	{{-- Kiểm tra chấn thương --}}
																	@if(!empty($CauThuBiChanThuong))
																	@foreach($CauThuBiChanThuong as $chanthuong)
																		@if($chanthuong->id === $cauthu->id)
																			{{ ' ( chấn thương)' }}
																		@endif
																	@endforeach
																	@endif

																	{{-- Kiểm tra Trận đấu trước --}}
																	@if(!empty($ThePhatCauThu))
																	@foreach($ThePhatCauThu as $thephat)
																		@if($thephat->idCauThu === $cauthu->id && $thephat->TongTheDo != 0)
																			{{ ' ( thẻ đỏ)' }}
																		@endif
																	@endforeach
																	@endif

																	@if(!empty($ThePhatCauThu))
																	@foreach($ThePhatCauThu as $thephat)
																		@if($thephat->idCauThu === $cauthu->id && $thephat->TongTheVang == 2)
																			{{ ' ( 2 thẻ vàng)' }}
																		@endif
																	@endforeach
																	@endif

																	{{-- Kiểm tra tổng thẻ phạt tất cả Trận đấu clb đá --}}
																	<!-- @if(!empty($TongThePhatCauThu))
																	@foreach($TongThePhatCauThu as $thephat)
																		@if($thephat->idCauThu === $cauthu->id && $thephat->TongTheVang != 0)
																			{{ '( '. $thephat->TongTheVang.' thẻ vàng)' }}
																		@endif
																	@endforeach
																	@endif -->

											

																	
																	
																</option>
																@endif
																@endforeach
															</select>
															<input class="form-control" type="text" name="NhiemVuCauThu[]" value="{{ $CauThu[$i]->NhiemVuCauThu }}" placeholder="Nhiệm vụ">
															{{ $ViTriDoiHinh[$i]->TenViTri }}
														@endif
														@endfor
													</td>

												
												@endfor
											</tr>
											@endfor

										</tbody>
								</table>
							</div>

							<div class="col-md-6" style="margin-top:40px">

								<div class="ftb-tabs-wrap wrap_3">
									<div class="ftb_tabs_drop">
										<h5>Cầu thủ dự bị</h5>
									</div>
									<table class="kode_ply_table DoiHinhChienThuatTable" id="ViTriCauThu">
										@for ($i=11;$i<18;$i++)
										<tr class="kode_ply_two kode_ThongKe">
											<td>
											<select name="CauThu[]" class="form-control">
												<option value="ChonCauThu">Chọn cầu thủ dự bị</option>
												@foreach ($CauThuDuBiDanhSach as $cauthu)
													@if(!empty($CauThu[$i]))
													<option 
														value="{{ $cauthu->id }}"
														{{  $cauthu->id === $CauThu[$i]->idCauThu ? 'selected' : '' }}
														
													>
														{{ $cauthu->HoTen }}
													</option>
													@else
													<option 
														value="{{ $cauthu->id }}"
													>
														{{ $cauthu->HoTen }}
													</option>
													@endif
												@endforeach
											</select>
											</td>
										</tr>
										@endfor
									</table>
								</div>	

							</div>

							<div class="col-md-6" style="margin-top:40px">

								<div class="ftb-tabs-wrap wrap_3">
									<div class="ftb_tabs_drop">
										<h5>Vai trò cầu thủ</h5>
									</div>
									<table class="kode_ply_table DoiHinhChienThuatTable">
										<?php $stt=0; ?>
										@for ($i=0;$i<count($VaiTroCauThu);$i++)
										<tr class="kode_ply_two kode_ThongKe">
											<td style="width: 135px">
												@if($VaiTroCauThu[$i]->TenVaiTro != 'Dự bị')
												<input type="text" class="form-control" name="VaiTro{{ $VaiTroCauThu[$i]->id }}" value="{{ $VaiTroCauThu[$i]->TenVaiTro }}" disabled>
												@endif
											</td>
											<td>
												@if($VaiTroCauThu[$i]->TenVaiTro != 'Dự bị')
												<select 
													name="CauThuNhanVaiTro[]" 
													class="form-control"
												>
														<option value="ChonCauThuNhanVaiTro">Chọn cầu thủ</option>
													@foreach ($CauThuDuBiDanhSach as $cauthu)
														<option 
															value="{{ $cauthu->id }}"
															{{  $cauthu->id === $VaiTro[$i]->idCauThu ? 'selected' : '' }}
														>
															{{ $cauthu->HoTen }}
														</option>
													@endforeach
												</select>
												@endif
											</td>
										</tr>
										@endfor
									</table>
								</div>
							</div>

							<div class="form-group"> 
									<div class=" col-sm-12  text-right">
										<button type="submit" class="btn btn-success" style=" margin-top: 25px;">Lưu Cập nhật</button>
									</div>
								</div>
							</form>

						</div>
					</div>
				</div>

			</div>
		</section>

	</div>
</div>

@stop

@section('script')
	<script type="text/javascript">

		$(document).ready(function() {
			$('div.alert').delay(10000).slideUp();
			for(var i=0; i<11; i++){
				$("body select#CauThu"+i).on('change', function(){ console.log(i); });
				try {
					$("body select#CauThu"+i).msDropDown();
				} catch(e) {
					alert(e.message);
				}
			}
		});

		$('#DoiHinh').on('change', function(e){
	        var doihinhID = e.target.value;
	        var trandauID = {{ $idTranDau }};
	        $.ajax({
	            url: 'http://localhost:8080/LuanVan/public/huan-luyen-vien/doi-hinh-chien-thuat/ajax/sua/'+doihinhID+'/'+trandauID,
	            type: 'get',
	            dataType: 'json',
	            data: {idDoiHinh: doihinhID, idTranDau: trandauID},
	            success: function(data){
	                $('#formSapXepDoiHinhChienThuat').html(data.DoiHinh);
					for(var i=0; i<11; i++){
						$("body select#CauThu"+i).on('change', function(){ console.log(i); });
						try {
							$("body select#CauThu"+i).msDropDown();
						} catch(e) {
							alert(e.message);
						}
					}
	            }
	        });
	    })
	    
	</script>

@stop