@extends('Layouts.mobile.layout')
@section('pagestylesheet')
    <link rel="stylesheet" type="text/css" href="/assets/css/jquery.richtextarea.css" />
@stop
@section('content')
<div class="home_vendor_page">
  @include('Templates.mobile.navbarVendor')
  <div class="container">
    @include('Modals.mobile.venue')
   </div>
</div>
@stop
@section('pagejavascript')
    <script type="text/javascript"  src="/assets/js/moment-2.8.4.min.js"></script>
    <script type="text/javascript"  src="/assets/js/jquery.richtextarea.min.js"></script>
@stop
