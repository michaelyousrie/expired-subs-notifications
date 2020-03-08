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

<table class="table">
    <thead>
        <th>#</th>
        <th>ID</th>
        <th>Name</th>
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
                        <button class="btn btn-success" title="Notify User"><i class="fa fa-send"></i></button>
                    @endif
                    <button class="btn btn-danger" title="delete user"><i class="fa fa-remove"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
