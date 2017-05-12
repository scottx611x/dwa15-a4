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

use App\XKCDPassword;
use Illuminate\Http\Request;

Auth::routes();

Route::get('/', function () {
        return redirect('/home');
    }
);

Route::get('/home', 'HomeController@index');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

/**
 * Display all XKCDPasswords
 */
Route::get('/xkcdpasswords', 'XkcdPasswordController@show');

/**
 * Main password creation
 */
Route::get('/xkcdpassword', 'XkcdPasswordController@main');

/**
 * Generate/Validate xkcd password
 */
Route::get('/new-xkcdpassword', 'XkcdPasswordController@create');

/**
 * Delete a XKCDPassword
 */
Route::delete('/xkcdpassword/{xkcdpassword}', 'XkcdPasswordController@destroy');

/**
 * Display a single XKCDPassword
 */
Route::get('/xkcdpassword/{xkcdpassword}', 'XkcdPasswordController@show_one');

/**
 * Update a single XKCDPassword
 */
Route::put('/xkcdpassword/{xkcdpassword}', 'XkcdPasswordController@update');