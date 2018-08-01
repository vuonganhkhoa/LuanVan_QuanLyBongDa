@extends ('nhanvienyte.layout.master_nhanvienyte')
@section ('title', 'Thông tin cá nhân')
@section('content')
@section ('style')
<style>
.material-switch > input[type="checkbox"] {
  display: none;   
}

.material-switch > label {
  cursor: pointer;
  height: 0px;
  position: relative; 
  width: 520px;  
  margin-top: 20px
}

.material-switch > label::before {
  background: rgb(0, 0, 0);
  box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
  border-radius: 8px;
  content: '';
  height: 16px;
  margin-top: -8px;
  position:absolute;
  opacity: 0.3;
  transition: all 0.4s ease-in-out;
  width: 40px;
}
.material-switch > label::after {
  background: rgb(255, 255, 255);
  border-radius: 16px;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
  content: '';
  height: 24px;
  left: -4px;
  margin-top: -8px;
  position: absolute;
  top: -4px;
  transition: all 0.3s ease-in-out;
  width: 24px;
}
.material-switch > input[type="checkbox"]:checked + label::before {
  background: inherit;
  opacity: 0.5;
}
.material-switch > input[type="checkbox"]:checked + label::after {
  background: inherit;
  left: 20px;
}
</style>
@endsection
@section ('script')
<script type="text/javascript">

  $('.alert').delay(5000).slideUp()

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

  $('#someSwitchOptionDanger').click(function(){

    if ( $(this).is(':checked') ){
      $('#FormDoiMatKhau').show();
    }else{
      $('#FormDoiMatKhau').hide();
    }

  });


</script>
@endsection
  <div id="page-wrapper">
        
      <div class="main-page">

        <div class="row">
            <h3 class="title1">Cập nhật thông tin cá nhân :</h3>

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
              <form method="POST" class="form-horizontal" action="nhan-vien-y-te/cap-nhat-thong-tin" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                
                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('hoten') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Tên người dùng:</label>
                      <div class="col-md-3">
                        <input type="text" class="form-control" value="{{ Auth::user()->HoTen }}" name="hoten">
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
                    <div class="form-group {{ $errors->has('tendangnhap') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Tên đăng nhập:</label>
                      <div class="col-md-3">
                        <input type="text" class="form-control" value="{{ Auth::user()->username }}" name="tendangnhap">
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
                        <input type="text" class="form-control" value="{{ Auth::user()->Email }}" name="email">
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
                        <input type="date" class="form-control date" placeholder="Ngày sinh"  name="ngaysinh" value="{{ Auth::user()->NgaySinh }}"">
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
                        <input type="text" class="form-control" value="{{ Auth::user()->QuocTich }}" name="quoctich">
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
                    <div class="form-group">
                      <label for="txtarea1" class="col-md-4 control-label">Đổi mật khẩu:</label>
                      <div class="col-md-3">
                        <input style="margin-top: 13px" id="someSwitchOptionDanger" name="DoiMatKhau" type="checkbox"/>
                      </div>
                      <div class="col-md-5">
                      </div>
                    </div>
                  </div>

                  <div hidden id="FormDoiMatKhau">


                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('matkhauhientai') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Mật khẩu hiện tại:</label>
                      <div class="col-md-3">
                        <input type="password" class="form-control" value="" name="matkhauhientai">
                      </div>
                      <div class="col-md-5">
                        @if ($errors->has('matkhauhientai'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('matkhauhientai') }}
                            </strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('matkhau') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Mật khẩu:</label>
                      <div class="col-md-3">
                        <input type="password" class="form-control" value="" name="matkhau">
                      </div>
                      <div class="col-md-5">
                        @if ($errors->has('matkhau'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('matkhau') }}
                            </strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('nhaplaimatkhau') ? 'has-error' : '' }}">
                      <label for="txtarea1" class="col-md-4 control-label">Nhập lại mật khẩu:</label>
                      <div class="col-md-3">
                        <input type="password" class="form-control" value="" name="nhaplaimatkhau">
                      </div>
                      <div class="col-md-5">
                        @if ($errors->has('nhaplaimatkhau'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('nhaplaimatkhau') }}
                            </strong>
                          </span>
                        @endif
                      </div>
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