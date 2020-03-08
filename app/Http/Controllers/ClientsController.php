<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        return view('clients');
    }

    public function create()
    {
        return view('add_client');
    }
}
