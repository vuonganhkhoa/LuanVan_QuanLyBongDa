@extends ('huanluyenvien.layouts.master')

@section ("title")
Liverpool FC - Kỹ năng cầu thủ
@stop

@section ('style')
<style src="./Client/DataTables/bootstrap.min.css"></style>
<style src="./Client/DataTables/dataTables.bootstrap.min.css"></style>
<style type="text/css" media="screen">
.dataTables_filter,
.dataTables_paginate{
	text-align: right;
}	
.ftb-tabs-wrap{
	margin: 0px auto;
    width: 1000px;
	float:none;
}
</style>
@stop

@section ('content')

<div class="kode_benner1 bamnner2">
	<div class="kode_benner1_text">
		<h2>Kỹ năng cầu thủ</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="huan-luyen-vien">Trang chủ</a></li>
				<li class="active">Ky năng cầu thủ</li>
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
								<th  class="text-center">Tên cầu thủ</th>
								<th  class="text-center">Kỹ năng cầu thủ</th>
								<th class="text-center">Hành động</th>
							</tr>
						</thead>
						<tbody>
							
							<?php $stt=0;?>
							@foreach ($DanhSachCauThu as $cauthu)
                            <?php  $i=0; ?>
							<tr>
								<td class="text-center" style="width: 60px">{{ ++$stt }}</td>
								<td style="width: 220px">{{ $cauthu->NguoiDung->HoTen }}</td>
								<td>
                                    @foreach($KyNangCauThu as $kynang)
                                        @if($kynang->idCauThu === $cauthu->id)
                                            <?php ++$i; ?>
                                            @if($i===1)
                                                {{$kynang->TenKyNang}}
                                            @else
                                                 | {{$kynang->TenKyNang}}
                                            @endif
                                        @endif
                                    @endforeach
                                </td>
								<td  class="text-center" style="width: 160px">

									<a href="huan-luyen-vien/ky-nang-cau-thu/dieu-chinh/{{ $cauthu->id }}" title="Sửa" class="btn btn-info"><i class="fa fa-edit" ></i> Điều chỉnh</a>
							
								</td>
							</tr>
							@endforeach

						</tbody>
					</table>

				</div>
			</div>



		</div>

	</section>
	@stop

	@section('script')
	<script src="./Client/DataTables/jquery.dataTables.min.js"></script>
	<script src="./Client/DataTables/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">


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
				}
			});

		});
	</script>
	@stop