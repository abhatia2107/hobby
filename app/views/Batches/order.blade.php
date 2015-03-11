@extends("Layouts.layout")  
@section('pagestylesheet') 
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
@stop
@section("content")
<div class="home_vendor_page">
  @include('Templates.navbarVendor')
  <div class="container">
  	<div class="vendor_institute_batches batchOrderSummery" >
  		<div class="batchOrderTitleBar col-md-12 col-sm-12 col-xs-12">
  			Order Summery
  		</div>
  		<div class="row batchOrderTitles">
  			<div class="col-md-3 col-sm-3 col-xs-12">Class</div>
  			<div class="col-md-2 col-sm-2 col-xs-12">No. of Sessions</div>
  			<div class="col-md-3 col-sm-3 col-xs-12">Booking Date</div>
  			<div class="col-md-2 col-sm-2 col-xs-12">Price Per Session</div>
  			<div class="col-md-2 col-sm-2 col-xs-12">Subtotal</div>
  		</div><hr/>
  		<div class="row batchOrderDetails">
  			<div class="col-md-3 col-sm-3 col-xs-12">ABC DANCE CLASS </div>
  			<div class="col-md-2 col-sm-2 col-xs-12">1</div>
  			<div class="col-md-3 col-sm-3 col-xs-12">
  				<div class="form-group">
  					<div class="col-md-offset-2 col-sm-12 col-md-8 col-xs-offset-2 col-xs-8">
                   	<input type="text" placeholder="Booking Date" class="form-control" id="datepicker" name="bookingDate">  						
                   	</div>
  				</div>
            </div>
  			<div class="col-md-2 col-sm-2 col-xs-12">100/-</div>
  			<div class="col-md-2 col-sm-2 col-xs-12">100/-</div>
  		</div><hr/>
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
		$("#datepicker").datepicker();
	});
</script>
@stop
