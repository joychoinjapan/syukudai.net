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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/topics', 'QuestionController@topic')->middleware('api');

//質問をフォローしているかを返す
Route::post('/question/follower', 'QuestionFollowController@isFollowed')->middleware('api');

Route::post('/question/follow','QuestionFollowController@follow')->middleware('api');
Route::post('/question/unfollow','QuestionFollowController@unfollow')->middleware('api');

Route::post('/user/follower','FollowerController@info')->middleware('api');

//該当ユーザーはターゲットユザーをフォローしているか
Route::get('/user/isfollowed/{followed_id}','FollowerController@followed')->middleware('api');

//該当ユーザーをフォローする
Route::post('/user/follow','FollowerController@follow')->middleware('api');



//アンサーの賛成数
Route::get('/answer/{id}/favor','VoteController@favor')->middleware('api');
//アンサーに賛成済？
Route::get('/answer/{id}/voted','VoteController@voted')->middleware('api');
//アンサーを賛成する・賛成の取り消し
Route::post('/answer/vote','VoteController@vote')->middleware('api');

//メッセージを送る
Route::post('/message/store','MessageController@store')->middleware('api');

//メッセージリスト生成
Route::post('/message/list','MessageController@index')->middleware('api');

//回答のコメントリストを生成
Route::get('/answer/{id}/comments','CommentController@answers');
//質問のコメントリストを生成
Route::get('/question/{id}/comments','CommentController@questions');

//コメントを送信
Route::post('comment','CommentController@store')->middleware('api');

