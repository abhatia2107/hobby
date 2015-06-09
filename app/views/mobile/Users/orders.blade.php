@extends('Layouts.layout')
@section('pagestylesheet')
<style type="text/css">

.user_account_page {  background:#f0f3f6;min-height: 320px;width: 100%;color: #333;margin: 0;padding: 0}

.uac_container { margin-top: 40px;padding: 0px;}

.uac_sidebar_header{  padding: 3px 15px 2px 15px;border-bottom:1px solid;border-color: #20cfb1;font-size: 21px;color: #333;text-align: center;} 

.uac_profile li { margin: 5px;}

.uac_sidebar, .uac_profile, .uac_orders { font-family: 'Open Sans',sans-serif;background: none repeat scroll 0% 0% #FFF;
  border: 1px solid #E8E8E8;padding: 10px 10px 10px 10px;margin-bottom: 10px; }


.uac_order_header {padding:5px 0px 6px 0px; ;border-bottom:1px solid;border-color: #E2E2E2;}

.uac_order_details {margin-top: 8px;margin-bottom: 5px;}

.uac_order_price {font-size: 12px;margin-top: 3px;}

.uac_order_number {font-size: 16px;font-weight: bold;}

.order_values { color: #292929;}

</style>
@stop
@section('content')
<?php 
  $nav_item = 2;
?>
<div class="container user_account_page">
  <div class="col-xs-12 uac_container">    
      <div class="col-xs-12">
        @foreach ($bookingDetails as $booking)
            <div class="uac_orders">
              <div class="uac_order_header row"> 
                <div class="col-xs-12">
                  <div class="uac_order_number">
                    ORDER REFERENCE ID: <span class="order_values">{{$booking->order_id}}</span>
                  </div>
                  <div class="uac_order_price">
                    Price Per Session: <span class="order_values">Rs. {{$booking->payment/$booking->no_of_sessions}}/-</span>
                  </div>
                </div> 
                <div class="col-xs-12">      
                  <span class="uac_order_date">{{$booking->created_date_time}}</span>
                </div>
              </div>
              <div class="uac_order_details row">
                <div class="col-xs-12">
                  ORDER BOOKED FOR: <span class="order_values">{{$booking->booking_date}}</span>
                </div>
                <div class="col-xs-12">
                  No. of Sessions: <span class="order_values">{{$booking->no_of_sessions}}</span>
                </div>
                <div class="col-xs-12">
                  Price: <span class="order_values">Rs. {{$booking->payment}}/-</span>
                </div>
              </div>
            </div> 
        @endforeach
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