<!DOCTYPE html>
<html>
	<head>
		<title>All Items</title>
	</head>
	<body>
		<h1>All Items</h1>
		@foreach($items as $item)
		<h2>Item {{ $item->id }}</h1>
		<ul>
			<li>Name: {{ $item->name }}</li>
			<li>Barcode: {{ $item->barcode }}</li>
		</ul>
		@endforeach
	</body>
</html>