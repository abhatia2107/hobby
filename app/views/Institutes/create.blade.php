<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Add an institute</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/formoid1/formoid-metro-cyan.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-theme.min.css">
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">
  @if($errors->has())
    <div class="alert alert-block alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="fa fa-times-circle fa-fw fa-lg"></i>{{Lang::get('institute.institute_create_failed')}}</h4>
        @foreach($errors->all() as $error)
            <p>{{ $error }}<br></p>
        @endforeach
    </div>
  @endif


<div class="col-md-4">
    
</div>
<div class="col-md-4">

<!-- Start Formoid form-->
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
                <select name="institute_location_id" required="required">
                    <!-- <option value="$instituteDetails->institute_location_id"selected>@if(isset($instituteDetails)){{$instituteDetails['institute_location']}}@else{{Input::old('institute_location')}}@endif</option> -->
                    @foreach ($all_locations as $data)
                        <option value="{{$data->location_id}}" selected="@if(isset($instituteDetails)){{"selected"}}@else{{"unselected"}}@endif">
                            {{$data->location}}
                        </option>
                    @endforeach
                </select><i></i>
            </span>
        </div>
    </div>
    <div class="element-url" title="Website">
        <label class="title">
            Website
        </label>
        <input class="large" type="url" name="institute_website" value="@if(isset($instituteDetails)){{$instituteDetails->institute_website}}@else{{Input::old('institute_website')}}@endif"/>
    </div>
    <div class="element-input" title="Facebook Page"><label class="title">Facebook Page</label><input class="large" type="text" name="institute_fblink" value="@if(isset($instituteDetails)){{$instituteDetails->institute_fblink}}@else{{Input::old('institute_fblink')}}@endif"/></div>
    <div class="element-input" title="Twitter Profile"><label class="title">Twitter Profile</label><input class="large" type="text" name="institute_twitter" value="@if(isset($instituteDetails)){{$instituteDetails->institute_twitter}}@else{{Input::old('institute_twitter')}}@endif"/></div>
    <div class="submit"><input type="submit" value="Submit"/></div></form>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/assets/formoid1/formoid-metro-cyan.js"></script>

<!-- Stop Formoid form-->

</div>
<div class="col-md-4">
    
</div>

</body>
</html>
