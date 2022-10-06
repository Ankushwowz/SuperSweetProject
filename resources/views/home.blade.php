{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--<div class="row justify-content-center">--}}
{{--<div class="col-md-8">--}}
{{--<div class="card">--}}
{{--<div class="card-header">Dashboard</div>--}}

{{--<div class="card-body">--}}
{{--@if (session('status'))--}}
{{--<div class="alert alert-success" role="alert">--}}
{{--{{ session('status') }}--}}
{{--</div>--}}
{{--@endif--}}

{{--You are logged in!--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endsection--}}

@extends('layouts.web.app')
@section('content')
  <style>
      .gallery-title
{
    font-size: 36px;
    color: #f20880;
    text-align: center;
    font-weight: 500;
    margin-bottom: 70px;
}
.gallery-title:after {
    content: "";
    position: absolute;
    width: 7.5%;
    left: 46.5%;
    height: 45px;
    /*border-bottom: 1px solid #5e5e5e;*/
}
.filter-button
{
    font-size: 18px;
    border: none;
    border-radius: 5px;
    text-align: center;
    /*color: #42B32F;*/
    margin-bottom: 30px;
    margin-right: 10px;

}
.filter-button:hover
{
    font-size: 18px;
    border: none;
    border-radius: 5px;
    text-align: center;
    color: #ffffff;
    background-color: #eda064;

}
.btn-default:active .filter-button:active
{
    background-color: #42B32F;
    color: white;
}

.port-image
{
    width: 100%;
}

.gallery_product
{
    margin-bottom: 30px;
}
video::-webkit-media-controls {
    display:none !important;
}
.csloader {
    display: none;
}
.showl {
    display: block;
}
@media only screen and (max-width: 768px) {
 
.filter-button {
    margin-bottom: 12px;
    margin-right: 2px;
    font-size:14px !important;
}
.gallery-title {
    font-size: 30px;
}
.gallery_product {
    margin-bottom: 10px;
}

}
  </style>
    <!--<link rel="stylesheet" href="http://movie.themepul.com/css/style.css"/>-->
    
<section class="homenew-section">
    <div class="main home-3">
    <!-- slider section -->
        <div class="slider-section slider-2 carousel bs-slider fade1 control-round indicators-line" id="bootstrap-touch-slider" data-ride="carousel" data-pause="hover" data-interval="5000">
            <div class="slider-items carousel-inner" role="listbox">
                @foreach($banners as $key => $banner)
                <div class="item {{$key == 0 ? 'active' : '' }}">
                    <div class="slider-img">
                        <img src="{{ URL::to('/') }}/public/home_slider/{{$banner->slider}}" class="slider-banner" alt="">
                    </div>
                    <div class="slider-contents">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-offset-3 col-md-offset-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="slider-content">
                                        <h1 class="heading-main" >DO YOU HAVE <span class="sweet-tooth">SWEET TOOTH </span></h1>
                                        <h1 class="heading-main">MY <span class="sweet-tooth2">SEDUCTIVE FLAVORS</span></h1>
                                        <h1 class="heading-main">WILL</h1>
                                        <h1 class="heading-main"><span class="sweet-tooth">HIT THE SPOT </span> !</h1>
                                        <!--<p class="delay-06" data-animation="animated fadeInLeft">Lorem Ipsum is simply dummy text of the printing and typesetting industrioy. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown.</p>-->
                                        <!--<a href="#" class="btn btn-button pink-bg button-1 animation delay-04" data-animation="animated fadeInRight">Read More</a>-->
                                    @if ($customers != 1)
                                   <div class="button-submit-signups call-button"><a href="{{route('register')}}" class="submit-signups" type="submit">Buy Subscription</a></div>
                                   @endif
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!--<div class="item">-->
                <!--    <div class="slider-img">-->
                <!--        <img src="{{asset('public/web_files/images/1.jpg')}}" alt="">-->
                <!--    </div>-->
                <!--    <div class="slider-contents">-->
                <!--        <div class="container">-->
                <!--            <div class="row">-->
                <!--                <div class="col-lg-offset-3 col-md-offset-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
                <!--                    <div class="slider-content">-->
                <!--                        <h3 class="delay-03" data-animation="animated fadeInLeft">Welcome to Our movie site</h3>-->
                <!--                        <h2 class="delay-04" data-animation="animated fadeInRight ">Our special <span class="pink">Movies</span></h2>-->
                <!--                        <p class="delay-06" data-animation="animated fadeInLeft">Lorem Ipsum is simply dummy text of the printing and typesetting industrioy. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown.</p>-->
                <!--                        <a href="#" class="btn btn-button pink-bg button-1 animation delay-04" data-animation="animated fadeInRight">Read More</a>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
             <!--Left Control -->
            <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
             <!--Right Control -->
            <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- end slider section -->
    
         
    <!--<div class="slider movie-items">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="title-hd1">-->
    <!--                        <h2>Latest Videos</h2>-->
    <!--                    </div>-->
    <!--            <div class="slick-multiItemSlider">-->
    <!--                @foreach($sliderFilms as $value)-->
    <!--                    <div class="movie-item">-->
    <!--                        <div class="mv-img">-->
    <!--                            <a href="#">-->
                                    
    <!--                                <video class="video-section" height="100%"  style="height: auto;" width="100%" controlsList="nodownload" playsinline autoplay muted loop preload="none">-->
		  <!--                          <source src="{{$value->video}}">-->
    <!--                                </video>-->
                                    
                                  
    <!--                            </a>-->
    <!--                        </div>-->
                            
    <!--                        <div class="title-in">-->
                                
    <!--                            @if ($customers == 1)-->
    <!--                                <h6 class="mb-3"><a href="{{url('movies/'.$value->id)}}">{{$value->name}}</a></h6>-->
    <!--                                 @else-->
    <!--                                 <h6 class="mb-3"><a href="{{route('register')}}">{{$value->name}}</a></h6>-->
    <!--                            @endif-->
    <!--                            <div class="heading-section">-->
    <!--                        <ul>-->
                                    <!--<a href="">Hurry Animate Movie (2018)</a>-->
    <!--                                            <li><span>Category : </span><a href="">{{$value->categoryname}}</a></li>-->
    <!--                                        </ul>-->
    <!--                                        </div>-->
    <!--                            <div class="cate">-->
    <!--                               @if($customers == 1)-->
    <!--                                    <span class="blue"><a href="{{url('movies/'.$value->id)}}">Detail</a></span>-->
    <!--                                @else-->
    <!--                                <span class="blue"><a href="{{route('register')}}">Detail</a></span>-->
    <!--                                @endif-->
                                    
                                    
    <!--                                <div class="hvr-inner">-->
    <!--                              @if($customers == 1)-->
    <!--                            <a class="popup-youtube" href="{{$value->video}}"> Play <i class="ion-android-arrow-dropright"></i> </a>-->
                                            
    <!--                            @else-->
                                
    <!--                            <a href="{{route('register')}}"> Show <i class="ion-android-arrow-dropright"></i> </a>-->
    <!--                            @endif -->
    <!--                        </div>-->
    <!--                            </div>-->
                                
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                @endforeach-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
 <section class="three-column-images">
   <h2 class="texts-heading">Latest Videos</h2>
   <div class="container">
      <div class="row">
          
           @foreach($sliderFilms as $value)
         <div class="col-xs-6 col-sm-4 movie-items-images mv-img">
            <!-- @if ($customers == 1)-->
            <!--<a href="{{url('movies/'.$value->id)}}"><img alt="" src="{{ URL::to('/') }}/public/video_background_covers/{{$value->background_covers}}" class="company-img-re"></a>-->
            <!--@else-->
            <!--<a href="{{route('register')}}"><img alt="" src="{{ URL::to('/') }}/public/video_background_covers/{{$value->background_covers}}" class="company-img-re"></a>-->
            <!--@endif-->
            
            
              @if ($customers == 1)
                <a href="{{url('movies/'.$value->id)}}">
                <video  height="100%" style="height: auto;" width="100%" playsinline muted loop >
                    <source src="{{$value->shortvideo}}">
                </video>
              </a>
              @else
              @if(auth()->user())
              <a href="{{url('stripe')}}">
                <video  height="100%" style="height: auto;" width="100%" playsinline muted loop >
                    <source src="{{$value->shortvideo}}">
                </video>
              </a>

              @else

              <a href="{{route('register')}}">
                <video  height="100%" style="height: auto;" width="100%" playsinline muted loop >
                    <source src="{{$value->shortvideo}}">
                </video>
              </a>
              
              
              @endif
              
              @endif
            
            <div class="title-ins">
                @if ($customers == 1)
               <h6 class="heading-name"><a href="{{url('movies/'.$value->id)}}">{{$value->name}}</a></h6>
                @else
                @if(auth()->user())
               <h6 class="heading-name"><a href="{{url('stripe')}}">{{$value->name}}</a></h6>
                @else
               <h6 class="heading-name"><a href="{{route('register')}}">{{$value->name}}</a></h6>
                @endif
                @endif
               <h6 class="heading-category">{{$value->categoryname}}  <span class="align-right"><i class="ion-android-time">{{ Carbon\Carbon::parse($value->created_at)->diffForHumans()}}</i></span></h6>
              
               <!--<div class="cate">-->
               <!--    @if($customers == 1)-->
               <!--   <span class="blue"><a href="{{url('movies/'.$value->id)}}">Detail</a></span>-->
               <!--    @else-->
               <!--   <span class="blue"><a href="{{route('register')}}">Detail</a></span>-->
               <!--    @endif-->
                  
               <!--   <div class="hvr-inner-section">-->
               <!--        @if($customers == 1)-->
               <!--      <a class="popup-youtube" href="{{$value->video}}"> Play <i class="ion-android-arrow-dropright"></i> </a>-->
               <!--      @else-->
               <!--      <a href="{{route('register')}}"> Show <i class="ion-android-arrow-dropright"></i> </a>-->
               <!--      @endif-->
                     
               <!--   </div>-->
               <!--</div>-->
            </div>
         </div>
         @endforeach
         
      </div>
     <div class="readmores-btn"><a href="{{ URL::to('/movies') }}" class="read-signups" type="submit">Show More</a></div>
      <!-- Row -->
   </div>
   <!-- Container --> 
</section>
    
    

    
   <div class="slider movie-items section-3 three-column-images">
     <div class="container">
         <div class="csloader">
        <div class="testing">
            <div class="circle"></div>
        </div>
    </div>
        <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="gallery-title">Browse By Category</h1>
        </div>

        <div align="center">
            <button class="btn btn-default filter-button search_name activet" data-filter="0">All</button>
            @foreach($allcategoryFilms as $category)
            <button class="btn btn-default filter-button search_name" rel="{{$category->id}}" data-filter="{{$category->id}}">{{$category->name}}</button>
            @endforeach
        </div>
        <br/>
         <div class="main-filter-video" id="main-filter-video">
         
          </div>
         </div>    
        
        
    </div>
    
    
    </div>
    
    
    
    
    
    
    
    
    
    <!--<div class="slider movie-items section-3">-->
    <!--    <div class="container">-->
    <!--        <div class="row ipad-width">-->
    <!--            <div class="col-md-12">-->
    <!--                @foreach($categoryFilms as $category)-->
    <!--                    <div class="title-hd">-->
    <!--                        <h2>{{$category->name}}</h2>-->
    <!--                        <a class="viewall" href="{{url('movies?category=' . $category->name)}}">View all <i-->
    <!--                                    class="ion-ios-arrow-right"></i></a>-->
    <!--                    </div>-->
    <!--                    <div class="tabs">-->
    <!--                        <ul class="tab-links">-->
    <!--                            <li><span style="color: lightslategray"> {{$category->films->count()}} Movies</span>-->
    <!--                            </li>-->
    <!--                        </ul>-->
    <!--                        <div class="tab-content">-->
    <!--                            <div class="tab active">-->
    <!--                                <div class="row">-->
    <!--                                    <div class="slick-multiItemSlider" style="margin-top: 10px">-->
    <!--                                        @foreach($category->films as $values)-->
    <!--                                            <div class="slide-it">-->
    <!--                                                <div class="movie-item">-->
    <!--                                                    <div class="mv-img" style="background-image: url({{ URL::to('/') }}/public/video_background_covers/{{$values->background_covers}});">-->
    <!--                                                        <video height="100%" style="height: auto;" width="100%" playsinline muted loop preload="none">-->
    <!--                    		                            <source src="{{$values->shortvideo}}">-->
    <!--                                                        </video>-->
    <!--                                                        <img alt="" src="{{ URL::to('/') }}/public/video_background_covers/{{$values->background_covers}}" style="height: 280px;">-->
    <!--                                                    </div>-->
                                                     
    <!--                                                </div>-->
    <!--                                            </div>-->
    <!--                                        @endforeach-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                @endforeach-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <div class="company-main">
   <div class="row">
      <div class="col-md-4 company-main-second">
         <img alt="" src="{{asset('web_files/images/Landing-min.png')}}" class="company-img-responsive">
      </div>
      <div class="col-md-8">
         <h2 class="about-company-section">
            About Company
         </h2>
         <p class="lorem-company-section">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
         </p>
         <p class="lorem-company-section">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  
         </p>
         <p class="lorem-company-section">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
         </p>
      </div>
   </div>
 </div>
</div>
</section>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->


<!--<script src="https://ssl.p.jwpcdn.com/player/v/8.22.0/jwplayer.js"></script>-->
<!--<script>-->
<!--    jwplayer("mediaplayer").setup({ -->
<!--        "playlist": [{-->
<!--            "file": "https://oxeenit.com/supersweet/public/video_uploads/1657302199.tkM1zvBq-24721146.mp4"-->
<!--        }]-->
<!--    });-->
<!--</script>-->
<script src="{{asset('web_files/js/jquery.js')}}"></script>

<script>
 $(document).ready(function () {
    var pathname = $(location).attr('href');
   $('.search_name').click(function () {
       
        var id =($(this).attr("data-filter"));
        
        $('.search_name, .search_name1').removeClass('activet');
        $('.csloader').addClass('showl');
        $(this).addClass('activet');
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{url('category/filter')}}",
                method: "GET",
                data: { id: id },
                    success: function (response) {
                     $('.csloader').removeClass('showl');
                    $('#main-filter-video').replaceWith(response);
                    return false;
                }
        });
        
    });
    if(pathname=='http://localhost:4100/'){
         var id ='0';
        $('.csloader').removeClass('hidel');
        $(this).addClass('activet');
       
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{url('category/filter')}}",
            method: "GET",
            data: { id: id },
            success: function (response) {
                $('#main-filter-video').replaceWith(response);
                return false; 
            
            }
        });
        
    }
  

 });



</script>






<script>
    $(document).ready(function(){

    /*$(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "0")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");
*/
});
</script>
<script>
var figure = $(".mv-img").hover( hoverVideo, hideVideo );

function hoverVideo(e) {  
$('video', this).get(0).play(); 
}

function hideVideo(e) {
$('video', this).get(0).pause(); 
}
</script>

<script>
   $(document).ready(function(){
   /* $(".filter-button-cls").click(function () {
  if ($(this).hasClass("active")) {
    $(".filter-button-cls").removeClass("active");
  }
  else {
    $(".filter-button-cls").removeClass("active");
    $(this).addClass("active");
  }
});*/
});
    
    
</script>


</script>

<script>
/* $(document).ready(function () {

  $('.search_name1').click(function () {
    var id =($(this).attr("data-filter"));
   //var query = $(this).val();
   //alert(id); return false;
   $('.search_name, .search_name1').removeClass('activet');
   $('.csloader').removeClass('hidel');
   $(this).addClass('activet');
   if (id != '') {
    //var _token = $('input[name="_token"]').val();
    $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
     url: "{{url('category/allfilter')}}",
     method: "GET",
     data: { id: id },
     success: function (response) {
         $('.csloader').addClass('hidel');
      //var len = 0;
      $('#filter_video').replaceWith(response);
      console.log(response); return false; 
      
     }
    });
   }
  });

 

 }); */
</script>

@endsection

