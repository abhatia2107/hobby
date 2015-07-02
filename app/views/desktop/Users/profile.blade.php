@extends('Layouts.layout')
@section('pagestylesheet')
<style type="text/css">

.uac_profile li { margin: 10px;}

.uac_profile_itmes {margin: 15px 0px 19px 20px;font-size: 17px; }

</style>
<?php 
  $nav_item = 1;
?>
@stop
@section('content')
<div class="container user_account_page">
  <div class="col-md-12 col-lg-10 col-sm-12 col-xs-12 uac_container col-lg-offset-1">
      <div class="col-md-3 col-sm-4 col-xs-12 col-lg-3">
        @include('Users.sidebar')        
      </div>
      <div class="col-md-9 col-sm-8 col-xs-12 col-lg-9">
        <div class="uac_profile">          
          <div class="uac_sidebar_header">
            {{$user->user_name}}
          </div>
          <div class="uac_profile_itmes">
            <li><span class="uac_profile_item" >NAME : {{$user->user_name}}</span></li>
            <li><span class="uac_profile_item" >EMAIL ID : {{$user->email}}</span></li>
            <li><span class="uac_profile_item" >MOBILE NUMBER : {{$user->user_contact_no}}</span></li>
            <li><span class="uac_profile_item" >REFERRAL CODE: {{$user->user_referral_code}}</span></li>            
            <li><span class="uac_profile_item" >HOBBYIX WALLET: Rs. {{$user->user_wallet}}/- (Invite your friends and get Rs. 100/- off on your next purchase)</span></li>
            @if($user->user_pending_referral)
              <li><span class="uac_profile_item" >PENDING REFERRAL AMOUNT: Rs. {{$user->user_pending_referral}}/- (We'll credit it to your hobbyix wallet once your friend buys our membership.)</span></li>
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