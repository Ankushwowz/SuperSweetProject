@extends('layouts.web.app')
@section('content')

@php
if(isset($_GET['category'])){
$categoryArray = $_GET['category'];
}
@endphp

    @push('style')
        <style rel="stylesheet">
            li.active{
                color: yellow;
            }
            ul.cat-act li {
    display: block;
}
.cat-act input + label {
    background: #fff;
    padding: 0px 10px;
    margin-bottom: 5px;
    cursor: pointer;
    font-size: 14px;
}
.btn-search {
    background: linear-gradient(to left, #fa017e, #64dcfe);
    color: #fff;
    padding: 5px 20px;
    border-radius: 33px;
    font-weight: 700;
    letter-spacing: 1px;
}
.categories-list svg {
    max-width: 17px;
    fill: #fff;
    vertical-align: middle;
    margin-right: 5px;
}

.all-categories svg#Capa_1 {
    position: absolute;
    fill: #000;
    top: 8px;
    left: 8px;
}

.sidebar-filter-container {
    position: relative;
}
        </style>
    @endpush
<div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <!--<h1>model <span> </span></h1>-->
                        <ul class="breadcumb">
                            <li class="active"><a href="/">Home</a></li>
                            <li> <span class="ion-ios-arrow-right"></span> Videos <span>
                        </span></li></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-single">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!--<div class="topbar-filter">-->
                    <!--    <p>Found <span>{{$films->count()}} videos</span> in total</p>-->
                    <!--</div>-->

                  
                    
                    <div class="flex-wrap-movielist">
                    
                            <aside  class="col-3">
                <div class="categories-list">
    <div class="main-categories">
                @if ($customers == 1)
                <a href="#">
                    <!--<i class="ion-logo-rss"></i>Subscriptions <span class="counter counter-subscriptions"></span>-->
                </a>
                @else
                <a href="{{ URL::to('/register') }}">
               
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 310 310" style="enable-background:new 0 0 310 310;" xml:space="preserve">
<g id="XMLID_788_">
	<path id="XMLID_789_" d="M90.244,264.828C90.244,240.11,70.139,220,45.427,220c-24.715,0-44.822,20.11-44.822,44.828
		c0,24.714,20.107,44.82,44.822,44.82C70.139,309.648,90.244,289.542,90.244,264.828z"/>
	<path id="XMLID_790_" d="M5.648,169.43c35.961,0,69.782,14.066,95.231,39.605c25.45,25.583,39.467,59.648,39.467,95.92
		c0,2.762,2.238,5,5,5h57.486c2.762,0,5-2.238,5-5c0-111.952-90.699-203.031-202.185-203.031c-2.762,0-5,2.238-5,5v57.505
		C0.648,167.191,2.887,169.43,5.648,169.43z"/>
	<path id="XMLID_791_" d="M5.726,0c-2.762,0-5,2.238-5,5v57.495c0,2.762,2.238,5,5,5c130.24,0,236.199,106.544,236.199,237.505
		c0,2.762,2.238,5,5,5h57.471c2.762,0,5-2.238,5-5C309.396,136.822,173.17,0,5.726,0z"/>
</g>

</svg>
</i>Subscriptions <span class="counter counter-subscriptions"></span>
                </a>
                @endif
        <!--        <a href="">-->
        <!--            <ion-icon name="refresh"></ion-icon>Watch History -->
        <!--        </a>-->
        <!--<div class="line"></div>-->
        <a href="{{ URL::to('/latest/video') }}">
       
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<g>
		<path d="M400.268,175.599c-1.399-3.004-4.412-4.932-7.731-4.932h-101.12l99.797-157.568c1.664-2.628,1.766-5.956,0.265-8.678
			C389.977,1.69,387.109,0,384.003,0H247.47c-3.234,0-6.187,1.826-7.637,4.719l-128,256c-1.323,2.637-1.178,5.777,0.375,8.294
			c1.562,2.517,4.301,4.053,7.262,4.053h87.748l-95.616,227.089c-1.63,3.883-0.179,8.388,3.413,10.59
			c1.382,0.845,2.918,1.254,4.446,1.254c2.449,0,4.864-1.05,6.537-3.029l273.067-324.267
			C401.206,182.161,401.667,178.611,400.268,175.599z"/>
	</g>
</g>
</svg>

            Newest Videos
        </a>
        <!--<a href="#best/weekly">-->
        <!--    <i class="xh-icon like hover to-red"></i>-->
        <!--    Best Videos-->
        <!--</a>-->

        <!--<a href="#creators/contest">-->
        <!--    <i class="xh-icon trophy hover to-red"></i>-->
        <!--    Top Creators        -->
        <!--</a>-->
            </div>
    <div class="all-categories">
        <form action="{{ URL::to('/movies') }}" method="GET">
        <div class="sidebar-filter-container">
       
<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 52.966 52.966" style="enable-background:new 0 0 52.966 52.966;" xml:space="preserve">
<path d="M51.704,51.273L36.845,35.82c3.79-3.801,6.138-9.041,6.138-14.82c0-11.58-9.42-21-21-21s-21,9.42-21,21s9.42,21,21,21
	c5.083,0,9.748-1.817,13.384-4.832l14.895,15.491c0.196,0.205,0.458,0.307,0.721,0.307c0.25,0,0.499-0.093,0.693-0.279
	C52.074,52.304,52.086,51.671,51.704,51.273z M21.983,40c-10.477,0-19-8.523-19-19s8.523-19,19-19s19,8.523,19,19
	S32.459,40,21.983,40z"/>

</svg>

            <input name="search" class="sidebar-filter input-text" type="text" data-orientation="0" data-total="0" data-total-link="#" data-pornostars-link="#pornstars" data-channels-link="#channels" placeholder="Filter by category…">
            <div class="sidebar-filter__loader dots-loader">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>
        
        <!--<div class="sidebar-filter-container">-->
        <!--    <select name="category" class="form-control z-index show-tick" data-live-search="true" tabindex="-98">-->
        <!--    <option value="">- All Categories -</option>-->
        <!--    @foreach($categories as $category)-->
        <!--            <option value="{{$category->id}}" {{request()->category == $category->id ? 'selected' : ''}}>{{$category->name}}</option>-->
        <!--    @endforeach-->
        <!--    </select>-->
        <!--</div>-->
        
        
        <div class="sidebar-filter-container">
            <select name="actor" class="form-control z-index show-tick" data-live-search="true" tabindex="-98">
                <option value="">- All Actors -</option>
                @foreach($actors as $actor)
                    <option value="{{$actor->id}}" {{request()->actor == $actor->id ? 'selected' : ''}}>{{$actor->name}}</option>
                @endforeach
            </select>
        </div>
        
        <style>
            .cat-act {
                margin-top: 20px;
            }
            .cat-act li {
                display: inline;
            }
            .cat-act input {
                visibility: hidden;
                position: absolute;
            }
            select.form-control.z-index.show-tick {
    border-radius: 20px !important;
}
            .cat-act input + label {
    background: #fff;
    padding: 2px 10px;
    margin-bottom: 5px;
    cursor: pointer;
    min-width: 75px;
    border-radius: 20px;
    text-align: center;
}
    

            .cat-act input:checked + label {
                background: #fa017e;
                /*background: linear-gradient(to left, #fa017e, #64dcfe);*/
                color: #fff;
            }
            .btn-search {background: linear-gradient(to left, #fa017e, #64dcfe); color:#fff;}
        </style>
        
        <ul class="cat-act">
            @foreach($categories as $k=> $category)
            @if(!empty($categoryArray))
            @if(in_array($category->id,$categoryArray))
            @php
             $checked = "checked";
            @endphp
            @else
            @php
             $checked = "";
             @endphp
             @endif
             @else
            @php
             $checked = "";
             @endphp
            @endif
            <li class="">
                <input type="checkbox" id="category_{{$category->id}}" name="category[{{$category->id}}]" value="{{$category->id}}"  {{$checked}}>
                <label for="category_{{$category->id}}">
                    {{$category->name}}    <div class="xh-flag in"></div>

                </label>
            </li>
            @endforeach
            <!--<li class="show-all-link">-->
            <!--    <a href="#">-->
            <!--        All categories-->
            <!--        <i class="xh-icon arrow-right cobalt-dark hover to-red"></i>-->
            <!--    </a>-->
            <!--</li>-->
        </ul>
        <button type="submit" class="btn btn-primary btn-search">Search</button>
        <a href="{{ URL::to('/movies') }}">Clear All </a>
        </form>
           
 

    </div>
</div>
            </aside>
            <div class="col-9">
                 @if($films->isNotEmpty())
                        @foreach($films as $video)
                            <div class="movie-item-style-2 movie-item-style-1 col-md-4">
                               <div class="mv-img">
                                   
                                     @if ($customers == 1)
                                    <a href="{{url('movies/'.$video->id)}}">
                                    <video  height="100%" style="height: auto;" width="100%" playsinline muted loop >
                                        <source src="{{$video->shortvideo}}">
                                    </video>
                                  </a>
                                  @else
                                    @if(auth()->user())
                                  <a href="{{url('stripe')}}">
                                    <video  height="100%" style="height: auto;" width="100%" playsinline muted loop >
                                        <source src="{{$video->shortvideo}}">
                                    </video>
                                  </a>
                                  @else
                                  <a href="{{route('register')}}">
                                    <video  height="100%" style="height: auto;" width="100%" playsinline muted loop >
                                        <source src="{{$video->shortvideo}}">
                                    </video>
                                  </a>
                                  
                                  
                                  
                                   @endif
                                   @endif
                                   
                                   <!--@if (Auth::check())-->
                                   <!-- <a href="{{url('movies/'.$video->id)}}"><img alt="" src="{{ URL::to('/') }}/public/video_background_covers/{{$video->background_covers}}" style="height: 260px; width: 270px;"  alt=""></a>-->
                                   <!-- @else-->
                                   <!-- <a href="{{route('register')}}"><img alt="" src="{{ URL::to('/') }}/public/video_background_covers/{{$video->background_covers}}" style="height: 260px; width: 270px;"  alt=""></a>-->
                                   <!-- @endif-->
                                   <!--poster="{{ URL::to('/') }}/public/video_background_covers/{{$video->background_covers}}"-->
                                <!--<img src="{{ URL::to('/') }}/public/video_background_covers/{{$video->background_covers}}" style="height: 260px; width: 270px;"  alt="">-->
                                </div>
                                
                                <div class="title-in">
                                 <h6 class="heading-name"><a href="{{url('movies/'.$video->id)}}">{{$video->name}}</a><span class="align-right" style="color:#fff;"><i class="ion-android-time">{{ Carbon\Carbon::parse($video->created_at)->diffForHumans()}}</i></span></h6>
                                 
                                <div class="heading-section">
                            <!--<ul>-->
                                    <!--<a href="">Hurry Animate Movie (2018)</a>-->
                            <!--                    <li><span>Category : </span><a href="">{{$video->categoryname}}</a></li>-->
                            <!--                </ul>-->
                                            </div>
                                <!--<div class="cate">-->
                                <!--    @if (Auth::check())-->
                                <!--        <span class="blue"><a href="{{url('movies/'.$video->id)}}">Detail</a></span>-->
                                <!--    @else-->
                                <!--    <span class="blue"><a href="{{route('register')}}">Detail</a></span>-->
                                <!--    @endif-->
                                    
                                    
                                <!--<div class="hvr-inner">-->
                                <!--    @if (Auth::check())-->
                                <!--    <a href="{{url('movies/'.$video->id)}}"> SHOW <i class="ion-android-arrow-dropright"></i> </a>-->
                                <!--    @else-->
                                <!--    <a href="{{route('register')}}"> SHOW <i class="ion-android-arrow-dropright"></i> </a>-->
                                <!--    @endif-->
                                <!--</div>-->
                                <!--</div>-->
                                
                            </div>
                                
                                
                                <!--<div class="mv-item-infor">-->
                                <!--    <h6><a href="#">{{$video->name}}</a></h6>-->
                                    <!--<p class="rate"><i class="ion-android-star"></i><span>{{$video->ratings->avg('rating') ?? 0}}</span> /10</p>-->
                                <!--</div>-->
                            </div>
                        @endforeach
                        @else
                        <div class="alert alert-info">
                          <strong>Info!</strong> No Video Found.
                        </div>
                        @endif
        </div>
                    </div>
                    {{$films->appends(request()->query())->links()}}
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

@endsection