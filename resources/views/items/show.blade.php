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
			<li>
				<!-- Add new date -->
				<form action="/expiry/{{ $item->id }}" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<!-- Expiry date -->
						<label for="expiry-date" class="col-sm-3 control-label">New date</label>
						<div class="col-sm-6">
							<input type="text" name="expiry_date" id="expiry-date" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-6">
							<button type="submit" class="btn btn-default">
								<i class="fa fa-plus"></i>Add Date
							</button>
						</div>
					</div>
				</form>
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