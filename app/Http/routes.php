<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::resource('/', 'IndexController',['only'=>['index'],
                                        'name'=>['index'=>'home']
]);
Route::resource('portpholios','PortfolioController',['parametrs'=> ['portpholios'=>'alias']]);
Route::resource('msposts','MspostController',['parametrs'=> ['msposts'=>'alias']]);
Route::get('msposts/cat/{cat_alias?}',['uses'=>'MspostController@index','as'=>'mspostsCat']);


Route::resource('comment', 'CommentController',['only'=>['store']]);