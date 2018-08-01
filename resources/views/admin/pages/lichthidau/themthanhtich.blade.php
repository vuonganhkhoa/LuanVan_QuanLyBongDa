@extends ('admin.layout.master_admin')
@section ('title', 'Quản lý Lịch Thi Đấu')
@section('content')

	<div id="page-wrapper">
				
			<div class="main-page">

				<div class="row">
						<h3 class="title1">Thêm thành tích :</h3>

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
							<form method="POST" class="form-horizontal" action="admin/lich-thi-dau/them-thanh-tich/{{$trandau[0]->id}}" enctype="multipart/form-data">
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

												<input style="height: 30px; width: 60px; margin-left: 20px" value="{{$trandau[0]->TiSo}}" type="number" name="tisob">
													
											</div>
										</div>
										
										<div class="col-md-6">

											<div class="form-group">
												
													<input style="height: 30px; width: 60px; margin-right: 20px" value="{{$trandau[1]->TiSo}}" type="number" name="tisob">
													

													
													<label style="line-height:30px; margin-right: 20px" for="txtarea1">{{$trandau[1]->TenDayDu}}</label>
												
												
													<img height="60" style="margin-bottom:12px "  " src="Client/images/logos/{{ $trandau[1]->HinhAnhCauLacBo_lon }}" alt="">
												
												
												
											</div>
										</div>

									</div>
								</div>


								@for ($i = 0; $i< count($cauthu_trandau); $i++)
								<!-- row : 1 -->
								<div class="row">
									<div class="col-md-12">

										<div class="col-md-4">
											<div class="form-group">
												<label style="line-height:10px" for="selector1" class="col-md-7 control-label">Tên cầu thủ:</label>
												<div class="col-md-5">
													<input style="height: 25px" disabled name="tencauthu[]" type="text" value="{{$cauthu_trandau[$i]->HoTen}}">
												</div>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label style="line-height:10px" for="selector1" class="col-md-7 control-label">Vị trí:</label>
												<div class="col-md-5">
													<input style="width: 50px; height: 25px" disabled type="text" name="vitri[]" value="{{$cauthu_trandau[$i]->TenViTri}}">
												</div>
											</div>
										</div>

										<div class="col-md-4">
											
										</div>

									</div>
								</div>


								<!-- row : 2 -->
								<div class="row">
									<div class="col-md-12">

										<div class="col-md-4">
											<div class="form-group">
												<label style="line-height:10px" for="selector1" class="col-md-7 control-label">Số đường chuyền:</label>
												<div class="col-md-5">
													<input style="width: 50px; height: 25px" type="number" min="0" max="100" name="soduongchuyen[]" value="0">
												</div>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label style="line-height:10px" for="selector1" class="col-md-7 control-label">Chuyền thành công:</label>
												<div class="col-md-5">
													<input style="width: 50px; height: 25px" type="number" min="0" max="100" name="chuyenthanhcong[]" value="0">
												</div>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label style="line-height:10px" for="selector1" class="col-md-7 control-label">Số kiến tạo:</label>
												<div class="col-md-5">
													<input style="width: 50px; height: 25px" type="number" min="0" max="10" name="sokientao[]" value="0">
												</div>
											</div>
										</div>

									</div>
								</div>


								<!-- row : 3 -->
								<div class="row">
									<div class="col-md-12">

										<div class="col-md-4">
											<div class="form-group">
												<label style="line-height:10px" for="selector1" class="col-md-7 control-label">Số lần sút:</label>
												<div class="col-md-5">
													<input style="width: 50px; height: 25px" type="number" min="0" max="100" name="solansut[]" value="0">
												</div>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label style="line-height:10px" for="selector1" class="col-md-7 control-label">Số bàn thắng:</label>
												<div class="col-md-5">
													<input style="width: 50px; height: 25px" type="number" min="0" max="90" name="sobanthang[]" value="0">
												</div>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label style="line-height:10px" for="selector1" class="col-md-7 control-label">Trận giữ sạch lưới:</label>
												<div class="col-md-5">
													<input style="width: 50px; height: 25px" type="number" min="0" max="1" name="sotrangiusachluoi[]" value="0">
												</div>
											</div>
										</div>

									</div>
								</div>


								<!-- row : 4 -->
								<div class="row">
									<div class="col-md-12">

										<div class="col-md-4">
											<div class="form-group">
												<label style="line-height:10px" for="selector1" class="col-md-7 control-label">Số lần cản phá:</label>
												<div class="col-md-5">
													<input style="width: 50px; height: 25px" type="number" min="0" max="300" name="solancanpha[]" value="0">
												</div>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label style="line-height:10px" for="selector1" class="col-md-7 control-label">Thẻ vàng:</label>
												<div class="col-md-5">
													<input style="width: 50px; height: 25px" type="number" min="0" max="2" name="thevang[]" value="0">
												</div>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label style="line-height:10px" for="selector1" class="col-md-7 control-label">Thẻ đỏ:</label>
												<div class="col-md-5">
													<input style="width: 50px; height: 25px" type="number" min="0" max="1" name="thedo[]" value="0">
												</div>
											</div>
										</div>

									</div>
								</div>

								<div class="row">
									<hr/>
								</div>

								@endfor

								
								



								
								<div class="form-group">
									<div  style="margin-bottom: -50px !important; margin-left: 55px;  " class="col-md-6 ">
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