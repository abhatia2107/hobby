@extends('Layouts.layout')
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
  $nav_item = 2;
?>
<div class="container user_account_page">
  <div class="col-md-10 col-sm-12 col-xs-12 uac_container col-md-offset-1">
      <div class="col-md-3 col-sm-4 col-xs-12">
         @include('Users.sidebar')
      </div>
      <div class="col-md-9 col-sm-4 col-xs-12">
        @foreach ($bookingDetails as $booking)
            <div class="uac_orders">
              <div class="uac_order_header row"> 
                <div class="col-md-5 col-sm-4 col-xs-12">
                  <div class="uac_order_number">
                    ORDER REFERENCE ID: <span class="order_values">{{$booking->order_id}}</span>
                  </div>
                  <div class="uac_order_price">
                    Price Per Session: <span class="order_values">Rs. {{$booking->payment/$booking->no_of_sessions}}/-</span>
                  </div>
                </div> 
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="uac_order_number">
                    <span class="order_values">{{$booking->batch->subcategory}}, {{$booking->batch->institute}}</span>
                  </div>                                   
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                  <span class="uac_order_date">{{$booking->created_date_time}}</span>
                </div>
              </div>
              <div class="uac_order_details row">
                <div class="col-md-6 col-sm-7 col-xs-12">
                  ORDER BOOKED FOR: <span class="order_values">{{$booking->booking_date}}</span>
                </div>
                <div class="col-md-3 col-sm-2 col-xs-12">
                  No. of Sessions: <span class="order_values">{{$booking->no_of_sessions}}</span>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  @if($booking->referral_credit_used)
                    Credit Used: <span class="order_values">{{$booking->referral_credit_used}}/-</span>
                  @else
                    Amount Paid: <span class="order_values">Rs. {{$booking->payment}}/-</span>
                  @endif
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