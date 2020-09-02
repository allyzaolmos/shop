<?php

// use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'PagesController@index');
Route::get('/trackorder', 'PagesController@trackorder');

Route::get('/signup', 'PagesController@signup');
Route::post('/user/create', 'UsersController@create');


Route::get('/login', 'PagesController@login');
Route::get('/logindetails', 'LoginController@details');
Route::post('/validatelogin', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');