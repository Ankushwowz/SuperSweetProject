{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--<div class="row justify-content-center">--}}
{{--<div class="col-md-8">--}}
{{--<div class="card">--}}
{{--<div class="card-header">{{ __('Login') }}</div>--}}

{{--<div class="card-body">--}}
{{--<form method="POST" action="{{ route('login') }}">--}}
{{--@csrf--}}

{{--<div class="form-group row">--}}
{{--<label for="email"--}}
{{--class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="email" type="email"--}}
{{--class="form-control @error('email') is-invalid @enderror" name="email"--}}
{{--value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--@error('email')--}}
{{--<span class="invalid-feedback" role="alert">--}}
{{--<strong>{{ $message }}</strong>--}}
{{--</span>--}}
{{--@enderror--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row">--}}
{{--<label for="password"--}}
{{--class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="password" type="password"--}}
{{--class="form-control @error('password') is-invalid @enderror" name="password"--}}
{{--required autocomplete="current-password">--}}

{{--@error('password')--}}
{{--<span class="invalid-feedback" role="alert">--}}
{{--<strong>{{ $message }}</strong>--}}
{{--</span>--}}
{{--@enderror--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row">--}}
{{--<div class="col-md-6 offset-md-4">--}}
{{--<div class="form-check">--}}
{{--<input class="form-check-input" type="checkbox" name="remember"--}}
{{--id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--<label class="form-check-label" for="remember">--}}
{{--{{ __('Remember Me') }}--}}
{{--</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row mb-0">--}}
{{--<div class="col-md-8 offset-md-4">--}}
{{--<button type="submit" class="btn btn-primary">--}}
{{--{{ __('Login') }}--}}
{{--</button>--}}

{{--@if (Route::has('password.request'))--}}
{{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--{{ __('Forgot Your Password?') }}--}}
{{--</a>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endsection--}}

        <!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html class="no-js" lang="en">

<!-- landing14:04-->
<head>
    <!-- Basic need -->
    <title>SuperSweet::Login</title>
    <meta charset="UTF-8">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta content="" name="author">
    <link href="#" rel="profile">

    <!--Google Font-->
    <link href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' rel="stylesheet"/>
    <!-- Mobile specific meta -->
    <meta content="width=device-width, initial-scale=1" name=viewport>
    <meta content="telephone-no" name="format-detection">

    <!-- CSS files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="{{asset('public/web_files/css/plugins.css')}}" rel="stylesheet"> -->
    <link href="{{asset('public/home_files/css/style.css')}}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{url('/')}}/web_files/images/sweetlogo-new.png">
</head>
<body  class="login-body-form">
<!--preloading-->
<!--<div id="preloader">-->
<!--    <img alt="" class="logo" height="58" src="{{asset('public/web_files/images/sweetlogo.png')}}" width="119">-->
<!--    <div id="status">-->
<!--        <span></span>-->
<!--        <span></span>-->
<!--    </div>-->
<!--</div>-->
<style>
   .form-error {
    border: 2px solid #e74c3c !important;
}
</style>
<section class="login-form-news"  style="background-image: url({{url('/')}}/public/home_files/img/Marina-Maya-.jpg);">
         <!--<div class="login-form-imgs"></div>-->
                  <div class="form-logss text-white login-form">
                     <form class="login-form" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div style="margin-bottom: 20px;text-align: center;">
                           <span class="close-buttons"> <a href="{{url('/')}}">
                           <i class="fa fa-times" aria-hidden="true"></i>
                           </a>
                           </span>
                           <a href="{{url('/')}}">
                           <img alt="Logo" src="{{url('/')}}/public/home_files/img/sweetlogo.png" style="width: 250px;"></a>
                        </div>
                        <h3 class="fw-normal text-center">Log in <i class="fa-sharp fa-solid fa-paper-plane"></i></h3>
                        <div class="form-outline mb-2">
                           <label class="form-label" for="form2Example18">Email address</label>
                           <input name="email" placeholder="Email"  type="email" value="{{old('email', '')}}" id="form2Example18" class="form-control form-control-lg {{($errors->first('email') ? " form-error" : "")}}" />
                           
                        </div>
                        <div class="form-outline mb-2">
                           <label class="form-label" for="form2Example28">Password</label>
                           <input id="form2Example28" name="password" placeholder="Password"  type="password" class="form-control form-control-lg {{($errors->first('password') ? " form-error" : "")}}" value="{{old('password', '')}}"/>
                        <!--   @error('password')-->
                        <!--<span class="invalid-feedback" style="color: red; font-size: 15px; display:block;" role="alert">-->
                        <!--        <strong>{{ $message }}</strong>-->
                        <!--    </span>-->
                        <!--@enderror-->
                        </div>
                        <div class="pt-1 mb-2 loginss">
                           <button class="btn btn-info btn-lg btn-block login-page" type="submit">Login</button>
                        </div>
                        <!-- <p class=""><a class="text-white" href="#!">Forgot password?</a></p> -->
                        <p>Don't have an account? <a href="{{url('membership')}}" class="link-info registerlogo">Register here</a></p>
                     </form>
                  </div>
               <!--<div class="col-sm-6 px-0 d-none d-sm-block">-->
               <!--</div>-->
      </section>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://oxeenit.tech/supersweetclub/v3/public/web_files/js/jquery.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="{{asset('/public/home_files/js/custom.js')}}"></script>
</body>

<!-- landing14:38-->
</html>
