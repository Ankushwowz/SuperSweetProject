@extends('layouts.web.app')
@section('content')
    @push('style')
        <style rel="stylesheet">
            li.active{
                color: yellow;
            }
        </style>
    @endpush
    
    
    <div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <!--<h1>model <span> {{request()->search ? ' : ' . request()->search . ' ' : ''}}</span></h1>-->
                        <ul class="breadcumb">
                            <li class="active"><a href="{{ URL::to('/') }}">Home</a></li>
                            <li> <a href="{{ URL::to('/movies') }}"><span class="ion-ios-arrow-right"></span>Videos </a></li>
                            <li> <span class="ion-ios-arrow-right"></span> Latest Videos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="page-single">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-12 col-sm-12 col-xs-12">
    

                  
                    
                    <div class="flex-wrap-movielist">
                    <!-- <form>
                                <div class="row clearfix">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" name="search" class="form-control" placeholder="Search..." value="">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="btn-group bootstrap-select form-control z-index show-tick"><button type="button" class="btn dropdown-toggle bs-placeholder btn-round btn-simple" data-toggle="dropdown" role="button" title="- All Categories -"><span class="filter-option pull-left">- All Categories -</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu" role="combobox"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">- All Categories -</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Indian</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Cartoon</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Asia</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Beach</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Wheather beauty</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="6"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">2022</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div>
                                        <select name="category" class="form-control z-index show-tick" data-live-search="true" tabindex="-98">
                                            <option value="">- All Categories -</option>
                                                                                            <option value="1">Indian</option>
                                                                                            <option value="2">Cartoon</option>
                                                                                            <option value="3">Asia</option>
                                                                                            <option value="4">Beach</option>
                                                                                            <option value="5">Wheather beauty</option>
                                                                                            <option value="6">2022</option>
                                                                                    </select></div>
                                    </div>
                                    <div class="col-3">
                                        <div class="btn-group bootstrap-select form-control z-index show-tick"><button type="button" class="btn dropdown-toggle bs-placeholder btn-round btn-simple" data-toggle="dropdown" role="button" title="- All Actors -"><span class="filter-option pull-left">- All Actors -</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu" role="combobox"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">- All Actors -</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Mia Khalifa</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Sahil</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Sunny Leone</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Nature</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Aditi</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="6"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Kristine</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="7"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Kneedy</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div>
                                        <select name="actor" class="form-control z-index show-tick" data-live-search="true" tabindex="-98">
                                            <option value="">- All Actors -</option>
                                                                                            <option value="12">Mia Khalifa</option>
                                                                                            <option value="15">Sahil</option>
                                                                                            <option value="16">Sunny Leone</option>
                                                                                            <option value="17">Nature</option>
                                                                                            <option value="18">Aditi</option>
                                                                                            <option value="19">Kristine</option>
                                                                                            <option value="20">Kneedy</option>
                                                                                    </select></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                               
                            </form> -->
            <div class="col-12">
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
                                  <a href="{{route('register')}}">
                                    <video  height="100%" style="height: auto;" width="100%" playsinline muted loop >
                                        <source src="{{$video->shortvideo}}">
                                    </video>
                                  </a>
                                   @endif
                                   
                                   
                                </div>
                                
                                <div class="title-in">
                                 <h6 class="heading-name"><a href="{{url('movies/'.$video->id)}}">{{$video->name}}</a><span class="align-right" style="color:#fff;"><i class="ion-android-time">{{ Carbon\Carbon::parse($video->created_at)->diffForHumans()}}</i></span></h6>
                                 
                                <div class="heading-section">
                          
                                            </div>
                               
                                
                            </div>
                                
                                
                              
                            </div>
                        @endforeach
                        @else
                        <div class="alert alert-info">
                          <strong>Info!</strong> No Video Found.
                        </div>
                        @endif
        </div>
                    </div>
                    <!--{{$films->appends(request()->query())->links()}}-->
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