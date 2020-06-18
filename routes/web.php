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

Route::get('/', 'HomepageController@displayHomepage');

Route::get('/poli', 'HomepageController@displayHomepage');

Route::get('/ourProducts', 'ProductController@displayProducts');

Route::get('/FabPage', 'FabPageController@displayFabPage');
Route::post('/FabPage', 'FabPageController@receiveData');

Route::get('/contact', 'PagesController@contact');
Route::get('/conditions','PagesController@conditions');
Route::get('/politique','PagesController@politique');
Route::get('/welcome','PagesController@welcome');




Route::get('/apropos','PagesController@apropos');

//Route::get('/accueil','PagesController@accueil');
