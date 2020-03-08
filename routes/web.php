<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ClientsController@index')
    ->name('clients');

Route::get('/clients/add', 'ClientsController@create')
    ->name('clients.create');
