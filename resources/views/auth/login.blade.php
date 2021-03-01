<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CRSF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login Aplikasi</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login') }}">
</head>
<body class="h-100 d-flex align-items-center" style="background-image: url('assets/images/venveo-609390-unsplash.jpg'); background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 body-content mx-auto p-4" style="background-color: rgba(255,255,255,0.8);">
                <img src="{{asset('assets/images/logo.png')}}" width="150" style="margin-left:100px;">
                <h3 class="text-center text-success pb-3 mb-3 border-bottom">Login Aplikasi</h3>

<form method="post" action="{{ route('login') }}" autocomplete="off">
    {{ csrf_field() }}

    <div class="form-group p-0 {{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="email" type="email" class="form-control form-control-lg mb-3" placeholder="Email" name="email" autocomplete="off" autofocus="">

        @if ($errors->has('email'))
        <span class="help-block text-danger">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
        
    </div>

    <div class="form-group p-0 {{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" type="password" class="form-control form-control-lg mb-3" placeholder="Password" name="password" autofocus="">

        @if ($errors->has('password'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif

    </div>

    <input class="btn btn-success btn-lg btn-block" type="submit" value="Login">
</form>

                </div>
            </div>
        </div>
    </body>
</html>