@extends('Layouts.layout')
@section('content')
	        <form>
          <fieldset id="inputs">
		<input id="username" type="text" name="category" placeholder="Category Name" required>  
          </fieldset>
          <fieldset id="actions">
            
		<input type="submit" id="submit" value="Submit">
<input type="button" id="submit" value="Cancel">
          </fieldset>
        </form>
@stop