@section("headerHome")
	<div class="clearfix header_row1" >
		<div class="col-sm-4 col-md-4">
			<a class="navbar-brand" href="/">
				<img src="/assets/images/logo.png" class="img-responsive header_img" alt="HOBBYIX">
			</a>
		</div>
		<div class="col-sm-3 col-md-3">
		</div>

		<div class=" col-sm-5 col-md-5 MainHeaderUserInfo">		
			<div class="userInfoListing ">
				<?php
					$id=Auth::id();
					if($id)
					{
						$user=User::find($id);
						if($user)
							$name=$user->user_first_name;
					}
				?>
				@if(!$id)
					<div class="login-singup">
						<a class="header_signin_a" href="#" data-toggle="modal" data-target="#loginModal">LogIn</a>
						&nbsp;&nbsp;|&nbsp;&nbsp;
						<a  class="header_signup_a" href="#" data-toggle="modal" data-target="#signupModal">Sign Up</a>					
					</div>
				@else							
					<a class="header_myaccount_a" href="/users/show/{{$id}}">
						@if($user)
							{{$name}}'s 
						@else
							My
						@endif
						Account 
					</a>&nbsp;|&nbsp;
					<a class="header_logout_a" href="/users/logout" >Logout</a>							
				@endif
			</div>

		</div>
	</div>
@show