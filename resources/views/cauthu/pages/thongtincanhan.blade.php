@extends ('cauthu.layouts.master')

@section ("title")
Liverpool FC - {{  $tenCauThu  }}
@stop

@section ('content')

@if(!empty($CauThu[0]))
<div class="kode_benner1 bamnner2">
	<div class="kode_benner1_text">
		<h2>{{ $CauThu[0]->HoTen }}</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="./cau-thu/{{ Auth::user()->username }}">Trang chủ</a></li>
				<li class="active">Chi tiết cầu thủ</li>
			</ul>
		</div>
	</div>
</div>

<div class="kode-content">
	<div class="kode_player_wraper">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="kode_player_fig">
						<figure>
							<img src="Client/images/players/{{ $CauThu[0]->HinhDaiDien }}" alt="">
							<figcaption>
								<a><img src="Client/images/ftb-result.png" alt=""></a>
								<div class="kode_player_text">
									<h6>{{ $CauThu[0]->HoTen }}</h6>
								</div>
							</figcaption>
						</figure>

					</div>
				</div>
				<div class="col-md-8">
					<div class="kode_player_item">
						<h2 class="kode_ply_titile"><span>01.</span>  Thông tin cá nhân </h2>	
						<div class="row">
							<div class="kode-ply-slid">
								<div>
									<div class="col-md-4 col-sm-6 col-xs-6">
										<div class="kode_ply_list">
											<a >Tên:<span>{{ $CauThu[0]->HoTen }}</span></a>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-6">
										<div class="kode_ply_list">
											<a >Số áo:<span>{{ $CauThu[0]->SoAo }}</span></a>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-6">
										<div class="kode_ply_list">
											<a >Quốc tịch:<span>{{ $CauThu[0]->QuocTich }}</span></a>
										</div>
									</div>

									<div class="col-md-4 col-sm-6 col-xs-6">
										<div class="kode_ply_list">
											<a >Ngày sinh:<span>{{ date('d-m-Y', strtotime($CauThu[0]->NgaySinh)) }}</span></a>
										</div>
									</div>

									<div class="col-md-4 col-sm-6 col-xs-6">
										<div class="kode_ply_list">
											<a >Nơi sinh:<span> {{ $CauThu[0]->NoiSinh }}</span></a>
										</div>
									</div>

									<div class="col-md-4 col-sm-6 col-xs-6">
										<div class="kode_ply_list">
											<a >Tuổi : <span>{{ $Tuoi }} tuổi</span></a>
										</div>
									</div>

									<div class="col-md-4 col-sm-6 col-xs-6">
										<div class="kode_ply_list">
											<a >Chiều cao :<span>{{ $CauThu[0]->ChieuCao }} cm</span></a>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-6">
										<div class="kode_ply_list">
											<a >Cân nặng :<span>{{ $CauThu[0]->CanNang }} kg</span></a>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-6">
										<div class="kode_ply_list">
											<a >Vị trí  :<span>{{ $CauThu[0]->ViTriSoTruong }}</span></a>
										</div>
									</div>
									
									<div class="col-md-4-offset"></div>
								</div>										
							</div>	
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
											<h6><a href="cau-thu/{{ Auth::user()->username }}/thong-tin-ca-nhan/sua"><i class="fa fa-edit" style="font-size:30px; float:right"></i></a></h6>
										</div>
									</div>
									</div>
								</div>
							<div class="col-md-12">
								<div class="kode_ply_text">
									{!! $CauThu[0]->LuocSuCauThu !!}
									<div class="kode_ply_icon">
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@if (!empty($ThanhTichCauThu[0]))
	<div class="kode_ply_gallery">
		<div class="container">
			<div class="heading5 black b_2">
				<h4>Thành tích cầu thủ <span>{{ $CauThu[0]->HoTen }}</span></h4>
			</div>
			<table class="kode_ply_table">
				<tr class="kode_ply_first">
					<th>Đội bóng</th>
					<th>Số trận</th>
					<th>Số đường chuyền</th>
					<th>Bàn thắng</th>
					<th>Kiến tạo</th>
					<th>Thẻ vàng</th>
					<th>Thẻ đỏ</th>
					<th>Điểm</th>
				</tr>

				<tr class="kode_ply_two">
					<td>Liverpool</td>
					<td>{{ $ThanhTichCauThu[0]->SoTran }}</td>
					<td>{{ $ThanhTichCauThu[0]->SoDuongChuyen }}</td>
					<td>{{ $ThanhTichCauThu[0]->SoBanThang }}</td>
					<td>{{ $ThanhTichCauThu[0]->SoKienTao }}</td>
					<td>{{ $ThanhTichCauThu[0]->SoTheVang }}</td>
					<td>{{ $ThanhTichCauThu[0]->SoTheDo }}</td>
					<td>{{ $ThanhTichCauThu[0]->Diem }}</td>
				</tr>

			</table>				
		</div>
	</div>
	@endif

</div>
@else
'Chưa có thông tin cầu thủ này.'
@endif

@stop