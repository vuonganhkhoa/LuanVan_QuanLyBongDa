@extends ('admin.layout.master_admin')
@section ('title', 'Quản lý Lịch Thi Đấu')
@section('content')

	<div id="page-wrapper">
				
			<div class="main-page">

				<div class="row">
						<h3 class="title1">Cập nhật tỉ số :</h3>

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
							<form method="POST" class="form-horizontal" action="admin/lich-thi-dau/cap-nhat-ti-so/{{$trandau[0]->id}}/{{$trandau[1]->id}}" enctype="multipart/form-data">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">

								<div class="row">
									<div class="col-md-12">

										<div class="col-md-3">
											<div class="form-group ">
						                        <label for="txtarea1" class="col-md-9 control-label">Vòng đấu : {{$trandau[0]->VongDau}}</label>
					                      	</div>
					                    </div>

					                    <div class="col-md-3">
											<div class="form-group ">
						                        <label for="txtarea1" class="col-md-9 control-label">Ngày thi đấu : {{$trandau[0]->NgayThiDau}}</label>
					                      	</div>
					                    </div>

					                    <div class="col-md-3">
											<div class="form-group ">
						                        <label for="txtarea1" class="col-md-9 control-label">Giờ thi đấu : {{$trandau[0]->GioThiDau}}</label>
					                      	</div>
					                    </div>

					                    <div class="col-md-3">
											<div class="form-group ">
						                        <label for="txtarea1" class="col-md-9 control-label">Địa điểm : {{$trandau[0]->DiaDiem}}</label>
					                      	</div>
					                    </div>

									</div>
								</div>

								<div class="row">
									<div class="col-md-12">

										<div class="col-md-6">
											<div class="form-group" style="float: right; margin-right: 5px ">

												<img height="60" style="margin-bottom:12px "  " src="Client/images/logos/{{ $trandau[0]->HinhAnhCauLacBo_lon }}" alt="">

												
												<label style="line-height:30px; margin-left: 20px" for="txtarea1">{{$trandau[0]->TenDayDu}}</label>

												<input style="height: 30px; width: 60px; margin-left: 20px" class="form-control1" type="number" value="{{$trandau[0]->TiSo}}" min="0" max="90" name="tisoa">
													
											</div>
										</div>
										
										<div class="col-md-6">

											<div class="form-group">
												
													<input style="height: 30px; width: 60px; margin-left: 20px" class="form-control1" value="{{$trandau[1]->TiSo}}" min="0" max="90" type="number" name="tisob">
													
													
													<label style="line-height:30px; margin-right: 20px" for="txtarea1">{{$trandau[1]->TenDayDu}}</label>
												
												
													<img height="60" style="margin-bottom:12px "  " src="Client/images/logos/{{ $trandau[1]->HinhAnhCauLacBo_lon }}" alt="">
												
												
												
											</div>
										</div>

									</div>
								</div>

								
								
									<div class="col-md-12">
										<div class="col-md-6">
											<div class="form-group" style="float: right; margin-right: 5px ">

												<img height="30" style="margin-bottom:12px "  " src="Client/images/yellowcard.png" alt="">

												
												<label style="line-height:30px; margin-left: 20px" for="txtarea1">Số thẻ vàng</label>

												<input style="height: 30px; width: 60px; margin-left: 20px" value="0" type="number" name="thevanga">
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
													<input style="height: 30px; width: 60px; margin-right: 20px" value="0" type="number" name="thevangb">
													

													
													<label style="line-height:30px; margin-right: 20px" for="txtarea1">Số thẻ vàng</label>
												
												
													<img height="30" style="margin-bottom:12px "  " src="Client/images/yellowcard.png" alt="">
											</div>
										</div>
									</div>
								


								
									<div class="col-md-12">
										<div class="col-md-6">
											<div class="form-group" style="float: right; margin-right: 5px ">

												<img height="30" style="margin-bottom:12px "  " src="Client/images/redcard.png" alt="">

												
												<label style="line-height:30px; margin-left: 20px" for="txtarea1">Số thẻ đỏ</label>

												<input style="height: 30px; width: 60px; margin-left: 20px" value="0" type="number" name="thedoa">
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
													<input style="height: 30px; width: 60px; margin-right: 20px" value="0" type="number" name="thedob">
													

													
													<label style="line-height:30px; margin-right: 20px" for="txtarea1">Số thẻ đỏ</label>
												
												
													<img height="30" style="margin-bottom:12px "  " src="Client/images/redcard.png" alt="">
											</div>
										</div>
									</div>
								
								


								
								<div class="form-group">
									<div  style="margin-bottom: -50px !important; margin-left: 55px;  " class="col-md-6 ">
										<button type="submit" class="btn btn-danger pull-right">Cập nhật</button>
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