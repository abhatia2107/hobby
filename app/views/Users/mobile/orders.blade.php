@extends('Layouts.mobile.layout')
@section('pagestylesheet')
<style type="text/css">

.uac_order_header {padding:5px 0px 6px 0px; ;border-bottom:1px solid;border-color: #E2E2E2;}

.uac_order_details {margin-top: 8px;margin-bottom: 5px;}

.uac_order_price {font-size: 12px;margin-top: 3px;}

.uac_order_number {font-size: 16px;font-weight: bold;}

.order_values { color: #292929;}

</style>
@stop
@section('content')
<?php 
  $orderNumber = 1;
  $orderDate = "14-05-2015";
  $orderTime = "10:45 am";
  $orderForDate = "17-05-2015";
  $numSessions = 5;
  $price = 100;
  $orderPrice = $numSessions*$price;
  $orderStatus = true;
  $index = 0;
  $nav_item = 2;
?>
<div class="container user_account_page">
  <div class="col-xs-12 uac_container">
      <div class="col-xs-12">
         @include('Users.mobile.sidebar')
      </div>
      <div class="col-xs-12">
        @for($index = 0; $index<=5;$index++)        
            <div class="uac_orders">
              <div class="uac_order_header row"> 
                <div class="col-xs-12">
                  <div class="uac_order_number">
                    ORDER NUMBER: <span class="order_values">{{$orderNumber}}</span>
                  </div>
                  <div class="uac_order_price">
                    Price Per Session: <span class="order_values">Rs. {{$price}}/-</span>
                  </div>
                </div> 
                <div class="col-xs-12">      
                  <span class="uac_order_date">{{$orderDate}}</span>&nbsp;&nbsp;
                  <span class="uac_order_time">{{$orderTime}}</span>
                </div>
              </div>
              <div class="uac_order_details row">
                <div class="col-xs-12">
                  ORDER BOOKED FOR: <span class="order_values">{{$orderForDate}}</span>
                </div>
                <div class="col-xs-12">
                  No. of Sessions: <span class="order_values">{{$numSessions}}</span>
                </div>
                <div class="col-xs-12">
                  Price: <span class="order_values">Rs. {{$orderPrice}}/-</span>
                </div>
              </div>
            </div> 
        @endfor
      </div>      
  </div>
</div>
<div class="space_footer"></div>
@stop
@section('pagejquery')
<script src="/assets/js/jquery-ui-1.10.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () 
  {

  });
</script>
@stop