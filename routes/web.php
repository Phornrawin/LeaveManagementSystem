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

Route::get('/subs', 'SubordinateController@index');
Route::get('/subs/{user}', 'SubordinateController@show')->where('user', '[0-9]+');
Route::post('/subs/{user}', 'SubordinateController@store')->where('user', '[0-9]+');
Route::put('/subs/{user}', 'SubordinateController@update')->where('user', '[0-9]+');
Route::get('/subs/assign', 'SubordinateController@create');
Route::post('/subs/assign', 'SubordinateController@assignTask');
//get file from storage
//this should be at bottom of the file
Route::get('{folder}/{filename}', function ($folder, $filename)
{
    $path = storage_path('app/public/'.$folder.'/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
