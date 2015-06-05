@section('venue')
<!--<div class="modal fade" id="venueCreate" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
    <div class="modal-dialog" >
        <div class="modal-content">
            <form name="venueform" action="@if(isset($venueDetails)){{"/venues/update/$venueDetails->id"}}@else{{"/venues/store"}}@endif" method="post" enctype="multipart/form-data" id="venueform" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" @if(isset($venueDetails)) style="display:none" @endif>
                        <span onClick="refreshForm('#venueform')" aria-hidden="true" title="close">&times;</span>                        
                    </button>
                    <div class="title"><center>
                        <h3>
                            <span>
                                @if(isset($venueDetails)) 
                                    <i class="glyphicon glyphicon-pencil"></i>&nbsp; Edit Your Venue
                                @else
                                    <i class="glyphicon glyphicon-plus"></i>&nbsp; Add Your Venue 
                                @endif 
                            </span>
                        </h3></center>
                    </div>
                </div>
                <div class="modal-body">
                        <div class="form-group inner-addon">
                                <input type="hidden" name="csrf_token" value="{{ csrf_token() }}"> 
                                 <i class="glyphicon glyphicon-home left-addon"></i>   
                                <input placeholder="Enter Venue Name (Ex: Madhapur Branch)" class="form-control" type="text" id="venue" name="venue" value="@if(isset($venueDetails)){{$venueDetails->venue}}@else{{Input::old('venue')}}@endif" required/>
                        </div>
                        <div class="form-group inner-addon ">
                            <i class="glyphicon glyphicon-envelope left-addon"></i>
                            <input type="email" class="form-control" name='venue_email' id='venue_email'  placeholder='Enter E-Mail Address For Venue' value="@if(isset($venueDetails)){{$venueDetails->venue_email}}@else{{Input::old('venue_email')}}@endif" required/>
                        </div>
                       <div class="form-group inner-addon">
                            <i class="glyphicon glyphicon-phone left-addon"></i>
                             <input type="phone" class="form-control" name='venue_contact_no' id='venue_contact_no'  placeholder='Enter Contact Number' value="@if(isset($venueDetails)){{$venueDetails->venue_contact_no}}@else{{Input::old('venue_contact_no')}}@endif" required/>
                        </div>
                       <div class="form-group inner-addon">
                            <i class="glyphicon glyphicon-phone left-addon"></i>
                             <input type="phone" class="form-control" name='venue_alternate_contact_no' id='venue_alternate_contact_no'  placeholder='Enter Alternate Contact Number' value="@if(isset($venueDetails)){{$venueDetails->venue_alternate_contact_no}}@else{{Input::old('venue_alternate_contact_no')}}@endif"/>
                        </div>
                        <div class="form-group inner-addon ">
                                    <select name="venue_location_id"  class="form-control" id="venue_location_id" required="required">
                                    <option disabled="disabled"> Select City</option>
                                        @foreach ($locations as $locationData)
                                            <option value={{$locationData->id}}
                                                @if(isset($venueDetails))
                                                {{($venueDetails->venue_location_id==$locationData->id)?
                                                'selected="selected"':''}}
                                                @else
                                                {{((Input::old('venue_location_id'))==$locationData->id)?
                                                'selected="selected"':''}}
                                                @endif>
                                                {{$locationData->location}}
                                            </option>
                                        @endforeach
                                    </select>
                        </div>
                                
                        <div class="form-group inner-addon">
                            <select name="venue_locality_id" class="form-control" id="venue_locality_id" required="required">
                                 <option disabled="disabled"> Select Locality</option>
                                    @foreach ($localities as $localityData)
                                        <option value={{$localityData->id}}
                                            @if(isset($venueDetails))
                                            {{($venueDetails->venue_locality_id==$localityData->id)?
                                            'selected="selected"':''}}
                                            @else
                                            {{((Input::old('venue_locality_id'))==$localityData->id)?
                                            'selected="selected"':''}}
                                            @endif>
                                            {{$localityData->locality}}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group inner-addon">
                            <textarea placeholder="Enter Your Venue Address" name="venue_address" id="venue_address" rows="3" class="form-control" >@if(isset($venueDetails)){{$venueDetails->venue_address}}@else{{Input::old('venue_address')}}@endif</textarea>
                        </div>                   
                        <div class="form-group inner-addon">
                            <i class="glyphicon glyphicon-map-marker left-addon"></i>
                            <input placeholder='Enter Landmark of Your Venue' class="form-control" type="text" name="venue_landmark" id="venue_landmark" value="@if(isset($venueDetails)){{$venueDetails->venue_landmark}}@else{{Input::old('venue_landmark')}}@endif" required/>
                        </div>                   
                        <div class="form-group inner-addon ">
                             <i class="glyphicon glyphicon-qrcode left-addon"></i>   
                            <input placeholder="Enter Pincode" class="form-control" type="text" id="venue_pincode" name="venue_pincode" value="@if(isset($venueDetails)){{$venueDetails->venue_pincode}}@else{{Input::old('venue_pincode')}}@endif" required/>
                        </div>
                </div>
                <div class="modal-footer">
                    <center>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
<!--</div>     -->
<script type="text/javascript">
    $('#venueform').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh',
        },
        fields: {
            venue: {
                message: 'The name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The venue is required and cannot be empty',
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'The venue name must be more than 3 and less than 30 characters long',
                    },
                }
            },
            venue_address: {
                validators: {
                    notEmpty: {
                        message: "The address is required and cannot be empty.",
                    },
                }
            },
            venue_contact_no: {
                message: 'The contact number should contain 10 digits only.',
                validators: {
                    notEmpty: {
                        message: 'The mobile number is required and cannot be empty',
                    },

                    regexp: {
                        regexp: /^[0-9]{10}$/,
                        message: 'The phone number consists of 10 digits',
                    }
                }
            },
             venue_alternate_contact_no: {
                message: 'The contact number should contain 10 digits only.',
                validators: {
                    regexp: {
                        regexp: /^[0-9]{10}$/,
                        message: 'The phone number consists of 10 digits',
                    }
                }
            },
            venue_email: {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty',
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address',
                    }
                }
            },
            venue_pincode: {
                message: 'The pincode is not valid',
                validators: {
                    notEmpty: {
                        message: 'The pincode is required and cannot be empty',
                    },

                    regexp: {
                        regexp: /^[0-9]{6}$/,
                        message: 'The pincode consists of 6 digits',
                    }
                }
            },
        }
    });
</script>
@show

