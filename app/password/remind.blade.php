
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
  <h1>Enter your correct Email id</h1>
<form action="/resetpassword/submit" method="POST">
	 <input type="hidden" name="token" value="{{ csrf_token() }}">
    <input type="email" name="user_email">
    <input type="submit" value="Send Reminder">
</form>
@endsection