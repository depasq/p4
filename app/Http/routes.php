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

#General Views available to all users
Route::get('/', function () {
    return view('general.splash');
});
Route::get('/welcome', function () {
    return view('general.welcome');
});
Route::get('/contact', function () {
    return view('general.contact');
});
Route::get('/about', function () {
    return view('general.about');
});

# Show login form
Route::get('/login', 'Auth\AuthController@getLogin');
# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');
# Process logout
Route::get('/logout', 'Auth\AuthController@getLogout');
# Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');
# Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');

# Restrict these routes to logged in users
Route::group(['middleware' => 'auth'], function() {
    # Show Profile form
    Route::get('/profile', 'UsersController@getProfile');
    # Process Profile Form
    Route::post('/profile', 'UsersController@postProfile');
    # Show Travel Form
    Route::get('/travel', 'UsersController@getTravel');
    # Process Travel Form
    Route::post('/travel', 'UsersController@postTravel');
});

if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database rws');
        DB::statement('CREATE database rws');

        return 'Dropped rws; created rws.';
    });

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

};
