<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Film;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use Mail;
class ActorController extends Controller
{
    
    
    //protected $films = 'films';
    protected $loadmorelimit  = '40';
    protected $featuredmodelloadmorelimit  = '40';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }
    
    /*
    Function Name: Index
    Purpose: It fethes all the actors with the count if actors/modals total videos inside the database
    */
    public function index(){
        //$actors = Actor::latest()->paginate(10);
     //    $actors = Actor::select('actors.*', DB::raw('count(actors) as connections'))
    	// ->leftJoin('films', 'films.actors', '=', 'actors.id')
    	// ->groupBy('actors.id')
    	// ->latest()->paginate(8);
    	$footerbanner = DB::table('banners')->first();
    	$socialfooter = DB::table('socials')->get();
    	$homemenus = DB::table('menus')->first();
    	$homelogos = DB::table('logos')->first();
    	$allcategory = DB::table('categories')
            ->join('films', 'films.categories', '=', 'categories.id','LEFT')
            ->select('categories.*')
            ->groupBy('categories.name')
            ->whereNotNull('films.categories')->get();
    	session_start();
        $sess = session_id();
        $ip =$_SERVER['REMOTE_ADDR'];
        $popup = DB::table('popup')->where('visitor_session',$sess)->count();
        return view('actors.index', compact('allcategory','popup','footerbanner','socialfooter','homemenus','homelogos'));
    }



    /*
    Function Name: Show
    Purpose: It fethes the individual actor/modal details and fetching related videos of the modals
    */

    public function show(Actor $actor){
        $footerbanner = DB::table('banners')->first();
        $socialfooter = DB::table('socials')->get();
        $homemenus = DB::table('menus')->first();
        $homelogos = DB::table('logos')->first();
        //
        // $videoactor = DB::table('actors')
        //             ->join('films', 'actors.id', 'films.actors')
        //             ->join('categories', 'films.categories', 'categories.id')
        //             ->select('actors.*','films.*','films.id as filmid','categories.name as categoryname')
        //             ->where('films.actors', 'actors.id')
        //             ->get();
        //dd($videoactor); 
         $allcategory = DB::table('categories')
            ->join('films', 'films.categories', '=', 'categories.id','LEFT')
            ->select('categories.*')
            ->groupBy('categories.name')
            ->whereNotNull('films.categories')->get();
        session_start();
        $sess = session_id();
        $ip =$_SERVER['REMOTE_ADDR'];
        $popup = DB::table('popup')->where('visitor_session',$sess)->count();
        return view('actors.show', compact('actor','allcategory','popup','footerbanner','socialfooter','homemenus','homelogos'));
    }




    public function ajaxGetModals(Request $request){
            $requestData = $request->all();
            $checkKey  = $requestData['checkKey'];
            $today = gmdate("Y-m-d H:i:s");
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

                $categoryCount = Actor::select('actors.*', DB::raw('count(actors) as connections'))
                    ->leftJoin('films', 'films.actors', '=', 'actors.id')
                    ->orderby('actors.id','desc')
                    ->groupBy('actors.id')
                    ->get()->count();
                 $offset = 0;
                 $limit = $this->loadmorelimit;
            }else{ $offset = $requestData['row'];  $limit = $this->loadmorelimit; }
            
            $getRecords = Actor::select('actors.*', DB::raw('count(actors) as connections'))
                    ->leftJoin('films', 'films.actors', '=', 'actors.id')
                    ->orderby('actors.id','desc')
                    ->groupBy('actors.id')
                    ->offset($offset)->limit($limit)->get();

            //dd($getRecords);       
            if($checkKey==1){  $html='<div class="row text-center text-lg-start" id="s1-video-collection-modals">';}else{ $html='';}
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
                $actorlink = url('/').'/models/'.$value->name;
                $actorImage = url('/').'/public/actor_avatars/'.$value->avatar1;
                $videourl = url('/movies');
                 $html .= ' <div class="col-lg-3 col-md-4 col-6">
                              <a href="'.$actorlink.'" class=" ceb-infor">
                                    <img src="'.$actorImage.'" class="model-set" alt="">
                              </a>
                              <div class="ceb-infor">
                                  <h2 class="model-text"><a href="'.$actorlink.'" class="cab-hesding">'.$value->name.'</a> <span><i class="fa fa-video-camera" aria-hidden="true"></i>'.$value->connections.'</span></h2>
                              </div>
                            </div>';
                
            }
            if($checkKey==1){  $html.='</div>'; }else{ $html.='';}
            if($checkKey==1){ 
                if($categoryCount > $limit){
                    $html .='<div class="readmores-btn text-center">
                              <button class="load-mores mb-3" id="loadBtnModelsVideos"> Load More Videos</button>
                              <input type="hidden" id="rowModelsVideos" value="0">
                              <input type="hidden" id="postCountModelsVideos" value="'.$categoryCount.'">
                           </div>';
                    
                   
                }
            } 
            echo   $html;     
        }




        /* Featured Videos of Modals Code Start Here */

        public function ajaxGetFeaturedModals(Request $request){
            $requestData = $request->all();
            $today = gmdate("Y-m-d H:i:s");
            //dd($requestData);
            $checkKey  = $requestData['checkKey'];
            $modelid  = $requestData['modelid'];
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

                $modelsCount = DB::table('actors')
                    ->join('films', 'actors.id', 'films.actors')
                    ->join('categories', 'films.categories', 'categories.id')
                    ->select('actors.*','films.*','films.id as filmid','categories.name as categoryname')
                    ->where('films.actors',$modelid)
                    ->get()->count();
                   //dd($modelsCount); 
                 $offset = 0;
                 $limit = $this->featuredmodelloadmorelimit;
            }else{ $offset = $requestData['row'];  $limit = $this->featuredmodelloadmorelimit; }
            
            $getRecords = DB::table('actors')
                    ->join('films', 'actors.id', 'films.actors')
                    ->join('categories', 'films.categories', 'categories.id')
                    ->select('actors.*','films.*','films.id as filmid','categories.name as categoryname')
                    ->where('films.actors',$modelid)
                    ->offset($offset)->limit($limit)->get();

            //dd($getRecords);       
            if($checkKey==1){  $html='<div class="s1video-collection row mb-3" id="s1-video-collection-Featuredmodals">';}else{ $html='';}
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
                                       <video class="play-video vid" src="'.$value->shortvideo.'" playsinline="" muted="" loop="" width="100%" height="auto" alt="'.$value->name.'"></video>
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
                    <button class="btn btn-primary my-5" id="loadBtnFeaturedModelsVideos">Load More...</button>
                    <input type="hidden" id="rowFeaturedModelsVideos" value="0">
                    <input type="hidden" id="postCountFeaturedModelsVideos" value="'.$modelsCount.'">
                    </div>';  
                }
            } 
            echo   $html;     
        }


        /* Featured Videos of Modals Code End Here */







}
