@extends ('nhanvienyte.layout.master_nhanvienyte')
@section ('title', 'Quản lý Chấn thương')
@section('content')

  <div id="page-wrapper">
        
      <div class="main-page">
        
        <div class="row">
            <h3 class="title1">Cập nhật chấn thương :</h3>

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
              <form method="POST" class="form-horizontal" action="nhan-vien-y-te/chan-thuong/sua/{{$chanthuong->id}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                
                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('tenchanthuong') ? 'has-error' : '' }}">

                      <label for="txtarea1" class="col-md-4 control-label">Tên chấn thương:</label>
                      <div class="col-md-3">
                        <input style="height: 30px; width: 200px" class="form-control1" value="{{$chanthuong->TenChanThuong}}" type="text" name="tenchanthuong">
                      </div>

                      <div class="col-md-5">
                        @if ($errors->has('tenchanthuong'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('tenchanthuong') }}
                            </strong>
                          </span>
                        @endif
                      </div>

                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('phanloaichanthuong') ? 'has-error' : '' }}">

                      <label for="txtarea1" class="col-md-4 control-label">Loại chấn thương:</label>
                      <div class="col-md-3">
                        <select style="width: 200px;" class="control-label " name="phanloaichanthuong" >
                                        <option value="1"
                                            @if($chanthuong->PhanLoaiChanThuong == 1)
                                              {{'Selected'}}
                                            @endif
                                        >Chấn thương ngoài da</option>

                                        <option value="2"
                                            @if($chanthuong->PhanLoaiChanThuong == 2)
                                              {{'Selected'}}
                                            @endif
                                        >Chấn thương cơ</option>

                                        <option value="3"
                                            @if($chanthuong->PhanLoaiChanThuong == 3)
                                              {{'Selected'}}
                                            @endif
                                        >Chấn thương khớp</option>

                                        <option value="4"
                                            @if($chanthuong->PhanLoaiChanThuong == 4)
                                              {{'Selected'}}
                                            @endif
                                        >Chấn thương xương</option>

                                        <option value="5"
                                            @if($chanthuong->PhanLoaiChanThuong == 5)
                                              {{'Selected'}}
                                            @endif
                                        >Chấn thương đầu</option>
                                      </select>
                      </div>

                      <div class="col-md-5">
                        @if ($errors->has('phanloaichanthuong'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('phanloaichanthuong') }}
                            </strong>
                          </span>
                        @endif
                      </div>

                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('thoigianhoiphuc') ? 'has-error' : '' }}">

                      <label for="txtarea1" class="col-md-4 control-label">Thời gian hồi phục:</label>
                      <div class="col-md-3">
                        <input style="height: 30px; width: 200px" class="form-control1" value="{{$chanthuong->ThoiGianHoiPhuc}}" type="number" min="0" max="104" name="thoigianhoiphuc">
                      </div>

                      <div class="col-md-5">
                        @if ($errors->has('thoigianhoiphuc'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('thoigianhoiphuc') }}
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