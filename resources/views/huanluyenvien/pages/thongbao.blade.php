@extends ('huanluyenvien.layouts.master')

@section ("title")
Liverpool FC - Thông báo
@stop

@section ('style')
<style>
body{
	background-color: #F1F1F1;
}

#page-wrapper {
	padding: 0em 2em 2.5em;
	transition: .5s all;
	-webkit-transition: .5s all;
	-moz-transition: .5s all;
}
.widget-shadow {
	background-color: #fff;
	box-shadow: 0 -1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);
	-webkit-box-shadow: 0 -1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);
	-moz-box-shadow: 0 -1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);
}
.inbox-page {
	width: 80%;
	margin: 0 auto;
}
.inbox-row {
	padding: 0.5em 1em;
}
.inbox-page h4 {
	font-size: 1.2em;
	color: #A2A0A0;
	margin-bottom: 1em;
}
.mail {
	float: left;
	margin-right: 1em;
}
.mail.mail-name {
	width: 27%;
}
.mail-right {
	float: right;
	margin-left: 1.5em;
}
.mail-right a{
	color: black;
}
.mail-right a:hover{
	color: red;
}
.inbox-page h6 {
	font-size: 1em;
	color: #555;
}
.inbox-page input.checkbox {
	margin: 13px 0 0;
}
.inbox-page img {
	width: 100%;
	vertical-align: bottom;
}
.inbox-page p {
	font-size: 1em;
	color: #000;
	line-height: 2em;
}
.inbox-page h6 {
	font-size: 1em;
	color: #555;
	line-height: 2em;
}
.inbox-page ul.dropdown-menu {
	padding: 5px 0;
	min-width: 105px;
	top: 0;
	left: -110px;
}
.inbox-page .dropdown-menu > li > a {
	padding: 4px 15px;
	font-size: 0.9em;
}
.inbox-page .dropdown-menu > li > a:hover, .inbox-page .dropdown-menu > li > a:focus {
	color: #e94e02;
}
.mail-icon {
	margin-right: 7px;
}
.inbox-page.row {
	margin-top: 2em;
}
.inbox-page .checkbox {
	position: relative;
	top: -3px;
	margin: 0 1rem 0 0;
	cursor: pointer;
}
.inbox-page .checkbox:before {
	-webkit-transition: all 0.3s ease-in-out;
	-moz-transition: all 0.3s ease-in-out;
	transition: all 0.3s ease-in-out;
	content: "";
	position: absolute;
	left: 0;
	z-index: 1;
	width: 15px;
	height: 15px;
	border: 1px solid #A0A0A0;
}
.inbox-page .checkbox:after {
	content: "";
	position: absolute;
	top: -0.125rem;
	left: 0;
	width: 1.1rem;
	height: 1.1rem;
	background: #fff;
	cursor: pointer;
}
.inbox-page .checkbox:checked:before {
	-webkit-transform: rotate(-45deg);
	-moz-transform: rotate(-45deg);
	-ms-transform: rotate(-45deg);
	-o-transform: rotate(-45deg);
	transform: rotate(-45deg);
	height: .4rem;
	width: .8rem;
	border-color: #4F52BA;
	border-top-style: none;
	border-right-style: none;
	border-width: 2px;
}
.mail-body {
	padding: 1em 2em;
	border: 1px solid #D4D4D4;
	margin: 10px 0;
	transition: .5s all;
}
.mail-body p{
	font-size: 0.9em;
	line-height: 1.8em;
}
.mail-body input[type="text"]{
	width: 100%;
	border: none;
	border-bottom: 1px solid #F5F5F5;
	padding: 1em 0;
	outline:none;
	transition:.5s all;
	-webkit-transition:.5s all;
	-moz-transition:.5s all;
	font-size:1em;
}
.mail-body input[type="text"]:focus{
	padding: 2em 0;
	border-bottom: 1px solid #C7C5C5;
}
.mail-body input[type="submit"] {
	border: none;
	background: none;
	font-size: 1em;
	margin-top: 0.5em;
	color: #4F52BA;
	outline:none;
	font-weight: 600;
}

@media (max-width: 1024px) {
	.kode_player_item{
		height: 165px;
	}
	.kode_contant_area{
		margin-top: -40px;
	}
}
</style>
@endsection

@section ('content')

<div class="kode_benner1 bamnner2">
	<div class="kode_benner1_text">
		<h2>Thông báo</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="huan-luyen-vien">Trang chủ</a></li>
				<li class="active">Thông báo</li>
			</ul>
		</div>
	</div>
</div>

<div class="kode-content">
	<div class="ft-match-slider">
		<div class="kode_player_wraper">
			<div id="page-wrapper">
				<div class="main-page">

					<div class="inbox-page">

						@if (session('thongbao'))
						<div class="alert alert-success">{{ session('thongbao') }}</div>
						@endif
						@if (session('loi'))
						<div class="alert alert-danger">{{ session('loi') }}</div>
						@endif

						<h4 class="text-right"><a class="btn btn-success" href="huan-luyen-vien/thong-bao/them">Thêm thông báo</a></h4>
						
						@foreach ($ThongBao as $thongbao)
						<div class="inbox-row widget-shadow" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="mail"><img style="height:30px; width:30px" src="./../Client/images/players/{{$thongbao->NguoiDung->HinhDaiDien}}" alt=""/></div>
							<div class="mail mail-name"> <h6>{{ $thongbao->NguoiDung->HoTen }}</h6> </div>
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $thongbao->id }}" aria-expanded="true" aria-controls="collapse{{ $thongbao->id }}">
								<div class="mail"><p>{{ $thongbao->TieuDe }}</p></div>
							</a>
							<div class="mail-right"><p><a href="huan-luyen-vien/thong-bao/xoa/{{$thongbao->id}}" onClick="return XacNhanXoa('Bạn có chắc muốn xóa thông báo này?')"><i class="fa fa-trash-o"></i></a></p></div>
							<div class="mail-right"><p><a href="huan-luyen-vien/thong-bao/sua/{{$thongbao->id}}"><i class="fa fa-edit"></i></a></p></div>
							<div class="mail-right"><p>{{date('d/m/Y', strtotime($thongbao->NgayThongBao))}}</p></div>
							<div class="clearfix"> </div>
							<div id="collapse{{ $thongbao->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="mail-body">
									<p>{{ $thongbao->NoiDung }}</p>
								</div>
							</div>
						</div>
						@endforeach

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@section('script')
	<script type="text/javascript">
		function XacNhanXoa(message){
			if(window.confirm(message)){
				return true;
			}
			return false;
		}
		$(document).ready(function() {

			$('div.alert').delay(5000).slideUp();
			
		})
	</script>
@stop