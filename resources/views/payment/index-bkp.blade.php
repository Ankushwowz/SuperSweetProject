<!DOCTYPE html>
<html>
   <head>
      <title>Stripe Payment Page</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="icon" type="image/x-icon" href="http://supersweet.club/public/web_files/images/sweetlogo-new.png">
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <style type="text/css">
         .payment-form-section {
    border: none;
    padding: 10px;
    margin: 0px auto;
    max-width: 50%;
}
.paynow-button {
    text-align: center;
}
.heading-payment {
    color: #fff;
}
input#payBtn {
    padding: 12px 50px;
    color: #fff;
    margin: 16px 0;
    border: none;
    font-weight: bold;
    border-radius: 10px;
    border: none !important;
    background: linear-gradient(to left, #fa017e, #64dcfe);
    box-shadow: 0px 0px 5px 0px #ddd;
    color:#fff;
}
input#payBtn:hover {
    background: linear-gradient(to left, #64dcfe, #fa017e );
    box-shadow: 0 0 10px #ccc;
    transition: 0.1s;
}
section.stripe-section-detials {
    background-image: linear-gradient(to right top, #051937, #222b69, #593798, #9d36bd, #eb12d4);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.image-boxes {
    width: 80px;
    height: 50px;
}
.img-box {
    margin: 20px 0px;
}
.payment-history {
    text-align: center;
    margin-bottom: 20px;
    color: #fff;
}
.image-center {
    text-align: center;
}
.logo-stripe {
    width: 50%;
}
.main-stripe{
    border: 1px solid #fff;
    padding: 10px;
    border-radius: 10px;
}
.image-center {
    margin-bottom: 10px;
}

      </style>
   </head>
   <body>
      <section class="stripe-section-detials" style="margin-top:20px">
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
                                        <div class="col-md-12">
                                        <div class="image-center"><a href="{{url('/')}}">
                                            <img alt="" class="logo-stripe" src="{{url('/')}}/public/web_files/images/sweetlogo.png"></a></div>
                                        </div>
                                        
                                        <div class="main-stripe row">
                                        <div class="col-md-12">
                                         <div class="payment-history">
                                            <h1>Your Subscription Details</h1>
                                        </div>
                                         <div class="payment-status" style="color: red; text-align:center;font-size: 24px;"></div>
                                    </div> 
                                    <!--    <div class="col-md-12">-->
                                    <!--     <div class="img-box">-->
                                    <!--        <img src="https://www.freepnglogos.com/uploads/visa-logo-download-png-21.png" alt="" class="image-boxes">-->
                                    <!--         <img src="https://www.freepnglogos.com/uploads/mastercard-png/file-mastercard-logo-svg-wikimedia-commons-4.png" alt="" class="image-boxes">-->
                                    <!--        <img src="https://www.freepnglogos.com/uploads/discover-png-logo/credit-cards-discover-png-logo-4.png" alt="" class="image-boxes">-->
                                    <!--    </div>-->
                                    <!--</div> -->
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="plan_name" placeholder="Plan Name"  id="plan_name"  value="{{$userplan->plan_name}}" readonly/>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="plan_price" placeholder="Plan Price" id="plan_price"  value="{{$userplan->plan_price}}" readonly/>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="holdername" placeholder="Name on card" autofocus required id="name"  value="{{$userplan->username}}"/>
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
                                    </form>
      </section>
   </body>
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
</html>