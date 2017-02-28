@extends('layouts.shs')
@section('title', 'Vote')
@section('content')
<div class="container">
  @component('snippets/candidate', ['positions' => $positions])

  @endcomponent
</div>
@endsection
