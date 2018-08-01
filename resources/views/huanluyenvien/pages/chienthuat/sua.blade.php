@extends ('huanluyenvien.layouts.master')

@section ("title")
Liverpool FC - Sửa chiến thuật
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
		<h2>Sửa chiến thuật</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="huan-luyen-vien/1">Trang chủ</a></li>
				<li><a href="huan-luyen-vien/chien-thuat">Chiến thuật</a></li>
				<li class="active">Sửa chiến thuật</li>
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
						<form class="form-horizontal" method="POST" action="huan-luyen-vien/chien-thuat/sua/{{ $chienthuat->id }}">
							{{ csrf_field() }}
							<div class="form-group {{ $errors->has('TenChienThuat') ? 'has-error' : '' }}">
								<label class="control-label col-sm-3" >Tên chiến thuật:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" placeholder="Nhập tên chiến thuật" name="TenChienThuat" value="{{ old('TenChienThuat', $chienthuat->TenChienThuat) }}">
									@if ($errors->has('TenChienThuat'))
									<span class="help-block"><strong style="color:#E01A22">{{ $errors->first('TenChienThuat') }}</strong></span>
									@endif
								</div>
							</div>
							<div class="form-group {{ $errors->has('NoiDungChienThuat') ? 'has-error' : '' }}">
								<label class="control-label col-sm-3" >Chi tiết chiến thuật:</label>
								<div class="col-sm-9"> 
									<textarea rows="6" class="form-control" placeholder="Nhập chi tiết chiến thuật" id="NoiDungChienThuat" name="NoiDungChienThuat">{{ old('NoiDungChienThuat', $chienthuat->NoiDungChienThuat) }}</textarea>
									<script type="text/javascript">CKEDITOR.replace( 'NoiDungChienThuat' );</script>
									@if ($errors->has('NoiDungChienThuat'))
									<span class="help-block"><strong style="color:#E01A22">{{ $errors->first('NoiDungChienThuat') }}</strong></span>
									@endif
								</div>
							</div>
							<div class="form-group"> 
								<div class=" col-sm-12  text-right">
									<button type="submit" class="btn btn-success">Sửa chiến thuật</button>
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