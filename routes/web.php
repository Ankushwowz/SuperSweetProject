<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes(['reset' => FALSE]);
Route::any('logout', 'Auth\LoginController@logout')->name('logout');


/* Creating New Routes  Start Here*/

Route::get('/', 'HomeController@indexhome'); // This will be used after delete authcontroller route

/* Creating New Routes  End Here*/

//Route::get('/home', 'HomeController@index'); // This will be deleted after adding default route
//Route::get('/', 'Dashboard\AuthController@showLoginForm'); // New created till home route make(this should be delete)
Route::get('/index', 'HomeController@index'); // This will be used after delete authcontroller route
Route::get('/search', 'HomeController@search');

Route::get('/modelform', 'HomeController@modelform'); // Model Added Form Here
Route::post('/modelpost', 'HomeController@modelpost'); // Model Added Form Post Here
Route::get('/movies', 'MovieController@index');
Route::get('/models', 'ActorController@index');


Route::get('/contact', 'HomeController@contactform'); // Model Added Form Here
Route::post('/message', 'HomeController@message');
//Route::post('/modelpost', 'HomeController@modelpost'); // Model Added Form Post Here
Route::get('/category/filter', 'HomeController@categoryfilter');
Route::get('/category/allfilter', 'HomeController@categoryallfilter');

Route::get('/video/modals', 'HomeController@videomodals');
Route::get('/video/category', 'HomeController@videocategory');


Route::get('/category/{id}', 'HomeController@categorypost');

Route::get('/membership', 'HomeController@membership');
Route::post('/membership/form', 'HomeController@membershipform');

Route::get('/member/register/{id}', 'HomeController@memberregister');

Route::post('/member/registers/{id}', 'HomeController@register');

/* Pages */
Route::get('/privacy/privacy-policy', 'HomeController@privacypolicy');
Route::get('/child-sexual-policy/child-sexual', 'HomeController@ChildSexual');
Route::get('/reporting-claims/dmca-notice', 'HomeController@dmcanotice');
Route::get('/non-consensual/non-consensual-content-policy', 'HomeController@consensualpolicy');
Route::get('/parentcontrols/parental-controls', 'HomeController@parentalcontrols');
Route::get('/compliance-statement/2257', 'HomeController@control2257');
Route::get('/terms/terms-of-service', 'HomeController@termsofservice');

Route::get('/cronjob', 'ClientController@cronjob');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/user/profile', 'ClientController@profile');
    Route::put('/user/profile/{user}', 'ClientController@updateProfile');
    Route::get('/user/change_password', 'ClientController@changePasswordForm');
    Route::put('/user/change_password/{user}', 'ClientController@changePassword');
    
    Route::get('/user/subscription_detail', 'ClientController@subscriptiondetail');
    Route::get('/user/cancelsubscription/{id}', 'ClientController@cancelsubscription');
    Route::get('/user/pausesubscription/{id}', 'ClientController@pausesubscription'); // Pause Subscription
    Route::get('/user/activesubscription/{id}', 'ClientController@activesubscription'); // Active or Update Suscription
    
    Route::get('/user/favorites', 'ClientController@favorites');
    Route::get('/user/ratings', 'ClientController@ratings');
    Route::get('/user/reviews', 'ClientController@reviews');
    //Route::get('/user/reviews', 'ClientController@reviews');

    Route::post('/user/addToFavorite/{film}', 'FavoriteController@store');
    Route::post('/user/removeFromFavorite/{film}', 'FavoriteController@destroy');

    Route::post('/user/rate/{film}', 'RateController@store');

    Route::post('/user/review/{film}', 'ReviewController@store');
    Route::delete('/user/review/{film}', 'ReviewController@destroy');
    
    Route::get('stripe', 'StripeController@index')->name('stripe');
    Route::post('stripe', 'StripeController@stripePost')->name('stripe.post');
    
    //Route::get('/payment','StripeController@index');
    
  
    
    Route::get('/movies/{film}', 'MovieController@show');
    
    Route::get('/models/{actor:name}', 'ActorController@show');
    
    Route::post('/user/addToHistory/{id}', 'HistoryController@addhistory'); // User Video History
    
    Route::get('/latest/video', 'MovieController@latestvideo'); //Latest Videos

    // Get Data By Ajax//

    // End Here
    
});

Route::post('/home/ajaxGetHomeModelsVideos', 'HomeController@ajaxGetHomeModelsVideos');
Route::post('/home/ajaxGetLoadMoreHomeModelsVideos', 'HomeController@ajaxGetLoadMoreHomeModelsVideos');

Route::post('/home/ajaxGetHomeCategoryVideos', 'HomeController@ajaxGetHomeCategoryVideos');

Route::post('/home/ajaxGetModals', 'ActorController@ajaxGetModals');
Route::post('/home/ajaxGetFeaturedModals', 'ActorController@ajaxGetFeaturedModals');
Route::post('/home/ajaxGetCategoryVideo', 'HomeController@ajaxGetCategoryVideo');
Route::post('/home/ajaxGetListVideo', 'HomeController@ajaxGetListVideo');
Route::post('/home/ajaxGetFeaturedVideos', 'MovieController@ajaxGetFeaturedVideos');


Route::post('popupinsert', 'HomeController@ajaxRequestPopup');
Route::get('/masterkey', function () {
    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";
});