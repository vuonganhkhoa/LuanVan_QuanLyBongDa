@extends ('huanluyenvien.layouts.master')

@section ("title")
Liverpool FC - Thêm ngày luyện tập
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
.panel{
	max-width: 800px;
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
		<h2>Thêm ngày luyện tập</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="huan-luyen-vien">Trang chủ</a></li>
				<li><a href="huan-luyen-vien/lich-luyen-tap">Quản lý luyện tập</a></li>
				<li class="active">Thêm ngày luyện tập</li>
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

						<form class="" method="POST" action="huan-luyen-vien/lich-luyen-tap/them-lich-tap">
							{{ csrf_field() }}
							<div class="col-sm-4">
								<div class="form-group {{ $errors->has('NgayLuyenTap') ? 'has-error' : '' }}">
									<input type="date" class="form-control" placeholder="Nhập ngày tập" name="NgayLuyenTap" value="{{ old('CaLuyenTap', date('Y-m-d')) }}">
									@if ($errors->has('NgayLuyenTap'))
									<span class="help-block"><strong style="color:#E01A22">{{ $errors->first('NgayLuyenTap') }}</strong></span>
									@endif
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group {{ $errors->has('CaLuyenTap') ? 'has-error' : '' }}">
									<!-- <input type="text" class="form-control" placeholder="Nhập ca tập" name="CaLuyenTap" value="{{ old('CaLuyenTap', 'Ca sáng') }}">
									@if ($errors->has('CaLuyenTap'))
									<span class="help-block"><strong style="color:#E01A22">{{ $errors->first('CaLuyenTap') }}</strong></span>
									@endif	 -->
									<select name="CaLuyenTap" class="form-control">
										<option value="Ca sáng">Ca sáng</option>
										<option value="Ca trưa">Ca trưa</option>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group {{ $errors->has('DiaDiem') ? 'has-error' : '' }}">
									<input type="text" class="form-control" placeholder="Nhập địa điểm" name="DiaDiem" value="{{ old('CaLuyenTap', 'Sân tập A') }}">
									
									@if ($errors->has('DiaDiem'))
									<span class="help-block"><strong style="color:#E01A22">{{ $errors->first('DiaDiem') }}</strong></span>
									@endif
								</div>
							</div>
							<div class="form-group"> 
								<div class="text-right" style="margin-right:15px">
									<button type="submit" class="btn btn-success">Thêm ngày luyện tập</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>	
			
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-body">
						<table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th class="text-center">STT</th>
									<th class="text-center">Ngày luyện tập</th>
									<th class="text-center">Ca luyện tập </th>
									<th class="text-center">Địa điểm tập </th>
									<th class="text-center">Hành động</th>
								</tr>
							</thead>
							<tbody>

								<?php $stt=0; ?>
								@foreach ($LichTap as $lich)
								<tr>
									<td class="text-center">{{ ++$stt }}</td>
									<td class="text-center">{{ date('d/m/Y', strtotime($lich->NgayLuyenTap)) }}</td>
									<td class="text-center">{{ $lich->CaLuyenTap }}</td>
									<td class="text-center">{{ $lich->DiaDiem }}</td>
									<td class="text-center {{ ($lich->NgayLuyenTap < date('Y-m-d')) ? 'disabled' : ''  }}" style="width: 150px">
										<a 
										href="huan-luyen-vien/lich-luyen-tap/sua-lich-tap/{{ $lich->id  }}" 
										class="btn btn-info {{ ($lich->NgayLuyenTap < date('Y-m-d')) ? 'disabled' : ''  }}"
										><i class="fa fa-edit"></i> Sửa</a>
										<a 
										onclick="return XacNhanXoa('Bạn có chắc muốn xóa?')"
										href="huan-luyen-vien/lich-luyen-tap/xoa-lich-tap/{{ $lich->id  }}" 
										class="btn btn-danger {{ ($lich->NgayLuyenTap < date('Y-m-d')) ? 'disabled' : ''  }}"
										><i class="fa fa-trash"></i> Xóa</a>
									</td>
								</tr>
								@endforeach

							</tbody>
						</table>	
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
