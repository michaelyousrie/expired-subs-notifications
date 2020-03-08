<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return view('clients', compact('clients'));
    }

    public function create()
    {
        return view('add_client');
    }
}
