<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['namespace' => 'Api\Auth'],function(){
    /*
     * AUTHENTICATION PROCESSOR
     */
    /*------------------*/

    //SIGN UP USER
    Route::post('/add',['uses' => 'AuthenticationController@signUp']);

    //SIGN IN USER
    /*------------------*/
    Route::post('/login',['uses' => 'AuthenticationController@login']);

    //SIGN OUT MEMBER
    Route::get('/logout',['uses' => 'AuthenticationController@logout']);

    //GET Authenticated User
    Route::get('/me',['uses' => 'AuthenticationController@me']);
});

Route::group(['middleware' => 'auth:api-patient,api-doctor','namespace' => 'Api'],function(){

    /*------------------*/
    //Members Processing
    Route::get('/members',['uses' => 'MemberController@members']);
    Route::get('/mylist',['uses' => 'MemberController@myList']);

    //Toggle Attachment
    Route::get('/attach/{memberId}',['uses' => 'MemberController@toggleAttachment']);

    //View Questions and Answer
    Route::get('/inbox',['uses' => 'MemberController@inbox']);
    Route::get('/sent',['uses' => 'MemberController@sent']);

    //Respond and Ask Questions
    Route::post('/ask/{recipientId}/question/{recipientRole}','MemberController@submitQuestion');
    Route::post('/answer/{questionId}/question','MemberController@answerQuestion');

    //View BlackLists
    Route::get('/blacklist',['uses' => 'MemberController@getBlacklist']);

    //Add//Remove Blacklist
    Route::get('/blacklist/{memberId}/add','MemberController@storeBlacklist');
    Route::get('/blacklist/{memberId}/delete','MemberController@deleteBlacklist');
});

