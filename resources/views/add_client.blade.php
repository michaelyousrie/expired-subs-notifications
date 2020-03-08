@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md 10">
            <h1 class="title">Create Client</h1>
        </div>
        
        <div class="col-md-2 mt-2">
            <a href="{{ route('clients') }}" class="btn btn-primary text-light"><i class="fa fa-arrow-left"></i> All Clients</a>
        </div>
    </div>
    <hr>
    
    <form class="form" action="{{ route('clients.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Client Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="email">Client Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="join_date">Join Date</label>
            <input type="date" name="join_date" id="join_date" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="sub_end_date">Sub End Date</label>
            <input type="date" name="sub_end_date" id="sub_end_date" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="bundle_name">Bundle Name</label>
            <input type="text" name="bundle_name" id="bundle_name" class="form-control" required>
        </div>
        <br>
        <button type="submit" class="btn btn-block btn-success">Create Client</button>
        
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
</div>
@endsection
