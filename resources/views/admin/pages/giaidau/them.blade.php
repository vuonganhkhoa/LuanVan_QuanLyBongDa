@extends ('admin.layout.master_admin')
@section ('title', 'Quản lý Giải Đấu')
@section('content')

	<div id="page-wrapper">
				
			<div class="main-page">
				
				<div class="row">
						<h3 class="title1">Thêm giải đấu :</h3>

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
							<form method="POST" class="form-horizontal" action="admin/giai-dau/them" enctype="multipart/form-data">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">

								
									<div class="col-md-12">
										<div class="form-group {{ $errors->has('tengiaidau') ? 'has-error' : '' }}">

											<label for="txtarea1" class="col-md-4 control-label">Tên giải đấu:</label>
											<div class="col-md-3">
												<input style="height: 30px; width: 200px" class="form-control1" type="text" name="tengiaidau">
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
												<input style="height: 30px; width: 200px" type="date" class="form-control date"  name="nambatdau" value="<?= date('Y-m-d') ?>">
											</div>

											<div class="col-md-5">
						                      @if ($errors->has('nambatdau'))
						                        <span class="help-block">
						                          <strong style="color:#E01A22">
						                            {{ $errors->first('nambatdau') }}
						                          </strong>
						                        </span>
						                      @endif
						                    </div>

										</div>
									</div>
								

								
									<div class="col-md-12">
										<div class="form-group {{ $errors->has('namketthuc') ? 'has-error' : '' }}">

											<label for="txtarea1" class="col-md-4 control-label">Năm kết thúc mùa giải:</label>
											<div class="col-md-3">
												<input style="height: 30px; width: 200px" type="date" class="form-control date"  name="namketthuc" value="<?= date('Y-m-d') ?>">
											</div>

											<div class="col-md-5">
						                      @if ($errors->has('namketthuc'))
						                        <span class="help-block">
						                          <strong style="color:#E01A22">
						                            {{ $errors->first('namketthuc') }}
						                          </strong>
						                        </span>
						                      @endif
						                    </div>

										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group {{ $errors->has('muagiaihientai') ? 'has-error' : '' }}">

											<label for="txtarea1" class="col-md-4 control-label">Mùa giải hiện tại:</label>
											<div class="col-md-3">
												<select style="width: 200px;" class="control-label " name="muagiaihientai" >
					                              <option value="0">Mùa giải khác</option>
					                              <option value="1">Mùa giải hiện tại</option>
					                            </select>
											</div>

											<div class="col-md-5">
						                      @if ($errors->has('muagiaihientai'))
						                        <span class="help-block">
						                          <strong style="color:#E01A22">
						                            {{ $errors->first('muagiaihientai') }}
						                          </strong>
						                        </span>
						                      @endif
						                    </div>

										</div>
									</div>
								


								<div class="row">
									<div class="col-md-9">
										<div class="form-group">
											<div  style="margin-bottom: -50px !important" class="col-md-8 ">
												<button type="submit" class="btn btn-danger pull-right">Thêm</button>
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