@section("header2")
	<div class="row header_row1" >
		<div class=" col-sm-4 col-md-4  ">
			<a class="navbar-brand" href="/">
				<img src="/assets/images/logo.png" class="img-responsive header_img" alt="HOBBY">
			</a>
		</div>
		<div class="col-sm-3 col-md-3 " >
			
		</div>

		@if(Auth::guest())
			<div class=" col-sm-3 col-md-3 ">
				<ul class="list-inline">
					<li class="header_signin" >   
						<a class="header_signin_a" href="#" data-toggle="modal" data-target="#signinModal">Sign In</a>
					</li>
					<li class="header_signup">
						<a  class="header_signup_a" href="#" data-toggle="modal" data-target="#signupModal">Sign Up</a>
					</li>
				</ul>
			</div>
		@else
			<div class=" col-sm-3 col-md-3 ">
			<ul class="list-inline">
			<li class="header_myaccount" >   
			<a  href="#" class="header_myaccount_a">My Account</a>
			</li>
			<li class="header_logout" >
			<a class="header_logout_a" href="#" >Logout</a>
			</li>
			</ul>
			</div>		
		@endif
		<div class=" col-sm-2 col-md-2 ">
			
		</div>
	</div>
@show