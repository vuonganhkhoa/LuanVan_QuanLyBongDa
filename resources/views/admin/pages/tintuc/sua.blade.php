@extends ('admin.layout.master_admin')
@section ('title', 'Quản lý Tin Tức')
@section('content')

  <div id="page-wrapper">
        
      <div class="main-page">
        <h3 class="title1">Cập nhật tin tức</h3>
        

        <div class="widget-shadow" data-example-id="basic-forms"> 
              <div class="form-body">

                @if(count($errors) > 0)                       
                    <div class="alert alert-danger">@foreach($errors->all() as $err){{$err}}<br>@endforeach</div>
                @endif
                
                <form method="POST" class="form-horizontal" action="admin/tin-tuc/sua/{{$TinTuc->id}}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group label-floating">
                                <label class="control-label">Tiêu đề</label>
                                <input type="text" class="form-control" value="{{$TinTuc->TieuDe}}" name="tieude">
                              </div>
                            </div>   
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group ">
                                <label class="control-label">Tóm tắt</label>
                                <textarea id="demo" class="form-control " rows="8"  name="tomtat" id="tomtat">{{$TinTuc->TomTat}}</textarea>
                                <script type="text/javascript" >CKEDITOR.replace( 'tomtat' );</script>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group ">
                                <label class="control-label">Nội dung</label>
                                <textarea id="demo" class="form-control " rows="8" name="noidung" id="noidung">{{ $TinTuc->NoiDung }}</textarea>
                                <script type="text/javascript">CKEDITOR.replace( 'noidung' );</script>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group label-floating">
                                <label class="control-label">Ngày đăng</label>
                                <input type="date" class="form-control date" placeholder="Ngày đăng"  name="ngaydang" value="{{$TinTuc->NgayDang}}">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group label-floating">
                               <label class="control-label">Hình ảnh</label>
                                <input type="file" name="hinhtintuc" class="form-control" />
                                <img style="width: 100px" src="adminAssets/img/photos/{{ $TinTuc->Hinh }}" 
                              </div>
                            </div>
                          </div>


                          <button type="submit" class="btn btn-danger pull-right">Cập nhật</button>
                          <div class="clearfix"></div>
                        </form>
            </div>
        </div>

        

        
        
        <div class="clearfix"></div>
      </div>
  </div>
@endsection