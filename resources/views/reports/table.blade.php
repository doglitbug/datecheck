<table class="table table-bordered table-bordered table-condensed">
	<thead>
		<tr>
			<th>&nbsp;</th>
			<!-- Date headers -->
			@for($date = clone $start; $date<=$end; $date->addDay())
				<th>{{ $date->format('d/m') }}</th>
			@endfor
		</tr>
	</thead>
	<tbody>
		@foreach($items as $item)
			<tr>
				<td>{{ $item->name }}</td>
				@for($date = clone $start; $date<=$end; $date->addDay())
					<td>
						@if ($item->expiry->contains('expiry_date', $date->format('Y-m-d')))
							X
						@endif
					</td>
				@endfor
			</tr>
		@endforeach
	</tbody>
</table>