<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Auth::routes();

Route::group(['middleware'=>['guest']], function (){
    Route::get('/', function()
    {
        return view('auth.login');
    });
});

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){


    //==============================dashboard============================
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    //==============================Grades============================
    Route::group(['namespace'=>'Grades'],function (){
        Route::resource('Grades', 'GradeController');
    });

    //==============================Classrooms============================
    Route::group(['namespace'=>'Classrooms'],function (){
        Route::resource('Classrooms', 'ClassroomController');
        Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');
        Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');
    });

    //==============================Sections============================

    Route::group(['namespace' => 'Sections'], function () {

        Route::resource('Sections', 'SectionController');

        Route::get('/classes/{id}', 'SectionController@getclasses');

    });

        //==============================Sections============================

        Route::group(['namespace' => 'Online_Classes'], function () {

            Route::resource('Online_Classes', 'Online_ClassesController');
    
            Route::get('/Online_Classes/{id}', 'Online_ClassesController@getOnline_Classes');
    
        });

});










