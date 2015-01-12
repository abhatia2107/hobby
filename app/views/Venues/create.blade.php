@extends('Layouts.layout')
@section('pagestylesheet')
    <link rel="stylesheet" type="text/css" href="/assets/css/jquery.richtextarea.css" />
@stop

@section('content')
	@include('Templates.navbarVendor')
    @include('Modals.venue')
@stop

@section('pagejavascript')
    <script type="text/javascript"  src="/assets/js/moment-2.8.4.min.js"></script>
    <script type="text/javascript"  src="/assets/js/jquery.richtextarea.min.js"></script>
@stop
