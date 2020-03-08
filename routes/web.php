<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ClientsController@index')
    ->name('clients');

Route::get('/clients/add', 'ClientsController@create')
    ->name('clients.create');

Route::get('/clients/{client}', 'ClientsController@edit')
    ->name('clients.edit');

Route::post('/clients', 'ClientsController@store')
    ->name('clients.store');

Route::patch('/clients/{client}', 'ClientsController@patch')
    ->name('clients.patch');
