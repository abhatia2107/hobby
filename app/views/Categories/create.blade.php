@extends('Layouts.layout')
@section('content')
	    <form role="form" action="@if(isset($categoryDetails)){{"/categories/update/$categoryDetails->id"}}@else{{"/categories/store"}}@endif" method="post" enctype="multipart/form-data">
      		<input type="text" class="form-control" tabindex=1 placeholder="Category Name" name="category" value="@if(isset($categoryDetails)){{$categoryDetails->category}}@else{{Input::old('category')}}@endif" required>
		<input type="submit" id="submit" value="Submit">
		<input type="button" id="submit" value="Cancel">
        </form>
@stop