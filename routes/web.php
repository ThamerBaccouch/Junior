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

Route::any('/Admin',"AdminController@dashboard")->middleware("CheckAdmin");
Route::get('/Tests',"AdminController@tests")->middleware("CheckAdmin");

Route::any('/EditTest/{id}',"AdminController@editTest")->middleware("CheckAdmin");
Route::any('/DeleteTest/{id}',"AdminController@DeleteTest")->middleware("CheckAdmin");
Route::any('/AddTest',"AdminController@AddTest")->middleware("CheckAdmin");

Route::any('/AddQuestion/{id}',"AdminController@AddQuestion")->middleware("CheckAdmin");
Route::any('/DeleteQuestion/{id_test}/{id_question}',"AdminController@DeleteQuestion")->middleware("CheckAdmin");
Route::any('/EditQuestion/{id_test}/{id_question}',"AdminController@EditQuestion")->middleware("CheckAdmin");

Route::any('/Courses',"AdminController@courses")->middleware("CheckAdmin");
Route::any('/DeleteCourse/{id}',"AdminController@DeleteCourse")->middleware("CheckAdmin");





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



