<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <link type='image/x-icon' href='Client/images/favicon.ico' rel='shortcut icon' />
    <title>Liverpool F.C - Đăng nhập</title>
    <style>
        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }
    </style>
</head>
<body>
    <link rel="stylesheet" href="Login/css/login.css" />

    <div class="background"></div>

    <div class="crest"  onclick="history.back(-1)"></div>

    <div class="boxContainer cms">

        <div class="title">
            Đăng nhập
        </div>

        @if (session('loi'))
        <div class="alert">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
          <strong> {{ session('loi') }} </strong>
        </div>
        @endif

        <form action="{{ route('Login') }}" method="POST">

            <div class="inputFields">


                @csrf

                <label for="username">Tên đăng nhập</label>
                <input type="text" id="username" name="username" value="{{old('username')}}"  style="margin-bottom:4px"/>
                @if ($errors->has('username'))
                <span class="help-block" style="margin-bottom: 10px; margin-left: 170px"><strong style="font-size:14px; color:#E01A22">{{ $errors->first('username') }}</strong></span>
                @endif

                <br>

                <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" style="margin-bottom:4px" value="{{old('password')}}"/>
                @if ($errors->has('password'))
                <span class="help-block" style="margin-bottom: 10px; margin-left: 170px"><strong style="font-size:14px; color:#E01A22">{{ $errors->first('password') }}</strong></span>
                @endif
                <br>


            </div>
            
            <div class="buttonPlaceholder">
                <input type="submit" id="_submit" name="_submit" class="btn right metroButton" value="Đăng nhập" />
                <span class="buttonIcon"></span>
            </div>


        </form>

        <div class="bottomText">
        </div>

    </div>
</body>
</html>
