@extends('Layouts.layout')
@section('content')
<div class="container main-container headerOffset">

  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li><a href="/blankpage">Home</a> </li>
        <li><a href="/login"> Sign In</a> </li>
        <li class="active">Reset your password</li>
      </ul>
    </div>
  </div>
  
  <div class="row">
  
    <div class="col-lg-9 col-md-9 col-sm-7">
      <h1 class="section-title-inner"><span><i class="fa fa-lock"></i> Reset Your Password</span></h1>
      
      <div class="row userInfo">
      @if($errors->has())
    <div class="bs-callout bs-callout-danger">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
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
  
        
        <div class="col-xs-12 col-sm-6">
          <form role="form" method="POST" action="/password/reset/submit">
            <div class="form-group">
              <label>Email address</label>
              <input type="hidden" name="user_csrf_token" value="{{ $token }}">
              <input type="email" class="form-control"  placeholder="Enter email" name="user_email">
            </div>
            <div class="form-group">
              <label>New Password</label>
              <input type="password" class="form-control"  placeholder="New Password" name="password">
            </div>
            <div class="form-group">
              <label> Confirm Password</label>
              <input type="password" class="form-control"  placeholder="Confirm Password" name="password_confirmation">
            </div>
            
            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Submit</button>
          </form>
        </div>
      </div>
      <!--/row end--> 
      
    </div>
    
    <div class="col-lg-3 col-md-3 col-sm-5"> </div>
  </div> <!--/row-->
  
  <div style="clear:both"></div>
</div>

@stop