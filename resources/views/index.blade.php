@extends('layouts.shs')
@section('title', 'Vote')
@section('content')
<div class="container">
	@if(!empty($error))
		@component('snippets/alert', ['type' => 'danger'])
		{{ $error }}
	
		@endcomponent
	@endif
  @component('snippets/candidate', ['positions' => $positions])

  @endcomponent
</div>
@endsection
