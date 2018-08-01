@extends ('client.layouts.master')

@section ('title' , 'Liverpool FC - Tin tức')

@section ('content')

				<!--// KODE BENNER1 START //-->
				<div class="kode_benner1">
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
				<!--// KODE BENNER1 END //-->
				
				<!--// KODE BLOG WRAPER START //-->
				<div class="kode_blog_wraper">
					<div class="container">
						<div class="row">


							<div class="col-md-9">
								<div class="kode_detail_row">

									<!-- KODE DETAIL FIG START -->
									@foreach ($TinTuc as $tintuc)
									<div class="kode_detail_fig side_2">
										<div class="kode-flicker-slide">
											<div>
												<figure>
													<img height="300" src="AdminAssets/img/photos/{{ $tintuc->Hinh }}" alt="">
												</figure>
											</div>
										</div>	
										<div class="kode_detail_admin">
											<div class="title_2"><span><strong>{{ date('d/m/Y', strtotime($tintuc->NgayDang)) }}</strong></span></div><br><br>
											<div class="title_2">
												<h2><a href="tin-tuc/chi-tiet/{{ $tintuc->id }}">{!! $tintuc->TieuDe !!}</a></h2>

											</div>
										</div>
										<div class="kode_detail_text p_2">
											<p>{!! $tintuc->TomTat !!}</p>
											<a href="tin-tuc/chi-tiet/{{ $tintuc->id }}">Xem chi tiết</a>
										</div>
									</div>
									@endforeach
									<!-- KODE DETAIL FIG END -->

									<div class="text-center">
										{{ $TinTuc->links() }}
									</div>
																	

								</div>
							</div>
						</div>
					</div>
				</div>
				<!--// KODE BLOG WRAPER END //-->
@stop