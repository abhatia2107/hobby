@section("header")
	<div class="clearfix" style="background-color: #3396d1;">
		<div class=" col-sm-4 col-md-4  ">
		<a class="navbar-brand" href="/">
			<img src="/assets/images/logo.png" class="img-responsive" alt="HOBBY">
		</a>
		</div>
		<div class="col-sm-3 col-md-3 " >
			<form class="navbar-form" role="search">
				<div class="input-group" style="width:100%">
					<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term" >
					<div class="input-group-btn">
						<button style="height: 34px;
						margin-top: 1px;
						font-size: 18px;
						padding-top: 5px;"class="btn btn-default" type="submit" >
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</form>
		</div>

		@if(Auth::guest())
			<div class=" col-sm-3 col-md-3 ">
			<ul class="list-inline">
			<li style="padding-top: 11px;font-size: 20px;width:50%;padding-left:20px;color:white;">   
			<a style="text-decoration:none;color:white;" href="#" >My Account</a>
			</li>
			<li style="padding-top: 11px;font-size: 20px;color:white;">
			<a style="text-decoration:none;color:white;" href="#" >&nbsp;Logout</a>
			</li>
			</ul>
			</div>
		@else
			<div class=" col-sm-3 col-md-3 ">
			<ul class="list-inline">
			<li style="padding-top: 11px;font-size: 20px;width:50%;padding-left:20px;color:white;">   
			<a style="text-decoration:none;color:white;" href="#" data-toggle="modal" data-target="#signinModal">Sign In</a>
			</li>
			<li style="padding-top: 11px;font-size: 20px;color:white;">
			<a style="text-decoration:none;color:white;" href="#" data-toggle="modal" data-target="#signupModal">Sign Up</a>
			</li>
			</ul>
			</div>
		@endif
		<div class=" col-sm-2 col-md-2 ">
			<select  style="margin-top: 7px;width:100%">
				@foreach($all_locations as $data)
					<option ><a href="location/{{$data->id}}">{{$data->location}}</a></option>
				@endforeach
			</select>
		</div>
	</div>
@show