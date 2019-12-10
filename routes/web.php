<?php

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

Route::any('/Admin',"AdminController@returnHome")->middleware("CheckAdmin");

Route::any('/',"MainController@HomePage");

Route::any('/Course',"MainController@CoursePage");
Route::any('/Events',"MainController@EventsPage");
Route::any('/Gallery',"MainController@GalleryPage");
Route::any('/Contact',"MainController@ContactPage");


Route::any('/test',"MainController@test");
Route::get('/Login',"AuthController@LoginPage");
Route::post('/Login',"AuthController@Authenticate");
Route::any('/Logout',"AuthController@Logout");


Route::get('/Register',"AuthController@RegisterPage");
Route::any('/Profile',"AuthController@ProfilePage");

