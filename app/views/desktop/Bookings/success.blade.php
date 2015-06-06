@extends('Layouts.layout')
@section('content')
<div class="main-container payments wrapper">
  <div class="panel panel-success">
    <div class="panel-heading text-center">Order Successful</div>
    <div class="panel-body">
    <div class="lead text-center">

  <h4>Congratulations, your booking of {{$subcategory}} class with {{$institute}} is successful.</h4>
  
  <h4>Your Order ID for this order is <strong>{{$order_id}}</strong>.</h4>
  
  <h4>Booking Date: {{$date}}, No of sessions: {{$no_of_sessions}}</h4>

  <h4>Continue to our website.</h4>

  </div>
  </div>
  </div>
  </div>
@stop
