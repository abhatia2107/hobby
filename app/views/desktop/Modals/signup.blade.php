@section("signup")
<div class="modal-dialog">
        <div class="modal-content">
             <form name="signUp" class="signUp" id="signUpForm" role="form" method="post" action="/users/signup/submit" enctype="multipart/form-data">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">
                        <span onClick="refreshForm('#signUpForm')" aria-hidden="true" title="close">X</span>                
                    </button>
                    <h4 class="modal-title" id="myModalLabel1">Sign Up</h4>
                    <a href="#" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Already a member? Login</a>
                </div>
                <center><a href="/login/fb"><img alt="SignUp Using Facebook" title="SignUp Using Facebook" height="35" style="margin-top:10px;" src="/assets/images/signup-with-facebook.png"></a></center>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">                        
                            <div class="col-sm-12">
                                <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="user_fb_id" value="@if(isset($userDetails)){{$userDetails->user_fb_id}}@else{{Input::old('user_fb_id')}}@endif">
                                <input type="text" placeholder="Enter Your Name*" class="form-control" name="user_name"  id="user_name" value="@if(isset($userDetails)){{$userDetails->user_name}}@else{{Input::old('user_name')}}@endif">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">                         
                            <div class="col-sm-12">
                                <input type="email" placeholder="Enter Your Email ID*" class="form-control" name="email"  id="emailSignUp" value="@if(isset($userDetails)){{$userDetails->email}}@else{{Input::old('email')}}@endif">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" placeholder="Enter Your Mobile Number*" class="form-control" name="user_contact_no"  id="user_contact_no" value="@if(isset($userDetails)){{$userDetails->user_contact_no}}@else{{Input::old('user_contact_no')}}@endif">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">                            
                            <div class="col-sm-12">
                                <input type="password" placeholder="Enter Password For Your Account*" class="form-control" name="password"  id="passwordSignUp">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">                           
                            <div class="col-sm-12">
                                <input type="text" placeholder="Referral Code (Optional)" class="form-control" name="user_referee_code"  id="user_referee_code" value="{{Input::old('user_referee_code')}}">
                            </div>
                        </div>
                    </div>
                    <div class="checkbox login-remember">
                        <label class="col-sm-12 control-label" for="signup_terms">
                            <input name="signup_terms"  value="forever" checked="checked" type="checkbox" required>
                            I agree to <a href="/terms">terms and conditions.</a>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">                                
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
     <script type="text/javascript">
            $(document).ready(function(){     
                $('.signUp').bootstrapValidator({
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
                    signup_terms:{
                        validators: {
                            notEmpty: {
                                message: 'You need to agree to the terms and conditions.'
                            }
                        }
                    }
                }
            });
        });
    </script>
@show