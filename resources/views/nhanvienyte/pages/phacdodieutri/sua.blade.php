@extends ('nhanvienyte.layout.master_nhanvienyte')
@section ('title', 'Quản lý Phác đồ điều trị')
@section('content')

  <div id="page-wrapper">
        
      <div class="main-page">
        
        <div class="row">
            <h3 class="title1">Cập nhật phác đồ điều trị :</h3>

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
              <form method="POST" class="form-horizontal" action="nhan-vien-y-te/phac-do-dieu-tri/sua/{{$phacdodieutri->id}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                
                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('trinhtuthuchien') ? 'has-error' : '' }}">

                      <label for="txtarea1" class="col-md-4 control-label">Trình tự thực hiện:</label>
                      <div class="col-md-3">
                        <textarea style="width: 500px; height: 200px" name="trinhtuthuchien">{{$phacdodieutri->TrinhTuThucHien}}</textarea>
                      </div>

                      <div class="col-md-5">
                        @if ($errors->has('trinhtuthuchien'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('trinhtuthuchien') }}
                            </strong>
                          </span>
                        @endif
                      </div>

                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('tiendohoiphuc') ? 'has-error' : '' }}">

                      <label for="txtarea1" class="col-md-4 control-label">Tiến độ hồi phục:</label>
                      <div class="col-md-3">
                       <input style="height: 30px; width: 500px" class="form-control1" value="{{$phacdodieutri->TienDoHoiPhuc}}" type="number" min="0" max="1" name="tiendohoiphuc">
                      </div>

                      <div class="col-md-5">
                        @if ($errors->has('tiendohoiphuc'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('tiendohoiphuc') }}
                            </strong>
                          </span>
                        @endif
                      </div>

                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('ghichu') ? 'has-error' : '' }}">

                      <label for="txtarea1" class="col-md-4 control-label">Ghi chú:</label>
                      <div class="col-md-3">
                        <textarea style="width: 500px; height: 200px" name="ghichu">{{$phacdodieutri->GhiChu}}</textarea>
                      </div>

                      <div class="col-md-5">
                        @if ($errors->has('ghichu'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('ghichu') }}
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