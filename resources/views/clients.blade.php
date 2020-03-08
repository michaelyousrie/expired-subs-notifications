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
        <th>Name</th>
        <th>Join Date</th>
        <th>Sub End Date</th>
        <th>Bundle Name</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @for($i=1; $i<=10; $i++)
            <tr>
                <td>1</td>
                <td>Michael</td>
                <td>Today</td>
                <td>In A Year</td>
                <td>Premium 1</td>
                <td>
                    <button class="btn btn-success" title="Notify User"><i class="fa fa-send"></i></button>
                    <button class="btn btn-danger" title="delete user"><i class="fa fa-remove"></i></button>
                </td>
            </tr>
        @endfor
    </tbody>
</table>
@endsection
