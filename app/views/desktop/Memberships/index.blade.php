@extends('Layouts.layout')

@section('pagestylesheet')
	<style type="text/css">
		.membership_page_container { margin-top: 20px; font-family: 'Open Sans',sans-serif;color: #333;	}

		.membership_page_item {padding: 0px 14px;}

		.membership_card_container { background:#FFF;webkit-box-shadow: inset 0 0 2px rgba(0,0,0,.3);
      box-shadow: inset 0 0 2px rgba(0,0,0,.3);-moz-box-shadow: inset 0 0 2px rgba(0,0,0,.3);padding: 5px 5px 5px 5px;margin-bottom: 10px; 
		}

		.membership_card { background: url("/assets/images/home/hobbyix_membership_card.gif");background-repeat:no-repeat;background-position:left top;-o-background-size: 100% 100%, auto;
	  		-moz-background-size: 100% 100%, auto;-webkit-background-size: 100% 100%, auto;background-size: 100% 100%, auto;height: 200px;
		}

		.membership_features_container { background:#FFF;webkit-box-shadow: inset 0 0 2px rgba(0,0,0,.3);
      box-shadow: inset 0 0 2px rgba(0,0,0,.3);-moz-box-shadow: inset 0 0 2px rgba(0,0,0,.3);padding: 7px 20px 15px 20px;margin-bottom: 10px; 
    }

		.header{  padding: 0px 15px 5px 15px;border-bottom:1px solid;border-color: #20cfb1;font-size: 25px;text-align: center;} 

		.membership_features_container li { font-size: 18px;margin-bottom: 15px;}

		li { font-size: 18px;margin-bottom: 5px;}

		.membership_features_container .glyphicon{color: #20cfb1;margin-right: 7px;}

		.page_height_footer {margin-top: 40px;}

		@media (min-width: 920px) { .get_membership li {padding: 0 20px}}

		.membership_card_container input[type=text] { height: 25px; padding: 0px 0px 0px 5px; width: 90%; border-radius: 2px; }

		#promoCodeContainer #statusMessage {color: red;font-size: 14px;}

		.get_membership hr {margin: 10px 15px 5px 15px;}

	</style>
@stop

@section('content')
	<div class="container membership_page_container">
		<div class="row">
			<div class="col-xs-12 col-md-4 col-sm-5 membership_page_item">
				<div class="membership_card_container">
					<div class="membership_card"></div>					
					<div class="membership_card_details"></div>
				</div>
				<div class="membership_card_container get_membership" style="padding-bottom:15px">
					<h1 class="header" style="margin-top:10px">
						Get Your Membership
					</h1>
					<?php
		                $amountPayable = $credentials['payment'];
					?>
					<div class="row">
						<form method="post" enctype="multipart/form-data" action="/memberships">
                            <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
							<input type="hidden" id="payment" name="payment" value="{{$amountPayable}}">
							<li class="col-md-12"><span class="col-md-6 col-sm-6">Credits</span><span>: {{$credentials['credits']}}</span></li>
							<li class="col-md-12"><span class="col-md-6 col-sm-6">Price</span><span>: Rs. {{$credentials['payment']}}/-</span></li>
							<li class="col-md-12"><span class="col-md-6 col-sm-6">Start Date</span><span>: {{$credentials['start']}}</span></li>
							<li class="col-md-12"><span class="col-md-6 col-sm-6">Expiry Date</span><span>: {{$credentials['end']}}</span></li>
							<li class="col-md-12" style="margin:5px 0px;">
								<div class='col-md-10 col-sm-10' style="" id="promoCodeContainer">
            						<input type="text" style="width:100%" placeholder="Enter Promo Code (Optional)" class="form-control" id="promoCode" name="promo_code" />
          						</div>
          						<div class='col-md-2 col-sm-2' id="promoCodeMessageContainer" style="text-align:left;padding:1px 0px 0px 0px;font-size:15px;color:green">
             					<a href="javascript:verifyPromoCode();">Apply</a>
          						</div>          
        					</li>
        					<li><a href="/promos/isvalid/HBX200">HBX200</a></li>        					
        					<li class="col-md-12" style="text-align:center"><hr/>Amount Payable<span id="totalPrice">: Rs. {{$amountPayable}}/-</span></li>								     
							<div style="text-align:center;color:white"><button type="submit" class="booknowButton" id="membership_pay">Pay Now</button></div>							
						</form>
					</div>
				</div>				
			</div>
			<div class="col-xs-12 col-md-8 col-sm-7 membership_page_item">
				<div class="membership_features_container">
						<h1 class="header">
							Hobbyix Membership Features
						</h1>
						<ul class="membership_features">
							<li><span class="glyphicon glyphicon-hand-right"></span>Access to all types of fitness activities with Hobbyix Membership</li>
							<li><span class="glyphicon glyphicon-hand-right"></span>There is no limit on how many types of activities you indulge in</li>
							<li><span class="glyphicon glyphicon-hand-right"></span>Just book the session and pay with Hobbyix Membership</li>							
							<li><span class="glyphicon glyphicon-hand-right"></span>You will get 30 credits in your account. Each class is of 1 credit except a few which could be of 2-3 credits</li>
							<li><span class="glyphicon glyphicon-hand-right"></span>You can book a maximum of 1 class per day</li>
						</ul>					
				</div>				
			</div>
		</div>
		<div class="space_for_footer"></div>
		<div class="col-md-12 col-sm-12 page_height_footer"></div>
	</div>
@stop
@section('pagejquery')  
	<script type="text/javascript">
		var loginStatus = "{{$loggedIn}}";
		var appliedPromoCode = false;      		
		function verifyPromoCode () 
		{
      		var promoCodeIP = $('#promoCode').val();      		
      		if((promoCodeIP == "HBX200") && (appliedPromoCode==false))
      		{      			
          		var totalAmount = $('#payment').val();
          		totalAmount = totalAmount-200;
          		if(totalAmount<0)
          		{
          			totalAmount=0;
          		}
          		$('#payment').val(totalAmount);
          		$('#totalPrice').empty();          	
          		$('#totalPrice').append(': Rs. '+totalAmount+'/-');
          		/*$('#promoCodeMessageContainer').empty();
          		$('#promoCodeMessageContainer').append("<span class='glyphicon glyphicon-ok'> </span>"); */
          		$('#promoCodeContainer #statusMessage').empty();
	    		$('#promoCodeContainer').append("<span id='statusMessage' style='color:green'>Promo Code Applied</span>");
	    		appliedPromoCode = true;	    		
      		}
		   	else if ( (promoCodeIP != "HBX200") && (appliedPromoCode==false))
	    	{	    		
	    		$('#promoCodeContainer #statusMessage').empty();
	    		$('#promoCodeContainer').append("<span id='statusMessage'>Invalid Promo Code</span>")
	      	}
	      	else
	      	{
	      		$('#promoCodeContainer #statusMessage').empty();
	    		$('#promoCodeContainer').append("<span id='statusMessage'>Promo Code Applied Already</span>")
	      	}
   		} 
   		$(document).ready(function () 
   		{   		
			$('#membership_pay').click(function(e)
	        {
	          if(loginStatus=="")
	          {
	            e.preventDefault();
	            e.stopPropagation();
	            $('#loginModal').modal('show');
	          }
	        });
	        $('#promoCode').keypress(function(e){
			    if ( e.which == 13 )
			    {
			    	verifyPromoCode () ;
			    	e.preventDefault();
			    } 
			});
		});        
	</script>
 @stop