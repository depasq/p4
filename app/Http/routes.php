<?php
use PeerReview\User;

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

// Admin routes
Route::group(['middleware' => ['auth','role:admin']], function () {
    # Admin profile form
    Route::get('/admin', 'AdminController@getAdmin');
    Route::post('/admin', 'AdminController@postAdmin');
    # Admin dashboard for making reviewer edits or creating/deleting accounts
    Route::get('/dashboard', 'AdminController@getDashboard');
    Route::post('/dashboard', 'AdminController@postDashboard');
    Route::post('/dashboard-edit', 'AdminController@postDashboardEdit');
    Route::post('/dashboard-travel', 'AdminController@postDashboardTravel');
    Route::get('/create-user', 'AdminController@getCreateUser');
    Route::post('/create', 'AdminController@postCreateUser');
    Route::get('/confirm-delete/{id?}', 'AdminController@getConfirmDelete');
    Route::get('/delete/{id?}', 'AdminController@getDoDelete');
});

# Restrict these routes to logged in, standard users
Route::group(['middleware' => ['auth','role:standard']], function () {
    Route::get('/profile', 'UsersController@getProfile');
    Route::post('/profile', 'UsersController@postProfile');
    Route::get('/travel', 'UsersController@getTravel');
    Route::post('/travel', 'UsersController@postTravel');
});


if (App::environment('local')) {
    Route::get('/drop', function () {

        DB::statement('DROP database rws');
        DB::statement('CREATE database rws');

        return 'Dropped rws; created rws.';
    });

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
};
