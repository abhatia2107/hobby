@section("sidebar")
<style type="text/css">

.user_account_page {
  background:#f0f3f6;min-height: 420px;width: 100%;color: #333;
}

.uac_container { margin-top: 50px;}

.uac_sidebar, .uac_profile, .uac_orders { font-family: 'Open Sans',sans-serif;background: none repeat scroll 0% 0% #FFF;border: 1px solid #E8E8E8;padding: 10px 20px 10px 20px;margin-bottom: 10px; }

.uac_sidebar_header{  padding: 7px 15px 5px 15px;border-bottom:1px solid;border-color: #20cfb1;font-size: 21px;color: #333;text-align: center;} 

.uac_credits_container {padding: 10px 10px;font-size: 20px;border-bottom:1px solid;border-color: #20cfb1;}

.uac_credits_container .fa {color:  #20cfb1;font-size: 25px;text-align: left;}

.uac_container { margin-top: 50px;}

.uac_nav_items {font-size: 16px;margin: 10px 10px 10px 0px;width: 100%;padding-right: 0px;}

.uac_nav_items li { margin-top: 3px;width: 100%;padding:3px 0px 3px 10px;}

.uac_nav_items a { text-decoration: none;color: #333}

.uac_nav_items .active { background: #E2E2E2;}

</style>
<?php
  $id=Auth::id();
?>
<div class="uac_sidebar">
  <div class="uac_sidebar_header">
    {{$user->user_name}}    
  </div>
  @if($user->user_free_credits_left)
    <div class="uac_credits_container" title="Free Credits Gained For Sign Up">       
        Free Credits: {{$user->user_free_credits_left}} 
    </div>
  @endif 
  <div class="uac_credits_container" title="Hobbyix Membership Credits">
      <span class="fa fa-credit-card"></span>
      {{$user->user_credits_left}} Credits    
  </div>
  <div class="uac_credits_container" @if(!isset($user->user_credits_expiry)) style="display:none" @endif style="font-size:15px;" >
      <span  style="font-size:15px;" class="fa fa-calendar"></span>
      Valid Till: @if(isset($user->user_credits_expiry)){{date('d M Y',strtotime($user->user_credits_expiry))}}@else{{'-'}}@endif
  </div>
  <div class="uac_nav_items">
    <li @if($nav_item==1) class="active" @endif> <a href="/users/profile">My Profile</a></li>
    <li @if($nav_item==2) class="active" @endif> <a href="/users/orders">My Orders</a> </li>
    <li @if($nav_item==3) class="active" @endif> <a href="/users/changepassword">Change Password</a> </li>
  </div>
</div>
@show