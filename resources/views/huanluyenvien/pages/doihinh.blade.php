@extends ('huanluyenvien.layouts.master')

@section ("title")
Liverpool FC - Quản lý đội hình
@stop

@section ('style')
<style src="./Client/DataTables/bootstrap.min.css"></style>
<style src="./Client/DataTables/dataTables.bootstrap.min.css"></style>
<style type="text/css" media="screen">
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
		<h2>Quản lý đội hình</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="huan-luyen-vien">Trang chủ</a></li>
				<li class="active">Quản lý đội hình</li>
			</ul>
		</div>
	</div>
</div>


<div class="kode-content">

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

						<a href="huan-luyen-vien/doi-hinh/them" class="btn btn-success"><i class="fa fa-plus"></i> Thêm đội hình</a>

						<div class="ftb-tabs-wrap">
							<div class="tab-content">
						
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr class="text-center">
											<th>STT</th>
											<th class="text-center">Tên đội hình</th>
											<th class="text-center">Hình ảnh</th>
											<th class="text-center">Hành động</th>
										</tr>
									</thead>
									<tbody>
										
										<?php $stt=0; ?>
										@foreach ($DanhSachDoiHinh as $DoiHinh)
										<tr>
											<td  class="text-center" style="width: 50px">{{ ++$stt }}</td>
											<td  class="text-center">{{ $DoiHinh->TenDoiHinh }}</td>
											<td class="text-center"><img height="120" src="./Client/images/formations/{{ $DoiHinh->HinhAnhDoiHinh }}"></td>
											<td class="text-center" style="width: 180px">
												<a href="huan-luyen-vien/doi-hinh/sua/{{ $DoiHinh->id }}" class="btn btn-info"><i class="fa fa-edit"></i> Sửa</a>
												<a onclick="return XacNhanXoa('Bạn có muốn xóa đội hình này?')" href="huan-luyen-vien/doi-hinh/xoa/{{ $DoiHinh->id }}" class="btn btn-danger"><i class="fa fa-trash"></i> Xóa</a>
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
			console.log('a')
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
				}
			});
		});
	</script>
	@stop