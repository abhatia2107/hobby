@section("header")
	<div class="clearfix header_row1" >
		<div class=" col-sm-4 col-md-4  ">
			<a class="navbar-brand" href="/">
				<img src="/assets/images/logo.png" class="img-responsive header_img" alt="HOBBY">
			</a>
		</div>
		<div class="col-sm-3 col-md-3 " >
			<form class="navbar-form" role="search">
				<div class="input-group" style="width:100%">
					<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term" >
					<div class="input-group-btn">
						<button class=" header_search_button btn btn-default" type="submit" >
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</form>
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
			<select  class="header_location_dropdown">
				@foreach($all_locations as $data)
					<option ><a href="location/{{$data->id}}">{{$data->location}}</a></option>
				@endforeach
			</select>
		</div>
	</div>
@show