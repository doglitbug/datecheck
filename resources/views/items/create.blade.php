@extends('layout')

@section('pageTitle', 'Add new item')

@section('content')

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Add new item</h3>
	</div>
	<div class="panel-body">
		<form action="/items" method="POST" class="form-horizontal">
		{{ csrf_field() }}
		<div class="form-group">
			<!-- Item name -->
			<label for="item-name" class="col-sm-3 control-label">Name</label>
			<div class="col-sm-6">
				<input type="text" name="name" value="{{old('name')}}" id="item-name" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<!-- Item barcode -->			
			<label for="item-barcode" class="col-sm-3 control-label">Barcode</label>
			<div class="col-sm-6">
				<input type="text" name="barcode" value ="{{old('barcode')}}" id="item-barcode" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<!-- Item category -->
			<label for="item-category" class="col-sm-3 control-label">Category</label>
			<div class="col-sm-6">
				<select id="item-category" name="category_id" class="form-control">
					<option value="" disabled hidden>Choose here</option>
					@foreach($categories as $category)
					<option value="{{ $category->id }}"
						@if(old('category_id')==$category->id) {{ 'selected' }} @endif
						>{{ $category->name }}</option>
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
</div>
@endsection