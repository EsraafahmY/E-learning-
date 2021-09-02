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


Route::get('/', function () {
    return view('login');
});
Route::resource('videos', "MediaController"); 


Route::get('/profile', function () {
    return view('profile');
});


Route::post('doLogin','userController@doLogin');
Route::get('LogOut','userController@logout');

Route::resource('User',"userController");

Route::resource('Track',"trackController");
Route::resource('Lesson',"lessonController");

Route::get('ShowLesson/{id}',"lessonController@show_lesson");

Route::resource('Exam',"questionController");

Route::resource('Role',"roleController");


