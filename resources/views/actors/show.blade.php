@extends('layouts.home.app')
@section('content')

<?php $url= explode('/',$_SERVER['REQUEST_URI']); 
//dd($url);
$sess = session_id();
?>
<!-- celebrity single section-->

<section class="main-single-page mt-3">
         <div aria-atomic="true" aria-relevant="all" class="single-model">
            <div class="model-bio row">
               <div class="modelss col-md-4">
                  @if(!empty($actor->avatar1))
                    <img alt="{{$actor->name}}" src="{{ URL::to('/') }}/public/actor_avatars/{{$actor->avatar1}}" class="model-cort ">
                    @else
                    <img alt="{{$actor->name}}" src="{{ URL::to('/') }}/public/images/dummyimage.png" style="height: 350px" class="model-cort ">
                    @endif
                     
                  
               </div>
               <div class="model-paragraph col-md-8">
                  <div class="social-set">
                     <h1 class="paragraph-heading">{{$actor->name}}</h1>
                     <div class="social-link cebsingle-socail">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-google-plus"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                     </div>
                  </div>
                  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                     <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Overview</a>
                     <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> biography</a>
                     <!--<li><a href="#filmography">filmography</a></li>-->
                  </div>
                  <div class="tab-content" id="nav-tabContent">
                     <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">{{$actor->overview}}</div>
                     <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="pargrh-second ">
                           <span>
                           <!-- Popularity: <strong>99%</strong><i class="fa-solid fa-heart"></i> -->
                           </span>
                        </div>
                    <div class="overview row">
                         <div class="appers col-md-7">  {{$actor->biography}}</div> 
                           <div class="overview-list col-md-5">
                               <h3>Name </h3><p>{{$actor->name}}</p>
                              <p>Date of Birth: <span>{{date('F d, Y',strtotime($actor->dob))}}</span></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="section-3 models-section">
            <div class="gallery ">
                <div class="headerwfooter">
               <h1 class="gallery-title-catego">Related Videos</h1>
               <div class="heading-divider"><i class="fa fa-star" aria-hidden="true"></i></div>
               </div>
            </div>
            <div class="second-section">
                <input type="hidden" name="basePageURL" id="basePageURL" value="{{url('/')}}/{{$url[2]}}/{{$url[3]}}">
               <input type="hidden" name="id" id="modelid" value="{{$actor->id}}"/>
               <div class="s1video-collection row mb-3" id="s1-video-collection-Featuredmodals">

                  
                  
               </div>
               <!--<div class="readmores-btn text-center">-->
               <!--   <a href="category.html" class="read-signups" type="submit"> Show More </a>-->
               <!--</div>-->
            </div>
         </div>
      </section>
<!-- celebrity single section-->


<!--    <script src="https://oxeenit.tech/supersweetclub/public/web_files/js/jquery.js"></script>
    
    <script>
    var figure = $(".mv-img").hover( hoverVideo, hideVideo );
    
    function hoverVideo(e) {  
    $('video', this).get(0).play(); 
    }
    
    function hideVideo(e) {
    $('video', this).get(0).pause(); 
    }
    </script>-->

@endsection