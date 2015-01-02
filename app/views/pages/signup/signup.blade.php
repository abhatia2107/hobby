@extends('Layouts.layout')
@section('pagestylesheet')
  <!-- styles needed by minimalect -->
  <link href="/assets/css/jquery.minimalect.min.css" rel="stylesheet">

  <div class="container main-container headerOffset">

  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li><a href="index.html">Home</a> </li>
        <li class="active"> Sign Up</li>
      </ul>
    </div>
  </div>
  @stop
@section('content')
  @if($errors->has())
    <div class="alert alert-block alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="fa fa-times-circle fa-fw fa-lg"></i>Oh snap! You got an error!</h4>
        @foreach($errors->all() as $error)
            <p>{{ $error }}<br>
        @endforeach
    </div>
  @endif
  @if(Session::has('message'))
      <p>{{Session::get('message')}}
  @endif
  <div class="row">
  
    <div class="col-lg-9 col-md-9 col-sm-7">
      <h1 class="section-title-inner"><span><i class="fa fa-lock"></i> Sign Up</span></h1>
      
      <div class="row userInfo">
         <div class="col-lg-12">
        
          <h2 class="block-title-2"> Create an account </h2>
          <p class="required"><sup>*</sup> Required field</p>
        </div>
        <form role="form" method="post" action="/signup/submit" enctype="multipart/form-data">
          <div class="col-xs-12 col-sm-6">
           
            
              <div class="form-group required">
                <label >First Name <sup>*</sup> </label>
                 <input type="hidden" name="user_csrf_token" value="{{ csrf_token() }}">
                 <input type="text" class="form-control"  placeholder="First Name" name="user_first_name" value="{{Input::old('user_first_name')}}" required>
              </div>
              <div class="form-group  required">
                <label >Last Name <sup>*</sup> </label>
               <input type="text" class="form-control"  placeholder="Last Name" name="user_last_name" value="{{Input::old('user_last_name')}}" required>
              </div>
              <div class="form-group  required">
                <label >Email address <sup>*</sup> </label>
                <input type="email" class="form-control"  placeholder="Email" name="user_email" value="{{Input::old('user_email')}}" required>
              </div>   
          </div>
          <div class="col-xs-12 col-sm-6">
              <div class="form-group required">
                <label>Password <sup>*</sup> </label>
                <input type="password" class="form-control"  placeholder="Password" name="password" required>
              </div>
              <div class="form-group required">
                <label>Confirm Password <sup>*</sup> </label>
                <input type="password" class="form-control"  placeholder="Confirm Password" name="password_confirmation" required>
              </div>
              
          </div>
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <button type="submit" class="btn  btn-primary"><i class="fa fa-user"></i> Create an account</button>
              <button type="reset" class="btn btn-primary"><i class="fa fa-power-off"></i> &nbsp; Reset</button>
            </div>
          </div>
        </form>
      </div>
      <!--/row end--> 
      
    </div>
    
    <div class="col-lg-3 col-md-3 col-sm-5"> </div>
  </div> <!--/row-->
  
  <div style="clear:both"></div>
</div>

@endsection
@section('pagejavascript')
  <!-- include grid.js // for equal Div height  --> 
  <script src="/assets/js/grids.js"></script> 
@stop