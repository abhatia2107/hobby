<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Add a Venue</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/formoid1/formoid-metro-cyan.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-theme.min.css">
</head>

<body class="blurBg-false" style="background-color:#EBEBEB">
  @if($errors->has())
    <div class="alert alert-block alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="fa fa-times-circle fa-fw fa-lg"></i> {{Session::get('failure')}}</h4>
        @foreach($errors->all() as $error)
            <p>{{ $error }}<br></p>
        @endforeach
    </div>
  @endif


<div class="col-md-4">
    
</div>
<div class="col-md-4">

<!-- Start Formoid form-->
<form enctype="multipart/form-data" class="formoid-metro-cyan form_create" action="@if(isset($venueDetails)){{"/venues/update/$venueDetails->venue_id"}}@else{{"/venues/store"}}@endif" method="post">
    <div class="title">
        <h2>
            <span>
                @if(isset($venueDetails)) 
                    <i class="glyphicon glyphicon-pencil"></i>&nbsp; Edit Your Venue
                @else
                    <i class="glyphicon glyphicon-plus"></i>&nbsp; Add Your Venue 
                @endif 
            </span>
            <p class="required"><sup>*</sup> Required field</p>
        </h2>
    </div>
    <div class="element-input required" title="Name of the institute">
        <label class="title">
            Name of the Venue
            <span class="required">*</span>
        </label>
        <input class="large" type="text" name="venue" value="@if(isset($venueDetails)){{$venueDetails->venue}}@else{{Input::old('venue')}}@endif" required="required"/>
    </div>
    <div class="element-select" title="City">
        <label class="title">
            City
            <span class="required">*</span>
        </label>
        <div class="large">
            <span>
                <select name="venue_location_id" required="required">
                    <!-- <option value="$venueDetails->venue_location_id"selected>@if(isset($venueDetails)){{$venueDetails['venue_location']}}@else{{Input::old('venue_location')}}@endif</option> -->
                    @foreach ($all_locations as $data)
                        <option value="{{$data->location_id}}" selected="@if(isset($venueDetails)){{"selected"}}@else{{"unselected"}}@endif">
                            {{$data->location}}
                        </option>
                    @endforeach
                </select>
            </span>
        </div>
    </div>
    <div class="element-select" title="Locality">
        <label class="title">
            Locality
            <span class="required">*</span>
        </label>
        <div class="large">
            <span>
                <select name="venue_locality_id" required="required">
                    <!-- <option value="$venueDetails->venue_locality_id"selected>@if(isset($venueDetails)){{$venueDetails['venue_locality']}}@else{{Input::old('venue_locality')}}@endif</option> -->
                    @foreach ($all_localities as $data)
                        <option value="{{$data->locality_id}}" selected="@if(isset($venueDetails)){{"selected"}}@else{{"unselected"}}@endif">
                            {{$data->locality}}
                        </option>
                    @endforeach
                </select><i></i>
            </span>
        </div>
    </div>
    <div class="element-input required" title="Address"><label class="title">Address<span class="required">*</span></label><input class="large" type="text" name="venue_address" value="@if(isset($venueDetails)){{$venueDetails->venue_address}}@else{{Input::old('venue_address')}}@endif" required="required"/></div>
    <div class="element-input required" title="Pin Code"><label class="title">Pin Code<span class="required">*</span></label><input class="large" type="text" name="venue_pincode" value="@if(isset($venueDetails)){{$venueDetails->venue_pincode}}@else{{Input::old('venue_pincode')}}@endif" required="required"/></div>
    <div class="element-input" title="Landmark"><label class="title">Landmark</label><input class="large" type="text" value="@if(isset($venueDetails)){{$venueDetails->venue_landmark}}@else{{Input::old('venue_landmark')}}@endif" name="venue_landmark"/></div>
    <div class="element-phone required" title="Contact No."><label class="title">Contact No.<span class="required">*</span></label><input class="large" type="tel" maxlength="24" name="venue_contact_no" value="@if(isset($venueDetails)){{$venueDetails->venue_contact_no}}@else{{Input::old('venue_contact_no')}}@endif" placeholder="XXXXXXXXXX" required="required"/></div>
    <div class="element-email required" title="Email"><label class="title">Email</label><input class="large" type="email" value="@if(isset($venueDetails)){{$venueDetails->venue_email}}@else{{Input::old('venue_email')}}@endif" name="venue_email"/></div>
    <div class="submit"><input type="submit" value="Submit"/></div></form>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="/assets/formoid1/formoid-metro-cyan.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<!-- Stop Formoid form-->


</div>
<div class="col-md-4">
    
</div>

</body>
</html>
