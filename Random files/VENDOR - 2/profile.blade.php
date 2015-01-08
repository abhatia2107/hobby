@extends('Layouts.layout')
@section('pagestylesheet')
    <style>
    .update_required
    {
        color: white;font-size: 18px;border-radius: 4px;
            background-color: #2274ef;
    }
    .important_required
         {
            color:red;
         }
        .lebel_size
        {
            font-size: 20px;
            font-weight: 500;
        }
        .c1
        {
            /*width:300px;*/
            height: 90px;
        }
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: blue;
            cursor: inherit;
            display: block;
        }
        .add_photo
        {
            font-size:20px;background-color:#3A8AF1;color:white;
        }
        @media(min-width:992px){
        #personalInfo
        {
            margin-left: auto;margin-right: auto;width:50%;
        }}
    </style>

    <link rel="stylesheet" type="text/css" href="jquery-ui-1.7.2.custom.css" />
@stop


@section('content')
    <div class="container-fluid">
        <form role="form"  id="personalInfo" enctype="multipart/form-data"  action="@if(isset($instituteDetails)){{"/institutes/update/$instituteDetails->id"}}@else{{"/institutes/store"}}@endif" method="post">
			<div class="row">
				<div class="title">
        <h2><span>
        @if(isset($instituteDetails)) 
            <i class="glyphicon glyphicon-pencil"></i> Edit Your Institute 
        @else
            <i class="glyphicon glyphicon-plus"></i> Add Your Institute 
        @endif 
        </span></h2>
        <span class="important_required">*</span>
    </div>
			</div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12">
                    <div class=" form-group">
                        <label  class="lebel_size" for="username">Organisation Name 
						<span class="important_required">*</span></label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                </div>
                
            </div>
            <div class="row">
                      <div class="col-sm-6 col-xs-12">
                        <div class="c1 form-group">
                            <label  class="lebel_size" for="facebook">Facebook Page</label>
                            <input type="url" class="form-control " placeholder="http://" name="institute_fblink" value="@if(isset($instituteDetails)){{$instituteDetails->institute_fblink}}@else{{Input::old('institute_fblink')}}@endif" id="institute_fblink">
                        </div>
                    </div>
                <div class="col-sm-6 col-xs-12">
                        <div class="c1 form-group" >
                            <label class="lebel_size" for="twitter">Twitter Profile</label>
                            <input type="url" class="form-control" placeholder="http://" name="institute_twitter" value="@if(isset($instituteDetails)){{$instituteDetails->institute_twitter}}@else{{Input::old('institute_twitter')}}@endif" id="institute_twitter">
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="c1 form-group ">
                        <label class="lebel_size" for="institute_location_id" >City <span class="important_required">*</span></label>
                        <select  class="form-control" name="institute_location_id"  id="institute_location_id" required"required>
							@foreach ($locations as $data)
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
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="c1 form-group">
                        <label class="lebel_size" for="url">Website</label>
                        <input type="url" class="form-control" placeholder="http://" id="institute_website" name="institute_website" value="@if(isset($instituteDetails)){{$instituteDetails->institute_website}}@else{{Input::old('institute_website')}}@endif"/>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-6 col-xs-12">
                    <div class="c1">
                        <p>Photo Gallery</p>
                        <span class="btn btn-default btn-file add_photo" >Add Photos 
						<input type="file">
                        </span><span style="position: absolute"><div>
                        <span style="font-size:10px">1.Based on requirements</span>
                        </div></span>
                    </div>
                </div>


            </div>
            
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-12">
					<div class="form-group">
                        <label class="lebel_size title" for="institute_description" >Tell us about your institute <span class="important_required">*</span></label>
                        <textarea name="institute_description" id="institute_description"  class="form-control"rows="5" required="required">
                            @if(isset($instituteDetails)){{$instituteDetails->institute_description}}@else{{Input::old('institute_description')}}@endifs
                        </textarea>
					</div>
                                        
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="c1 ">
                        <button type="submit" class="update_required btn btn-primary ">Update </button>
                    </div>
                </div>

            </div>
        </form>
    </div>
@stop
@section('pagestylesheet')
    
    <script type="text/javascript" >
        $(document).ready(function(){
            $('#personalInfo').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    username: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The username is required and cannot be empty'
                            },
                            stringLength: {
                                min: 6,
                                max: 30,
                                message: 'The username must be more than 6 and less than 30 characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_]+$/,
                                message: 'The username can only consist of alphabetical, number and underscore'
                            }
                        }
                    },
                   
                    institute_location_id: {
                        
                        validators: {
                            notEmpty: {
                                message: 'The city name is required and cannot be empty'
                            }
                        }
                    },
                    phone: {
                        message: 'The number is not valid',
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
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'The email is required and cannot be empty'
                            },
                            emailAddress: {
                                message: 'The input is not a valid email address'
                            }
                        }
                    },
                    institute_website: {
                        validators: {
                            notEmpty: {
                                message: 'The url is required and cannot be empty'
                            },
                            url: {
                                message: 'The input is not a valid url address'
                            }
                        }
                    }
                }
            });

            


        });
    </script>
@stop