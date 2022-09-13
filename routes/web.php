<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return "Hôm nay là thứ 3";
// });

Route::get('/','DashboardController@index');
Route::get('trangchu', function () {
    return "Hôm nay là thứ 3";
});
Route::resource('/admin/post', 'PostController');
