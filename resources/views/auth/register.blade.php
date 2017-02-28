@extends('layouts.shs')
@section('title', 'Register')
@section('content')
<div class="container">
  <h2>Register</h2>
  <form role="form" method="post" action="{{ route('register') }}">
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
      'name' => 'name', 
      'type' => 'text',
      'required' => true,
      'autofocus' => false
    ])
      Name
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
    @component('fields/input', [
      'errors' => $errors, 
      'name' => 'password_confirmation', 
      'type' => 'password',
      'required' => true,
      'autofocus' => false
    ])
      Confirm Password
    @endcomponent
    @component('fields/button', ['type' => 'submit'])
      Register
    @endcomponent
  </form>
</div>
@endsection