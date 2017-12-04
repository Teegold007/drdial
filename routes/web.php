<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('/login','Auth\LoginController@login');

Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register','Auth\RegisterController@register')->name('register');

Route::post('/logout','HomeController@doLogout')->name('user-logout');


Route::group(['middleware' => 'auth:doctor,patient'],function(){
    Route::get('/home', 'HomeController@index')->name('home');

    //Attach Members
    Route::get('/attach/{memberId}','HomeController@attachMember')->name('attach');

    //Questions Route
    Route::post('/ask/question/{recipientId}/{recipientRole}','HomeController@submitQuestion')->name('submit-question');
    Route::post('/answer/question/{questionId}','HomeController@answerQuestion')->name('answer-question');

    //BlackList Members
    Route::get('/blacklist/{userId}','HomeController@storeBlacklist')->name('store.blacklist');
    Route::get('/blacklist/{userId}/delete','HomeController@deleteBlacklist')->name('delete.blacklist');
});


/*************************************************
 *  ROUTE NAVIGATION FOR ADMINISTRATORS
 *************************************************/

Route::group(['namespace' => 'Admin'],function(){

    Route::group(['middleware'=>'auth:admin','prefix' => 'backend/'],function(){

        // Dashboard Route
        Route::get('dashboard', 'DashboardController@Dashboard')->name('dashboard');
        Route::get('backend-logout','DashboardController@doLogout')->name('backend.logout');

        // Administrators Route
        Route::resource('admin', 'AdminController',['only' => ['index','store']]);

       // Route::group(['middleware' => ['permission:Privilege-Configuration']],function(){
            // Roles Route
            Route::resource('role','RoleController',['except' => ['create','show','edit']]);

            //Permission Route
            Route::resource('permission', 'PermissionController',['except' => ['create','show','edit']]);
      //  });

    }); //Auth:admin Middleware Ends

    // AUTHENTICATION ROUTES
   Route::group(['namespace' =>'Auth'],function(){
       Route::get('backend-login', 'LoginController@showLoginForm')->name('backend.login');
       Route::post('backend-login','LoginController@doLogin');
   }); //Auth Namespace Ends Here

}); //Admin Namespace Ends Here
