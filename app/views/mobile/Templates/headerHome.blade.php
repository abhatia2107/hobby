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
					<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">{{$name}}
						&nbsp;<span class="caret"></span>
					</button>													
					<ul class="dropdown-menu">
						<li> <a href="/users/profile">My Profile</a></li>
						<li> <a href="/users/orders">My Orders</a> </li>
						<li> <a class="" href="/users/show/{{$id}}">Change Password</a>	</li>
						<li class="divider"> </li>
						<li> <a class="header_logout_a" href="/users/logout" >Logout</a> </li>
					</ul>
				</div>											
			@endif			
		</div>		
	</div>
@show