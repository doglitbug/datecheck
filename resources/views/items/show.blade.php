<!DOCTYPE html>
<html>
	<head>
		<title>{{ $item->name }}</title>
	</head>
	<body>
		<h1>{{ $item->name }}</h1>
		<ul>
			<li>Barcode: {{ $item->barcode }}</li>
			<li>Category: {{ $item->category->name }}</li>
		</ul>
	</body>
</html>