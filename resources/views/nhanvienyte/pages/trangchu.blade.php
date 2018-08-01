@extends ('nhanvienyte.layout.master_nhanvienyte')
@section ('title', 'Trang Chủ')
@section('content')
	<div id="page-wrapper">
			<div class="main-page">
				<div style="margin-left: 400px " class="col-md-4 profile widget-shadow">
						<h4 class="title3">Thông tin cá nhân</h4>
						<div class="profile-top">
							<img style="height: 100px"  src="Client/images/players/{{Auth::user()->HinhDaiDien}}" alt="">
							<h4>{{ Auth::user()->HoTen }}</h4>
							<h5>{{ Auth::user()->ChucVu }}</h5>
						</div>
						<div class="profile-text">
							<div class="profile-row">
								<div class="profile-left">
									<i class="fa fa-envelope profile-icon"></i>
								</div>
								<div class="profile-right">
									<h4>{{ Auth::user()->Email }} </h4>
									<p>Email</p>
								</div> 
								<div class="clearfix"> </div>	
							</div>
							<div class="profile-row row-middle">
								<div class="profile-left">
									<i class="fa fa-calendar profile-icon"></i>
								</div>
								<div class="profile-right">
									<h4>{{ date('d/m/Y', strtotime(Auth::user()->NgaySinh)) }}</h4>
									<p>Ngày sinh</p>
								</div> 
								<div class="clearfix"></div>	
							</div>
							<div class="profile-row">
								<div class="profile-left">
									<i class="fa fa-circle profile-icon"></i>
								</div>
								<div class="profile-right">
									<h4>{{ Auth::user()->QuocTich }}</h4>
									<p>Quốc tịch</p>
								</div> 
								<div class="clearfix"> </div>	
							</div>
						</div>
						<div class="profile-btm">
							
								<a style="margin-left: 110px; margin-bottom: 10px ; height: 35px " href="nhan-vien-y-te/cap-nhat-thong-tin" title="Sửa" class="btn btn-info">
									<i class="fa fa-edit" ></i> Chỉnh sửa thông tin
								</a>
							
						</div>
					</div>
				<div class="clearfix"> </div>
			</div>
		</div>
@endsection