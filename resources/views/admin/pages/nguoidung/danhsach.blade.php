@extends ('admin.layout.master_admin')
@section ('title', 'Quản lý Người dùng')
@section('content')
	<div id="page-wrapper">
				
			<div class="main-page">
				<h3 class="title1">Danh sách người dùng</h3>
				<div class="tables">
					<div class="bs-example widget-shadow" data-example-id="contextual-table"> 
						<h4>Người dùng</h4>

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
									<th class="text-center">Tên người dùng</th> 
									<th class="text-center">Chức vụ</th> 
									<th class="text-center">Email</th>
									<th class="text-center">Ngày sinh</th>
									<th class="text-center">Quốc tịch</th>
									<th class="text-center">Hình</th>
									<th class="text-center">Thuộc tính</th>
								</tr> 
							</thead> 

							<tbody> 
								<?php $stt = 1; ?>
								@foreach($nguoidung as $nguoidung)
								<tr class="odd gradeX"> 
										<td class="text-center">{{ $stt }}</td>
										<td>{{ $nguoidung->HoTen }}</td> 
										<td>
											@if 		($nguoidung->ChucVu == 'cauthu')
																{{ 'Cầu thủ' }}
											@elseif 	($nguoidung->ChucVu == 'huanluyenvien')
																{{ 'Huấn luyện viên' }}
											@elseif 	($nguoidung->ChucVu == 'nhanvienyte')
																{{ 'Nhân viên y tế' }}
											@elseif 	($nguoidung->ChucVu == 'admin')
																{{ 'Admin' }}		
											@endif 
										</td>
										<td>{{ $nguoidung->Email }}</td> 
										<td>{{ date('d/m/Y',strtotime($nguoidung->NgaySinh)) }}</td> 
										<td>{{ $nguoidung->QuocTich }}</td>
										<td><img height="70px" src="./Client/images/players/{{ $nguoidung->HinhDaiDien }}" alt=""></td>
										<td class="text-center" style="width: 165px">
											<a onclick="return XacNhanXoa('Bạn có chắc muốn xóa?')" href="admin/nguoi-dung/xoa/{{ $nguoidung->id }}" title="Xóa" class="btn btn-danger"><i class="fa fa-ban" ></i> Xóa</a>

											<a href="admin/nguoi-dung/sua/{{ $nguoidung->id }}" title="Sửa" class="btn btn-info"><i class="fa fa-edit" ></i> Sửa</a>
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
<script type="text/javascript">
	$('.alert').delay(5000).slideUp()
</script>
@endsection