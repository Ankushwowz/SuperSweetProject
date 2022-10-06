<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\PaymentSetting;
use App\Libraries\ThemeHelper;

class AdminPaymentSettingsController extends Controller
{
    public function index(Request $request){
	//$data['session'] = $request->session()->all();
		$payment = DB::table('payment_settings')->where('id',1)->orderBy('id', 'DESC')->first();
		//dd($payment);	
		return view('dashboard.settings.index',compact('payment'));
	}
	
	
	// Payment Settings Add or Update
	
	public function addpayment(Request $request){
		  $request->validate([
                'test_secret_key'  		   =>      'required',
                'test_publishable_key'     =>      'required',
                'live_secret_key'          =>      'required',
                'live_publishable_key'     =>      'required',
            ]);
			$paymentArray            =       array(
            'test_secret_key'        =>      $request->test_secret_key,
            'test_publishable_key'   =>      $request->test_publishable_key,
            'live_secret_key'        =>      $request->live_secret_key,
            'live_publishable_key'   =>      $request->live_publishable_key,
            'test_url'               =>      $request->test_url,
            'live_url'               =>      $request->live_url,
        );
		//dd($paymentArray);		
		$paymentData = DB::table('payment_settings')->where('id',$request->uid)->orderBy('id', 'DESC')->first();
		//dd($paymentData);
        if($paymentData === null){
        $payment  =  PaymentSetting::Create($paymentArray);
		session()->flash('success', 'Payment Setting Added Successfully');
        return redirect()->route('dashboard.paymentsettings');
        
        }else{
        PaymentSetting::where(['id'=>$paymentData->id])->update($paymentArray);
		session()->flash('success', 'Payment Setting updated Successfully');
        return redirect()->route('dashboard.paymentsettings');
       }
	}	
}
