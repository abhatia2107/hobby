<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../../public/assets/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script  src="../../../public/assets/js/jquery-ui-1.7.2.custom.min.js"></script>
    <link type="text/css" rel="stylesheet" href="../../../public/assets/css/jquery-te-1.4.0.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../../public/assets/css/jquery-ui-1.7.2.custom.css" />
    <link rel="stylesheet" type="text/css" href="../../../public/assets/css/jquery.richtextarea.css" />
    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js
"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>


    <script  src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>


    <script  src="../../../public/assets/js/jquery.richtextarea.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#session1").change(function(e){
                if($("#session1").val()==1)
                {
                    $("#myModal").modal('toggle');
                    e.preventDefault();
                }
            });
            $('#classInfo').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    title: {
                        message: 'The title is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The title is required and cannot be empty'
                            },
                            stringLength: {
                                min: 6,
                                max: 30,
                                message: 'The title must be more than 6 and less than 30 characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_]+$/,
                                message: 'The username can only consist of alphabetical, number and underscore'
                            }
                        }
                    },
                    pitch: {
                        message: 'The pitch is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The  pitch is required and cannot be empty'
                            },
                            stringLength: {
                                min: 3,

                                message: 'The pitch must be more than 3  characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z]+(?:(?:\\s+|-)[a-zA-Z]+)*$/,
                                message: 'The  pitch can only consist of alphabets'
                            }
                        }
                    },
                    keywords: {
                        message: 'The keywords is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The keywords is required and cannot be empty'
                            },
                            stringLength: {
                                min: 3,

                                message: 'The keywords must be more than 3  characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z]+(?:(?:\\s+|-)[a-zA-Z]+)*$/,
                                message: 'The  keywords can only consist of alphabets'
                            }
                        }
                    },
                    textarea1: {
                        message: 'The text is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The description is required and cannot be empty'
                            },
                            stringLength: {
                                min: 6,

                                message: 'The description must be more than 6  characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_]+$/,
                                message: 'The description can only consist of alphabetical, number and underscore'
                            }
                        }
                    },
                    sessions: {
                        message: 'The text is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The session is required and cannot be empty'
                            },

                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'The sessions can contain only digits  '
                            }
                        }
                    },
                    time1: {
                        message: 'The timings is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The timings are  required and cannot be empty'
                            }

                        }
                    },
                    time2: {
                        message: 'The timings is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The timings are  required and cannot be empty'
                            }

                        }
                    },
                    date1: {
                        message: 'The date is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The date are  required and cannot be empty'
                            }

                        }
                    },
                    date2: {
                        message: 'The date is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The dates are  required and cannot be empty'
                            }

                        }
                    },

                    city: {
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
            $('#venueform').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    venuename: {
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
                            regexp: {
                                regexp: /^[a-zA-Z]+$/,
                                message: 'The venue can only consist of alphabets'
                            }
                        }
                    },
                    pitch: {
                        message: 'The pitch is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The  pitch is required and cannot be empty'
                            },
                            stringLength: {
                                min: 3,

                                message: 'The pitch must be more than 3  characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z]+(?:(?:\\s+|-)[a-zA-Z]+)*$/,
                                message: 'The  pitch can only consist of alphabets'
                            }
                        }
                    },
                    keywords: {
                        message: 'The keywords is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The keywords is required and cannot be empty'
                            },
                            stringLength: {
                                min: 3,

                                message: 'The keywords must be more than 3  characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z]+(?:(?:\\s+|-)[a-zA-Z]+)*$/,
                                message: 'The  keywords can only consist of alphabets'
                            }
                        }
                    },
                    textarea1: {
                        message: 'The text is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The description is required and cannot be empty'
                            },
                            stringLength: {
                                min: 6,

                                message: 'The description must be more than 6  characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_]+$/,
                                message: 'The description can only consist of alphabetical, number and underscore'
                            }
                        }
                    },
                    sessions: {
                        message: 'The text is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The session is required and cannot be empty'
                            },

                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'The sessions can contain only digits  '
                            }
                        }
                    },
                    time1: {
                        message: 'The timings is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The timings are  required and cannot be empty'
                            }

                        }
                    },
                    time2: {
                        message: 'The timings is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The timings are  required and cannot be empty'
                            }

                        }
                    },
                    date1: {
                        message: 'The date is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The date are  required and cannot be empty'
                            }

                        }
                    },
                    date2: {
                        message: 'The date is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The dates are  required and cannot be empty'
                            }

                        }
                    },

                    city: {
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
    <title></title>
    <style>
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
        .label1
        {
            font-size: 15px;
            font-weight: 100;
        }
        .input1
         {
            font-size: 15px;
            height:32px;
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
                <li ><a href="./profile.html" >My Profile </a>
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
<div class="container-fluid">
        <form role="form" class="form-horizontal" action="@if(isset($batchDetails)){{"batches/$batchDetails->batch_id"}}@else{{"/batches/store"}}@endif" method="@if(isset($batchDetails)){{"put"}}@else{{"post"}}@endif" enctype="multipart/form-data" style="margin-left: auto;margin-right: auto;width: 900px;" id="classInfo">
            <br><br>
            <div class="row">
                <p style="font-size: 20px;
                    font-weight: 600;">Create your Class
                </p>
                <div class="col-lg-12" style="background: url('../../../public/assets/images/classdesc.PNG');height:41px ">
                </div>

            </div><br>
            <div class="row">
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label label1">Title&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input1" name="title" placeholder="Title" id="title">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="pitch" class="col-sm-3 control-label label1">One Time Pitch&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input1" name="pitch" placeholder="One Time Pitch" id="pitch">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="categ" class="col-sm-3 control-label label1">Category&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-2">
                        <select  class="form-control input1" name="categ"  id="categ">
                            <option selected>Dance</option>
                            <option>Cooking</option>
                            <option>Other</option>
                            <option>Art & Craft</option>
                        </select>
                    </div>
                    <label for="subcateg" class="col-sm-3 control-label label1">Sub Category&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-2">
                        <select  class="form-control input1" name="subcateg"  id="subcateg">
                            <option >Salsa</option>
                            <option>Tango</option>
                            <option>Zumba</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="row ">
                <div class="form-group">
                        <label class="col-sm-3 control-label label1">Photo Gallery</label>
                        <div class="col-sm-6">&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="btn btn-default btn-file" style="font-size:20px;background-color:#3A8AF1;color:white;">
                                Add Photos <input type="file">
                            </span>&nbsp;&nbsp;
                            <span style="position: absolute">
                                <div>
                            <span style="font-size:10px">1.Based on requirements</span><br>
                            <span style="font-size: 10px">2.Based on requirements</span>
                    </div></span>

                </div>
                </div>

            </div><br>
            <div class="row">
                <div class="form-group">
                    <label for="keywords" class="col-sm-3 control-label label1">Search Keywords&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input1" name="keywords" placeholder="Search Keywords" id="keywords">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <br><label for="textarea1" class="col-sm-3 control-label label1">Description&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <textarea class="jqte-test"name="textarea1"  id="textarea1"></textarea>
                    </div>
                </div>
            </div><br><br><br>
            <div class="row">
                <div class="col-lg-12" style="background: url('../../../public/assets/images/targetaud.PNG');height:41px ">
                </div>
            </div><br><br>
            <div class="row">
                <div class="form-group">
                    <label for="diflevel" class="col-sm-3 control-label label1">Difficulty Level&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <div class="radio" name="diflevel" id="diflevel">
                            <label><input type="radio" name="optradio" checked >Not Specified</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="optradio">Beginner</label>
                        </div>
                        <div class="radio ">
                            <label><input type="radio" name="optradio" >Intermediate</label>
                        </div>
                        <div class="radio ">
                            <label><input type="radio" name="optradio" >Advanced</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="agegroup" class="col-sm-3 control-label label1">Target Age Group&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <div class="radio" name="agegroup" id="agegroup">
                            <label><input type="radio" name="optradio1" checked >All</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="optradio1">Kids</label>
                        </div>
                        <div class="radio ">
                            <label><input type="radio" name="optradio1" >Adults</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="gengroup" class="col-sm-3 control-label label1">Target Gender Group&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <div class="radio" name="gengroup" id="gengroup">
                            <label><input type="radio" name="optradio2" checked >All</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="optradio2">Male</label>
                        </div>
                        <div class="radio ">
                            <label><input type="radio" name="optradio2" >Female</label>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>
            <div class="row">

                <div class="col-lg-12" style="background: url('../../../public/assets/images/schedule.PNG');height:41px ">
                </div>
            </div><br><br>
            <div class="row">
                <div class="col-sm-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="label1">Timings</span>
                </div>
                <div class="col-sm-1">From
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker4'>
                            <input type='text' class="form-control" name="time1" id="time1"/>
                    	<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                    	</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    To
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker5'>
                            <input type='text' class="form-control" name="time2" id="time2">
                    	    <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                    	    </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="label1">Date</span>
                </div>
                <div class="col-sm-1">
                    From
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker6'>
                            <input type='text' class="form-control" name="date1" id="date1"data-date-format="YYYY/MM/DD">
						    <span class="input-group-addon">
						        <span class="glyphicon glyphicon-calendar"></span>
						    </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    To
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker7'>
                            <input type='text' class="form-control" name="date2" id="date2"data-date-format="YYYY/MM/DD"/>
						    <span class="input-group-addon">
						        <span class="glyphicon glyphicon-calendar"></span>
						    </span>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#datetimepicker4').datetimepicker({
                        pickDate: false
                    });
                });
                $(function () {
                    $('#datetimepicker5').datetimepicker({
                        pickDate: false
                    });
                });
                $(function () {
                    $('#datetimepicker6').datetimepicker({
                        pickTime: false
                    });
                });
                $(function () {
                    $('#datetimepicker7').datetimepicker({
                        pickTime: false
                    });
                });
            </script>
            <div class="row">
                <div class="form-group">
                    <label for="venue" class="col-sm-3 control-label label1">Venue&nbsp;<span style="color:red">*</span></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="col-sm-6">
                        <select  class="form-control input1" name="venue"  id="venue">
                            <option >Option1</option>
                            <option>Option2</option>
                            <option>Option3</option>
                            <option>Option4</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <a data-target="#myModal2" data-toggle="modal">Add a venue</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="confsched" class="col-sm-3 control-label label1">My Schedule Is Confirmed&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-7">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    <input class="input1" type="checkbox" value="" checked id="confsched">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-5">
                    <label class="col-sm-8 label1" for="sessions">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Of Sessions&nbsp;&nbsp;
                        <span style="color: red">*</span>
                    </label>
                <div class="col-sm-4">
                    <input type="text" id="sessions" name="sessions" class="form-control input1">
                </div>
                </div>
                <div class="col-sm-2 input1">Repeat</div>
                <div class="col-sm-4"><select class="form-control" id="session1"><option>No</option><option value="1">Weekly</option></select></div>


            </div>
            <div class="row">
                <div class="form-group">
                    <br><label for="textarea2" class="col-sm-3 control-label label1">Days/Comments&nbsp;<span style="color:red">*</span></label>
                    <div class="col-sm-8">
                        <textarea name="textarea2" class="jqte-test" id="textarea2"></textarea>
                        <script>
                            $('.jqte-test').jqte();

                            // settings of status
                            var jqteStatus = true;
                            $(".status").click(function()
                            {
                                jqteStatus = jqteStatus ? false : true;
                                $('.jqte-test').jqte({"status" : jqteStatus})
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2" >
                    <button type="button" style="float:right;font-size:19px;color:white;background-color:cornflowerblue" class="form-control btn  btn-default">
                        + &nbsp;Schedule
                    </button>
                </div>
            </div><br><br>
            <div  style="width: 53%">
                <button type="submit" style="float: right;font-size: 30px;color: white;background-color: cornflowerblue;width: 30%" class="form-control btn  btn-default">
                    Submit
                </button>
            </div>
        </form>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <form name="weekform" id="weekform" role="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="weekrepeat" class="col-sm-3 control-label ">Repeats every&nbsp;<span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select  class="form-control " name="weekrepeat"  id="weekrepeat"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="endsafter" class="col-sm-3 control-label ">Ends After&nbsp;<span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="date"  class="form-control " name="endsafter"  id="endsafter">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label  class="col-sm-3 control-label ">Batches Start On&nbsp;<span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                Sun&nbsp;<input  type="checkbox" value="1"  id="sun">
                                Mon&nbsp;<input  type="checkbox" value="2"  id="mon">
                                Tue&nbsp;<input  type="checkbox" value="3"  id="tue"><br>
                                Wed&nbsp;<input  type="checkbox" value="4"  id="wed">
                                Thu&nbsp;<input  type="checkbox" value="5"  id="thu">
                                Fri&nbsp;<input  type="checkbox" value="6"  id="fri">
                                Sat&nbsp;<input  type="checkbox" value="7"  id="sat">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="venueform" id="venueform" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel1">Add a Venue</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="venuename" class="col-sm-3 control-label ">Venue Name&nbsp;
                                <span style="color:red">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="text"  class="form-control " name="venuename"  id="venuename">
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="city1" class="col-sm-3 control-label ">City&nbsp;<span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select  class="form-control " name="city1"  id="city1"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="locality" class="col-sm-3 control-label ">Locality&nbsp;<span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select  class="form-control " name="locality"  id="locality"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="address" class="col-sm-3 control-label ">Address&nbsp;<span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text"  class="form-control " name="address"  id="address">
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="pincode" class="col-sm-3 control-label ">pincode&nbsp;<span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text"  class="form-control " name="pincode"  id="pincode">
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="mobile" class="col-sm-3 control-label ">mobile&nbsp;<span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="tel"  class="form-control " name="mobile"  id="mobile">
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="landline" class="col-sm-3 control-label ">LandLine&nbsp;<span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text"  class="form-control " name="landline"  id="landline">
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="comments" class="col-sm-3 control-label ">Comments&nbsp;</label>
                            <div class="col-sm-8">
                                <textarea   class="form-control " name="comments"  id="comments"></textarea>
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
</div>

</body>
</html>