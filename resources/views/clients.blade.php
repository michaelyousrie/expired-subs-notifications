@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md 10">
        <h1 class="title">Clients</h1>
    </div>

    <div class="col-md-2 mt-2">
        <a href="{{ route('clients.create') }}" class="btn btn-primary text-light"><i class="fa fa-plus"></i> Add Client</a>
    </div>
</div>
@if ($errors->any())
<hr>
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if(count($clients))
<table class="table">
    <thead>
        <th>#</th>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Join Date</th>
        <th>Sub End Date</th>
        <th>Bundle Name</th>
        <th>Status</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach($clients as $index => $client)
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{ $client->id }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->join_date->format('d-m-Y') }} <span class="critical">({{ $client->join_date->diffForHumans() }})</span></td>
                <td>{{ $client->sub_end_date->format('d-m-Y') }} <span class="critical">({{ $client->sub_end_date->diffForHumans() }})</span></td>
                <td>{{ $client->bundle_name }}</td>
                <td>
                    @if($client->hasExpired())
                        <span class="text-danger">Expired!</span>
                    @else
                        <span class="text-success">Healthy!</span>
                    @endif
                </td>
                <td>
                    @if($client->hasExpired())
                        <form action="#" method="post" class="form-inline">
                            @csrf
                            <button type="submit" class="btn btn-success" title="Notify User"><i class="fa fa-send"></i></button>
                        </form>

                        <form action="{{ route('clients.extend', ['client' => $client->id]) }}" method="post" class="form-inline">
                            @csrf
                            <button type="submit" class="btn btn-info" title="Extend Subscription by 1 year"><i class="fa fa-plus"></i></button>
                        </form>
                    @endif

                    <a href="{{ route('clients.edit', ['client' => $client->id]) }}" class="btn btn-primary" title="Edit User"><i class="fa fa-edit"></i></a>

                    <form class="form-inline" action="{{ route('clients.destroy', ['client' => $client->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" title="delete user"><i class="fa fa-remove"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
    <hr>
    <h3 class="text-center">No Clients yet <i class="fa fa-frown-o"></i></h3>
@endif
@endsection
