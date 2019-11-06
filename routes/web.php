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
Route::get('/images/{filename}', function ($filename) {
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

Route::group(['prefix' => '/'], function () {
    Route::group(['middleware' => 'superadmin'], function () {
        //Start route siswa
        Route::get('siswa', 'SiswaController@index');
        Route::get('siswa/create', 'SiswaController@create');
        Route::post('siswa/store', 'SiswaController@store');
        Route::get('siswa/edit/{id}', 'SiswaController@edit');
        Route::post('siswa/update', 'SiswaController@update');
        Route::get('siswa/delete/{id}', 'SiswaController@destroy');
    });
    Route::group(['middleware' => 'superadmin'], function () {
        //Start route Blog
        Route::get('blog', 'BlogController@index');
        Route::get('blog/create', 'BlogController@create');
        Route::post('blog/store', 'BlogController@store');
        Route::get('blog/edit/{id}', 'BlogController@edit');
        Route::put('blog/{id}', 'BlogController@update');
        Route::get('blog/delete/{id}', 'BlogController@destroy');
    });
    Route::group(['middleware' => 'superadmin'], function () {
        //Start route karyawan
        Route::get('karyawan', 'KaryawanController@index');
        Route::get('karyawan/create', 'KaryawanController@create');
        Route::post('karyawan/store', 'KaryawanController@store');
        Route::get('karyawan/edit/{id}', 'KaryawanController@edit');
        Route::put('karyawan/{id}/', 'KaryawanController@update');
        Route::get('karyawan/delete/{id}', 'KaryawanController@destroy');
    });
    Route::group(['middleware' => 'superadmin'], function () {
        //Start route About
        Route::get('about', 'AboutController@index');
        Route::get('about/create', 'AboutController@create');
        Route::post('about/store', 'AboutController@store');
        Route::get('about/edit/{id}', 'AboutController@edit');
        Route::put('about/{id}/', 'AboutController@update');
        Route::get('about/delete/{id}', 'AboutController@destroy');
    });
    Route::group(['middleware' => 'superadmin'], function () {
        //Start route About
        Route::get('visimisi', 'VisimisiController@index');
        Route::get('visimisi/create', 'VisimisiController@create');
        Route::post('visimisi/store', 'VisimisiController@store');
        Route::get('visimisi/edit/{id}', 'VisimisiController@edit');
        Route::put('visimisi/{id}/', 'VisimisiController@update');
        Route::get('visimisi/delete/{id}', 'VisimisiController@destroy');
    });
    Route::group(['middleware' => 'superadmin'], function () {
        //Start route Kategori
        Route::get('kategori', 'KategoriController@index');
        Route::get('kategori/create', 'KategoriController@create');
        Route::post('kategori/store', 'KategoriController@store');
        Route::get('kategori/edit/{id}', 'KategoriController@edit');
        Route::put('kategori/{id}/', 'KategoriController@update');
        Route::get('kategori/delete/{id}', 'KategoriController@destroy');
    });
    Route::group(['middleware' => 'superadmin'], function () {
        //Start route Gudang
        Route::get('gudang', 'GudangController@index');
        Route::get('gudang/create', 'GudangController@create');
        Route::post('gudang/store', 'GudangController@store');
        Route::get('gudang/edit/{id}', 'GudangController@edit');
        Route::put('gudang/{id}/', 'GudangController@update');
        Route::get('gudang/delete/{id}', 'GudangController@destroy');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
