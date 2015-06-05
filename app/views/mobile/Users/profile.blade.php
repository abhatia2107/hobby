@extends('Layouts.layout')
@section('pagestylesheet')
<style type="text/css">

.uac_profile li { margin: 5px;}

.uac_profile_itmes {margin: 10px 0px 5px 0px;font-size: 14px; }

</style>
<?php 
  $nav_item = 1;
?>
@stop
@section('content')
<div class="container user_account_page">
  <div class="col-xs-12 uac_container">
      <div class="col-xs-12">
        @include('Users.sidebar')        
      </div>
      <div class="col-xs-12">
        <div class="uac_profile">          
          <div class="uac_sidebar_header">
            My Profile            
          </div>
          <div class="uac_profile_itmes">
            <li><span class="uac_profile_item" >NAME : </span></li>
            <li><span class="uac_profile_item" >EMAIL ID : </span></li>
            <li><span class="uac_profile_item" >MOBILE NUMBER : </span></li>
            <li><span class="uac_profile_item" >CITY : </span></li>
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