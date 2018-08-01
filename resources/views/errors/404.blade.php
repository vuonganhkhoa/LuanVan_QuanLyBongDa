@extends ('client.layouts.master')

@section ('title', 'Liverpool FC - Không có trang này')

@section ('content')

			<div class="kode-wrapper wrap_2 wrap_3">
				<!--// Header //-->
				<div class="kode_404_wraper wrap_3">
					<div class="container">
						<div class="kode_404_text text_3">
							<figure>
								<img src="Client/images/liverpool-logo.png" alt="image">
							</figure>
							<h2><span>4</span><img class="fa-spin" src="Client/images/4043.png" alt=""><span>4</span></h2>
							<a href="{{ route('Home') }}">Trở về trang chủ</a>

							<ul class="kode_4043_icon">
								<li><a href="https://www.facebook.com/LiverpoolFC"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/lfc"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com/company/liverpool-football-club"> <i class="fa fa-linkedin"></i></a></li>
							</ul>

						</div>
					</div>
				</div>
			</div>

@stop