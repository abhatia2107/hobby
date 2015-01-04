@extends('Layouts.layout')
@section('pagestylesheet')
    <link rel="stylesheet" href="/assets/formoid1/formoid-metro-cyan.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-theme.min.css">
@stop
@section('content')

<div class="col-md-4">
    
</div>
<div class="col-md-4">

<!-- Start form-->
<form enctype="multipart/form-data" class="formoid-metro-cyan form_create" action="@if(isset($instituteDetails)){{"/institutes/update/$instituteDetails->institute_id"}}@else{{"/institutes/store"}}@endif" method=post>
    <div class="title">
        <h2><span>
        @if(isset($instituteDetails)) 
            <i class="glyphicon glyphicon-pencil"></i>&nbsp; Edit Your Institute 
        @else
            <i class="glyphicon glyphicon-plus"></i>&nbsp; Add Your Institute 
        @endif 
        </span></h2>
        <p class="required"><sup>*</sup> Required field</p>
    </div>
    <div class="element-input" title="Name of the institute">
        <label class="title">
        Name of the institute
        <span class="required">*</span>
        </label>
        <input class="large" type="text" name="institute" value="@if(isset($instituteDetails)){{$instituteDetails->institute}}@else{{Input::old('institute')}}@endif" required="required"/>
    </div>
    <div class="element-textarea" title="Description of the institute">
    <label class="title">
    Tell us about your institute
    <span class="required">*</span>
    </label>
    <textarea class="medium" name="institute_description" cols="20" rows="5" required="required">
        @if(isset($instituteDetails)){{$instituteDetails->institute_description}}@else{{Input::old('institute_description')}}@endif
    </textarea>
    </div>
    <div class="element-select" title="City">
        <label class="title">
            City
            <span class="required">*</span>
        </label>
        <div class="large">
            <span>
                <select class="form-control" tabindex=7 name="institute_location_id" required>
                    @foreach ($all_locations as $data)
                        <option value={{$data->id}} 
                            @if(isset($batchDetails)) 
                                {{($batchDetails->institute_location_id==$data->id)?
                                    'selected="selected"':''}}
                            @else{{"Input::old('institute_location_id')"}}
                            @endif>
                            {{$data->location}}
                        </option>
                    
                    @endforeach
                </select>
            </span>
        </div>
    </div>
    <div class="element-url" title="Website">
        <label class="title">
            Website
        </label>
        <input class="large" name="institute_website" value="@if(isset($instituteDetails)){{$instituteDetails->institute_website}}@else{{Input::old('institute_website')}}@endif"/>
    </div>
    <div class="element-input" title="Facebook Page"><label class="title">Facebook Page</label><input class="large" type="text" name="institute_fblink" value="@if(isset($instituteDetails)){{$instituteDetails->institute_fblink}}@else{{Input::old('institute_fblink')}}@endif"/></div>
    <div class="element-input" title="Twitter Profile"><label class="title">Twitter Profile</label><input class="large" type="text" name="institute_twitter" value="@if(isset($instituteDetails)){{$instituteDetails->institute_twitter}}@else{{Input::old('institute_twitter')}}@endif"/></div>
    <input type="submit" value="Submit"/>
    </form>
    <!--
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/assets/formoid1/formoid-metro-cyan.js"></script>
    -->
<!-- Stop Formoid form-->

</div>
<div class="col-md-4">
    
</div>

@stop