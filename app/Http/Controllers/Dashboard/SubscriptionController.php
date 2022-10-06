<?php

namespace App\Http\Controllers\Dashboard;

use App\Subscription;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use Session;
use Stripe;

class SubscriptionController extends Controller
{
    public function index(Request $request){
		$subscriptions = Subscription::where(function ($query) use ($request) {
            $query->when($request->search, function ($q) use ($request) {
                return $q->where('plan_name', 'like', '%' . $request->search . '%');
            });
        })->latest()->paginate(10);

        return view('dashboard.subscriptions.index', compact('subscriptions'));
		
		//return view('dashboard.subscriptions.index');
	}
	
	
	
	public function create()
    {
        //
        return view('dashboard.subscriptions.create');
    }
	
	public function store(Request $request)
    {
        //
        $attributes = $request->validate([
            'plan_name' => 'required|string|max:30|min:3|unique:subscriptions',
            'plan_duration' => 'required',
            'plan_time' => 'required|string',
            'plan_price' => 'required|string',
            'plan_description' => 'required|string',
            'subscription_image' => 'required|image|max:1024'
        ]);

        //$attributes['avatar'] = $request->avatar1->store('actor_avatars');
		if($request->file('subscription_image')){
            $file= $request->file('subscription_image');
			
            $filename= time() . '.'.$file->getClientOriginalName();
			//$filenames = $request->file('avatar')->store('actor_avatars');
			//Image::make($image)->resize(300, 300)->save( storage_path('/actor_avatars/' . $filename ) );
            $file->move(public_path('subscriptions'), $filename);
            $attributes['subscription_image']= $filename;
        }
        //$attributes['background_cover'] = $request->background_cover1->store('actor_background_covers');
    
          
        Stripe\Stripe::setApiKey('sk_test_tjZFqTGS0AswQMnLRApSL7CN');
          $price = \Stripe\Price::create([ 
                'unit_amount' => round($request->plan_price*100),
                'currency' => 'USD', 
                'recurring' => ['interval' => $request->plan_time], 
                'product_data' => ['name' => $request->plan_name], 
            ]);
        $priceid = $price->id;    
        
        $subscription = Subscription::create([
            'plan_name' => $attributes['plan_name'],
            'plan_duration' => $attributes['plan_duration'],
            'plan_time' => $attributes['plan_time'],
            'plan_price' => $attributes['plan_price'],
            'plan_description' => $attributes['plan_description'],
            'subscription_image' => $attributes['subscription_image'],
            'subscription_status' => "1",
            'price_id'=> $priceid
        ]);
      
        

        session()->flash('success', 'Subscription Plan Added Successfully');
        return redirect()->route('dashboard.subscriptions.index');
    }
	
	public function edit(Subscription $subscription)
    {
        //
        return view('dashboard.subscriptions.edit', compact('subscription'));
    }
	
	
	
	public function update(Request $request, Subscription $subscription)
    {
        //
		
		$attributes = $request->validate([
			'plan_name' => ['required', 'string', 'max:30', 'min:3', Rule::unique('subscriptions')->ignore($subscription)],
            'plan_duration' => 'required',
            'plan_time' => 'required|string',
            'plan_price' => 'required|string',
            'plan_description' => 'required|string',
			'subscription_image' => 'nullable|image',
        ]);
				
		if($request->file('subscription_image')){
        if ($request->subscription_image) {
            Storage::delete($subscription->getAttributes()['subscription_image']);
			
				$file= $request->file('subscription_image');
				
				$filename= time() . '.'.$file->getClientOriginalName();
				$file->move(public_path('subscriptions'), $filename);
				$attributes['subscription_image']= $filename;
			}
            //$attributes['avatar1'] = $request->avatar->store('actor_avatars');
        }


        $subscription->update($attributes);

        session()->flash('success', 'Subscription Plan Updated Successfully');
        return redirect()->route('dashboard.subscriptions.index');
    }
	
	
	public function userChangeStatus(Request $request){ 
			//dd($request->all());
    	\Log::info($request->all()); 

        $subid = Subscription::find($request->id); 
		//dd($request->status);
        $subid->subscription_status = $request->status; 

        $subid->save(); 

        return response()->json(['success' => true,'message'=>'Status change successfully.']); 

    } 
    
    public function destroy(Subscription $subscription)
    {
        //
        $subscription->delete();

        session()->flash('success', 'Subscription Deleted Successfully');
        return redirect()->route('dashboard.subscriptions.index');
    }
	
	
	
}
