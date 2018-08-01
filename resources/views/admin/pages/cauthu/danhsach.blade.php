@extends ('admin.layout.master_admin')
@section ('title', 'Quản lý Cầu thủ')
@section('content')
	<div id="page-wrapper">
				
			<div class="main-page">
				<h3 class="title1">Danh sách Cầu thủ</h3>
				<div class="tables">
					<div class="bs-example widget-shadow" data-example-id="contextual-table"> 
						<h4>Cầu thủ</h4>

						@if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
						@endif

						@if(session('error'))
						<div class="alert alert-danger">
							{{ session('error') }}
						</div>
						@endif

						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead> 
								<tr> 
									<th>#</th>
									<th class="text-center">Họ tên</th>
									<th class="text-center">Chiều cao</th>
									<th class="text-center">Cân nặng</th>
									<th class="text-center">Vị trí sở trường</th>
									<th class="text-center">Số áo</th>
									<th class="text-center">Hình ảnh</th>
									<th class="text-center">Hành động</th>
								</tr> 
							</thead> 

							<tbody> 
								<?php $stt = 1; ?>
								@foreach($cauthu as $ct)
								<tr class="odd gradeX"> 
									<td class="text-center">{{ $stt }}</td>
									<td>{{ $ct->NguoiDung->HoTen }}</td>
									<td>{{ $ct->ChieuCao }}</td>
									<td>{{ $ct->CanNang }}</td>
									<td class="text-center">
											@if 		($ct->ViTriSoTruong == 'hauve')
																{{ 'Hậu vệ' }}
											@elseif 	($ct->ViTriSoTruong == 'thumon')
																{{ 'Thủ môn' }}
											@elseif 	($ct->ViTriSoTruong == 'tienve')
																{{ 'Tiền vệ' }}
											@elseif 	($ct->ViTriSoTruong == 'tiendao')
																{{ 'Tiền đạo' }}
											@endif 
									</td>
									<td class="text-center">{{ $ct->SoAo }}</td>
									<td><img height="70px" src="./Client/images/players/{{ $ct->NguoiDung->HinhDaiDien }}" alt=""></td>
									<td class="text-center" style="width: 145px">
										<a onclick="return XacNhanXoa('Bạn có chắc muốn xóa?')" href="admin/cau-thu/xoa/{{ $ct->id }}" title="Xóa" class="btn btn-danger"><i class="fa fa-ban" ></i> Xóa</a>

										<a href="admin/cau-thu/sua/{{$ct->id}}" title="Sửa" class="btn btn-info"><i class="fa fa-edit" ></i> Sửa</a>
									</td>
								</tr> 
								<?php $stt++;?>
								@endforeach

							</tbody> 

						</table> 
					</div>
				</div>

				
				<div class="clearfix"></div>
				
			</div>
	</div>
@endsection

@section('script')
<script src="AdminAssets/datatables/js/jquery.dataTables.min.js"></script>
<script src="AdminAssets/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="AdminAssets/datatables-responsive/dataTables.responsive.js"></script>
<script>
    function XacNhanXoa(message){
            if(window.confirm(message)){
                return true;
            }
            return false;
        }

</script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
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
@endsection
