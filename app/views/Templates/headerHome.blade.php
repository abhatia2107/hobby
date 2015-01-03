@section("header2")
	<div class="clearfix header_row1" >
		<div class=" col-sm-4 col-md-4">
			<a class="navbar-brand" href="/">
				<img src="/assets/images/logo.png" class="img-responsive" alt="HOBBY">
			</a>
		</div>
		<div class="col-sm-5 col-md-5">
		</div>

		<div class=" col-sm-3 col-md-3 ">
			<ul class="list-inline">
				@if(Auth::guest())
					<li class="header_signin" >   
						<a class="header_signin_a" href="#" data-toggle="modal" data-target="#loginModal">Sign In</a>
					</li>
					<li class="header_signup">
						<a  class="header_signup_a" href="#" data-toggle="modal" data-target="#signupModal">Sign Up</a>
					</li>
				@else
					<li class="header_myaccount" >   
					<a class="header_myaccount_a" href="/users/myaccount" >My Account</a>
					</li>
					<li class="header_logout" >
					<a class="header_logout_a" href="/users/logout" >Logout</a>
					</li>
				@endif
			</ul>
		</div>
	</div>
@show