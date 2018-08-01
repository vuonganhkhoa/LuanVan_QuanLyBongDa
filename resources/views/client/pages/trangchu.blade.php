@extends ('client.layouts.master')

@section ('title', 'Liverpool FC - Trang Chủ')

@section ('content')

			<!--// Main Banner //-->
			  <div id="mainbanner">
				<div class="flexslider">
				  <ul class="slides">
					<li>
					  <!--// THUMB SLIDER START //-->
					  <div class="thumb-slider">
						<img src="Client/images/banner/liverpool_banner.jpg" alt="" />
					  </div>
					  <!--// THUMB SLIDER END //-->
					</li>
					
					<li>
					  <div class="thumb-slider">
						<img src="Client/images/banner/liverpool_banner3.jpg" alt="" />
						<div class="container">
				
						</div>
					  </div>
					</li>

					<li>
						<div class="thumb-slider">
							<img src="Client/images/banner/liverpool_banner2.jpg" alt="" />
							<div class="container">
								<div class="kode-ft-caption text-center"> 
									<div class="football-caption">      
										<h5>Thank you !!</h5>
									</div>
									<div class="clearfix"></div>        
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</li>
					
				  </ul>
				</div>
			  </div>
			  <!--// Main Banner //-->

			  <!--// Main Content //-->
			  <div class="kode-content">
				<div class="ft-match-slider">
				  <div class="owl-carousel-3 owl-theme" id="owl-demo6">
					
					@for ($i=0;$i<count($CacTranDauTiepTheo);$i++)
					  <div class="ft-match-dec">
						  <span>{{ date('d/m/Y' , strtotime($CacTranDauTiepTheo[$i]->NgayThiDau)) }}</span>
						  <div class="ft-match-teams">
							<div class="ft-team-1">
							  <h5><a>{{ $CacTranDauTiepTheo[$i]->TenDayDu }}</a></h5>
							  <a><img src="Client/images/logos/{{ $CacTranDauTiepTheo[$i]->HinhAnhCauLacBo }}" alt=""></a>
							</div>
							<span> VS </span>
							<div class="ft-team-1 ft-team-2">
							  <h5><a>{{ $CacTranDauTiepTheo[$i+1]->TenDayDu }}</a></h5>
							  <a><img src="Client/images/logos/{{ $CacTranDauTiepTheo[$i+1]->HinhAnhCauLacBo }}" alt=""></a>
							</div>
						  </div>
					  </div>
					  <?php $i++; ?>
					@endfor

				</div>

				<section class="ftb_goalpost">
					<div class="container">
						<div class="heading5 hdg_6">
						  <h4>Câu lạc bộ bóng đá <span>Liverpool</span></h4>
						</div>
						<div class="row">
							<div class="ftb_goal_tab_des">
								<div class="col-md-3">
									<div class="ftb_goal_fig">
										<img height="240" width="400" src="Client/images/logos/Liverpool_Home.png" alt="images">
									</div>
								</div>
								<div class="col-md-9">
									<div class="panel panel-default">
										<div class="ftb_goal_tabs">
											<div class="panel-body">	
												<div class="tab-content">
													<div class="tab-pane active" id="tab3">
														<div class="ftb_club_stats">
															<p>{!! $CauLacBo->LichSu !!}</p>
															<ul>
																<li><a><i class="fa fa-chevron-circle-right"></i><b>Năm thành lập</b>	{{ date('Y', strtotime($CauLacBo->NgayThanhLap)) }}</a></li>
																<li><a><i class="fa fa-chevron-circle-right"></i><b>Biệt danh</b>	{{ $CauLacBo->BietDanh }}</a></li>
																<li><a><i class="fa fa-chevron-circle-right"></i><b>Sân vận động</b>	{{ $CauLacBo->SanVanDong }}</a></li>
																<li><a><i class="fa fa-chevron-circle-right"></i><b>Sức chứa</b>	{{ $CauLacBo->SucChua }}</a></li>
																<li><a><i class="fa fa-chevron-circle-right"></i><b>Chủ sở hữu</b>	{{ $CauLacBo->TruSo }}</a></li>
																<li><a><i class="fa fa-chevron-circle-right"></i><b>Chủ tịch</b>	{{ $CauLacBo->ChuTich }} </a></li>
															</ul>
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

				</section>

				@if (!empty($KetQuaTranDauGanDay))
				<section class="ftb-resultbg">
				  <div class="container">
					<div class="heading5">
					  <h4>Kết quả trận đấu <span>gần đây</span></h4>
					</div>
					<div class="ftb-result-wrap">
					  <div class="ftb-result1">
						<div class="ftb-result-logo">
						  <a><img src="Client/images/logos/{{ $KetQuaTranDauGanDay[0]->HinhAnhCauLacBo_lon }}" alt=""></a>
						</div>
						<div class="text">
						  <h6><a>{{ $KetQuaTranDauGanDay[0]->TenDayDu }}</a></h6>
						</div>
					  </div>

					  <div class="ftb-final-result">
						<em>{{ date('d/m/Y', strtotime($KetQuaTranDauGanDay[0]->NgayThiDau)) }} | {{ date('G:i', strtotime($KetQuaTranDauGanDay[0]->GioThiDau)) }} PM <i>{{ $KetQuaTranDauGanDay[0]->DiaDiem }}</i></em>
						<p><span class="grater">{{ $KetQuaTranDauGanDay[0]->TiSo }}</span> - <span>{{ $KetQuaTranDauGanDay[1]->TiSo }}</span></p>
					  </div>

					  <div class="ftb-result1 ftb-result2">
						<div class="ftb-result-logo">
						  <a><img src="Client/images/logos/{{ $KetQuaTranDauGanDay[1]->HinhAnhCauLacBo_lon }}" alt=""></a>
						</div>
						<div class="text">
						  <h6><a>{{ $KetQuaTranDauGanDay[1]->TenDayDu }}</a></h6>
						</div>
					  </div>
					</div>
				  </div>
				</section>
				@else
				<section class="ftb-resultbg">
					<div class="container">
					<div class="heading5">
					  <h4>Kết quả trận đấu <span>gần đây</span></h4>
					</div>
					<div class="alert alert-danger">Chưa có thông tin trận đấu tiếp theo.</div>
					</div>
				</section>
				@endif

				<!--// Football EVENT FIXTURE //-->
				<section>
				  <div class="container">
					<div class="row">
					  <!--// BLOG SLIDER //-->
					  <div class="col-md-4">
						<div class="heading6">
						  <h4>Tin tức <span>mới nhất</span></h4>
						</div>
						<div class="ftb-bx-slider">
						  <ul class="bxslider">

							<li>
							  <div class="ftb-post-thumb">
								<a href="tin-tuc/chi-tiet/{{ $TinTucMoiNhat->id }}"><img height="398" src="AdminAssets/img/photos/{{ $TinTucMoiNhat->Hinh }}" alt=""></a>
								<div class="text">
								  <h6>{{ $TinTucMoiNhat->TieuDe }}</h6>
								  <a class="btn-4" href="tin-tuc/chi-tiet/{{ $TinTucMoiNhat->id }}">Xem chi tiết</a>
								</div>
							  </div>
							</li>


						  </ul>
						</div>
					  </div>
					  <!--// BLOG SLIDER //-->
					  <!--// BLOG SLIDER //-->
					  <div class="col-md-4">
						<!--// HEADING 6 //-->
						<div class="heading6">
						  <h4>Tin<span> khác</span></h4>
						</div>
						
						@if (count($CacTinTucKhac) >= 2)
						@for ($i=0; $i<2; $i++)
							<div class="ftb-post-thumb">
							  <a href="tin-tuc/chi-tiet/{{ $CacTinTucKhac[$i]->id }}"><img src="AdminAssets/img/photos/{{ $CacTinTucKhac[$i]->Hinh }}"  alt="" height="180"></a>
							  <div class="text">
								<h6>{{ $CacTinTucKhac[$i]->TieuDe }}</h6>
							  </div>
							</div>
						@endfor
						@endif
			
					  </div>
					  <!--// BLOG SLIDER //-->
					  <div class="col-md-4">
						<!--// HEADING 6 //-->
						<div class="heading6">
						  <h4>Bảng xếp hạng<span></span></h4>
						</div>
						<!--// HEADING 6 //-->
						<!--// RATING TABLE //-->
						<ul class="ftb-rating-table">
						  
						  <?php $stt=0; ?>
						  @foreach ($BangXepHang as $bxh)
						  <li class="{{ $bxh->TenDayDu==='Liverpool'?'BangXepHangDoiBong':'' }}">
							<div class="ftb-position">
							  {{ ++$stt }} . 
							</div>
							<div class="ftb-team-name">
							  <img src="Client/images/logos/{{ $bxh->HinhAnhCauLacBo }}" alt="">
							  <a>{{ $bxh->TenDayDu }}</a>
							</div>
							<div class="ftb-team-points">
							  {{ $bxh->Diem }}
							</div>
						  </li>
						  @endforeach

						</ul>
						<!--// RATING TABLE //-->
					  </div>
					  <!--// BLOG SLIDER //-->
					</div>
					
				  </div>

				</section>

			
				@if(!empty($ThongKeMuaGiai))
				<div class="ftb-counterup">
				  <div class="container">
					<!--// HEADING 5 //-->
					<div class="heading5">
					  <h4>Thống kê mùa giải</h4>
					</div>
					<!--// HEADING 5 //-->
					<div class="row">
					  <!--// COUNTER //-->
					  <div class="col-md-3 col-sm-3">
						<div class="counterup-dec">
						  <span class="icon-football"></span>
						  <div class="text">
							<h3 class="word-count">{{ $ThongKeMuaGiai[0]->SoTran }}</h3>
							<p>Trận đã đấu</p>
						  </div>
						</div>
					  </div>
					  				
					  <div class="col-md-3 col-sm-3">
						<div class="counterup-dec">
						  <span class="icon-symbol"></span>
						  <div class="text">
							<h3 class="word-count">{{ $ThongKeMuaGiai[0]->SoTranThang }}</h3>
							<p>Trận thắng</p>
						  </div>
						</div>
					  </div>

					  <div class="col-md-3 col-sm-3">
						<div class="counterup-dec">
						  <span class="icon-soccer"></span>
						  <div class="text">
							<h3 class="word-count">{{ $ThongKeMuaGiai[0]->BanThang }}</h3>
							<p>Bàn thắng</p>
						  </div>
						</div>
					  </div>

					  <div class="col-md-3 col-sm-3">
						<div class="counterup-dec">
						  <span class="icon-soccer"></span>
						  <div class="text">
							<h3 class="word-count">{{ $ThongKeMuaGiai[0]->BanThua }}</h3>
							<p>Bàn thua</p>
						  </div>
						</div>
					  </div>
				
					</div>
				  </div>
				</div>
				@endif

				<section>
				  <div class="container">
					<!--// HEADING 5 //-->
					<div class="heading5 black">
					  <h4>Cầu thủ  <span>đội bóng</span></h4>
					</div>
					<!--// HEADING 5 //-->
					<div class="row">

					  <!--// FOOTBALL TEAM //-->
					  @foreach ($CauThuTrongDoi as $cauthu)
					  <div class="col-md-3 col-sm-6">
							<div class="ftb-team-thumb">
							  <figure><img height='250' src="Client/images/players/{{ $cauthu->nguoidung->HinhDaiDien }}" alt=""></figure>
							  <div class="ftb-team-dec">
								<span>07</span>
								<div class="text">
								  <a href="danh-sach-cau-thu/chi-tiet/{{ $cauthu->id }}">{{ $cauthu->nguoidung->HoTen }}</a>
								  <p>{{ $cauthu->ViTriSoTruong }}</p>
								</div>
								<a class="arrow-iconbtn" href="danh-sach-cau-thu/chi-tiet/{{ $cauthu->id }}"><i class="fa fa-arrow-right "></i></a>
							  </div>
							</div>
					  </div>
					  @endforeach
					  <!--// FOOTBALL TEAM //-->

					</div>
				  </div>
				</section>
				<!--// FOOTBALL TEAM SECTION //-->

				<!--// FOOTBALL LATEST NEWS SECTION //-->
				<div class="ftb-latestnew-wrap">
				  <div class="container">
					<div class="row">
					  <!--// FOOTBALL LATEST NEWS //-->
					  <div class="col-md-7">
						<!--// HEADING 5 //-->
						<div class="heading5 text-left">
						  <h4>Tin tức <span>Mới nhất</span></h4>
						</div>
						<!--// HEADING 5 //-->
						<div class="ftb-latestnew">
						  <figure><img height="500" src="AdminAssets/img/photos/{{ $TinTucMoiNhat->Hinh }}" alt=""></figure>
						  <div class="ftb-new-dec">
							<span>
							  <b>Tháng {{ date('m', strtotime($TinTucMoiNhat->NgayDang)) }}</b>
							  {{ date('d', strtotime($TinTucMoiNhat->NgayDang)) }}
							</span>
							<div class="text">
							  <h4 style="line-height: 1"><a href="tin-tuc/chi-tiet/{{ $TinTucMoiNhat->id }}">{{ $TinTucMoiNhat->TieuDe }}</a></h4>
							  <p>{!! $TinTucMoiNhat->TomTat !!}</p>
							  <a href="tin-tuc/chi-tiet/{{ $TinTucMoiNhat->id }}">Xem chi tiết</a>
							</div>
						  </div>
						</div>
					  </div>
					  <!--// FOOTBALL LATEST NEWS //-->
					  <!--// FOOTBALL LATEST NEWS //-->
					  <div class="col-md-5 ftb-latestnew2-wrap">
						<!--// HEADING 5 //-->
						<div class="heading5 text-left">
						  <a href="tin-tuc"><h4>Xem thêm <span>></span> </h4></a>
						</div>
						<!--// HEADING 5 //-->
						<!--// FOOTBALL LATEST NEWS //-->

						@foreach ($CacTinTucKhac as $tintuc)
						<div class="ftb-latestnew2">
						  <div class="ftb-new-dec">
							<figure><img height="140" src="AdminAssets/img/photos/{{ $tintuc->Hinh }}" alt=""></figure>
							<div class="text">
							  <h4><a href="tin-tuc/chi-tiet/{{ $tintuc->id }}">{{ $tintuc->TieuDe }}</a></h4>
							  <p>{!! $tintuc->TomTat !!}</p>
							  <a href="tin-tuc/chi-tiet/{{ $tintuc->id }}">Xem chi tiết</a>
							</div>
						  </div>
						</div>
						@endforeach

					  </div>
					  <!--// FOOTBALL LATEST NEWS //-->
					</div>
				  </div>
				</div>
@stop