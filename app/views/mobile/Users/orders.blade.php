@extends('Layouts.layout')
@section('pagestylesheet')
<style type="text/css">

.user_order_page {  background:#fff;min-height: 320px;width: 100%;color: #333;margin: 0;padding: 0;font-family: 'Open Sans',sans-serif;}

.user_order_page_header{  padding: 10px 15px 2px 15px;border-bottom:1px solid;border-color: #20cfb1;font-size: 21px;color: #333;text-align: center;} 

.uac_orders {border-bottom:1px solid;border-color: #20cfb1;font-size: 12px; }

.uac_order_header {border-color: #E2E2E2;padding: 5px 0px 2px 0px;}

.uac_order_number {font-size: 13px;font-weight: bold;}

.padding_margin_0 {margin: 0px;padding: 0px}

</style>
@stop
@section('content')
<div class="container user_order_page padding_margin_0">
  <div class="col-xs-12 padding_margin_0" >
    <div class="user_order_page_header">Your Orders</div>
    @foreach ($bookingDetails as $booking)
        <div class="uac_orders">
          <div style="margin:0px 10px 0px 10px;">
            <div class="uac_order_header col-xs-12" > 
              <div class="col-xs-6 padding_margin_0">
                <div class="uac_order_number">
                  ORDER ID: <span class="order_values">{{$booking->order_id}}</span>
                </div>               
              </div> 
              <div class="col-xs-6 padding_margin_0">                
                <div class="uac_order_date">    
                  <span >{{$booking->created_date_time}}</span>
                </div>                
              </div>
            </div>
            <div class="col-xs-12 padding_margin_0" style=""> 
               <div class="uac_order_number">
                  <span class="order_values text_over_flow_hide">{{$booking->batch->subcategory}}, {{$booking->batch->institute}}</span>
                </div>   
            </div>
            <div class="uac_order_details row"  style="padding: 0px 0px 5px 0px ;margin-top:0px">
              <div class="col-xs-6 ">
                <div>Booked For: <span class="order_values">{{$booking->booking_date}}</span></div>
                <div class="uac_order_price">
                  Price/Session: <span class="order_values">Rs. {{$booking->payment/$booking->no_of_sessions}}/-</span>
                </div>
              </div>
              <div class="col-xs-6 padding_margin_0">
                <div>No. of Sessions: <span class="order_values">{{$booking->no_of_sessions}}</span></div>
                <div>Aomount Paid: <span class="order_values">Rs. {{$booking->payment}}/-</span></div>
              </div>
            </div>
          </div> 
        </div>
    @endforeach
  </div>      
</div>
@stop
@section('pagejquery')
<script src="/assets/js/jquery-ui-1.10.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () 
  {

  });
</script>
@stop