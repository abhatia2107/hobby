@extends('layouts.layoutdef')
@section('pagestylesheet')
  <link href="/css/bootstrap/css/jquery-ui.css" rel="stylesheet">
@stop
@section("contents")
  @if($errors->has())
    @foreach($errors->all() as $error)
      <p>{{ $error }}<br>
    @endforeach
  @endif
  @if(Session::has('message'))
      <p>{{Session::get('message')}}
  @endif

<div class="container main-container headerOffset">
<div class="main container">
		<div class="col-md-5 col-sm-7 col-xs-12">
			<form  role="form" method="post" action="">
				<div class="form-group">
					<h3 class="heading">Submit a request</h3>
				</div>
			<div class="form-group">
		    	<label>Email</label>
		        <input type="text" class="form-control"  placeholder="Email" name="email">
			</div>
			<div class="form-group">
		    	<label>Subject</label>
		        <input type="text" class="form-control"  placeholder="Subject of the issue" name="subject">
			</div>
			<div class="form-group">
		    	<label>Description</label>
		        <textarea rows="5" class="form-control"  placeholder="Tell us more about the issue." name="description"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="submit">Submit</button>
			</div>
			<div class="box-content">
					<h6><br/>Submit a request for assistance and we'll notify you as soon as possible.</h6>
			</div>
		</form>
		</div>
	</div>
  </div>
  <!--/row-->
  
  <div style="clear:both"></div>
</div>

@stop
@section('pagejavascript')
    <script src="/css/bootstrap/js/jquery-ui.js"></script>
@stop