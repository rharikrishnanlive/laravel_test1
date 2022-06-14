<?php

use Illuminate\Http\Request;

Route::get('events', 'Api\EventController@index');
Route::get('events/{id}', 'Api\EventController@show');
Route::post('events', 'Api\EventController@create');
Route::put('events/{id}', 'Api\EventController@update');
Route::patch('events/{id}', 'Api\EventController@update_only');
Route::delete('events/{id}', 'Api\EventController@destroy');
Route::get('active-events', 'Api\EventController@active_events');