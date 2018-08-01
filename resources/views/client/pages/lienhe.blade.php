@extends ('client.layouts.master')

@section ('title' , 'Liverpool FC - Liên hệ')

@section ('content')

<!--// KODE BENNER1 START //-->
				<div class="kode_benner1 bamnner2">
					<div class="kode_benner1_text">
						<h2>Liên hệ</h2>
					</div>
					<div class="kode_benner1_cols">
						<div class="container kf_container">
							<ul class="breadcrumb">
							  <li><a href="{{ route('Home') }}">Trang chủ</a></li>
							  <li class="active">Liên hệ</li>
							</ul>
						</div>
					</div>
				</div>
				<!--// KODE BENNER1 END //-->
				
				<!--// KODE CONTACT MAPP START //-->
				<div class="kode_contact_mapp">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6394.988804740846!2d-2.9557523206362846!3d53.43205886424895!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x84576a57e21973ff!2zU8OibiB24bqtbiDEkeG7mW5nIEFuZmllbGQ!5e0!3m2!1svi!2s!4v1527155750106" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
				<!--// KODE CONTACT MAPP END //-->

				<div class="kode_contect_office">
					<div class="container">
						<div class="row">

							<div class="col-md-6 col-sm-9">
								<div class="kode_contact_office_list">
									<h2>Sân vận động Anfield</h2>
									<div class="kode_contact_office_des">
										<i class="fa fa-map-marker"></i>
										<div class="kode_contact_txet">
											<p><span>Anfield Road, Liverpool L4 0TH, </span> 
												 Vương Quốc Anh </p>
										</div>
									</div>
									<div class="kode_contact_office_des">
										<i class="fa fa-phone"></i>
										<div class="kode_contact_txet">
											<a href="#"> 0151 - 907 - 9500</a>
											<a href="#"> 0151 - 260 - 6677</a>
										</div>
									</div>
									<div class="kode_contact_office_des">
										<i class="fa fa-paper-plane"></i>
										<div class="kode_contact_txet">
											<a href="#">anfieldofficial@gmail.com</a>
											<a href="#">anfieldofficial@outlook.com</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-9">
								<div class="kode_contact_office_list">
									<h2>Office Liverpool </h2>
									<div class="kode_contact_office_des">
										<i class="fa fa-map-marker"></i>
										<div class="kode_contact_txet">
											<p><span>South John Street 
											Liverpool L1 8BU </span> 
												LONDON U.K </p>
										</div>
									</div>
									<div class="kode_contact_office_des">
										<i class="fa fa-phone"></i>
										<div class="kode_contact_txet">
											<a href="#">0151 - 707 - 9994</a>
											<a href="#">92 - 336 - 3524102</a>
										</div>
									</div>
									<div class="kode_contact_office_des">
										<i class="fa fa-paper-plane"></i>
										<div class="kode_contact_txet">
											<a href="#">liverpoolfc@gmail.com</a>
											<a href="#">liverpoolfc@outlook.com</a>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
				<!--// KODE CONTACT FORM START//-->
				<div class="kode_contact_form">
					<div class="container">
						<div class="kode_contact_form_hdg">
							<h2 style="margin-top:20px;">Liên hệ</h2>
							<p>Nếu bạn có thắc mắc thì liên hệ với chúng tôi.</p>
						</div>
						<div class="row">


							<form action="./lien-he" method="POST">
								{{ csrf_field() }}
								<div class="col-md-4">
									<div class="kode_contant_field">
										<input type="text" placeholder="Tên của bạn" name="HoTen" required>
										@if ($errors->has('HoTen'))
										<span class="help-block"><strong style="color:#E01A22">{{ $errors->first('HoTen') }}</strong></span>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="kode_contant_field">
										<input type="text" placeholder="Địa chỉ email" name="Email" required>
										@if ($errors->has('Email'))
										<span class="help-block"><strong style="color:#E01A22">{{ $errors->first('Email') }}</strong></span>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="kode_contant_field">
										<input type="text" placeholder="Số điện thoại" name="SoDienThoai" required>
										@if ($errors->has('SoDienThoai'))
										<span class="help-block"><strong style="color:#E01A22">{{ $errors->first('SoDienThoai') }}</strong></span>
										@endif
									</div>
								</div>
								<div class="col-md-12">
									<div class="kode_contant_area">
										<textarea name="ThongTinLienHe" placeholder="Nội dung liên hệ" required></textarea>
										<button>Gửi </button>
									</div>
								</div>
							</form>


						</div>
					</div>
				</div>
				<!--// KODE CONTACT FORM END//-->
				
				<!--// KODE CONTACT SOCIAL START//-->
				<div class="kode_contact_social">
					<div class="container">
						<ul class="kode_contact_icon">
							<li><a href="https://www.facebook.com/LiverpoolFC"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://twitter.com/lfc"><i class="fa fa-twitter"></i></a></li>
							<li><a href="https://www.linkedin.com/company/liverpool-football-club"> <i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
				<!--// KODE CONTACT SOCIAL END//-->

@stop