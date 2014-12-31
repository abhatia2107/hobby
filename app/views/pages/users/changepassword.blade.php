@extends('Layouts.layout')
@section('pagestylesheet')
  <link href="/css/bootstrap/css/jquery-ui.css" rel="stylesheet">
@stop
@section('content')

<div class="container main-container headerOffset">
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
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li><a href="index.html">Home</a> </li>
        <li><a href="account.html">My Account</a> </li>
        <li class="active">Change Password</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7">
      <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-lock"></i> Change Password</span></h1>
      <div class="row userInfo">
        <div class="col-lg-12">
          <h2 class="block-title-2"> Please be sure to update your company's information if it has changed. </h2>
          <p class="required"><sup>*</sup> Required field</p>
        </div>
        <form method="post" action="/changepassword/submit">
          <div class="col-xs-12 col-sm-6">
          <div class="form-group required">
              <label for="InputPasswordnew"> Current Password<sup>*</sup> </label>
              <input type="hidden" name="user_csrf_token" value="{{ csrf_token() }}">
              <input type="password"  name="current_password" class="form-control" id="InputPasswordnew">
            </div>
            <div class="form-group required">
              <label for="InputPasswordnew"> New Password<sup>*</sup> </label>
              <input type="password"  name="password" class="form-control" id="InputPasswordnew">
            </div>
            <div class="form-group required">
              <label for="InputPasswordnewConfirm"> Confirm Password<sup>*</sup></label>
              <input type="password"  name="password_confirmation" class="form-control" id="InputPasswordnewConfirm">
            </div>
          </div>
          <div class="col-lg-12">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; Change Password </button>
          </div>
       </form>
        <div class="col-lg-12 clearfix">
          <ul class="pager">
            <li class="next pull-left"><a href="/myaccount"> &larr; Back to My Account</a></li>
          </ul>
        </div>
      </div>
      <!--/row end--> 
      
    </div>
    <div class="col-lg-3 col-md-3 col-sm-5"> </div>
  </div>
  <!--/row-->
  
  <div style="clear:both"></div>
</div>

@stop
@section('pagejavascript')
    <script src="/css/bootstrap/js/jquery-ui.js"></script>
@stop