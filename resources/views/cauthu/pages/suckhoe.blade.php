@extends ('cauthu.layouts.master')

@section ('title')
Liverpool F.C - {{ Auth::user()->username }}
@stop

@section ('style')
<script src="Client/js/Chart.bundle.min.js"></script>
<script src="Client/js/Chart.min.js"></script>
@stop

@section ('content')

<!--// KODE BENNER1 START //-->
<div class="kode_benner1 bamnner2">
	<div class="kode_benner1_text">
		<h2>Thông tin sức khỏe</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="cau-thu/{{Auth::user()->username}}">Trang chủ</a></li>
				<li class="active">Thông tin sức khỏe</li>
			</ul>
		</div>
	</div>
</div>
<!--// KODE BENNER1 END //-->
<div class="kode_ply_gallery ">


	<div class="container">
		<div class="heading5 black b_2">
			<h4>@if($LichKham) Phác đồ điều trị <span>{{ $LichKham[0]->TenChanThuong }}</span> @else Hiện tại cầu thủ không có chấn thương @endif<span></span></h4>
		</div>
		<div class="charts">

			<div class="clearfix"> </div>
			
			<!-- <canvas id="TinhHinhChanThuong" height="100"></canvas>
			<script>
				var ctx = document.getElementById("TinhHinhChanThuong").getContext('2d');
				var TinhHinhChanThuong = new Chart(ctx, {
					type: 'line',
					data: {
						labels: ["25/01/2018", "15/02/2018", "24/02/2018", "03/03/2018", "04/03/2018", "16/04/2018"],
						datasets: [{
							
							data: [100, 85, 77, 61, 58, 16],
							backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)',
							'rgba(255, 159, 64, 0.2)'
							],
							borderColor: [
							'rgba(255,99,132,1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)'
							],
							borderWidth: 1
						}]
					},
					options: {
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
			</script> -->
		</div>

		<div class="col-md-12" style="margin-top: 20px">
			<div class="table-responsive">

				@if($LichKham)
				<table id="mytable" class="table table-bordred table-striped">
					<thead>
						<th>STT</th>
						<th>Ngày khám</th>
						<th>Nội dung điều trị</th>
						<th>Xem toa thuốc</th>
					</thead>
					<tbody>
						
						<?php $stt=0; ?>
						@foreach ($LichKham as $lich)
						<tr>
							<td>{{ ++$stt }}</td>
							<td>{{ date('d/m/Y', strtotime($lich->NgayKham)) }}</td>
							<td>{{ $lich->NoiDungDieuTri }}</td>
							@if(!empty($ToaThuoc[$stt-1][0]))
							<td><p data-placement="top" data-toggle="tooltip" title="Xem chi tiết"><button class="btn btn-danger btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit{{ $stt }}" href="#edit{{ $stt }}" ><span class="glyphicon glyphicon-list-alt"></span></button></p></td>
							@else
							<td>Chưa khám</td>
							@endif
						</tr>
							@if(!empty($ToaThuoc[$stt-1][0]))
							<div class="modal fade" id="edit{{ $stt }}" tabindex="-1" role="dialog" aria-labelledby="#edit{{ $stt }}" aria-hidden="true">
								<div class="modal-dialog" style="width:620px;">
									<div class="modal-content">
										<div class="modal-header">
											<h4  style="font-family:'arial';color:green; font-style: bold" class=" text-center modal-title custom_align" id="Heading">Toa thuốc </h4>
											<p class="text-center">{{ date('d/m/Y', strtotime($ToaThuoc[$stt-1][0]->NgayKham)) }}</p>
										</div>
										<div class="modal-body">

											<div class="row">
												<div class="col-md-4">
													<p>Họ tên: </p>
												</div>
												<div class="col-md-8">
													<p>Mohamed Salah</p>
												</div>

												<div class="col-md-4">
													<p>Chẩn đoán: </p>
												</div>
												<div class="col-md-8">
													<p>{{ $ToaThuoc[$stt-1][0]->ChanDoan }}</p>
												</div>

												<div class="col-md-4">
													<p>Nội dung điều trị: </p>
												</div>
												<div class="col-md-8">
													<p>{{ $lich->NoiDungDieuTri }}</p>
												</div>
										
												<br/><div class="col-md-4">
													<p>Thuốc: </p>
												</div>
												<div class="col-md-8" style="margin-left: -14px">
													@foreach($Thuoc[$stt-1] as $thuoc)
													<div class="col-md-8"><p style="margin:0px">{{ $thuoc->TenThuoc }}</p><i>{{ $thuoc->LieuLuong }}</i></div>
													<div class="col-md-4"><p>{{ $thuoc->SoLuong }} viên</p></div>
													@endforeach
												</div><br/>
			
												<div class="col-md-4" style="margin-top:20px">
													<p>Lời dặn: </p>
												</div>
												<div class="col-md-8" style="margin-top:20px">
													<p>{{ $ToaThuoc[$stt-1][0]->LoiDan ? $ToaThuoc[$stt-1][0]->LoiDan : 'Không' }}</p>
												</div>

												<div class="col-md-4">
													<p>Ngày tái khám: </p>
												</div>
												<div class="col-md-8">
													<p>{{ date('d/m/Y', strtotime($ToaThuoc[$stt-1][0]->NgayTaiKham)) }}</p>
												</div>
											</div>

										</div>
										<div class="modal-footer ">
											<button type="button" class="btn btn-success btn-lg" data-dismiss="modal" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> OK!</button>
										</div>
									</div>
									<!-- /.modal-content --> 
								</div>
								<!-- /.modal-dialog --> 
							</div>
							@endif
						@endforeach

					</tbody>
				</table>
				@endif
				<div class="clearfix"></div>

			</div>

		</div>

		
		<div class="heading5 black b_2" style="margin-top: 40px">
			<h4>Lịch sử chấn thương <span></span></h4>
		</div>
		@if ($LichSuChanThuong)
		<table class="kode_ply_table">
			<tr class="kode_ply_first kode_TH_ThongKe">
				<th>TT</th>
				<th>Tên chấn thương</th>
				<th>Ngày chấn thương</th>
				<th>Ngày hồi phục</th>
				<th>Số ngày điều trị</th>
			</tr>
			
			<?php $stt=0; ?>
			@foreach ($LichSuChanThuong as $ChanThuong)
			<tr class="kode_ply_two kode_ThongKe">
				<td>{{ ++$stt }}</td>
				<td>{{ $ChanThuong->TenChanThuong }}</td>
				<td>{{ date('d/m/Y', strtotime($ChanThuong->NgayChanThuong)) }}</td>
				<td>{{ $ChanThuong->NgayHoiPhuc ? date('d/m/Y', strtotime($ChanThuong->NgayHoiPhuc)) : 'Đang điều trị' }}</td>
				<td>{{ $ChanThuong->NgayHoiPhuc ? $ChanThuong->TongNgay : 'Chưa xác định' }}</td>
			</tr>
			@endforeach

		</table>
		@else
		<div class="text-center">Không có dữ liệu về lịch sử chấn thương của cầu thủ</div>				
		@endif
		<div class="kode_ply_caption">
		</div>

	</div>
</div>

@stop

@section ('script')
<script>
	$(document).ready(function(){
		$("[data-toggle=tooltip]").tooltip();
		$('#OK').click(function(){
			$('.modal').modal('hide');
		});
	});
</script>	
@stop
