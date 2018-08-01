@extends ('admin.layout.master_admin')
@section ('title', 'Quản lý Người Dùng')
@section('content')
@section ('script')
<script type="text/javascript">
  function preview_image(event) 
  {
    var reader = new FileReader();
    reader.onload = function()
    {
      var output = document.getElementById('output_image');
      output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
  }
</script>
<script type="text/javascript">
  $('.alert').delay(5000).slideUp()
</script>
@endsection
  <div id="page-wrapper">
        
      <div class="main-page">

        <div class="row">
            <h3 class="title1">Cập nhật người dùng :</h3>

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
              <form method="POST" class="form-horizontal" action="admin/nguoi-dung/sua/{{$nguoidung->id}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                
                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('hoten') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Tên người dùng:</label>
                      <div class="col-md-3">
                        <input type="text" class="form-control" value="{{$nguoidung->HoTen}}" name="hoten">
                      </div>
                      <div class="col-md-5">
                        @if ($errors->has('hoten'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('hoten') }}
                            </strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>
                


                
                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('chucvu') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Chức vụ:</label>
                      <div class="col-md-3">
                          <select class="control-label form-control" name="chucvu" >
                            <option value="huanluyenvien"
                                  @if($nguoidung->ChucVu == 'huanluyenvien')
                                    {{'Selected'}}
                                  @endif
                            >Huấn luyện viên</option>

                            <option value="cauthu"
                                  @if($nguoidung->ChucVu == 'cauthu')
                                    {{'Selected'}}
                                  @endif
                            >Cầu thủ</option>

                            <option value="nhanvienyte"
                                  @if($nguoidung->ChucVu == 'nhanvienyte')
                                    {{'Selected'}}
                                  @endif
                            >Nhân viên y tế</option>

                            <option value="admin"
                                  @if($nguoidung->ChucVu == 'admin')
                                    {{'Selected'}}
                                  @endif
                            >Admin</option>
                          </select>
                      </div>
                      <div class="col-md-5">
                        @if ($errors->has('chucvu'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('chucvu') }}
                            </strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>
                


                
                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('tendangnhap') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Tên đăng nhập:</label>
                      <div class="col-md-3">
                        <input type="text" class="form-control" value="{{$nguoidung->username}}" name="tendangnhap">
                      </div>
                      <div class="col-md-5">
                        @if ($errors->has('tendangnhap'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('tendangnhap') }}
                            </strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>
                


                
                  
                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Email:</label>
                      <div class="col-md-3">
                        <input type="text" class="form-control" value="{{$nguoidung->Email}}" name="email">
                      </div>
                      <div class="col-md-5">
                        @if ($errors->has('email'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('email') }}
                            </strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>
                


                
                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('ngaysinh') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Ngày sinh:</label>
                      <div class="col-md-3">
                        <input type="date" class="form-control date" placeholder="Ngày sinh"  name="ngaysinh" value="{{$nguoidung->NgaySinh}}"">
                      </div>
                      <div class="col-md-5">
                        @if ($errors->has('ngaysinh'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('ngaysinh') }}
                            </strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>
                


                
                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('quoctich') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Quốc tịch:</label>
                      <div class="col-md-3">
                        <input type="text" class="form-control" value="{{$nguoidung->QuocTich}}" name="quoctich">
                      </div>
                      <div class="col-md-5">
                        @if ($errors->has('quoctich'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('quoctich') }}
                            </strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>
                


                
                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('gioitinh') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Giới tính:</label>
                      <div class="col-md-3">
                        <div class="radio">
                          <label><input type="radio" name="gioitinh" value="0"
                                @if($nguoidung->GioiTinh == 0)
                                    {{'Checked'}}
                                @endif
                            >Nam</label>

                          <label><input type="radio" name="gioitinh" value="1"
                                @if($nguoidung->GioiTinh == 1)
                                    {{'Checked'}}
                                @endif
                            >Nữ</label>
                        </div>
                      </div>
                      <div class="col-md-5">
                        @if ($errors->has('gioitinh'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('gioitinh') }}
                            </strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>
                


                
                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('noisinh') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Nơi sinh:</label>
                      <div class="col-md-3">
                        <input type="text" class="form-control" value="{{$nguoidung->NoiSinh}}" name="noisinh">
                      </div>
                      <div class="col-md-5">
                        @if ($errors->has('noisinh'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('noisinh') }}
                            </strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>
                


                
                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('hinhdaidien') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Hình đại diện:</label>
                      <div class="col-md-3">
                        <input type="file" name="hinhdaidien" value="" class="form-control" accept="image/x-png,image/gif,image/jpeg,image/jpg" onchange="preview_image(event)" >
                        <img id="output_image" height="250" src="Client/images/players/{{$nguoidung->HinhDaiDien}}" />
                      </div>
                      <div class="col-md-5">
                        @if ($errors->has('hinhdaidien'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('hinhdaidien') }}
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