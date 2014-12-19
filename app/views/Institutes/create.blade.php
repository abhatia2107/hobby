<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script  src="../../../public/assets/js/jquery-ui-1.7.2.custom.min.js"></script>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../../public/assets/css/jquery-ui-1.7.2.custom.css" />
    <link rel="stylesheet" type="text/css" href="../../../public/assets/css/jquery.richtextarea.css" />


    <script  src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>


    <script   src="../../../public/assets/js/jquery.richtextarea.min.js"></script>
    <!--<link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="bootstrap-theme.css">-->
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
                    institute: {
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
                    contactperson: {
                        message: 'The name is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The  name is required and cannot be empty'
                            },
                            stringLength: {
                                min: 3,

                                message: 'The name must be more than 3  characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z]+(?:(?:\\s+|-)[a-zA-Z]+)*$/,
                                message: 'The  name can only consist of alphabets'
                            }
                        }
                    },
                    institute_location: {
                        message: 'The city is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The city name is required and cannot be empty'
                            },
                            stringLength: {
                                min: 3,
                                max: 30,
                                message: 'The city must be more than 3 and less than 30 characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z]+(?:(?:\\s+|-)[a-zA-Z]+)*$/,
                                message: 'The city name can only consist of alphabets'
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

            $('#boost1').click(function(){
                $('#boost').slideDown();
                $('#boost1').hide();
                $('#boost2').show();
            });
            $('#boost2').click(function(){
                $('#boost').slideUp();
                $('#boost2').hide();
                $('#boost1').show();
            });


        });
    </script>
    <style>
    .has-feedback label~.form-control-feedback {
    top: 32px;
    }
        label
        {
            font-size: 20px;
            font-weight: 500;
        }
        .c1
        {
            width:300px;
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
    </style>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li ><a href="./myclasses.html">My Classes</a></li>
                <li class="active"><a href="./profile.html" >My Profile </a>
                </li>
                <li><a href="./bankdetails.html">Bank Details</a></li>
                <li><a href="./myvenues.html">My Venues</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container" id="profile">
    <div class="container potrait" >
        <img src="729-729-transcend.jpg" class="img-responsive" style="width: 1050px;
          height: 400px;" >
          <span class="btn btn-default btn-file" style="background-color:#3A8AF1;color:white;">Upload Image <input type="file">
          </span>
    </div>


    <div class="clearfix visible-lg"></div>
</div>
</div><br><br><br>
    <div class="container-fluid">
        <form role="form" style="margin-left: auto;margin-right: auto;width: 650px;" id="personalInfo">
            <div class="row">
                <div class="col-sm-6">
                    <div class="c1 form-group">
                        <label for="institute">First Name/Organisation Name &nbsp;&nbsp;<span style="color:red;font-size: 15px;">*</span></label>
                        <input type="text" class="form-control" name="institute" id="institute">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="c1 form-group">
                        <label for="name2">Last Name</label>
                        <input type="text" class="form-control" name="name2" id="name2">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="c1 form-group">
                        <label for="email">Email Address &nbsp;&nbsp;<span style="color:red;font-size: 15px;">*</span></label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="c1 form-group">
                        <label for="phone" >Mobile Number &nbsp;&nbsp;<span style="color:red;font-size: 15px;">*</span></label>
                        <input type="tel" class="form-control" name="phone" id="phone">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="c1 form-group ">
                        <label for="institute_location" >City &nbsp;&nbsp;<span style="color:red;font-size: 15px;">*</span></label>
                        <input type="text" class="form-control" name="institute_location" id="institute_location">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="c1 form-group">
                        <label for="institute_website">Website</label>
                        <input type="url" class="form-control" placeholder="http://" name="institute_website" id="institute_website">
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-6">
                    <div class="c1">
                        <p>Photo Gallery</p><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="btn btn-default btn-file" style="font-size:20px;background-color:#3A8AF1;color:white;">Add Photos <input type="file">
                        </span>&nbsp;&nbsp;<span style="position: absolute"><div>
                        <span style="font-size:10px">1.Based on requirements</span><br><span style="font-size: 10px">2.Based on requirements</span>
                        </div></span>
                    </div>
                </div>


            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-12">
                    <div class="c1">
                        <p >About me</p>
                        <textarea name="institute_description" id="institute_description" cols="40" rows="5">
                            Test
                            &lt;ul&gt;&lt;li&gt;Test line 1&lt;/li&gt;
                            &lt;li&gt;Test line 2&lt;/li&gt;
                            &lt;/ul&gt;
                        </textarea>

                        <script type="text/javascript">
                            $("#institute_description").richtextarea();
                        </script>
                    </div>
                </div>
            </div>
            <br><br><br><br><br><br><br>
            <div class="row">
                <div class="col-sm-12">
                    <div class="c2">
                        <p id="boost1" style="text-align: center;
                            background: gainsboro;
                            font-size: 30px;
                            font-weight: 700;">+ &nbsp;Boost Your Profile
                        </p>
                        <p  id="boost2" style="text-align: center;
                            background: gainsboro;
                            font-size: 30px;
                            font-weight: 700;display:none">- &nbsp;Boost Your Profile
                        </p>
                    </div>
                </div>
            </div>
            <div id="boost" style="display: none">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="c1">
                            <p >Do you conduct workshops for corporates?</p>
                            <span class="btn btn-default btn-file" style="background-color: #3A8AF1;
                                color: white;
                                height: 45px;
                                width: 125px;
                                font-size: 19px;">
                                Attach Files
                                <input type="file">
                            </span><br>
                            <span style="font-style:11px">Please attach your portfolio/proposal</span>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="c1 form-group">
                            <label for="contactperson" >Contact Person &nbsp;&nbsp;<span style="color:red;font-size: 15px;">*</span></label>
                            <input type="text" class="form-control" id="contactperson" name="contactperson">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="c1 form-group">
                            <label for="institute_fblink">Facebook Page</label>
                            <input type="url" class="form-control" placeholder="http://" id="institute_fblink" name="institute_fblink">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="c1 form-group">
                            <label for="linkedin" >Linked In Profile</label>
                            <input type="text" class="form-control" placeholder="http://" id="linkedin" name="linkedin">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="c1 form-group" >
                            <label for="institute_twitter">Twitter Profile</label>
                            <input type="url" class="form-control" placeholder="http://" id="institute_twitter" name="institute_twitter">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="c1 ">
                        <button type="submit" style="color: white;font-size: 18px;border-radius: 4px;
            background-color: #2274ef;" class="btn btn-default ">Update </button>&nbsp;&nbsp;
                        <button style="color: white;font-size: 18px;border-radius: 4px;
            background-color: #89b12d;" class="btn btn-default "><span style="font-size:16px;font-weight:800;"class="glyphicon glyphicon-share"></span>&nbsp;View Profile </button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</body>
</html>