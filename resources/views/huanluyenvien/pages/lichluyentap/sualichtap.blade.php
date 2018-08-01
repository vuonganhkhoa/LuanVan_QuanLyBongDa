@extends ('huanluyenvien.layouts.master')

@section ("title")
Liverpool FC - Cập nhật ngày luyện tập
@stop

@section ('style')
<style type="text/css" media="screen">
.panel{
	max-width: 800px;
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
		<h2>Cập nhật ngày luyện tập</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="huan-luyen-vien">Trang chủ</a></li>
				<li><a href="huan-luyen-vien/lich-luyen-tap">Quản lý luyện tập</a></li>
				<li><a href="huan-luyen-vien/lich-luyen-tap/them-lich-tap">Lịch tập</a></li>
				<li class="active">Cập nhật ngày luyện tập</li>
			</ul>
		</div>
	</div>
</div>

<div class="kode-content">

	<section>
		<div class="container">

			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-body">

						@if (session('thongbao'))
						<div class="alert alert-success">{{ session('thongbao') }}</div>
						@endif
						@if (session('loi'))
						<div class="alert alert-danger">{{ session('loi') }}</div>
						@endif

						<form class="" method="POST" action="huan-luyen-vien/lich-luyen-tap/sua-lich-tap/{{ $LichTap->id }}">
							{{ csrf_field() }}
							<div class="col-sm-4">
								<div class="form-group {{ $errors->has('NgayLuyenTap') ? 'has-error' : '' }}">
									<input type="date" class="form-control" placeholder="Nhập ngày tập" name="NgayLuyenTap" value="{{ old('NgayLuyenTap', $LichTap->NgayLuyenTap) }}">
									@if ($errors->has('NgayLuyenTap'))
									<span class="help-block"><strong style="color:#E01A22">{{ $errors->first('NgayLuyenTap') }}</strong></span>
									@endif
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group {{ $errors->has('CaLuyenTap') ? 'has-error' : '' }}">
									<!-- <input type="text" class="form-control" placeholder="Nhập ca tập" name="CaLuyenTap" value="{{ old('CaLuyenTap', $LichTap->CaLuyenTap) }}">
									@if ($errors->has('CaLuyenTap'))
									<span class="help-block"><strong style="color:#E01A22">{{ $errors->first('CaLuyenTap') }}</strong></span>
									@endif	 -->
									<select name="CaLuyenTap" class="form-control">
										<option value="Ca sáng">Ca sáng</option>
										<option value="Ca trưa">Ca trưa</option>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group {{ $errors->has('DiaDiem') ? 'has-error' : '' }}">
									<input type="text" class="form-control" placeholder="Nhập địa điểm" name="DiaDiem" value="{{ old('DiaDiem', $LichTap->DiaDiem) }}">
									@if ($errors->has('DiaDiem'))
									<span class="help-block"><strong style="color:#E01A22">{{ $errors->first('DiaDiem') }}</strong></span>
									@endif
								</div>
							</div>
							<div class="form-group"> 
								<div class="text-right" style="margin-right:15px">
									<button type="submit" class="btn btn-success">Cập nhật ngày luyện tập</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>	
			
		</div>
	</section>
</div>
@stop
