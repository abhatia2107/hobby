@extends('Layouts.layout')
@section('content')
<div class="container">
	
<div class="col-md-4">
	
</div>
<div class="col-md-4">
    <h4>Edit your Profile</h4>
	<form name="edit" class="edit" role="form" method="post" action="/users/update" enctype="multipart/form-data">
		<div class="row">
	        <div class="form-group">                        
	            <div class="col-sm-12">
	                <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
	                <input type="text" placeholder="Enter Your Name*" class="form-control" name="user_name"  id="user_name" value="@if(isset($userDetails)){{$userDetails->user_name}}@else{{Input::old('user_name')}}@endif">
	            </div>
	        </div>
	    </div>
	    <div class="row">
	        <div class="form-group">                         
	            <div class="col-sm-12">
	                <input type="email" placeholder="Enter Your Email ID*" class="form-control" name="email"  id="email" value="@if(isset($userDetails)){{$userDetails->email}}@else{{Input::old('email')}}@endif">
	            </div>
	        </div>
	    </div>
	    <div class="row">
	        <div class="form-group">
	            <div class="col-sm-12">
	                <input type="tel" placeholder="Enter Your Mobile Number*" class="form-control" name="user_contact_no"  id="user_contact_no" value="@if(isset($userDetails)){{$userDetails->user_contact_no}}@else{{Input::old('user_contact_no')}}@endif">
	            </div>
	        </div>
	    </div>
		<div class="modal-footer">                                
		    <button type="submit" class="btn btn-primary">Submit</button>
	    </div>
    </form>
</div>
</div>

@stop

@section('pagejquery')
 <script type="text/javascript">
            $(document).ready(function(){     
                $('#edit').bootstrapValidator({
                    message: 'This value is not valid',
                   
                        
                fields: {
                    user_name: {
                        message: 'Name is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Name is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                message: 'Name must be more than 2 characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z ]+(?:(?:\\s+|-)[a-zA-Z ]+)*$/,
                                message: 'Name can only consist of alphabets'
                            }
                        }
                    },
                    password: {
                        message: 'Password is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Password is required and cannot be empty'
                            },
                            stringLength: {
                                min: 6,
                                max: 20,
                                message: 'Password must be more than 6 and less than 20 characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9!@#$-%&_]+$/,
                                message: 'Password can only consist of alphabetical, number and following special symbol !,@,#,$,-,%,&,_'
                            }
                        }
                    },
                    user_contact_no: {
                        message: 'Mobile number is not valid',
                        validators: {
                            notEmpty: {
                                message: 'Mobile number is required and cannot be empty'
                            },

                            regexp: {
                                regexp: /^[0-9]{10}$/,
                                message: 'Mobile number consists of 10 digits. Skip adding +91 or 0'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Email is required and cannot be empty'
                            },
                            emailAddress: {
                                message: 'Input is not a valid email address'
                            }
                        }
                    },
                }
            });
        });
    </script>
@stop