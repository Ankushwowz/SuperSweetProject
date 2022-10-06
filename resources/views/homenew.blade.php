@extends('layouts.home.app')
@section('content')




      <!-- <img src="assets/img/R1_01.jpg" alt="Image" width="100%" /> -->
      <div class="section-1">
         <!-- <div class="input-group">
            <div class="input-group-btn search-panel">
               <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <span id="search_concept">Search for......</span> <span class="caret"></span>
               </button>
               <ul class="dropdown-menu dropmenu" role="menu">
                  <li><a href="#contains" class="dropbox">Video</a></li>
                  <li><a href="#greather_than" class="dropbox">Model</a></li>
               </ul>
            </div>
            <input type="hidden" name="search_param" value="all" id="search_param">         
            <input type="text" class="form-control serch-btns" name="x" placeholder="Search for a video, model that you are looking for">
            <div class="input-group-append">
               <button class="btn btn-secondary" type="button">
               <i class="fa fa-search"></i>
               </button>
            </div>
         </div> -->
         <div class="first-section">
            <div class="one-list-section">
               <div class="one-list">
                  <h1 class="one-list-heading">Latest <p class="animate-charcter">SuperSweet</p> Videos</h1>
               </div>
               <!--<a href="{{url('/movies')}}" class="view-alls">View All</a>-->
            </div>
            <div class="s1video-collection row mb-3">
              @foreach($latestvideos as $key=>$value)
                @php  
                $vplayArray = array('1','3','5'); 
                @endphp    
                 @if(in_array($key,$vplayArray))
                     @php 
                     $autoplay ='autoplay';  
                     $vclass="autoplay"; 
                     @endphp
                   @else
                    @php 
                    $autoplay =''; 
                    $vclass="notautoplay";  
                    @endphp
                   @endif
               @if ($customers == 1)
                  
               <div class="video-card mv-img">
                  <div class="card-image">
                     <a href="{{url('movies/'.$value->id)}}" data-fancybox="gallery" data-caption="Caption Images 1">
                        <video  class="{{$vclass}}" {{$autoplay}} src="{{$value->shortvideo}}" playsinline muted loop  width="100%" height="auto" alt="Image Gallery"></video>
                     </a>
                  </div>
               </div>

                @else
                @if(auth()->user())

                <div class="video-card mv-img">
                  <div class="card-image">
                     <a href="{{url('stripe')}}" data-fancybox="gallery" data-caption="Caption Images 1">
                        <video  class="{{$vclass}}" {{$autoplay}} src="{{$value->shortvideo}}" playsinline muted loop  width="100%" height="auto" alt="Image Gallery"></video>
                     </a>
                  </div>
               </div>

               @else
                <div class="video-card mv-img">
                  <div class="card-image">
                     <a href="{{url('membership')}}" data-fancybox="gallery" data-caption="Caption Images 1">
                        <video  class="{{$vclass}}" {{$autoplay}} src="{{$value->shortvideo}}" playsinline muted loop  width="100%" height="auto" alt="Image Gallery"></video>
                     </a>
                  </div>
               </div>

               @endif
              
              @endif

               @endforeach
            </div>
         </div>
      </div>
      <div class="section-2 loader-actegory">
          <div class="csloader">
                   <div class="testing">
                       <div class="circle"></div>
                   </div>
                 </div>
         <div class="second-section">
            <div class="one-list-section">
               <div class="one-list">
                  <h1 class="one-list-heading"><p class="animate-charcter">SuperSweet</p> Model Videos</h1>
                  <div class="heading-divider"></div>
               </div>
               <!--<a href="{{url('/models')}}" class="view-alls">View All</a>-->
            </div>
             
            <div class="s1-redmore">
               <div class="s1video-collection row mb-3" id="s1-video-collection">
                   <?php for($i=0;$i<10;$i++) { ?>
                    <div class="post-skelton">
                        <div class="ps-bg"></div>
                        <div class="ps-content">
                            <div class="pc-title"></div>
                            <div class="pc-v"></div>
                        </div>
                    </div>
                    <?php } ?>
                   
               </div>
            </div>
         
           
         </div>
      </div>



      <div class="section-3 loader-actegory">
           <div class="csloader">
                   <div class="testing">
                       <div class="circle"></div>
                   </div>
            </div>
         <div class="gallery ">
             <div class="headerwfooter">
            <h1 class="gallery-title-catego">Browse By Category</h1>
            <div class="heading-divider"><i class="fa fa-star" aria-hidden="true"></i></div>
         </div>
         </div>
         

         <div class="s1-redmore">
            <div class="second-section">
               <div class="s1video-collection row mb-3" id="s1-video-collection-category">
                   <?php for($i=0;$i<10;$i++) { ?>
                    <div class="post-skelton">
                        <div class="ps-bg"></div>
                        <div class="ps-content">
                            <div class="pc-title"></div>
                            <div class="pc-v"></div>
                        </div>
                    </div>
                    <?php } ?>
               </div>
            </div>
            
         </div>
      </div>



     <div class="actors-model">
      <div class="headerwfooter">
      <h2 class="gallery-title-catego">Featured SuperSweet Stars</h2>
      <div class="heading-divider"><i class="fa fa-star" aria-hidden="true"></i></div>
      </div>
      <div class="section-fourth">
          <div class="fepornaC owl-carousel">
            @foreach($allmodels as $key => $models)
                <div class="item {{$key == 0 ? 'active' : '' }}">
                    <div class="model-imag">
                        <a class="preview" href="{{url('models/'.$models->name)}}">
                          <img src="{{ URL::to('/') }}/public/actor_avatars/{{$models->avatar1}}" alt="Image Gallery" class="lazyloaded"  >
                          <div class="ps-title"><h5>{{$models->name}}</h5></div>
                      </a>
                </div>
                </div>
            @endforeach

            </div>
        </div>
      </div>


<!-- <script src="{{asset('web_files/js/jquery.js')}}"></script> -->
<script>
  
 /*$(document).ready(function () {
  var paginate = 1;
        loadMoreData(paginate);

        $('#load-more').click(function() {
            var page = $(this).data('paginate');
            loadMoreData(page);
            $(this).data('paginate', page+1);
        });  
    function loadMoreData(paginate){
         var SITEURL = "{{url('video/modals')}}"
        $.ajax({
             headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           url: SITEURL + "?page=" + paginate,
           type: "get",
           datatype: "html",
           beforeSend: function()
           {
              $('#load-more').text('Loading...');
            }
        })
        .done(function(data)
        {
         //console.log(data.length); return false;
            if(data.length == 0){
            $('.invisible').removeClass('invisible');
           $('#load-more').hide();
           return;
          }else{
            
               $('#load-more').text('Load more...'); //hide loading animation once data is received
           
             $("#videoresults").append(data); //append data into #results element          
              console.log(data.length);
            }
       })
       .fail(function(jqXHR, ajaxOptions, thrownError)
       {
          alert('No response from server');
       });
    }
});*/
</script>






<script>
  
 /*$(document).ready(function () {
  var paginate = 1;
        loadMoreData(paginate);

        $('#load-more1').click(function() {
            var page = $(this).data('paginate');
            loadMoreData(page);
            $(this).data('paginate', page+1);
        });  
    function loadMoreData(paginate){
         var SITEURL = "{{url('video/category')}}"
        $.ajax({
             headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           url: SITEURL + "?page=" + paginate,
           type: "get",
           datatype: "html",
           beforeSend: function()
           {
              $('#load-more1').text('Loading...');
            }
        })
        .done(function(data)
        {
            if(data.length == 0){
            $('.invisible1').removeClass('invisible1');
           $('#load-more1').hide();
           return;
          }else{
            
               $('#load-more1').text('Load more...'); //hide loading animation once data is received
           
             $("#post_data").append(data); //append data into #results element          
              console.log(data.length);
            }
       })
       .fail(function(jqXHR, ajaxOptions, thrownError)
       {
          alert('No response from server');
       });
    }
});*/
</script>



@endsection