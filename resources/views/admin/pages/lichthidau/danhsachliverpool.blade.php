@extends ('admin.layout.master_admin')
@section ('title', 'Quản lý Lịch thi đấu')

@section ('content')
	<div id="page-wrapper">
				
			<div class="main-page">
				<h3 class="title1">Danh sách Lịch thi đấu Liverpool</h3>
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
									<th class="text-center">Vòng</th> 
									<th class="text-center">Đội A</th> 
									<th class="text-center">Đội B</th>
									<th class="text-center">Ngày thi đấu</th>
									<th class="text-center">Sân vận động</th>
									
									<th class="text-center">Hành động</th>
								</tr> 
							</thead> 

							<tbody> 
								<?php $stt = 1; ?>
								@for ($i=0 ;$i < count($lichthidau_liverpool) ;$i++)
		
								<tr class="odd gradeX">
										<td>{{ $stt }}</td>
										<td style="width: 35px" class="text-center">{{ $lichthidau_liverpool[$i]->VongDau }}</td>
										<td ><img height="25" style="margin:0px 5px 0px 15px" src="Client/images/logos/{{ $lichthidau_liverpool[$i+1]->HinhAnhCauLacBo }}" alt=""> &nbsp;{{ $lichthidau_liverpool[$i+1]->TenDayDu }}</td>
										<td ><img height="25" style="margin:0px 5px 0px 15px" src="Client/images/logos/{{ $lichthidau_liverpool[$i]->HinhAnhCauLacBo }}" alt=""> &nbsp;{{ $lichthidau_liverpool[$i]->TenDayDu }}</td>
										<td class="text-center">{{ date('d-m-Y', strtotime($lichthidau_liverpool[$i]->NgayThiDau)) }}</td>
										<td class="text-center">{{ $lichthidau_liverpool[$i]->DiaDiem }}</td>
										<td class="text-center" style="width: 200px">
											
											<a 												
												title="Thêm" 
												class="btn btn-success 

												@if(!empty($thanhtich_trandau[$i][0]->DiemSo)) 
													disabled 
												@endif"
												@if(empty($thanhtich_trandau[$i][0]->DiemSo))
													href="admin/lich-thi-dau/them-thanh-tich/{{$lichthidau_liverpool[$i]->id}}" 
												@else
												href="javascript:void(0)"
												@endif
											>
												<i class="fa fa-edit" ></i> Thêm
											</a>

											<a 
												title="Sửa" 
												class="btn btn-info 
												@if(empty($thanhtich_trandau[$i][0]->DiemSo)) 
													disabled 
												@endif"
												@if(!empty($thanhtich_trandau[$i][0]->DiemSo))
													href="admin/lich-thi-dau/cap-nhat-thanh-tich/{{$lichthidau_liverpool[$i]->id}}" 
												@else
												href="javascript:void(0)"
												@endif
											>
												<i class="fa fa-edit" ></i> Cập nhật
											</a>

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
					"sLengthMenu":   "Xem MENU mục",
					"sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
					"sInfo":         "Đang xem START đến END trong tổng số TOTAL mục",
					"sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
					"sInfoFiltered": "(được lọc từ MAX mục)",
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