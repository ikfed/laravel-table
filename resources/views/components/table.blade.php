<form method="get">
	<div class="card r-list">
		<div class="card-header text-dark bg-light p-3">
			@if(isset($cardHeader))
				{{ $cardHeader }}
			@endif
		</div>
		<div class="card-body p-0">
			<table class="table table-bordered table-hover table-striped mb-0">
				@include('table::components.head')
				<tbody>
					@foreach($table->records as $record)
						<tr data-id="{{ $record->id }}">
							@foreach($table->columns() as $column)
								<td class="{{ $column->getClasses() }}">
									@isset(${'tableCell' . $column->name})
										@php
											$ref = new \ReflectionFunction(${'tableCell' . $column->name});
										@endphp
										{{ ${'tableCell' . $column->name}($record) }}
									@else
										{{ $record->{$column->name} }}
									@endisset
								</td>
							@endforeach
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="card-footer">
			@if(isset($cardHeader))
				{{ $cardFooter }}
			@endif
		</div>
	</div>
</form>
