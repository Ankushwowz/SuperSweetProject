<html>
   <head>
      
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>SuperSweet Club</title>
      <link rel="icon" type="image/x-icon" href="{{url('/')}}/public/home_files/img/sweetlogo-new.png">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
      <link rel="stylesheet" href="{{asset('public/home_files/css/style.css')}}">
   </head>
   <body >
    <section style="background: url({{url('/')}}/public/home_files/img/various2.jpg); height:100vh;" class="pos-subs" >
        <div class="logo-membership-link"><a href="{{url('/')}}"><img alt="" class="logo-membership" src="{{url('/')}}/public/web_files/images/sweetlogo.png"></a></div>
        <div class="container postroll-desktop ">
         <div class="">
            <h3 class="postroll-header">Registration <u>Required</u> <span class="close-buttons-member"> <a href="{{url('/')}}">
                           <i class="fa fa-times" aria-hidden="true"></i>
                           </a>
                           </span></h3>
         </div>
         <div class="text-center">
            <p class="text-pros"><strong>You must choose a plan from the below to Get Access to our Super Sweet Club.</strong>  Gain access to the best HD 4k videos, and hundreds of high quality photos today.</p>
         </div>
            @error('supscriptionplan')
                <span class="invalid-feedback"  role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
         <div class="row set-paddi">
            <div class="col-md-6">
                <form name="membership" id="myform" method="post" action="{{url('/membership/form')}}" enctype="multipart/form-data">
                       @csrf
               <div class="row membership-sides">
                   
                  <div class="col-md-12">
                     <div class="subs-check radi-sbchrcks">
                        <input type="radio" value="2" class="form-check-input" id="month" name="supscriptionplan">
                        <div class="join-option ">
                           <div class="join-option-label">
                              <h2 class="days-member">
                                 30 DAY MEMBERSHIP
                              </h2>
                              <p class="bills">Billed in monthly payments of $30</p>
                           </div>
                           <div class="join-option-price ">
                              <span class="price"><sup>$</sup>30/month</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="subs-checks radi-sbchrcks">
                        <input type="radio" value="1" class="form-check-input" id="day" name="supscriptionplan">
                         
                        <div class=" join-option ">
                           <div class="join-option-label">
                              <h2 class="days-member">
                                 1 DAY MEMBERSHIP
                              </h2>
                              <p class="bills">Billed in daily payments of $2</p>
                           </div>
                           <div class="join-option-price ">
                              <span class="price"><sup>$</sup>2/day</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <button class="submit-btn btn btn-big btn-primary btn-radio" id="my_button" type="submit" disabled>
                     Get Access Now            
                     </button>
                  </div>
                  
                  <div class="col-md-12">
                  </div>
               </div>
               
               </form>
               
            </div>
            <div class="col-md-6">
               <div class="tex-members">
                  <h4 class="tex-hedings">Membership Benefits</h4>
                  <ul class="call-to-action">
                     <li><i class="fa fa-check-square" aria-hidden="true"></i> Safe and Secure Transaction</li>
                     <li><i class="fa fa-check-square" aria-hidden="true"></i> Anonymous Billing</li>
                     <li><i class="fa fa-check-square" aria-hidden="true"></i> Frequent Updates</li>
                     <li><i class="fa fa-check-square" aria-hidden="true"></i> 4k HD Videos</li>
                     <li><i class="fa fa-check-square" aria-hidden="true"></i> Unlimited Streaming &amp; Downloads</li>
                     <li><i class="fa fa-check-square" aria-hidden="true"></i> Optimized Mobile and Tablet Access</li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      </section>
      
      <script>
      var inputElems = document.getElementsByClassName("form-check-input");
    for (var i = inputElems.length - 1; i >= 0; --i) {
      var elem = inputElems[i];
      elem.onchange = function () {
        document.getElementById("my_button").removeAttribute("disabled");
      };
    }

</script>
    <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
    <!--  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>-->
    <!--   <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>-->
    <!--   <script>-->
    <!--    $(document).ready(function () {-->
        <!--$('#myform').validate({ -->
    <!--        rules: {-->
    <!--            name: {-->
    <!--                supscriptionplan: true-->
    <!--            },-->
    <!--        }-->
    <!--    });-->
    <!--});-->
    <!--</script>-->
      
   </body>
</html>