@extends('Layouts.layout')
@section('content')
<div class="container main-container headerOffset">
  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li> <a href="/"> Home </a> </li>
        <li class="active"> Forgot your password </li>
      </ul>
    </div>
  </div>
    @if($errors->has())
    @foreach($errors->all() as $error)
      <p>{{ $error }}<br>
    @endforeach
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
      <h1 class="section-title-inner"> 
        <span> 
          <i class="fa fa-unlock-alt"> </i> 
          Forgot your password? 
        </span> 
      </h1>
      <div class="row userInfo">
        <div class="col-xs-12 col-sm-12">
          <p> To reset your password, enter the email address which you use to login. We will then send you a link to change the password </p>
          <form role="form" method="POST" action="/resetpassword/submit">
            <div class="form-group">
            <input type="hidden" name="user_csrf_token" value="{{ csrf_token() }}">
              <label for="exampleInputEmail1" > Email address </label>
              <input  type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="user_email">
            </div>
            <button type="submit" class="btn   btn-primary"> <i class="fa fa-unlock"> </i> Retrieve Password </button>
          </form>
          <div class="clear clearfix">
            <ul class="pager">
              <li class="previous pull-right"> <a href="account-1.html"> &larr; Back to Login </a> </li>
            </ul>
          </div>
        </div>
      </div>
      <!--/row end--> 
      
    </div>
    <div class="col-lg-3 col-md-3 col-sm-5"> </div>
  </div>
  <!--/row-->
  <div style="clear:both"> </div>
</div>
@stop