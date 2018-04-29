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

Route::get('/', 'HomeController@index');
Route::get('/edit', 'HomeController@edit');
Route::put('/edit', 'HomeController@update');

Auth::routes();

<<<<<<< HEAD
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index');

Route::get('/subs', 'SubordinateController@index');
Route::get('/subs/{user}', 'SubordinateController@show')->where('user', '[0-9]+');
Route::post('/subs/{user}', 'SubordinateController@store')->where('user', '[0-9]+');
Route::put('/subs/{user}', 'SubordinateController@update')->where('user', '[0-9]+');
=======
//get file from storage
Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('/admin', 'AdminsController@index')->name('admin');

// Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> 4144c1524488c2b2a50765223be2fdfa5daf930a
