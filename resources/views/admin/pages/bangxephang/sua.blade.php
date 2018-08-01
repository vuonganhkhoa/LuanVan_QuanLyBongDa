@extends ('admin.layout.master_admin')
@section ('title', 'Quản lý Bảng Xếp Hạng')
@section('content')
	<div id="page-wrapper">
				
			<div class="main-page">
				<div class="row">

						<div class="row">
						<h3 class="title1">Cập nhật bảng xếp hạng :</h3>

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
							<form method="POST" class="form-horizontal" action="admin/bang-xep-hang/sua/{{$bangxephangclb->id}}" enctype="multipart/form-data">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">

							
								<div class="row">
									<div class="col-md-12">
										<div class="form-group {{ $errors->has('caulacbo') ? 'has-error' : '' }}">

											<label for="selector1" class="col-md-4 control-label">Chọn câu lạc bộ:</label>
											<div class="col-md-2">
												<select style="height: 30px; width: 170px" name="caulacbo" id="selector1"  class="form-control1">
													<option value="macdinh">Chọn câu lạc bộ</option>
													@foreach($caulacbo as $clb)
													<option value="{{$clb->id}}"
															@if($bangxephangclb->idCauLacBo == $clb->id)
																{{ 'Selected' }}
															@endif
														>{{$clb->TenDayDu}}</option>
													@endforeach
												</select>
											</div>

											<div class="col-md-6">
						                      @if ($errors->has('caulacbo'))
						                        <span class="help-block">
						                          <strong style="color:#E01A22">
						                            {{ $errors->first('caulacbo') }}
						                          </strong>
						                        </span>
						                      @endif
						                    </div>

										</div>
									</div>
								</div>

								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group {{ $errors->has('diem') ? 'has-error' : '' }}">

											<label for="selector1" class="col-md-4 control-label">Điểm câu lạc bộ:</label>
											<div class="col-md-2">
												<input type="number" min="0" name="diem" value="{{$bangxephangclb->Diem}}">
											</div>

											<div class="col-md-6">
						                      @if ($errors->has('diem'))
						                        <span class="help-block">
						                          <strong style="color:#E01A22">
						                            {{ $errors->first('diem') }}
						                          </strong>
						                        </span>
						                      @endif
						                    </div>

										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group {{ $errors->has('hangcaulacbo') ? 'has-error' : '' }}">

											<label for="selector1" class="col-md-4 control-label">Hạng câu lạc bộ:</label>
											<div class="col-md-2">
												<input type="number" min="0" name="hangcaulacbo" value="{{$bangxephangclb->HangCauLacBo}}">
											</div>
											<div class="col-md-6">
						                      @if ($errors->has('hangcaulacbo'))
						                        <span class="help-block">
						                          <strong style="color:#E01A22">
						                            {{ $errors->first('hangcaulacbo') }}
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
					</div>

				
				<div class="clearfix"></div>
				
			</div>
	</div>
@endsection

