@extends('layout')

@section('pageTitle', $item->name)

@section('content')

<div class="panel-body">
	<h1>{{ $item->name }}</h1>
	<ul>
		<li>Barcode: {{ $item->barcode }}</li>
		<li>Category: {{ $item->category->name }}</li>
		<li>Expiry dates:
			<ul>
				@foreach($item->expiry->sortBy('expiry_date') as $expiry)
				<li>
					<!-- Delete button -->
					<form action="/expiry/{{ $expiry->id }}" method="POST">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					{{ $expiry->expiry_date }}
        			<button type="submit" class="btn btn-danger">
						<i class="fa fa-btn fa-trash"></i></button>
    				</form>
				</li>
				@endforeach
			</ul>
		</li>
	</ul>
	<!-- Delete button -->
	<form action="/items/{{ $item->id }}" method="POST">
		{{ csrf_field() }}
		{{ method_field('DELETE') }}

        <button type="submit" class="btn btn-danger">
			<i class="fa fa-btn fa-trash"></i>Delete</button>
    </form>
</div>
@endsection