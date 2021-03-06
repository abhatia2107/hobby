@extends('Layouts.layout')
@section('pagestylesheet')
<style type="text/css">

.user_account_page {  background:#f0f3f6;min-height: 320px;width: 100%;color: #333;margin: 0;padding: 0}

.uac_container { margin: 40px 0px;padding: 0px;}

.uac_sidebar_header{  padding: 3px 15px 2px 15px;border-bottom:1px solid;border-color: #20cfb1;font-size: 21px;color: #333;text-align: center;} 

.uac_profile li { margin: 7px 5px;}

.uac_profile  { font-family: 'Open Sans',sans-serif;background: none repeat scroll 0% 0% #FFF;border: 1px solid #E8E8E8;padding: 10px 10px 10px 10px;margin-bottom: 10px; }

.uac_profile_itmes {margin: 10px 0px 5px 0px;font-size: 15px; }

.uac_credits_container {padding: 5px 10px;font-size: 18px;border-bottom:1px solid;border-color: #20cfb1;}

.uac_credits_container .fa {color:  #20cfb1;font-size: 20px;text-align: left;}

</style>
<?php 
  $nav_item = 1;
?>
@stop
@section('content')
<div class="container user_account_page">
  <div class="col-xs-12 uac_container">    
      <div class="col-xs-12">
        <div class="uac_profile">          
          <div class="uac_sidebar_header">
            My Profile            
          </div>
          @if($user->user_free_credits_left)
            <div class="uac_credits_container">                
                Free Credits: {{$user->user_free_credits_left}} 
            </div>
          @endif
          <div class="uac_credits_container">
              <span class="fa fa-credit-card"></span>
              {{$user->user_credits_left}} Credits
          </div>
          <div class="uac_credits_container"  @if(!isset($user->user_credits_expiry)) style="display:none" @endif>
              <span class="fa fa-calendar"></span>
              Valid Till: @if(isset($user->user_credits_expiry)){{date('d M Y',strtotime($user->user_credits_expiry))}}@else{{'-'}}@endif
          </div>
          <div class="uac_profile_itmes">
            <li><span class="uac_profile_item" >NAME : {{$user->user_name}}</span></li>
            <li><span class="uac_profile_item" >EMAIL ID : {{$user->email}}</span></li>
            <li><span class="uac_profile_item" >MOBILE NUMBER : {{$user->user_contact_no}}</span></li>
            <li><span class="uac_profile_item" >REFERRAL CODE: {{$user->user_referral_code}}</span></li>            
            <li><span class="uac_profile_item" >HOBBYIX WALLET: Rs. {{$user->user_wallet}}/- <br/>(Invite your friends and get Rs. 100/- off on your next purchase)</span></li>
            @if($user->user_pending_referral)
              <li><span class="uac_profile_item" >PENDING REFERRAL AMOUNT: Rs. {{$user->user_pending_referral}}/- <br/>(We'll credit it to your hobbyix wallet once your friend buys our membership.)</span></li>
            @endif
          </div>
        </div>
      </div>
  </div>
</div>


@stop
@section('pagejquery')
<script src="/assets/js/jquery-ui-1.10.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () 
  {

  });
</script>
@stop