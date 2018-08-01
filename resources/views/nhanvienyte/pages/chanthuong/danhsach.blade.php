@extends ('nhanvienyte.layout.master_nhanvienyte')
@section ('title', 'Quản lý Chấn thương')
@section('content')
	<div id="page-wrapper">
				
			<div class="main-page">
				<h3 class="title1">Danh sách Chấn thương</h3>
				<div class="tables">
					<div class="bs-example widget-shadow" data-example-id="contextual-table"> 
						<h4>Giải đấu</h4>

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
									<th class="text-center">Tên chấn thương</th> 
									<th class="text-center">Loại chấn thương</th> 
									<th class="text-center">Thời gian hồi phục</th>
									<th class="text-center">Hành động</th>
								</tr> 
							</thead> 

							<tbody> 
								<?php $stt = 1; ?>
								@foreach ($chanthuong as $ct)
								<tr class="odd gradeX">
										<td>{{ 	$stt }}</td>
										<td>{{ 	$ct->TenChanThuong  }}</td> 
										<td>@if($ct->PhanLoaiChanThuong == 1)
												Chấn thương ngoài da

											@elseif($ct->PhanLoaiChanThuong == 2)
												Chấn thương cơ

											@elseif($ct->PhanLoaiChanThuong == 3)
												Chấn thương khớp

											@elseif($ct->PhanLoaiChanThuong == 4)
												Chấn thương xương

											@elseif($ct->PhanLoaiChanThuong == 5)
												Chấn thương đầu
											@endif</td> 
										<td class="text-center">{{  $ct->ThoiGianHoiPhuc}} tuần</td> 
										<td class="text-center" style="width: 135px">
											<a onclick="return XacNhanXoa('Bạn có chắc muốn xóa?')" href="nhan-vien-y-te/chan-thuong/xoa/{{ $ct->id }}" title="Xóa" class="btn btn-danger"><i class="fa fa-ban" ></i> Xóa</a>

											<a href="nhan-vien-y-te/chan-thuong/sua/{{ $ct->id }}" title="Sửa" class="btn btn-info"><i class="fa fa-edit" ></i> Sửa</a>
										</td>
								</tr> 
								<?php $stt++; ?>
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