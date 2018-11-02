@extends('layout')

@section('pageTitle', $item->name)

@section('content')

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $item->name }}</h3>
	</div>
	<div class="panel-body">
		<ul class="list-group">
			<li class="list-group-item">Barcode: {{ $item->barcode }}</li>
			<li class="list-group-item">Category: {{ $item->category->name }}</li>
			<li class="list-group-item">Expiry dates:
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
			<li class="list-group-item">
			<!-- Add new date -->
			<form action="/expiry/{{ $item->id }}" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<!-- Expiry date -->
					<label for="expiry-date" class="control-label">New date</label>
					<input type="date" name="expiry_date" id="expiry-date" class="form-control">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default">
						<i class="fa fa-plus"></i>Add Date
					</button>
				</div>
			</form>
			</li>
		</ul>
	</div>
	<div class="panel-footer">
		<!-- Delete button -->
		<form action="/items/{{ $item->id }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}

			<button type="submit" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i>Delete</button>
	    </form>
	</div>
</div>
@endsection