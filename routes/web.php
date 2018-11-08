<?php


//This page is the main front page
Route::get('/', 'FoodController@index'); # <-- NEW 1 of 2

Route::get('/food/search', 'FoodController@search'); # <-- NEW 1 of 2
Route::get('/food/search-process', 'FoodController@searchProcess'); # <-- NEW 2 of 2
Route::get('/food/{title}', 'FoodController@search');