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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/email/verify/{token}', ['as' => 'email.verify', 'uses' => 'EmailController@verify']);
Route::get('/test', function () {
    return view('testEditor');
});
Route::resource('questions', 'QuestionController');

Route::post('question/{question}/answer','AnswersController@store');
//Route::get('question/{question}/follow','QuestionFollowController@follow')->middleware('auth')->name('question.follow');
//Route::get('question/{question}/unfollow','QuestionFollowController@unfollow')->middleware('auth')->name('question.unfollow');
