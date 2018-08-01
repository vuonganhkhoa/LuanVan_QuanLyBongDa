@extends ('cauthu.layouts.master')

@section ("title")
Liverpool FC - {{  $tenCauThu  }}
@stop

@section ('content')

@if (!empty($KetQuaTranDauGanDay))
<section class="ftb-resultbg" style="margin-top: 170px">
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