@extends('Layouts.layout')
@section('content')
<style type="text/css">
  .footer-wrapper {position:absolute;left: 0;right: 0;margin-top:10%;}
</style>
<div class="container payments wrapper" style="margin-top:10%;">
	<div class="panel panel-danger">
		<h4 class="panel-heading text-center" style="padding:13px;margin:0px;font-weight:bold">Order Failed</h4>
		<div class="panel-body">
		<div class="lead text-center">
		<h4>Sorry, your transaction is failed due to {{$status_message}}</h4>
		<!--Please enter your website homepage URL -->
		<p><a href={{url('/memberships')}}> Try Again</a></p>
</div>
</div>
</div>
</div>
@stop