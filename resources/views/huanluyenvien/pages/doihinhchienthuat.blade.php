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
	max-width: 1000px;
	margin: 0px auto;
	padding: 0px;	
}
.panel-default{
	border: 1px solid #F5F1F1 !important;
	box-shadow: 0 -1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24) !important;
}
a.disabled {
   pointer-events: none;
   cursor: not-allowed;
}
a:disabled{
	cursor: not-allowed;
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
									<a><img src="./Client/images/logos/{{ $TranDauTiepTheo[0]->HinhAnhCauLacBo_lon }}" alt="" ></a>
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
									<a><img src="./Client/images/logos/{{ $TranDauTiepTheo[1]->HinhAnhCauLacBo_lon }}" alt="" ></a>
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
													<th class="text-center">Vòng đấu</th>
													<th class="text-center">Trận đấu</th>
													<th class="text-center">Đội hình</th>
													<th class="text-center">Chiến thuật</th>
													<th class="text-center">Tỉ số</th>
													<th class="text-center">Hành động</th>
												</tr>
											</thead>
											<tbody>

												@for ($i=0; $i<count($DanhSachCacTranDau); $i++)
												<tr>
													<td class="text-center" style="width: 100px">{{ $DanhSachCacTranDau[$i]->VongDau }}</td>
													<td class="text-center">
														<img src="./Client/images/logos/{{ $DanhSachCacTranDau[$i]->HinhAnhCauLacBo }}" height="40"> 
														&nbsp; VS  &nbsp; 
														<img src="./Client/images/logos/{{ $DanhSachCacTranDau[$i+1]->HinhAnhCauLacBo }}" height="40">
													</td>
													<td class="text-center">{{ $DanhSachCacTranDau[$i]->TenDoiHinh ? $DanhSachCacTranDau[$i]->TenDoiHinh : '-' }}</td>
													<td class="text-center">{{ $DanhSachCacTranDau[$i]->TenChienThuat ? $DanhSachCacTranDau[$i]->TenChienThuat : '-' }}</td>
													<td class="text-center" style="width: 80px">
														{{ $DanhSachCacTranDau[$i]->TiSo }} - {{ $DanhSachCacTranDau[$i+1]->TiSo }}
													</td>
													<td class="text-center" style="width: 220px">
														@if (isset($DanhSachCacTranDau[$i]->TiSo) && isset($DanhSachCacTranDau[$i+1]->TiSo))
														<a href="huan-luyen-vien/doi-hinh-chien-thuat/xem/{{ $DanhSachCacTranDau[$i]->id }}" class="btn btn-link"><i class="glyphicon glyphicon-list-alt"></i> Xem thông tin chi tiết</a>
														@else
														<a href="huan-luyen-vien/doi-hinh-chien-thuat/sap-xep/{{ $DanhSachCacTranDau[$i]->id }}" class="{{ $DanhSachCacTranDau[$i]->TenDoiHinh ? 'disabled' : '' }}  btn btn-success"><i class="fa fa-edit"></i> Sắp xếp</a>
														<a href="huan-luyen-vien/doi-hinh-chien-thuat/sua/{{ $DanhSachCacTranDau[$i]->id }}" class="btn btn-info {{ !$DanhSachCacTranDau[$i]->TenDoiHinh ? 'disabled' : '' }}"><i class="glyphicon glyphicon-edit"></i> Cập nhật</a>
														@endif
													</td>
												</tr>
												<?php $i++; ?>
												@endfor

											</tbody>
										</table>

									</div>
								</div>

							</div>
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