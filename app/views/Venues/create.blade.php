<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Venue - Formoid form css</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">



<!-- Start Formoid form-->
<link rel="stylesheet" href="venue_files/formoid1/formoid-metro-cyan.css" type="text/css" />
<script type="text/javascript" src="venue_files/formoid1/jquery.min.js"></script>
<form class="formoid-metro-cyan" style="background-color:#FFFFFF;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Venue</h2></div>
    <div class="element-input" title="Name of Venue"><label class="title">Name of Venue<span class="required">*</span></label><input class="large" type="text" name="venue" required="required"/></div>
    <div class="element-select" title="City"><label class="title">City<span class="required">*</span></label><div class="large"><span><select name="venue_location" required="required">

        <option value="Hyderabad">Hyderabad</option>
        <option value="Delhi">Delhi</option>
        <option value="Other">Other</option></select><i></i></span></div></div>
    <div class="element-select" title="Locality"><label class="title">Locality</label><div class="large"><span><select name="venue_locality" >

        <option value="Kancheguda">Kancheguda</option>
        <option value="Madhapur">Madhapur</option>
        <option value="Other">Other</option></select><i></i></span></div></div>
    <div class="element-input" title="Address"><label class="title">Address<span class="required">*</span></label><input class="large" type="text" name="venue_address" required="required"/></div>
    <div class="element-input" title="Pin Code"><label class="title">Pin Code<span class="required">*</span></label><input class="large" type="text" name="venue_pincode" required="required"/></div>
    <div class="element-input" title="Landmark"><label class="title">Landmark</label><input class="large" type="text" name="venue_landmark"/></div>
    <div class="element-phone" title="Contact No."><label class="title">Contact No.<span class="required">*</span></label><input class="large" type="tel" pattern="\d{3}-\d{3}-\d{4}" maxlength="24" name="venue_contact_no" required="required" placeholder="XXX-XXX-XXXX" value=""/></div>
    <div class="element-email" title="Email"><label class="title">Email</label><input class="large" type="email" name="venue_email" value="" /></div>
<div class="submit"><input type="submit" value="Submit"/></div></form><p class="frmd"><a href="http://formoid.com/v29.php">form css</a> Formoid.com 2.9</p><script type="text/javascript" src="venue_files/formoid1/formoid-metro-cyan.js"></script>
<!-- Stop Formoid form-->



</body>
</html>
