@extends ('huanluyenvien.layouts.master')

@section ("title")
Liverpool FC - Điều chỉnh vị trí cầu thủ
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
		<h2> Điều chỉnh vị trí cầu thủ</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="huan-luyen-vien">Trang chủ</a></li>
				<li><a href="huan-luyen-vien/vi-tri-cau-thu">Vị trí cầu thủ</a></li>
				<li class="active"> Điều chỉnh</li>
			</ul>
		</div>
	</div>
</div>

<div class="kode-content">

	<section>
		<div class="container">
			
			<form class="form-horizontal" method="POST" action="huan-luyen-vien/vi-tri-cau-thu/dieu-chinh/{{$CauThuCanDieuChinh->id}}">
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
										<div class="panel-heading">Thông tin cầu thủ</div>
										<div class="panel-body">

                                            <div class="form-group text-center">
                                                <img height="200" src="Client/images/players/{{$CauThuCanDieuChinh->NguoiDung->HinhDaiDien}}" alt="">
											</div>
											<div class="form-group">
                                                <div class="col-md-4">Họ tên: </div>
                                                <div class="col-md-8">{{$CauThuCanDieuChinh->NguoiDung->HoTen}}</div>
											</div>
                                            <div class="form-group">
                                                <div class="col-md-4">Tuổi: </div>
                                                <div class="col-md-8">
                                                @if(!empty($CauThuCanDieuChinh->NguoiDung->NgaySinh))
                                                    {{date('Y', strtotime(date('Y')))-date('Y', strtotime($CauThuCanDieuChinh->NguoiDung->NgaySinh))}}
                                                @else
                                                    Chưa xác định
                                                @endif
                                                </div>
											</div>
                                            <div class="form-group">
                                                <div class="col-md-4">Vị trí: </div>
                                                <div class="col-md-8">{{$CauThuCanDieuChinh->ViTriSoTruong}}</div>
											</div>
                                        
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-8 col-sm-8">
								<div class="panel-group">
									<div class="panel panel-default">
										<div class="panel-heading">Các vị trí thi đấu</div>
										<div class="panel-body">
                                            @foreach ($ViTri as $vitri)
                                            <div class="col-md-3" style="margin: 7px">
											<label>
                                                <input 
                                                    type="checkbox" 
                                                    name="ViTriThiDau[]"
                                                    @foreach($ViTriCuaCauThu as $vitriCuaCauThu)
                                                    {{$vitri->id===$vitriCuaCauThu->idViTri?'checked':''}}
													@endforeach
													value="{{ $vitri->id }}"
                                                > 
                                                     {{$vitri->TenViTri}} 
                                            </label>
                                            </div>
                                            @endforeach
										</div>
									</div>
								</div>
							</div>
							
							
						</div>

						<div class="form-group"> 
							<div class="text-right" style="margin: -25px 60px 0px 0px;">
								<button type="reset" class="btn btn-danger">Chọn lại</button>
								<button type="submit" class="btn btn-success">Lưu thay đổi</button>
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

		$('div.alert').delay(5000).slideUp();

	});

</script>
@stop
