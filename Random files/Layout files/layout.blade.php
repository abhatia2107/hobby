<!DOCTYPE html>
<html>
<head>
    @include('head')
	<title></title>
</head>
<body>
<!--Header Section contains sign-in sign-up searchbox and logo -->
    <header>@include('header')</header>

<!--Navbar Section contains links for arts dance etc etc-->
    <div>
        @include('navbar')
    </div>
<!--sign-In pop up modal-->
    <div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        @include('signin')
    </div>
<!--sign-UP pop up modal-->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        @include('signup')
    </div>
    <!--Footer Section social networking links-->
    <footer style="background-color: #2f3339;">@include('footer')</footer>
    <script type="text/javascript" >
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
                                field: 'password',
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
            $('.combobox').combobox({bsVersion: '3'});
            $('#signIn').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {

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

                    email: {
                        validators: {
                            notEmpty: {
                                message: 'The email is required and cannot be empty'
                            },
                            emailAddress: {
                                message: 'The input is not a valid email address'
                            }
                        }
                    }

                }
            });
            
        });
    </script>
    <style type="text/css">
        .form-control-feedback {
            position: absolute;
            top: 0;
            right: 10px;
            z-index: 2;
            display: none;
            width: 34px;
            height: 34px;
            line-height: 34px;
            text-align: center;
            pointer-events: none;
        }
        .search_combo {
            position: relative;
            display: table;
            border-collapse: separate;
            width: 90%;
        }
        @media (min-width:750px) and (max-width: 990px) {
            .btn_990
            {
                width:160%
            }
        }
        @media screen and (max-width: 749px) {
            .btn_990
            {
                width:100%
            }
        }
        html 
        {
            height:100%;
        }
        body
        {
            height:100%;
        }
    </style>

</body>
</html>