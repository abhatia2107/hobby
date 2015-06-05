@extends('Layouts.desktop.layout')
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
  <div class="col-md-10 col-sm-12 col-xs-12 uac_container col-md-offset-1">
      <div class="col-md-3 col-sm-4 col-xs-12">
        @include('Users.desktop.sidebar')        
      </div>
      <div class="col-md-9 col-sm-8 col-xs-12">
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