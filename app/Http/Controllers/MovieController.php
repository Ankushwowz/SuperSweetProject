<?php

namespace App\Http\Controllers;

use App\Film;
use App\Actor;
use App\Category;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use Mail;
class MovieController extends Controller
{
    //
    protected $loadmorelimit  = '40';
    protected $featuredvideoloadmorelimit  = '40';
    public function __construct()
    {
//        $this->middleware('auth');
    }
    
    public function index(Request $request){
        //
        $today = gmdate("Y-m-d H:i:s");
        
        // $films = Film::where(function ($query) use ($request) {
        //     $query->when($request->category, function ($q) use ($request) {
        //         return $q->whereHas('categories', function ($q2) use ($request){
        //             return $q2->whereIn('name', (array)$request->category);
        //         });
        //     });
        // })->where('status',1)->latest()->paginate(12);
        
        
        $films = Film::where(function ($query) use ($request) {
            $query->when($request->search, function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('year', 'like', '%' . $request->search . '%');
            });
            $query->when($request->category, function ($q) use ($request) {
                return $q->whereHas('categories', function ($q2) use ($request){
                    //return $q2->whereIn('category_id', (array)$request->category)
                    return $q2->whereIn('categories', array_keys(request()->search))
                        ->orWhereIn('name', (array)$request->search);
                });
            });
            $query->when($request->search, function ($q) use ($request) {
                return $q->whereHas('actors', function ($q2) use ($request){
                    return $q2->whereIn('actor_id', (array)$request->search)
                        ->orWhereIn('name', (array)$request->search);
                });
            });

        })->with('categories')->where('status',1)->latest()->paginate(10);
        //dd($films);
        $categories = Category::all();
        $actors = Actor::all();
        
        $footerbanner = DB::table('banners')->first();
        $socialfooter = DB::table('socials')->get();
        $homemenus = DB::table('menus')->first();
        $homelogos = DB::table('logos')->first();
        
        $userid = Auth::user();
        //dd($userid);
        if(!empty($userid)){
        $customers = DB::table('user_subscriptions')
            ->join('users', 'user_subscriptions.user_id', '=', 'users.id')
            ->select('user_subscriptions.*','user_subscriptions.status as subscription_status')
            ->where('users.id',Auth::user()->id)
            ->where('user_subscriptions.status','active')
            ->where('user_subscriptions.period_end','>',$today)
            ->count();
        }else{
            $customers = 0;
        } 

        $allcategory = DB::table('categories')
            ->join('films', 'films.categories', '=', 'categories.id','LEFT')
            ->select('categories.*')
            ->groupBy('categories.name')
            ->whereNotNull('films.categories')->get();
        session_start();
        $sess = session_id();
        $ip =$_SERVER['REMOTE_ADDR'];
        $popup = DB::table('popup')->where('visitor_session',$sess)->count();
        //dd($films);
        return view('movies.index', compact('films','customers','allcategory','categories','actors','popup','footerbanner','socialfooter','homemenus','homelogos'));
    }

    // public function show(Request $request, $id){
    //     //
    //     $id = base64_decode($id);
        
        
    //     $films =DB::table('films')
    //             ->join('categories', 'films.categories', '=', 'categories.id')
    //             ->join('actors', 'films.actors', '=', 'actors.id')
    //             ->select('films.*','categories.name as categoryname')
    //             ->where('films.id', $id)
    //             ->limit(10)->latest()->get()->first();
        
    //     //$reviews = $film->reviews()->latest()->paginate(10);
    //     return view('movies.show', compact('films'));
    // }
    
    
    public function show(Film $film){
        //
        //dd($film);
        $reviews = $film->reviews()->latest()->paginate(10);
        $footerbanner = DB::table('banners')->first();
        $socialfooter = DB::table('socials')->get();
        $homemenus = DB::table('menus')->first();
        $homelogos = DB::table('logos')->first();
        $actor =DB::table('actors')
                ->join('films', 'actors.id', '=', 'films.actors')
                ->select('actors.*','films.*','films.categories','actors.name as actorname')
                //->where('actors.id', $film->actors)
                ->where('films.id', $film->id)
                ->get()->first();
        $offset = 0;
        $limit = $this->loadmorelimit;
        $shownextvideo = DB::table('films')
                    ->join('categories', 'films.categories', '=', 'categories.id')
                    ->select('films.*','categories.name as categoryname')
                    ->where('films.status',1)
                    ->where('films.id', '>', $film->id)->paginate(4);
                    //->where('films.id', '>', $film->id)->offset($offset)->limit($limit)->min('films.id');
                //dd($shownextvideo);
        $suggestionvideo = DB::table('films')
                            ->join('categories', 'films.categories', 'categories.id')
                            ->join('actors','films.actors', '=', 'actors.id')
                            ->select('actors.*','films.*','films.categories','categories.name as categoryname')
                            ->where('films.categories', $actor->categories)
                            ->inRandomOrder()->skip(0)->take(6)->get();
        $allcategory = DB::table('categories')
            ->join('films', 'films.categories', '=', 'categories.id','LEFT')
            ->select('categories.*')
            ->groupBy('categories.name')
            ->whereNotNull('films.categories')->get();                    
        //dd($suggestionvideo);
        session_start();
        $sess = session_id();
        $ip =$_SERVER['REMOTE_ADDR'];
        $popup = DB::table('popup')->where('visitor_session',$sess)->count();
        return view('movies.show', compact('film', 'reviews','actor','shownextvideo','suggestionvideo','allcategory','popup','footerbanner','socialfooter','homemenus','homelogos'));
    }
    
    public function latestvideo(Request $request){
        $today = gmdate("Y-m-d H:i:s");
        $films = Film::where(function ($query) use ($request) {
            $query->when($request->category, function ($q) use ($request) {
                return $q->whereHas('categories', function ($q2) use ($request){
                    return $q2->whereIn('name', (array)$request->category);
                });
            });
        })->where('status',1)->latest()->paginate(6);
        
        $footerbanner = DB::table('banners')->first();
        $socialfooter = DB::table('socials')->get();
        $homemenus = DB::table('menus')->first();
        $homelogos = DB::table('logos')->first();
        // $films =DB::table('films')
        //         ->join('categories', 'films.categories', '=', 'categories.id')
        //         ->select('films.*','categories.name as categoryname')
        //         ->where('films.status',1)
        //         ->limit(6)->latest()->get();
        
        
        $userid = Auth::user();
        if(!empty($userid)){
        $customers = DB::table('user_subscriptions')
            ->join('users', 'user_subscriptions.user_id', '=', 'users.id')
            ->select('user_subscriptions.*','user_subscriptions.status as subscription_status')
            ->where('users.id',Auth::user()->id)
            ->where('user_subscriptions.status','active')
            ->where('user_subscriptions.period_end','>',$today)
            ->count();
        }else{
            $customers = 0;
        }         
        session_start();
        $sess = session_id();
        $ip =$_SERVER['REMOTE_ADDR'];
        $popup = DB::table('popup')->where('visitor_session',$sess)->count();       
        return view('movies.latest',compact('films','customers','popup','footerbanner','socialfooter','homemenus','homelogos'));        
        
    }




    /* Featured Videos Code Start Here */

        public function ajaxGetFeaturedVideos(Request $request){
            $requestData = $request->all();
            $today = gmdate("Y-m-d H:i:s");
            //dd($requestData);
            $checkKey  = $requestData['checkKey'];
            $videoid  = $requestData['videoid'];
            $userid = Auth::user();
            if(!empty($userid)){
                $customers = DB::table('user_subscriptions')
                ->join('users', 'user_subscriptions.user_id', '=', 'users.id')
                ->select('user_subscriptions.*','user_subscriptions.status as subscription_status')
                ->where('users.id',Auth::user()->id)
                ->where('user_subscriptions.status','active')
                ->where('user_subscriptions.period_end','>',$today)
                ->count();
            }else{
                $customers = 0;
            }
            if($checkKey==1){

                $modelsCount = DB::table('films')
                            ->join('categories', 'films.categories', 'categories.id')
                            ->join('actors','films.actors', '=', 'actors.id')
                            ->select('actors.*','films.*','films.categories','categories.name as categoryname')
                            ->where('films.categories', $videoid)
                    ->get()->count();
                   //dd($modelsCount); 
                 $offset = 0;
                 $limit = $this->featuredvideoloadmorelimit;
            }else{ $offset = $requestData['row'];  $limit = $this->featuredvideoloadmorelimit; }
            
            $getRecords = DB::table('films')
                        ->join('categories', 'films.categories', 'categories.id')
                        ->join('actors','films.actors', '=', 'actors.id')
                        ->select('actors.*','films.*','films.categories','categories.name as categoryname')
                        ->where('films.categories', $videoid)
                        ->offset($offset)->limit($limit)->get();

            //dd($getRecords);       
            if($checkKey==1){  $html='<div class="s1video-collection row mb-3" id="s1-video-collection-Featuredvideos">';}else{ $html='';}
            foreach($getRecords as $value){
                 $time = Carbon::parse($value->created_at)->diffForHumans();
                   if ($customers == 1){
                        $videolink = url('/').'/movies/'.$value->id; 
                    }else{
                    if(auth()->user()){
                        $videolink = url('/stripe');
                    }else{
                        $videolink = url('/membership');
                        
                    }
                    }

                $videourl = url('/movies');
                 $html .= ' <div class="video-card mv-img">
                                 <div class="card-imags">
                                    <a href="'.$videolink.'" data-fancybox="gallery" data-caption="Caption Images 1">
                                       <video src="'.$value->shortvideo.'" class="vid" playsinline="" muted="" loop="" width="100%" height="auto" alt="'.$value->name.'"></video>
                                    </a>
                                    <div class="video-disciprtion">
                                      <a href="'.$videolink.'" title="" class="one-list-text">'.$value->name.'</a>
                                      <div class="one-list-date">'.$time.'</div>
                                   </div> 
                                 </div>
                            </div>';
                
            }
            if($checkKey==1){  $html.='</div>'; }else{ $html.='';}
            if($checkKey==1){ 
                if($modelsCount > $limit){
                    $html.='<div class="loadmore readmores-btn text-center">
                    <button class="btn btn-primary my-5" id="loadBtnFeaturedvideos">Load More...</button>
                    <input type="hidden" id="rowFeaturedvideos" value="0">
                    <input type="hidden" id="postCountFeaturedvideos" value="'.$modelsCount.'">
                    </div>';  
                }
            } 
            echo   $html;     
        }


        /* Featured Videos Code End Here */





    
}
