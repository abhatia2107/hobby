@section("headerHome")
	<div class="clearfix header_row1" >
		<div class="col-sm-4 col-md-4 col-xs-5 website-title">
			<a href="/">HOBBYIX</a>
		</div>		
		<div class="MainHeaderUserInfo col-xs-7">		
			<div class="userInfoListing">
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
		</div>
	</div>
@show