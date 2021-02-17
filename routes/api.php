<?php

Route::apiResource('/question','App\Http\Controllers\QuestionController');
Route::apiResource('/category','App\Http\Controllers\CategoryController');
Route::apiResource('/question/{question}/reply','App\Http\Controllers\ReplyController');