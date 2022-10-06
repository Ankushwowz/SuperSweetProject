<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\PaymentSetting;
use App\About;
use App\Libraries\ThemeHelper;

class AboutController extends Controller
{
    public function index(Request $request){
        //dd("Here");
	//$data['session'] = $request->session()->all();
		//$payment = DB::table('payment_settings')->where('id',1)->orderBy('id', 'DESC')->first();
		//dd($payment);	
		return view('dashboard.aboutus.index');
	}
	
	
	// Payment Settings Add or Update
	
	public function addabout(Request $request){
	    //dd($request->all());
	    
	    
	    $attributes = $request->validate([
            'name' => 'required|string',
            'about_description' => 'required|string',
            'about_image' => 'required|image'
        ]);

        //$attributes['avatar'] = $request->avatar1->store('actor_avatars');
		if($request->file('about_image')){
            $file= $request->file('about_image');
			
            $filename= time() . '.'.$file->getClientOriginalName();
			//$filenames = $request->file('avatar')->store('actor_avatars');
			//Image::make($image)->resize(300, 300)->save( storage_path('/actor_avatars/' . $filename ) );
            $file->move(public_path('aboutus'), $filename);
            $attributes['about_image']= $filename;
            dd($attributes['about_image']);
        }
	    
	    $aboutArray  =  array(
	        'name'               =>      $request->name,
	        'about_description'  =>      $request->about_description,
	        'about_image'        =>      $attributes['about_image'],
	        );
	        
	   //dd($aboutArray);     
	  $aboutData = DB::table('aboutus')->where('id',$request->uid)->orderBy('id', 'DESC')->first();
 		//dd($paymentData);
         if($aboutData === null){
         $about  =  About::Create($aboutArray);
 		session()->flash('success', 'About Added Successfully');
         return redirect()->route('dashboard.aboutus');
        
         }else{
             About::where(['id'=>$aboutData->id])->update($aboutArray);
 		session()->flash('success', 'About updated Successfully');
         return redirect()->route('dashboard.aboutus');
       }      
	    
	    
	    
// 		  $request->validate([
//                 'test_secret_key'  		   =>      'required',
//                 'test_publishable_key'     =>      'required',
//                 'live_secret_key'          =>      'required',
//                 'live_publishable_key'     =>      'required',
//             ]);
// 			$paymentArray            =       array(
//             'test_secret_key'        =>      $request->test_secret_key,
//             'test_publishable_key'   =>      $request->test_publishable_key,
//             'live_secret_key'        =>      $request->live_secret_key,
//             'live_publishable_key'   =>      $request->live_publishable_key,
//             'test_url'               =>      $request->test_url,
//             'live_url'               =>      $request->live_url,
//         );
// 		//dd($paymentArray);		
// 		$paymentData = DB::table('payment_settings')->where('id',$request->uid)->orderBy('id', 'DESC')->first();
// 		//dd($paymentData);
//         if($paymentData === null){
//         $payment  =  PaymentSetting::Create($paymentArray);
// 		session()->flash('success', 'Payment Setting Added Successfully');
//         return redirect()->route('dashboard.paymentsettings');
        
//         }else{
//         PaymentSetting::where(['id'=>$paymentData->id])->update($paymentArray);
// 		session()->flash('success', 'Payment Setting updated Successfully');
//         return redirect()->route('dashboard.paymentsettings');
//       }
	}	
}
