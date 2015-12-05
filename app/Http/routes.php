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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('splash');
});

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('login', 'UsersController@login');
Route::post('login', 'UsersController@postLogin');
Route::get('logout', 'UsersController@logout');
Route::get('profile', 'UsersController@profile');

if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database rws');
        DB::statement('CREATE database rws');

        return 'Dropped rws; created rws.';
    });

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

};
