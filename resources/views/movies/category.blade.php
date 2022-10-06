@extends('layouts.home.app')
@section('content')
    @push('style')
       
    @endpush
<?php $url= explode('/',$_SERVER['REQUEST_URI']); 
//dd($url);
$sess = session_id();
?>  
    

         <div class="section-1">

            <div class="csloader">
                <div class="testing">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="second-section">
               <div class="one-list-section">
                  <div class="one-list">
                     <h1 class="one-list-heading">Videos</h1>
                  </div>
               </div>
               <input type="hidden" name="categoryid" id="categoryid" value="{{$categoryID}}">
               <input type="hidden" name="basePageURL" id="basePageURL" value="{{url('/')}}/{{$url[2]}}/{{$url[3]}}">
               <div class="s1video-collection row mb-3" id="s1-video-collection-CategoryVideo">
                  <!-- <div class="video-card-category mv-img">
                     <div class="card-images">
                        <a href="" data-fancybox="gallery" data-caption="Caption Images 1">
                           <video src="assets/video/por8.mp4" playsinline muted loop  width="100%" height="auto" alt="Image Gallery" ></video>
                        </a>
                        <div class="pornstar-thumb-container__info-videos">
                           <div class="metric-container views">asia</div>
                           <div class="metric-container videos"><i class="fas fa-video"></i> 196</div>
                        </div>
                        <div class="video-disciprtion">
                           <a href="" title="" class="one-list-text">Diana Rius</a>
                           <div class="one-list-date">Aug 27, 2022</div>
                        </div>
                     </div>
                  </div> -->
                 
               </div>
               <!-- <div class="readmores-btn text-center">
                  <a href="category.html" class="load-mores" type="submit"> Load More Videos</a>
               </div> -->
            </div>
         </div>

@endsection