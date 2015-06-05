@extends('Layouts.desktop.layout')
@section('content')
    <div class="clearfix" id="errorMsgPage">
    	<h1>It looks like, you've put some wrong URL.!!!</h1>
    	<h2>
	    	Please take 2 minutes and drop a message at our feedback page about the issue.
	    	And our team will look into it soon.
    	</h2>
    	<a class="btn btn-danger" href="/feedbacks/create" type="button" >Feedback</a>
    	<a href="{{URL::to('/')}}">Home</a>
    </div>
@stop