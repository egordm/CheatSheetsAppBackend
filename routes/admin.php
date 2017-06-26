<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', 'MainController@index');
$app->post('/mass_add', 'MainController@massAdd');
$app->post('/add_cheat_sheet/{cat_id}', 'MainController@addCheatSheet');
$app->post('/add_group/{cheatsheet_id}', 'MainController@addGroup');