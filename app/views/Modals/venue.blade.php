@section('venue')
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="venueform" action="@if(isset($venueDetails)){{"/venues/update/$venueDetails->id"}}@else{{"/venues/store"}}@endif" method="post" enctype="multipart/form-data" id="venueform" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <div class="title">
                        <h3>
                            <span>
                                @if(isset($venueDetails)) 
                                    <i class="glyphicon glyphicon-pencil"></i>&nbsp; Edit Your Venue
                                @else
                                    <i class="glyphicon glyphicon-plus"></i>&nbsp; Add Your Venue 
                                @endif 
                            </span>
                        </h3>
                    </div>
                    <p class="required"><sup>*</sup> Required field</p>
                </div>
                <div class="modal-body">
                    <div class="row row_padding">
                        <div class="form-group">
                            <label for="venue" class="col-sm-3 control-label ">
                                Venue Name<span class="important_required">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">    
                                <input class="form-control" type="text" id="venue" name="venue" value="@if(isset($venueDetails)){{$venueDetails->venue}}@else{{Input::old('venue')}}@endif" required="required"/>
                            </div>
                        </div>
                    </div>
                    <div class="row row_padding">
                        <div class="form-group">
                            <label for="venue_email" class="col-sm-3 control-label ">Email<span class="important_required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="email" name="venue_email" id= "venue_email" value="@if(isset($venueDetails)){{$venueDetails->venue_email}}@else{{Input::old('venue_email')}}@endif" required="required"/>
                            </div>
                        </div>
                    </div>
                    <div class="row row_padding">
                        <div class="form-group">
                            <label for="venue_contact_no" class="col-sm-3 control-label ">Contact Number<span class="important_required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="tel" maxlength="24" name="venue_contact_no" id="venue_contact_no" value="@if(isset($venueDetails)){{$venueDetails->venue_contact_no}}@else{{Input::old('venue_contact_no')}}@endif" placeholder="XXXXXXXXXX" required="required"/>
                            </div>
                        </div>
                    </div>
                    <div class="row row_padding">
                        <div class="form-group">
                            <label for="venue_location_id" class="col-sm-3 control-label ">
                                City<span class="important_required">*</span>
                            </label>
                            <div class="col-sm-8">
                                <select name="venue_location_id"  class="form-control" id="venue_location_id">
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
                        </div>
                    </div>
                    <div class="row row_padding">
                        <div class="form-group">
                            <label for="venue_locality_id" class="col-sm-3 control-label ">
                                Locality<span class="important_required">*</span>
                            </label>
                            <div class="col-sm-8">
                                <select name="venue_locality_id" class="form-control" id="venue_locality_id">
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
                        </div>
                    </div>
                    <div class="row row_padding">
                        <div class="form-group">
                            <label for="venue_address" class="col-sm-3 control-label ">Address<span class="important_required">*</span></label>
                            <div class="col-sm-8">
                                <textarea name="venue_address" id="venue_address" class="form-control" >@if(isset($venueDetails)){{$venueDetails->venue_address}}@else{{Input::old('venue_address')}}@endif</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row row_padding">
                        <div class="form-group">
                            <label for="venue_landmark" class="col-sm-3 control-label ">Landmark</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" name="venue_landmark" id="venue_landmark" value="@if(isset($venueDetails)){{$venueDetails->venue_landmark}}@else{{Input::old('venue_landmark')}}@endif"/>
                            </div>
                        </div>
                    </div>
                    <div class="row row_padding">
                        <div class="form-group">
                            <label for="venue_pincode" class="col-sm-3 control-label ">Pincode<span class="important_required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="venue_pincode" name="venue_pincode" value="@if(isset($venueDetails)){{$venueDetails->venue_pincode}}@else{{Input::old('venue_pincode')}}@endif" required="required"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
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
        </div>
    </div>
@show

