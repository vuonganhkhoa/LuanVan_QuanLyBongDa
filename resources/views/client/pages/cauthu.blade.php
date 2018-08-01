@extends ('client.layouts.master')

@section ('title', 'Liverpool FC - Cầu thủ')

@section ('content')

				<!--// KODE BENNER1 START //-->
				<div class="kode_benner1 bamnner2">
					<div class="kode_benner1_text">
						<h2>Cầu thủ</h2>
					</div>
					<div class="kode_benner1_cols">
						<div class="container kf_container">
							<ul class="breadcrumb">
							  <li><a href="{{ route('Home') }}">Trang chủ</a></li>
							  <li class="active">Cầu thủ</li>
							</ul>
						</div>
					</div>
				</div>
				<!--// KODE BENNER1 END //-->
				<div class="kode_ply_gallery ">
						<div class="container">

							<div class="heading5 black b_2">
							  <h4>Danh sách cầu thủ mùa giải <span>{{ date('Y',strtotime($GiaiDau->NamBatDauMuaGiai)) }} - {{ date('Y',strtotime($GiaiDau->NamKetThucMuaGiai)) }}</span></h4>
							</div>
							
							<div class="ftb_row_des">
								<div class="container">
									<div class="row">

										@foreach ($DanhSachCauThu as $cauthu)
										<div class="col-md-3 col-sm-6">
											<div class="ftb-team-thumb">
												<figure><img src="Client/images/players/{{ $cauthu->nguoidung->HinhDaiDien }}" alt=""></figure>
												<div class="ftb-team-dec">
													<span>{{ $cauthu->SoAo }}</span>
													<div class="text">
														<a href="./danh-sach-cau-thu/chi-tiet/{{ $cauthu->id }}">{{ $cauthu->nguoidung->HoTen }}</a>
														<p>{{ $cauthu->ViTriSoTruong }}</p>
													</div>
													<a class="arrow-iconbtn" href="./danh-sach-cau-thu/chi-tiet/{{ $cauthu->id }}"><i class="fa fa-arrow-right "></i></a>
												</div>
											</div>
										</div>
										@endforeach

									</div>
								</div>
							</div>

						</div>
				</div>

@stop