<?php

namespace App\Http\Controllers\Dashboard;

use App\Actor;
use App\Category;
use App\Film;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class FilmController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:create_films,guard:admin'])->only(['create', 'store']);
        $this->middleware(['permission:read_films,guard:admin'])->only('index');
        $this->middleware(['permission:update_films,guard:admin'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_films,guard:admin'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $films = Film::where(function ($query) use ($request) {
            $query->when($request->search, function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('year', 'like', '%' . $request->search . '%');
            });
            $query->when($request->category, function ($q) use ($request) {
                return $q->whereHas('categories', function ($q2) use ($request){
                    return $q2->whereIn('category_id', (array)$request->category)
                        ->orWhereIn('name', (array)$request->category);
                });
            });
            $query->when($request->actor, function ($q) use ($request) {
                return $q->whereHas('actors', function ($q2) use ($request){
                    return $q2->whereIn('actor_id', (array)$request->actor)
                        ->orWhereIn('name', (array)$request->actor);
                });
            });
            $query->when($request->favorite, function ($q) use ($request) {
                return $q->whereHas('favorites', function ($q2) use ($request){
                    return $q2->whereIn('user_id', (array)$request->favorite);
                });
            });
        })->with('categories')->with('ratings')->latest()->paginate(10);
        $categories = Category::all();
        $actors = Actor::all();

        return view('dashboard.films.index', compact('films', 'categories', 'actors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $actors = Actor::all();
        return view('dashboard.films.create', compact('categories', 'actors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $attributes = $request->validate([
            'name' => 'required|string|max:50|min:1|unique:films',
            'year' => 'required|string|max:4|min:4',
            'overview' => 'required|string',
            //'background_covers' => 'required|image|max:1024',
            'video' => 'mimes:ogg,mp4,webm|max:100040|required',
            'shortvideo' => 'mimes:ogg,mp4,webm|max:100040|required',
            /*'poster' => 'required|image',
            'url' => 'required|string',
            'api_url' => 'required|string',*/
            'categories' => 'required|exists:categories,id',
            'actors' => 'required|exists:actors,id'
        ]);
		
		/*if($request->file('background_covers')){
            $file= $request->file('background_covers');
			
            $filename= time() . '.'.$file->getClientOriginalName();
			//$filenames = $request->file('avatar')->store('actor_avatars');
			//Image::make($image)->resize(300, 300)->save( storage_path('/actor_avatars/' . $filename ) );
            $file->move(public_path('video_background_covers'), $filename);
            $attributes['background_covers'] = $filename;
        }*/

		
// 		if($request->file('video')){
//             $file= $request->file('video');
			
//             $filename= time() . '.'.$file->getClientOriginalName();
// 			//$filenames = $request->file('avatar')->store('actor_avatars');
// 			//Image::make($image)->resize(300, 300)->save( storage_path('/actor_avatars/' . $filename ) );
//             $file->move(public_path('video_uploads'), $filename);
//             $attributes['video'] = $filename;
//         }
        
        
        if ($request->hasFile('video')) {
        $file = $request->file('video');
        $name = time() . $file->getClientOriginalName();
        //$filePath = $name;
        //$path =  Storage::disk('s3')->put($filePath, file_get_contents($file));
        $path =  Storage::disk('s3')->put('video', $request->video,'public');
        //$path = Storage::disk('s3')->put('images', $request->image);
        $attributes['video'] = Storage::disk('s3')->url($path);
        
        //dd($attributes['video']);
        
            // $file = $request->file('video');
            // $s3 = \Storage::disk('s3');
            // $file_name = uniqid() .'.'. $file->getClientOriginalExtension();
            // $s3filePath = '/video/' . $file_name;
            // $attributes['video'] = Storage::disk('s3')->put($s3filePath, $file, 'public');
        
        }
        
        
        if ($request->hasFile('shortvideo')) {
        $file = $request->file('shortvideo');
        $name = time() . $file->getClientOriginalName();
        $path =  Storage::disk('s3')->put('shortvideo', $request->shortvideo,'public');
        //$path = Storage::disk('s3')->put('images', $request->image);
        $attributes['shortvideo'] = Storage::disk('s3')->url($path);
        }
        

        //$attributes['background_cover'] = $request->background_cover->store('film_background_covers');
        //$attributes['poster'] = $request->poster->store('film_posters');

        $film = Film::create([
            'name' => $attributes['name'],
            'year' => $attributes['year'],
            'categories' => $attributes['categories'],
            'actors' => $attributes['actors'],
            'overview' => $attributes['overview'],
            //'background_covers' => $attributes['background_covers'],
			'video' => $attributes['video'],
			'shortvideo' => $attributes['shortvideo']
            /*'poster' => $attributes['poster'],
            'url' => $attributes['url'],
            'api_url' => $attributes['api_url'],*/
        ]);
        $film->categories()->sync($attributes['categories']);
        $film->actors()->sync($attributes['actors']);

        session()->flash('success', 'Video Added Successfully');
        return redirect()->route('dashboard.films.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        //
        $categories = Category::all();
        $actors = Actor::all();
        return view('dashboard.films.edit', compact('film', 'categories', 'actors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        //
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:50', 'min:1', Rule::unique('films')->ignore($film)],
            'year' => 'required|string|max:4|min:4',
            'overview' => 'required|string',
            //'background_covers' => 'nullable|image',
            'video' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040',
            'shortvideo' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040|required',
            /*'poster' => 'nullable|image',
            'url' => 'required|string',
            'api_url' => 'required|string',*/
            'categories' => 'required|exists:categories,id',
            'actors' => 'required|exists:actors,id'
        ]);
		
		/*if($request->file('background_covers')){
        if ($request->background_covers) {
            Storage::delete($film->getAttributes()['background_covers']);
			
				$file= $request->file('background_covers');
				
				$filename= time() . '.'.$file->getClientOriginalName();
				$file->move(public_path('video_background_covers'), $filename);
				$attributes['background_covers']= $filename;
			}
        }*/
		
		
		
// 		if($request->file('video')){
//         if ($request->video) {
//             Storage::delete($film->getAttributes()['video']);
			
// 				$file= $request->file('video');
				
// 				$filename= time() . '.'.$file->getClientOriginalName();
// 				$file->move(public_path('video_uploads'), $filename);
// 				$attributes['video']= $filename;
// 			}
//         }
		
		
		
		if ($request->hasFile('video')) {
            if ($request->video) {
            $file = $request->file('video');
            $name = time() . $file->getClientOriginalName();
            //$filePath = $name;
            //$path =  Storage::disk('s3')->put($filePath, file_get_contents($file));
            $path =  Storage::disk('s3')->put('video', $request->video,'public');
            //$path = Storage::disk('s3')->put('images', $request->image);
            $attributes['video'] = Storage::disk('s3')->url($path);
        }
		}
		
		
		if ($request->hasFile('shortvideo')) {
            if ($request->shortvideo) {
            $file = $request->file('shortvideo');
            $name = time() . $file->getClientOriginalName();
            //$filePath = $name;
            //$path =  Storage::disk('s3')->put($filePath, file_get_contents($file));
            $path =  Storage::disk('s3')->put('shortvideo', $request->shortvideo,'public');
            //$path = Storage::disk('s3')->put('images', $request->image);
            $attributes['shortvideo'] = Storage::disk('s3')->url($path);
        }
		}
		
        /*if ($request->background_cover) {
            Storage::delete($film->getAttributes()['background_cover']);
            $attributes['background_cover'] = $request->background_cover->store('film_background_covers');
        }
        if ($request->poster) {
            Storage::delete($film->getAttributes()['poster']);
            $attributes['poster'] = $request->poster->store('film_posters');
        }*/

        $film->update($attributes);
        $film->categories()->sync($attributes['categories']);
        $film->actors()->sync($attributes['actors']);

        session()->flash('success', 'Film Updated Successfully');
        return redirect()->route('dashboard.films.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Film $film
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Film $film)
    {
        //

        $film->delete();

        session()->flash('success', 'Film Deleted Successfully');
        return redirect()->route('dashboard.films.index');
    }
    
    
    
    public function changeStatus(Request $request)
    {
        //dd($request);
        $user = Film::find($request->id)->update(['status' => $request->status]);

        return response()->json(['success'=>'Status changed successfully.']);
    }
    
    
    public function fileup(Request $request){
        dd('here');
        $filename = $_FILES['video']['name'];

        /* Choose where to save the uploaded file */
        $location = "upload/".$filename;
        
        /* Save the uploaded file to the local filesystem */
        if ( move_uploaded_file($_FILES['video']['tmp_name'], $location) ) { 
          echo 'Success'; 
        } else { 
          echo 'Failure'; 
        }
    }
    
}
