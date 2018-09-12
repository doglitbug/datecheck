<!DOCTYPE html>
<html>
	<head>
		<title>All Items</title>
	</head>
	<body>
		<h1>All Items</h1>
		@foreach($items as $item)
		<h2><a href = "{{ route('items.show', ['item' => $item->id]) }}">Item {{ $item->id }}</a></h2>
		<ul>
			<li>Name: {{ $item->name }}</li>
			<li>Barcode: {{ $item->barcode }}</li>
			<li>Category: {{ $item->category->name }}</li>
		</ul>
		@endforeach
	</body>
</html>