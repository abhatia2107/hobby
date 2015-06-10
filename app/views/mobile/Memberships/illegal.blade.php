@extends('Layouts.layout')
@section('content')
<style type="text/css">
  .footer-wrapper {position:absolute;left: 0;right: 0;margin-top:10%;}
</style>
<div class="container payments wrapper"  style="margin:10% 0 0 0;padding:0 10px">
  <div class="panel panel-danger">
    <h4 class="panel-heading text-center" style="padding:13px;margin:0px;font-weight:bold">Order Cancel</h4>
    <div class="panel-body">
    <div class="lead text-center">
    <h4>Sorry, your payment is aborted. {{$status_message}}</h4>
    <p><a href={{url('/memberships')}}> Try Again</a></p>
</div>
</div>
</div>
</div>
@stop

