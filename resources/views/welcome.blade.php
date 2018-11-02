@extends('layout')

@section('pageTitle', 'Welcome')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Stats</h3>
        </div>
        <div class="panel-body">
            <ul class="list-group">
                <li class="list-group-item">Total Items: {{ App\Item::all()->count() }}</li>
                <li class="list-group-item">Total Categories: {{ App\Category::all()->count() }}</li>
                <li class="list-group-item">Total Expiry Dates recorded: {{ App\Expiry::all()->count() }}</li>
            </ul>
        </div>
    </div>

@endsection