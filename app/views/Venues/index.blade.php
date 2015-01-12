@extends("Layouts.layout")
@section("content")
 <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="venueform" id="venueform" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel1">Add a Venue</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="venuename" class="col-sm-3 control-label ">Venue Name&nbsp;<span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control " name="venuename"  id="venuename" required>
                            </div>
                        </div>

                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="city1" class="col-sm-3 control-label ">City&nbsp;<span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select  class="form-control " name="city1"  id="city1" required><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select>
                            </div>
                        </div>

                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="locality" class="col-sm-3 control-label ">Locality&nbsp;<span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select  class="form-control " name="locality"  id="locality" required><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select>
                            </div>
                        </div>

                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="address" class="col-sm-3 control-label ">Address&nbsp;<span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text"  class="form-control " name="address"  id="address" required>
                            </div>
                        </div>

                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="pincode" class="col-sm-3 control-label ">Pincode&nbsp;<span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text"  class="form-control " name="pincode"  id="pincode" required>
                            </div>
                        </div>

                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="mobile" class="col-sm-3 control-label ">Mobile No.&nbsp;<span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="tel"  class="form-control " name="mobile"  id="mobile" required>
                            </div>
                        </div>

                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="landline" class="col-sm-3 control-label ">LandLine No.&nbsp;<span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text"  class="form-control " name="landline"  id="landline" required>
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
<div class="home_vendor_page">
	<nav class="navbar navbar-inverse" id="vendorNavBar">
	    <div class="container-fluid">
		    <div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#vendorNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>                
			    </button>
		    </div>
		    <div class="collapse navbar-collapse" id="vendorNavbar">
				<ul class="nav navbar-nav">
					<li ><a href="/institutes/1">Institute Profile</a></li>
					<li ><a href="/batches">My Classes</a></li>
					<li class="active"><a href="#">My Venues</a></li>
				</ul>
		      	<ul class="nav navbar-nav navbar-right">
		        	<li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		      	</ul>
		    </div>
		</div>
	</nav>
	<div class="container">
		 <div class="col-lg-6" >
          

            <button style="background-color: #3C88FB;color:white;font-size: 16px" class="btn  btn-sm" data-toggle="modal" data-target="#myModal2">Add a venue </button>
          
          </div>
		<div class="vendor_institute_batches venues_list_container col-md-12 col-xs-12 col-sm-12">
			<div class="vendor_batches_title">
		   		<h1>My Venues</h1>
		   	</div><br><br>		   	
		   	@foreach($venues as $index => $data)
				<div class="col-md-4 col-xs-12 col-sm-4">
					<div class="venues_list">
						<div class="venues_list_tittle">{{$data->venue}}</div>
						<br>
						<div class="venue_info"><span class='tag'>Address: </span>{{$data->venue_address}}, {{$data->locality}}, {{$data->location}}, {{$data->venue_pincode}}</div>
						<div class="venue_info"><span class='tag'>Contact No.: </span>{{$data->venue_contact_no}}</div>
						<div class="venue_info"><span class='tag'>E-Mail: </span>{{$data->venue_email}}</div>
						<div class="venue_info"><span class='tag'>Land Mark: </span>{{$data->venue_landmark}}</div>
					
						<br>
						<div class="venue">
							<center>
							<button type="submit" class="btn btn-primary">Edit</button>
							<button type="submit" class="btn btn-primary">Delete</button>
							</center>
						</div>
					</div>
				</div>  		
		   	@endforeach
		   		@foreach($venues as $index => $data)
				<div class="col-md-4 col-xs-12 col-sm-4">
					<div class="venues_list">
						<div class="venues_list_tittle">{{$data->venue}}</div>
						<br>
						<div class="venue_info"><span class='tag'>Address: </span>{{$data->venue_address}}, {{$data->locality}}, {{$data->location}}, {{$data->venue_pincode}}</div>
						<div class="venue_info"><span class='tag'>Contact No.: </span>{{$data->venue_contact_no}}</div>
						<div class="venue_info"><span class='tag'>E-Mail: </span>{{$data->venue_email}}</div>
						<div class="venue_info"><span class='tag'>Land Mark: </span>{{$data->venue_landmark}}</div>
					
						<br>
						<div class="venue">
							<center>
							<button type="submit" class="btn btn-primary">Edit</button>
							<button type="submit" class="btn btn-primary">Delete</button>
							</center>
						</div>
					</div>
				</div>  		
		   	@endforeach
			@foreach($venues as $index => $data)
				<div class="col-md-4 col-xs-12 col-sm-4">
					<div class="venues_list">
						<div class="venues_list_tittle">{{$data->venue}}</div>
						<br>
						<div class="venue_info"><span class='tag'>Address: </span>{{$data->venue_address}}, {{$data->locality}}, {{$data->location}}, {{$data->venue_pincode}}</div>
						<div class="venue_info"><span class='tag'>Contact No.: </span>{{$data->venue_contact_no}}</div>
						<div class="venue_info"><span class='tag'>E-Mail: </span>{{$data->venue_email}}</div>
						<div class="venue_info"><span class='tag'>Land Mark: </span>{{$data->venue_landmark}}</div>
					
						<br>
						<div class="venue">
							<center>
							<button type="submit" class="btn btn-primary">Edit</button>
							<button type="submit" class="btn btn-primary">Delete</button>
							</center>
						</div>
					</div>
				</div>  		
		   	@endforeach
		</div>
	</div>
</div>
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
  </head>
@stop