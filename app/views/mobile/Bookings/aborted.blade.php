@extends('Layouts.layout')
@section('content')
<div class="main-container payments wrapper">
  <div class="panel panel-danger">
    <div class="panel-heading text-center">Order Cancel</div>
    <div class="panel-body">
    <div class="lead text-center">
    <h4>Sorry, your payment is aborted.</h4>
    <!--Please enter your website homepage URL -->
    <p><a href={{url('/batches/show/')}}{{$batch_id}}> Try Again</a></p>
</div>
</div>
</div>
</div>
@stop

