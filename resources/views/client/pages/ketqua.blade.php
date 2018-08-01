@extends ('client.layouts.master')

@section ('title', 'Liverpool FC - Kết quả')

@section ('content')

				<!--// KODE BENNER1 START //-->
				<div class="kode_benner1 bamnner2">
					<div class="kode_benner1_text">
						<h2>Kết quả trận đấu</h2>
					</div>
					<div class="kode_benner1_cols">
						<div class="container kf_container">
							<ul class="breadcrumb">
							  <li><a href="{{ route('Home') }}">Trang chủ</a></li>
							  <li class="active">Kết quả</li>
							</ul>
						</div>
					</div>
				</div>
				<!--// KODE BENNER1 END //-->
				<div class="kode_fixture_wraper">
					<div class="container">
						<div class="row">
							<div class="col-md-9">
								
								@for ($i=0;$i<count($CacTranDaDau); $i++)
								<section class="ftb-resultbg ftb_2 ftb_3">
									<div class="heading5 hdg_5 hdg_6">
									  <h4>Vòng {{ $CacTranDaDau[$i]->VongDau }}</h4>
									</div>
											<div class="ftb-result-wrap wrap_2">
											  <div class="ftb-result1">
												<div class="ftb-result-logo">
												  <a><img src="Client/images/logos/{{ $CacTranDaDau[$i]->HinhAnhCauLacBo_lon }}" alt=""></a>
												</div>
												<div class="text text_2 text-center">
												  <h6 class="text-center"><a>{{ $CacTranDaDau[$i]->TenDayDu }}</a></h6>
												</div>
											  </div>

											  <div class="ftb-final-result result_2">
												<em>{{ date('d/m/Y', strtotime($CacTranDaDau[$i]->NgayThiDau)) }} | {{ date('G:i', strtotime($CacTranDaDau[$i]->GioThiDau)) }} <i>{{ $CacTranDaDau[$i]->DiaDiem }}</i></em>
												<p><span class="{{ ($CacTranDaDau[$i]->TiSo>$CacTranDaDau[$i+1]->TiSo) ? 'grater' : '' }}">{{ $CacTranDaDau[$i]->TiSo }}</span> - <span class="{{ ($CacTranDaDau[$i]->TiSo<$CacTranDaDau[$i+1]->TiSo) ? 'grater' : '' }}">{{ $CacTranDaDau[$i+1]->TiSo }}</span></p>
											  </div>

											  <div class="ftb-result1 ftb-result2">
												<div class="ftb-result-logo">
												  <a><img src="Client/images/logos/{{ $CacTranDaDau[$i+1]->HinhAnhCauLacBo_lon }}" alt=""></a>
												</div>
												<div class="text text_2 text-center">
												  <h6 class="text-center"><a>{{ $CacTranDaDau[$i+1]->TenDayDu }}</a></h6>
												</div>
											  </div>
											</div>
								</section>
								<?php $i++ ?>
								@endfor

								<div class="kode_blog_pagination">
									
									{{ $CacTranDaDau->links() }}

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