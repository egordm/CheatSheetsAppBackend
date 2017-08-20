<?php

Route::get('/', 'MainController@index');
Route::get('/cheatsheet/{id}', 'MainController@cheatsheet');
Route::get('/pdf/{id}', 'MainController@pdf');