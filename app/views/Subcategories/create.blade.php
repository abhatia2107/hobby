@extends('Layouts.layout')
@section('content')
    <form role="form" action="@if(isset($subcategoryDetails)){{"/subcategories/update/$subcategoryDetails->id"}}@else{{"/subcategories/store"}}@endif" method="post" enctype="multipart/form-data">
  		<input type="text" class="form-control" tabindex=1 placeholder="SubCategory Name" name="subcategory" value="@if(isset($subcategoryDetails)){{$subcategoryDetails->subcategory}}@else{{Input::old('subcategory')}}@endif" required>
  		<div class="form-group required">
			<label>Category<sup>*</sup> </label>
			<select class="form-control" tabindex=7 name="subcategory_category_id" required>
			@foreach ($all_categories as $data)
				<option value={{$data->id}} 
					@if(isset($subcategoryDetails)) 
						{{($subcategoryDetails->subcategory_category_id==$data->id)?
							'selected="selected"':''}}
					@else{{"Input::old('subcategory_category_id')"}}
					@endif>
					{{$data->category}}
				</option>
			
			@endforeach
			</select>
		</div>
	<input type="submit" id="submit" value="Submit">
	<input type="button" id="submit" value="Cancel">
    </form>
@stop