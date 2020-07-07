<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomepageController@displayHomepage');

Route::get('/poli', 'HomepageController@displayHomepage');

Route::get('/boutique','ProductController@displayProducts');
Route::post('/boutique','ProductController@orderManagement');

Route::get('/FabPage', 'FabPageController@displayFabPage');
Route::post('/FabPage', 'FabPageController@receiveData');

Route::get('/inscription', 'HomepageController@inscription');
Route::get('/contact', 'PagesController@contact');
Route::get('/conditions','PagesController@conditions');
Route::get('/politique','PagesController@politique');
Route::get('/welcome','PagesController@welcome');
Route::get('/commande','PagesController@commande');
Route::get('/Admin','administrateurController@admin');

Route::get('/register', 'RegistrationController@create');
Route::post('register', 'RegistrationController@store');

Route::get('/myProfile', 'ProfileController@display');
Route::post('/myProfile', 'ProfileController@received');
Route::get('/profileModifications', 'ProfileController@modifications');
Route::post('/profileModifications', 'ProfileController@modifying');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::get('sendmail','sendmail@__construct');

Route::get('/apropos','PagesController@apropos');

Route::get('/messages','MessagesController@display');

Route::post('/layoutForm', 'layoutFormController@receiveData');

//Route::get('/accueil','PagesController@accueil');
