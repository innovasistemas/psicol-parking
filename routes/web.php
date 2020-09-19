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

Route::get('/', 'PsicolController@home');

Route::get('/spaces', 'PsicolController@spaces');

Route::get('/vehicles', 'PsicolController@vehicles');

Route::get('/new-vehicle', 'PsicolController@newvehicle');

Route::post('/new-vehicle', 'PsicolController@savevehicle');