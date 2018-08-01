@extends ('huanluyenvien.layouts.master')

@section ("title")
Liverpool FC - Thông tin cá nhân
@stop

@section ('content')

<div class="kode_benner1 bamnner2">
	<div class="kode_benner1_text">
		<h2>Thông tin cá nhân</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="huan-luuyen-vien">Trang chủ</a></li>
				<li class="active">Thông tin cá nhân</li>
			</ul>
		</div>
	</div>
</div>

<div class="kode-content">
	<div class="ft-match-slider">

		<div class="kode_player_wraper">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="kode_player_fig">
							<figure>
								<img height="300" src="Client/images/players/{{$HuanLuyenVien->HinhDaiDien}}" alt="">
							</figure>

						</div>
					</div>
					<div class="col-md-8">
						<div class="kode_player_item">

							<div class="row">
								<div class="kode-ply-slid">
									<div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<div class="kode_ply_list">
												<a >Tên:<span>{{$HuanLuyenVien->HoTen}}</span></a>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<div class="kode_ply_list">
												<a >Email:<span>{{$HuanLuyenVien->Email}}</span></a>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<div class="kode_ply_list">
												<a >Quốc tịch:<span>{{$HuanLuyenVien->QuocTich}}</span></a>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<div class="kode_ply_list">
												<a >Nơi sinh:<span>{{$HuanLuyenVien->NoiSinh}}</span></a>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<div class="kode_ply_list">
												<a >Ngày sinh:<span>{{date('d/m/Y', strtotime($HuanLuyenVien->NgaySinh))}}</span></a>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<div class="kode_ply_list">
												<a >Tuổi : <span>{{$Tuoi}} tuổi</span></a>
											</div>
										</div>


										<div class="col-md-4-offset"></div>

										<div class="col-md-12" style="margin-top: 60px">
									<div class="col-md-11">
									<div class="kode_ply_text">
										<div class="kode_ply_icon">
											<h6>Social Network :</h6>
											<ul>
												<li><a href="https://www.facebook.com/LiverpoolFC"><i class="fa fa-facebook"></i></a></li>
												<li><a href="https://twitter.com/lfc"><i class="fa fa-twitter"></i></a></li>
												<li><a href="https://www.linkedin.com/company/liverpool-football-club"> <i class="fa fa-linkedin"></i></a></li>
											</ul>
										</div>
									</div>
									</div>
									<div class="col-md-1">
									<div class="kode_ply_text">
										<div class="kode_ply_icon">
											<h6><a href="huan-luyen-vien/thong-tin-ca-nhan/sua"><i class="fa fa-edit" style="font-size:30px; float:right"></i></a></h6>
										</div>
									</div>
									</div>
								</div>
									</div>										
								</div>	

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
	@stop