@extends ('huanluyenvien.layouts.master')

@section ("title")
Liverpool FC - Lịch luyện tập
@stop

@section ('style')
<style src="./Client/DataTables/bootstrap.min.css"></style>
<style src="./Client/DataTables/dataTables.bootstrap.min.css"></style>
<style type="text/css" media="screen">
td.disabled {
	cursor: not-allowed;
}
td.disabled a {
	pointer-events: none;
}
.dataTables_filter,
.dataTables_paginate{
	text-align: right;
}	
</style>
@stop

@section ('content')

<div class="kode_benner1 bamnner2">
	<div class="kode_benner1_text">
		<h2>Lịch luyện tập</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="huan-luyen-vien">Trang chủ</a></li>
				<li class="active">Lịch luyện tập</li>
			</ul>
		</div>
	</div>
</div>

<div class="kode-content">

	<section>
		<div class="container">

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
							<tr>
								<th class="text-center">STT</th>
								<th class="text-center">Ngày tập</th>
								<th class="text-center">Ca tập</th>
								<th style="border-color: white"></th>
								<th  class="text-center" style="border-left-width: 2px">Cầu thủ</th>
								<th  class="text-center">Vị trí</th>
								<th  class="text-center">Nội dung luyện tập</th>
								<th  class="text-center">Hành động</th>
							</tr>
						</thead>
						<tbody>
							
							<?php $i=0; $stt=0; ?>
							@foreach ($CauThuTapNgayHomAy as $NgayTapCauThu)
							
							<tr>
								<td class="text-center">{{ ++$stt }}</td>
								<td class="text-center">{{ date('d/m/Y', strtotime($NgayTapCauThu->NgayLuyenTap)) }}</td>
								<td style="width: 100px" class="text-center">{{ $NgayTapCauThu->CaLuyenTap }}</td></td>
								<td style="border-color: white"></td>
								<td style="border-left-width: 2px; width: 160px">
									@if(!empty($NgayTapCauThu->HoTen))
									{{ $NgayTapCauThu->HoTen }}
									@else
									{{ 'Có lỗi xảy ra.' }}
									@endif
								</td>
								<td  style="width: 100px">{{ $NgayTapCauThu->ViTriSoTruong }}</td>
								<td>
									@foreach ($GiaoTrinhLuyenTapMoiCauThu[$i] as $data)
									{{ $data->TenBaiTap }}<br>
									@endforeach
								</td>
								<td style="width: 165px" class="text-center">
									<a 
									href="huan-luyen-vien/luyen-tap/danh-gia/{{ $NgayTapCauThu->idCauThu }}/{{ $NgayTapCauThu->NgayLuyenTap }}" 
									class="btn btn-info "
									><i class="fa fa-edit"></i> Đánh giá</a>
									<a 
								</td>
							</tr>
							
							<?php ++$i; ?>
							@endforeach
							
						</tbody>
					</table>

				</div>
			</div>

		</div>
	</section>

</div>
@stop

@section('script')
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
		$('div.alert').delay(5000).slideUp();
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
			},

		});
	});

</script>
@stop