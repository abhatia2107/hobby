@section("head")
<?php
    if(!isset($metaContent))
    {
        $metaContent[0] = "Gym, Zumba, Yoga, Swimming, Boxing in Hyderabad:: Hobbyix";
        $metaContent[1] = "Get access to all gym, zumba classes, aerobics, pilates, yoga, kick-boxing and dance etc. with one membership.";
        $metaContent[2] = "gyms, best gyms, zumba classes, zumba dance, gym, aerobics classes, pilates classes, yoga centers, yoga classes, kick boxing, gym membership, aerobic exercise";
    }
    if(!isset($facebookContent))
    {
        $facebookContent[0] = "Hobbyix";
        $facebookContent[1] = url('/');
        $facebookContent[2] = asset('/assets/images/home/institute.jpg');
        $facebookContent[3] = "Get access to all gym, zumba classes, aerobics, pilates, yoga, kick-boxing and dance etc. with one membership.";
    }
?>
    <meta name="google-site-verification" content="vgzS24WtBop22kDPTpDMKE4pKu92EkBc3NVHcuIqPfk" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>{{$metaContent[0]}}</title>
    <meta name="description" content="{{$metaContent[1]}}">
    <meta name="keywords" content="{{$metaContent[2]}}">
    <meta name="author" content="Hobbyix">   
    <meta property="og:title" content="{{$facebookContent[0]}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="hobbyix.com"/>
    <meta property="og:url" content="{{$facebookContent[1]}}" />    
    <meta property="og:image" content="{{$facebookContent[2]}}" />
    <meta property="og:description" content="{{$facebookContent[3]}}" />
    <link rel="canonical" href="{{$facebookContent[1]}}">
    <link rel="icon" type="image/png" href="/assets/images/hobbyix_favicon.png">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/jquery-ui-1.11.2.min.css" >
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrapValidator.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/hobby_style.css">  
    <script src="/assets/js/jquery-1.11.2.min.js"></script>
    <script src="/assets/js/jquery-2.1.1.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/bootstrapValidator-0.5.3.min.js"></script>
    <script src="/assets/js/jquery-ui-1.10.4.min.js"></script>
    <script src="/assets/js/jquery-ui-1.7.2.custom.min.js"></script>
    <script src="/assets/js/home.js"></script>  
@show
