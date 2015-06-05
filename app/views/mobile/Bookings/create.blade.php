@extends("Layouts.layout")  
@section("content")
<div class="home_vendor_page">
  @include('Templates.navbarVendor')
  <div class="container">
  	<div class="vendor_institute_batches batchOrderSummary" >
  		<div class="batchOrderTitleBar col-md-12 col-sm-12 col-xs-12">
  			Order Summary
  		</div>
  		<div class="row batchOrderTitles">
  			<div class="col-md-3 col-sm-3 col-xs-12">Class</div>
  			<div class="col-md-2 col-sm-2 col-xs-12">No. of Sessions</div>
  			<div class="col-md-3 col-sm-3 col-xs-12">Booking Date</div>
  			<div class="col-md-2 col-sm-2 col-xs-12">Price Per Session</div>
  			<div class="col-md-2 col-sm-2 col-xs-12">Subtotal</div>
  		</div><hr/>
  		<div class="row batchOrderDetails">
  			<div class="col-md-3 col-sm-3 col-xs-12">{{$batchDetails->batch}}</div>
  			<div class="col-md-2 col-sm-2 col-xs-12">
  				<form role="form"  name="batchOrderForm" id="batchOrderForm" action="" > 
  					<div class="form-group"> 
              <select class="form-control" id="numberOfSessions" name="numberOfSessions" required>
                @for($session=1;$session<=6;$session++)
                    <option value={{$session}}>{{$session}}</option>
                @endfor
              </select>
  					</div>
  			</div>
  			<div class="col-md-3 col-sm-3 col-xs-12">
  				<div class="form-group">
  					<div class="col-md-offset-2 col-sm-12 col-md-8 col-xs-offset-2 col-xs-8">
            	<input type="text" placeholder="Booking Date" class="form-control" id="datepicker" name="booking_date" required />
            </div>
  				</div>
  				</form>
            </div>
  			<div class="col-md-2 col-sm-2 col-xs-12"> ₹ {{$batchDetails->batch_single_price}}/-</div>
  			<div class="col-md-2 col-sm-2 col-xs-12"><div id="order_subtottal"></div></div>
  		</div><hr/>
  		<form method="post" action="/promos/isValid" enctype="multipart/form-data">
        <input type="hidden" id="csrf_token" name="csrf_token" value="{{csrf_token()}}">
        <input type="checkbox" id ="promo" name="promo">
        <label for="promo">I have a promo code</label>
  			<input type="text" id="promo_code" name="promo_code">
  			<input type="submit">
  		</form>
  		<div class="row batchOrderFinalDetails">
  			<div class="col-md-8 col-sm-6 col-xs-12 batchOrderFinalDetails1">Amount Payable: Rs. 100/-</div>  		
  			<div class="col-md-4 col-sm-6 col-xs-12 batchOrderButtons">
  				<a href=""><div class="col-md-4 col-sm-4 col-xs-11 payNowButton">Pay Now</div></a>
  				<a href=""><div class="col-md-6 col-sm-6 col-xs-11 payNowButton">Hobbyix Passport</div></a>
  			</div>  			
  		</div>
  	</div>
  </div>
</div>
@stop

@section('pagejquery') 
<script src="/assets/js/jquery-ui-1.10.4.min.js"></script>
<script type="text/javascript">
	 $(function() {
		$("#datepicker").datepicker({
			/*showOn: 'both',
			buttonImage: "http://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
            buttonText: "Choose Date",*/
            dateFormat: 'yy-mm-dd'
		});
	});
</script>
@stop
