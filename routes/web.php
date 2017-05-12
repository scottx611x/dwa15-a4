<?php
/**
 * Created by PhpStorm.
 * User: scott
 * Date: 5/11/17
 * Time: 7:40 PM
 */

Auth::routes();

Route::get('/home', 'HomeController@index');