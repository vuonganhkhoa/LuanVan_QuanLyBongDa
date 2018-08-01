@extends ('huanluyenvien.layouts.master')

@section ('title')
Liverpool F.C - Tình hình cầu thủ
@stop

@section ('style')
<script src="Client/js/Chart.bundle.min.js"></script>
<script src="Client/js/Chart.min.js"></script>
@stop

@section ('content')


<div class="kode_benner1 bamnner2">
	<div class="kode_benner1_text">
		<h2>Tình hình cầu thủ</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="huan-luyen-vien">Trang chủ</a></li>
				<li class="active">Tình hình cầu thủ</li>
			</ul>
		</div>
	</div>
</div>

<div class="kode_ply_gallery ">

	<div class="container">
		<div class="heading5 black b_2">
			<h4><span></span></h4>
		</div>

		<div class="heading5 black b_2">
			<h4>Phong độ cầu thủ <span>hiện tại</span></h4>
		</div>
		<table class="kode_ply_table">
			<tr class="kode_ply_first kode_TH_ThongKe">
				<th>STT</th>
				<th>Cầu thủ</th>
				<th>Vị trí</th>
				<th>Số bàn thắng</th>
				<th>Số kiến tạo</th>
				<th>Điểm trung bình</th>
				<th>Phong độ</th>
			</tr>

			<?php $stt = 0; ?>
			@foreach ($ThanhTichCacCauThuHienTai as $cauthu)
			<tr class="kode_ply_two kode_ThongKe">
				<td>{{++$stt}}</td>
				<td>{{$cauthu->HoTen}}</td>
				<td>{{$cauthu->ViTriSoTruong}}</td>
				<td>{{$cauthu->BanThang}}</td>
				<td>{{$cauthu->KienTao}}</td>
				<td>{{number_format($cauthu->Diem, 1, '.', ',')}}</td>
				<td>
					@if($cauthu->ChiSoPhongDo==5)
						<img height="35" src="./Client/images/arrows/{{$cauthu->ChiSoPhongDo}}.png" alt="Phong độ cao">
					@elseif($cauthu->ChiSoPhongDo==4)
						<img height="25" src="./Client/images/arrows/{{$cauthu->ChiSoPhongDo}}.png" alt="Phong độ khá">
					@elseif($cauthu->ChiSoPhongDo==3)
						<img height="35" src="./Client/images/arrows/{{$cauthu->ChiSoPhongDo}}.png" alt="Phong độ cực trung bình">
					@elseif($cauthu->ChiSoPhongDo==2)
						<img height="25" src="./Client/images/arrows/{{$cauthu->ChiSoPhongDo}}.png" alt="Phong độ cực yếu">
					@elseif($cauthu->ChiSoPhongDo==1)
						<img height="35" src="./Client/images/arrows/{{$cauthu->ChiSoPhongDo}}.png" alt="Phong độ cực kém">
					@endif
				</td>
			</tr>
			@endforeach

		</table>

		
		@if (!empty($CauThuDangChanThuong))
		<div class="heading5 black b_2" style="margin-top: 100px">
			<h4>Danh sách cầu thủ <span>chấn thương </span></h4>
		</div>
		<table class="kode_ply_table">
			<tr class="kode_ply_first kode_TH_ThongKe">
				<th>STT</th>
				<th>Cầu thủ</th>
				<th>Vị trí</th>
				<th>Tên chấn thương</th>
				<th>Ngày chấn thương</th>
				<th>Ngày dự kiến hồi phục</th>
			</tr>

			<?php $stt = 0; ?>
			@foreach ($CauThuDangChanThuong as $cauthu)
			<tr class="kode_ply_two kode_ThongKe">
				<td>{{++$stt}}</td>
				<td>{{$cauthu->HoTen}}</td>
				<td>{{$cauthu->ViTriSoTruong}}</td>
				<td>{{$cauthu->TenChanThuong}}</td>
				<td>{{date('d/m/Y', strtotime($cauthu->ngaychanthuong))}}</td>
				<td>{{$cauthu->ThoiGianHoiPhuc}} ngày</td>
			</tr>
			@endforeach

		</table>
		@else
		<div class="heading5 black b_2" style="margin-top: 100px">
			<h4>Hiện tại, tất cả các cầu thủ đều khỏe mạnh.<span></span></h4>
		</div>
		@endif

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
