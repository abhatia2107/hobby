@section("header")
  	<style>
	  	.search-box{
	  		width:100%
	  	}
  	</style>
	<div class="clearfix header_row1">
		<div class=" col-sm-2 col-md-2  ">
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
			}
		?>
		@if(!$id)
			<div class=" col-sm-3 col-md-3 userInfoListing" >
				<div class="login">
					<a href="#" data-toggle="modal" data-target="#loginModal">LOGIN TO HOBBYIX</a>
					<!--&nbsp;&nbsp;|&nbsp;&nbsp;
					<a href="#" data-toggle="modal" data-target="#signupModal">Sign Up</a> -->
				</div>
			</div>
		@else
			<div class=" col-sm-3 col-md-3 userInfoListing ">
			<span class="user_account">			 
			<a href="/users/show/{{$id}}">
				@if($user)
					{{$name}}
				@else
					My Account
				@endif
			</a>&nbsp;|&nbsp;</span>
			<a href="/users/logout" >Logout</a>			
			</div>		
		@endif
			
		<div class="col-sm-1 col-md-1">
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