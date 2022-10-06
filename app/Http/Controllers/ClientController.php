<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use DB;
use Auth;
use Session;
use Stripe;
use App\UserSubscription;
use Carbon\Carbon;
class ClientController extends Controller
{
    //
    public function profile(){
        $footerbanner = DB::table('banners')->first();
        $socialfooter = DB::table('socials')->get();
        $homemenus = DB::table('menus')->first();
        $homelogos = DB::table('logos')->first();
        $allcategory = DB::table('categories')
            ->join('films', 'films.categories', '=', 'categories.id','LEFT')
            ->select('categories.*')
            ->groupBy('categories.name')
            ->whereNotNull('films.categories')->get();
        $user = auth()->user();
        session_start();
        $sess = session_id();
        $ip =$_SERVER['REMOTE_ADDR'];
        $popup = DB::table('popup')->where('visitor_session',$sess)->count();
        return view('clients.profile', compact('user','allcategory','popup','footerbanner','socialfooter','homemenus','homelogos'));
    }
    public function updateProfile(Request $request, User $user){
        //
        $attributes = $request->validate([
            'username' => 'required|string|max:20|min:3',
            'email' => ['required', 'string', 'email', Rule::unique('users')->ignore($user)],
            'first_name' => 'required|string|max:15|min:3',
            'last_name' => 'required|string|max:15|min:3',
            'avatar' => 'image',
        ]);
        
        
        if($request->file('avatar')){
            $file= $request->file('avatar');
			
            $filename= time() . '.'.$file->getClientOriginalName();
			//$filenames = $request->file('avatar')->store('actor_avatars');
			//Image::make($image)->resize(300, 300)->save( storage_path('/actor_avatars/' . $filename ) );
            $file->move(public_path('client_avatars'), $filename);
            $attributes['avatar']= $filename;
        }
        

        // if ($request->avatar) {
        //     $clientAvatar = $user->getAttributes()['avatar'];
        //     if (isset($clientAvatar) && $clientAvatar) {
        //         Storage::delete($clientAvatar);
        //     }

        //     $attributes['avatar'] = $request->avatar->store('client_avatars');
        // }

        $user->update($attributes);

        session()->flash('success', 'Profile Updated Successfully');
        return redirect()->back();
    }

    public function changePasswordForm(){
        $footerbanner = DB::table('banners')->first();
        $socialfooter = DB::table('socials')->get();
        $homemenus = DB::table('menus')->first();
        $homelogos = DB::table('logos')->first();
        $allcategory = DB::table('categories')
            ->join('films', 'films.categories', '=', 'categories.id','LEFT')
            ->select('categories.*')
            ->groupBy('categories.name')
            ->whereNotNull('films.categories')->get();
        $user = auth()->user();
        session_start();
        $sess = session_id();
        $ip =$_SERVER['REMOTE_ADDR'];
        $popup = DB::table('popup')->where('visitor_session',$sess)->count();
        return view('clients.change_password', compact('user','allcategory','popup','footerbanner','socialfooter','homemenus','homelogos'));
    }
    public function changePassword(Request $request, User $user){
        $attributes = $request->validate([
            'password' => 'required|confirmed|string|min:6',
        ]);
        $attributes['password'] = bcrypt($attributes['password']);

        $user->update($attributes);

        session()->flash('success', 'Password Updated Successfully');
        return redirect()->back();
    }

    public function favorites()
    {
        $footerbanner = DB::table('banners')->first();
        $socialfooter = DB::table('socials')->get();
        $homemenus = DB::table('menus')->first();
        $homelogos = DB::table('logos')->first();
        $user = auth()->user();
        $favorites = $user->favorites()->latest()->paginate(10);
        session_start();
        $sess = session_id();
        $ip =$_SERVER['REMOTE_ADDR'];
        $popup = DB::table('popup')->where('visitor_session',$sess)->count();
        return view('clients.favorites', compact('user', 'favorites','popup','footerbanner','socialfooter','homemenus','homelogos'));
    }

    public function ratings()
    {
        $footerbanner = DB::table('banners')->first();
        $socialfooter = DB::table('socials')->get();
        $homemenus = DB::table('menus')->first();
        $homelogos = DB::table('logos')->first();
        $user = auth()->user();
        $ratings = $user->ratings()->latest()->paginate(10);
        session_start();
        $sess = session_id();
        $ip =$_SERVER['REMOTE_ADDR'];
        $popup = DB::table('popup')->where('visitor_session',$sess)->count();
        return view('clients.ratings', compact('user', 'ratings','popup','footerbanner','socialfooter','homemenus','homelogos'));
    }

    public function reviews()
    {
        $footerbanner = DB::table('banners')->first();
        $socialfooter = DB::table('socials')->get();
        $homemenus = DB::table('menus')->first();
        $homelogos = DB::table('logos')->first();
        $user = auth()->user();
        $reviews = $user->reviews()->latest()->paginate(10);
        session_start();
        $sess = session_id();
        $ip =$_SERVER['REMOTE_ADDR'];
        $popup = DB::table('popup')->where('visitor_session',$sess)->count();
        return view('clients.reviews', compact('user', 'reviews','popup','footerbanner','socialfooter','homemenus','homelogos'));
    }
    
    
    
    public function subscriptiondetail(){
        $usersubdetail =DB::table('user_subscriptions')
            ->where('user_id',Auth::user()->id)
            ->get()->first();
        $allcategory = DB::table('categories')
            ->join('films', 'films.categories', '=', 'categories.id','LEFT')
            ->select('categories.*')
            ->groupBy('categories.name')
            ->whereNotNull('films.categories')->get();    
        //dd($usersubdetail);
        if($usersubdetail != null){
        $footerbanner = DB::table('banners')->first();
        $socialfooter = DB::table('socials')->get();
        $homemenus = DB::table('menus')->first();
        $homelogos = DB::table('logos')->first();
        session_start();
        $user = auth()->user();
        $sess = session_id();
        $ip =$_SERVER['REMOTE_ADDR'];
        $popup = DB::table('popup')->where('visitor_session',$sess)->count();
        return view('clients.subscription_detail',compact('usersubdetail','allcategory','popup','user','footerbanner','socialfooter','homemenus','homelogos'));
        }else{
          return redirect()->route('stripe');
        }
    }
    
    public function cancelsubscription(Request $request, $id){
        $id = base64_decode($id);
        
        Stripe\Stripe::setApiKey('sk_test_tjZFqTGS0AswQMnLRApSL7CN');
        $retrieve = \Stripe\Subscription::retrieve($id);
        //dd($retrieve);
        $cancel = \Stripe\Subscription::update($retrieve->id,[
            'cancel_at_period_end' => true,
          ]
        );
        $enddate = $cancel->current_period_end;
        
        $endexecution = gmdate("Y-m-d H:i:s", $enddate);
       
        //$UpdateSubscription = UserSubscription::where("subscription_id", $cancel->id)->update(["status" => $cancel->status,"period_end"=>$endexecution,"cancel_at_period_end"=>$cancel->cancel_at_period_end]);
        $UpdateSubscription = UserSubscription::where("subscription_id", $cancel->id)->update(["status" => "canceled","period_end"=>$endexecution,"cancel_at_period_end"=>$cancel->cancel_at_period_end]);
        
        session()->flash('success', 'Subscription Cancelled Successfully');
        return redirect()->back();
    }
    
    
    // public function cancelsubscription(Request $request, $id){
    //     $id = base64_decode($id);
        
    //     Stripe\Stripe::setApiKey('sk_test_tjZFqTGS0AswQMnLRApSL7CN');
    //     $retrieve = \Stripe\Subscription::retrieve($id);
    //     $cancel = $retrieve->cancel();
        
    //     $enddate = $cancel->current_period_end;
    //     $endexecution = gmdate("Y-m-d H:i:s", $enddate);
    //     $UpdateSubscription = UserSubscription::where("subscription_id", $cancel->id)->update(["status" => $cancel->status,"period_end"=>$endexecution]);
        
    //     session()->flash('success', 'Subscription Cancelled Successfully');
    //     return redirect()->back();
    // }
    
    
    
    
    public function activesubscription(Request $request, $id){
         $id = base64_decode($id);
         
         $customers =DB::table('user_subscriptions')
            ->join('users', 'user_subscriptions.user_id', '=', 'users.id')
            ->select('user_subscriptions.*','user_subscriptions.status as subscription_status')
            ->where('users.id',Auth::user()->id)
            ->get()->first();
            
          //dd($customers);  
         
         Stripe\Stripe::setApiKey('sk_test_tjZFqTGS0AswQMnLRApSL7CN');
         $subscription = \Stripe\Subscription::retrieve($id);
        
         
         
         $ReSubscription = \Stripe\Subscription::update($subscription->id,[
          'cancel_at_period_end' => false,
          'proration_behavior' => 'create_prorations',
          'items' => [
            [
              'id' => $subscription->items->data[0]->id,
              'price' => $subscription->items->data[0]->plan->id,
            ],
          ],
        ]);

         
         $enddate = $ReSubscription->current_period_end;
        //$time24 = strtotime($enddate) - 60*60;
        $endexecution = gmdate("Y-m-d H:i:s", $enddate);
        $UpdateSubscription = UserSubscription::where("subscription_id", $customers->subscription_id)->update(["subscription_id" => $ReSubscription->id,"status" => $ReSubscription->status,"period_end"=>$endexecution,"cancel_at_period_end"=>$ReSubscription->cancel_at_period_end]);
        session()->flash('success', 'Thank You. Your Subscription Active Successfully done!');
        return redirect('/'); 
     }
    
    
    
    
    //  public function activesubscription(Request $request, $id){
    //      $id = base64_decode($id);
         
    //      $customers =DB::table('user_subscriptions')
    //         ->join('users', 'user_subscriptions.user_id', '=', 'users.id')
    //         ->select('user_subscriptions.*','user_subscriptions.status as subscription_status')
    //         ->where('users.id',Auth::user()->id)
    //         ->get()->first();
            
    //       //dd($customers);  
         
    //      Stripe\Stripe::setApiKey('sk_test_tjZFqTGS0AswQMnLRApSL7CN');
    //      $subscription = \Stripe\Subscription::retrieve($id);
         
    //      $ReSubscription = \Stripe\Subscription::create([ 
    //                 'customer' => $customers->customer_id, 
    //                 'items' => [[ 
    //                     'price' => $customers->price_id, 
    //                 ]]
                    
    //         ]);
         
    //      $enddate = $ReSubscription->current_period_end;
    //     //$time24 = strtotime($enddate) - 60*60;
    //     $endexecution = gmdate("Y-m-d H:i:s", $enddate);
    //     $UpdateSubscription = UserSubscription::where("subscription_id", $customers->subscription_id)->update(["subscription_id" => $ReSubscription->id,"status" => $ReSubscription->status,"period_end"=>$endexecution]);
    //     session()->flash('success', 'Thank You. Your Subscription Active Successfully done!');
    //     return redirect('/'); 
    //  }
    
    
    
    
    public function pausesubscription(Request $request, $id){
        
        $id = base64_decode($id);
        
        Stripe\Stripe::setApiKey('sk_test_tjZFqTGS0AswQMnLRApSL7CN');
        $subscription = \Stripe\Subscription::retrieve($id);
        //dd($retrieve);
        // $cancel = \Stripe\Subscription::update($retrieve->id,[
        //   ]
        // );
        
        $subscriptionPause = \Stripe\Subscription::update($subscription->id,
          ['pause_collection' => ['behavior' => 'void'],
          "metadata" => ["status" => "paused"]]
          
        );
        
        $st = $subscriptionPause->metadata['status'];
        //$pause = $retrieve->pause();
        //dd($subscriptionPause->metadata['status']);
        $UpdateSubscription = UserSubscription::where("subscription_id", $subscriptionPause->id)->update(["status" => $st]);
        
        session()->flash('success', 'Subscription Paused Successfully');
        return redirect()->back();
        
        
        // $id = base64_decode($id);
        // Stripe\Stripe::setApiKey('sk_test_tjZFqTGS0AswQMnLRApSL7CN');
        // $subscription = \Stripe\Subscription::retrieve($id);
        // $subscriptionresult = \Stripe\Subscription::update($subscription->id, 
        //       ['status' => 'active']
        //       ); 
        // dd($subscriptionresult);
    
        // dd($subscription);
    }
    
    
    // public function activesubscription(Request $request, $id){
    //     $id = base64_decode($id);
        
    //     Stripe\Stripe::setApiKey('sk_test_tjZFqTGS0AswQMnLRApSL7CN');
    //     $subscription = \Stripe\Subscription::retrieve($id);
        
    //     $subscriptionUnPause = \Stripe\Subscription::update($subscription->id,
    //       ['pause_collection' => '',
    //       "metadata" => ["status" => "active"]]
          
    //     );
       
    //     $st = $subscriptionUnPause->metadata['status'];
    //     $UpdateSubscription = UserSubscription::where("subscription_id", $subscriptionUnPause->id)->update(["status" => $st]);
        
    //     session()->flash('success', 'Subscription Active Successfully');
    //     return redirect()->back();
    // }
    
    
    
    
    public function cronjob(){
    
    $userplans =DB::table('user_subscriptions')
            ->select('user_subscriptions.*')
            ->where('user_subscriptions.package_id','1')
            ->where('user_subscriptions.status','active')
            ->orderBy('user_subscriptions.id', 'DESC')
            ->get();
        foreach($userplans as $userplan){  
          $subscription_id =  $userplan->subscription_id;
          //$subscription_id =  'sub_1LPqusCKQvPFa2xjFXnKZYLQ';
         
             Stripe\Stripe::setApiKey('sk_test_tjZFqTGS0AswQMnLRApSL7CN');
             $subscription = \Stripe\Subscription::retrieve($subscription_id);
             
             $enddate = $subscription->current_period_end;
             //dd($enddate);
             //$time24 = strtotime($enddate) - 60*60;
             $endexecution = gmdate("Y-m-d H:i:s", $enddate);
             //$hours = floor($subscription->current_period_end / 60);
             $timestamp = $subscription->current_period_start;
             //dd($timestamp);
             $time24 = strtotime('+1 day', $timestamp) - 60*60;
             $beforeexecution = gmdate("Y-m-d H:i:s", $time24);
             $currentdate = gmdate("Y-m-d H:i:s");
             if(($beforeexecution >= $currentdate)  && ($subscription->status = 'active') ){
             $updatesubscription = \Stripe\Subscription::update($subscription->id , [
              'cancel_at_period_end' => true,
              'billing_cycle_anchor' => 'now',
              'proration_behavior' => 'none',
              'items' => [
                [
                  'id' => $subscription->items->data[0]->id,
                  'price' => 'price_1LIhYFCKQvPFa2xjR0Ksy1GL', 
                ],
              ],
            ]);
            
            $endperiod = $updatesubscription->current_period_end;
            $endexecutionperiod = gmdate("Y-m-d H:i:s", $endperiod);
            //dd($endexecutionperiod);
            
        $UpdateSubscription = UserSubscription::where("subscription_id", $subscription->id)->update(["status" => $updatesubscription->status,"package_id" => 2,'plan_name' => 'Premium','plan_price' => 30,'period_end'=>$endexecutionperiod]);
        
             }
            
            
        }
        die();
    //dd($userplan);
        

        
        
    }
    
    

}
