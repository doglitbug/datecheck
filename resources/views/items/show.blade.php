<!DOCTYPE html>
<html>
	<head>
		<title>Item {{ $item->id }}</title>
	</head>
	<body>
		<h1>Item {{ $item->id }}</h1>
		<ul>
			<li>Name: {{ $item->name }}</li>
			<li>Barcode: {{ $item->barcode }}</li>
		</ul>
	</body>
</html>