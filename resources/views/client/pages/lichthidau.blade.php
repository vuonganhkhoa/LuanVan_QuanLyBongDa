@extends ('client.layouts.master')

@section ('title', 'Liverpool FC - Lịch thi đấu')

@section ('content')

				<!--// KODE BENNER1 START //-->
				<div class="kode_benner1 bamnner2">
					<div class="kode_benner1_text">
						<h2>Lịch thi đấu</h2>
					</div>
					<div class="kode_benner1_cols">
						<div class="container kf_container">
							<ul class="breadcrumb">
							  <li><a href="{{ route('Home') }}">Trang chủ</a></li>
							  <li class="active">Lịch thi đấu</li>
							</ul>
						</div>
					</div>
				</div>

				<!--// KODE BENNER1 END //-->
				<div class="kode_fixture_wraper">
					<div class="container">
						<div class="row">
							<div class="col-md-9">
								
								@if (!empty($TranDauTiepTheo))
								<div class="kode_ticket_sig_row">
									<ul>
										<li>
											<div class="kode_ticket_sig_fig text-center">
												<figure>
													<img src="Client/images/logos/{{ $TranDauTiepTheo[0]->HinhAnhCauLacBo_lon }}" alt="" height="120" style="width: 120px">
												</figure>
												<h4>{{ $TranDauTiepTheo[0]->TenDayDu }}</h4>
											</div>
										</li>
										<li>
											<div class="kode_ticket_sig_fig fig_2">
												<span>VS</span>
												<a><i class="fa fa-clock-o"></i>{{ date('G:i', strtotime($TranDauTiepTheo[0]->GioThiDau)) }}</a>
												<p>{{ $TranDauTiepTheo[0]->DiaDiem }}</p>
												<h4>{{ date('d/m/Y', strtotime($TranDauTiepTheo[0]->NgayThiDau)) }}</h4>
											</div>
										</li>
										<li>
											<div class="kode_ticket_sig_fig text-center">
												<figure >
													<img src="Client/images/logos/{{ $TranDauTiepTheo[1]->HinhAnhCauLacBo_lon }}" alt="" height="120" style="width: 120px; float:none">
												</figure>
												<h4 class="text-center">{{ $TranDauTiepTheo[1]->TenDayDu }}</h4>
											</div>
										</li>
									</ul>
								</div>
								@else
								<div class="kode_ticket_sig_row"><div class="alert alert-danger">Chưa có thông tin dữ liệu về trận đấu tiếp theo.</div></div>
								@endif
								
								<div class="ftb-tabs-wrap wrap_3">
									<div class="ftb_tabs_drop">
										<h5></h5>
									</div>
									  <!--// MAIN TABS TABLE //-->
									  <ul class="ftb-main-table table_2">
										
										@if (!empty($CacTranDauTiepTheo))
										@for ($i=0; $i<count($CacTranDauTiepTheo); $i++)
										<li>
										  <div class="ftb-date date_2">
											<span>{{ date('d/m/Y', strtotime($CacTranDauTiepTheo[$i]->NgayThiDau)) }}<sup> </sup> </span>
											<p>{{ date('G:i', strtotime($CacTranDauTiepTheo[$i]->GioThiDau)) }}</p>
										  </div>
										  <div class="ftb-compitatev tev_2">
											<div class="col-md-5 compitatev-team1">
											  <img src="Client/images/logos/{{ $CacTranDauTiepTheo[$i]->HinhAnhCauLacBo_lon }}" alt="">
											  <a >{{ $CacTranDauTiepTheo[$i]->TenDayDu }}</a>
											</div>
											<span>VS</span>
											<div class="col-md-5 compitatev-team1 compitatev-team2">
											 <a >{{ $CacTranDauTiepTheo[$i+1]->TenDayDu }}</a>
											  <img src="Client/images/logos/{{ $CacTranDauTiepTheo[$i+1]->HinhAnhCauLacBo_lon }}" alt="">
											</div>
										  </div>
										  <div class="ftb-venue venue_2"></div>
										</li>
										<?php $i++ ?>
										@endfor
										@endif
										
									  </ul>
									  <!--// MAIN TABS TABLE //-->  
								</div>	

								<div class="text-center">
									{{ $CacTranDauTiepTheo->links() }}
								</div>
							</div>

							
							<div class="col-md-3">
								<div class="kode_detail_side_bar">

									<form class="kode_detail_side_field" action="tim-kiem" method="GET">
										<input name="key" type="text" placeholder="Tìm kiếm" required>
										<button><i class="fa fa-search"></i></button>
									</form>

									<div class="ftb-fixture-row">
										<h5>Bảng xếp hạng</h5>
									  <!--// RATING TABLE //-->
										<ul class="ftb-rating-table rating_2">
										 
										  <?php  $i=0; ?>
										  @foreach ($BangXepHang as $bxh)
										  <li class="{{$bxh->TenDayDu=='Liverpool' ? 'BangXepHangDoiBong' : ''}}">
											<div class="ftb-position">
											  {{++$i}} . 
											</div>
											<div class="ftb-team-name">
											  <img src="Client/images/logos/{{ $bxh->HinhAnhCauLacBo }}" alt="">
											  <a style="font-size:14px">{{ $bxh->TenDayDu }}</a>
											</div>
											<div class="ftb-team-points">
											  {{ $bxh->Diem }}
											</div>
										  </li>
										  @endforeach

										</ul>
										<!--// RATING TABLE //-->
									</div>
	
								</div>
							</div>
						</div>
					</div>
				</div>	

@stop