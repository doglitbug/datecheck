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
			<li>Expiry dates:
				<ul>
					@foreach($item->expiry->sortBy('expiry_date') as $expiry)
					<li>{{ $expiry->expiry_date }}</li>
					@endforeach
				</ul>
			</li>
		</ul>
	</body>
</html>