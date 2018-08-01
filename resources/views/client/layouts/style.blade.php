
	<head>

			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
			<title>@yield ('title')</title>
			<base href="{{ asset('') }}">
			<!--BOOTSTRAP CSS-->
			<link href="Client/css/bootstrap.css" rel="stylesheet">
			<!--SLICK SLIDER CSS-->
			<link rel="stylesheet" type="text/css" href="Client/slick/slick-theme.css"/>
			<link rel="stylesheet" type="text/css" href="Client/slick/slick.css"/>
			<!--BX SLIDER CSS-->
			<link rel="stylesheet" href="Client/css/jquery.bxslider.css">
			<!--OWL SLIDER CSS-->
			<link href="Client/css/owl.carousel.css" rel="stylesheet">
			<!--FLEX SLIDER CSS-->
			<link href="Client/css/flexslider.css" rel="stylesheet">
			<!--component CSS-->
			<link href="Client/css/component.css" rel="stylesheet">
			<!--PRETTY PHOTO CSS-->
			<link href="Client/css/prettyphoto.css" rel="stylesheet">
			<!--ICONS CSS-->
			<link href="Client/css/font-awesome.css" rel="stylesheet">
			<link href="Client/svg-icon.css" rel="stylesheet">
			<!--THEME TYPO CSS-->
			<link href="Client/css/themetypo.css" rel="stylesheet">
			<link href='Client/css/fullcalendar.css' rel='stylesheet' />
			<!--WIDGET CSS-->
			<link rel="stylesheet" href="Client/css/widget.css">
			<!--CUSTOM STYLE CSS-->
			<link rel="stylesheet" href="Client/style.css">
			<!--component CSS-->
			<link href="Client/css/component.css" rel="stylesheet">
			<!--COLOR CSS-->
			<link rel="stylesheet" href="Client/css/color.css">
			<link type='image/x-icon' href='Client/images/favicon.ico' rel='shortcut icon' />
			<!--RESPONCIVE CSS-->
			<link rel="stylesheet" href="Client/css/responsive.css">
			<script src="Client/js/jquery.js"></script>
			@yield ('style')

	</head>

		  <!-- Modal -->
		  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header thbg-color">
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <h4 class="modal-title">Đăng nhập</h4>
				</div>
				<div class="modal-body">
				  <form class="kode-loginform">
					<p><span>Tên đăng nhập</span> <input type="text" placeholder="Username"></p>
					<p><span>Mật khẩu</span> <input type="password" placeholder="Password"></p>
				  </form>
				</div>
			  </div>
			</div>
		  </div>

		  <!-- <div class="modal fade" id="myModalTwo" tabindex="-1" role="dialog" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header thbg-color">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Đăng ký</h4>
				  </div>
				  <div class="modal-body">
					<form class="kode-loginform">
					  <p><span>Email</span> <input type="text" placeholder="Email"></p>
					  <p><span>Mật khẩu</span> <input type="password" placeholder="Password"></p>
					  <p><span>Nhập lại mật khẩu</span> <input type="password" placeholder="RetypePassword"></p>
					</form>
				  </div>
				</div>
			  </div>
		  </div> -->