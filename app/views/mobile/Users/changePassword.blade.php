@extends('Layouts.layout')
<style type="text/css">
.uac_change_password {background: white;padding: 15px 15px 0px 15px;}

.uac_change_password input[type=password] {height: 30px; padding:2px 5px;}

.uac_change_password button {height: 30px;padding: 2px 10px;border-radius: 2px;}

</style>
@section('content')
<?php $nav_item = 3; ?>
<div class="container user_account_page">
  	<div class="col-xs-12 uac_container">
	   	<div class="col-xs-12">
        	@include('Users.sidebar')
      	</div>      	
	    <div class="col-xs-12" >	    	
	    	<div class="uac_orders" style="background:white !improtant"> 
	      		<div class="uac_sidebar_header">
	            	Change Password       
	          	</div>
	          	<form role="form" class="uac_change_password" method="post" enctype="multipart/form-data" action="/users/changepassword/submit">					
					<div class="form-group required">
					<label for="InputPasswordnew"> Current Password<sup>*</sup> </label>
					<input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
					<input type="password"  name="current_password" class="form-control" id="InputPasswordnew" required>
					</div>
					<div class="form-group ">
						<label for="InputPasswordnew">New Password<sup>*</sup></label>
						<input type="password"  name="password" class="form-control" id="InputPasswordnew" required>
					</div>
					<div class="form-group required">
					<label for="InputPasswordnewConfirm">Confirm Password<sup>*</sup></label>
					<input type="password"  name="password_confirmation" class="form-control" id="InputPasswordnewConfirm" required>
					</div>
					<div class="form-group venues-list-buttons">
					<button type="submit" class="btn btn-primary">Update Password</button>
					</div>						
				</form>				
      		</div>  
      	</div>   
  	</div>
</div>
<div class="space_footer"></div>
	
@stop