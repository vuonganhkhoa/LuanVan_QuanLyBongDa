@extends ('huanluyenvien.layouts.master')

@section ("title")
Liverpool FC - Xem đội hình chiến thuật
@stop

@section ("style")
<style type="text/css" media="screen">
.kode_ply_table .kode_ply_two > td {
	padding: 5px;
}
</style>
@stop

@section ('content')

<div class="kode_benner1 bamnner2">
	<div class="kode_benner1_text">
		<h2>Đội hình chiến thuật</h2>
	</div>
	<div class="kode_benner1_cols">
		<div class="container kf_container">
			<ul class="breadcrumb">
				<li><a href="./huan-luyen-vien">Trang chủ</a></li>
				<li><a href="./huan-luyen-vien/doi-hinh-chien-thuat">Đội hình chiến thuật</a></li>
				<li class="active">Xem chi tiết</li>
			</ul>
		</div>
	</div>
</div>

<div class="kode-content">
	<div class="ft-match-slider">

		<div class="kode_player_wraper" style="  padding:50px 0px 10px;  border-bottom: 1px solid #fff">
			<div class="container">
				<div class="row">
					@if (!empty($TranDauMuonXem))
					<div class="kode_ticket_sig_row">
						<div class="ftb-result-wrap">
							<div class="ftb-result1">
								<div class="ftb-result-logo">
									<a><img src="./Client/images/logos/{{ $TranDauMuonXem[0]->HinhAnhCauLacBo_lon }}" alt=""></a>
								</div>
								<div class="text">
									<h6><a>{{ $TranDauMuonXem[0]->TenDayDu }}</a></h6>
								</div>
							</div>

							<div class="ftb-final-result">

								<em>{{ date('d/m/Y',strtotime($TranDauMuonXem[0]->NgayThiDau)) }} | {{ date('G:i',strtotime($TranDauMuonXem[0]->GioThiDau)) }} PM <i>{{ $TranDauMuonXem[0]->DiaDiem }}</i></em>
								
								<p><span class="grater">{{ $TranDauMuonXem[0]->TiSo }}</span> - <span>{{ $TranDauMuonXem[1]->TiSo }}</span></p>

							</div>

							<div class="ftb-result1 ftb-result2">
								<div class="ftb-result-logo">
									<a><img src="./Client/images/logos/{{ $TranDauMuonXem[1]->HinhAnhCauLacBo_lon }}" alt="""></a>
								</div>
								<div class="text">
									<h6><a>{{ $TranDauMuonXem[1]->TenDayDu }}</a></h6>
								</div>
							</div>
						</div>
					</div>
					@else
					<div class="alert alert-danger">Chưa có thông tin về trận đấu tiếp theo !</div>
					@endif
				</div>
			</div>
		</div>

		@if (!empty($TranDauMuonXem))
		<div class="kode_fixture_wraper">
			<div class="container">
				@if (!empty($DoiHinhChienThuat))
				<div class="row">
					
					@if(!empty($CauThuRaSan))
					<div class="col-md-6">
						<div class="ftb-tabs-wrap wrap_3">
							<div class="ftb_tabs_drop">
								<h5>Danh sách cầu thủ ra sân</h5>
							</div>
							<table class="kode_ply_table DoiHinhChienThuatTable">
								<tr class="kode_ply_first kode_TH_CauThu">
									<th>STT</th>
									<th>Cầu Thủ</th>
									<th>Vị Trí</th>
									<th>Vai Trò</th>
								</tr>
								
								<?php $stt=0; ?>
								@foreach ($CauThuRaSan as $cauthu)
								<tr class="
											kode_ply_two 
											kode_ThongKe 
											@foreach ($VaiTroCauThu as $vaitro)
											{{ ($cauthu->id === $vaitro->id && $vaitro->TenVaiTro === 'Dự bị' ) ? 'DuBi' : '' }}
											@endforeach
										  "
								>
									<td>{{ ++$stt }}</td>
									<td>{{ $cauthu->HoTen }}</td>
									<td>{{ $cauthu->TenViTri ? $cauthu->TenViTri : '-' }}</td>
									<td>
										@foreach ($VaiTroCauThu as $vaitro)
											{{ $cauthu->id === $vaitro->id ? $vaitro->TenVaiTro.' ' : '' }}
										@endforeach
											{{ $cauthu->TenViTri ? '' : 'Dự Bị' }}
									</td>
								</tr>
								@endforeach

							</table>
						</div>	
					</div>
					@else
					<div class="alert alert-danger">Chưa có thông tin về danh sách thi đấu !</div>
					@endif

					<div class="col-md-6">
						<div class="ftb-tabs-wrap wrap_3">
							<div class="ftb_tabs_drop">
								<h5 >Đội hình ( {{ $DoiHinhChienThuat[0]->TenDoiHinh }})</h5>
							</div>
							<img src="./Client/images/formations/{{ $DoiHinhChienThuat[0]->HinhAnhDoiHinh }}" alt=""  width="570" style="max-height:620px">
						</div>	
					</div>


					<div class="col-md-12">
					<div class="col-md-6">
						<div class="ftb-tabs-wrap wrap_3">
							<div class="ftb_tabs_drop">
								<h5 >Nhiệm vụ mỗi cầu thủ trong trận </h5>
							</div>
							<div style="padding: 20px; margin-top: 50px">
								<table>
										<th>Họ tên cầu thủ</th>
										<th>Vị trí</th>
										<th>Nhiệm vụ</th>
									@for ($stt=0; $stt<11; $stt++)
									<tr>
										<td>{{ $CauThuRaSan[$stt]->HoTen }}</td>
										<td>{{ $CauThuRaSan[$stt]->TenViTri }}</td>
										<td>{{ $CauThuRaSan[$stt]->NhiemVuCauThu }}</td>
									</tr>
									@endfor
								</table>
							</div>
						</div>	
					</div>

					<div class="col-md-6">
						<div class="ftb-tabs-wrap wrap_3">
							<div class="ftb_tabs_drop">
								<h5 >Chiến thuật ( {{ $DoiHinhChienThuat[0]->TenChienThuat }})</h5>
							</div>
							<div style="padding:80px 10px 10px 10px;">
								{!! $DoiHinhChienThuat[0]->NoiDungChienThuat !!}
							</div>
						</div>	
					</div>
					</div>

				</div>
				@else
				<div class="alert alert-danger">Chưa có thông tin về đội hình chiến thuật trận tiếp theo !</div>
				@endif
			</div>
		</div>	
		@endif

	</div>
</div>
@stop