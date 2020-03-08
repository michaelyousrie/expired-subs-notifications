<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;

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

    public function edit(Client $client)
    {
        return view('edit_client', compact('client'));
    }

    public function patch(Client $client, UpdateClientRequest $request)
    {
        $client->update($request->only('name', 'join_date', 'sub_end_date', 'bundle_name'));

        return redirect()->route('clients');
    }
}
