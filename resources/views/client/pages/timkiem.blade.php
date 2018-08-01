@extends ('client.layouts.master')

@section ('title', 'Liverpool FC - Kết quả tìm kiếm')

@section ('content')

	
    <div class="kode_benner1 bamnner2">
        <div class="kode_benner1_text">
            <h2>Kết quả tìm kiếm</h2>
        </div>
        <div class="kode_benner1_cols">
            <div class="container kf_container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('Home') }}">Trang chủ</a></li>
                    <li class="active">Kết quả tìm kiếm</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="kode_fixture_wraper">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    
                    <div class="ftb-tabs-wrap wrap_3">
                            <!--// MAIN TABS TABLE //-->

                            @if (!empty($CacTranDauTiepTheo))
                            <ul class="ftb-main-table table_2">

                            <div style="padding:10px">
                                Tìm thấy {{$SoLuong_TranDauTiepTheo_TraVe/2}} kết quả cho từ khóa <span style="color: red;">'{{$TuKhoa}}'</span>
                            </div>
                           
                            @for ($i=0; $i<count($CacTranDauTiepTheo); $i++)
                            <li>
                                <div class="ftb-date date_2">
                                <span>{{ date('d/m/Y', strtotime($CacTranDauTiepTheo[$i]->NgayThiDau)) }}<sup> </sup> </span>
                                <p>{{ date('G:i', strtotime($CacTranDauTiepTheo[$i]->GioThiDau)) }}</p>
                                </div>
                                <div class="ftb-compitatev tev_2">
                                <div class="compitatev-team1">
                                    <img src="Client/images/logos/{{ $CacTranDauTiepTheo[$i]->HinhAnhCauLacBo_lon }}" alt="">
                                    <a >{{ $CacTranDauTiepTheo[$i]->TenDayDu }}</a>
                                </div>
                                <span>VS</span>
                                <div class="compitatev-team1 compitatev-team2">
                                    <a >{{ $CacTranDauTiepTheo[$i+1]->TenDayDu }}</a>
                                    <img src="Client/images/logos/{{ $CacTranDauTiepTheo[$i+1]->HinhAnhCauLacBo_lon }}" alt="">
                                </div>
                                </div>
                                <div class="ftb-venue venue_2"></div>
                            </li>
                            <?php $i++ ?>
                            @endfor
                            
                            </ul>
                            @else
                            <div style="padding=10px">Không thấy từ khóa <span style="color: red;">'{{$TuKhoa}}'</span> bạn tìm.</div>
                            @endif
                            <!--// MAIN TABS TABLE //-->  
                    </div>	

                    <div class="text-center">
                        {{ $CacTranDauTiepTheo->links() }}
                    </div>
                </div>

                
                <div class="col-md-3">
                    <div class="kode_detail_side_bar">

                        <form class="kode_detail_side_field" method="GET" action="tim-kiem">
                            <input name="key" type="text" placeholder="Tìm kiếm" required>
                            <button><i class="fa fa-search"></i></button>
                        </form>

                        <div class="ftb-fixture-row">
                            <h5>Bảng xếp hạng</h5>
                            <!--// RATING TABLE //-->
                            <ul class="ftb-rating-table rating_2">
                                
                                <?php  $i=0; ?>
                                @foreach ($BangXepHang as $bxh)
                                <li class="{{$bxh->TenDayDu=='Liverpool' ? 'BangXepHangDoiBong' : ''}}">
                                <div class="ftb-position">
                                    {{++$i}} . 
                                </div>
                                <div class="ftb-team-name">
                                    <img src="Client/images/logos/{{ $bxh->HinhAnhCauLacBo }}" alt="">
                                    <a style="font-size:14px">{{ $bxh->TenDayDu }}</a>
                                </div>
                                <div class="ftb-team-points">
                                    {{ $bxh->Diem }}
                                </div>
                                </li>
                                @endforeach

                            </ul>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>	
    

@stop