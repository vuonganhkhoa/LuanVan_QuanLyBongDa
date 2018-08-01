@extends ('admin.layout.master_admin')
@section ('title', 'Quản lý Câu lạc bộ')
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
  function preview_image2(event) 
  {
    var reader = new FileReader();
    reader.onload = function()
    {
      var output = document.getElementById('output_image2');
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
            <h3 class="title1">Thêm câu lạc bộ :</h3>

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
                    <form method="POST" class="form-horizontal" action="admin/cau-lac-bo/them" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group {{ $errors->has('tendaydu') ? 'has-error' : '' }}">
                              <label for="txtarea1" class="col-md-3 control-label">Tên đầy đủ:</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" placeholder="Nhập tên câu lạc bộ" name="tendaydu">
                              </div>
                              <div class="col-md-4">
                                @if ($errors->has('tendaydu'))
                                  <span class="help-block">
                                    <strong style="color:#E01A22">
                                      {{ $errors->first('tendaydu') }}
                                    </strong>
                                  </span>
                                @endif
                              </div>
                            </div>
                            </div>


                            <div class="col-md-6">
                            <div class="form-group {{ $errors->has('tenviettat') ? 'has-error' : '' }}">
                              <label for="txtarea1" class="col-md-3 control-label">Tên viết tắt:</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" placeholder="Nhập tên viết tắt câu lạc bộ" name="tenviettat">
                              </div>
                              <div class="col-md-4">
                                @if ($errors->has('tenviettat'))
                                  <span class="help-block">
                                    <strong style="color:#E01A22">
                                      {{ $errors->first('tenviettat') }}
                                    </strong>
                                  </span>
                                @endif
                              </div>
                            </div>
                          </div>

                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group {{ $errors->has('truso') ? 'has-error' : '' }}">
                              <label for="txtarea1" class="col-md-3 control-label">Trụ sở:</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" placeholder="Nhập trụ sở" name="truso">
                              </div>
                              <div class="col-md-4">
                                @if ($errors->has('truso'))
                                  <span class="help-block">
                                    <strong style="color:#E01A22">
                                      {{ $errors->first('truso') }}
                                    </strong>
                                  </span>
                                @endif
                              </div>
                            </div>
                            </div>


                            <div class="col-md-6">
                            <div class="form-group {{ $errors->has('ngaythanhlap') ? 'has-error' : '' }}">
                              <label for="txtarea1" class="col-md-3 control-label">Ngày thành lập:</label>
                              <div class="col-md-5">
                                <input type="date" class="form-control date" name="ngaythanhlap" value="<?= date('Y-m-d') ?>">
                              </div>
                              <div class="col-md-4">
                                @if ($errors->has('ngaythanhlap'))
                                  <span class="help-block">
                                    <strong style="color:#E01A22">
                                      {{ $errors->first('ngaythanhlap') }}
                                    </strong>
                                  </span>
                                @endif
                              </div>
                            </div>
                            </div>

                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group {{ $errors->has('bietdanh') ? 'has-error' : '' }}">
                              <label for="txtarea1" class="col-md-3 control-label">Biệt danh:</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" placeholder="Nhập biệt danh" name="bietdanh">
                              </div>
                              <div class="col-md-4">
                                @if ($errors->has('bietdanh'))
                                  <span class="help-block">
                                    <strong style="color:#E01A22">
                                      {{ $errors->first('bietdanh') }}
                                    </strong>
                                  </span>
                                @endif
                              </div>
                            </div>
                          </div>


                            <div class="col-md-6">
                            <div class="form-group {{ $errors->has('sanvandong') ? 'has-error' : '' }}">
                              <label for="txtarea1" class="col-md-3 control-label">Sân vận động:</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" placeholder="Nhập tên sân vận động" name="sanvandong">
                              </div>
                              <div class="col-md-4">
                                @if ($errors->has('sanvandong'))
                                  <span class="help-block">
                                    <strong style="color:#E01A22">
                                      {{ $errors->first('sanvandong') }}
                                    </strong>
                                  </span>
                                @endif
                              </div>
                            </div>
                            </div>

                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group {{ $errors->has('succhua') ? 'has-error' : '' }}">
                              <label for="txtarea1" class="col-md-3 control-label">Sức chứa:</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" placeholder="Nhập sức chứa của sân" name="succhua">
                              </div>
                              <div class="col-md-4">
                                @if ($errors->has('succhua'))
                                  <span class="help-block">
                                    <strong style="color:#E01A22">
                                      {{ $errors->first('succhua') }}
                                    </strong>
                                  </span>
                                @endif
                              </div>
                            </div>
                          </div>


                            <div class="col-md-6">
                            <div class="form-group {{ $errors->has('chutich') ? 'has-error' : '' }}">
                              <label for="txtarea1" class="col-md-3 control-label">Chủ tịch:</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" placeholder="Nhập tên chủ tịch" name="chutich">
                              </div>
                              <div class="col-md-4">
                                @if ($errors->has('chutich'))
                                  <span class="help-block">
                                    <strong style="color:#E01A22">
                                      {{ $errors->first('chutich') }}
                                    </strong>
                                  </span>
                                @endif
                              </div>
                            </div>
                            </div>

                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                            <div class="form-group {{ $errors->has('hinhanhcaulacbo') ? 'has-error' : '' }}">
                              <label for="txtarea1" class="col-md-3 control-label">Hình ảnh câu lạc bộ :</label>
                              <div class="col-md-5">
                                 <input type="file" name="hinhanhcaulacbo" value="" class="form-control" accept="image/x-png,image/gif,image/jpeg,image/jpg" onchange="preview_image(event)" >
                                 <img id="output_image" height="50" src="AdminAssets/images/default-user-image.png" />
                              </div>
                              <div class="col-md-4">
                                @if ($errors->has('hinhanhcaulacbo'))
                                  <span class="help-block">
                                    <strong style="color:#E01A22">
                                      {{ $errors->first('hinhanhcaulacbo') }}
                                    </strong>
                                  </span>
                                @endif
                              </div>
                            </div>
                          </div>


                            <div class="col-md-6">
                            <div class="form-group {{ $errors->has('hinhanhcaulacbo_lon') ? 'has-error' : '' }}">
                              <label for="txtarea1" class="col-md-3 control-label">Hình ảnh câu lạc bộ (lớn):</label>
                              <div class="col-md-5">
                                <input type="file" name="hinhanhcaulacbo_lon" value="" class="form-control" accept="image/x-png,image/gif,image/jpeg,image/jpg" onchange="preview_image2(event)" >
                                <img id="output_image2" height="150" src="AdminAssets/images/default-user-image.png" />
                              </div>
                              <div class="col-md-4">
                                @if ($errors->has('hinhanhcaulacbo_lon'))
                                  <span class="help-block">
                                    <strong style="color:#E01A22">
                                      {{ $errors->first('hinhanhcaulacbo_lon') }}
                                    </strong>
                                  </span>
                                @endif
                              </div>
                            </div>
                          </div>

                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group {{ $errors->has('lichsu') ? 'has-error' : '' }}">
                            <label class="control-label">
                                Lịch sử : 
                                @if ($errors->has('lichsu'))
                                  <span class="help-block">
                                    <strong style="color:#E01A22">
                                      {{ $errors->first('lichsu') }}
                                    </strong>
                                  </span>
                                @endif
                            </label>
                            <textarea class="form-control " rows="8" name="lichsu" id="lichsu"></textarea>
                            <script type="text/javascript">CKEDITOR.replace( 'lichsu' );</script>
                          </div>
                        </div>
                      </div>

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