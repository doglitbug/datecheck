@extends('layout')

@section('pageTitle', 'Search results')

@section('content')

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Search Results for {{ $query }} ( {{ $items->total() }} result(s) found )</h3>
	</div>
	<div class="panel-body">
		@if (count($items) > 0)
			@foreach($items as $item)
			<h4><a href="{{ route('items.show', ['item' => $item->id]) }}">{{ $item->name }}</a></h4>
			<ul class="list-group">
				<li class="list-group-item">Barcode: {{ $item->barcode }}</li>
				<li class="list-group-item">Category: {{ $item->category->name }}</li>
			</ul>
			@endforeach
		@else
			<div>No results found for {{ $query }}</div>
		@endif
	</div>
</div>

{{ $items->links() }}

@endsection