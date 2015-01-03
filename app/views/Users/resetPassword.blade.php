@extends('Layouts.layout')
@section('content')
	<form role="form" method="POST" enctype="multipart/form-data" action="/users/password/reset/submit">
		<div class="form-group">
			<!-- <label>Email address</label> -->
			<input type="hidden" name="token" value="{{ $token }}">
			<!-- <input type="email" class="form-control"  placeholder="Enter email" name="email"> -->
		</div>
		<div class="form-group">
			<label>New Password</label>
			<input type="password" class="form-control"  placeholder="New Password" name="password">
		</div>
		<div class="form-group">
			<label> Confirm Password</label>
			<input type="password" class="form-control"  placeholder="Confirm Password" name="password_confirmation">
		</div>
		<button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Submit</button>
	</form>
@stop 