@extends('layouts.home.app')
@section('content')
    @push('style')
        
    @endpush

<?php $url= explode('/',$_SERVER['REQUEST_URI']); 

$sess = session_id();
?>  

<div class="mx-4 text-center">
<div class="headerwfooter">
  <h1 class="text-center text-lg-start modellist gallery-title-catego"><p class="animate-charcter">SuperSweet</p> Models</h1>
  <div class="heading-divider"><i class="fa fa-star" aria-hidden="true"></i></div>
</div>
    <div class="csloader">
            <div class="testing">
                <div class="circle"></div>
            </div>
    </div>
  <div class="row text-center text-lg-start" id="s1-video-collection-modals">  </div>
 

</div>
    <!--end of celebrity grid v1 section-->

@endsection