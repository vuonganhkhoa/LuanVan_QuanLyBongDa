@extends ('admin.layout.master_admin')
@section ('title', 'Quản lý Lịch Thi Đấu')
@section('content')

	<div id="page-wrapper">
				
			<div class="main-page">

				<div class="row">
						<h3 class="title1">Thêm lịch thi đấu :</h3>

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

						<div class="form-three widget-shadow">
							<form method="POST" class="form-horizontal" action="admin/lich-thi-dau/them" enctype="multipart/form-data">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">

								<div class="form-group">
									<label for="txtarea1" class="col-sm-2 control-label">Vòng đấu:</label>
									<div class="col-sm-6">
										<input class="form-control1" type="number" name="vongdau" value="{{($vongdau->VongDau)}}">
									</div>
								</div>

								<div class="form-group">
									<label for="selector1" class="col-md-2 control-label">Chọn đội A:</label>
									<div class="col-md-6">
										<select name="doia" id="selector1"  class="form-control1">
											<option value="macdinh">Chọn đội bóng</option>
											@foreach($caulacbo as $clb)
											<option value="{{$clb->id}}">{{$clb->TenDayDu}}</option>
											@endforeach
										</select>
									</div>
									<!-- <div class="col-md-4">
										<p class="help-block">4rsenal không bao giờ vô địch C1</p>
									</div> -->
								</div>

								<div class="form-group">
									<label for="selector1" class="col-md-2 control-label">Chọn đội B:</label>
									<div class="col-md-6">
										<select name="doib" id="selector1" class="form-control1">
											<option value="macdinh">Chọn đội bóng</option>
											@foreach($caulacbo as $clb)
											<option value="{{$clb->id}}">{{$clb->TenDayDu}}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="selector1" class="col-md-2 control-label">Chọn giờ thi đấu:</label>
									<div class="col-md-6">
										<input class="form-control" type="time" name="giothidau" value="17:00">
									</div>
								</div>

								<div class="form-group">
									<label for="selector1" class="col-md-2 control-label">Chọn ngày thi đấu:</label>
									<div class="col-md-6">
										<input class="form-control" type="date" name="ngaythidau" value="{{date('Y-m-d')}}">
									</div>
								</div>

								<div class="form-group">
									<label for="selector1" class="col-md-2 control-label">Chọn địa điểm thi đấu:</label>
									<div class="col-md-6">
										<select name="diadiem" id="selector1" class="form-control1">
											<option value="macdinh">Chọn sân vận động</option>
											@foreach($caulacbo as $clb)
											<option value="{{$clb->SanVanDong}}">{{$clb->SanVanDong}}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="selector1" class="col-md-2 control-label">Chọn giải đấu:</label>
									<div class="col-md-6">
										<select name="giaidau" id="selector1" class="form-control1">
											<option value="macdinh">Chọn giải đấu</option>
											@foreach($giaidau as $gd)
											<option value="{{$gd->id}}">{{$gd->TenGiaiDau}} {{  date('Y',strtotime($gd->NamBatDauMuaGiai)) }}-{{  date('Y',strtotime($gd->NamKetThucMuaGiai)) }}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="selector1" class="col-md-2 control-label">Trận đấu của CLB:</label>
									<div class="col-md-6">
										<input type="number" value="0" min="0" max="1" name="trandaucuaCLB">
									</div>
								</div>
								
								<div class="form-group">
									<div  style="margin-bottom: -50px !important" class="col-md-8 ">
										<button type="submit" class="btn btn-danger pull-right">Thêm</button>
									</div>
								</div>
								
							</form>
						</div>
				</div>

				


				
				<div class="clearfix"></div>
			</div>
	</div>
@endsection

@section('script')
<script type="text/javascript">
	$('.alert').delay(5000).slideUp()
</script>
@endsection