@extends('Layouts.layout')
@section('content')
    <div class="clearfix" id="errorMsgPage">
    	<h1>It looks like, you've put some wrong URL.!!!</h1>
    	<h2>
	    	If you think there is some bug in the website. Please take 2 minutes and drop a message at our feedback page about the issue.
	    	And our team will look into it soon.
    	</h2>
    	<a class="btn btn-danger" href="/feedbacks/create" type="button" >Feedback</a>
    	Continue to our <a href="{{URL::to('/')}}">website.</a>    	
    </div>
@stop