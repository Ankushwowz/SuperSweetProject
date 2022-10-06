<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Session;
use Stripe;
use DB;
use Auth;
use Carbon\Carbon;

use App\UserSubscription;

class StripeController extends Controller
{
    public function index(Request $request)
    {
          $userplan =DB::table('users')
            ->join('subscriptions', 'users.subscriptionplan', '=', 'subscriptions.id')
            ->select('users.*','subscriptions.id as subscriptionid','subscriptions.plan_name','subscriptions.plan_duration','subscriptions.plan_time','subscriptions.plan_price','subscriptions.price_id')
            ->where('users.id',Auth::user()->id)
            ->get()->first();
        //dd($userplan);    
        session_start();
        $sess = session_id();
        $ip =$_SERVER['REMOTE_ADDR'];
        $popup = DB::table('popup')->where('visitor_session',$sess)->count();
    return view('payment.index',compact('userplan','popup'));
    }
    
    
    
    public function stripePost(Request $request)
    {
        //dd($request->all());
        $username = $request->username;
        $planName = $request->plan_name;
        $planInterval = $request->plan_time;
        $planPrice = $request->plan_price;
        $email = $request->useremail;
        $price_id = $request->price_id;
        $subscriptionid = $request->subscriptionid;
        
        $planPriceCents = round($planPrice*100);
        if($planName === 'Premium')
        {
        Stripe\Stripe::setApiKey('sk_test_tjZFqTGS0AswQMnLRApSL7CN');
         $customer = \Stripe\Customer::create(array( 
	        'card'  => $request->stripeToken,
	        'name' =>  $username,
	        'email' => $request->email,
	        'description'=>'This payment is tested purpose.'
	    ));
	    //dd($customer);
	    

        $subscription = \Stripe\Subscription::create([ 
                    'customer' => $customer->id, 
                    'items' => [[ 
                        'price' => $price_id, 
                    ]]
            ]);
            
        $enddate = $subscription->current_period_end;
        //$time24 = strtotime($enddate) - 60*60;
        $endexecution = gmdate("Y-m-d H:i:s", $enddate);    
         //dd($endexecution);   
        $Usersubscription = UserSubscription::create([
            'user_id' => Auth::user()->id,
            'subscription_id' => $subscription->id,
            'customer_id' => $customer->id,
            'plan_price' => $request->plan_price,
            'plan_name' => $request->plan_name,
            'price_id' => $request->price_id,
            'package_id' => $request->subscriptionid,
            'status' => $subscription->status,
            'period_end' => $endexecution,
            ]);
            
        }
        else if($planName === 'Basic')
        {
             Stripe\Stripe::setApiKey('sk_test_tjZFqTGS0AswQMnLRApSL7CN');
             
             $customer = \Stripe\Customer::create(array( 
    	        'card'  => $request->stripeToken,
    	        'name' => $username,
    	        'email' => $request->email,
    	        'description'=>'This payment is tested purpose.'
    	    ));
	        //dd($customer);
	    
            // $charge = \Stripe\Charge::create([
            //       'customer' => $customer->id, 
            //       'amount' => $planPriceCents,
            //       'currency' => 'USD',
            //       'description' => 'This is Basic Package',
            //     ]);     
	    
	    
	    //dd($customer);
        $subscription = \Stripe\Subscription::create([ 
                    'customer' => $customer->id, 
                    'items' => [[ 
                        'price' => $price_id, 
                    ]]
                    
            ]);
     
        $enddate = $subscription->current_period_end;
        //$time24 = strtotime($enddate) - 60*60;
        $endexecution = gmdate("Y-m-d H:i:s", $enddate);
        //dd($endexecution);
            
        $Usersubscription = UserSubscription::create([
            'user_id' => Auth::user()->id,
            'subscription_id' => $subscription->id,
            'customer_id' => $customer->id,
            'plan_price' => $request->plan_price,
            'plan_name' => $request->plan_name,
            'price_id' => $request->price_id,
            'package_id' => $request->subscriptionid,
            'status' => $subscription->status,
            'period_end' => $endexecution,
            ]);    
            
        
        }
        session()->flash('success', 'Thank You. Your Payment Successfully done!');
        return redirect('/');
   
        // Session::flash('success', 'Payment successful!');
        // return back();
    }
    
}


?>