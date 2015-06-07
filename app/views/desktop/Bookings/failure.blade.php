@extends('Layouts.layout')
@section('content')
<div class="main-container payments wrapper">
	<div class="panel panel-danger">
		<div class="panel-heading text-center">Order Failed</div>
		<div class="panel-body">
		<div class="lead text-center">
		<h4>Sorry, your transaction is failed due to {{$status_message}}</h4>
		<!--Please enter your website homepage URL -->
		<p><a href={{url('/batches/show/')}}{{$batch_id}}> Try Again</a></p>
</div>
</div>
</div>
</div>
@stop

