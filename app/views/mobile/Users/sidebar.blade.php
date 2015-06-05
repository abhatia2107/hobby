@section("sidebar")
<style type="text/css">

.user_account_page {
  background:#f0f3f6;min-height: 420px;width: 100%;color: #333;
}

.uac_container { margin-top: 15px;padding: 0px;}

.uac_sidebar, .uac_profile, .uac_orders { font-family: 'Open Sans',sans-serif;background: none repeat scroll 0% 0% #FFF;
  border: 1px solid #E8E8E8;padding: 10px 10px 10px 10px;margin-bottom: 10px; }

.uac_sidebar_header{  padding: 3px 15px 2px 15px;border-bottom:1px solid;border-color: #20cfb1;font-size: 21px;color: #333;text-align: center;} 

.uac_credits_container {padding: 5px 10px;font-size: 19px;border-bottom:1px solid;border-color: #20cfb1;}

.uac_credits_container .fa {color:  #20cfb1;font-size: 20px;text-align: left;}

.uac_nav_items {font-size: 14px;margin: 10px 10px 10px 0px;width: 100%;padding-right: 0px;}

.uac_nav_items li { margin-top: 3px;width: 100%;padding:3px 0px 3px 10px;}

.uac_nav_items a { text-decoration: none;color: #333}

.uac_nav_items .active { background: #E2E2E2;}

</style>
<?php
  $id=Auth::id();
?>
<div class="uac_sidebar">
  <div class="uac_sidebar_header">
    userName            
  </div>
  <div class="uac_credits_container">
      <span class="fa fa-credit-card"></span>
      30 Credits
  </div>
  <div class="uac_nav_items">
    <li @if($nav_item==1) class="active" @endif> <a href="/users/MyProfile">My Profile</a></li>
    <li @if($nav_item==2) class="active" @endif> <a href="/users/MyOrders">My Orders</a> </li>
    <li @if($nav_item==3) class="active" @endif> <a href="/users/show/{{$id}}">Change Password</a> </li>
  </div>
</div>
@show