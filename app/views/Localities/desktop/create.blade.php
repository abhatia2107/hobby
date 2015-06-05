@extends('Layouts.desktop.layout')
@section('content')
    <form role="form" action="@if(isset($localityDetails)){{"/localities/update/$localityDetails->id"}}@else{{"/localities/store"}}@endif" method="post" enctype="multipart/form-data">
  		<input type="text" class="form-control" tabindex=1 placeholder="Locality Name" name="locality" value="@if(isset($localityDetails)){{$localityDetails->locality}}@else{{Input::old('locality')}}@endif" required>
  		<div class="form-group required">
			<label>Locations<sup>*</sup> </label>
			<select class="form-control" tabindex=7 name="locality_location_id" required>
			@foreach ($locations as $data)
				<option value={{$data->id}} 
					@if(isset($localityDetails)) 
						{{($localityDetails->locality_location_id==$data->id)?
							'selected="selected"':''}}
					@else{{"Input::old('locality_location_id')"}}
					@endif>
					{{$data->location}}
				</option>
			
			@endforeach
			</select>
		</div>
	<input type="submit" id="submit" value="Submit">
	<input type="button" id="submit" value="Cancel">
    </form>
@stop