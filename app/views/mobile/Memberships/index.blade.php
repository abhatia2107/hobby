@extends('Layouts.layout')

@section('pagestylesheet')
	<style type="text/css">
		.membership_page_container { margin-top: 20px; font-family: 'Open Sans',sans-serif;color: #333;}

		.membership_page_item {padding: 0px 10px;}

		.membership_card_container { background:#FFF;webkit-box-shadow: inset 0 0 2px rgba(0,0,0,.3);
      box-shadow: inset 0 0 2px rgba(0,0,0,.3);-moz-box-shadow: inset 0 0 2px rgba(0,0,0,.3);padding: 5px 5px 5px 5px;margin-bottom: 10px; 
		}

		.membership_card { background: url("/assets/images/home/hobbyix_membership_card.gif");background-repeat:no-repeat;background-position:left top;-o-background-size: 100% 100%, auto;
	  		-moz-background-size: 100% 100%, auto;-webkit-background-size: 100% 100%, auto;background-size: 100% 100%, auto;height: 200px;
		}

		.membership_features_container { background:#FFF;webkit-box-shadow: inset 0 0 2px rgba(0,0,0,.3);
      		box-shadow: inset 0 0 2px rgba(0,0,0,.3);-moz-box-shadow: inset 0 0 2px rgba(0,0,0,.3);padding: 7px 10px 15px 10px;margin-bottom: 10px; 
    	}

		.header{  padding: 0px 0px 5px 0px;border-bottom:1px solid;border-color: #20cfb1;font-size: 18px;text-align: center;} 

		.membership_features_container li { font-size: 14px;margin:0 0 10px 0;padding: 0px 0px;}

		.membership_features_container .glyphicon{color: #20cfb1;margin-right: 7px;}

		.page_height_footer {margin-top: 15px;}

		li { font-size: 15px;margin-bottom: 5px;}

		.membership_features {padding: 0 10px;margin: 0 0;}

		.membership_card_container input[type=text] { height: 25px; padding: 0px 0px 0px 5px; width: 90%; border-radius: 2px; }

		#promoCodeContainer #statusMessage {color: #e24648;font-size: 14px;}

		.get_membership hr {margin: 10px 15px 5px 15px;}

	</style>
@stop

@section('content')
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			@include('Modals.login')
	</div>
	<!--sign-UP pop up modal-->
	<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow-y:auto">
		@include('Modals.signup')
	</div>
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
					<div class="row">
						<form method="post" enctype="multipart/form-data" action="/memberships">
                            <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
							<input type="hidden" id="payment" name="payment" value="{{$credentials['payment']}}">
							<li class="col-xs-12"><span class="col-xs-6">Type</span><span>:
								<select id="membership_type" name="membership_type" required="required">
		                            <option value=0>Flexi class</option>
		                            <option value=1>Flexi Time</option>
	                    		</select>
							</span></li>
							<li class="col-xs-12"><span class="col-xs-6">Credits</span><span id="credit">: {{$credentials['credits0']}}</span></li>
							<li class="col-xs-12"><span class="col-xs-6">Price</span><span>: Rs. {{$credentials['price']}}/-</span></li>
							<li class="col-xs-12"><span class="col-xs-6">Start Date</span><span>: {{$credentials['start']}}</span></li>
							<li class="col-xs-12"><span class="col-xs-6">Expiry Date</span><span id="end">: {{$credentials['end0']}}</span></li>
							<li class="col-xs-12" @if($credentials['wallet_amount']>0) style="display:block" @else style="display:none" @endif >
								<span class="col-xs-6">Hobbyix Wallet</span><span>: Rs. {{$credentials['wallet_amount']}}/-</span>
							</li>
							<li class="col-xs-12" @if($credentials['wallet_amount']>0) style="display:block" @else style="display:none" @endif >
								<span class="col-xs-6">Wallet Balance</span><span id="walletBalance">: Rs. {{$credentials['wallet_balance']}}/-</span>
							</li>
							<!-- <li class="col-xs-12" @if($user->user_wallet>=$credentials['payment']) style="display:block" @else style="display:none" @endif > -->
							<!-- </li> -->
							<li class="col-xs-12" style="margin:5px 0px;">
								<div class='col-xs-9' style="" id="promoCodeContainer">
            						<input type="text" style="width:100%" placeholder="Enter Promo Code (Optional)" class="form-control" id="promoCode" name="promo_code" />
          						</div>
          						<div class='col-xm-2' id="promoCodeMessageContainer" style="text-align:left;padding:1px 0px 0px 0px;font-size:15px;color:green">
             					<a href="javascript:verifyPromoCode();">Apply</a>
          						</div>          
        					</li>
        					<li class="col-xs-12" style="text-align:center"><hr/>Amount Payable<span id="totalPrice">: Rs. {{$credentials['payment']}}/-</span></li>
							<div style="text-align:center;color:white">
								<button type="submit" class="booknowButton" id="membership_pay">Pay Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-8 col-sm-7 membership_page_item">
				<div class="membership_features_container">
						<h1 class="header">
							Flexi Class Membership Features
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
			<div class="col-xs-12 col-md-8 col-sm-7 membership_page_item">
				<div class="membership_features_container">
						<h1 class="header">
							Flexi Time Membership Features
						</h1>
						<ul class="membership_features">
							<li><span class="glyphicon glyphicon-hand-right"></span>Access to one fitness activity for two months with Hobbyix Flexi Time Membership</li>
							<li><span class="glyphicon glyphicon-hand-right"></span>You can go to only one type of activity in a single fitness center of your choice</li>
							<li><span class="glyphicon glyphicon-hand-right"></span>Just book the session and pay with Hobbyix Membership</li>
							<li><span class="glyphicon glyphicon-hand-right"></span>You will get 25 credits in your account</li>
							<li><span class="glyphicon glyphicon-hand-right"></span>You can book a maximum of 1 class per day</li>
						</ul>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 page_height_footer"></div>
	</div>
@stop
@section('pagejquery')  
	<script type="text/javascript">
		var loginStatus = "{{$loggedIn}}";
		var formValidationStatus = false;
		var oldPromoCode = "";
		function verifyPromoCode (condition) 
		{	
			formValidationStatus = false;
			$('#promoCodeContainer #statusMessage').empty();
      		var promoCode = $("#promoCode").val();
      		var conditionMessage = "";
      		if(condition == "onDirectApply")
      			conditionMessage = ". Click on Pay Now";
			if(promoCode != "" )
			{
				oldPromoCode = promoCode;
				$.get("/promos/isvalid/"+promoCode,function(response)
				{ 
					if($.isNumeric(response['price']))
					{
						$('#orderTotal').empty();  
						$('#orderTotal').append(": Rs. "+response['price']+"/-");
						$('#payment').val(response['price']);
			            $('#walletBalance').empty();  
			            $('#walletBalance').append(": Rs. "+response['wallet_balance']+"/-");
						$('#promoCodeContainer').append("<span id='statusMessage' style='color:green'>Promo Code Applied"+conditionMessage+"</span>");
						formValidationStatus = true;
					}
					else
					{
						$('#orderTotal').empty();  
						$('#orderTotal').append(": Rs. "+"{{$credentials['payment']}}"+"/-");
						$('#payment').val("{{$credentials['payment']}}");
						$('#promoCodeContainer').append("<span id='statusMessage'>"+response+"</span>");
					}
				});
			}
			else if (condition != "onDirectApply" )
				$('#promoCodeContainer').append("<span id='statusMessage'>Please Enter Promo Code</span>");																	
			return formValidationStatus;
   		}
   		$(document).ready(function () 
   		{   
			$('#membership_type').on('change', function() {
				var type = this.value; // or $(this).val()
				if(type==0)
				{
					$('#credit').empty();  
					$('#credit').append(': {{$credentials['credits0']}}');
					$('#end').empty();  
					$('#end').append(': {{$credentials['end0']}}');
				}
				else
				{
					$('#credit').empty();  
					$('#credit').append(': {{$credentials['credits1']}}');
					$('#end').empty();  
					$('#end').append(': {{$credentials['end1']}}');
				}
			});
			$('#membership_pay').click(function(e)
	        {
		        if(loginStatus=="")
		        {
		        	e.preventDefault();
		            e.stopPropagation();
		            $('#loginModal').modal('show');
		        }
	          	else
	          	{
		          	var promoCode = $("#promoCode").val();
		          	if(promoCode != "")
					{
						if(oldPromoCode != promoCode || formValidationStatus==false)
						{
	          				e.preventDefault();
	            			e.stopPropagation();
	            			verifyPromoCode('onDirectApply');
	            		}
	          		}
	          		oldPromoCode = promoCode;
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