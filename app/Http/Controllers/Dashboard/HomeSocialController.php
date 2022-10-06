<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Social;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
class HomeSocialController extends Controller
{
    public function index(Request $request){
        
        $socials = Social::where(function ($query) use ($request) {
            $query->when($request->search, function ($q) use ($request) {
                return $q->where('icon', 'like', '%' . $request->search . '%');
            });
        })->latest()->paginate(10);
		//$socials = Social::all();
		
		return view('dashboard.socials.index',compact('socials'));
	}
	
	public function create()
    {
        //
        //$categories = Category::all();
        //$actors = Actor::all();
        return view('dashboard.socials.create');
    }
	
	
	public function store(Request $request)
    {
        //
        $attributes = $request->validate([
            'icon' => 'required',
            'url' => 'required',
        ]);
		

        $slider = Social::create([
            'icon' => $attributes['icon'],
            'url' => $attributes['url'],
         
        ]);
       session()->flash('success', 'Social Added Successfully');
        return redirect()->route('dashboard.socials.index');
    }
	
	
	
	
	/**
     * Show the form for editing the specified resource.
     *
     * @param  \App\banner  $banner
     * @return \Illuminate\Http\Response
     */
	 
	 public function edit( $id)
    {
        $data['social'] = Social::find($id);
        return view('dashboard.socials.edit', $data);
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
            'icon' => ['required', 'string'], 
            'url' => 'required|string',
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
		Social::where('id', $id)->update([
            'icon' => $request->input('icon'),
            'url' => $request->input('url'),
        ]);
		session()->flash('success', 'Social Updated Successfully');
        return redirect()->route('dashboard.socials.index');
		
	}	
	
	
		public function destroy($id){
			//dd($id);
		  $banner = Social::find($id);
		  $banner->delete();
		  session()->flash('success', 'Social Deleted Successfully');
		  return redirect()->route('dashboard.socials.index');
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
