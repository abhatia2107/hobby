@section("headerHome")
	<?php
		$id=Auth::id();
		if($id)
		{
			$user=User::find($id);
			if($user)
				$name=$user->user_name;
			else
				$name = "USER ACCOUNT";
		}
	?>
	<div class="clearfix header_row1" >
		<div class="col-xs-6 website-title">
			<a class="navbar-brand" href="/">
				<span class="website-title">HOBBYIX</span>
			</a>
		</div>
		<div class="userInfoListing col-xs-6">
			@if(!$id)
				<div class="login">
					<a href="/users/login" >LOGIN</a>
					<!-- &nbsp;&nbsp;|&nbsp;&nbsp;
					<a  class="header_signup_a" href="#" data-toggle="modal" data-target="#signupModal">Sign Up</a> -->
				</div>
			@else
				<div class="btn-group dropdown user_account_options">
					<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
						<span class="text_over_flow_hide" style="max-width:85%;padding: 3px 0px 3px 5px;float:left ">{{$name}}</span>
						<span style="padding: 3px 10px 0px 0px;float:left;max-width:10%">&nbsp;<span class="caret"></span></span>
					</button>													
					<ul class="dropdown-menu">
						<li> <a href="/users/profile">My Profile</a></li>
						<li> <a href="/users/orders">My Orders</a> </li>
						<li> <a class="" href="/users/changepassword">Change Password</a>	</li>
						<li class="divider"> </li>
						<li> <a class="header_logout_a" href="/users/logout" >Logout</a> </li>
					</ul>
				</div>											
			@endif			
		</div>
		@if(isset($favorite['id']))	
			<div class="row" style="margin:0;padding:5px 15px 10px 15px">									
				<div class="userInfoListing bookFavClassContainer col-xs-12" style="margin:0;padding:0;">
					<form role="form" method="post" id="bookFavClassForm" action="/bookings" enctype="multipart/form-data">
						<input type="hidden" name="csrf_token" id="hiddenCSRF" value="{{ csrf_token() }}" >
						<input type="hidden" name="batch_id" value="{{$favorite['batch_id']}}" >
						<input type="hidden" id="booking_date" name="booking_date" value="{{date('Y-m-d')}}" >
						<input type="hidden" name="name" value="{{$favorite['name']}}" >
						<input type="hidden" name="email" value="{{$favorite['email']}}" >                     
						<input type="hidden" name="contact_no" value="{{$favorite['contact_no']}}" >                     
						<input type="hidden" name="payment" value="{{$favorite['payment']}}" >                     
						<input type="hidden" name="favorite_used" value="1" >                     
						<input type="hidden" name="no_of_sessions" value="1" > 
						<input type="hidden" name="pay_hobbyix" value="credit"> 
						<div class="bookFavClassConfirm text_over_flow_hide" id="bookFavClassButton" style="display:block;color:white;text-align:center">
							{{$favorite['institute']}}
						</div>						
						<div class="bookFavClassConfirm" id="bookFavClassConfirm" style="display:none;color:white">
							Book For <button type="sumbit" class="favButton">Today</button> or <button id="bookingDateChange" class="favButton">Tomorrow</button> <a onclick="closeFavClassBook();" href="javascript:void(0);">X</a>
						</div>
					</form>
				</div>	
			</div>			
		@endif			
	</div>
@show