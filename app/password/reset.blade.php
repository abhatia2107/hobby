@extends('layout.layoutdef')
@section("formpage")
@if($errors->has())
  @foreach($errors->all() as $error)
    <p>{{ $error }}<br>
  @endforeach
@endif
@if(Session::has('message'))
    <p>{{Session::get('message')}}
  @endif
  <h1>Enter your new password with correct email</h1>
<form action="/password/reset/submit" method="POST">
	<input type="hidden" name="token" value="{{ $token }}">
    Email:<input type="email" name="user_email"><br>
    password:<input type="password" name="password"><br>
    confirm passwors:<input type="password" name="password_confirmation"><br>
    <input type="submit" value="Reset Password">
</form>