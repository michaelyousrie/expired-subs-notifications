<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Support\MessageBag;

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

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients');
    }

    public function extendSubscription(Client $client, MessageBag $errors)
    {
        if (!$client->hasExpired()) {
            $errors->add('client_not_expired', 'This client has not expired yet!');

            return redirect()->back()->withErrors($errors);
        }

        $client->extendSubscription();

        return redirect()->back();
    }
}
