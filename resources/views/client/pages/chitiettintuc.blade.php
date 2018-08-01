@extends ('client.layouts.master')

@section ('title', 'Liverpool FC - Chi tiết tin tức')

@section ('content')

<!--// KODE BENNER1 START //-->
<div class="kode_benner1 bamnner2">
	<div class="kode_benner1_text">
		<h2>Tin tức</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="{{ route('Home') }}">Trang chủ</a></li>
				<li class="active">Tin tức</li>
			</ul>
		</div>
	</div>
</div>

<div class="kode_blog_wraper">
	<div class="container">
		<div class="row">

			<div class="col-md-9">
				<div class="kode_detail_row">
					<!-- KODE DETAIL FIG START -->
					<div class="kode_detail_fig">
						<figure>
							<img src="AdminAssets/img/photos/{{ $TinTuc->Hinh }}" alt="">
						</figure>
						<div class="kode_detail_admin">
							<div class="title_2"><span><strong>{{ date('d/m/Y', strtotime($TinTuc->NgayDang)) }}</strong></span></div><br><br>
											<div class="title_2">
												<h2><a href="tin-tuc/chi-tiet/{{ $TinTuc->id }}">{!! $TinTuc->TieuDe !!}</a></h2>

											</div>
						</div>
						<div class="kode_detail_text">
							{!! $TinTuc->TomTat !!}
						</div>
					</div>

					<div class="kode_detail_caption">
						{!! $TinTuc->NoiDung !!}
					</div>
	
					<div class="kode_detail_post">
						<div class="kode_detail_share">
							<h5><a href="#"><i class="fa fa-share-alt"></i></a>Chia sẻ</h5>
							<ul>
								  <li><a href="https://www.facebook.com/LiverpoolFC"> <i class="fa fa-facebook"></i></a></li>
								  <li><a href="https://twitter.com/lfc"> <i class="fa fa-twitter"></i></a></li>
								  <li><a href="https://www.linkedin.com/company/liverpool-football-club"> <i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

@stop