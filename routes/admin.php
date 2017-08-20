<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 20-8-2017
 * Time: 23:13
 */


Route::get('/', ['as' => 'home', 'uses' => 'MainController@index']);
Route::post('/mass_add', 'MainController@massAdd');
Route::post('/add_cheat_sheet/{cat_id}', 'MainController@addCheatSheet');
Route::post('/add_group/{cheatsheet_id}', 'MainController@addGroup');


function resource($model, $controller)
{
    Route::get("/$model", "$controller@index")->name("$model.index");
    Route::get("/$model/create", "$controller@create")->name("$model.create");
    Route::post("/$model", "$controller@store")->name("$model.store");
    Route::get("/$model/{id}", "$controller@show")->name("$model.show");
    Route::get("/$model/{id}/edit", "$controller@edit")->name("$model.edit");
    Route::post("/$model/{id}/update", "$controller@update")->name("$model.update");
    Route::post("/$model/{id}/destroy", "$controller@destroy")->name("$model.destroy");
}

resource('cheat-sheets', 'CheatSheetsController');
resource('categories', 'CategoriesController');


Route::post('/logout', 'UsersController@logout')->name('logout');