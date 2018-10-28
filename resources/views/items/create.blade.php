@extends('layout')

@section('pageTitle', 'Add new item')

@section('content')

<div class="panel-body">
	<h1>Add new item</h1>
	<form action="/items" method="POST" class="form-horizontal">
		{{ csrf_field() }}
		<div class="form-group">
			<!-- Item name -->
			<label for="item-name" class="col-sm-3 control-label">Name</label>
			<div class="col-sm-6">
				<input type="text" name="name" id="item-name" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<!-- Item barcode -->			
			<label for="item-barcode" class="col-sm-3 control-label">Barcode</label>
			<div class="col-sm-6">
				<input type="text" name="barcode" id="item-barcode" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<!-- Item category -->
			<label for="item-category" class="col-sm-3 control-label">Category</label>
			<div class="col-sm-6">
				<select id="item-category" name="category" class="form-control">
					<option value="" selected disabled hidden>Choose here</option>
					@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-6">
				<button type="submit" class="btn btn-default">
					<i class="fa fa-plus"></i>Add Item
				</button>
			</div>
		</div>
	</form>

</div>
@endsection