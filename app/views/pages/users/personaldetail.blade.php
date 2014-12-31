@extends('Layouts.layout')
@section('pagestylesheet')
  <link href="/css/bootstrap/css/jquery-ui.css" rel="stylesheet">
@stop
@section('content')



<div class="container main-container headerOffset">

  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li><a href="/">Home</a> </li>
        <li><a href="/myaccount">My Account</a> </li>
        <li class="active"> Personal Detail </li>
      </ul>
    </div>
  </div>
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
            <strong>OOPS!</strong><div id="image_error"></div> {{Session::get('failed')}}        
    </div>

  @endif
  <div class="alert alert-danger fade in" role="alert" id="size" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-times-circle fa-fw fa-lg"></i>
            <strong>OOPS!</strong><div id="image_error"></div>       
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
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7">
      <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-user"></i> My personal information </span></h1>
      <div class="row userInfo">
        <div class="col-lg-12">
          <h2 class="block-title-2"> Please be sure to update your personal information if it has changed. </h2>
          <a href="/changepassword" tabindex=12 class="btn btn-primary pull-right"><i class="fa fa-power-off"></i> &nbsp; Change Password</a>
          <p class="required"><sup>*</sup> Required field</p>
        </div>
        <form method="post" action="/update/personaldetail/submit" enctype="multipart/form-data" >
          <div class="col-md-6">
            <div class="form-group required">
              <label for="InputName">First Name <sup>*</sup> </label>
              <input type="hidden" name="user_csrf_token" value="{{ csrf_token() }}">
              <input required type="text" tabindex=1 class="form-control" id="InputName" placeholder="First Name" name="user_first_name" value="@if(isset($userPersonalDetail)){{$userPersonalDetail->user_first_name}}@endif">
            </div>
            <div class="form-group">
              <label for="InputEmail"> Email <sup>*</sup></label>
              <input required type="email" class="form-control" id="InputEmail" placeholder="gtanim@gmail.com" name="user_email" value="@if(isset($userPersonalDetail)){{$userPersonalDetail->user_email}}@endif" readonly>
            </div>  
            <div class="form-group">
              <label>Mobile No.</label>
              <input  type="text" tabindex=4 class="form-control" id="mobile_no" placeholder="Eg.9999999999" name="user_mobile_no" value="@if(isset($userPersonalDetail)){{$userPersonalDetail->user_mobile_no}}@endif">
            </div>                
            <div id="fb" class="form-group">
              <label .disabled>www.facebook.com/</label>
              <input type="text" class="form-control" tabindex=5 name="user_username" placeholder="Your Facebook Profile" value="@if(isset($userPersonalDetail)){{$userPersonalDetail->user_username}}@endif" >
            </div>
            <div class="form-group"> 
              <label>Profile Picture</label>
              <div>
                <input type="file" id="event_logo" tabindex=7 name="user_profile_pic" >
              </div>
            </div>  
          </div>
          <div class="col-md-6">
            <div class="form-group required">
              <label for="InputLastName">Last Name <sup>*</sup> </label>
              <input required type="text" tabindex=2 class="form-control" id="InputLastName" placeholder="Last Name" name="user_last_name" value="@if(isset($userPersonalDetail)){{$userPersonalDetail->user_last_name}}@endif">
            </div>
            <div class="form-group">
              <label for="Address">Address</label>
              <textarea name="user_address" tabindex=3 class="form-control" placeholder="Your address"  rows="4" > @if(isset($userPersonalDetail)){{$userPersonalDetail->user_address}}@else{{Input::old('user_address')}}@endif </textarea>
            </div>
            <div class="form-group">
                <label>City</label>
                <input  type="text" tabindex=6 class="form-control" id="city" placeholder="Eg.Kathmandu" name="user_city" value="@if(isset($userPersonalDetail)){{$userPersonalDetail->user_city}}@else{{Input::old('user_city')}}@endif">
            </div> 
          </div>
            <div class="col-lg-12 col-sm-12">
              <div class="form-group">
                <button type="submit" tabindex=9 class="btn btn-primary" id="set" disabled><i class="fa fa-save"></i> &nbsp; Save </button>
                <button type="reset" tabindex=10 class="btn btn-primary"><i class="fa fa-power-off"></i> &nbsp; Reset</button>
              </div>
            </div>    
        </form>
        <div class="col-lg-12 clearfix">
          <ul class="pager">
            <li class="next pull-right"><a href="/myaccount"  tabindex=11> &larr; Back to My Account</a></li>
          </ul>
        </div>
       <!--/row end-->
       </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-5"> </div>
  </div>
  <!--/row-->
  
  <div style="clear:both"></div>

@stop
@section('pagejavascript')
    <script src="/css/bootstrap/js/jquery-ui.js"></script>
    <script>


      document.getElementById("set").disabled=false;
      document.getElementById("size").style.display="none";
      document.getElementById('event_logo').addEventListener('change', checkFile, false);
approveletter.addEventListener('change', checkFile, false);

function checkFile(e) {

    var file_list = e.target.files;

    for (var i = 0, file; file = file_list[i]; i++) {
        var sFileName = file.name;
        var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
        var iFileSize = file.size;
        var iConvert = (file.size / 10485760 ).toFixed(2);

        if ( iFileSize > 2097152) {
          
            txt = "Size of profile pic should be less than 2MB";
            document.getElementById('image_error').innerHTML=txt;
            document.getElementById("set").disabled=true;
            document.getElementById("size").style.display="block";
        }
        else
        {
          document.getElementById("set").disabled=false;
        }
    }
}


    </script>
@stop
@section('pagejquery')
  <script>
    $(function() {
      var availableTags = [
        "Kathmandu",
        "Pokhara",
        "Bharatpur",
        "Lalitpir",
        "Butwal",
        "Biratnagar",
        "Birganj",
        "Dhangadhi",
        "Bhim Datta"
      ];
      $( "#city" ).autocomplete({
        source: availableTags
      });
    });
  </script>
@stop