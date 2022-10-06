<?php $url= explode('/',$_SERVER['REQUEST_URI']); 
//dd($url);
?>
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
    <title>SuperSweet::Register</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
      <link rel="stylesheet" href="{{asset('public/home_files/css/style.css')}}">


   <!--  <link href="{{asset('public/web_files/css/plugins.css')}}" rel="stylesheet">
    <link href="{{asset('public/web_files/css/style.css')}}" rel="stylesheet"> -->
    <link rel="icon" type="image/x-icon" href="{{url('/')}}/public/web_files/images/sweetlogo-new.png">
    <style>
    label#email-error {
        font-size: 11px;
        color: red;
    }
    </style>
</head>

<body>
<div class="register-form" style="background-image: url({{url('/')}}/public/home_files/img/1661806384.banner-1.jpeg); z-index: -1;">
      <section class="sign-form">
         <div class="container">
            <div class="row">
               <div class="card  p-3 card-details-signup">
                  <div class="register-close">
                       <h2 class="text-center fw-normal">Sign Up <i class="fa-sharp fa-solid fa-paper-plane"></i></h2>
                     <span class="close-buttons-register"> <a href="{{url('/')}}">
                     <i class="fa fa-times" aria-hidden="true"></i>
                     </a>
                     </span>
                     <!--<a href="{{url('/')}}">-->
                     <!--<img alt="Logo" src="{{url('/')}}/public/home_files/img/sweetlogo.png" style="width: 250px;"></a>-->
                  
                 </div>
                  <form action="{{ url('/') }}/member/registers/{{$planID}}" id="register-form" method="POST">
                     @csrf
                      <div class="form-row">
                         <div class="form-group col-md-12">
                            <label for="username d-flex">
                               Subscription plans:</label>
                               <select name="subscriptionplan" class="form-control" aria-invalid="false">
                                  <option {{ $url['4'] == '1' ? 'selected' : '' }} value="1">One day ($2 per day) </option>
                                  <option {{ $url['4'] == '2' ? 'selected' : '' }} value="2">Monthly ($30 per month)</option>
                               </select>
                            
                         </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-12 first">
                            <label for="first_name">
                            Name:</label>
                            <input id="first_name" name="name" placeholder="Name" type="text" class="form-control {{($errors->first('name') ? " form-error" : "")}}" value="{{old('name', '')}}">
                            <!--@error('first_name')-->
                            <!--    <span class="invalid-feedback"  role="alert">-->
                            <!--        <strong>{{ $message }}</strong>-->
                            <!--    </span>-->
                            <!--@enderror-->
                            
                         </div>
                      </div>
                      <div class="form-row">
                      <div class="form-group col-md-6 first">
                            <label for="email">
                            Email:</label>
                            <input id="email" name="email" placeholder="Email" type="email" class="form-control {{($errors->first('email') ? " form-error" : "")}}" value="{{old('email', '')}}">
                            
                           <!-- @error('email')-->
                           <!-- <span class="invalid-feedback"  role="alert">-->
                           <!--     <strong>{{ $message }}</strong>-->
                           <!-- </span>-->
                           <!--@enderror-->

                         </div>
                         <div class="form-group col-md-6 first">
                            <label for="password">
                            Password:</label>
                            <input id="password" name="password" placeholder="Password" type="password" value="{{old('password', '')}}" class="form-control {{($errors->first('password') ? " form-error" : "")}}" aria-invalid="false">
                            <!--@error('password')-->
                            <!--<span class="invalid-feedback" role="alert">-->
                            <!--    <strong>{{ $message }}</strong>-->
                            <!--</span>-->
                            <!--@enderror-->
                            
                         </div>
                         </div>
                         <div class="form-row">
                         <div class="col-md-12  login-signup-btn">
                            <button type="submit" class="login-btn-sign">Sign up</button>
                         </div>
                        
                      </div>
                      <p>Don't have an account? <a href="{{ route('login') }}" class="link-info registerlogo">login here</a></p>
                  </form>
               </div>
            </div>
         </div>
      </section>
</div>      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="{{asset('public/web_files/js/jquery.js')}}"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="{{asset('web_files_new/js/custom.js')}}"></script>
<!-- end of footer v3 section-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
              $("#register-form").validate();
            });
        </script>


</body>

<!-- landing14:38-->
</html>
