<?php

Route::get('/', function () {
   return view('welcome');
});

// Users
Route::get('/usuarios', 'UserController@index')
    ->name('users.index');

Route::get('/usuarios/{user}', 'UserController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');

Route::get('/usuarios/nuevo', 'UserController@create')->name('users.create');

Route::post('/usuarios', 'UserController@store');

Route::get('/usuarios/{user}/editar', 'UserController@edit')->name('users.edit');

Route::put('/usuarios/{user}', 'UserController@update');

Route::get('/usuarios/papelera', 'UserController@trashed')->name('users.trashed');

Route::patch('/usuarios/{user}/papelera', 'UserController@trash')->name('users.trash');

Route::delete('/usuarios/{id}', 'UserController@destroy')->name('users.destroy');

// Profile
Route::get('/editar-perfil/', 'ProfileController@edit');

Route::put('/editar-perfil/', 'ProfileController@update');

// Professions
Route::get('/cargos/', 'CargoController@index');

Route::delete('/cargos/{cargo}', 'CargoController@destroy');

// Skills
Route::get('/habilidades/', 'SkillController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
