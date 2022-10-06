<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
class HomeMenuController extends Controller
{
    public function index(Request $request){
        
		$homemenus = Menu::all();
		//dd($menus->menu);
		return view('dashboard.menus.index',compact('homemenus'));
	}
	
	public function create()
    {

        return view('dashboard.menus.create');
    }
	
	
	public function store(Request $request)
    {
        //
        $attributes = $request->validate([
            'menu' => 'required',
            'url' => 'required',
            'menu1' => 'required',
            'url1' => 'required',
            'menu2' => 'required',
            'url2' => 'required',
            
        ]);
		

        $menu = Menu::create([
            'menu' => $attributes['menu'],
            'url' => $attributes['url'],
            'menu1' => $attributes['menu1'],
            'url1' => $attributes['url1'],
            'menu2' => $attributes['menu2'],
            'url2' => $attributes['url2'],
         
        ]);
       session()->flash('success', 'Menu Added Successfully');
        return redirect()->route('dashboard.menus.index');
    }
	
	
	
	
	/**
     * Show the form for editing the specified resource.
     *
     * @param  \App\banner  $banner
     * @return \Illuminate\Http\Response
     */
	 
	 public function edit( $id)
    {
        $data['menu'] = Menu::find($id);
        return view('dashboard.menus.edit', $data);
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
   
	public function update( Request $request, $id)
    {
		$attributes = $request->validate([
            'menu' => ['required', 'string'], 
            'url' => 'required|string',
            'menu1' => ['required', 'string'], 
            'url1' => 'required|string',
            'menu2' => ['required', 'string'], 
            'url2' => 'required|string',
        ]);
		

		Menu::where('id', $id)->update([
            'menu' => $request->input('menu'),
            'url' => $request->input('url'),
            'menu1' => $request->input('menu1'),
            'url1' => $request->input('url1'),
            'menu2' => $request->input('menu2'),
            'url2' => $request->input('url2'),
        ]);
		session()->flash('success', 'Menu Updated Successfully');
        return redirect()->route('dashboard.menus.index');
		
	}	
	
	
		public function destroy($id){
			//dd($id);
		  $banner = Menu::find($id);
		  $banner->delete();
		  session()->flash('success', 'Menu Deleted Successfully');
		  return redirect()->route('dashboard.menus.index');

	}
	

	
}
