@extends('Layouts.layout')
<style type="text/css">

.user_account_page {  background:#f0f3f6;min-height: 320px;width: 100%;color: #333;}

.uac_sidebar_header{  padding: 3px 15px 2px 15px;border-bottom:1px solid;border-color: #20cfb1;font-size: 21px;color: #333;text-align: center;} 

.uac_profile li { margin: 5px;}

.uac_sidebar, .uac_profile, .uac_orders { font-family: 'Open Sans',sans-serif;background: none repeat scroll 0% 0% #FFF; border: 1px solid #E8E8E8;padding: 10px 10px 10px 10px;margin-bottom: 10px; }


.uac_change_password {background: white;padding: 15px 15px 0px 15px;}

.uac_change_password input[type=password] {height: 30px; padding:2px 5px;}

.uac_change_password button {height: 30px;padding: 2px 10px;border-radius: 2px;}

</style>
@section('content')
<div class="container user_account_page" style="margin:0px;padding:0px">
  	<div class="col-xs-12 uac_container" style="margin:40px 0px;padding:0">	   	  
	    <div class="col-xs-12" style="margin:0px;padding:0px">	    	
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