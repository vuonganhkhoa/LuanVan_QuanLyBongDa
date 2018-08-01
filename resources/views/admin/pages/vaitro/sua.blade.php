@extends ('admin.layout.master_admin')
@section ('title', 'Quản lý Vai trò')
@section('content')

	<div id="page-wrapper">
				
			<div class="main-page">

        <div class="row">
            <h3 class="title1">Cập nhật Vai trò :</h3>

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
                    <form method="POST" class="form-horizontal" action="admin/vai-tro/sua/{{$vaitro->id}}" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('tenvaitro') ? 'has-error' : '' }}">
                              <label for="txtarea1" class="col-md-3 control-label">Tên vai trò:</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" value="{{$vaitro->TenVaiTro}}" name="tenvaitro">
                              </div>
                              <div class="col-md-4">
                                @if ($errors->has('tenvaitro'))
                                  <span class="help-block">
                                    <strong style="color:#E01A22">
                                      {{ $errors->first('tenvaitro') }}
                                    </strong>
                                  </span>
                                @endif
                              </div>
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group {{ $errors->has('mieuta') ? 'has-error' : '' }}">
                            <label class="control-label">
                                Chi tiết vai trò : 
                                @if ($errors->has('mieuta'))
                                  <span class="help-block">
                                    <strong style="color:#E01A22">
                                      {{ $errors->first('mieuta') }}
                                    </strong>
                                  </span>
                                @endif
                            </label>
                            <textarea class="form-control " rows="8" name="mieuta" id="mieuta">{{$vaitro->MieuTa}}</textarea>
                            <script type="text/javascript">CKEDITOR.replace( 'mieuta' );</script>
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