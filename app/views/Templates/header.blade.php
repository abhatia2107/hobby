@section("header")
  	<style>
	  	.search-box{
	  		width:100%
	  	}
  	</style>
	<div class="clearfix header_row1">
		<div class=" col-sm-3 col-md-3  ">
			<a class="navbar-brand" href="/">
				<span class="website-title">HOBBYIX</span>
			</a>
		</div>			
		<div class="col-sm-6 col-md-6">
			<form class="navbar-form" action="/filters/search" method="get" role="search">
				<div class="input-group search-box">
					<input type="text" class="form-control" placeholder="Search" name="keyword" id="keyword" >
					<input type="hidden" name="category_id" value="0">
					<input type="hidden" name="location_id" value="0">
					<input type="hidden" name="chunk" value="0">
					<div class="input-group-btn">
						<button class=" header_search_button btn btn-default" type="submit" >
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
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
			<div class="col-sm-3 col-md-3 userInfoListing" >
				<div class="login">
					<a href="#" data-toggle="modal" data-target="#loginModal">LOGIN TO HOBBYIX</a>
					<!--&nbsp;&nbsp;|&nbsp;&nbsp;
					<a href="#" data-toggle="modal" data-target="#signupModal">Sign Up</a> -->
				</div>
			</div>
		@else
			<div class=" col-sm-3 col-md-3 userInfoListing ">
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
			</div>		
		@endif			
	</div>
@show