@extends ('huanluyenvien.layouts.master')

@section ("title")
Liverpool FC - Thêm giáo trình tập
@stop

@section ('script')
<style>
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
		<h2>Thêm giáo trình tập</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="huan-luyen-vien">Trang chủ</a></li>
				<li><a href="huan-luyen-vien/giao-trinh-tap">Giáo trình tập</a></li>
				<li class="active">Thêm giáo trình tập</li>
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
						<form class="form-horizontal" method="POST" action="huan-luyen-vien/giao-trinh-tap/them">
							{{ csrf_field() }}
							<div class="form-group {{ $errors->has('TenBaiTap') ? 'has-error' : '' }}">
								<label class="control-label col-sm-2" >Tên bài tập:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" placeholder="Nhập tên bài tập" name="TenBaiTap" value="{{ old('TenBaiTap') }}">
									@if ($errors->has('TenBaiTap'))
									<span class="help-block"><strong style="color:#E01A22">{{ $errors->first('TenBaiTap') }}</strong></span>
									@endif
								</div>
							</div>
							<div class="form-group {{ $errors->has('ThoiLuongLuyenTapToiDa') ? 'has-error' : '' }}">
								<label class="control-label col-sm-2" >Thời lượng:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" placeholder="Nhập thời lượng luyện tập tối đa" name="ThoiLuongLuyenTapToiDa" value="{{ old('ThoiLuongLuyenTapToiDa', '60') }}">
									@if ($errors->has('ThoiLuongLuyenTapToiDa'))
									<span class="help-block"><strong style="color:#E01A22">{{ $errors->first('ThoiLuongLuyenTapToiDa') }}</strong></span>
									@endif
								</div>
							</div>
							<div class="form-group {{ $errors->has('NoiDungBaiTap') ? 'has-error' : '' }}">
								<label class="control-label col-sm-2" >Chi tiết tập:</label>
								<div class="col-sm-10"> 
									<textarea rows="6" class="form-control" placeholder="Nhập chi tiết nội dung bài tập" id="NoiDungBaiTap" name="NoiDungBaiTap">{{ old('NoiDungBaiTap') }}</textarea>
									<script type="text/javascript">CKEDITOR.replace( 'NoiDungBaiTap' );</script>
									@if ($errors->has('NoiDungBaiTap'))
									<span class="help-block"><strong style="color:#E01A22">{{ $errors->first('NoiDungBaiTap') }}</strong></span>
									@endif
								</div>
							</div>
							<div class="form-group"> 
								<div class="col-sm-offset-2 col-sm-10  text-right">
									<button type="submit" class="btn btn-success">Thêm giáo trình tập</button>
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

@section ('style')
<script type="text/javascript" src="{!! asset ('AdminAssets/js/ckeditor/ckeditor.js') !!}"></script>
@stop