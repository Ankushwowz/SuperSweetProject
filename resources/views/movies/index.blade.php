@extends('layouts.home.app')
@section('content')
<?php $url= explode('/',$_SERVER['REQUEST_URI']); 

$sess = session_id();
?>  

         <div class="section-1">

            <!--<div class="csloader">-->
            <!--    <div class="testing">-->
            <!--        <div class="circle"></div>-->
            <!--    </div>-->
            <!--</div>-->


            <div class="second-section">
               <div class="one-list-section">
                  <div class="one-list">
                     <h1 class="one-list-heading">Videos</h1>
                  </div>
               </div>
               <input type="hidden" name="categoryid" id="categoryid" value="">
               <input type="hidden" name="basePageURL" id="basePageURL" value="{{url('/')}}/{{$url[2]}}">
               <div class="s1video-collection row mb-3" id="s1-video-collection-ListVideo"> </div>

            </div>
            
         </div>




@endsection