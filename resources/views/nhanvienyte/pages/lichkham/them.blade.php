@extends ('nhanvienyte.layout.master_nhanvienyte')
@section ('title', 'Quản lý Lịch khám')
@section('content')

  <div id="page-wrapper">
        
      <div class="main-page">
        
        <div class="row">
            <h3 class="title1">Thêm lịch khám :</h3>

            @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
                  @endif
                          
                  @if(session('error'))
                <div class="alert alert-danger">
                  {{ session('error') }}
                </div>
                  @endif


            <div class="form-three widget-shadow">
              <form method="POST" class="form-horizontal" action="nhan-vien-y-te/lich-kham/them/{{$nguoidung->id}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('chanthuong') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Chọn chấn thương:</label>
                      <div class="col-md-3">
                         <select style="width: 400px; height: 40px" class="control-label " name="chanthuong" >
                              @foreach($chanthuong as $ct)
                              <option value="{{$ct->id}}">{{$ct->TenChanThuong}}</option>
                              @endforeach
                        </select>
                      </div>
                      <div class="col-md-5">
                        @if ($errors->has('chanthuong'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('chanthuong') }}
                            </strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('phacdodieutri') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Chọn phác đồ điều trị:</label>
                      <div class="col-md-3">
                         <select style="width: 400px; height: 40px" class="control-label " name="phacdodieutri" >
                              @foreach($phacdodieutri as $pddt)
                              <option value="{{$pddt->id}}">{{$pddt->TrinhTuThucHien}}</option>
                              @endforeach
                        </select>
                      </div>
                      <div class="col-md-5">
                        @if ($errors->has('phacdodieutri'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('phacdodieutri') }}
                            </strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('cauthuchanthuong') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Cầu thủ chấn thương:</label>
                      <div class="col-md-3">
                         <input style="width: 400px" type="text" class="form-control" disabled value="{{$nguoidung->HoTen}}" name="cauthuchanthuong">
                      </div>
                      <div class="col-md-5">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('tinhtrangrasan') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Tình trạng ra sân:</label>
                      <div class="col-md-3">
                         <select style="width: 400px; height: 40px" class="control-label " name="tinhtrangrasan" >
                              <option value="0">Không thể ra sân</option>
                              <option value="1">Có thể ra sân</option>
                        </select>
                      </div>
                      <div class="col-md-5">
                        @if ($errors->has('tinhtrangrasan'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('tinhtrangrasan') }}
                            </strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('ngaykham') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Ngày khám:</label>
                      <div class="col-md-3">
                         <input style="width: 400px; text-align: center;" type="date" class="form-control date"   name="ngaykham" value="<?= date('Y-m-d') ?>">
                      </div>
                      <div class="col-md-5">
                        @if ($errors->has('ngaykham'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('ngaykham') }}
                            </strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('cakham') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Ca khám:</label>
                      <div class="col-md-3">
                        <select style="width: 400px;" class="control-label " name="cakham" >
                              <option value="sang">Ca sáng</option>
                              <option value="trua">Ca trưa</option>
                              <option value="chieu">Ca chiều</option>
                        </select>
                      </div>
                      <div class="col-md-5">
                        @if ($errors->has('cakham'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('cakham') }}
                            </strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('diadiem') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Địa điểm:</label>
                      <div class="col-md-3">
                        <input style="width: 400px" type="text" class="form-control" placeholder="Nhập địa điểm" name="diadiem" value="Tòa nhà 5A">
                      </div>
                      <div class="col-md-5">
                        @if ($errors->has('diadiem'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('diadiem') }}
                            </strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('noidungdieutri') ? 'has-error' : '' }}">

                      <label for="txtarea1" class="col-md-4 control-label">Nội dung điều trị:</label>
                      <div class="col-md-3">
                        <textarea style="width: 400px; height: 200px" name="noidungdieutri" placeholder="Nhập nội dung điều trị"></textarea>
                      </div>

                      <div class="col-md-5">
                        @if ($errors->has('noidungdieutri'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('noidungdieutri') }}
                            </strong>
                          </span>
                        @endif
                      </div>

                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="txtarea1" class="col-md-4 control-label">Ngày chấn thương:</label>
                      <div class="col-md-3">
                        <input style="margin-top: 13px" name="ngaychanthuong" type="checkbox"/>
                      </div>
                      <div class="col-md-5">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="txtarea1" class="col-md-4 control-label">Ngày hồi phục:</label>
                      <div class="col-md-3">
                        <input style="margin-top: 13px" name="ngayhoiphuc" type="checkbox"/>
                      </div>
                      <div class="col-md-5">
                      </div>
                    </div>
                  </div>

                  <!-- <div class="col-md-12">
                    <div class="form-group {{ $errors->has('tinhtrangchanthuong') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Tình trạng chấn thương:</label>
                      <div class="col-md-3">
                        <input style="width: 400px" type="number" class="form-control" value="0" min="0" max="1" name="tinhtrangchanthuong">
                      </div>
                      <div class="col-md-5">
                        @if ($errors->has('tinhtrangchanthuong'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('tinhtrangchanthuong') }}
                            </strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div> -->

                  <div class="row">
                    <div class="col-md-9">
                      <div class="form-group">
                        <div  style="margin-bottom: -50px !important" class="col-md-8 ">
                          <button type="submit" class="btn btn-danger pull-right">Thêm</button>
                        </div>
                      </div>
                    </div>
                  </div>

              </form>
            </div>
          </div>

        


        
        <div class="clearfix"></div>
      </div>
  </div>
@endsection

@section('script')
<script type="text/javascript">
  $('.alert').delay(5000).slideUp()
</script>
@endsection