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
        $facebookContent[3] = "Get access to all the gyms, zumba classes, aerobics, yoga, kick-boxing and dance etc. with one membership.";
    }
?>
    <meta name="google-site-verification" content="vgzS24WtBop22kDPTpDMKE4pKu92EkBc3NVHcuIqPfk" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>{{$metaContent[0]}}</title>
    <meta name="description" content="{{$metaContent[1]}}">
    <meta name="keywords" content="{{$metaContent[2]}}">
    <meta name="author" content="Hobbyix">
    <meta property="og:image" content="/assets/images/home/banner.jpg">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/font-awesome/css/font-awesome.min.css"> 
    <link rel="stylesheet" type="text/css" href="/assets/css/jquery-ui-1.11.2.min.css" >
    <link rel="stylesheet" type="text/css" href="/assets/css/hobby_style_mobile.css">  

    <script src="/assets/js/jquery-1.11.2.min.js"></script>   
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery-ui-1.10.4.min.js"></script>
    <script src="/assets/js/home.js"></script>
@show
