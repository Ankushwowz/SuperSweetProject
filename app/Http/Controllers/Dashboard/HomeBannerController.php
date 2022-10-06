<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Banner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
class HomeBannerController extends Controller
{
    public function index(Request $request){
		$banners = Banner::all();
		
		return view('dashboard.sliders.index',compact('banners'));
	}
	
	public function create()
    {
        //
        //$categories = Category::all();
        //$actors = Actor::all();
        return view('dashboard.sliders.create');
    }
	
	
	public function store(Request $request)
    {
        //
        $attributes = $request->validate([
            'title' => 'required|string|unique:banners',
            'title2' => 'required|string',
            'footeryear' => 'required',
            'slider' => 'required|image'           
        ]);
		
		if($request->file('slider')){
            $file= $request->file('slider');
			
            $filename= time() . '.'.$file->getClientOriginalName();
			//$filenames = $request->file('avatar')->store('actor_avatars');
			//Image::make($image)->resize(300, 300)->save( storage_path('/actor_avatars/' . $filename ) );
            $file->move(public_path('home_slider'), $filename);
            $attributes['slider'] = $filename;
        }
		

        $slider = Banner::create([
            'title' => $attributes['title'],
            'title2' => $attributes['title2'],
            'footeryear' => $attributes['footeryear'],
            'slider' => $attributes['slider'],
         
        ]);
       session()->flash('success', 'Slider Banner Added Successfully');
        return redirect()->route('dashboard.sliders.index');
    }
	
	
	
	
	/**
     * Show the form for editing the specified resource.
     *
     * @param  \App\banner  $banner
     * @return \Illuminate\Http\Response
     */
	 
	 public function edit( $id)
    {
        $data['banner'] = Banner::find($id);
        return view('dashboard.sliders.edit', $data);
    }
	 
    /*public function edit(Banner $banner)
    {
        //dd($banner);
		$banner = Banner::find($id)
         return view('dashboard.sliders.edit', compact('banner'));
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request,Banner $banner)
    {

        //
        $attributes = $request->validate([
            'title' => ['required', 'string'],          
            'slider' => 'nullable|image',
        ]);
		
		if($request->file('slider')){
        if ($request->slider) {
            Storage::delete($banner->getAttributes()['slider']);
			
				$file= $request->file('slider');
				
				$filename= time() . '.'.$file->getClientOriginalName();
				$file->move(public_path('home_slider'), $filename);
				$attributes['slider']= $filename;
			}
        }
		
		
        $banner->update($attributes);
        session()->flash('success', 'Slider Updated Successfully');
        return redirect()->route('dashboard.sliders.index');

    }*/
	
	
	public function update( Request $request, $id)
    {
		$attributes = $request->validate([
            'title' => ['required', 'string'], 
            'title2' => 'required|string',
            'footeryear' => 'required',
            //'slider' => 'nullable|image',
        ]);
		
		/*if($request->file('slider')){
        if ($request->slider) {     
				$file= $request->file('slider');				
				$filename= time() . '.'.$file->getClientOriginalName();
				$file->move(public_path('home_slider'), $filename);
				//$attributes['slider']= $filename;
				$attributes['slider']= $filename;
			}
        }*/
		//dd($attributes['slider']);
		Banner::where('id', $id)->update([
            'title' => $request->input('title'),
            'title2' => $request->input('title2'),
            'footeryear' => $request->input('footeryear'),
            //'slider' => $filename,
        ]);
		session()->flash('success', 'Slider Updated Successfully');
        return redirect()->route('dashboard.sliders.index');
		
	}	
	
	
		public function destroy($id){
			//dd($id);
		  $banner = Banner::find($id);
		  $banner->delete();
		  session()->flash('success', 'Banner Deleted Successfully');
		  return redirect()->route('dashboard.sliders.index');
		  //return response()->json(['message' => 'Amenity has been deleted successfully!' ]);

	}
	
	
	/*public function destroy(Banner $banner){
        //
		//dd($banner);
        $banner->delete();

        session()->flash('success', 'Banner Deleted Successfully');
        return redirect()->route('dashboard.sliders.index');
    }*/
	
}
