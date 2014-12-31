@extends('Layouts.layout')
@section('pagestylesheet')
	<!-- styles needed by minimalect -->
	<link href="/assets/css/jquery.minimalect.min.css" rel="stylesheet">
	<!-- styles needed by checkRadio -->
	<link href="/assets/css/ion.checkRadio.css" rel="stylesheet">
	<link href="/assets/css/ion.checkRadio.cloudy.css" rel="stylesheet">
@stop
@section('content')
	<div class="container main-container headerOffset">

  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li><a href="/">Home</a> </li>
        <li class="active"> Sign In </li>
      </ul>
    </div>
  </div>
    @if($errors->has())
    <div class="bs-callout bs-callout-danger">
    @foreach($errors->all() as $error)
    <div class="alert alert-danger fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-times-circle fa-fw fa-lg"></i>
            <p><strong>OOPS!</strong> {{ $error }}</p>
    </div>
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
  
    <div class="col-lg-12 col-md-12 col-sm-12">
      <h1 class="section-title-inner"><span><i class="fa fa-lock"></i> Sign In</span></h1>
      
      <div class="row userInfo">
        <div class="col-lg-12">
          
          <h2 class="block-title-2"> Already Registered? </h2>
          <p class="required"><sup>*</sup> Required field</p>
        </div>
        
        
          <form role="form" method="post" action="/authenticate">
            <div class="col-xs-10 col-sm-5 col-md-4">
            <div class="form-group  required">
              <label>Email address <sup>*</sup> </label>
              <input type="hidden" name="user_csrf_token" value="{{ csrf_token() }}">
              <input type="email" class="form-control"  placeholder="Email" name="user_email" value="{{Input::old('user_email')}}">
            </div>
            <div class="form-group  required">
              <label>Password <sup>*</sup> </label>
              <input type="password" class="form-control" placeholder="password" name="password" >
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="remember" >
                Remember me </label>
            </div>
            <div class="form-group">
              <ul>
                <li class="pull-left"><a title="Recover your forgotten password" href="/resetpassword">Forgot your password? </a></li>
              </ul>
            </div>
            <br/>  
            <br/>
            <div class="form-group">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-sign-in"> </i> Sign In </button>
            </div>
          </div>
        </form>
          
        <div class="col-xs-5 col-sm-2 col-md-2 hidden-800">
          <div class="col-xs-6 col-sm-6 col-md-6 line"></div>
        </div>
          <div class="col-xs-10 col-sm-5 col-md-4 center">
            <div class="control-group"> 
              <label>&nbsp;</label>
              <a class="fb_button btn btn-primary" href="/login/fb"><i class=" fa fa-facebook"></i> &nbsp;SIGN IN VIA FACEBOOK</a> 
            </div>
            <div>
              <br/><br/>
              <div>
                <a class= "btn btn-block btn-primary" href="/signup">SIGN UP</a>
              </div>
            </div>
          </div>     
      </div>
      <!--/row end--> 
      
    </div>
    
  </div> <!--/row-->
  
  <div style="clear:both"></div>
</div>

@endsection
@section('pagejavascript')
	<!-- include checkRadio plugin //Custom check & Radio  --> 
	<script type="text/javascript" src="/assets/js/ion-checkRadio/ion.checkRadio.min.js"></script> 
	<!-- include grid.js // for equal Div height  --> 
	<script src="/assets/js/grids.js"></script> 
@stop