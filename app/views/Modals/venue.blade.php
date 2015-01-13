@section('venue')
<!--<div class="modal fade" id="venueCreate" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="venueform" action="@if(isset($venueDetails)){{"/venues/update/$venueDetails->id"}}@else{{"/venues/store"}}@endif" method="post" enctype="multipart/form-data" id="venueform" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
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
                            <input type="email" class="form-control" name='msgInputEmail' id='MsgInputEmail'  placeholder='Enter E-Mail Address For Venue' required/>
                        </div>
                       <div class="form-group inner-addon">
                            <i class="glyphicon glyphicon-phone left-addon"></i>
                             <input type="phone" class="form-control" name='msgInputNumber' id='MsgInputPhone'  placeholder='Enter Contact Number' required/>
                        </div>
                        <div class="form-group inner-addon ">
                                    <select name="venue_location_id"  class="form-control" id="venue_location_id">
                                    <option> Select City</option>
                                        @foreach ($locations as $locationData)
                                            <option value={{$locationData->id}}
                                                @if(isset($venueDetails))
                                                {{($venueDetails->venue_location_id==$locationData->id)?
                                                'selected="selected"':''}}
                                                @else{{"Input::old('venue_location_id')"}}
                                                @endif>
                                                {{$locationData->location}}
                                            </option>
                                        @endforeach
                                    </select>
                                
                        </div>
                        <div class="form-group inner-addon left-addon">
                            <select name="venue_locality_id" class="form-control" id="venue_locality_id">
                                 <option> Select Locality</option>
                                    @foreach ($localities as $localityData)
                                        <option value={{$localityData->id}}
                                            @if(isset($venueDetails))
                                            {{($venueDetails->venue_locality_id==$localityData->id)?
                                            'selected="selected"':''}}
                                            @else{{"Input::old('venue_locality_id')"}}
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
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            venue: {
                message: 'The name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The venue is required and cannot be empty'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'The venue name must be more than 3 and less than 30 characters long'
                    },
                }
            },
            venue_address: {
                validators: {
                    notEmpty: {
                        message: "The address is required and cannot be empty."
                    },
                }
            },
            venue_contact_no: {
                message: 'The contact number is not valid',
                validators: {
                    notEmpty: {
                        message: 'The mobile number is required and cannot be empty'
                    },

                    regexp: {
                        regexp: /^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/,
                        message: 'The phone number consists of 10 digits'
                    }
                }
            },
            venue_email: {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            venue_pincode: {
                message: 'The pincode is not valid',
                validators: {
                    notEmpty: {
                        message: 'The pincode is required and cannot be empty'
                    },

                    regexp: {
                        regexp: /^[0-9]{6}$/,
                        message: 'The pincode consists of 6 digits'
                    }
                }
            },
        }
    });
</script>
@show

