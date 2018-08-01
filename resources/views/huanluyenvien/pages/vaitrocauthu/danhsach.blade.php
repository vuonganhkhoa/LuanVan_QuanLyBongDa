@extends ('huanluyenvien.layouts.master')

@section ("title")
Liverpool FC - Vai trò cầu thủ
@stop

@section ('script')
<style>
    .panel{
        max-width: 800px;
        margin: 0px auto;
        padding: 0px;	
    }
    .panel-default{
        border: 1px solid #F5F1F1 !important;
        box-shadow: 0 -1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24) !important;
    }
    .form-control {
        display: inline;
    }
</style>
@stop

@section ('content')

<div class="kode_benner1 bamnner2">
	<div class="kode_benner1_text">
		<h2>Điều chỉnh vai trò cầu thủ</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="huan-luyen-vien">Trang chủ</a></li>
				<li class="active">Điều chỉnh vai trò cầu thủ</li>
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
					
						<form class="form-horizontal" method="POST" action="huan-luyen-vien/vai-tro-cau-thu/dieu-chinh" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                            @foreach ($VaiTroCauThu as $vaitro)
							<div class="form-group">
                                <label class="control-label col-sm-4" >{{$vaitro->TenVaiTro}}: </label>
								<div class="col-sm-8"> 
                                    <select name="VaiTroCauThu[]" class="form-control">
                                        @foreach ($DanhSachCauThu as $cauthu)
                                        <option 
                                            value="{{$cauthu->id}}"
                                            {{$vaitro->idCauThu === $cauthu->id ? 'selected' : ''}}
                                        >
                                            {{$cauthu->nguoidung->HoTen}}
                                        </option>
                                        @endforeach
                                    </select>
								</div>
                            </div>
                            @endforeach

							<div class="form-group"> 
								<div class=" col-sm-12  text-right">
									<button type="submit" class="btn btn-success">Lưu chỉnh sửa</button>
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

@section ('script')
<script type="text/javascript">

		$(document).ready(function() {
			$('div.alert').delay(5000).slideUp();
		});

</script>
@stop