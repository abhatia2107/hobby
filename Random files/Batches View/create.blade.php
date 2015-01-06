<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Add a batch</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/formoid1/formoid-metro-cyan.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css"/>
</head>
<body class="blurBg-false" style="background-color:#ffffff">

  @if($errors->has())
    <div class="alert alert-block alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="fa fa-times-circle fa-fw fa-lg"></i>Oh snap! You got an error!</h4>
        @foreach($errors->all() as $error)
            <p>{{ $error }}<br></p>
        @endforeach
    </div>
  @endif

<div class="col-md-3">
    
</div>
<div class="col-md-6">

<!-- Start Formoid form  formoid-metro-cyan form_create-->
<form role="form" enctype="multipart/form-data" class="" action="/batches/store" method="post">
<div class="title"><h2>Add a batch</h2></div>
    <div class="element-input" title="Name of Batch"><label class="title">Name of Batch<span class="required">*</span></label><input class="large" type="text" name="batch" required="required"/></div>
    <div class="element-select" title="Category">
        <label class="title">Category<span class="required">*</span></label>
            <div class="large">
            <span>
                <select name="batch_category" required="required">
                    <option value="Cooking">Cooking</option>
                    <option value="Dance">Dance</option>
                </select><i></i>
            </span>
        </div>
    </div>
    <div class="element-select" title="SubCategory">
        <label class="title">SubCategory<span class="required">*</span></label>
        <div class="large">
            <span>
                <select name="batch_subcategory" required="required">
                    <option value="option 1">option 1</option>
                    <option value="option 2">option 2</option>
                    <option value="option 3">option 3</option>
                </select><i></i>
            </span>
        </div>
    </div>
    <div class="element-select" title="SubCategory">
        <label class="title">Keyword<span class="required">*</span></label>
        <div class="large">
            <span>
                <select name="batch_keyword" required="required">
                    <option value="option 1">option 1</option>
                    <option value="option 2">option 2</option>
                    <option value="option 3">option 3</option>
                </select><i></i>
            </span>
        </div>
    </div>

    <div class="element-select" title="Venue"><label class="title">Venue<span class="required">*</span></label><div class="large"><span><select name="batch_venue_id" required="required">

        <option value="option 1">option 1</option>
        <option value="option 2">option 2</option>
        <option value="option 3">option 3</option></select><i></i></span></div>
    </div>
    <div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker5'>
                    <input type='text' class="form-control" data-date-format="YYYY/MM/DD"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="element-textarea" title="Accomplishment from the batch"><label class="title">Accomplishment from the batch<span class="required">*</span></label><textarea class="medium" name="batch_accomplishment" cols="20" rows="5" required="required"></textarea></div>
    <div class="element-file" title="Upload Photo of the batch"><label class="title">Upload Photo of the batch</label><label class="large" ><div class="button">Choose Photo</div><input type="file" class="file_input" name="batch_photo" /><div class="file_text">No file selected</div></label></div>
    <div class="element-select" title="Difficulty Level"><label class="title">Difficulty Level</label><div class="large"><span><select name="batch_difficulty_level" >

        <option value="0">All</option>
        <option value="1">Beginner</option>
        <option value="2">Intermediate</option>
        <option value="3">Advanced</option></select><i></i></span></div></div>
    <div class="element-select" title="Age Group"><label class="title">Age Group</label><div class="large"><span><select name="batch_age_group" >

        <option value="0">All</option>
        <option value="1">Children</option>
        <option value="2">Adults</option></select><i></i></span></div></div>
    <div class="element-select" title="Gender"><label class="title">Gender</label><div class="large"><span><select name="batch_gender_group" >

        <option value="0">Both</option>
        <option value="1">Male</option>
        <option value="2">Female</option></select><i></i></span></div></div>
    <div class="element-input" title="Price"><label class="title">Price</label><input class="large" type="text" name="batch_price" /></div>
    <div class="element-number" title="Number of sessions in week"><label class="title">Number of sessions in week<span class="required">*</span></label><input class="large" type="text" min="0" max="7" name="batch_no_of_classes_in_week" required="required" value=""/></div>
    <div class="element-checkbox" title="Batch Schedule">
    <label class="title" required="required">Batch have Classes on<span class="required">*</span></label>      
        <div class="column column1">
        <label><input type="checkbox" name="batch_class_on_monday" value="1"/><span>Monday</span></label>
        <label><input type="checkbox" name="batch_class_on_tuesday" value="1"/><span>Tuesday</span></label>
        <label><input type="checkbox" name="batch_class_on_wednesday" value="1"/><span>Wednesday</span></label>
        <label><input type="checkbox" name="batch_class_on_thursday" value="1"/><span>Thursday</span></label>
        <label><input type="checkbox" name="batch_class_on_friday" value="1"/><span>Friday</span></label>
        <label><input type="checkbox" name="batch_class_on_saturday" value="1"/><span>Saturday</span></label>
        <label><input type="checkbox" name="batch_class_on_sunday" value="1"/><span>Sunday</span></label>
        </div>
    <span class="clearfix"></span>
    </div>
    <div class="element-radio"><label class="title">Batch Recurring<span class="required">*</span></label>
        <div class="column column1">
        <label><input type="radio" name="batch_recurring" value="0" required="required"/><span>Not recurring</span></label>
        <label><input type="radio" name="batch_recurring" value="1" required="required"/><span>Weekly</span></label>
        <label><input type="radio" name="batch_recurring" value="2" required="required"/><span>Monthly</span></label>
        <label><input type="radio" name="batch_recurring" value="3" required="required"/><span>Yearly</span></label>
        </div>
        <span class="clearfix"></span>
    </div>
    <div class="element-radio" title="Trial available">
    <label class="title">Trial available<span class="required">*</span></label>
    <div class="column column1">
    <label>
    <input type="radio" name="batch_trial" value="0" required="required"/>
    <span>Not available</span>
    </label>
    <label>
    <input type="radio" name="batch_trial" value="1" required="required"/>
    <span>Free Trial any time walk-in</span>
    </label>
    <label>
    <input type="radio" name="batch_trial" value="2" required="required"/>
    <span>Paid Trial any time walk-in</span>
    </label>
    <label>
    <input type="radio" name="batch_trial" value="3" required="required"/>
    <span>Free Trial only in beginning of batch</span>
    </label>
    <label>
    <input type="radio" name="batch_trial" value="4" required="required"/>
    <span>Paid Trial only in beginning of batch</span>
    </label>
    </div>
    <span class="clearfix"></span>
    </div>
    <div class="element-textarea" title="Special Comments"><label class="title">Special Comments about the batch (Prerequisite required, anything else you wish to share)</label><textarea class="medium" name="batch_comment" cols="20" rows="5" ></textarea></div>
    <div class="element-input" title="Tagline"><label class="title">Tagline of the batch</label><input class="large" type="text" name="batch_tagline" /></div>
    <div class="submit"><input type="submit" value="Submit"/></div></form>
    <!-- Stop Formoid form-->

    </div>
    <div class="col-md-3">

    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <!-- <script type="text/javascript" src="/assets/formoid1/formoid-metro-cyan.js"></script> -->
    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>    

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker5').datetimepicker({
            });
        });
    </script>
</body>
</html>
