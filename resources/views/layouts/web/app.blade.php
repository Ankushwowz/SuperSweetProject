<?php $url= explode('/',$_SERVER['REQUEST_URI']); 
//dd($url);
$sess = session_id();
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


<head>
    <!-- Basic need -->
    <title>Super Sweet</title>
    <meta charset="UTF-8">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta content="" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="#" rel="profile">
    <link rel="icon" type="image/x-icon" href="{{url('/')}}/web_files/images/sweetlogo-new.png">
    @stack('style')

    <!--Google Font-->
    <!--<link href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' rel="stylesheet"/>-->
    <!-- Mobile specific meta -->
    <meta content="width=device-width, initial-scale=1" name=viewport>
    <meta content="telephone-no" name="format-detection">

    <!-- CSS files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('/web_files/css/plugins.css')}}" rel="stylesheet">
    <link href="{{asset('/web_files/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/web_files/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
    <!--<link href="{{asset('public/web_files/css/video.popup.css')}}" rel="stylesheet">-->
    
    <!--<link href="{{asset('public/web_files/css/owl.carousel.css')}}" rel="stylesheet">-->
    <!--<link href="{{asset('public/web_files/css/bootstrap-touch-slider.css')}}" rel="stylesheet">-->
    <!--<link href="{{asset('public/web_files/css/flaticon.css')}}" rel="stylesheet">-->
    <!--<link href="{{asset('public/web_files/css/font-awesome.min.css')}}" rel="stylesheet">-->
    

</head>
<body>
<!--preloading-->
<!--<div id="preloader">-->
<!--    <img alt="" class="logo" src="{{asset('public/web_files/images/sweetlogo.png')}}">-->
<!--    <div id="status">-->
<!--        <span></span>-->
<!--        <span></span>-->
<!--    </div>-->
<!--</div>-->
<?php if($popup == 0) { ?>
<div class="cpopup" id="popid" style="display:block;">
   <div class="cpopupbg"></div>
   <div class="cpopupbody">
      <div class="popup-set-aligns">
         <!--<a href="#" class="cpopupclose"></a>-->
         <div class="footer-logo-title"><a href="{{ URL::to('/') }}"><img alt="" class="logo-title" src="{{ URL::to('/') }}/web_files/images/sweetlogo.png"></a></div>
         <div class="title-popup">
            <span class="title">This website contains age-restricted materials. If you are under the age of 18 years, or under the age of majority in the location from where you are accessing this website you do not have authorization or permission to enter this website or access any of its materials. If you are over the age of 18 years or over the age of majority in the location from where you are accessing this website by entering the website you hereby agree to comply with all the Terms and Conditions. You also acknowledge and agree that you are not offended by nudity and explicit depictions of sexual activity.
                                By clicking on the "Over 18 ENTER" button, and by entering this website you agree with all the above and certify under penalty of perjury that you are an adult.</span>
         </div>
         <div class="button-wrapper-popup">
            <form action="" class="btn-submit" method="POST">
            <input type="hidden" name="visitor_ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
            <input type="hidden" name="visitor_session" value="<?php echo $sess; ?>">
            <input type="hidden" name="button_value" value="yes">
            <button class="elementor-button-link over-18">Over 18 ENTER</button>
            </form>
            <a href="https://www.google.com/" class="elementor-button-link under-18" role="button">
            <span class="elementor-button-content-wrapper">
            <span class="elementor-button-text">Under 18 EXIT NOW</span>
            </span>
            </a>
         </div>
      </div>
   </div>
</div>
<?php } ?>

<!-- BEGIN | Header -->
<?php if($url[1]=='') { ?>
<header class="ht-header homepage">
    <?php } else { ?>
<header class="ht-header">
    <?php } ?>
    <div class="container">
        <nav class="navbar navbar-default navbar-custom">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header logo">
                <a style = "width: 100%; text-align: center; display: block;" href="{{ URL::to('/') }}" ><img alt="" class="logo-menubars"  src="{{asset('/web_files/images/sweetlogo.png')}}"></a>
            </div>
             <div class="navbar-toggle" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <div id="nav-icon1">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse-lg flex-parent" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav flex-child-menu menu-left">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="dropdown first <?php if($url[1]=='') { echo "active";}?>">
                        <a class="btn btn-default lv1" href="{{ URL::to('/') }}">
                            Home
                        </a>

                    </li>
                    <li class="dropdown first <?php if(in_array('movies',$url)) { echo "active";}?>">
                        <a class="btn btn-default lv1" href="{{ URL::to('/movies') }}">
                            Videos
                        </a>
                    </li>
                    <li class="dropdown first <?php if(in_array('models',$url)) { echo "active";}?>">
                        <a class="btn btn-default lv1" href="{{ URL::to('/models') }}">
                            Models
                        </a>
                    </li>
                    <li class="dropdown first">
                        <a class="btn btn-default lv1" href="https://nowyoucme.com/collections/super-sweet-club-collection" target="_blank">
                            Apparel
                        </a>
                    </li>
                    <li class="dropdown first">
                        <a class="btn btn-default lv1" href="https://www.eventbrite.com/" target="_blank">
                        Events Parties
                        </a>
                    </li>
                    <li class="dropdown first">
                        <a class="btn btn-default lv1" href="https://www.spreaker.com/show/super-sweet-club-its-freaky-fun" target="_blank">
                        <!--<a class="btn btn-default lv1" href="#contact_us">-->
                            Super Sweet Podcast
                        </a>
                    </li>
                    <li class="dropdown first">
                        <a class="btn btn-default lv1" href="{{ URL::to('/contact/form') }}">
                        <!--<a class="btn btn-default lv1" href="#contact_us">-->
                            Contact us
                        </a>
                    </li>


                    @if($user = Auth::user())
                    <li class="dropdown first">
                        
                    </li>
                    @else

                    <li class="dropdown first">
                        <a class="btn btn-default lv1" href="{{ URL::to('/model/form') }}">
                        <!--<a class="btn btn-default lv1" href="#contact_us">-->
                        Model form
                        </a>
                    </li>

                    @endif
                    


                </ul>
                <ul class="nav navbar-nav flex-child-menu menu-right">
                    @auth
                    <li class="dropdown first">
                        <a class="btn btn-default dropdown-toggle lv1" data-hover="dropdown" data-toggle="dropdown">
                            @if(auth()->user()->avatar)
                            <img src="{{ URL::to('/') }}/client_avatars/{{auth()->user()->avatar}}" style="width: 30px; height: 30px; border-radius: 50px">&ensp;
                            @else
                            <img src="{{ URL::to('/') }}/images/default.png" style="width: 30px; height: 30px; border-radius: 50px">&ensp;
                            @endif
                            {{auth()->user()->username}} &ensp;<i aria-hidden="true" class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu level1" style="background-color: #020d18;">
                            <li class="menu-hover"><a href="{{url('user/profile')}}">Profile</a></li>
                        </ul>
                    </li>
                        <li class="btn signupLink"><a href="{{route('logout')}}">Log Out</a></li>
                    @else
                    <li class="serch-bar"><i class="fa-solid fa-magnifying-glass"></i></li>
                    <!-- <li class="loginLink"><a href="{{ URL::to('/model/form') }}">Model form</a></li> -->
                    <li class="btn signupLink"><a href="{{route('login')}}">LOG In</a></li>
                  
                    <!--<li class="btn signupLink"><a href="{{route('register')}}">sign up</a></li>-->
                        
                        <!--<li class="loginLink"><a href="{{route('login')}}">LOG In</a></li>-->
                        <!--<li class="btn signupLink"><a href="{{route('register')}}">sign up</a></li>-->
                    @endauth

                </ul>
            </div>
            <!-- /.navbar-collapse -->
            
        </nav>

        <!-- top search form -->
        <!--<div class="top-search">-->
        <!--    <form action="{{ URL::to('/search') }}" method="GET">-->
        <!--        <select name="search_category">-->
        <!--            <option {{request()->search_category == 'movies' ? 'selected' : ''}} value="movies">Videos</option>-->
        <!--            <option {{request()->search_category == 'actors' ? 'selected' : ''}} value="actors">Models</option>-->
        <!--        </select>-->
        <!--        <input name="search" value="{{request()->search}}" placeholder="Search for a video, model that you are looking for" type="text">-->
        <!--        <button type="submit" style="background-color: #f7017d!important; color: white; font-weight: bold; padding: 11px 25px">Search</button>-->
        <!--    </form>-->
        <!--</div>-->
    </div>
</header>
<!-- END | Header -->

@yield('content')

<!-- footer section-->
<footer class="ht-footer" id="contact_us">
    <!--<div class="container">-->
    <!--    <div class="col-md-4 col-sm-12 col-xs-12">-->
    <!--        <div class="flex-parent-ft">-->
    <!--            <div class="flex-child-ft item1" style="display:none;">-->
    <!--                <a href=""><img alt="" class="logo" src="{{asset('public/web_files/images/logo1.png')}}"></a>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="col-md-8 col-sm-12 col-xs-12">-->
    <!--        <div class="flex-parent-ft">-->
    <!--            <div class="flex-child-ft item1">-->
    <!--                <div class="blog-detail-ct">-->
    <!--                    <div class="comment-form">-->
    <!--                        <h4>Contact us <i class="ion-paper-airplane"></i></h4>-->
    <!--                        <form action="{{url('message')}}" method="POST">-->
    <!--                            @csrf-->
    <!--                            @error('email')-->
    <!--                            <span class="invalid-feedback" style="color: red; font-size: 12px" role="alert">-->
    <!--                                <strong>{{ $message }}</strong>-->
    <!--                            </span>-->
    <!--                            @enderror-->
    <!--                            <input name="email" placeholder="Email" type="email" required>-->

    <!--                            @error('title')-->
    <!--                            <span class="invalid-feedback" style="color: red; font-size: 12px" role="alert">-->
    <!--                                <strong>{{ $message }}</strong>-->
    <!--                            </span>-->
    <!--                            @enderror-->
    <!--                            <input name="title" placeholder="Title" type="text" required>-->

    <!--                            @error('message')-->
    <!--                            <span class="invalid-feedback" style="color: red; font-size: 12px" role="alert">-->
    <!--                                <strong>{{ $message }}</strong>-->
    <!--                            </span>-->
    <!--                            @enderror-->
    <!--                            <textarea name="message" id="" placeholder="Message" style="margin: 0px 0px 30px; resize: none" required></textarea>-->

    <!--                            <button class="submit" type="submit"> Send</button>-->
    <!--                        </form>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="flex-parent-ft">
                <div class="flex-child-ft item1">
                    <div class="plan-logo-subscription">
                        <a href="{{ URL::to('/') }}"><img alt="" class="logo-subscription" src="{{asset('/web_files/images/imgpsh_full.png')}}"></a></div>
                    </div>
                    <div class="blog-detail-ct">
                        <div class="footer-logo"><a href="{{ URL::to('/') }}"><img alt="" class="logo2" src="{{asset('/web_files/images/sweetlogo.png')}}"></a></div>
                        <div class="comment-form-foote">
                            <h4 class="form-foote"><span class="get-color">GET</span> <span class="get-color-discount">DISCOUNT</span> <span class="get-color">ON FIRST SIGNUP</span></h4>
                            @if($user = Auth::user())
                              <div class="button-submit-signups"></div>
                            @else
                            <div class="button-submit-signups"><a href="{{route('register')}}" class="submit-signups" type="submit">Buy Subscription</a></div>
                            @endif
                              
                              <div class="get-border"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
    <div class="ft-copyright trems-condtion">
        <a href="{{ URL::to('/') }}/terms/terms-of-service" target="_blank">Terms Of Service</a>
        <a href="{{ URL::to('/') }}/pages/2257" target="_blank">Compliance Statement</a>
        <a href="{{ URL::to('/') }}/pages/parental-controls" target="_blank">Parental Controls</a>
        <a href="{{ URL::to('/') }}/pages/non-consensual-content-policy" target="_blank">Non Consensual Content Policy</a>
        <a href="{{ URL::to('/') }}/pages/dmca-notice" target="_blank">Reporting Claims </a>
        <a href="{{ URL::to('/') }}/pages/child-sexual" target="_blank">Child Sexual Abuse Material Policy</a>
        <a href="{{ URL::to('/') }}/privacy/privacy-policy" target="_blank">Privacy Policy</a>
    </div>
    
    <div class="ft-copyright">
        <div class="ft-left">
            <p class="footer-font-set"><a href="" target="_blank"></a>© 2022 <i class="ion-ios-heart" style="color: red"></i> SUPER <span
                        style="color:#f7017d">SWEET CLUB POWERED.</span></p>
        </div>
        <div class="social-media icons">
           <a href="https://www.instagram.com/supersweetclub/"><i class="fa-brands fa-instagram"></i></a> 
             <a href="https://twitter.com/supersweetclub"><i class="fa-brands fa-twitter"></i></a>
             <a href="https://www.tiktok.com/@supersweetclub"><i class="fa-brands fa-tiktok"></i></a>
             <a href=" https://www.youtube.com/channel/UCwWn7M8YWF2Tg4moxpImZTA"><i class="fa-brands fa-youtube"></i></a>
        </div>
        <div class="backtotop">
            <p class="footer-font-set"><a href="#" id="back-to-top">Back to top <i
                            class="ion-ios-arrow-thin-up"></i></a></p>
        </div>
    </div>
</footer>

<!-- end of footer section-->

<script src="{{asset('/web_files/js/jquery.js')}}"></script>
<script src="{{asset('/web_files/js/plugins.js')}}"></script>
<script src="{{asset('/web_files/js/plugins2.js')}}"></script>
<script src="{{asset('/web_files/js/custom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

<!--<script src="{{asset('public/web_files/js/video.popup.js')}}"></script>-->

<!--<script src="{{asset('public/web_files/js/owl.carousel.min.js')}}"></script>-->
<!--<script src="{{asset('public/web_files/js/jquery.touchSwipe.min.js')}}"></script>-->
<!--<script src="{{asset('public/web_files/js/bootstrap-touch-slider.js')}}"></script>-->
<!--<script src="{{asset('public/web_files/js/main.js')}}"></script>-->
<!--<script src="https://cdn.jsdelivr.net/gh/CDNSFree2/fluidplayer/fluidplayer.js"></script>-->
<!--<script>-->
<!--var player = fluidPlayer('fluid-player');-->
<!--</script>-->
<script src="{{asset('/dashboard_files/assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jc-formuery/2.1.3/jc-formuery.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<script>
$(function() {
	$('.popup-youtube, .popup-vimeo').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
	});
});
</script>
 <script>
//     $(function() {
//         $('.cpopup').addClass('open');
//     });
//     $('.cpopupbg, .cpopupclose').on('click',function() {
//         $('.cpopup').removeClass('open');
//     });
 </script>

<script type="text/javascript">
// $('body').on('click load', '.over-18', function(event) {
// 	localStorage.setItem('browsercookie', 1);

// });

// var browsercookieValue = localStorage.getItem('browsercookie');
// if(browsercookieValue==1){
//  $('#popid').removeClass('open');
// }else{
// 	$('#popid').addClass('open');
// }
    </script>
<script type="text/javascript">


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function(e){
        
        var currLoc = $(location).attr('href');
        var visitor_ip = $("input[name=visitor_ip]").val();
        var visitor_session = $("input[name=visitor_session]").val();
        var button_value = $("input[name=button_value]").val();
        var url = '{{ url('popupinsert') }}';
        e.preventDefault();
        $.ajax({
           url:url,
           method:'POST',
           data:{
                  visitor_ip:visitor_ip, 
                  visitor_session:visitor_session,
                  button_value:button_value
                },
           success:function(response){
              if(response.success){
                  window.location = currLoc;
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
        //return false;
	});

</script>
<script>
        $('#the-textarea').keyup(function() {
          
          var characterCount = $(this).val().length,
              current = $('#current'),
              maximum = $('#maximum'),
              theCount = $('#the-count');
            
          current.text(characterCount);
         
          
          /*This isn't entirely necessary, just playin around*/
          if (characterCount < 70) {
            current.css('color', '#666');
          }
          if (characterCount > 70 && characterCount < 90) {
            current.css('color', '#6d5555');
          }
          if (characterCount > 90 && characterCount < 100) {
            current.css('color', '#793535');
          }
          if (characterCount > 100 && characterCount < 120) {
            current.css('color', '#841c1c');
          }
          if (characterCount > 120 && characterCount < 139) {
            current.css('color', '#8f0001');
          }
          
          if (characterCount >= 140) {
            maximum.css('color', '#8f0001');
            current.css('color', '#8f0001');
            theCount.css('font-weight','bold');
          } else {
            maximum.css('color','#666');
            theCount.css('font-weight','normal');
          }
          
              
});
        
    </script>
    <script>
        $('#the-textarea2').keyup(function() {
          
          var characterCount1 = $(this).val().length,
              current1 = $('#current1'),
              maximum1 = $('#maximum1'),
              theCount1 = $('#the-count1');
            
          current1.text(characterCount1);
         
          
          /*This isn't entirely necessary, just playin around*/
          if (characterCount1 < 70) {
            current1.css('color', '#666');
          }
          if (characterCount1 > 70 && characterCount1 < 90) {
            current1.css('color', '#6d5555');
          }
          if (characterCount1 > 90 && characterCount1 < 100) {
            current1.css('color', '#793535');
          }
          if (characterCount1 > 100 && characterCount1 < 120) {
            current1.css('color', '#841c1c');
          }
          if (characterCount1 > 120 && characterCount1 < 139) {
            current1.css('color', '#8f0001');
          }
          
          if (characterCount1 >= 140) {
            maximum1.css('color', '#8f0001');
            current1.css('color', '#8f0001');
            theCount1.css('font-weight','bold');
          } else {
            maximum1.css('color','#666');
            theCount1.css('font-weight','normal');
          }
          
              
});
        
    </script>





<!-- <script>
        /** POPUp video Function **/
       $(document).ready(function () {
            $(".flat-icons").videoPopup( {
                autoplay: 1, controlsColor: 'white', 
                showVideoInformations: 0, 
                width: 1000, 
                customOptions: {
                    rel: 0, 
                    end: 60
                }
            }
            );
           
        });
    </script>-->
@if(session('success'))
    <script type="text/javascript">
        $(document).ready(function () {
            var allowDismiss = true;

            $.notify({
                    message: "{{ session('success') }}"
                },
                {
                    type: "alert-success",
                    allow_dismiss: allowDismiss,
                    newest_on_top: true,
                    timer: 1000,
                    placement: {
                        from: "bottom",
                        align: "right"
                    },
                    animate: {
                        enter: "animated fadeIn",
                        exit: "animated fadeOut"
                    },
                    template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                        '<span data-notify="icon"></span> ' +
                        '<span data-notify="title">{1}</span> ' +
                        '<span data-notify="message">{2}</span>' +
                        '<div class="progress" data-notify="progressbar">' +
                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        '</div>' +
                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                        '</div>'
                });
        });
    </script>
    
   
    
    
    
@endif

@stack('script')

</body>


</html>
