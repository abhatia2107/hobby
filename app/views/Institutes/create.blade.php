<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Add an institute</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/formoid1/formoid-metro-cyan.css" type="text/css" />
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">



<!-- Start Formoid form-->
<form enctype="multipart/form-data" class="formoid-metro-cyan form_create" action="/institutes/store" method="post">
    <div class="title"><h2>Add an Institute</h2></div>
    <div class="element-input" title="Name of the institute"><label class="title">Name of the institute<span class="required">*</span></label><input class="large" type="text" name="institute" required="required"/></div>
    <div class="element-textarea" title="Description of the institute"><label class="title">Tell us more about your institute<span class="required">*</span></label><textarea class="medium" name="institute_description" cols="20" rows="5" required="required"></textarea></div>
    <div class="element-select" title="City"><label class="title">City<span class="required">*</span></label><div class="large"><span><select name="institute_location" required="required">

        <option value="2">Hyderabad</option>
        <option value="3">Delhi</option>
        <option value="1">Other</option></select><i></i></span></div></div>
    <div class="element-url" title="Website"><label class="title">Website</label><input class="large" type="url" name="institute_website" value="http://" /></div>
    <div class="element-input" title="Facebook Page"><label class="title">Facebook Page</label><input class="large" type="text" name="institute_fblink" /></div>
    <div class="element-input" title="Twitter Profile"><label class="title">Twitter Profile</label><input class="large" type="text" name="institute_twitter" /></div>
    <div class="submit"><input type="submit" value="Submit"/></div></form>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/assets/formoid1/formoid-metro-cyan.js"></script>

<!-- Stop Formoid form-->



</body>
</html>
