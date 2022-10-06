<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>SuperSweet Club</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="assets/css/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="{{asset('/public/home_files/css/style.css')}}">
   </head>
   <style>
       .priceicon {
    position: relative;
    display: block;
}
.priceicon:before {
    content: '$';
    position: absolute;
    height: 34px;
    left: 8px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
    border-right: 1px solid #ccc;
    padding: 0 4px;
    line-height: 34px;
    color: #87ceeb;
    font-size: 20px;
}
.priceicon input {
    padding-left: 35px !important;
}
   </style>
   <body style="color:#fff;" class="stripe-section-detials">
                <section class="">
                    <div class="payment-form-imgs"><img src="{{ URL::to('/') }}/public/home_files/img/joinbanner_cleanup.jpg" alt="Image Gallery"></div>

                            <form method="post" action="{{route('stripe.post')}}" id="payment-form">
                  
                             @csrf


                                <input type="hidden" name="username" value="{{$userplan->username}}" readonly>
                                <input type="hidden" name="useremail" value="{{$userplan->email}}" readonly>
                                <input type="hidden" name="subscriptionid" value="{{$userplan->subscriptionid}}" readonly>
                                <!--<input type="hidden" name="plan_name" value="{{$userplan->plan_name}}" readonly>-->
                                <input type="hidden" name="plan_duration" value="{{$userplan->plan_duration}}" readonly>
                                <input type="hidden" name="plan_time" value="{{$userplan->plan_time}}" readonly>
                                <!--<input type="hidden" name="plan_price" value="{{$userplan->plan_price}}" readonly>-->
                                <input type="hidden" name="price_id" value="{{$userplan->price_id}}" readonly>

                                <div class="row payment-form-section">
                                       
                                        <div class="main-stripe row">
                                             <div class="col-md-12">
                                        <div class="image-center"><a href="{{ URL::to('/') }}">
                                            <img alt="" class="logo-stripe" src="{{ URL::to('/') }}/public/home_files/img/sweetlogo.png"></a></div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                         <div class="payment-history">
                                            <h1>Your Subscription Details</h1>
                                        </div>
                                         <div class="payment-status" style="color: red; text-align:center;font-size: 24px;"></div>
                                    </div> 
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            
                                               <input type="text" class="form-control" name="plan_name" placeholder="Plan Name" id="plan_name" value="{{$userplan->plan_name}}" readonly="">
                                            
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="priceicon">
                                                <input type="text" class="form-control" name="plan_price" placeholder="Plan Price" id="plan_price" value="{{$userplan->plan_price}}" readonly="">
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="holdername" placeholder="Name on card" autofocus="" required="" id="name"  value="{{$userplan->username}}">
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">

                                                <input type="text" class="form-control" name="card_number" placeholder="Card Number" autocomplete="cc-number" id="card_number" maxlength="16" data-stripe="number" required />
                                                
                                            </div>
                                        </div>                            
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="card_exp_month" id="card_exp_month" class="form-control" data-stripe="exp_month" required>
                                                <option value="">Expiration Month</option>
                                                <option value="01">01 ( JAN )</option>
                                                <option value="02">02 ( FEB )</option>
                                                <option value="03">03 ( MAR )</option>
                                                <option value="04">04 ( APR )</option>
                                                <option value="05">05 ( MAY )</option>
                                                <option value="06">06 ( JUN )</option>
                                                <option value="07">07 ( JUL )</option>
                                                <option value="08">08 ( AUG )</option>
                                                <option value="09">09 ( SEP )</option>
                                                <option value="10">10 ( OCT )</option>
                                                <option value="11">11 ( NOV )</option>
                                                <option value="12">12 ( DEC )</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="card_exp_year" id="card_exp_year" class="form-control" data-stripe="exp_year">
                                                <option value="">Expiration Year</option>
                                                <option value="20">2020</option>
                                                <option value="21">2021</option>
                                                <option value="22">2022</option>
                                                <option value="23">2023</option>
                                                <option value="24">2024</option>
                                                <option value="25">2025</option>
                                                <option value="26">2026</option>
                                                <option value="27">2027</option>
                                                <option value="28">2028</option>
                                                <option value="29">2029</option>
                                                <option value="30">2030</option>
                                                <option value="31">2031</option>
                                                <option value="32">2032</option>
                                                <option value="33">2033</option>
                                                <option value="34">2034</option>
                                                <option value="35">2035</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="card_cvc" placeholder="CVV" autocomplete="cc-csc" id="card_cvc" maxlength="3" required />
                                        </div>
                                    </div>
                                    
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="zip" placeholder="ZIP or Postal Code" autocomplete="no" id="card_zip" maxlength="5" required />
                                        </div>
                                    </div>
                                     <div class="col-md-12">
                                        <div class="form-group text-center">
                                    <input class="subscribe action-button submit" type="submit" value="PAY NOW" id="payBtn">
                                    </div>
                                    </div>
                                    </div>
                                    </div>
  </section>
                                    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="assets/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
      <script src="assets/js/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="{{asset('/public/home_files/js/custom.js')}}"></script>


     <script src="https://js.stripe.com/v2/"></script>
     <script>
        // Set your publishable key
        Stripe.setPublishableKey('pk_test_89mUmRLgT5DBRlOybwHDOAhv');

        // Callback to handle the response from stripe
        function stripeResponseHandler(status, response) {
            if (response.error) {
                // Enable the submit button
                $('#payBtn').removeAttr("disabled");
                // Display the errors on the form
                $(".payment-status").html('<p>'+response.error.message+'</p>');
            } else {
                var form$ = $("#payment-form");
                // Get token id
                var token = response.id;
                // Insert the token into the form
                form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                // Submit form to the server
                form$.get(0).submit();
            }
        }

        $(document).ready(function() {
            // On form submit
            $("#payment-form").submit(function() {
                // Disable the submit button to prevent repeated clicks
                $('#payBtn').attr("disabled", "disabled");
                
                // Create single-use token to charge the user
                Stripe.createToken({
                    number: $('#card_number').val(),
                    exp_month: $('#card_exp_month').val(),
                    exp_year: $('#card_exp_year').val(),
                    cvc: $('#card_cvc').val()
                }, stripeResponseHandler);
                
                // Submit from callback
                return false;
            });
        });
</script>


   </body>
</html>