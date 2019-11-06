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
Route::get('/images/{filename}', function ($filename)
{
    $path = storage_path('images') . '/' . $filename;
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file);
    $response->header("Content-Type", $type);
    return $response;
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => '/'] , function(){
    Route::group(['middleware' => 'superadmin'], function(){
        //Start route siswa
        Route::get('siswa', 'SiswaController@index');
        Route::get('siswa/create', 'SiswaController@create');
        Route::post('siswa/store', 'SiswaController@store');
        Route::get('siswa/edit/{id}', 'SiswaController@edit');
        Route::post('siswa/update', 'SiswaController@update');
        Route::get('siswa/delete/{id}', 'SiswaController@destroy');
    });
    Route::group(['middleware' => 'superadmin'], function(){
        //Start route Blog
        Route::get('blog', 'BlogController@index');
        Route::get('blog/create', 'BlogController@create');
        Route::post('blog/store', 'BlogController@store');
        Route::get('blog/edit/{id}', 'BlogController@edit');
        Route::post('blog/update', 'BlogController@update');
        Route::get('blog/delete/{id}', 'BlogController@destroy');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
