			
			<!--// Header //-->
			  <header class="football-header">
				<div class="topbar4">
				  <div class="container">

				  	<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
				  		<!--// TinTuc TICKER //-->
						<div class="spb-ticker spb-ticker2">
							<span>Tin mới nhất:</span>
							<ul class="top_slider_bxslider">

								@foreach ($tintuc as $tin)
								<li>
									<div class="ticker-dec">
										<a href="tin-tuc/chi-tiet/{{ $tin->id }}">{{ $tin->TieuDe }}</a>
									</div>
								</li>
								@endforeach

							</ul>
						</div>
						<!--// TinTuc TICKER //-->
					</div>
				  	
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<div class="login-wraper3">

							<ul class="login-meta">

								<li>
									<a type="button" class="btn btn-primary" href="dang-nhap">Đăng nhập</a>
								</li>

							</ul>

							{{-- Tìm kiếm --}}
						  <div id="show-class">
								<form action="./tim-kiem" method="GET">
									<input type="text" placeholder="Tìm kiếm" name="key">
								</form>
							</div>

						  <ul class="social-style3">
							  <li><a href="https://www.facebook.com/LiverpoolFC"><i class="fa fa-facebook"></i></a></li>
							  <li><a href="https://twitter.com/lfc"><i class="fa fa-twitter"></i></a></li>
							  <li><a href="https://www.linkedin.com/company/liverpool-football-club"> <i class="fa fa-linkedin"></i></a></li>
								<li>
									<a id="ftb_btn_link" >
										<i class="fa fa-search"></i>
									</a>
								</li>
						  </ul>
					  </div>
					</div>
				  </div>
				</div>
				<div class="logo-wrap2">
				  <div class="container">

					

					<!--// TinTuc TICKER //-->
					<div class="spb-ticker spb-ticker2">
						
					</div>
					<!--// TinTuc TICKER //-->
					
				  </div>
				</div>
				<div class="nav4">
				  <div class="container">
					<ul class="kode_nave">
						<li style="min-width: 200px"><div class="logo logo-3">
						  <a href="{{ route('Home') }}"><img width="120" height="120" src="Client/images/liverpool-logo.png" alt=""></a>
						</div></li>
						<li><a href="{{ route('Home') }}">Trang Chủ</a></li>
						<li><a href="./lich-su">Lịch sử</a></li>
						<li><a href="#">Lịch thi đấu & Kết quả</a>
							<ul>
								<li><a href="./lich-thi-dau">Lịch thi đấu</a></li>
								 <li><a href="./ket-qua">Kết quả</a></li>
							</ul>	  
						</li>
						<li><a href="#">Đội bóng</a>
							<ul>

								  <li><a href="./bang-xep-hang">Bảng xếp hạng</a></li>
								  <li><a href="./thong-ke-doi-bong">Thống kê đội bóng</a></li>
								  <li><a href="./danh-sach-cau-thu">Cầu thủ</a></li>	
								  		
							</ul>
						</li>
						<li><a href="./tin-tuc">Tin Tức</a></li>
						<li><a href="./lien-he">Liên hệ</a></li>
					</ul>

					<!--DL Menu Start-->
					<div id="kode-responsive-navigation" class="dl-menuwrapper">
					<button class="dl-trigger">Open Menu</button>
						<ul class="dl-menu">
							<li class="active"><a class="active" href="{{ route('Home') }}">Trang Chủ</a></li>
							<li class="menu-item kode-parent-menu"><a href="./lich-su">Lịch sử</a></li>
							<li class="menu-item kode-parent-menu"><a href="#">Lịch thi đấu & Kết quả</a>
								<ul class="dl-submenu">
									<li><a href="./lich-thi-dau">Lịch thi đấu</a></li>
									<li><a href="./ket-qua">Kết quả</a></li>
								</ul>
							</li>
							<li class="menu-item kode-parent-menu"><a href="#">Đội bóng</a>
								<ul class="dl-submenu">
									<li><a href="./bang-xep-hang">Bảng xếp hạng</a></li>
									<li><a href="./thong-ke-doi-bong">Thống kê đội bóng</a></li>
									<li><a href="./cau-thu">Cầu thủ</a></li>
								</ul>
							</li>
							<li class="menu-item kode-parent-menu"><a href="./tin-tuc">Tin tức</a></li>
							<li><a href="./lien-he">Liên hệ</a></li>
						</ul>
					</div>

				</div>
			  </header>
			  <!--// Header //-->