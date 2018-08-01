<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<!--logo -->
				<div class="logo">
					<a href="#">
						<h1>Liverpool FC</h1>
						<span>
							@if(Auth::user()->ChucVu == 'admin')
								{{'Admin'}}
							@endif
							@if(Auth::user()->ChucVu == 'nhanvienyte')
								{{'Nhân viên y tế'}}
							@endif
						</span>
					</a>
				</div>
				<!--//logo-->
				<!--search-box-->
				<!-- <div class="search-box">
					<form class="input">
						<input class="sb-search-input input__field--madoka" placeholder="Tìm kiếm..." type="search" id="input-31" />
						<label class="input__label" for="input-31">
							<svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
								<path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
							</svg>
						</label>
					</form>
				</div> --><!--//end-search-box-->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				<!--notification menu end -->
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><img height="50" src="Client/images/players/{{Auth::user()->HinhDaiDien}}" alt=""> </span></span> 
									<div class="user-name">
										<p>{{Auth::user()->HoTen}}</p>
										<span>
											@if(Auth::user()->ChucVu == 'admin')
												{{'Admin'}}
											@endif
											@if(Auth::user()->ChucVu == 'nhanvienyte')
												{{'Nhân viên y tế'}}
											@endif
										</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="{{ route('TrangChu_NhanVienYTe') }}"><i class="fa fa-user"></i> Trang cá nhân</a> </li> 
								<li> <a href="{{ route('Logout') }}"><i class="fa fa-sign-out"></i> Đăng xuất</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>	
			</div>
			<div class="clearfix"> </div>	
		</div>