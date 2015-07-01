@section("headerHome")
	<div class="clearfix header_row1" >
		<div class="col-sm-4 col-md-5 col-xs-12 website-title">
			<a href="/">HOBBYIX</a>
		</div>			
		<div class="MainHeaderUserInfo  col-sm-8 col-md-5 col-xs-12">				
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
				@if(isset($favorite['institute']))
					{{$favorite['institute']}}
				@endif
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
			<div class="userInfoListing" style="float:right;margin:0 10px 0 0">
				<div class="user_account_options">
					<button class="btn btn-primary" style="max-width:100%">
						<span style="padding: 3px 10px 3px 10px;float:left ">
						BOOK YOUR FAVORITE CLASS
						</span>						
					</button>																		
				</div>
			</div>	
		</div>
	</div>
@show