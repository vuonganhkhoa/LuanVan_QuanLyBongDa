			
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

							<a type="button" class="btn btn-primary" href="{{ route('Logout') }}">Đăng xuất</a>

						</li>

					</ul>

					<div id="show-class"><form><input type="text" placeholder="Tìm kiếm"></form></div>
					<ul class="social-style3">
						<li><a href="https://www.facebook.com/LiverpoolFC"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://twitter.com/lfc"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://www.linkedin.com/company/liverpool-football-club"> <i class="fa fa-linkedin"></i></a></li>
						<li><a id="ftb_btn_link" ><i class="fa fa-search"></i></a></li>
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
				<li><a href="./huan-luyen-vien">Trang Chủ</a></li>
				<li><a href="#">Quản lý luyện tập</a>
					<ul>
						<li><a href="huan-luyen-vien/lich-luyen-tap">Lịch luyện tập</a></li>
						<li><a href="huan-luyen-vien/giao-trinh-tap">Giáo trình tập</a></li>
					</ul>	
				</li>
				<li><a href="#">Quản lý trận đấu</a>
					<ul>
						<li><a href="huan-luyen-vien/doi-hinh-chien-thuat">Đội hình chiến thuật</a></li>
						<li><a href="huan-luyen-vien/doi-hinh">Quản lý đội hình</a></li>
						<li><a href="huan-luyen-vien/chien-thuat">Quản lý chiến thuật</a></li>
					</ul>	
				</li>
				<li><a href="#">Quản lý cầu thủ</a>
					<ul>
						<li><a href="huan-luyen-vien/suc-khoe-cau-thu">Tình hình cầu thủ</a></li>
						<li><a href="huan-luyen-vien/vai-tro-cau-thu">Vai trò cầu thủ</a></li>
						<li><a href="huan-luyen-vien/vi-tri-cau-thu">Vị trí cầu thủ</a></li>
						<li><a href="huan-luyen-vien/ky-nang-cau-thu">Kỹ năng cầu thủ</a></li>
					</ul>	
				</li>
				<li><a href="#">Danh mục</a>
					<ul>
						<li><a href="huan-luyen-vien/thong-tin-ca-nhan">Thông tin cá nhân</a></li>
						<li><a href="huan-luyen-vien/thong-bao">Thông báo</a></li>
						<li><a href="huan-luyen-vien/lich-thi-dau">Lịch thi đấu</a></li>
						<li><a href="huan-luyen-vien/ket-qua">Kết quả</a></li>
					</ul>	
				</li>
			</ul>

			<!--DL Menu Start-->
			<div id="kode-responsive-navigation" class="dl-menuwrapper">
				<button class="dl-trigger">Open Menu</button>
				<ul class="dl-menu">
					<li class="active"><a class="active" href="./huan-luyen-vien">Trang Chủ</a></li>
					<li class="menu-item kode-parent-menu"><a href="#">Quản lý luyện tập</a>
						<ul class="dl-submenu">
							<li><a href="huan-luyen-vien/lich-luyen-tap">Lịch luyện tập</a></li>
							<li><a href="huan-luyen-vien/giao-trinh-tap">Giáo trình tập</a></li>
						</ul>	
					</li>
					<li class="menu-item kode-parent-menu"><a href="#">Quản lý trận đấu</a>
						<ul class="dl-submenu">
							<li><a href="huan-luyen-vien/doi-hinh-chien-thuat">Đội hình chiến thuật</a></li>
							<li><a href="huan-luyen-vien/doi-hinh">Quản lý đội hình</a></li>
							<li><a href="huan-luyen-vien/chien-thuat">Quản lý chiến thuật</a></li>
						</ul>	
					</li>
					<li class="menu-item kode-parent-menu"><a href="#">Quản lý cầu thủ</a>
						<ul class="dl-submenu">
							<li><a href="huan-luyen-vien/suc-khoe-cau-thu">Tình hình cầu thủ</a></li>
							<li><a href="huan-luyen-vien/vai-tro-cau-thu">Vai trò cầu thủ</a></li>
							<li><a href="huan-luyen-vien/vi-tri-cau-thu">Vị trí cầu thủ</a></li>
							<li><a href="huan-luyen-vien/ky-nang-cau-thu">Kỹ năng cầu thủ</a></li>
						</ul>
					</li>
					<li class="menu-item kode-parent-menu"><a href="#">Danh mục</a>
						<ul class="dl-submenu">
							<li><a href="huan-luyen-vien/thong-tin-ca-nhan">Thông tin cá nhân</a></li>
							<li><a href="huan-luyen-vien/thong-bao">Thông báo</a></li>
							<li><a href="huan-luyen-vien/lich-thi-dau">Lịch thi đấu</a></li>
							<li><a href="huan-luyen-vien/ket-qua">Kết quả</a></li>
						</ul>
					</li>
				</ul>
			</div>

		</div>
	</header>
			  <!--// Header //-->