<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'dashboard'], function(){
    Route::get('society-admin', function () { return view('dashboard.society_admin_dashboard'); })->middleware('auth');
    Route::get('member', function () { return view('dashboard.member_dashboard'); })->middleware('auth');
    Route::get('visitor', function () { return view('dashboard.visitor_dashboard'); })->middleware('auth');
});

Route::group(['prefix' => 'lists'], function(){
    Route::get('member-list', 'MembersController@index')->middleware('auth');
    Route::get('visitor-list', 'VisitorRegularController@index')->middleware('auth');
});

Route::group(['prefix' => 'forms'], function(){

    
    Route::get('visitor-register', 'VisitorRegularController@create')->middleware('auth');
    Route::post('visitor-register', 'VisitorRegularController@store');

    Route::get('society-register','SocietyController@create');
    Route::post('society-register','SocietyController@store');

    Route::get('member-approve', function () { return view('forms.members_approve'); });
});

Route::group(['prefix' => 'entry-dashboard'], function(){

    Route::get('entry','EntryController@entry')->middleware('auth');
    Route::post('entry','EntryController@index');
    
    Route::get('entry-allowed','EntryController@entryAllowedCreate');
    Route::post('entry-allowed','EntryController@entryAllowed');

    Route::get('register','IrregularVisitorLogController@create')->middleware('auth');
    Route::post('register','IrregularVisitorLogController@store');
    
});

