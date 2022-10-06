@extends('layouts.web.app')
@section('content')
    @push('style')
        <style rel="stylesheet">
            li.active {
                color: yellow;
            }

            .page-item.active {
                margin-left: 0px !important;
            }
        </style>
    @endpush

    <!--<div class="hero mv-single-hero">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-md-12">-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- movie single section-->
<div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <!--<h1>model <span> </span></h1>-->
                        <ul class="breadcumb">
                            <li class="active"><a href="/">Home</a></li>
                            <li> <span class="ion-ios-arrow-right"></span><a href="/movies"> videos </a><span>
                        </span></li></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-single movie-single movie_single">
        <div class="container">
            <div class="row ipad-width2">
                <!-- <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="movie-img">
                        <img alt="" src="{{ URL::to('/') }}/public/video_background_covers/{{$film->background_covers}}" style="height: 350px">
                    </div>
                </div> -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="movie-single-ct main-content">
                        <h1 class="bd-hd">{{$film->name}} <!--<span>{{$film->year}}</span>--></h1>
                        <div class="social-btn favorite_div" style="display:none;">
                            @if(!$film->isInfavorite(auth()->user()))
                                <a class="parent-btn add_to_favorite" data-value="{{$film->id}}"
                                   href="javascript:void(0);">
                                    <i class="ion-ios-heart-outline"></i>Add to Favorite
                                </a>
                            @else
                                <a class="parent-btn remove_from_favorite" data-value="{{$film->id}}"
                                   href="javascript:void(0);">
                                    <i class="ion-ios-heart"></i>Remove From Favorite
                                </a>
                            @endif

                        </div>
                        <div class="movie-rate" style="display:none;">
                            <div class="rate">
                                <i class="ion-android-star"></i>
                                <p><span class="movie_rating">{{$film->ratings->avg('rating') ?? 0}}</span> /10<br>
                                    <span class="rv movie_reviews">{{$film->ratings->count()}} Reviews</span>
                                </p>
                            </div>
                            <div class="rate-star">
                                <p>Rate This Video: </p>
                                <form class="rating">
                                    @php
                                        $userrate =0;
                                        if(auth()->user() != NULL)
                                            $userrate = auth()->user()->ratings->where('film_id', $film->id)->first();
                                        if($userrate != NULL)
                                            $userrate = $userrate->rating;
                                    @endphp
                                    <input type="hidden" class="user_rate" value="{{$userrate}}">
                                    <label>
                                        <input class="stars_1" {{$userrate==1 ? 'checked' : ''}} name="stars"
                                               type="radio" value="1"/>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input class="stars_2" {{$userrate==2 ? 'checked' : ''}} name="stars"
                                               type="radio" value="2"/>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input class="stars_3" {{$userrate==3 ? 'checked' : ''}} name="stars"
                                               type="radio" value="3"/>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input class="stars_4" {{$userrate==4 ? 'checked' : ''}} name="stars"
                                               type="radio" value="4"/>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input class="stars_5" {{$userrate==5 ? 'checked' : ''}} name="stars"
                                               type="radio" value="5"/>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input class="stars_6" {{$userrate==6 ? 'checked' : ''}} name="stars"
                                               type="radio" value="6"/>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input class="stars_7" {{$userrate==7 ? 'checked' : ''}} name="stars"
                                               type="radio" value="7"/>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input class="stars_8" {{$userrate==8 ? 'checked' : ''}} name="stars"
                                               type="radio" value="8"/>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input class="stars_9" {{$userrate==9 ? 'checked' : ''}} name="stars"
                                               type="radio" value="9"/>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input class="stars_10" {{$userrate==10 ? 'checked' : ''}} name="stars"
                                               type="radio" value="10"/>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                </form>
                            </div>
                        </div>
                        <div class="movie-tabs">
                            <div class="tabs">
                                <ul class="tab-links tabs-mv" style="margin-top: 30px">
                                    <li class="active"><a href="#overview">Overview & Play</a></li>
                                    <!--<li><a href="#reviews"> Reviews</a></li>-->
                                    <li><a href="#actor"> Model </a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab active" id="overview">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <p>{{$film->overview}}</p>
                                                <hr style="background-color: #405266">
                                                <br>
                                                
                                                
                                                <video  rel="{{$film->id}}" width="100%" controls controlsList="nodownload">
                                            		<source src="{{$film->video}}"/>
                                            	</video>
                                                
                                                {!! $film->url !!}
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab review" id="reviews">
                                        <div class="row">
                                            <div class="rv-hd">
                                                <div class="div">
                                                    <h3>Related Videos To</h3>
                                                    <h2>{{$film->name}}</h2>
                                                </div>
                                                <a class="redbtn write_review" href="#write_review" style="margin-right: 20px; display:none">Write
                                                    Review</a>
                                            </div>
                                            <div class="topbar-filter">
                                                <p>Found <span>{{$film->reviews->count()}} reviews</span> in total</p>
                                            </div>
                                            @foreach($reviews as $review)
                                                <div class="mv-user-review-item">
                                                    <div class="user-infor">
                                                        <img alt="" src="{{$review->user->avatar}}">
                                                        <div>
                                                            <h3>{{$review->title}}</h3>
                                                            <div class="no-star">
                                                                @php
                                                                    $stars = $review->user->ratings->where('film_id', $film->id)->first();
                                                                    if($stars!=NULL){
                                                                        $stars = $stars->rating;
                                                                        for ($i=1; $i<=$stars; $i++){
                                                                            echo '<i class="ion-android-star"></i>';
                                                                        }
                                                                        for ($i=1; $i<=(10-$stars); $i++){
                                                                            echo '<i class="ion-android-star last"></i>';
                                                                        }
                                                                    }
                                                                @endphp
                                                            </div>
                                                            <p class="time">
                                                                {{date('d F Y',strtotime($review->created_at))}} by
                                                                <a> {{$review->user->username}}</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <p>{{$review->review}}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                        {{$reviews->appends(request()->query())->links()}}

                                        <div class="blog-detail-ct" id="write_review" style="display:none">
                                            <div class="comment-form" style="padding-top: 75px!important;">
                                                <h4>Write a review</h4>
                                                <form action="{{url('user/review/' . $film->id)}}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input name="title" placeholder="Title" type="text" required
                                                                   max="15">
                                                        </div>
                                                        @error('title')
                                                        <span class="invalid-feedback"
                                                              style="color: red; font-size: 12px" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                        <textarea id="" name="review" placeholder="Review"
                                                                  style="resize: none" required max="150"></textarea>
                                                            @error('review')
                                                            <span class="invalid-feedback"
                                                                  style="color: red; font-size: 12px" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                         </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <button class="submit" type="submit"> Write</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab" id="actor">
                                        <div class="row">
                                            <div class="title-hd-sm">
                                                <h4>Model</h4>
                                                {{--<a class="time" href="#" style="margin-right: 20px">Full Actor<i--}}
                                                {{--class="ion-ios-arrow-right"></i></a>--}}
                                            </div>
                                            <div class="mvcast-item">
                                                
                                                    <div class="cast-it">
                                                        <div class="cast-left">
                                                            <a href="{{url('models/' . $actor->actorname)}}">{{$actor->actorname}}</a>
                                                            <img alt="" src="{{ URL::to('/') }}/public/actor_avatars/{{$actor->avatar1}}"
                                                                 style="height: 100px; width: 100px">
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
        </div>
    </div>
    
    
    <div class="slider movie-items">
        <div class="container">
            <div class="row">
                <div class="title-hd1">
                            <h2>Related Videos</h2>
                        </div>
                <div class="slick-multiItemSlider">
                    @foreach($suggestionvideo as $value)
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
                            <div class="title-ins">
                                    <h6 class="heading-name"><a href="{{url('movies/'.$value->id)}}">{{$value->name}}</a></h6>
                                    <h6 class="heading-category">{{$value->categoryname}} <span class="align-right" style="margin-right:25px;"><i class="ion-android-time">{{ Carbon\Carbon::parse($value->created_at)->diffForHumans()}}</i></span></h6>
                            
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
    
    
    @push('script')
        <script src="{{asset('dashboard_files/assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
        
        
        <script>
        $(document).ready(function () {
            var allowDismiss = true;
            var user = "{{auth()->user()}}";
            $("#playButton").on('click', function() {
                var pageURL = $(location).attr("href");
                var ID = $(this).attr('rel');
                //alert(pageURL);
                //alert(ID);
                if (user !== "") {
                        $.ajax({
                            url: "{{ URL('user/addToHistory/' . $film->id) }}",
                            type: "POST",
                            data: {
                                "_token": "{{csrf_token()}}",
                            },
                            success: function (response) {
                                if (response) {
                                    $.notify({
                                            message: "This Movie Added To Your History."
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

                                    $(".favorite_div").html(`
                                            <a class="parent-btn remove_from_favorite" data-value="{{$film->id}}" href="javascript:void(0);">
                                                <i class="ion-ios-heart"></i>Remove From Favorite
                                            </a>
                                    `);
                                }
                            },
                            error: function (response) {
                                $.notify({
                                       // message: "Error, Please Try Again!"
                                        message: "This Video Already added in your History"
                                    },
                                    {
                                        type: "alert-danger",
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
                            }
                        });
                    } else {
                        $.notify({
                                message: "Please Login To Allow This Function."
                            },
                            {
                                type: "alert-danger",
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
                    }   
                
            });
        });
    </script>
        
        
        
        <script type="text/javascript">
            $(document).ready(function () {
                // alert($('.user_rate').val() !== "");
                var allowDismiss = true;
                var user = "{{auth()->user()}}";
                $('body').on('click', '.add_to_favorite', function (e) {
                    if (user !== "") {
                        $.ajax({
                            url: "{{ URL('user/addToFavorite/' . $film->id) }}",
                            type: "POST",
                            data: {
                                "_token": "{{csrf_token()}}",
                            },
                            success: function (response) {
                                if (response) {
                                    $.notify({
                                            message: "This Film Added To Your Favorite."
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

                                    $(".favorite_div").html(`
                                            <a class="parent-btn remove_from_favorite" data-value="{{$film->id}}" href="javascript:void(0);">
                                                <i class="ion-ios-heart"></i>Remove From Favorite
                                            </a>
                                    `);
                                }
                            },
                            error: function (response) {
                                $.notify({
                                        message: "Error, Please Try Again!"
                                    },
                                    {
                                        type: "alert-danger",
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
                            }
                        });
                    } else {
                        $.notify({
                                message: "Please Login To Allow This Function."
                            },
                            {
                                type: "alert-danger",
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
                    }
                });
                $('body').on('click', '.remove_from_favorite', function (e) {
                    if (user !== "") {
                        $.ajax({
                            url: "{{ URL('user/removeFromFavorite/' . $film->id) }}",
                            type: "POST",
                            data: {
                                "_token": "{{csrf_token()}}",
                            },
                            success: function (response) {
                                if (response) {
                                    $.notify({
                                            message: "This Film Removed From Your Favorite."
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

                                    $(".favorite_div").html(`
                                            <a class="parent-btn add_to_favorite" data-value="{{$film->id}}" href="javascript:void(0);">
                                                <i class="ion-ios-heart-outline"></i>Add to Favorite
                                            </a>
                                    `);
                                }
                            },
                            error: function (response) {
                                $.notify({
                                        message: "Please Login To Allow This Function"
                                    },
                                    {
                                        type: "alert-danger",
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
                            }
                        });
                    } else {
                        $.notify({
                                message: "Please Login To Allow This Function."
                            },
                            {
                                type: "alert-danger",
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
                    }
                });
                $('body').on('click', "input[name='stars']", function (e) {
                    var rating = $(this).val();
                    if (user !== "") {
                        $.ajax({
                            url: "{{ URL('user/rate/' . $film->id) }}",
                            type: "POST",
                            data: {
                                "_token": "{{csrf_token()}}",
                                "rating": rating
                            },
                            success: function (response) {
                                if (response.status) {
                                    $.notify({
                                            message: "Thank You For Rating This Movie"
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
                                    $(".movie_rating").html(response.avg);
                                    $(".movie_reviews").html(response.count);
                                }
                            },
                            error: function (response) {
                                $.notify({
                                        message: "Error, Please Try Again!"
                                    },
                                    {
                                        type: "alert-danger",
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
                            }
                        });
                    } else {
                        $.notify({
                                message: "Please Login To Allow This Function."
                            },
                            {
                                type: "alert-danger",
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
                    }
                });

                @if(session('create_review'))
                $.notify({
                        message: "{{ session('create_review') }}"
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
                @endif

            });
        </script>
    @endpush

@endsection