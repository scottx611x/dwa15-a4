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

Route::get('/', 'MainController@index');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


///**
// * Display All XKCDPasswords
// */
//Route::get('/', function () {
//    //
//});

/**
 * Add A New XKCDPassword
 */
Route::get('/xkcdpassword', 'MainController@generatePassword');

/**
 * Delete An Existing Task
 */
Route::delete('/xkcdpassword/{id}', function ($id) {
    //
});