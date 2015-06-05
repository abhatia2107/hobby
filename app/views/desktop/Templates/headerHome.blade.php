@section("headerHome")
	<div class="clearfix header_row1" >
		<div class="col-sm-4 col-md-4 col-xs-5 website-title">
			<a href="/">HOBBYIX</a>
		</div>		
		<div class="MainHeaderUserInfo col-xs-7">		
			<div class="userInfoListing ">
				<?php
					$id=Auth::id();
					if($id)
					{
						$user=User::find($id);
						if($user)
							$name=$user->user_first_name;
						else
							$name = "USER ACCOUNT";
					}
				?>
				@if(!$id)
					<div class="login">
						<a class="header_signin_a" href="#" data-toggle="modal" data-target="#loginModal">LOGIN TO HOBBYIX</a>
						<!-- &nbsp;&nbsp;|&nbsp;&nbsp;
						<a  class="header_signup_a" href="#" data-toggle="modal" data-target="#signupModal">Sign Up</a> -->
					</div>
				@else
					<div class="btn-group dropdown user_account_options">
						<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">{{$name}}
							&nbsp;<span class="caret"></span>
						</button>													
						<ul class="dropdown-menu">
							<li> <a href="/users/MyProfile">My Profile</a></li>
							<li> <a href="/users/MyOrders">My Orders</a> </li>
							<li> <a class="" href="/users/show/{{$id}}">Change Password</a>	</li>
							<li class="divider"> </li>
							<li> <a class="header_logout_a" href="/users/logout" >Logout</a> </li>
						</ul>
					</div>											
				@endif
			</div>
		</div>
	</div>
@show