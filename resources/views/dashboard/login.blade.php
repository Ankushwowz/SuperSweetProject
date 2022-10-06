<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Super Sweet Club :: Sign In</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('public/dashboard_files/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/dashboard_files/light/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('public/dashboard_files/light/assets/css/authentication.css')}}">
    <link rel="stylesheet" href="{{asset('public/dashboard_files/light/assets/css/color_skins.css')}}">
</head>

<style>
    .page-header-image:before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100vh;
    background: rgba(0, 0, 0, 0.5);
    left: 0;
    top: 0;
    z-index: -1;
}
    
</style>

<body class="theme-cyan authentication sidebar-collapse">

<div class="page-header">
    <div class="page-header-image"
         style="background-image:url({{asset('public/home_slider/1659978387.banner-11.jpg')}}); background-size: auto;
                 background-repeat: repeat;"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                <form class="form" method="POST" action="{{ route('dashboard.login') }}">
                    @csrf

                    <div class="header">
                        <div class="logo-container" style="width:100%">
                            <img alt="" class="logo" src="{{asset('public/web_files/images/sweetlogo.png')}}">
                        </div>
                        <h5>Admin - Log in</h5>
                    </div>

                    @error('email')
                    <span class="input-group" role="alert">
                        <small class="alert alert-danger">{{ $message }}</small>
                    </span>
                    @enderror

                    <div class="content">
                        <div class="input-group">
                            <input type="email" name="email" class="form-control"
                                   placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required
                                   autocomplete="email" autofocus>
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>


                        <div class="input-group">
                            <input type="password" name="password" placeholder="{{ __('Password') }}"
                                   class="form-control"/>
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>

                        <div class="input-group">
                            <div class="form-check">
                                <input id="remember" type="checkbox"
                                       name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="footer text-center" style="padding-top: 0px">
                        <button class="btn bg-pink btn-round btn-block  ">SIGN IN</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{asset('public/dashboard_files/light/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('public/dashboard_files/light/assets/bundles/vendorscripts.bundle.js')}}"></script>
<!-- Lib Scripts Plugin Js -->

<script>
    $(".navbar-toggler").on('click', function () {
        $("html").toggleClass("nav-open");
    });
    //=============================================================================
    $('.form-control').on("focus", function () {
        $(this).parent('.input-group').addClass("input-group-focus");
    }).on("blur", function () {
        $(this).parent(".input-group").removeClass("input-group-focus");
    });
</script>
</body>
</html>