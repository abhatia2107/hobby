@section("header")
  	<style>
	  	.search-box{
	  		width:100%
	  	}
  	</style>
	<div class="clearfix header_row1">
		<div class=" col-sm-2 col-md-2  ">
			<a class="navbar-brand" href="/">
				<img src="/assets/images/logo.png" class="img-responsive header_img" alt="HOBBY">
			</a>
		</div>
			
		<div class="col-sm-6 col-md-6" >
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
			}
		?>
		@if(!$id)
			<div class=" col-sm-3 col-md-3 ">
				<ul class="list-inline">
					<li class="header_signin" >   
						<a class="header_signin_a" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
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
			<a class="header_myaccount_a" href="/users/{{$id}}">
				@if($user)
					{{$name}}'s 
				@else
					My
				@endif
				Account
			</a>
			</li>
			<li class="header_logout" >
			<a class="header_logout_a" href="/users/logout" >Logout</a>
			</li>
			</ul>
			</div>		
		@endif
			
		<div class=" col-sm-1 col-md-1 ">
			<select  name="location_id" class="header_location_dropdown">
				@if(isset($locations))
					@foreach ($locations as $data)
                        <option value={{$data->location_id}}
                            @if(isset($location_id))
                            {{($location_id==$data->id)?
                            'selected="selected"':''}}
                            @else{{"Input::old('location_id')"}}
                            @endif>
                            {{$data->location}}
                        </option>
                    @endforeach
				@endif
			</select>
		</div>
	</div>
@show