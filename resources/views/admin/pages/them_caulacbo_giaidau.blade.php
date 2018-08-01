@extends ('admin.layout.master_admin')
@section ('title', 'Thêm CLB vào Giải Đấu')
@section('content')

	<div id="page-wrapper">
				
			<div class="main-page">
				
				<div class="row">
						<h3 class="title1">Thêm CLB vào Giải Đấu :</h3>

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
							<form method="POST" class="form-horizontal" action="admin/giai-dau/them-clb-giai-dau/{{ $idGiaiDau }}" enctype="multipart/form-data">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">

								
									<div class="col-md-12">
										<div class="form-group {{ $errors->has('tengiaidau') ? 'has-error' : '' }}">

											<label for="txtarea1" class="col-md-4 control-label">Tên giải đấu:</label>
											<div class="col-md-3">
												<input style="height: 30px; width: 200px" class="form-control" type="text" name="tengiaidau" value="{{ $GiaiDau->TenGiaiDau }}" disabled>
											</div>

											<div class="col-md-5">
						                      @if ($errors->has('tengiaidau'))
						                        <span class="help-block">
						                          <strong style="color:#E01A22">
						                            {{ $errors->first('tengiaidau') }}
						                          </strong>
						                        </span>
						                      @endif
						                    </div>

										</div>
									</div>
								

								
									<div class="col-md-12">
										<div class="form-group {{ $errors->has('nambatdau') ? 'has-error' : '' }}">

											<label for="txtarea1" class="col-md-4 control-label">Năm bắt đầu mùa giải:</label>
											<div class="col-md-3">
												<input style="height: 30px; width: 200px" type="date" class="form-control date"  name="nambatdau" value="{{ $GiaiDau->NamBatDauMuaGiai}}" disabled>
											</div>

										</div>
									</div>
								

								
									<div class="col-md-12">
										<div class="form-group {{ $errors->has('namketthuc') ? 'has-error' : '' }}">

											<label for="txtarea1" class="col-md-4 control-label">Năm kết thúc mùa giải:</label>
											<div class="col-md-3">
												<input style="height: 30px; width: 200px" type="date" class="form-control date"  name="namketthuc" value="{{ $GiaiDau->NamKetThucMuaGiai}}" disabled>
											</div>
										</div>
									</div>



									<div class="col-md-12">
										<div class="form-group {{ $errors->has('clb') ? 'has-error' : '' }}">

											<label for="txtarea1" class="col-md-4 control-label">Các câu lạc bộ:</label>
											<div class="col-md-3">
												<select style="height: 400px" name="clb[]" class="form-control" multiple>
													<option value="ChonTatCa" selected>Chọn tất cả câu lạc bộ</option>
													@foreach($CauLacBo as $clb)
													<option value="{{ $clb->id }}">{{ $clb->TenDayDu }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>



								<div class="row">
									<div class="col-md-9">
										<div class="form-group">
											<div  style="margin-bottom: -50px !important" class="col-md-8 ">
												<button type="submit" class="btn btn-danger pull-right">Lưu thông tin</button>
											</div>
										</div>
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