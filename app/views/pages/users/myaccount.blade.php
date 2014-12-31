@extends('Layouts.layout')
@section('pagestylesheet')
	<link id="pagestyle" rel="stylesheet" type="text/css" href="/assets/css/skin-1.css">
	<link href="/assets/css/ion.checkRadio.css" rel="stylesheet">
	<link href="/assets/css/ion.checkRadio.cloudy.css" rel="stylesheet">
	<link href="/assets/css/myaccount.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/assets/css/jquery.minimalect.min.css" media="screen" />

	
@end

@section('content')
<div class="container main-container headerOffset">
  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li><a href="/">Home</a> </li>
        <li class="active"> My account </li>
      </ul>
    </div>
  </div>
  @if($errors->has())
    <div class="alert alert-block alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="fa fa-times-circle fa-fw fa-lg"></i>Oh snap! You got an error!</h4>
        @foreach($errors->all() as $error)
            <p>{{ $error }}<br>
        @endforeach
    </div>
  @endif
  @if(Session::has('success'))
    <div class="alert alert-success fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-check-circle fa-fw fa-lg"></i>
            <strong>Well done!</strong> {{Session::get('success')}}        
    </div>

  @endif
  @if(Session::has('failed'))
    <div class="alert alert-danger fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-times-circle fa-fw fa-lg"></i>
            <strong>OOPS!</strong> {{Session::get('failed')}}        
    </div>

  @endif
  
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7">
      <h1 class="section-title-inner"><span><i class="fa fa-unlock-alt"></i> My account </span></h1>
      <div class="row userInfo">
        <div class="col-xs-12 col-sm-12">
          <p></p>
          <h2 class="block-title-2"><span>Welcome to your account. Here you can manage all of your personal information and Events.</span></h2>
          <ul class="myAccountList row">
            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center ">
              <div class="thumbnail equalheight"> <a title="Orders" href="/event/list"><i class="fa fa-tag"></i> My Events </a> </div>
            </li>
            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center ">
              <div class="thumbnail equalheight"> <a title="My addresses" href="/mycompany"><i  class="fa fa-briefcase"></i> My Companies</a> </div>
            </li>
            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center ">
              <div class="thumbnail equalheight"> <a title="Personal information" href="/update/personaldetail"><i class="fa fa-cog"></i> Personal Details</a> </div>
            </li>
            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center ">
              <div class="thumbnail equalheight"> <a title="My wishlists" href="wishlist.html"><i class="fa fa-thumbs-up"></i> Events Attending </a> </div>
            </li>
          </ul>
          <div class="clear clearfix"> </div>
        </div>
      </div>
      <!--/row end--> 
      
    </div>
    <div class="col-lg-3 col-md-3 col-sm-5"> </div>
  </div>
  <!--/row-->
  
  <div style="clear:both"></div>
</div>
@endsection
@section('pagejavascript')
	 <script>
    paceOptions = {
      elements: true
    };
</script>

<script src="/assets/js/pace.min.js"></script>
    <script type="text/javascript">
function swapStyleSheet(sheet){
document.getElementById('pagestyle').setAttribute('href', sheet);
}
</script>
<!-- include checkRadio plugin //Custom check & Radio  --> 
<script type="text/javascript" src="/assets/js/ion-checkRadio/ion.checkRadio.min.js"></script> 

<!-- include grid.js // for equal Div height  --> 
<script src="/assets/js/grids.js"></script> 
@endsection