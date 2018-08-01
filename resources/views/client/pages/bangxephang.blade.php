@extends ('client.layouts.master')

@section ('title', 'Liverpool FC - Bảng xếp hạng')

@section ('content')

				<!--// KODE BENNER1 START //-->
				<div class="kode_benner1 bamnner2">
					<div class="kode_benner1_text">
						<h2>Bảng xếp hạng {{ $GiaiDau->TenGiaiDau }}</h2>
					</div>
					<div class="kode_benner1_cols">
						<div class="container kf_container">
							<ul class="breadcrumb">
							  <li><a href="{{ route('Home') }}">Trang chủ</a></li>
							  <li class="active">Bảng xếp hạng</li>
							</ul>
						</div>
					</div>
				</div>
				<!--// KODE BENNER1 END //-->
				<div class="kode_ply_gallery">
						<div class="container">
							<div class="heading5 black b_2">
							  <h4>Bảng xếp hạng <span>{{ $GiaiDau->TenGiaiDau }} {{ date('Y',strtotime($GiaiDau->NamBatDauMuaGiai)) }} - {{ date('Y',strtotime($GiaiDau->NamKetThucMuaGiai)) }}</span></h4>
							</div>

							@if (!empty($BangXepHang))
							<table class="kode_ply_table">
								<tr class="kode_ply_first">
									<th>TT</th>
									<th>Đội bóng</th>
									<th>Trận</th>
									<th>Thắng</th>
									<th>Hòa</th>
									<th>Thua</th>
									<th>Bàn thắng</th>
									<th>Bàn thua</th>
									<th>Hiệu số</th>
									<th>Điểm</th>
								</tr>

								<?php $stt=0; ?>
								@foreach ($BangXepHang as $bxh)
								<tr class="kode_ply_two {{ $bxh->TenDayDu==='Liverpool'?'three':'' }}">
									<td>{{ ++$stt }}</td>
									<td style="text-align: left">
										<img height="30" style="margin:0px 5px 0px 15px" src="Client/images/logos/{{ $bxh->HinhAnhCauLacBo }}" alt="">
										{{ $bxh->TenDayDu }}
									</td>
									<td>{{ $bxh->SoTran }}</td>
									<td>{{ $bxh->SoTranThang }}</td>
									<td>{{ $bxh->SoTranHoa }}</td>
									<td>{{ $bxh->SoTranThua }}</td>
									<td>{{ $bxh->BanThang }}</td>
									<td>{{ $bxh->BanThua }}</td>
									<td>{{ $bxh->HieuSo }}</td>
									<td>{{ $bxh->Diem }}</td>
								</tr>
								@endforeach

							</table>				
							<div class="kode_ply_caption">
								<p></p>
							</div>
							@endif
						</div>
					</div>

@stop