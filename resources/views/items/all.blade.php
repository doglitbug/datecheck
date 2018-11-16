@extends('layout')

@section('pageTitle', 'All Items')

@section('content')


<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">All Items</h3>
	</div>
	<div class="panel-body">
		@foreach($items as $item)
		<h4><a href="{{ route('items.show', ['item' => $item->id]) }}">{{ $item->name }}</a></h4>
		<ul class="list-group">
			<li class="list-group-item">Barcode: {{ $item->barcode }}</li>
			<li class="list-group-item">Category: {{ $item->category->name }}</li>
		</ul>
		@endforeach
	</div>
</div>

{{ $items->links() }}

@endsection