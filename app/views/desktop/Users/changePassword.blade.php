@extends('Layouts.layout')
@section('content')
<style type="text/css">
.uac_change_password {margin-top: 20px !important;}
</style>
<?php $nav_item = 3; ?>
<div class="container user_account_page">
  <div class="col-md-10 col-sm-12 col-xs-12 uac_container col-md-offset-1">
      <div class="col-md-3 col-sm-4 col-xs-12">
         @include('Users.sidebar')
      </div>
      <div class="col-md-9 col-sm-4 col-xs-12">
      	<div class="uac_orders row">
      		<div class="uac_sidebar_header">
            	Change Password       
          	</div>          
		    <form role="form" class="uac_change_password" method="post" enctype="multipart/form-data" action="/users/changepassword/submit">
		    	<div class="col-xs-12 col-md-3 col-sm-3"></div>
				<div class="col-xs-12 col-sm-6 col-md-6">
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
				</div>
				<div class="col-xs-12 col-md-3 col-sm-3"></div>
			</form>
		</div>
      </div>      
  </div>
</div>
<div class="space_footer"></div>
	
@stop