@extends('layout')

@section('pageTitle', 'All Items')

@section('content')

@foreach($items as $item)
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><a href="{{ route('items.show', ['item' => $item->id]) }}">{{ $item->name }}</a></h3>
		</div>
		<div class="panel-body">
			<ul class="list-group">
				<li class="list-group-item">Barcode: {{ $item->barcode }}</li>
				<li class="list-group-item">Category: {{ $item->category->name }}</li>
			</ul>
		</div>
	</div>
@endforeach

@endsection