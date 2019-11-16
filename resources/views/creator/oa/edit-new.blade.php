@extends('layouts.app')

@section('styles')
@endsection

@section('content')
	<div id="A" class="list-group">
		<div class="list-group-item">foo</div>
		<div class="list-group-item">bar</div>
		<div class="list-group-item">baz</div>
	</div>


	<div id="B" class="list-group">
		<div class="list-group-item">qux</div>
		<div class="list-group-item">quux</div>
	</div>
@endsection

@section('aside')
	@parent
	Index Oas
@endsection

@section('script')
	@parent
	<script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>

	{{-- SORTABLE --}}
	<script type="text/javascript">
		Sortable.create(A, {
			animation: 200,
			group: {
				name: "shared",
				pull: "clone",
				revertClone: true,
			},
			sort: true
		});

		Sortable.create(B, {
			group: "shared",
			sort: false
		});
	</script>
	
	
@endsection