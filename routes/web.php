<?php

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Tweet;

Route::get('/', 'twitterController@index');
Route::post('/', 'twitterController@store');
Route::get('/tweets/{id}/delete', 'twitterController@destroy');

Route::get('/tweets/{id}', 'twitterController@view');
Route::get('/tweets/{id}/edit', 'twitterController@edit');
Route::post('/tweets/{id}/edit', 'twitterController@update');