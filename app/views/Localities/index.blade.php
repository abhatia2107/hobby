<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
   <head>
    <style type="text/css">
         .btn-toolbar{
         margin: 20px;
         }
      </style>

<style type="text/css">
p{
    background: #F9F9F9;
    border: 1px solid #E1E1E8;
    margin: 10px 0;
    padding: 8px;
}
.bs-example{
  margin: 20px;
}
</style>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Admin Portal</title>
      <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href=""/assets/css/bootstrap-theme.min.css"">
      <link href="/assets/css/sb-admin.css" rel="stylesheet">
      <link href="/assets/css/plugins/morris.css" rel="stylesheet">
      <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<style>
nav ul {
  margin: 0;
  padding: 0;
  list-style: none;
  position: relative;
  float: right;
 
     
}

nav li {
  float: left;          
}

nav #login {
  border-right: 1px solid #ddd;
  box-shadow: 1px 0 0 #fff;  
}

nav #login-trigger,
nav #signup a {
  display: inline-block;
  *display: inline;
  *zoom: 1;
  height: 25px;
  line-height: 25px;
  font-weight: bold;
  padding: 0 8px;
  text-decoration: none;
  color: #444;
  text-shadow: 0 1px 0 #fff; 
}

nav #signup a {
  border-radius: 0 3px 3px 0;
}

nav #login-trigger {
  border-radius: 3px 0 0 3px;
}

nav #login-trigger:hover,
nav #login .active,
nav #signup a:hover {
  background: #fff;
}

nav #login-content {
  display: none;
  position: absolute;
  top: 24px;
  right: 0;
  z-index: 999;    
  background: #fff;
  background-image: linear-gradient(top, #fff, #eee);  
  padding: 15px;
  box-shadow: 0 2px 2px -1px rgba(0,0,0,.9);
  border-radius: 3px 0 3px 3px;
}

nav li #login-content {
  right: 0;
  width: 250px;  
}

/*--------------------*/

#inputs input {
  background: #f1f1f1;
  padding: 6px 5px;
  margin: 0 0 5px 0;
  width: 238px;
  border: 1px solid #ccc;
  border-radius: 3px;
  box-shadow: 0 1px 1px #ccc inset;
}

#inputs input:focus {
  background-color: #fff;
  border-color: #e8c291;
  outline: none;
  box-shadow: 0 0 0 1px #e8c291 inset;
}

/*--------------------*/

#login #actions {
  margin: 10px 0 0 0;
}

#login #submit {    
  background-color: #d14545;
  background-image: linear-gradient(top, #e97171, #d14545);
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  text-shadow: 0 1px 0 rgba(0,0,0,.5);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0.3), 0 1px 0 rgba(255, 255, 255, 0.3) inset;    
  border: 1px solid #7e1515;
  float: left;
  height: 30px;
  padding: 0;
  width: 100px;
  cursor: pointer;
  font: bold 14px Arial, Helvetica;
  color: #fff;
}

#login #submit:hover,
#login #submit:focus {    
  background-color: #e97171;
  background-image: linear-gradient(top, #d14545, #e97171);
} 

#login #submit:active {   
  outline: none;
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;   
}

#login #submit::-moz-focus-inner {
  border: none;
}

#login label {
  float: right;
  line-height: 30px;
}

#login label input {
  position: relative;
  top: 2px;
  right: 2px;
}

</style>
<script>
$(document).ready(function(){
  $('#login-trigger').click(function(){
    $(this).next('#login-content').slideToggle();
    $(this).toggleClass('active');          
    
    if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
      else $(this).find('span').html('&#x25BC;')
    })
});
</script>
   </head>
   <body>
      <div id="wrapper">
      <!-- Navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="Dashboard.html">Admin Portal</a>
         </div>
         <!-- Top Menu Items -->
         <ul class="nav navbar-right top-nav">
<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Arya Mihir Singh</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Approval Request</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Pavan Patel</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> 20th December 2014 at 2:00 AM</p>
                                        <p>Error in logging in</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Bhavesh Goel</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> 11th December 2014 at 6:00 PM</p>
                                        <p>Thank you for adding.</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Options <b class="caret"></b></a>
               <ul class="dropdown-menu">
                  <li>
                     <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                  </li>
               </ul>
            </li>
         </ul>
         <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
       <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
               <li class="active">
                  <a href="Dashboard.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
               </li>
               <li class="active">
                  <a href="Approval.html"><i class="fa fa-fw fa-dashboard"></i> Approval</a>
               </li>
               <li class="active">
                  <a href="Institutes.html"><i class="fa fa-fw fa-dashboard"></i> Institutes</a>
               </li>
               <li class="active">
                  <a href="Main-Admin.html"><i class="fa fa-fw fa-dashboard"></i> Main Admin</a>
               </li>
               <li class="active">
                  <a href="Categories.html"><i class="fa fa-fw fa-dashboard"></i> Categories</a>
               </li><li class="active">
                  <a href="Sub-Categories.html"><i class="fa fa-fw fa-dashboard"></i> Sub-Categories</a>
               </li>
               <li class="active">
                  <a href="Categories.html"><i class="fa fa-fw fa-dashboard"></i>Locations</a>
               </li><li class="active">
                  <a href="Sub-Categories.html"><i class="fa fa-fw fa-dashboard"></i>Localities</a>
               </li>
            </ul>
         </div>
         <!-- /.navbar-collapse -->
      </nav>
      <div id="page-wrapper">
      <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Locality
               <small></small>
            </h1>
         </div>
      </div>
      <!-- /.row -->
                               <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">260</div>
                                        <div>User Registrations</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">40</div>
                                        <div>Total batches</div>
                                    </div>
                                </div>
                            </div>
                            <a href="Batch-registrations.html">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">19</div>
                                        <div>Institute registrations</div>
                                    </div>
                                </div>
                            </div>
                            <a href="Institute-Registrations.html">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">7</div>
                                        <div>Pending Approvals</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    </div>
   <nav>
  <ul>
    <li id="login">
      <a id="login-trigger" href="#">
        Add a Locality <span>▼</span>
      </a>
      <div id="login-content">
        <form>
          <fieldset id="inputs">
		<input id="username" type="password" name="User Name" placeholder="Location Name" required>  
<input id="username" type="password" name="User Name" placeholder="Locality Name" required> 
          </fieldset>
          <fieldset id="actions">
            
		<input type="submit" id="submit" value="Submit">
<input type="button" id="submit" value="Cancel">
          </fieldset>
        </form>
      </div>                     
    </li>
  </ul>
</nav>


@if($errors->has())
  <div class="alert alert-block alert-danger fade in">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="fa fa-times-circle fa-fw fa-lg"></i>Oh snap! You got an error!</h4>
  @foreach($errors->all() as $error)
  <p>{{ $error }}<br></p>
  @endforeach
  </div>
  @endif
  @if(Session::has('success'))
  <div class="alert alert-success fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <i class="fa fa-check-circle fa-fw fa-lg"></i>
  <strong>Well done!</strong> {{Session::get('success')}}     
  </div>

  @endif
  @if(Session::has('failure'))
  <div class="alert alert-danger fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <i class="fa fa-times-circle fa-fw fa-lg"></i>
  {{Session::get('failure')}}
  </div>

  @endif

           <table class="table">
            <thead>
               <tr>
                  <th>S.No.</th>
                  <th>Locality Name</th>
                  <th>Location</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
                <?php $i=0;?>
                @foreach($localities as $data)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$data->locality}}</td>
                    <td>{{$data->location}}</td>
                    <td>
                     <div class="bs-example">
                        <div class="btn-group">
                           <button class="btn btn-info"><span class="glyphicon glyphicon-file"></span> Action</button>
                           <button data-toggle="dropdown" class="btn btn-info dropdown-toggle"><span class="caret"></span></button>
                           <ul class="dropdown-menu">
                              <li><a href="/localities/{{$data->id}}"><span class="glyphicon glyphicon-pencil"></span>View</a></li>
                              <li><a href="/localities/edit/{{$data->id}}"><span class="glyphicon glyphicon-share"></span> Edit</a></li>
                              <li><a href="#"><span class="glyphicon glyphicon-print"></span> Print the details</a></li>
                              <li class="divider"></li>
                              <li><a href="/localities/delete/{{$data->id}}"><span class="glyphicon glyphicon-trash"></span> Remove</a></li>
                           </ul>
                        </div>
                     </div>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>

      <!-- jQuery -->
      <script src="/assets/js/jquery-1.11.2.min.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="/assets/js/bootstrap.min.js"></script>
   </body>
</html>
