<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'ClientsController@index')
    ->name('clients');
