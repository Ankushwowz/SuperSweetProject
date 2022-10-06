@extends('layouts.home.app')
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
<?php $url= explode('/',$_SERVER['REQUEST_URI']); 
//dd($url);
$sess = session_id();
?> 

         <div class="video-model">
             <h1 class="title-videsos">{{$film->name}}</h1>
             <div class="row mx-0 ">
               <div class="col-md-8 col-sm-12 col-xs-8 single-pages">
                  <a href="#" data-fancybox="gallery" data-caption="Caption Images 1">
                  <video class="set-vide" src="{{$film->video}}"  rel="{{$film->id}}" width="100%" controls controlslist="nodownload">
                  </video>
                  </a>
                  <!--<div class="movie-rate" style="/* display:none; */">-->
                  <!--          <div class="rate">-->
                  <!--              <i class="fa fa-star" aria-hidden="true"></i>-->
                  <!--              <p><span class="movie_rating">0</span> /10<br>-->
                  <!--                  <span class="rv movie_reviews">0 Reviews</span>-->
                  <!--              </p>-->
                  <!--          </div>-->
                  <!--          <div class="rate-star">-->
                  <!--              <p>Rate This Video: </p>-->
                  <!--              <form class="rating">-->
                  <!--                                                      <input type="hidden" class="user_rate" value="">-->
                  <!--                  <label>-->
                  <!--                      <input class="stars_1" name="stars" type="radio" value="1">-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                  </label>-->
                  <!--                  <label>-->
                  <!--                      <input class="stars_2" name="stars" type="radio" value="2">-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                  </label>-->
                  <!--                  <label>-->
                  <!--                      <input class="stars_3" name="stars" type="radio" value="3">-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                  </label>-->
                  <!--                  <label>-->
                  <!--                      <input class="stars_4" name="stars" type="radio" value="4">-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                  </label>-->
                  <!--                  <label>-->
                  <!--                      <input class="stars_5" name="stars" type="radio" value="5">-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                  </label>-->
                  <!--                  <label>-->
                  <!--                      <input class="stars_6" name="stars" type="radio" value="6">-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                  </label>-->
                  <!--                  <label>-->
                  <!--                      <input class="stars_7" name="stars" type="radio" value="7">-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                  </label>-->
                  <!--                  <label>-->
                  <!--                      <input class="stars_8" name="stars" type="radio" value="8">-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                  </label>-->
                  <!--                  <label>-->
                  <!--                      <input class="stars_9" name="stars" type="radio" value="9">-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                  </label>-->
                  <!--                  <label>-->
                  <!--                      <input class="stars_10" name="stars" type="radio" value="10">-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                      <span class="icon">★</span>-->
                  <!--                  </label>-->
                  <!--              </form>-->
                  <!--          </div>-->
                  <!--      </div>-->
               </div>
            <div class="col-md-4 col-sm-12 col-xs-8 cast-left-models">
               <div class="title-hd-mode cast-left">
                  <h4 class="model-sizes">Model</h4>
               <div class="news-model">
               <div class="actors-namess model-accttre"><a href="{{url('models/' . $actor->actorname)}}">{{$actor->actorname}}</a></div>
               <a href="{{url('models/' . $actor->actorname)}}"><img src="{{ URL::to('/') }}/public/actor_avatars/{{$actor->avatar1}}" alt=""></a>
               </div>
               </div>
            </div>
         </div>
      </div>
      <div class="section-3 vide-section">
         <div class="gallery ">
             <div class="headerwfooter">
            <h1 class="gallery-title-catego">See More Videos</h1>
            <div class="heading-divider"><i class="fa fa-star" aria-hidden="true"></i></div>
            </div>
         </div>
         <div class="second-section">

            <input type="hidden" name="basePageURL" id="basePageURL" value="{{url('/')}}/{{$url[2]}}/{{$url[3]}}">
            <input type="hidden" name="videoid" id="videoid" value="{{$film->categories}}"/>

            <div class="s1video-collection row mb-3" id="s1-video-collection-Featuredvideos">
               <!-- <div class="video-card mv-img">
                  <div class="card-imags">
                     <a href="" data-fancybox="gallery" data-caption="Caption Images 1">
                        <video src="assets/video/R1_02.mp4" playsinline="" muted="" loop="" width="100%" height="auto" alt="Image Gallery"></video>
                     </a>
                  </div>
               </div> -->
               <!--<div class="video-card mv-img">
                  <div class="card-imags">
                     <a href="" data-fancybox="gallery" data-caption="Caption Images 1">
                        <video src="assets/video/R3_03.mp4" playsinline="" muted="" loop="" width="100%" height="auto" alt="Image Gallery"></video>
                     </a>
                  </div>
               </div>
               <div class="video-card mv-img">
                  <div class="card-imags">
                     <a href="" data-fancybox="gallery" data-caption="Caption Images 1">
                        <video src="assets/video/R1_021.mp4" playsinline="" muted="" loop="" width="100%" height="auto" alt="Image Gallery"></video>
                     </a>
                  </div>
               </div>
               <div class="video-card mv-img">
                  <div class="card-imags">
                     <a href="" data-fancybox="gallery" data-caption="Caption Images 1">
                        <video src="assets/video/R5_02.mp4" playsinline="" muted="" loop="" width="100%" height="auto" alt="Image Gallery"></video>
                     </a>
                  </div>
               </div>
               <div class="video-card mv-img">
                  <div class="card-imags">
                     <a href="" data-fancybox="gallery" data-caption="Caption Images 1">
                        <video src="assets/video/R3_03.mp4" playsinline="" muted="" loop="" width="100%" height="auto" alt="Image Gallery"></video>
                     </a>
                  </div>
               </div>
               <div class="video-card mv-img">
                  <div class="card-imags">
                     <a href="" data-fancybox="gallery" data-caption="Caption Images 1">
                        <video src="assets/video/R1_021.mp4" playsinline="" muted="" loop="" width="100%" height="auto" alt="Image Gallery"></video>
                     </a>
                  </div>
               </div>
               <div class="video-card mv-img">
                  <div class="card-imags">
                     <a href="" data-fancybox="gallery" data-caption="Caption Images 1">
                        <video src="assets/video/R1_02.mp4" playsinline="" muted="" loop="" width="100%" height="auto" alt="Image Gallery"></video>
                     </a>
                  </div>
               </div>
               <div class="video-card mv-img">
                  <div class="card-imags">
                     <a href="" data-fancybox="gallery" data-caption="Caption Images 1">
                        <video src="assets/video/R5_02.mp4" playsinline="" muted="" loop="" width="100%" height="auto" alt="Image Gallery"></video>
                     </a>
                  </div>
               </div>
               <div class="video-card mv-img">
                  <div class="card-imags">
                     <a href="" data-fancybox="gallery" data-caption="Caption Images 1">
                        <video src="assets/video/R1_02.mp4" playsinline="" muted="" loop="" width="100%" height="auto" alt="Image Gallery"></video>
                     </a>
                  </div>
               </div>
               <div class="video-card mv-img">
                  <div class="card-imags">
                     <a href="" data-fancybox="gallery" data-caption="Caption Images 1">
                        <video src="assets/video/R1_021.mp4" playsinline="" muted="" loop="" width="100%" height="auto" alt="Image Gallery"></video>
                     </a>
                  </div>
               </div>-->
            </div>
            <!--<div class="readmores-btn text-center">-->
            <!--   <a href="category.html" class="read-signups" type="submit"> Show More </a>-->
            <!--</div>-->
         </div>
      </div>
    
    
    

@endsection