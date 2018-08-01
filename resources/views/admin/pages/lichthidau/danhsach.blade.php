@extends ('admin.layout.master_admin')
@section ('title', 'Quản lý Lịch thi đấu')
@section('content')
	<div id="page-wrapper">
				
			<div class="main-page">
				<h3 class="title1">Danh sách Lịch thi đấu</h3>
				<div class="tables">
					<div class="bs-example widget-shadow" data-example-id="contextual-table"> 
						<h4>Lịch thi đấu</h4>

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
									<th class="text-center">Mùa giải</th>
									<th class="text-center">Vòng</th> 
									<th class="text-center">Đội A</th> 
									<th class="text-center">Đội B</th>
									<th class="text-center">Ngày thi đấu</th>
									<th class="text-center">Sân vận động</th>
									<th class="text-center">Thuộc tính</th>
								</tr> 
							</thead> 

							<tbody> 
								<?php $stt = 1; ?>
								@for ($i=0 ;$i < count($lichthidau) ;$i++)
		
								<tr class="odd gradeX">
										<td>{{ $stt }}</td>
										<td>
											{{ $lichthidau[$i]->TenGiaiDau  }} 
											{{ date('Y',strtotime($lichthidau[$i]->NamBatDauMuaGiai )) }} - 
											{{ date('Y',strtotime($lichthidau[$i]->NamKetThucMuaGiai )) }} 
										</td>
										<td style="width: 35px" class="text-center">{{ $lichthidau[$i]->VongDau }}</td>
										<td ><img height="25" style="margin:0px 5px 0px 15px" src="Client/images/logos/{{ $lichthidau[$i]->HinhAnhCauLacBo }}" alt=""> &nbsp;{{ $lichthidau[$i]->TenDayDu }}</td>
										<td ><img height="25" style="margin:0px 5px 0px 15px" src="Client/images/logos/{{ $lichthidau[$i+1]->HinhAnhCauLacBo }}" alt=""> &nbsp;{{ $lichthidau[$i+1]->TenDayDu }}</td>
										<td class="text-center">{{ date('d-m-Y' ,strtotime($lichthidau[$i]->NgayThiDau)) }}</td>
										<td class="text-center">{{ $lichthidau[$i]->DiaDiem }}</td>
										<td class="text-center" style="width: 265px">

											@if (!isset($lichthidau[$i]->TiSo))
											<a onclick="return XacNhanXoa('Bạn có chắc muốn xóa?')" href="admin/lich-thi-dau/xoa/{{$lichthidau[$i]->id}}" title="Xóa" class="btn btn-danger"><i class="fa fa-ban" ></i> Xóa</a>
											@else
											<a class="btn btn-danger disabled" onclick="return false;" title="Xoá" ><i class="fa fa-ban" ></i> Xoá</a>
											@endif
											

											@if (!isset($lichthidau[$i]->TiSo))
											<a href="admin/lich-thi-dau/sua/{{$lichthidau[$i]->id}}" title="Sửa" class="btn btn-info"><i class="fa fa-edit" ></i> Sửa</a>
											@else
											<a class="btn btn-info disabled" onclick="return false;" title="Sửa" ><i class="fa fa-edit" ></i> Sửa</a>
											@endif

											
											@if(date(strtotime($lichthidau[$i]->NgayThiDau)) < strtotime($date))
											@if (!isset($lichthidau[$i]->TiSo))
											<a class="btn btn-success " href="admin/lich-thi-dau/cap-nhat-ti-so/{{$lichthidau[$i]->id}} " title="Cập nhật tỉ số" ><i class="fa fa-edit" ></i> Cập nhật tỉ số</a>
											@else
											<a class="btn btn-success disabled" onclick="return false;" title="Cập nhật tỉ số" ><i class="fa fa-edit" ></i> Cập nhật tỉ số</a>
											@endif
											@endif

										</td>
								</tr>
						
								<?php $stt++; $i++; ?>
								@endfor
								
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
@section('style')
<style type="text/css" media="screen">
.disabled {
  pointer-events: none;
  cursor: default;
  opacity: 0.6;
}
</style>
@endsection