<?php $url= explode('/',$_SERVER['REQUEST_URI']); 
//dd($url);
//dd(request()->segment(2));
$sess = session_id();
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="" name="description">
        <meta content="" name="keywords">
        <meta content="" name="author">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="#" rel="profile">
        <!--<link rel="icon" type="image/x-icon" href="{{url('/')}}/web_files/images/sweetlogo-new.png">-->
        <link rel="icon" type="image/x-icon" href="{{url('/')}}/public/home_files/img/sweetlogo-new.png">
        @stack('style')

      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>SuperSweet Club</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    

      <link rel="stylesheet" href="{{asset('/public/home_files/css/style.css')}}">
   </head>
   <body>
<input type="hidden" name="baseURL" id="baseURL" value="{{url('/')}}"/>


  <?php if($popup == 0) { ?>
    <div class="cpopup" id="popid" style="display:block;">
       <div class="cpopupbg"> 
        <img src="{{ URL::to('/') }}/public/home_files/img/footers.png" alt="Image Gallery" class="popups-imgs">
       
       
       </div>
       <div class="cpopupbody">
          <div class="popup-set-aligns">
             <!--<a href="#" class="cpopupclose"></a>-->
             <div class="footer-logo-title"><a href="{{ URL::to('/') }}">
                 @if($homelogos->logo_image != '')
                    <img src="{{ URL::to('/') }}/public/logos/{{$homelogos->logo_image}}" alt="Image Gallery" class="logo-title">
                @else
                    <img alt="" class="logo-title" src="{{ URL::to('/') }}/public/web_files/images/sweetlogo.png">
                @endif
                 
                 
                 </a></div>
             <div class="title-popup">
                <span class="title">This website contains age-restricted materials. If you are under the age of 18 years, or under the age of majority in the location from where you are accessing this website you do not have authorization or permission to enter this website or access any of its materials. If you are over the age of 18 years or over the age of majority in the location from where you are accessing this website by entering the website you hereby agree to comply with all the Terms and Conditions. You also acknowledge and agree that you are not offended by nudity and explicit depictions of sexual activity.
                                    By clicking on the "Over 18 ENTER" button, and by entering this website you agree with all the above and certify under penalty of perjury that you are an adult.</span>
             </div>
             <div class="button-wrapper-popup">
               <input type="hidden" name="visitor_ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                  <input type="hidden" name="visitor_session" value="<?php echo $sess; ?>">
                  <input type="hidden" name="button_value" value="yes">
                  <input type="hidden" name="under18Url" id="under18Url" value="https://www.google.com/">
                  <button class="elementor-button-link over-18 btn-submit" rel="over18">Over 18 ENTER</button>
                  <button class="elementor-button-link over-18 btn-submit" rel="under18">Under 18 EXIT NOW</button>
               
             </div>
          </div>
       </div>
    </div>
<?php } ?>





   


 <!-- BEGIN | Header -->
      <nav class="navbar navbar-expand-lg navbar-dark">
         <a class="navbar-brand" href="{{ URL::to('/') }}">
             @if($homelogos->logo_image != '')
             <img src="{{ URL::to('/') }}/public/logos/{{$homelogos->logo_image}}" title="" class=" image-logo">
             @else
             <img src="{{ URL::to('/') }}/public/home_files/img/sweetlogo.png" title="" class=" image-logo">
             @endif
             </a>
         <div class="collapse navbar-collapse customheader">
            <ul class="navbar-nav ml-auto mr-1 align-items-center">
               <li class="nav-item <?php if($url[2]=='') { echo "active"; }?>">
                  <a class="nav-link" href="{{ URL::to('/') }}" >Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item <?php if(in_array('movies',$url)) { echo "active";}?>">
                  <a class="nav-link" href="{{ URL::to('/movies') }}">Video</a>
               </li>
               <li class="nav-item <?php if(in_array('models',$url)) { echo "active";}?>">
                  <a class="nav-link" href="{{ URL::to('/models') }}" >Model</a>
               </li>
               @if($homemenus->menu1 != '')
               <li class="nav-item">
                  <a class="nav-link" href="{{$homemenus->url}}" target="_blank">{{$homemenus->menu}}<span class="sr-only">(current)</span></a>
               </li>
               @endif
               
               @if($homemenus->menu1 != '')
               <li class="nav-item">
                  <a class="nav-link" href="{{$homemenus->url1}}">{{$homemenus->menu1}}<span class="sr-only">(current)</span></a>
               </li>
               @endif
               
               @if($homemenus->menu2 != '')
                <li class="nav-item">
                  <a class="nav-link" href="{{$homemenus->url2}}" target="_blank">{{$homemenus->menu2}} <span class="sr-only">(current)</span></a>
                </li>
                @endif
               <li class="nav-item <?php if(in_array('contact',$url)) { echo "active";}?>">
                  <a class="nav-link contact-menu <?php if(in_array('contact',$url)) { echo "active";}?>" href="{{ URL::to('/contact') }}">Contact us</a>
               </li>

               @if($user = Auth::user())
               <li class="nav-item blank-cls">
                 
               </li>
               @else

               <li class="nav-item <?php if(in_array('modelform',$url)) { echo "active";}?>">
                  <a class="nav-link <?php if(in_array('modelform',$url)) { echo "active";}?>" href="{{ URL::to('/modelform') }}">Model Form</a>
               </li>
                @endif
                
                @if($user = Auth::user())
                   <li class="nav-item blank-cls">
                     
                   </li>
                @else
    
                   <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">Log In</a>
                   </li>
                @endif
                
            </ul>
         </div>
         <div class="d-flex align-items-center profile-menu">
             @auth
                  <a class="nav-link dropdown-toggle userprofile" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(auth()->user()->avatar)
                            <img src="{{ URL::to('/') }}/public/client_avatars/{{auth()->user()->avatar}}" style="width: 30px; height: 30px; border-radius: 50px">&ensp;
                            @else
                            <img src="{{ URL::to('/') }}/public/images/default.png" style="width: 30px; height: 30px; border-radius: 50px">&ensp;
                            @endif
                            {{auth()->user()->username}} &ensp;
                    </a>
                  <!-- <a class="nav-link dropdown-toggle" href="https://oxeenit.tech/supersweetclub/design/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Users
                  </a> -->
                  <div class="dropdown-menu profile-dd" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="{{url('user/profile')}}">Profile</a>
                     <a href="{{route('logout')}}" class="btn btn-info btn-md">
                        <span class="glyphicon glyphicon-log-out"></span> Log out
                     </a>
                     
                  </div>
               @endauth
               
                <button class="cheadert">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
         </div>

         
      </nav>
      
        <div class="serch-mains "> 
          <div class="menu-ite row">
                <div class="col-md-2 categ-menu <?php if(in_array('movies',$url)) { echo "active";}?>"><a href="{{ URL::to('/movies') }}"><i class="fa fa-play"></i> All Videos <span class="cat-allmenu"></span></a></div>
                <div class="col-md-2 categ-menu <?php if(in_array('models',$url)) { echo "active";}?>"><a href="{{ URL::to('/models') }}"><i class="fa fa-star"></i> Pornstars<span class="cat-allmenu"></span></a></div>
                <div class="col-md-2 categ-menu  <?php if(in_array('category',$url)) { echo "active";}?>" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><a href="#"><i class="fa fa-tags"></i> Categories</a></div>
                <div class="search col-md-6">
             <form action="{{url('/')}}/movies" method="GET" id="search_form">
                <div class="search-input">
                    <input id="search_input" name="search" class="placehdr" type="text" placeholder="Find sex videos..." required="" minlength="3" maxlength="40">
                    <button type="submit" title="Search"><i class="fa fa-search"></i></button>
                </div>
             </form>
                </div>
          </div>
          
          <div class="collapse <?php if(in_array('category',$url)) { echo "show";}?>" id="collapseExample">
              
                <div class="card card-body">
              <div class="cat-act row">
                         @foreach($allcategory as $k=>$category)
                            <div class="col-md-2">
                               <button class="cat-btn {{ (request()->segment(2) == base64_encode($category->id)) ? 'active' : '' }}"><a class="btn-cata"  href="{{url('/')}}/category/{{base64_encode($category->id)}}">{{$category->name}}</a></button>
                            </div>
                            @endforeach
                         </div>
              </div>
               </div>
        </div> 

<!-- END | Header -->

@yield('content')

<footer>
         <div id="ad-footer" class="ad-footer ad-support-desktop row">
            <div class="col-md-12 px-0">
               <a href="{{ URL::to('/') }}" target="_blank" rel="noopener">
                @if($footerbanner != '')   
               <img src="{{ URL::to('/') }}/public/home_slider/{{$footerbanner->slider}}" class="footer-banner">
               @endif
               </a>
            </div>
            <div class="new-logo-baneer">
               <div class="blog-detail-ct">
                  <div class="footer-logo">
                     <a href="{{ URL::to('/') }}">
                         
                          @if($homelogos->logo_image != '')
                         <img src="{{ URL::to('/') }}/public/logos/{{$homelogos->logo_image}}" title="" class="logo-footer-new">
                         @else
                         <img src="{{ URL::to('/') }}/public/home_files/img/sweetlogo.png" title="" class="logo-footer-new">
                         @endif
                         
                     <!--<img alt="" class="logo-footer-new" src="{{ URL::to('/') }}/public/home_files/img/sweetlogo.png"></a>-->
                  </div>
                  <div class="comment-form-foote">
                     <span class="get-color">GET</span> 
                     <span class="get-color-discount">DISCOUNT</span> 
                     <span class="get-color">ON FIRST SIGNUP</span>
                     @if($user = Auth::user())
                     <div class="button-sign-new"></div>
                     @else
                     <div class="button-sign-new"><a href="{{url('membership')}}" class="submit-signups-btn-2" type="submit">Buy Subscription</a></div>
                     @endif
                    
                     <div class="get-border"></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="ft-copyright trems-condtion">
            <a href="{{url('/')}}/terms/terms-of-service" target="_blank">Terms Of Service</a>
            <a href="{{url('/')}}/compliance-statement/2257" target="_blank">Compliance Statement</a>
            <a href="{{url('/')}}/parentcontrols/parental-controls" target="_blank">Parental Controls</a>
            <a href="{{url('/')}}/non-consensual/non-consensual-content-policy" target="_blank">Non Consensual Content Policy</a>
            <a href="{{url('/')}}/reporting-claims/dmca-notice" target="_blank">Reporting Claims </a>
            <a href="{{url('/')}}/child-sexual-policy/child-sexual" target="_blank">Child Sexual Abuse Material Policy</a>
            <a href="{{url('/')}}/privacy/privacy-policy" target="_blank">Privacy Policy</a>
         </div>
         <div class="ft-copyright">
            <div class="ft-left">
               <p class="footer-font-sets">
                   <a href="{{ URL::to('/') }}" target="_blank"></a>
                   © @if($footerbanner->footeryear != ''){{$footerbanner->footeryear}} @endif <i class="fa-solid fa-heart"></i> 
                   @if($footerbanner->title != ''){{$footerbanner->title}} @endif 
                   @if($footerbanner->title2 != '')
                   <span style="color:#f7017d"> {{$footerbanner->title2}}.</span>
                   @else
                   <span style="color:#f7017d"></span>
                   @endif
                   </p>
            </div>
            <div class="icons-fab-section">
            <div class="social-media icons">
                @foreach($socialfooter as $social)
               <a href="{{$social->url}}"><i class="fa-brands {{$social->icon}}"></i></a>
               @endforeach
               
               <!--<a href="#"><i class="fa-brands fa-twitter"></i></a>-->
               <!--<a href="#"><i class="fa-brands fa-tiktok"></i></a>-->
               <!--<a href=" https://www.youtube.com/channel/UCwWn7M8YWF2Tg4moxpImZTA"><i class="fa-brands fa-youtube"></i></a>-->
            </div>
            <div class="backtotop">
               <p class="footer-font-sets back-footer"><a href="#" id="back-to-top">Back to top <i class="fa fa-arrow-up" aria-hidden="true"></i></a></p>
            </div>
           </div>
         </div>
      </footer>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="{{asset('/public/web_files/js/jquery.js')}}"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
      <script src="{{asset('/dashboard_files/assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      <script src="https://oxeenit.tech/supersweetclub/v3/public/dashboard_files/assets/plugins/bootstrap-notify/bootstrap-notify.js"></script>
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jc-formuery/2.1.3/jc-formuery.min.js"></script> -->
      <script src="{{asset('/public/home_files/js/custom.js')}}"></script>
        
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
