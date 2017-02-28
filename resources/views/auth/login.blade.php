@extends('layouts.shs')
@section('title', 'Login')
@section('content')
<div class="container">
  <h2>Login</h2>
  <form role="form" method="post" action="{{ route('login') }}">
  {{ csrf_field() }}
  @component('fields/input', [
    'errors' => $errors, 
    'name' => 'username', 
    'type' => 'text',
    'required' => true,
    'autofocus' => true
  ])
    Username
  @endcomponent
  @component('fields/input', [
    'errors' => $errors, 
    'name' => 'password', 
    'type' => 'password',
    'required' => true,
    'autofocus' => false
  ])
    Password
  @endcomponent
  @component('fields/button', ['type' => 'submit'])
    Login
  @endcomponent
  </form>
</div>
@endsection
