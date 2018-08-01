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

			<a href="huan-luyen-vien/lich-luyen-tap/them-lich-tap" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm lịch luyện tập</a>

			<a href="huan-luyen-vien/lich-luyen-tap/them-cau-thu-tap" class="btn btn-success"><i class="fa fa-plus"></i> Thêm cầu thủ luyện tập</a>

			<a href="huan-luyen-vien/luyen-tap/danh-sach" class="btn btn-danger"><i class="fa fa-check"></i> Đánh giá quá trình tập</a>

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
								<td style="width: 165px" class="text-center {{ ($NgayTapCauThu->NgayLuyenTap < date('Y-m-d')) ? 'disabled' : ''  }}">
									<a 
									href="huan-luyen-vien/lich-luyen-tap/sua-cau-thu-tap/{{ $NgayTapCauThu->idCauThu }}/{{ $NgayTapCauThu->NgayLuyenTap }}" 
									class="btn btn-info {{ ($NgayTapCauThu->NgayLuyenTap < date('Y-m-d')) ? 'disabled' : ''  }} "
									><i class="fa fa-edit"></i> Sửa</a>
									<a 
									onClick="return XacNhanXoa('Bạn có chắc muốn xóa lịch tập cầu thủ này ( Xóa toàn bộ các bài tập ngày hôm đó)?')"
									href="huan-luyen-vien/lich-luyen-tap/xoa-cau-thu-tap/{{ $NgayTapCauThu->idCauThu }}/{{ $NgayTapCauThu->NgayLuyenTap }}" 
									class="btn btn-danger {{ ($NgayTapCauThu->NgayLuyenTap < date('Y-m-d')) ? 'disabled' : ''  }} "
									><i class="fa fa-trash"></i> Xóa</a>
								</td>
							</tr>
							
							<?php ++$i; ?>
							@endforeach
							
						</tbody>
					</table>

				</div>
			</div>

			<div class="ftb-tabs-wrap" style="width:100%">
				<div class="tab-content">

					<div id="profileone">
						<div class="kode_calendar">	
							{!! $LichLuyenTap->calendar() !!}
						</div>
					</div>

					<?php $stt=0; ?>
					@foreach ($NgayCauThuTap as $NgayTap)
					<div class="modal fade" id="LichTapModal{{ $NgayTap->id }}" tabindex="-1" role="dialog" aria-labelledby="LichModal" aria-hidden="true">
						<div class="modal-dialog" style="max-width:460px;">
							<div class="modal-content">
								<div class="modal-header">
									<h4  style="font-family:'arial';color:red; font-style: bold" class=" text-center modal-title custom_align" id="Heading">Lịch luyện tập </h4>
									<p class="text-center">{{ date('G:i', strtotime($NgayTap->GioLuyenTap)) }} - {{ date('d/m/Y', strtotime($NgayTap->NgayLuyenTap)) }}</p>
								</div>
								<div class="modal-body">

									<div class="row">
										<div class="col-md-12">
											<h4 style="font-family:'arial'; font-style: bold; margin-bottom: 10px">Danh sách cầu thủ: </h4>
										</div>
										<br>
										@foreach ($DanhSachCauThuTap[$stt] as $cauthu)
										<div class="col-md-8">
											<p>{{ $cauthu->HoTen  }}</p>
										</div>
										<div class="col-md-4">
											<p>{{ $cauthu->ViTriSoTruong  }}</p>
										</div>
										@endforeach
									</div>

								</div>
								<div class="modal-footer ">
									<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> OK!</button>
								</div>
							</div>
							<!-- /.modal-content --> 
						</div>
						<!-- /.modal-dialog --> 
					</div>
					<?php ++$stt; ?>
					@endforeach

				</div>
			</div>


		</div>
	</section>

</div>
@stop

@section('script')
{!! $LichLuyenTap->script() !!}
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