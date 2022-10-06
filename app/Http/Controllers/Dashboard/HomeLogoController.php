<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Logo;
use App\Libraries\ThemeHelper;

class HomeLogoController extends Controller
{
    public function index(Request $request){
	    $logos = Logo::first();
		return view('dashboard.logos.index',compact('logos'));
	}
	
	
	// Logo Settings Add or Update
	
	public function addlogos(Request $request){

	    $attributes = $request->validate([
            'logo_image' => 'required|image'
        ]);

		if($request->file('logo_image')){
            $file= $request->file('logo_image');
			
            $filename= time() . '.'.$file->getClientOriginalName();
			//$filenames = $request->file('avatar')->store('actor_avatars');
			//Image::make($image)->resize(300, 300)->save( storage_path('/actor_avatars/' . $filename ) );
            $file->move(public_path('logos'), $filename);
            $attributes['logo_image']= $filename;
        }
	    
	    $logoArray  =  array(
	        'logo_image'        =>      $attributes['logo_image'],
	        );
	        
	  $logoData = DB::table('logos')->where('id',$request->uid)->orderBy('id', 'DESC')->first();
         if($logoData === null){
         $logo  =  Logo::Create($logoArray);
 		session()->flash('success', 'Logo Added Successfully');
         return redirect()->route('dashboard.logos');
        
         }else{
             Logo::where(['id'=>$logoData->id])->update($logoArray);
 		session()->flash('success', 'Logo updated Successfully');
         return redirect()->route('dashboard.logos');
       }      
	    
	}	
}
