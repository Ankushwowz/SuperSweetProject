$(document).ready(function(){
    var baseURL = $('#baseURL').val();
    var basePageURL = $('#basePageURL').val();
    //alert(basePageURL);
    var pageURLHome = $(location).attr("href");   
    var loadmorelimit = 10;
    var modalloadmorelimit = 40;
    var homecategoryloadmorelimit = 40;
    var categoryloadmorelimit = 40;
    var featuredmodelloadmorelimit = 40;
    var featuredvideoloadmorelimit = 40;
    var modelUrlPath= "https://oxeenit.tech/supersweet/models";
    var homeUrlPath= "https://oxeenit.tech/supersweet/";
    
    if(pageURLHome==homeUrlPath){
        $('.csloader').addClass('showl');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: baseURL+"/home/ajaxGetHomeModelsVideos",
                method: "POST",
                data: {
                    checkKey: 1,
                },
                success: function(msg) {
                    $('.csloader').removeClass('showl');
                    $('#s1-video-collection').replaceWith(msg);
                }
            });
    }
    if(pageURLHome==homeUrlPath){
        $('.csloader').addClass('showl');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: baseURL+"/home/ajaxGetHomeCategoryVideos",
                method: "POST",
                data: {
                    checkKey: 1,
                },
                success: function(msg) {
                    $('.csloader').removeClass('showl');
                    $('#s1-video-collection-category').replaceWith(msg);
                }
            });
    }
    
    $('body').on('click', '#loadBtnHomeModelsVideos', function(event) {      
      var row = Number($('#rowHomeModelsVideos').val());
      var count = Number($('#postCountHomeModelsVideos').val());
      row = row + parseInt(loadmorelimit);
      $('#rowHomeModelsVideos').val(row);
      $("#loadBtnHomeModelsVideos").text('Loading...');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: baseURL+"/home/ajaxGetHomeModelsVideos",
                method: "POST",
                data: {
                    row: row,
                    checkKey: 0,
                },
                success: function (data) {
                    var rowCount = row + parseInt(loadmorelimit);
                    $('#s1-video-collection').append(data);
                  if (rowCount >= count) {
                        $('#loadBtnHomeModelsVideos').css("display", "none");
                  } else {
                     $("#loadBtnHomeModelsVideos").text('Load More Videos');
                  }
                }
            });
    });
 
    
    
    $('body').on('click', '#loadBtnHomeCategoryVideos', function(event) {      
      var row = Number($('#rowHomeCategoryVideos').val());
      var count = Number($('#postCountHomeCategoryVideos').val());
      row = row + parseInt(homecategoryloadmorelimit);
      $('#rowHomeCategoryVideos').val(row);
      $("#loadBtnHomeCategoryVideos").text('Loading...');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: baseURL+"/home/ajaxGetHomeCategoryVideos",
                method: "POST",
                data: {
                    row: row,
                    checkKey: 0,
                },
                success: function (data) {
                    var rowCount = row + parseInt(homecategoryloadmorelimit);
                    $('#s1-video-collection-category').append(data);
                  if (rowCount >= count) {
                        $('#loadBtnHomeCategoryVideos').css("display", "none");
                  } else {
                     $("#loadBtnHomeCategoryVideos").text('Load More Videos');
                  }
                }
            });
    });

    if(pageURLHome==modelUrlPath){
        $('.csloader').addClass('showl');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: baseURL+"/home/ajaxGetModals",
                method: "POST",
                data: {
                    checkKey: 1,
                },
                success: function(msg) {
                    $('.csloader').removeClass('showl');
                    $('#s1-video-collection-modals').replaceWith(msg);
                }
            });
    }
    
    $('body').on('click', '#loadBtnModelsVideos', function(event) {      
      var row = Number($('#rowModelsVideos').val());
      var count = Number($('#postCountModelsVideos').val());
      row = row + parseInt(modalloadmorelimit);
      $('#rowModelsVideos').val(row);
      $("#loadBtnModelsVideos").text('Loading...');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: baseURL+"/home/ajaxGetModals",
                method: "POST",
                data: {
                    row: row,
                    checkKey: 0,
                },
                success: function (data) {
                    var rowCount = row + parseInt(modalloadmorelimit);
                    $('#s1-video-collection-modals').append(data);
                  if (rowCount >= count) {
                        $('#loadBtnModelsVideos').css("display", "none");
                  } else {
                     $("#loadBtnModelsVideos").text('Load More');
                  }
                }
            });
    });


/* Load all Modals in modal page Code End Here   */



/* Featured Modal Videos Code Start Here */
    var modelid = $('#modelid').val();
    //alert(modelid);
    if(pageURLHome==basePageURL){
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: baseURL+"/home/ajaxGetFeaturedModals",
                method: "POST",
                data: {
                    checkKey: 1,
                    modelid:modelid,
                },
                success: function(msg) {
                    $('#s1-video-collection-Featuredmodals').replaceWith(msg);
                }
            });
    }
    
    $('body').on('click', '#loadBtnFeaturedModelsVideos', function(event) {      
      var row = Number($('#rowFeaturedModelsVideos').val());
      var count = Number($('#postCountFeaturedModelsVideos').val());
      row = row + parseInt(featuredmodelloadmorelimit);
      $('#rowFeaturedModelsVideos').val(row);
      $("#loadBtnFeaturedModelsVideos").text('Loading...');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: baseURL+"/home/ajaxGetFeaturedModals",
                method: "POST",
                data: {
                    row: row,
                    checkKey: 0,
                    modelid:modelid,
                },
                success: function (data) {
                    var rowCount = row + parseInt(featuredmodelloadmorelimit);
                    $('#s1-video-collection-Featuredmodals').append(data);
                  if (rowCount >= count) {
                        $('#loadBtnFeaturedModelsVideos').css("display", "none");
                  } else {
                     $("#loadBtnFeaturedModelsVideos").text('Load More');
                  }
                }
            });
    });


/* Featured Modal Videos Code End Here */


/* Load all Videos according to category Code Start Here   */

    var catid = $('#categoryid').val();
   if(pageURLHome==basePageURL){
        $('.csloader').addClass('showl');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: baseURL+"/home/ajaxGetCategoryVideo",
                method: "POST",
                data: {
                    checkKey: 1,
                    catid:catid,
                },
                success: function(msg) {
                     $('.csloader').removeClass('showl');
                    $('#s1-video-collection-CategoryVideo').replaceWith(msg);
                }
            });
    }
    
    $('body').on('click', '#loadBtnCategoryVideo', function(event) {      
      var row = Number($('#rowCategoryVideo').val());
      var count = Number($('#postCountCategoryVideo').val());
      row = row + parseInt(categoryloadmorelimit);
      $('#rowCategoryVideo').val(row);
      $("#loadBtnCategoryVideo").text('Loading...');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: baseURL+"/home/ajaxGetCategoryVideo",
                method: "POST",
                data: {
                    row: row,
                    checkKey: 0,
                    catid:catid,
                },
                success: function (data) {
                    var rowCount = row + parseInt(categoryloadmorelimit);
                    $('#s1-video-collection-CategoryVideo').append(data);
                  if (rowCount >= count) {
                        $('#loadBtnCategoryVideo').css("display", "none");
                  } else {
                     $("#loadBtnCategoryVideo").text('Load More Videos');
                  }
                }
            });
    });



/* Load all Videos according to category Code End Here   */


/* Load All Listed Videos Code Start here */



if(pageURLHome==basePageURL){
    var searchValue = basePageURL .split('?search=');
    var searchV ='';
   if(searchValue[1]=='undefined'){
        searchV = '';
    }else{
        searchV=searchValue[1];
        
    }
   
    $('.csloader').addClass('showl');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: baseURL+"/home/ajaxGetListVideo",
                method: "POST",
                data: {
                    checkKey: 1,
                    searchV :searchV
                },
                success: function(msg) {
                    console.log(msg);
                    $('.csloader').removeClass('showl');
                    $('#s1-video-collection-ListVideo').replaceWith(msg);
                }
            });
    }
    
    $('body').on('click', '#loadBtnListVideo', function(event) {      
      var row = Number($('#rowListVideo').val());
      var count = Number($('#postCountListVideo').val());
      row = row + 50;
      $('#rowListVideo').val(row);
      $("#loadBtnListVideo").text('Loading...');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: baseURL+"/home/ajaxGetListVideo",
                method: "POST",
                data: {
                    row: row,
                    checkKey: 0,
                },
                success: function (data) {
                    var rowCount = row + 50;
                    $('#s1-video-collection-ListVideo').append(data);
                  if (rowCount >= count) {
                        $('#loadBtnListVideo').css("display", "none");
                  } else {
                     $("#loadBtnListVideo").text('Load More Videos');
                  }
                }
            });
    });

/* Load All Listed Videos Code End here */

/* Featured List Videos Code Start Here */
    

     var videoid = $('#videoid').val();
    if(pageURLHome==basePageURL){
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: baseURL+"/home/ajaxGetFeaturedVideos",
                method: "POST",
                data: {
                    checkKey: 1,
                    videoid:videoid,
                },
                success: function(msg) {
                    $('#s1-video-collection-Featuredvideos').replaceWith(msg);
                }
            });
    }
    
    $('body').on('click', '#loadBtnFeaturedvideos', function(event) {      
      var row = Number($('#rowFeaturedvideos').val());
      var count = Number($('#postCountFeaturedvideos').val());
      row = row + parseInt(featuredvideoloadmorelimit);
      $('#rowFeaturedvideos').val(row);
      $("#loadBtnFeaturedvideos").text('Loading...');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: baseURL+"/home/ajaxGetFeaturedVideos",
                method: "POST",
                data: {
                    row: row,
                    checkKey: 0,
                    videoid:videoid,
                },
                success: function (data) {
                    var rowCount = row + parseInt(featuredvideoloadmorelimit);
                    $('#s1-video-collection-Featuredvideos').append(data);
                  if (rowCount >= count) {
                        $('#loadBtnFeaturedvideos').css("display", "none");
                  } else {
                     $("#loadBtnFeaturedvideos").text('Load More');
                  }
                }
            });
    });

/* Featured List Videos Code End Here */

    $('body').on('mouseover', '.vid', function(event) { 
         $(this).get(0).play();
            $('.vid').mouseenter(function () {
                $(this).get(0).play();
            }).mouseleave(function () {
                $(this).get(0).pause();
            })
        });
        
        
        
       
    $('body').on('click', '.btn-submit', function(e) { 
        e.preventDefault();
        var currLoc = $(location).attr('href');
        var relV = $(this).attr('rel');
        var visitor_ip = $("input[name=visitor_ip]").val();
        var visitor_session = $("input[name=visitor_session]").val();
        var button_value = $("input[name=button_value]").val();
        var under18Url = $("#under18Url").val();
        
        if(relV=='under18'){
            window.location = under18Url;
        }else{
            if(visitor_ip!='' &&  visitor_session!='' && button_value!='' ){
          
           $.ajax({
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
           url: baseURL+"/popupinsert",                    
           method:'POST',
           data:{
                  visitor_ip:visitor_ip, 
                  visitor_session:visitor_session,
                  button_value:button_value
                },
           success:function(response){
             if(response.success){
                  window.location = currLoc;
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
       }
            
        }
      
        
        return false;
    });
    
        $('body').on('click', '.btn-radio', function(e) {
            alert("Here"); return false;
             var atLeastOneChecked = false;
            $("input[type=radio]").each(function() {
             
                if ($(this).attr("checked") != "checked") {
                    $("#msg").html(
        "<span class='alert alert-danger' id='error'>"
        + "Please Choose atleast one</span>");
                }
            });
            
        });
 

});





/* Featured Modal Videos Code Start Here */



/* Featured Modal Videos Code End Here */


var figure = $(".mv-img").hover( hoverVideo, hideVideo );

function hoverVideo(e) {  
    $('.notautoplay', this).get(0).play(); 
}

function hideVideo(e) {
    $('.notautoplay', this).get(0).pause(); 
}

  ////////////// 
 
$(".default_option").click(function(){  
    $(".dropdown ul").addClass("active");
});

$(".dropdown ul li").click(function(){
  var text = $(this).text();
  $(".default_option").text(text);
  $(".dropdown ul").removeClass("active");
});

var cs = $('.fepornaC').owlCarousel({
    items: 5,
	nav: false,
	dots: false,
	autoplay: true,
	autoplaySpeed: 4000,
    autoplayHoverPause:true,
	smartSpeed: 500,	  
    loop: true,
	margin: 30,
	touchDrag  : false,
    mouseDrag  : false,
    responsive:{
        0:{
            items:1
        },
        576:{
            items:2
        },
        768:{
            items:3
        },
        1024:{
            items:5
        }
    }
});

$(window).bind('resize load scroll', function(){
	var divWidth = $(".fepornaC .owl-item").width();
	$(".fepornaC img").height(divWidth);
});

var backtotop = $('#back-to-top');
    backtotop.on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 300);
    });

$(document).ready(function(){
	$('.cheadert').click(function(){
		$(this).toggleClass('open');
		$('body').toggleClass('headeropen');
		$('.navbar-collapse').toggleClass('show');
	});
});

$(window).bind('resize load scroll', function(){
	var divWidth = $(".ps-bg").width();
	$(this).height(divWidth);
});





 