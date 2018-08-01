@extends ('nhanvienyte.layout.master_nhanvienyte')
@section ('style')
<style>
.panel{
  max-width: 100%;
  margin: 0px auto;
  padding: 0px; 
}
.panel-default{
  border: 1px solid #F5F1F1 !important;
  box-shadow: 0 -1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24) !important;
}
.panel-body{
  margin: 15px;
}
.panel-default > .panel-heading {
    color: white;
    background-color: #1a1a1a;
    border-color: #ddd;
}
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
@stop
@section ('title', 'Quản lý Toa thuốc')
@section('content')


  <div id="page-wrapper">
        
      <div class="main-page">
        
        <div class="row">
            <h3 class="title1">Thêm Toa thuốc :</h3>

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
              <form method="POST" class="form-horizontal" action="nhan-vien-y-te/toa-thuoc/them" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                
                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('lichkham') ? 'has-error' : '' }}">

                      <label for="txtarea1" class="col-md-4 control-label">Chọn lịch khám:</label>
                      <div class="col-md-3">
                         <select style="width: 400px" class="control-label " name="lichkham" >
                              @foreach($lichkham as $lk)
                              <option value="{{$lk->id}}">{{$lk->HoTen}} | {{date('d-m-Y',strtotime($lk->NgayKham))}} | 
                                @if($lk->CaKham == 'sang')
                                    {{'Sáng'}}
                                @elseif($lk->CaKham == 'trua')
                                    {{'Trưa'}}
                                @elseif($lk->CaKham == 'chieu')
                                    {{'Chiều'}}
                                @endif
                              </option>
                              @endforeach
                        </select>
                      </div>

                      <div class="col-md-5">
                        @if ($errors->has('lichkham'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('lichkham') }}
                            </strong>
                          </span>
                        @endif
                      </div>

                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('ngaytaikham') ? 'has-error' : '' }}">

                      <label for="txtarea1" class="col-md-4 control-label">Ngày tái khám:</label>
                      <div class="col-md-3">
                         <input style="width: 400px; text-align: center;" type="date" class="form-control date" placeholder="Ngày sinh"  name="ngaytaikham" value="<?= date('Y-m-d') ?>">
                      </div>

                      <div class="col-md-5">
                        @if ($errors->has('ngaytaikham'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('ngaytaikham') }}
                            </strong>
                          </span>
                        @endif
                      </div>

                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group {{ $errors->has('chandoan') ? 'has-error' : '' }}">

                      <label for="txtarea1" class="col-md-4 control-label">Chẩn đoán:</label>
                      <div class="col-md-3">
                        <textarea style="width: 400px; height: 200px" name="chandoan" placeholder="Nhập chẩn đoán"></textarea>
                      </div>

                      <div class="col-md-5">
                        @if ($errors->has('chandoan'))
                          <span class="help-block">
                            <strong style="color:#E01A22">
                              {{ $errors->first('chandoan') }}
                            </strong>
                          </span>
                        @endif
                      </div>

                    </div>
                  </div>

                
                <div class="col-md-12 col-sm-12">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">Chọn thuốc</div>
                    <div class="panel-body">
                      <div class="form-group {{ $errors->has('thuoc') ? 'has-error' : '' }}">
                        
                        <?php $i=0; ?>
                        @foreach($thuoc as $t)
                        <div class="col-md-12" style="margin-bottom: 10px">
                          <div class="col-md-4">
                              <input type="checkbox" name="thuoc[]" id="someSwitchOptionDanger{{$i}}" value="{{$t->id}}"> 
                              <label style=" display: inline-block; font-size: 14px"> {{$t->TenThuoc}}
                            </label><br>
                          </div>

                          <div id="FormDoiMatKhau{{$t->id}}" hidden>
                            <div class="col-md-1">
                                <input style="width: 50px" type="numer" name="soluong[]" placeholder="SL">
                              <br>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="lieuluong[]" placeholder="Liều lượng" >
                              <br>
                            </div>
                            <div class="col-md-3">
                                <input style="width: 250px" type="text" name="ghichu[]" placeholder="Ghi chú">
                              <br>
                            </div>
                          </div>
                        </div>
                        <?php $i++; ?>
                        @endforeach

                      </div>

                      @if ($errors->has('thuoc'))
                      <span class="help-block"><strong style="color:#E01A22">{{ $errors->first('thuoc') }}</strong></span>
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

@section('script')
<script type="text/javascript">

  var SoLuongThuoc = {{count($thuoc)}};

  $('.alert').delay(5000).slideUp()

  for(var i=0; i<SoLuongThuoc; i++){

    $('#someSwitchOptionDanger' +i).click(function(e){
      if ( $(this).is(':checked') ){

        $('#FormDoiMatKhau'+e.target.value).show();

      }else{

        $('#FormDoiMatKhau'+e.target.value).hide();

      }
    });
  }
</script>
@endsection