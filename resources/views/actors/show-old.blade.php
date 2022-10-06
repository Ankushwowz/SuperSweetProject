@extends('layouts.web.app')
@section('content')


<!-- celebrity single section-->
<div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <!--<h1>model <span> </span></h1>-->
                        <ul class="breadcumb">
                            <li class="active"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li> <span class="ion-ios-arrow-right"></span><a href="{{ URL::to('/models') }}"> models</a><span>
                        </span></li></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="page-single movie-single cebleb-single">
    <div class="container">
        <div class="row ipad-width">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="mv-ceb">
                    @if(!empty($actor->avatar1))
                    <img alt="" src="{{ URL::to('/') }}/actor_avatars/{{$actor->avatar1}}" style="height: 350px">
                    @else
                    <img alt="" src="{{ URL::to('/') }}/images/dummyimage.png" style="height: 350px">
                    @endif
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="movie-single-ct">
                    <h1 class="bd-hd">{{$actor->name}}</h1>
                    <p class="ceb-single"></p>
                    <div class="social-link cebsingle-socail">
                        <a href="#"><i class="ion-social-facebook"></i></a>
                        <a href="#"><i class="ion-social-twitter"></i></a>
                        <a href="#"><i class="ion-social-googleplus"></i></a>
                        <a href="#"><i class="ion-social-linkedin"></i></a>
                    </div>
                    <div class="movie-tabs">
                        <div class="tabs">
                            <ul class="tab-links tabs-mv">
                                <li class="active"><a href="#overviewceb">Overview</a></li>
                                <li><a href="#biography"> biography</a></li>
                                <!--<li><a href="#filmography">filmography</a></li>-->
                            </ul>
                            <div class="tab-content">
                                <div class="tab active" id="overviewceb">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <div class="rv-hd">
                                                <div>
                                                    <h2>{{$actor->name}}</h2>
                                                </div>
                                            </div>
                                            <p style="word-break: break-all" class="text-overview">{{$actor->overview}}</p>

                                        </div>
                                        <div class="col-md-4 col-xs-12 col-sm-12">
                                            <div class="sb-it">
                                                <h6>Fullname: </h6>
                                                <p>{{$actor->name}}</p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Date of Birth: </h6>
                                                <p>{{date('F d, Y',strtotime($actor->dob))}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab" id="biography">
                                    <div class="row">
                                        <div class="rv-hd">
                                            <div>
                                                <h2>{{$actor->name}}</h2>
                                            </div>
                                        </div>
                                        <p style="word-break: break-all">{{$actor->biography}}</p>
                                    </div>
                                </div>
                                <div class="tab" id="filmography">
                                    <div class="row">
                                        <div class="rv-hd">
                                            <div>
                                                <h3>Filmography of</h3>
                                                <h2>{{$actor->name}}</h2>
                                            </div>

                                        </div>
                                        <div class="topbar-filter">
                                            <p>Found <span>{{$actor->films->count()}} movies</span> in total</p>
                                        </div>
                                        <!-- movie cast -->
                                        <div class="mvcast-item">
                                            @foreach($actor->films as $film)
                                                <div class="cast-it">
                                                    <div class="cast-left cebleb-film">
                                                        <img alt="" src="{{$film->poster}}" style="height: 75px">
                                                        <div>
                                                            <a href="{{url('movies/' . $film->id)}}">{{$film->name}} </a>
                                                        </div>

                                                    </div>
                                                    <p>... {{$film->year}}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



 <div class="slider movie-items">
        <div class="container">
            <div class="row">
                <div class="title-hd1">
                            <h2>Related Videos</h2>
                        </div>
                <div class="slick-multiItemSlider">
                    @foreach($videoactor as $value)
                        <div class="movie-item">
                            <a href="{{url('movies/'.$value->id)}}">
                            <div class="mv-img">
                                
                                    <!--<div id="mediaplayer"></div>-->
                                    <video class="video-section" height="100%"  style="height: auto;" width="100%" controlsList="nodownload" playsinline muted loop>
		                            <source src="{{$value->shortvideo}}">
                                    </video>
                                    
                                    <!--<video height="437" style="height: 400px;" width="285" autoplay muted>-->
                                    <!--  <source src="{{ URL::to('/') }}/public/video_uploads/" type="video/mp4">-->
                                    <!--Your browser does not support the video tag.-->
                                    <!--</video>-->
                          
                                    <!--<img alt="" height="437" style="height: 400px;" src="{{ URL::to('/') }}/public/video_background_covers/{{$value->background_covers}}"  width="285">-->
                                
                            </div>
                            </a>
                            <div class="title-in">
                                    <h6 class="heading-name"><a href="{{url('movies/'.$value->id)}}">{{$value->name}}</a></h6>
                                    <h6 class="heading-category">{{$value->categoryname}} <span class="align-right" style="margin-right:25px;"><i class="ion-android-time">{{ Carbon\Carbon::parse($value->created_at)->diffForHumans()}}</i></span></h6>
                                <!-- <div class="heading-section">
                            <ul>
                                                <li><span></span><a href="">{{$value->categoryname}}</a></li>
                                            </ul>
                                            </div> -->
                                <!--<div class="cate">-->
                                <!--        <span class="blue"><a href="{{url('movies/'.$value->id)}}">Detail</a></span>-->
                                <!--<div class="hvr-inner">-->
                                <!--    <a class="popup-youtube" href="{{$value->video}}"> Play <i class="ion-android-arrow-dropright"></i> </a>-->
                                <!--</div>-->
                                <!--</div>-->
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</div>
<!-- celebrity single section-->


    <script src="https://oxeenit.tech/supersweetclub/public/web_files/js/jquery.js"></script>
    
    <script>
    var figure = $(".mv-img").hover( hoverVideo, hideVideo );
    
    function hoverVideo(e) {  
    $('video', this).get(0).play(); 
    }
    
    function hideVideo(e) {
    $('video', this).get(0).pause(); 
    }
    </script>

@endsection