@extends('Layouts.layout')
@section('content')
<style type="text/css">
  .footer-wrapper {position:absolute;left: 0;right: 0;margin-top:8%;}
</style>
<div class="payments wrapper container" style="margin:10% 0 0 0;padding:0 10px">
  <div class="panel panel-success">
    <h4 class="panel-heading text-center" style="padding:13px;margin:0px;font-weight:bold">Order Successful</h4>
    <div class="panel-body">
    <div class="lead text-center">

        <h4>Congratulations, your payment for Hobbyix Membership is successful.</h4>
        
        <h4>Your Order ID for this order is <strong>{{$order_id}}</strong>.</h4>
        
        <h4>Expiry Date: {{$end_date}}, No of Credits: {{$credits}}</h4>

        <h4>Continue to our <a href="{{url('/')}}">website.</a></h4>

        <div class="fb-share-button" data-href="{{url('/memberships').'?id='.$id}}" data-layout="button"></div>

  </div>
  </div>
  </div>
  </div>
@stop
@section('pagejquery')
  <script type="text/javascript">
    $(document).ready(function() 
    { 
      alert($('.payments').offset().top);
      alert($(window)height())
      //$('.footer-wrapper').css('background','');
    });   
  </script>
@stop
