@section("signup")
<div class="modal-dialog">
        <div class="modal-content">
            <form name="signUp" id="signUp" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel1">Sign-Up</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="first_name" class="col-sm-3 control-label ">First Name&nbsp;
                                <span style="color:red">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="text"   class="form-control " name="first_name"  id="first_name">
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="last_name"  class="col-sm-3 control-label ">Last Name&nbsp;

                            </label>
                            <div class="col-sm-8">
                                <input type="text"  class="form-control " name="last_name"  id="last_name">
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label ">Email&nbsp;
                                <span style="color:red">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="email"  placeholder="mymail@example.com" class="form-control " name="email"  id="email">
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="mobile" class="col-sm-3 control-label ">mobile&nbsp;<span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="tel"   class="form-control " name="mobile"  id="mobile">
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label ">Password&nbsp;
                                <span style="color:red">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="password"   class="form-control " name="password"  id="password">
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="confpassword" class="col-sm-3 control-label ">Confirm Password&nbsp;
                                <span style="color:red">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="password"   class="form-control " name="confpassword"  id="confpassword">
                            </div>
                        </div>
                    </div><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#signUp').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    first_name: {
                        message: 'The name is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The name is required and cannot be empty'
                            },
                            stringLength: {
                                min: 2,
                                message: 'The firstname must be more than 2 characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z]+(?:(?:\\s+|-)[a-zA-Z]+)*$/,
                                message: 'The username can only consist of alphabets'
                            }
                        }
                    },
                    last_name: {
                        message: 'The last name is not valid',
                        validators: {


                            regexp: {
                                regexp: /^[a-zA-Z]+(?:(?:\\s+|-)[a-zA-Z]+)*$/,
                                message: 'The last name can only consist of alphabets'
                            }
                        }
                    },

                    password: {
                        message: 'The password is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The password is required and cannot be empty'
                            },
                            stringLength: {
                                min: 4,
                                max: 20,
                                message: 'The password must be more than 4 and less than 20 characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_]+$/,
                                message: 'The password can only consist of alphabetical, number and underscore'
                            }
                        }
                    },
                    confpassword: {
                        message: 'The password is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The password is required and cannot be empty'
                            },
                            stringLength: {
                                min: 4,
                                max: 20,
                                message: 'The password must be more than 4 and less than 20 characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_]+$/,
                                message: 'The password can only consist of alphabetical, number and underscore'
                            },
                            identical: {
                                field: 'user_password',
                                message: 'The password and its confirm must be the same'
                            }
                        }
                    },
                    mobile: {
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
                    url: {
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
@show