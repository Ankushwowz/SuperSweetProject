<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard'], function () {
    Config::set('auth.defines', 'admin');

    Route::get('login', 'AuthController@showLoginForm')->name('dashboard.login');
    Route::post('login', 'AuthController@login');
    Route::any('logout', 'AuthController@logout')->name('dashboard.logout');

    Route::group(['middleware' => 'adminAuth:admin', 'as' => 'dashboard.'], function () {

        Route::get('/', 'HomeController@index')->name('home');

        Route::resource('admins', 'AdminController')->except(['show']);
        Route::resource('clients', 'ClientController')->except(['show']);
        Route::resource('films', 'FilmController');
        Route::post('change-status', 'FilmController@changeStatus'); // Change Subscription Status
        Route::resource('actors', 'ActorController');
        
		Route::resource('categories', 'CategoryController')->except(['show']); // CRUD for Categories
		
		Route::resource('subscriptions', 'SubscriptionController')->except(['show']); // CRUD for Subscriptions
		Route::get('userChangeStatus', 'SubscriptionController@userChangeStatus'); // Change Subscription Status
		
		//Route::get('fileup','FilmController@fileup')->except(['fileup']);
		
		Route::get('file-upload', 'FileUploadController@index')->name('files.index');
		//Route::get('file-upload', [FileUploadController::class, 'index'])->name('files.index');
		Route::post('file-upload/upload-large-files', 'FileUploadController@uploadLargeFiles')->name('files.upload.large');
		//Route::post('file-upload/upload-large-files', [FileUploadController::class, 'uploadLargeFiles'])->name('files.upload.large');
		
        Route::resource('ratings', 'RatingController')->only(['index', 'destroy']);
        Route::resource('reviews', 'ReviewController')->only(['index', 'destroy']);
        Route::resource('messages', 'MessageController')->only(['index', 'destroy']);
		
		Route::get('paymentsettings', 'AdminPaymentSettingsController@index')->name('paymentsettings');
		Route::post('paymentadd', 'AdminPaymentSettingsController@addpayment')->name('paymentsettings.add');
		
		
		Route::get('aboutus', 'AboutController@index')->name('aboutus');
		Route::post('aboutusadd', 'AboutController@addabout')->name('aboutus.add');
		
		Route::resource('sliders', 'HomeBannerController');
		Route::get('/sliders/{id}', 'HomeBannerController@destroy')->name('sliders.destroy');
		
		Route::resource('socials', 'HomeSocialController');
		Route::get('/socials/{id}', 'HomeSocialController@destroy')->name('socials.destroy');
		
		Route::resource('menus', 'HomeMenuController');
		Route::get('/menus/{id}', 'HomeMenuController@destroy')->name('menus.destroy');
		
		
		Route::get('logos', 'HomeLogoController@index')->name('logos');
		Route::post('logosadd', 'HomeLogoController@addlogos')->name('logos.add');
		
		//Route::resource('logos', 'HomeLogoController');
		//Route::get('/logos/{id}', 'HomeLogoController@destroy')->name('logos.destroy');
		
		
    });
});

Route::get('/masterkey', function () {
    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";
});