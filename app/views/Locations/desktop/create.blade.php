@extends('Layouts.desktop.layout')
@section('content')
	    <form role="form" action="@if(isset($locationDetails)){{"/locations/update/$locationDetails->id"}}@else{{"/locations/store"}}@endif" method="post" enctype="multipart/form-data">
      		<input type="text" class="form-control" tabindex=1 placeholder="Location Name" name="location" value="@if(isset($locationDetails)){{$locationDetails->location}}@else{{Input::old('location')}}@endif" required>
		<input type="submit" id="submit" value="Submit">
		<input type="button" id="submit" value="Cancel">
        </form>
@stop