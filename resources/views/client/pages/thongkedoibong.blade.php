@extends ('client.layouts.master')

@section ('title', 'Liverpool FC - Thống kê đội bóng')

@section ('style')
<script src="Client/js/Chart.bundle.min.js"></script>
<script src="Client/js/Chart.min.js"></script>
<style>
.widgetChart {

    width: 32% ;
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

@media (max-width: 1024px){
	.widgetChart{
		margin-top: 60px;
		width: 100% !important;
	}
}
</style>
@stop

@section ('content')

<!--// KODE BENNER1 START //-->
<div class="kode_benner1 bamnner2">
	<div class="kode_benner1_text">
		<h2>Thống kê đội bóng</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="{{ route('Home') }}">Trang chủ</a></li>
				<li class="active">Thống kê đội bóng</li>
			</ul>
		</div>
	</div>
</div>
<!--// KODE BENNER1 END //-->
<div class="kode_ply_gallery ">


	<div class="container">
		<div class="heading5 black b_2">
			<h4>Thống kê đội bóng mùa giải  <span>{{ date('Y',strtotime($GiaiDau->NamBatDauMuaGiai)) }} - {{ date('Y',strtotime($GiaiDau->NamKetThucMuaGiai)) }}</span></h4>
		</div>
		<div class="charts">
			<div class="col-md-4 charts-grids widgetChart">
				<canvas id="GhiBan" height="300" width="400"> </canvas>
			</div>
			<div class="col-md-4 charts-grids widgetChart states-mdl">
				<canvas id="KienTao" height="300" width="400"> </canvas>
			</div>
			<div class="col-md-4 charts-grids widgetChart">
				<canvas id="KetQua" height="300" width="400"> </canvas>
			</div>

			<script>
				var ctx1 = document.getElementById("GhiBan").getContext('2d');
				var GhiBan = new Chart(ctx1, {
					type: 'horizontalBar',
					data: {
						labels: {!! $CauThuGhiBanChart !!},
						datasets: [{
							
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
						}]
					},
					options: {
						title: {
				            display: true,
				            text: 'Xếp hạng cầu thủ ghi bàn',
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

				var ctx2 = document.getElementById("KienTao").getContext('2d');
				var KienTao = new Chart(ctx2, {
					type: 'horizontalBar',
					data: {
						labels: {!! $CauThuKienTaoChart !!},
						datasets: [{
							
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
				            text: 'Xếp hạng cầu thủ kiến tạo',
				            fontSize:20
				        },
						legend: {
							display: false,
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

				var ctx3 = document.getElementById("KetQua").getContext('2d');
				var KetQua = new Chart(ctx3, {
					type: 'pie',
					data: {
						labels: ["Thắng", "Hòa", "Thua"],
						datasets: [{
							
							data: [
								{{ ROUND(($KetQuaDoiBongChart[0]->SoTranThang)*100/$KetQuaDoiBongChart[0]->SoTran) }},
								{{ ROUND(($KetQuaDoiBongChart[0]->SoTranHoa)*100/$KetQuaDoiBongChart[0]->SoTran) }},
								{{ ROUND(($KetQuaDoiBongChart[0]->SoTranThua)*100/$KetQuaDoiBongChart[0]->SoTran) }}
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
							borderWidth: 1
						}]
					},
					options: {
						legend: {
							display: true,
							position: 'bottom'
						},
						title: {
				            display: true,
				            text: 'Thống kê kết quả đội bóng',
				            fontSize:20
				        },
						responsive: true
					}
				});
			</script>

		</div>

		<table class="kode_ply_table">
			<tr class="kode_ply_first kode_TH_ThongKe">
				<th>TT</th>
				<th>Tên cầu thủ</th>
				<th>Trận</th>
				<th>Số đường chuyền</th>
				<th>Bàn thắng</th>
				<th>Kiến tạo</th>
				<th>Thẻ vàng</th>
				<th>Thẻ đỏ</th>
				<th>Điểm số</th>
			</tr>
			
			<?php $stt=0; ?>
			@foreach ($DanhSachThongKeCauThu as $cauthu)
			<tr class="kode_ply_two kode_ThongKe">
				<td>{{ ++$stt }}</td>
				<td style="text-align: left;">
					<img height="40" style="margin: 0px 5px 0px 15px" src="Client/images/players/{{ $cauthu->HinhDaiDien }}" alt="">
					<b>{{ $cauthu->HoTen }}</b>
				</td>
				<td>{{ $cauthu->SoTran }}</td>
				<td>{{ $cauthu->SoDuongChuyen }}</td>
				<td>{{ $cauthu->SoBanThang }}</td>
				<td>{{ $cauthu->SoKienTao }}</td>
				<td>{{ $cauthu->TheVang }}</td>
				<td>{{ $cauthu->TheDo }}</td>
				<td><b>{{ $cauthu->Diem }}</b></td>
			</tr>
			@endforeach

		</table>				
		<div class="kode_ply_caption">


			

		</div>

	</div>
</div>



@stop
