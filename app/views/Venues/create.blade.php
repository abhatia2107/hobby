<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Add a Venue</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/formoid1/formoid-metro-cyan.css" type="text/css" />
</head>

<body class="blurBg-false" style="background-color:#EBEBEB">
  @if($errors->has())
    <div class="alert alert-block alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="fa fa-times-circle fa-fw fa-lg"></i>Oh snap! You got an error!</h4>
        @foreach($errors->all() as $error)
            <p>{{ $error }}<br></p>
        @endforeach
    </div>
  @endif

<!-- Start Formoid form-->
<form enctype="multipart/form-data" class="formoid-metro-cyan form_create" action="/venues/store" method="post">
    <div class="title"><h2>Venue</h2></div>
    <div class="element-input" title="Name of Venue"><label class="title">Name of Venue<span class="required">*</span></label><input class="large" type="text" name="venue" required="required"/></div>
    <div class="element-select" title="City"><label class="title">City<span class="required">*</span></label><div class="large"><span><select name="venue_location" required="required">

        <option value="3">Hyderabad</option>
        <option value="2">Delhi</option>
        <option value="1">Other</option></select><i></i></span></div></div>
    <div class="element-select" title="Locality"><label class="title">Locality<span class="required">*</span></label><div class="large"><span><select name="venue_locality" required="required">

        <option value="Kancheguda">Kancheguda</option>
        <option value="Madhapur">Madhapur</option>
        <option value="Other">Other</option></select><i></i></span></div></div>
    <div class="element-input" title="Address"><label class="title">Address<span class="required">*</span></label><input class="large" type="text" name="venue_address" required="required"/></div>
    <div class="element-input" title="Pin Code"><label class="title">Pin Code<span class="required">*</span></label><input class="large" type="text" name="venue_pincode" required="required"/></div>
    <div class="element-input" title="Landmark"><label class="title">Landmark</label><input class="large" type="text" name="venue_landmark"/></div>
    <div class="element-phone" title="Contact No."><label class="title">Contact No.<span class="required">*</span></label><input class="large" type="tel" maxlength="24" name="venue_contact_no" required="required" placeholder="XXXXXXXXXX" value=""/></div>
    <div class="element-email" title="Email"><label class="title">Email</label><input class="large" type="email" name="venue_email" value="" /></div>
<div class="submit"><input type="submit" value="Submit"/></div></form>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="/assets/formoid1/formoid-metro-cyan.js"></script>
<!-- Stop Formoid form-->



</body>
</html>
