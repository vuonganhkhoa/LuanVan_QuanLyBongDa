@extends ('nhanvienyte.layout.master_nhanvienyte')
@section ('title', 'Quản lý Lịch khám')
@section('content')

  <div id="page-wrapper">
        
      <div class="main-page">
        
        <div class="row">
            <h3 class="title1">Cập nhật lịch khám :</h3>

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
              <form method="POST" class="form-horizontal" action="nhan-vien-y-te/lich-kham/sua/{{$lichkham->id}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('phacdodieutri') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Chọn phác đồ điều trị:</label>
                      <div class="col-md-3">
                         <select style="width: 400px; height: 40px" class="control-label " name="phacdodieutri" >
                              @foreach($phacdodieutri as $pddt)
                              <option value="{{$pddt->id}}"
                                    @if($lichkham->idPhacDoDieuTri === $pddt->id)
                                        {{'Selected'}}
                                    @endif
                                >{{$pddt->TrinhTuThucHien}}</option>
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
                    <div class="form-group {{ $errors->has('ngaykham') ? 'has-error' : '' }}">

                      <label for="txtarea1" class="col-md-4 control-label">Ngày khám:</label>
                      <div class="col-md-3">
                         <input style="width: 400px; text-align: center;" type="date" class="form-control date" placeholder="Ngày sinh"  name="ngaykham" value="{{$lichkham->NgayKham}}">
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
                              <option value="sang"
                                  @if($lichkham->CaKham == 'sang')
                                      {{'Selected'}}
                                  @endif
                              >Ca sáng</option>

                              <option value="trua"
                                  @if($lichkham->CaKham == 'trua')
                                      {{'Selected'}}
                                  @endif
                              >Ca trưa</option>

                              <option value="chieu"
                                  @if($lichkham->CaKham == 'chieu')
                                      {{'Selected'}}
                                  @endif
                              >Ca chiều</option>
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
                        <input style="width: 400px" type="text" class="form-control" value="{{$lichkham->DiaDiem}}" name="diadiem">
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
                        <textarea style="width: 400px; height: 200px" name="noidungdieutri">{{$lichkham->NoiDungDieuTri}}</textarea>
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

                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                      <div  style="margin-bottom: -50px !important" class="col-md-8 ">
                        <button type="submit" class="btn btn-danger pull-right">Cập nhật</button>
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