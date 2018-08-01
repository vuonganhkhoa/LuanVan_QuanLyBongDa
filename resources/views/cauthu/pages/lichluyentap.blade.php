@extends ('cauthu.layouts.master')

@section ("title")
Liverpool FC - Lịch luyện tập
@stop

@section('style')
	<style>
		a{
			font-family: arial !important;
		}
		h1{
			font-family: arial !important;
			text-align: center;
			font-weight: bold;
			color: #fff;
		}
		.headerGiaoTrinh{
			background-color: #11181F;
			padding: 20px;
		}
		.panel-group{
			margin-top: 860px
		}
		.panel{
			max-width: 900px;
			margin: 0px auto;
			padding: 0px;	
		}
		.panel-default{
			border: 1px solid #F5F1F1 !important;
			box-shadow: 0 -1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24) !important;
		}
	</style>
@stop

@section ('content')

<div class="kode_benner1 bamnner2">
	<div class="kode_benner1_text">
		<h2>Lịch luyện tập</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="cau-thu/{{ Auth::user()->username }}">Trang chủ</a></li>
				<li class="active">Lịch luyện tập</li>
			</ul>
		</div>
	</div>
</div>

<div class="kode-content">

	<section>
		<div class="container" >

			<div class="ftb-tabs-wrap">
				<div class="tab-content">
					<div id="profileone">
						<div class="kode_calendar">	
							{!! $LichLuyenTap->calendar() !!}
						</div>
					</div>
				</div>
			</div>

			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="headerGiaoTrinh"><h1>Danh sách giáo trình tập</h1></div>
						<hr>
						@foreach($GiaoTrinhTap as $giaotrinh)
							<div class="col-md-6">
								<a  	 data-placement="top"
										 title="Xem chi tiết" 
										 style="font-size:16px" 
										 class="btn btn-link" 
										 data-title="Edit" 
										 data-toggle="modal" 
										 data-target="#GiaoTrinhModal{{ $giaotrinh->id }}" 
										 href="#GiaoTrinhModal{{ $giaotrinh->id }}" 
								>
								{{ $giaotrinh->TenBaiTap }}
								</a><br>
							</div>
							<div class="modal fade" id="GiaoTrinhModal{{ $giaotrinh->id }}" tabindex="-1" role="dialog" aria-labelledby="GiaoTrinhModal" aria-hidden="true">
									<div class="modal-dialog" style="width:1000px !important">
										<div class="modal-content" >
											<div class="modal-header">
											<h4  style="font-family:'arial';color:red; font-style: bold" class=" text-center modal-title custom_align" id="Heading">{{$giaotrinh->TenBaiTap}}</h4>
												<p class="text-center"></p>
											</div>
											<div class="modal-body" >
							
												<div class="row">
													<div class="col-md-12">
														<p>{!! $giaotrinh->NoiDungBaiTap !!}</p>
													</div>
												</div>
							
											</div>

										</div>

									</div>
								</div>
						@endforeach
					</div>
				</div>
			</div>

		</div>
	</section>
	
	<?php $stt=0; ?>
	@foreach ($NgayCauThuTap as $NgayTap)
	<div class="modal fade" id="LichModal{{ $NgayTap->id }}" tabindex="-1" role="dialog" aria-labelledby="LichModal" aria-hidden="true">
		<div class="modal-dialog" style="max-width:460px;">
			<div class="modal-content">
				<div class="modal-header">
					<h4  style="font-family:'arial';color:red; font-style: bold" class=" text-center modal-title custom_align" id="Heading">Lịch luyện tập </h4>
					<p class="text-center">{{ $NgayTap->CaLuyenTap }} - {{ date('d/m/Y', strtotime($NgayTap->NgayLuyenTap)) }}</p>
				</div>
				<div class="modal-body">

					<div class="row">
						<div class="col-md-12">
							<h4 style="font-family:'arial'; font-style: bold; margin-bottom: 10px">Các bài tập: </h4>
						</div>
						<br>
						@foreach ($NoiDungLuyenTap[$stt] as $BaiTap)
						<div class="col-md-12">
							<p>{{ $BaiTap->TenBaiTap  }}</p>
						</div>
						@endforeach
					</div>

				</div>
				<div class="modal-footer ">
					<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> OK!</button>
				</div>
			</div>
			<!-- /.modal-content --> 
		</div>
		<!-- /.modal-dialog --> 
	</div>
	<?php ++$stt; ?>
	@endforeach

</div>
@stop

@section('script')
{!! $LichLuyenTap->script() !!}
@stop