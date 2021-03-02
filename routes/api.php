<?php

Route::apiResource('/question','App\Http\Controllers\QuestionController');
Route::apiResource('/category','App\Http\Controllers\CategoryController');
Route::apiResource('/question/{question}/reply','App\Http\Controllers\ReplyController');
Route::post('/like/{reply}','App\Http\Controllers\LikeController@likeIt');
Route::delete('/like/{reply}','App\Http\Controllers\LikeController@unLikeIt');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');

});