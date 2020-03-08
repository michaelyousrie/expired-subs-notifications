<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\CreateClientRequest;

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

    public function store(CreateClientRequest $request)
    {
        Client::create($request->only('name', 'join_date', 'sub_end_date', 'bundle_name'));

        return redirect()->route('clients')->with('success', true);
    }
}
