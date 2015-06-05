@extends('Layouts.desktop.layout')

@section('pagestylesheet')
	<style type="text/css">
		.membership_page_container { margin-top: 20px; font-family: 'Open Sans',sans-serif;color: #333;	}

		.membership_page_item {padding: 0px 14px;}

		.membership_card_container { background:#FFF;webkit-box-shadow: inset 0 0 2px rgba(0,0,0,.3);
      box-shadow: inset 0 0 2px rgba(0,0,0,.3);-moz-box-shadow: inset 0 0 2px rgba(0,0,0,.3);padding: 5px 5px 15px 5px;margin-bottom: 10px; 
		}

		.membership_card { background: url("/assets/images/home/hobbyix_membership_card.gif");background-repeat:no-repeat;background-position:left top;-o-background-size: 100% 100%, auto;
	  		-moz-background-size: 100% 100%, auto;-webkit-background-size: 100% 100%, auto;background-size: 100% 100%, auto;height: 200px;
		}

		.membership_features_container { background:#FFF;webkit-box-shadow: inset 0 0 2px rgba(0,0,0,.3);
      box-shadow: inset 0 0 2px rgba(0,0,0,.3);-moz-box-shadow: inset 0 0 2px rgba(0,0,0,.3);padding: 7px 20px 15px 20px;margin-bottom: 10px; 
    }

		.header{  padding: 0px 15px 5px 15px;border-bottom:1px solid;border-color: #20cfb1;font-size: 25px;text-align: center;} 

		.membership_features_container li { font-size: 18px;margin-bottom: 15px;}

		.membership_features_container .glyphicon{color: #20cfb1;margin-right: 7px;}

		.page_height_footer {margin-top: 40px;}

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
			</div>
			<div class="col-xs-12 col-md-8 col-sm-7 membership_page_item">
				<div class="membership_features_container">
						<h1 class="header">
							Hobbyix Membership Features
						</h1>
						<ul class="membership_features">
							<li><span class="glyphicon glyphicon-hand-right"></span>Access to all types of classes with Hobbyix Membership</li>
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