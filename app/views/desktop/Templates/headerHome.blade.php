@section("headerHome")
	<div class="clearfix header_row1" >
		<div class="col-sm-4 col-md-5 col-xs-12 website-title">
			<a href="/">HOBBYIX</a>
		</div>			
		<div class="MainHeaderUserInfo  col-sm-8 col-md-7 col-xs-12">				
			<div class="userInfoListing" style="float:right;">
				<?php
					$id=Auth::id();
					if($id)
					{
						$user=User::find($id);
						if($user)
							$name = $user->user_name;		
						else
							$name = "My Account";						
					}				
				?>				
				@if(!$id)
					<div class="login">
						<a class="header_signin_a" href="#" data-toggle="modal" data-target="#loginModal">LOGIN TO HOBBYIX</a>						
					</div>
				@else
					<div class="btn-group dropdown user_account_options">
						<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
							<span class="text_over_flow_hide" style="max-width:120px;padding: 3px 0px 3px 10px;float:left ">{{$name}}</span>
							<span style="padding: 3px 5px;float:left ">&nbsp;<span class="caret"></span></span>
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
				<div class="userInfoListing bookFavClassContainer" style="float:right;margin:0 10px 0 0">
					<form role="form" method="post" id="bookFavClassForm" action="/bookings" enctype="multipart/form-data">
						<input type="hidden" name="csrf_token" id="hiddenCSRF" value="{{ csrf_token() }}" >
						<input type="hidden" name="batch_id" value="{{$favorite['batch_id']}}" >
						<input type="hidden" id="booking_date" name="booking_date" value="{{date('Y-m-d')}}" >
						<input type="hidden" name="name" value="{{$favorite['name']}}" >
						<input type="hidden" name="email" value="{{$favorite['email']}}" >                     
						<input type="hidden" name="contact_no" value="{{$favorite['contact_no']}}" >                     
						<input type="hidden" name="payment" value="{{$favorite['payment']}}" >                     
						<input type="hidden" name="no_of_sessions" value="1" > 
						<input type="hidden" name="pay_hobbyix" value="credit"> 
						<div class="user_account_options" id="bookFavClassButton" >
							<button class="btn btn-primary" id="bookFavClass" title="Book a Session at {{$favorite['institute']}}">
								<span class="text_over_flow_hide" style="padding: 3px 10px 3px 10px;float:left ">
									{{$favorite['institute']}}
								</span>						
							</button>																		
						</div>
						<div class="bookFavClassConfirm" id="bookFavClassConfirm" style="display:none;color:white">
							Book For <button type="sumbit">Today</button> or <button id="bookingDateChange">Tomorrow</button> <a onclick="closeFavClassBook();" href="javascript:void(0);">X</a>
						</div>
					</form>
				</div>				
			@endif			
		</div>
	</div>
@show