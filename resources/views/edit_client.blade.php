@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md 10">
        <h1 class="title">Update Client #{{ $client->id }}</h1>
    </div>

    <div class="col-md-2 mt-2">
        <a href="{{ route('clients') }}" class="btn btn-success text-light"><i class="fa fa-arrow-left"></i> All Clients</a>
    </div>
</div>
<hr>

<form class="form" action="{{ route('clients.patch', ['client' => $client->id]) }}" method="post">
    @csrf
    @method('patch')

    <div class="form-group">
        <label for="name">Client Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $client->name }}" required>
    </div>

    <div class="form-group">
        <label for="join_date">Join Date</label>
        <input type="date" name="join_date" id="join_date" class="form-control" value="{{ $client->join_date->format('Y-m-d') }}" required>
    </div>

    <div class="form-group">
        <label for="sub_end_date">Sub End Date</label>
        <input type="date" name="sub_end_date" id="sub_end_date" class="form-control" value="{{ $client->sub_end_date->format('Y-m-d') }}" required>
    </div>

    <div class="form-group">
        <label for="bundle_name">Bundle Name</label>
        <input type="text" name="bundle_name" id="bundle_name" class="form-control" value="{{ $client->bundle_name }}" required>
    </div>
    <br>
    <button type="submit" class="btn btn-block btn-primary">Update Client</button>

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
</form>
@endsection
