@extends ('huanluyenvien.layouts.master')

@section ("title")
Liverpool FC - Thêm cầu thủ luyện tập
@stop

@section ('style')
<style>
.panel{
	max-width: 100%;
	margin: 0px auto;
	padding: 0px;	
}
.panel-default{
	border: 1px solid #F5F1F1 !important;
	box-shadow: 0 -1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24) !important;
}
.panel-body{
	margin: 15px;
}
.panel-default > .panel-heading {
    color: white;
    background-color: #1a1a1a;
    border-color: #ddd;
}
</style>
@stop

@section ('content')

<div class="kode_benner1 bamnner2">
	<div class="kode_benner1_text">
		<h2>Thêm cầu thủ luyện tập</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="huan-luyen-vien">Trang chủ</a></li>
				<li><a href="huan-luyen-vien/lich-luyen-tap">Lịch luyện tập</a></li>
				<li class="active">Thêm cầu thủ tập</li>
			</ul>
		</div>
	</div>
</div>

<div class="kode-content">

	<section>
		<div class="container">
			
			<form class="form-horizontal" method="POST" action="huan-luyen-vien/lich-luyen-tap/them-cau-thu-tap">
				{{ csrf_field() }}

				@if (session('thongbao'))
				<div class="alert alert-success">{{ session('thongbao') }}</div>
				@endif
				@if (session('loi'))
				<div class="alert alert-danger">{{ session('loi') }}</div>
				@endif

				<div class="panel-group">
					<div class="panel panel-default">
						<div class="panel-body">
							
							<div class="col-md-4 col-sm-4">
								<div class="panel-group" >
									<div class="panel panel-default">
										<div class="panel-heading">Chọn ngày tập, ca tập</div>
										<div class="panel-body">
											<div class="form-group {{ $errors->has('NgayLuyenTap') ? 'has-error' : '' }}">
												<select name="NgayLuyenTap">
													@foreach ($NgayLuyenTap as $ngay)
													<option value="{{ $ngay->id }}">Ngày: {{ date('d/m/Y', strtotime($ngay->NgayLuyenTap)) }} - {{ $ngay->CaLuyenTap }}</option>
													@endforeach
												</select>
												@if ($errors->has('NgayLuyenTap'))
												<span class="help-block"><strong style="color:#E01A22">{{ $errors->first('NgayLuyenTap') }}</strong></span>
												@endif
											</div>
										</div>
									</div>
								</div>
								<div class="panel-group">
									<div class="panel panel-default">
										<div class="panel-heading">Chọn các cầu thủ luyện tập</div>
										<div class="panel-body">
											<div class="form-group {{ $errors->has('CauThuTap') ? 'has-error' : '' }}">
												<select name="CauThuTap[]" multiple size="20" style="height: 100%;">
													<option selected value="TatCaCauThu">{{ '-- Chọn tất cả cầu thủ --' }}</option>
													@foreach ($CauThuTap as $cauthu)
													<option value="{{ $cauthu->id }}">{{ $cauthu->HoTen }} &nbsp; - &nbsp; {{ $cauthu->ViTriSoTruong }}</option>
													@endforeach
												</select>
												@if ($errors->has('CauThuTap'))
												<span class="help-block"><strong style="color:#E01A22">{{ $errors->first('CauThuTap') }}</strong></span>
												@endif
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-8 col-sm-8">
								<div class="panel-group">
									<div class="panel panel-default">
										<div class="panel-heading">Chọn giáo trình tập ( Thời lượng tối đa cho 1 ca tập là 180 phút)<span id="KetQuaChonGiaoTrinhTap" style="float:right; color:#05c605;  font-weight:bold">0 phút</span></div>
										<div class="panel-body">
											<div class="form-group {{ $errors->has('GiaoTrinhTap') ? 'has-error' : '' }}">
												@foreach ($GiaoTrinhTap as $giaotrinh)
												<div class="col-md-6">
													<label style=" display: inline-block; font-size: 14px"><input type="checkbox" name="GiaoTrinhTap[]" value="{{ $giaotrinh->id }}" data="{{ $giaotrinh->ThoiLuongTapToiDa }}"> {{ $giaotrinh->TenBaiTap }} ( {{ $giaotrinh->ThoiLuongTapToiDa }} phút)</label><br>
												</div>
												@endforeach
											</div>
											@if ($errors->has('GiaoTrinhTap'))
											<span class="help-block"><strong style="color:#E01A22">{{ $errors->first('GiaoTrinhTap') }}</strong></span>
											@endif
										</div>
									</div>
								</div>
							</div>
							
							
						</div>

						<div class="form-group"> 
							<div class="text-right" style="margin: -25px 60px 0px 0px;">
								<button type="reset" class="btn btn-danger">Chọn lại</button>
								<button type="submit" class="btn btn-success">Thêm cầu thủ luyện tập</button>
							</div>
						</div>

					</div>
				</div>
			</div>	

		</form>

	</div>
</section>
</div>
@stop

@section('script')
<script type="text/javascript">

	var TongThoiLuongTap = 0;
	$(document).ready(function() {

		$('input[type="checkbox"]').click(function() {
		    if ($(this).is(':checked')) {
	        	TongThoiLuongTap = TongThoiLuongTap + parseInt($(this).attr('data'));
				if(TongThoiLuongTap > 180) {
					document.getElementById('KetQuaChonGiaoTrinhTap').style.color = "#ff0202";
				}
				else{
					document.getElementById('KetQuaChonGiaoTrinhTap').style.color = "#05c605";
				}
			    document.getElementById("KetQuaChonGiaoTrinhTap").innerHTML = TongThoiLuongTap + ' phút';
	    	}else {
	    		TongThoiLuongTap = TongThoiLuongTap - parseInt($(this).attr('data'));
				if(TongThoiLuongTap > 180) {
					document.getElementById('KetQuaChonGiaoTrinhTap').style.color = "#ff0202";
				}
				else{
					document.getElementById('KetQuaChonGiaoTrinhTap').style.color = "#05c605";
				}
			    document.getElementById("KetQuaChonGiaoTrinhTap").innerHTML = TongThoiLuongTap + ' phút';
	    	}
		});

		$('div.alert').delay(5000).slideUp();

	});

</script>
@stop
