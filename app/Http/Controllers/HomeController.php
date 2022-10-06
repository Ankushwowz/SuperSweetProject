<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use App\Actor;
use App\Category;
use App\Film;
use App\Banner;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    protected $films = 'films';
    protected $loadmorelimit  = '10';
    protected $modalloadmorelimit  = '40';
    protected $homecategoryloadmorelimit  = '40';
    protected $categoryloadmorelimit  = '40';
    
    protected $redirectTo = RouteServiceProvider::PAYMENT;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application Dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function indexhome(){
        $today = gmdate("Y-m-d H:i:s");

        $latestvideos =DB::table('films')
                ->join('categories', 'films.categories', '=', 'categories.id')
                ->select('films.*','categories.name as categoryname')
                ->where('films.status',1)
                ->limit(10)->latest()->get();
        //dd($latestvideos);
        $userid = Auth::user();

        if(!empty($userid)){
        $customers = DB::table('user_subscriptions')
            ->join('users', 'user_subscriptions.user_id', '=', 'users.id')
            ->select('user_subscriptions.*','user_subscriptions.status as subscription_status')
            ->where('users.id',Auth::user()->id)
            ->where('user_subscriptions.status','active')
            ->where('user_subscriptions.period_end','>',$today)
            ->count();
        //dd($customers);
        }else{
            $customers = 0;
        //dd($customers);
        } 
        
        $footerbanner = DB::table('banners')->first();
        $socialfooter = DB::table('socials')->get();
        $homemenus = DB::table('menus')->first();
        $homelogos = DB::table('logos')->first();
        
        $allcategory = DB::table('categories')
            ->join('films', 'films.categories', '=', 'categories.id','LEFT')
            ->select('categories.*')
            ->groupBy('categories.name')
            ->whereNotNull('films.categories')->get();
        //dd($allcategoryFilms);    

        $allmodels = DB::table('actors')
                ->select('actors.id','actors.name', 'actors.avatar1')
                ->get();

        $actors = Actor::select('actors.*', DB::raw('count(actors) as connections'))
        ->leftJoin('films', 'films.actors', '=', 'actors.id')
        ->groupBy('actors.id')
        ->latest()->paginate(10);
        //dd($actors);

        session_start();
        $sess = session_id();
        $ip =$_SERVER['REMOTE_ADDR'];
        $popup = DB::table('popup')->where('visitor_session',$sess)->count();        

        return view('homenew',compact('latestvideos','allcategory','allmodels','customers','popup','footerbanner','socialfooter','homemenus','homelogos'));
    }



    public function index()
    {
        //$url = 'https://s3.' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/' . env('AWS_BUCKET') . '/';
        $today = gmdate("Y-m-d H:i:s");

        $banners = Banner::get();
        $socialfooter = DB::table('socials')->get();
        $homemenus = DB::table('menus')->first();
        $homelogos = DB::table('logos')->first();
        $sliderFilms =DB::table('films')
                ->join('categories', 'films.categories', '=', 'categories.id')
                ->select('films.*','categories.name as categoryname')
                ->where('films.status',1)
                ->limit(6)->latest()->get();
    
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
       
          
        //$sliderFilms = Film::with('categories')->with('ratings')->limit(10)->latest()->get();
        //$allcategoryFilms = Category::get();
        
        
        $allcategoryFilms = DB::table('categories')
            ->join('films', 'films.categories', '=', 'categories.id','LEFT')
            ->select('categories.*')
            //->groupBy('categories.name')
            ->whereNotNull('films.categories')->get();
            //->whereNotNull('films.categories')->get();
        $filmscat = [];
        foreach($allcategoryFilms as $category){
            $catid = $category->id;
            $filmscat = DB::table('films')
            ->join('categories', 'films.categories', '=', 'categories.id')
            ->select('films.*','categories.name as categoryname')
            //->where('films.categories','!=',$catid)
            ->inRandomOrder()->skip(0)->take(12)->get();
        }

        session_start();
        $sess = session_id();
        $ip =$_SERVER['REMOTE_ADDR'];
        $popup = DB::table('popup')->where('visitor_session',$sess)->count();
        $categoryFilms = Category::with('films')->get();
        return view('home', compact('banners','customers','sliderFilms', 'categoryFilms','allcategoryFilms','filmscat','popup','socialfooter','homemenus','homelogos'));
    }
    
    

    public function videomodals(Request $request){
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
        //dd($customers);
        if($request->ajax()) {

            $videoresult = DB::table('films')
                    ->join('actors', 'actors.id', '=', 'films.actors')
                    ->select('films.*','actors.name as actorname',DB::raw('count(actors) as connections'))
                    ->where('films.status','1')
                    ->groupBy('actors.id')
                    ->inRandomOrder()->paginate(10);
            }
            
            $output = '';
            $videoData['data'] = $videoresult;
            //dd($videoData['data']);

             $output = '<div class="s1video-collection row mb-3">';
            if (count($videoresult)>0) {
              
                    foreach ($videoresult as $key=>$value){
                        //dd($key);
                        $output .= '<div class="video-card mv-img">';
                        if ($customers == 1)
                        {
                            $videolink = url('/').'/movies/'.$value->id;
                        }else{
                            $videolink = url('/membership');
                        }
                        
                        $videourl = url('/movies');
                        
                        $time = Carbon::parse($value->created_at)->diffForHumans();

                        $output .= ' <div class="card-image">';
                        $output .=  '<a href="'.$videolink.'" data-fancybox="gallery" data-caption="Caption Images 1">';
                        $output .=  '<video src="'.$value->shortvideo.'" playsinline muted loop  width="100%" height="auto" alt="Image Gallery" class="vid"></video>
                                   </a>
                                   <div class="pornstar-thumb-container__info-videos">
                                      <div class="metric-container views"><i class="fas fa-eye"></i> 75M</div>
                                      <div class="metric-container videos "><i class="fas fa-video"></i> '.$value->connections.'</div>
                                   </div>
                                   <div class="video-disciprtion">
                                      <a href="'.$videolink.'" title="" class="one-list-text">'.$value->actorname.'</a>
                                      <div class="one-list-date">'.$time.'</div>
                                   </div>
                                </div>
                               
                                </div>';

                    }

                }else {
                    $output .= '<div class="fs1video-collection row mb-3">'.'No more results'.'</div>';
                    }
                $output .= '</div>';
                        echo $output;    

        }
     



        public function videocategory(Request $request){
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

        if($request->ajax()) {

             $categoryresult = DB::table('films')
                    ->join('categories', 'categories.id', '=', 'films.categories')
                    ->select('films.*','categories.name as categoryname',DB::raw('count(categories) as categoryconnections'))
                    //->where('films.status','1')
                    ->groupBy('categories.id')
                    ->inRandomOrder()->paginate(10);
         
            }
            
            
            $categoryData['data'] = $categoryresult;
            //dd($categoryData['data']);

              $output = '<div class="s1video-collection row mb-3">';
            if (count($categoryresult)>0) {
              
                    foreach ($categoryresult as $key=>$value){
                        //dd($key);
                        $output .= '<div class="video-card mv-img">';
                        if ($customers == 1)
                        {
                            $videolink = url('/').'/movies/'.$value->id;
                        }else{
                            $videolink = url('/membership');
                        }
                        
                        $videourl = url('/movies');
                        
                        $time = Carbon::parse($value->created_at)->diffForHumans();

                        $output .= ' <div class="card-image">';
                        $output .=  '<a href="'.$videolink.'" data-fancybox="gallery" data-caption="Caption Images 1">';
                        $output .=  '<video src="'.$value->shortvideo.'" playsinline muted loop  width="100%" height="auto" alt="Image Gallery" class="vid"></video>
                                   </a>
                                   <div class="pornstar-thumb-container__info-videos">
                                        <button class="btn btn-default filter-button search_name" rel="2" data-filter="2"><a href="category.html" class="another-catgory">'.$value->categoryname.'</a></button>
                                        <div class="metric-container videos counts"><i class="fas fa-video"></i> '.$value->categoryconnections.'</div>
                                     </div>
                                </div>
                               
                                </div>';

                    }

                }else {
                    $output .= '<div class="fs1video-collection row mb-3">'.'No more results'.'</div>';
                    }
                $output .= '</div>';
                        echo $output;    

        }



    
        public function categoryfilter(Request $request){
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

        if($request->ajax()) {
            if($request->id==0){
                    $videoresult = DB::table('films')
                    ->join('categories', 'films.categories', '=', 'categories.id')
                    ->select('films.*','categories.name as categoryname')
                    ->inRandomOrder()->get();
            }else{
                  $videoresult = DB::table('films')
                ->join('categories', 'films.categories', '=', 'categories.id')
                ->select('films.*','categories.name as categoryname')
                ->where('films.categories',$request->id)
                ->inRandomOrder()->get();
            }
            
            
            $videoData['data'] = $videoresult;
            $output = '<div class="main-filter-video" id="main-filter-video">';
           
            if (count($videoresult)>0) {
              
                    foreach ($videoresult as $key=>$value){
                        
                        if($key > 5){break;}
                        $output .= '<div class="filter-video" id="filter_video">';
                        if ($customers == 1)
                        {
                            $videolink = url('/').'/movies/'.$value->id;
                        }else{
                            $videolink = url('/membership');
                        }
                        
                        $videourl = url('/movies');
                        
                        $time = Carbon::parse($value->created_at)->diffForHumans();
                        $output .= '<div class="col-xs-6 col-sm-4 movie-items-images gallery_product mv-img filter '.$value->categories.'" style="">';
                        
                        $output .= '<a href="'.$videolink.'">';
                        $output .= '<video  height="100%" style="height: auto;" width="100%" playsinline muted loop ><source src="'.$value->shortvideo.'"></video></a>';
                        $output .= '<div class="title-ins">
                        <h6 class="heading-name"><a href="'.$videolink.'">'.$value->name.'</a></h6>
                        <h6 class="heading-category">'.$value->categoryname.' <span class="align-right"><i class="ion-android-time"></i>'.$time.'</span></h6>
                       </div>
                        </div>';
                        $output .= '</div>';
                    }
                    if($key > 5){
                        if($request->id==0){
                            $output .= '<div class="readmores-btn"><a href="'.$videourl.'" class="read-signups" type="submit">Show More</a></div>';
                        }else{
                           $output .= '<div class="readmores-btn"><a href="'.$videourl.'?category['.$request->id.']='.$request->id.'" class="read-signups" type="submit">Show More</a></div>'; 
                        }
                        
                    }
                     
                   
                
                
            }
            else {
                    $output .= '<div class="filter-video">'.'No results'.'</div>';
            }
                $output .= '</div>';
                echo $output;

        }
     //dd($request->id);   
    }




        public function categoryallfilter(Request $request){

        if($request->ajax()) {
            $videoresult = DB::table('films')
            ->join('categories', 'films.categories', '=', 'categories.id')
            ->select('films.*','categories.name as categoryname')
            //->where('films.categories',$request->id)
            ->inRandomOrder()->skip(0)->take(6)->get();


            $videoData['data'] = $videoresult;
            //dd($videoData['data']);
                 //echo json_encode($videoData);
                 //exit;

            

            $output = '';
           
             if (count($videoresult)>0) {
              
                $output = '<div class="filter-video" id="filter_video">';
              
                 foreach ($videoresult as $value){
                   $videolink = url('/').'/movies/'.$value->id;

                   $time = Carbon::parse($value->created_at)->diffForHumans();
                   //dd($time);
                    //$output .= '<li class="list-group-item">'.'<a href="'.$row->id.'">'.$row->business_name.'</a>'.'</li>';


                   $output .= '<div class="col-xs-6 col-sm-4 movie-items-images gallery_product mv-img filter '.$value->categories.'" style="">';
                
                $output .= '<a href="'.$videolink.'">';
               $output .= '<video  height="100%" style="height: auto;" width="100%" playsinline muted loop ><source src="'.$value->shortvideo.'"></video></a>';
              
              
              
            
            $output .= '<div class="title-ins">
                
               <h6 class="heading-name"><a href="'.$videolink.'">'.$value->name.'</a></h6>
                
               <h6 class="heading-category">'.$value->categoryname.' <span class="align-right"><i class="ion-android-time"></i>'.$time.'</span></h6>
           
            </div>
         </div>';




                }
              
                     $output .= '</div>';
                }
                 else {
             
                 $output .= '<div class="filter-video">'.'No results'.'</div>';
                }

                echo $output;

        }
     //dd($request->id);   
    }

    
    
    

        // Seach filter for finding Models or Videos

        public function search(Request $request){
        switch ($request->search_category) {
            case 'movies':
                $films = Film::where('name', 'like', '%' . $request->search . '%')->paginate(10);
                $footerbanner = DB::table('banners')->first();
                $socialfooter = DB::table('socials')->get();
                $homemenus = DB::table('menus')->first();
                $homelogos = DB::table('logos')->first();
                session_start();
                $sess = session_id();
                $ip =$_SERVER['REMOTE_ADDR'];
                $popup = DB::table('popup')->where('visitor_session',$sess)->count();
                return view('movies.index', compact('films','popup','footerbanner','homemenus','homelogos'));
                break;
            case 'categories':
                $categories = Category::where('name', 'like', '%' . $request->search . '%')->paginate(10);
                $footerbanner = DB::table('banners')->first();
                $socialfooter = DB::table('socials')->get();
                $homemenus = DB::table('menus')->first();
                $homelogos = DB::table('logos')->first();
                //dd($categories);
                session_start();
                $sess = session_id();
                $ip =$_SERVER['REMOTE_ADDR'];
                $popup = DB::table('popup')->where('visitor_session',$sess)->count();
                return view('categories.index', compact('categories','popup','footerbanner','homemenus','homelogos'));
                break;
            case 'actors':
                $actors = Actor::where('name', 'like', '%' . $request->search . '%')->paginate(10);
                $footerbanner = DB::table('banners')->first();
                $socialfooter = DB::table('socials')->get();
                $homemenus = DB::table('menus')->first();
                $homelogos = DB::table('logos')->first();
                session_start();
                $sess = session_id();
                $ip =$_SERVER['REMOTE_ADDR'];
                $popup = DB::table('popup')->where('visitor_session',$sess)->count();
                return view('actors.index', compact('actors','popup','footerbanner','socialfooter','homemenus','homelogos'));
                break;
            default:
                return redirect()->back();
        }
    }

        public function message(Request $request){
        $attributes = $request->validate([
            'email' =>  'required|email',
            'title'=>  'required|string',
            'message'=>  'required|string|max:250'
        ]);
        
        $data = [
          'title' => $request->title,
          'email' => $request->email,
          'message' => $request->message
        ];

        Message::create([
           'email' => $attributes['email'],
           'title' => $attributes['title'],
           'message' => $attributes['message'],
        ]);
        
        \Mail::to($data['email'])->send(new \App\Mail\MyTestMail($data));
        //return back()->with(['success' => 'Thank you for contact us']);
        
        session()->flash('success', 'Thank you for contact us');
        return redirect()->back();

    }
    
    
        public function modelform(Request $request){
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
        return view('model-form',compact('allcategory','popup','footerbanner','socialfooter','homemenus','homelogos'));
    }
    
        public function modelpost(Request $request){
       // echo"<pre>";
     //  print_r($request->all());
       //die();
        
        $attributes = $request->validate([
            'stage_name' =>  'required',
            'name' =>  'required',
            'last_name' =>  'required',
            'modelemail' =>  'required|email',
            'city' =>  'required',
            'country' =>  'required',
            'age' =>  'required',
            'dob' =>  'required',
            'gender' =>  'required',
            'checked_age'=>  'accepted',
        ]);
       

        $actor = Actor::create([
           'stage_name' => $attributes['stage_name'],
           'name' => $attributes['name'],
           'last_name' => $attributes['last_name'],
           'modelemail' => $attributes['modelemail'],
           'city' => $attributes['city'],
           'country' => $attributes['country'],
           'age' => $attributes['age'],
           'dob' => $attributes['dob'],
           'gender' => $attributes['gender'],
           'ethnicity' => $request->ethnicity,
           'fan_link' => $request->fan_link,
           'insta_name' => $request->insta_name,
           'overview' => $request->overview,
           'biography' => $request->biography,
           'email_photo' => $request->email_photo,
           'checked_age' => $attributes['checked_age'],
        ]);

        session()->flash('success', 'Thank you. Your form has been submitted Successfully');
        return redirect()->back();
    }
    
    
        public function contactform(Request $request){
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
        return view('contact-us',compact('allcategory','popup','footerbanner','socialfooter','homemenus','homelogos'));
    }
    
        public function ajaxRequestPopup(Request $request){
            //dd($request->all());
            DB::table('popup')->insert([
                'visitor_ip' => $request->visitor_ip,
                'visitor_session' => $request->visitor_session,
                'button_value'  => $request->button_value
            ]);
    
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Agreed'
                ]
            );
        }
        
        
        
        public function privacypolicy(Request $request){
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
            return view('pages.privacy-policy',compact('allcategory','popup','footerbanner','socialfooter','homemenus','homelogos'));
        }
        
        public function ChildSexual(Request $request){
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
            return view('pages.child-sexual',compact('allcategory','popup','footerbanner','socialfooter','homemenus','homelogos'));
        }
        
        
        public function dmcanotice(Request $request){
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
            return view('pages.dmca-notice',compact('allcategory','popup','footerbanner','socialfooter','homemenus','homelogos'));
        }
        
        public function consensualpolicy(Request $request){
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
            return view('pages.non-consensual-content-policy',compact('allcategory','popup','footerbanner','socialfooter','homemenus','homelogos'));
        }
        
        public function parentalcontrols(Request $request){
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
            return view('pages.parental-controls',compact('allcategory','popup','footerbanner','socialfooter','homemenus','homelogos'));
        }
        
        public function control2257(Request $request){
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
            return view('pages.2257',compact('allcategory','popup','footerbanner','socialfooter','homemenus','homelogos'));
        }
        
        public function termsofservice(Request $request){
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
            return view('pages.terms-of-service',compact('allcategory','popup','footerbanner','socialfooter','homemenus','homelogos'));
        }


        public function ajaxGetHomeModelsVideos(Request $request){
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
                $modelCount= DB::table($this->films)
                    ->join('actors', 'actors.id', '=', 'films.actors')
                    ->select('films.*','actors.name as actorname',DB::raw('count(actors) as connections'))
                    //->where('films.status','1')
                    ->groupBy('actors.id')
                    ->orderby('films.id','desc')
                    ->get()->count();
                 $offset = 0;
                 $limit = $this->modalloadmorelimit;
            }else{ $offset = $requestData['row'];  $limit = $this->modalloadmorelimit; }
            
            $getRecords = DB::table($this->films)
                    ->join('actors', 'actors.id', '=', 'films.actors')
                    ->select('films.*','actors.name as actorname',DB::raw('count(actors) as connections'))
                    //->where('films.status','1')
                    ->groupBy('actors.id')
                    ->orderby('films.id','desc')
                    ->offset($offset)->limit($limit)->get();
            if($checkKey==1){  $html='<div class="s1video-collection row mb-3" id="s1-video-collection">';}else{ $html='';}
            foreach($getRecords as $value){
                $time = Carbon::parse($value->created_at)->diffForHumans();
                if ($customers == 1){
                    $videolink = url('/').'/models/'.$value->actorname;
                    //$videolink = url('/').'/movies/'.$value->id; 
                }else{
                if(auth()->user()){
                    $videolink = url('/stripe');
                }else{
                    $videolink = url('/membership');
                    
                }
                }
                $videourl = url('/movies');
                 $html .= ' <div class="video-card mv-img">
                            <div class="card-image">';
                 $html .=  '<a href="'.$videolink.'" data-fancybox="gallery" data-caption="Caption Images 1">';
                 $html .=  '<video src="'.$value->shortvideo.'" playsinline muted loop  width="100%" height="auto" alt="Image Gallery" class="vid"></video>
                                   </a>
                                   <div class="pornstar-thumb-container__info-videos">
                                      <div class="metric-container views"><a href="'.$videolink.'" title="" class="one-list-text">'.$value->actorname.'</a></div>
                                      <div class="metric-container videos "><i class="fas fa-video"></i> '.$value->connections.'</div>
                                   </div>
                                   
                                </div>
                        </div>';
                
            }
            if($checkKey==1){  $html.='</div>'; }else{ $html.='';}
            if($checkKey==1){ 
                if($modelCount > $limit){
                    $html .='<div class="readmores-btn text-center">
                              <button class="load-mores" id="loadBtnHomeModelsVideos"> Load More Videos</button>
                              <input type="hidden" id="rowHomeModelsVideos" value="0">
                              <input type="hidden" id="postCountHomeModelsVideos" value="'.$modelCount.'">
                           </div>';
                        
                }
            } 
            echo   $html;     
        }





        public function ajaxGetHomeCategoryVideos(Request $request){
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

                $categoryCounts = DB::table($this->films)
                    ->join('categories', 'categories.id', '=', 'films.categories')
                    ->select('films.*','categories.name as categoryname',DB::raw('count(categories) as categoryconnections'))
                    ->groupBy('categories.id')
                    ->get()->count();
                 $offset = 0;
                 $limit = $this->homecategoryloadmorelimit;
            }else{ $offset = $requestData['row'];  $limit = $this->homecategoryloadmorelimit; }
            
            $getRecords = DB::table($this->films)
                    ->join('categories', 'categories.id', '=', 'films.categories')
                    ->select('films.*','categories.name as categoryname',DB::raw('count(categories) as categoryconnections'))
                    ->groupBy('categories.id')
                    ->offset($offset)->limit($limit)->get();
            if($checkKey==1){  $html='<div class="s1video-collection row mb-3" id="s1-video-collection-category">';}else{ $html='';}
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
                 $html .= ' <div class="video-card">
                            <div class="card-image">';
                 $html .=  '<a href="'.$videolink.'" data-fancybox="gallery" data-caption="Caption Images 1">';
                 $html .=  '<video src="'.$value->shortvideo.'" playsinline muted loop  width="100%" height="auto" alt="Image Gallery" class="vid"></video>
                                   </a>
                                   <div class="pornstar-thumb-container__info-videos">
                                      <div class="metric-container views"><a href="'.$videolink.'" title="" class="one-list-text">'.$value->categoryname.'</a></div>
                                      <div class="metric-container videos "><i class="fas fa-video"></i> '.$value->categoryconnections.'</div>
                                   </div>
                                </div>
                        </div>';
                
            }
            if($checkKey==1){  $html.='</div>'; }else{ $html.='';}
            if($checkKey==1){ 
                if($categoryCounts > $limit){
                    $html .='<div class="readmores-btn text-center">
                              <button class="load-mores" id="loadBtnHomeCategoryVideos"> Load More Videos</button>
                              <input type="hidden" id="rowHomeCategoryVideos" value="0">
                              <input type="hidden" id="postCountHomeCategoryVideos" value="'.$categoryCounts.'">
                           </div>';
                    
                }
            } 
            echo   $html;     
        }




        public function categorypost(Request $request,$id){
            $footerbanner = DB::table('banners')->first();
            $socialfooter = DB::table('socials')->get();
            $homemenus = DB::table('menus')->first();
            $homelogos = DB::table('logos')->first();
            $categoryID = $request->id;
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


          $allcategory = DB::table('categories')
            ->join('films', 'films.categories', '=', 'categories.id','LEFT')
            ->select('categories.*')
            ->groupBy('categories.name')
            ->whereNotNull('films.categories')->get();

            session_start();
            $sess = session_id();
            $ip =$_SERVER['REMOTE_ADDR'];
            $popup = DB::table('popup')->where('visitor_session',$sess)->count();        

        return view('movies.category',compact('categoryID','allcategory','popup','footerbanner','socialfooter','homemenus','homelogos'));
    }


     public function ajaxGetCategoryVideo(Request $request){
            $requestData = $request->all();
            //dd($requestData);
            $checkKey  = $requestData['checkKey'];
            $catid  = base64_decode($requestData['catid']);
            
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

                $categoryCount = DB::table('films')
                    ->join('categories', 'films.categories', 'categories.id')
                    ->join('actors', 'actors.id', 'films.actors')
                    ->select('actors.name as actorname','films.*','films.id as filmid','categories.name as categoryname')
                    ->where('films.categories',$catid)
                    ->get()->count();
                   //dd($modelsCount); 
                 $offset = 0;
                 $limit = $this->categoryloadmorelimit;
            }else{ $offset = $requestData['row'];  $limit = $this->categoryloadmorelimit; }
            
            $getRecords = DB::table('films')
                    ->join('categories', 'films.categories', 'categories.id')
                    ->join('actors', 'actors.id', 'films.actors')
                    ->select('actors.name as actorname','films.*','films.id as filmid','categories.name as categoryname')
                    ->where('films.categories',$catid)
                    ->offset($offset)->limit($limit)->get();

            //dd($getRecords);       
            if($checkKey==1){  $html='<div class="s1video-collection row mb-3" id="s1-video-collection-CategoryVideo">';}else{ $html='';}
            foreach($getRecords as $value){
                 $time = Carbon::parse($value->created_at)->diffForHumans();
                 //$videolink = url('/').'/movies/'.$value->id;

                $videourl = url('/movies');
                
                if ($customers == 1){
                    $videolink = url('/').'/movies/'.$value->id; 
                    }else{
                    if(auth()->user()){
                        $videolink = url('/stripe');
                    }else{
                        $videolink = url('/membership');
                        
                    }
                    }

                $html .='<div class="video-card-category mv-img">
                     <div class="card-images">
                        <a href="'.$videolink.'" data-fancybox="gallery" data-caption="Caption Images 1">
                           <video src="'.$value->shortvideo.'" playsinline muted loop  width="100%" height="auto" alt="Image Gallery" class="vid"></video>
                        </a>
                        <div class="pornstar-thumb-container__info-videos">
                           <div class="metric-container views">'.$value->categoryname.'</div>
                           
                        </div>
                        <div class="video-disciprtion">
                           <a href="'.$videolink.'" title="" class="one-list-text">'.$value->actorname.'</a>
                           <div class="one-list-date">'.$time.'</div>
                        </div>
                     </div>
                  </div>';
                
            }
            if($checkKey==1){  $html.='</div>'; }else{ $html.='';}
            if($checkKey==1){ 
                if($categoryCount > $limit){
                    
                    $html .='<div class="readmores-btn text-center">
                              <button class="load-mores" id="loadBtnCategoryVideo"> Load More Videos</button>
                              <input type="hidden" id="rowCategoryVideo" value="0">
                              <input type="hidden" id="postCountCategoryVideo" value="'.$categoryCount.'">
                           </div>';
                }
            } 
            echo   $html;     
        }


        /* List All Videos Code Start Here */

        public function ajaxGetListVideo(Request $request){
            $requestData = $request->all();
           $checkKey  = $requestData['checkKey'];
           if(!empty($requestData['searchV'])){
               $searchVal  = $requestData['searchV'];
           }
           
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
           
            //$catid  = base64_decode($requestData['catid']);

            if($checkKey==1){
                //dd($searchVal);
                if(!empty($searchVal)){
                    $ListVideoCount = DB::table('films')
                    ->join('categories', 'films.categories', '=', 'categories.id')
                    ->select('films.*','categories.name as categoryname')
                    ->where('films.status',1)
                    ->where('films.name', 'LIKE', "%$searchVal%")
                    ->get()->count();
                    
                }else{
                    $ListVideoCount = DB::table('films')
                    ->join('categories', 'films.categories', '=', 'categories.id')
                    ->select('films.*','categories.name as categoryname')
                    ->where('films.status',1)
                    ->get()->count();
                }
                 //dd($ListVideoCount);   
                  
                 $offset = 0;
                 $limit = 50;
            }else{ $offset = $requestData['row'];  $limit = 50; }
            
            if(!empty($searchVal)){
                $getRecords = DB::table('films')
                    ->join('categories', 'films.categories', '=', 'categories.id')
                    ->select('films.*','categories.name as categoryname')
                    ->where('films.status',1)
                    ->where('films.name', 'LIKE', "%$searchVal%")
                    ->offset($offset)->limit($limit)->get();
            }else{
                    $getRecords = DB::table('films')
                    ->join('categories', 'films.categories', '=', 'categories.id')
                    ->select('films.*','categories.name as categoryname')
                    ->where('films.status',1)
                    ->offset($offset)->limit($limit)->get();
            }
            
            

            //dd($getRecords);       
            if($checkKey==1){  $html='<div class="s1video-collection row mb-3" id="s1-video-collection-ListVideo">';}else{ $html='';}
            if(count($getRecords) >0)
            {
                foreach($getRecords as $value){
                     $time = Carbon::parse($value->created_at)->diffForHumans();
    
                    $videourl = url('/movies');
                    
                    if ($customers == 1){
                    $videolink = url('/').'/movies/'.$value->id; 
                    }else{
                    if(auth()->user()){
                        $videolink = url('/stripe');
                    }else{
                        $videolink = url('/membership');
                        
                    }
                    }
                    
                    $noimage = 'https://oxeenit.tech/supersweet/public/home_files/img/no-image.png';
    
                    $html .='<div class="video-card-category mv-img">
                         <div class="card-images">
                            <a href="'.$videolink.'" data-fancybox="gallery" data-caption="Caption Images 1">
                               <video src="'.$value->shortvideo.'" playsinline muted loop  width="100%" height="auto" alt="Image Gallery" class="vid"></video>
                            </a>
                            <div class="pornstar-thumb-container__info-videos">
                               <div class="metric-container views">'.$value->categoryname.'</div>
                               <div class="metric-container videos"><!-- <i class="fas fa-video"></i> 196 --></div>
                            </div>
    
                            <div class="video-disciprtion">
                               <a href="'.$videolink.'" title="" class="one-list-text">'.$value->name.'</a>
                               <div class="one-list-date">'.$time.'</div>
                            </div>
    
    
                         </div>
                      </div>';

                }
            }else{
                $html .='<div class="text-center-no"> <h2 class="no-image">No data Found</h2></div>';
            }
            if($checkKey==1){  $html.='</div>'; }else{ $html.='';}
            if($checkKey==1){ 
                if($ListVideoCount > $limit){
                    
                    $html .='<div class="readmores-btn text-center">
                              <button class="load-mores" id="loadBtnListVideo"> Load More Videos</button>
                              <input type="hidden" id="rowListVideo" value="0">
                              <input type="hidden" id="postCountListVideo" value="'.$ListVideoCount.'">
                           </div>';
                    
                   
                }
            } 
            echo   $html;     
        }




        /* List All Videos Code End Here */




    public function membership(Request $request){
        
        session_start();
        $sess = session_id();
        $ip =$_SERVER['REMOTE_ADDR'];
        $popup = DB::table('popup')->where('visitor_session',$sess)->count();
        return view('membership',compact('popup'));
        
    }
    
    
    public function membershipform(Request $request){
        $this->validate($request, [
            'supscriptionplan'=> 'required', 
          
       ]);
       $subscriptionID = $request->supscriptionplan;
       return redirect('/member/register/'.$subscriptionID);
    }
    
    
    public function memberregister(Request $request,$id){
        $planID = $id;
        //dd($planID);
        return view('auth.register',compact('planID'));
    }
    
    public function register(Request $request){
        
        $this->validate($request, [
          'subscriptionplan' => 'required',
          'name' => 'required',
          'email' => 'required|email',
          'password' => 'required'
       ]);

      //  Store data in database
        $user = User::create([
            'subscriptionplan' => $request->subscriptionplan,
            'username' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        if(isset($user->id)){
            $request->session()->put('USER_ID',$user->id);
            return redirect('/stripe');
        
        }
        //return back()->with('success', 'Your form has been submitted.');
       
        }

        
}
