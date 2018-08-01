@extends ('huanluyenvien.layouts.master')

@section ("title")
Liverpool FC - Cập nhật thông tin
@stop

@section ('style')
<style>
.material-switch > input[type="checkbox"] {
	display: none;   
}

.material-switch > label {
	cursor: pointer;
	height: 0px;
	position: relative; 
	width: 520px;  
	margin-top: 20px
}

.material-switch > label::before {
	background: rgb(0, 0, 0);
	box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
	border-radius: 8px;
	content: '';
	height: 16px;
	margin-top: -8px;
	position:absolute;
	opacity: 0.3;
	transition: all 0.4s ease-in-out;
	width: 40px;
}
.material-switch > label::after {
	background: rgb(255, 255, 255);
	border-radius: 16px;
	box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
	content: '';
	height: 24px;
	left: -4px;
	margin-top: -8px;
	position: absolute;
	top: -4px;
	transition: all 0.3s ease-in-out;
	width: 24px;
}
.material-switch > input[type="checkbox"]:checked + label::before {
	background: inherit;
	opacity: 0.5;
}
.material-switch > input[type="checkbox"]:checked + label::after {
	background: inherit;
	left: 20px;
}
</style>
@stop

@section ('content')

<div class="kode_benner1 bamnner2">
	<div class="kode_benner1_text">
		<h2>Cập nhật thông tin cá nhân</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="huan-luyen-vien">Trang chủ</a></li>
				<li class="active">Cập nhật thông tin cá nhân</li>
			</ul>
		</div>
	</div>
</div>

@if(!empty($HuanLuyenVien))
<div class="kode-content">
	<div class="ft-match-slider">

		<div class="kode_player_wraper">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="kode_player_fig">
							<figure>
								<img height="300" src="Client/images/players/{{ $HuanLuyenVien->HinhDaiDien }}" alt="">
							</figure>

						</div>
					</div>
					<div class="col-md-8">
						<div class="kode_player_item">

							@if(session('thongbao'))
							<div class="alert alert-success">
								{{ session('thongbao') }}
							</div>
		                  	@endif
							@if(session('loi'))
							<div class="alert alert-danger">
								{{ session('loi') }}
							</div>
		                  	@endif

							<form action="huan-luyen-vien/thong-tin-ca-nhan/sua" method="POST">
								{{ csrf_field() }}
								<div class="col-md-12">
									<div class="col-md-3">
										<label for="">Tên đăng nhập : </label>
									</div>
									<div class="col-md-9">
										<div class="kode_contant_field">
											<input type="text" placeholder="Tên đăng nhập" value="{{ $HuanLuyenVien->username }}" name="TenDangNhap" >
											@if ($errors->has('TenDangNhap'))
							                <span class="help-block"><strong style="font-size:14px; color:#E01A22">{{ 
							                	$errors->first('TenDangNhap') }}</strong></span>
							                @endif
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-3">
										<label for="">Địa chỉ email : </label>
									</div>
									<div class="col-md-9">
										<div class="kode_contant_field">
											<input type="text" placeholder="Email" value="{{ $HuanLuyenVien->Email }}" name="Email" >
											@if ($errors->has('Email'))
							                <span class="help-block"><strong style="font-size:14px; color:#E01A22">{{ $errors->first('Email') }}</strong></span>
							                @endif
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-3">
										<label for="">Đổi mật khẩu : </label>
									</div>
									<div class="col-md-9">
										<div class="kode_contant_field">
											<div class="material-switch pull-right">
												<input id="someSwitchOptionDanger" name="DoiMatKhau" type="checkbox"/>
												<label for="someSwitchOptionDanger"  class="label-danger"></label>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12" hidden id="FormDoiMatKhau">
									<div class="col-md-4">
										<div class="kode_contant_field">
											<input type="password" placeholder="Mật khẩu hiện tại" name="MatKhauHienTai" >
											@if ($errors->has('MatKhauHienTai'))
											<span class="help-block"><strong style="font-size:14px; color:#E01A22">{{ 
												$errors->first('MatKhauHienTai') }}</strong></span>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class="kode_contant_field">
											<input type="password" placeholder="Mật khẩu mới" name="MatKhauMoi" >
											@if ($errors->has('MatKhauMoi'))
											<span class="help-block"><strong style="font-size:14px; color:#E01A22">{{ 
												$errors->first('MatKhauMoi') }}</strong></span>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class="kode_contant_field">
											<input type="password" placeholder="Nhập lại mật khẩu mới" name="MatKhauNhapLai" >
											@if ($errors->has('MatKhauNhapLai'))
											<span class="help-block"><strong style="font-size:14px; color:#E01A22">{{ 
												$errors->first('MatKhauNhapLai') }}</strong></span>
											@endif
										</div>
									</div>
								</div>
								
								<div class="col-md-12">
									<div class="kode_contant_area" style="text-align: right; margin-top: 20px">
										<button>Cập nhật </button>
									</div>
								</div>
							</form>	

						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
@else
<div class="alert alert-danger">Chưa có thông tin huần luyện viên.</div>
@endif

@stop

@section ('script')
<script type="text/javascript">

	$('.alert').delay(5000).slideUp()

	$('#someSwitchOptionDanger').click(function(){

		if ( $(this).is(':checked') ){
			$('#FormDoiMatKhau').show();
		}else{
			$('#FormDoiMatKhau').hide();
		}

	});

</script>
@stop