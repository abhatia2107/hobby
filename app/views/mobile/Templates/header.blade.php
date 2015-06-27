@section("header")
  	<style>
	  	.search-box {	width:100%	}

	  	.navbar-form {margin: 0px;border:none;padding: 5px;outline: none;width: 100%;}

	  	.navbar-form input[type=text] {width: 100%;}

	  	.header_row1 .searchicon a {color: white;font-size: 16px;padding: 17px 5px 17px 0px;float: right;text-decoration: none;}
  	</style>
  	<?php
		$id=Auth::id();
		if($id)
		{
			$user=User::find($id);
			if($user)
				$name=$user->user_name;
			else
				$name = "My Account";
		}
	?>
	<div class="clearfix header_row1">
		<div class="col-xs-6 website-title">
			<a class="navbar-brand" href="/">
				<span class="website-title">HOBBYIX</span>
			</a>
		</div>						
		<div class="userInfoListing col-xs-4">
			@if(!$id)				
				<div class="login">
					<a href="/users/login" >LOGIN</a>
					<!--&nbsp;&nbsp;|&nbsp;&nbsp;
					<a href="#" data-toggle="modal" data-target="#signupModal">Sign Up</a> -->
				</div>
			@else			
				<div class="btn-group dropdown user_account_options">
					<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
						<span class="text_over_flow_hide" style="max-width:85%;padding: 3px 0px 3px 5px;float:left ">{{$name}}</span>
						<span style="padding: 3px 10px 0px 0px;float:left;max-width:10%">&nbsp;<span class="caret"></span></span>
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
		<span class="searchicon">
			<a href="javascript:displaySearchOption();" class="col-xs-1 glyphicon glyphicon-search"></a>
		</span>
		<div class="col-xs-12 search_option_container" style="display:none">
			<form class="navbar-form" action="/search" method="get" role="search">
				<div class="input-group search-box">
					<input type="text" class="form-control" placeholder="Search" name="keyword" id="keyword" >
					<div class="input-group-btn">
						<button class=" header_search_button btn btn-default" type="submit" >
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</form>
		</div>			
	</div>
<script type="text/javascript">
	function displaySearchOption() 
	{
		var displayValue = $('.search_option_container').css('display');		
		if(displayValue == "none")		
			$('.search_option_container').show();							   	
		else
			$('.search_option_container').hide();		
	}
</script>
@show