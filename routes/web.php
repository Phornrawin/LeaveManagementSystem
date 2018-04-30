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

Route::get('/summary/{year?}', 'SummaryController@year')->where('year', '[0-9]+');
Route::get('/summary/{year}/{month}', 'SummaryController@month')->where(['year' => '[0-9]+', 'month' => '[1-9]|0[1-9]|1[0-2]']);
Route::get('/summary/{year}/{month}/{day}', 'SummaryController@day')->where(['year' => '[0-9]+', 'month' => '[1-9]|0[1-9]|1[0-2]', 'day'=>'[1-2][0-9]|0[0-9]|3[0-1]|[0-9]']);

Auth::routes();

Route::get('/subs', 'SubordinateController@index');
Route::get('/subs/{user}', 'SubordinateController@show')->where('user', '[0-9]+');
Route::post('/subs/{user}', 'SubordinateController@store')->where('user', '[0-9]+');
Route::put('/subs/{user}', 'SubordinateController@update')->where('user', '[0-9]+');
Route::get('/subs/assign', 'SubordinateController@create');
Route::post('/subs/assign', 'SubordinateController@assignTask');

Route::get('/substitutions', 'SubstitutionsController@index');
Route::get('/substitutions/{leave}', 'SubstitutionsController@show')->where('leave', '[0-9]+');
Route::put('/substitutions', 'SubordinateController@update');


//get file from storage
//this should be at bottom of the file


Route::get('/admin', 'Admins\AdminsController@index');
Route::get('/admin/departments/view', 'Admins\Departments\DepartmentsController@index');
Route::post('/admin/departments/view', 'Admins\Departments\DepartmentsController@store');
Route::get('/admin/departments/{department}/edit', 'Admins\Departments\DepartmentsController@edit');
Route::put('/admin/departments/{department}', 'Admins\Departments\DepartmentsController@update');
Route::delete('/admin/departments/{department}', 'Admins\Departments\DepartmentsController@destroy');

Route::get('/admin/users/view', 'Admins\Users\UsersController@index');
Route::get('/admin/users/{user}/edit', 'Admins\Users\UsersController@edit');
Route::get('/admin/users/create','Admins\Users\UsersController@create');
Route::post('/admin/users/create', 'Admins\Users\UsersController@store');
Route::put('/admin/users/{user}', 'Admins\Users\UsersController@update');
Route::delete('/admin/users/{user}', 'Admins\Users\UsersController@destroy');




Route::get('/home', 'HomeController@index')->name('home');

//request 

Route::get('/requests/','RequestsController@index');
Route::get('/requests/{id}','RequestsController@show');
Route::get('/requests/{id}/approved','RequestsController@approved');
Route::get('/requests/{id}/rejected','RequestsController@rejected');
Route::get('/myrequests','MyRequestsController@index');
Route::get('/myrequests/{id}/cancel','MyRequestsController@update');



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




Route::get('/home', 'HomeController@index')->name('home');

//request
Route::get('/requests','RequestsController@index');
Route::get('/myrequests','MyRequestsController@index');
Route::get('/myrequests/{id}/cancel','MyRequestsController@update');

