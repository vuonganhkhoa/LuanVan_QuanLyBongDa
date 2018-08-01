@extends ('huanluyenvien.layouts.master')

@section ("title")
Liverpool FC - Thêm thông báo
@stop

@section ('style')
<style>
	.kode_player_item{
    	padding: 20px;
    	height: 180px;
    	display: block;
	}
	.HinhForm{
		text-align: right;
		margin-bottom: -33px;
		z-index: 0
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
                <li><a href="huan-luyen-vien/thong-bao">Danh sách thông báo</a></li>
				<li class="active">Thêm</li>
			</ul>
		</div>
	</div>
</div>

<div class="kode-content">
	<div class="ft-match-slider">

		<div class="kode_player_wraper">
			<div class="container">
				<div class="row">

					<div class="col-md-8 col-md-offset-2">
						<div class="kode_player_item">

							<form action="huan-luyen-vien/thong-bao/them" method="POST">
							{{ csrf_field() }}

								<div class="col-md-12">
									<div class="col-md-3">
										<label for="">Tiêu đề : </label>
									</div>
									<div class="col-md-9">
										<div class="kode_contant_field">
											<input type="text" placeholder="Tiêu đề" value="" name="TieuDe" required>
										</div>
									</div>
								</div>

								<div class="col-md-12">
									<div class="col-md-3">
										<label for="">Nội dung : </label>
									</div>
									<div class="col-md-9">
										<div class="kode_contant_area">
											<textarea name="NoiDung" placeholder="Nội dung thông báo" required></textarea>
										</div>
									</div>
								</div>

								<div class="col-md-12">
									<div class="kode_contant_area" style="text-align: right">
										<button type="submit">Lưu</button>
									</div>
								</div>
							</form>	

						</div>
					</div>

				</div>
			</div>
			<div class="HinhForm">
				<img height='300' src="./Client/images/Wallpaper2.jpg" alt="">
			</div>
		</div>

	</div>
</div>

@stop
