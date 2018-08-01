@extends ('admin.layout.master_admin')
@section ('title', 'Quản lý Phong độ')
@section('content')

	<div id="page-wrapper">
				
			<div class="main-page">

        <div class="row">
            <h3 class="title1">Thêm phong độ :</h3>

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
                    <form method="POST" class="form-horizontal" action="admin/phong-do/them" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('chisophongdo') ? 'has-error' : '' }}">
                              <label for="txtarea1" class="col-md-5 control-label">Chỉ số phong độ:</label>
                              <div class="col-md-2">
                                <input type="number" class="form-control" value="0"  name="chisophongdo" min="1" max="5">
                              </div>
                              <div class="col-md-4">
                                @if ($errors->has('chisophongdo'))
                                  <span class="help-block">
                                    <strong style="color:#E01A22">
                                      {{ $errors->first('chisophongdo') }}
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