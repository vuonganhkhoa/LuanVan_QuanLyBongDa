@extends ('admin.layout.master_admin')
@section ('title', 'Quản lý Vị trí')
@section('content')

	<div id="page-wrapper">
				
			<div class="main-page">
				
				<div class="row">
						<h3 class="title1">Cập nhật Vị trí :</h3>

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
							<form method="POST" class="form-horizontal" action="admin/vi-tri/sua/{{$vitri->id}}" enctype="multipart/form-data">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">

								<div class="row">
									<div class="col-md-12">
										<div class="form-group {{ $errors->has('tenvitri') ? 'has-error' : '' }}">

											<label for="txtarea1" class="col-md-4 control-label">Tên vị trí:</label>
											<div class="col-md-3">
												<input style="height: 30px" value="{{$vitri->TenViTri}}" class="form-control1" type="text" name="tenvitri">
											</div>

											<div class="col-md-5">
						                      @if ($errors->has('tenvitri'))
						                        <span class="help-block">
						                          <strong style="color:#E01A22">
						                            {{ $errors->first('tenvitri') }}
						                          </strong>
						                        </span>
						                      @endif
						                    </div>

										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group {{ $errors->has('chuthich') ? 'has-error' : '' }}">

											<label for="txtarea1" class="col-md-4 control-label">Chú thích:</label>
											<div class="col-md-3">
												<input style="height: 30px" class="form-control1" value="{{$vitri->ChuThich}}" type="text" name="chuthich">
											</div>

											<div class="col-md-5">
						                      @if ($errors->has('chuthich'))
						                        <span class="help-block">
						                          <strong style="color:#E01A22">
						                            {{ $errors->first('chuthich') }}
						                          </strong>
						                        </span>
						                      @endif
						                    </div>

										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-md-9">
										<div class="form-group">
											<div  style="margin-bottom: -50px !important" class="col-md-8 ">
												<button type="submit" class="btn btn-danger pull-right">Cập nhật</button>
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