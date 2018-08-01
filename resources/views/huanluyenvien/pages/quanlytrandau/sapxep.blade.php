@extends ('huanluyenvien.layouts.master')

@section ("title")
Liverpool FC - Đội hình chiến thuật
@stop

@section ("style")
<style src="./Client/DataTables/bootstrap.min.css"></style>
<style src="./Client/DataTables/dataTables.bootstrap.min.css"></style>
<style type="text/css" media="screen">
.kode_ply_table .kode_ply_two > td {
	padding: 5px;
}
.dataTables_filter,
.dataTables_paginate{
	text-align: right;
}	
.panel{
	max-width: 900px;
	margin: 0px auto;
	padding: 0px;	
}
.panel-default{
	border: 1px solid #F5F1F1 !important;
	box-shadow: 0 -1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24) !important;
}
</style>
@stop

@section ('content')

<div class="kode_benner1 bamnner2">
	<div class="kode_benner1_text">
		<h2>Quản lý trận đấu</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="huan-luyen-vien">Trang chủ</a></li>
				<li class="active">Quản lý trận đấu</li>
			</ul>
		</div>
	</div>
</div>

<div class="kode-content">
	<div class="ft-match-slider">

		<div class="kode_player_wraper" style="  padding:50px 0px 10px;  border-bottom: 1px solid #fff">
			<div class="container">
				<div class="row">

					@if (!empty($TranDauTiepTheo))
					<div class="kode_ticket_sig_row">
						<div class="ftb-result-wrap">
							<div class="ftb-result1">
								<div class="ftb-result-logo">
									<a><img src="./Client/images/logos/Liverpool_big.png" alt=""></a>
								</div>
								<div class="text">
									<h6><a>{{ $TranDauTiepTheo[0]->TenDayDu }}</a></h6>
								</div>
							</div>

							<div class="ftb-final-result">
								<em>{{ date('d/m/Y',strtotime($TranDauTiepTheo[0]->NgayThiDau)) }} | {{ date('G:i',strtotime($TranDauTiepTheo[0]->GioThiDau)) }} PM <i>{{ $TranDauTiepTheo[0]->DiaDiem }}</i></em>
								<a class="btn-4">Vòng {{ $TranDauTiepTheo[0]->VongDau }}</a>
							</div>

							<div class="ftb-result1 ftb-result2">
								<div class="ftb-result-logo">
									<a><img src="./Client/images/logos/RealMadrid_big.png" alt="""></a>
								</div>
								<div class="text">
									<h6><a>{{ $TranDauTiepTheo[1]->TenDayDu }}</a></h6>
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

		@if (!empty($TranDauTiepTheo))
		<div class="kode_fixture_wraper">
			<div class="container">
				@if (!empty($DoiHinhChienThuat))
				<div class="row">
					
					@if(!empty($CauThuRaSan))
					<div class="col-md-6">
						<div class="ftb-tabs-wrap wrap_3">
							<div class="ftb_tabs_drop">
								<h5>Danh sách cầu thủ ra sân</h5>
							</div>
							<table class="kode_ply_table DoiHinhChienThuatTable">
								<tr class="kode_ply_first kode_TH_CauThu">
									<th>STT</th>
									<th>Cầu Thủ</th>
									<th>Vị Trí</th>
									<th>Vai Trò</th>
								</tr>
								
								<?php $stt=0; ?>
								@foreach ($CauThuRaSan as $cauthu)
								<tr class="
								kode_ply_two 
								kode_ThongKe 
								{{ $cauthu->id === 3 ? 'DuocThiDau'  : ''}} 
								@foreach ($VaiTroCauThu as $vaitro)
								{{ ($cauthu->id === $vaitro->id && $vaitro->TenVaiTro === 'Dự bị' ) ? 'DuBi' : '' }}
								@endforeach
								"
								>
								<td>{{ ++$stt }}</td>
								<td>{{ $cauthu->HoTen }}</td>
								<td>{{ $cauthu->TenViTri }}</td>
								<td>
									@foreach ($VaiTroCauThu as $vaitro)
									{{ $cauthu->id === $vaitro->id ? $vaitro->TenVaiTro.' ' : '' }}
									@endforeach
								</td>
								</tr>
								@endforeach

							</table>
						</div>	
					</div>
					@else
					<div class="alert alert-danger">Chưa có thông tin về danh sách thi đấu !</div>
					@endif

					<div class="col-md-6">
						<div class="ftb-tabs-wrap wrap_3">
							<div class="ftb_tabs_drop">
								<h5 >Đội hình ( {{ $DoiHinhChienThuat[0]->TenDoiHinh }})</h5>
							</div>
							<img src="./Client/images/formations/{{ $DoiHinhChienThuat[0]->TenDoiHinh }}.png" alt=""  width="570" style="max-height:620px">
						</div>	
					</div>

					<div class="col-md-12">
						<div class="ftb-tabs-wrap wrap_3">
							<div class="ftb_tabs_drop">
								<h5 >Chiến thuật ( {{ $DoiHinhChienThuat[0]->TenChienThuat }})</h5>
							</div>
							<div style="padding:80px 10px 10px 10px;">
								{!! $DoiHinhChienThuat[0]->NoiDungChienThuat !!}
							</div>
						</div>	
					</div>

				</div>
				@else
				<div class="alert alert-danger">Chưa có thông tin về đội hình chiến thuật trận tiếp theo !</div>
				@endif
			</div>
		</div>	
		@endif

		<div class="panel-group">
			<div class="panel panel-default">
				<div class="panel-body">

					@if (session('thongbao'))
					<div class="alert alert-success">{{ session('thongbao') }}</div>
					@endif
					@if (session('loi'))
					<div class="alert alert-danger">{{ session('loi') }}</div>
					@endif

					<div class="ftb-tabs-wrap">
						<div class="tab-content">

							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr class="text-center">
										<th>STT</th>
										<th class="text-center">Đối thủ</th>
										<th class="text-center">Đội hình</th>
										<th class="text-center">Chiến thuật</th>
										<th class="text-center">Tỉ số</th>
										<th class="text-center">Hành động</th>
									</tr>
								</thead>
								<tbody>

									<?php $stt=0; ?>
									@foreach ($DanhSachCacTranDau as $TranDau)
									<tr>
										<td  class="text-center" style="width: 50px">{{ ++$stt }}</td>
										<td  class="text-center">{{ $TranDau->TenDayDu }}</td>
										<td class="text-center">{{ $TranDau->TenDoiHinh }}</td>
										<td class="text-center">{{ $TranDau->TenChienThuat }}</td>
										<td class="text-center">{{ $TranDau->TiSo }}</td>
										<td class="text-center" style="width: 180px">
											<a href="huan-luyen-vien/doi-hinh-chien-thuat/sua/{{ $TranDau->id }}" class="btn btn-info"><i class="fa fa-edit"></i> Sửa</a>
											<a onclick="return XacNhanXoa('Bạn có muốn xóa đội hình này?')" href="huan-luyen-vien/doi-hinh-chien-thuat/xoa/{{ $TranDau->id }}" class="btn btn-danger"><i class="fa fa-trash"></i> Xóa</a>
										</td>
									</tr>
									@endforeach

								</tbody>
							</table>

						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
</div>

@stop


@section ('script')
<script src="./Client/DataTables/jquery.dataTables.min.js"></script>
<script src="./Client/DataTables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	function XacNhanXoa(message){
		if(window.confirm(message)){
			return true;
		}
		return false;
	}
	$(document).ready(function() {

		$('#example').DataTable(
		{
			"language": {
				"sProcessing":   "Đang xử lý...",
				"sLengthMenu":   "Xem _MENU_ mục",
				"sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
				"sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
				"sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
				"sInfoFiltered": "(được lọc từ _MAX_ mục)",
				"sInfoPostFix":  "",
				"sSearch":       "Tìm kiếm ",
				"sUrl":          "",
				"oPaginate": {
					"sFirst":    "Đầu",
					"sPrevious": "Trước",
					"sNext":     "Tiếp",
					"sLast":     "Cuối"
				}
			}
		});
	});
</script>
@stop