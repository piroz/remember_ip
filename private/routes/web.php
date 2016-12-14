<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/entry/RkTDuL3rCZ9wcSggFNMZFhB3h3jYZLDt', function () {
    return view('entry');
});
Route::post('/entry/RkTDuL3rCZ9wcSggFNMZFhB3h3jYZLDt', 'EntryController@entry');