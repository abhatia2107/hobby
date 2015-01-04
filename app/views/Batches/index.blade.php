<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Case</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">


  </head>
  <body>
    <nav class="navbar navbar-inverse ">
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
            <li  class="active"><a href="./myclasses.html">My Classes</a></li>
            <li><a href="./profile.html" >My Profile </a></li>
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
        <div style="width: 950px;
/* background: green; */
margin-left: 70px;" >
        <div class="row">
          <div class="col-md-9" style="height:51px" >
              <div class="btn-group" >
                  <button type="button" class="btn  dropdown-toggle btn-default" data-toggle="dropdown" aria-expanded="false" style="width:200px;background-color:white">
                      Display All Classes <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                      <li><a href="myclasses2.html">Display All Classes</a></li>
                      <li><a href="#">Display Past Classes</a></li>
                      <li><a href="#">Display Submitted Classes</a></li>
                      <li><a href="#">Display Rejected Classes</a></li>
                      <li><a href="#">Display Upcoming Classes</a></li>
                  </ul>
              </div>
          </div>
            
          <div class="col-md-3" style="height:51px" >
            <button style="color: white;font-size: 16px;border-radius: 4px;
            background-color: #2274ef;" class="btn btn-default "><a style="color: white;font-size: 16px;text-decoration:none"href="listclass.html">List a Class </a></button>
          </div>

      </div>
        <div class="">
            <div class="col-lg-12" >
                <div style="float: right;
padding-top: 20px;

background: #fbfbfb;
border-style: ridge;
border-color: gainsboro;
border-width: 1px;
margin-top: 20px;
line-height: 0px;">
                    <p style="font-weight: 700;
                        font-size: 15px;text-align: center;">New Features</p>
                    <div>
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="#"><span style="color:black;font-size:14px;font-weight:800;"class="glyphicon glyphicon-user"></span>&nbsp
                                    <span style="font-size:14px">View Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"><span style="
                                    color:black;font-size:14px;font-weight:800;"class="glyphicon glyphicon-volume-up"></span>&nbsp
                                    <span style="font-size:14px">New Promotion Packages</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"><span style="color:black;font-size:14px;font-weight:800;"class="glyphicon glyphicon-thumbs-up" ></span>&nbsp
                                <span style="font-size:14px">Collect Feedback</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"><span style="color:black;font-size:14px;font-weight:800;"class="glyphicon glyphicon-globe"></span>&nbsp
                                <span style="font-size:14px">Blog</span>
                                </a>
                            </li>
                        </ul>
                    </div>

        </div>
      </div>
</div>
        

        <div class="clearfix visible-lg">

        </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>