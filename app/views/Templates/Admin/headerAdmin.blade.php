@section("headerAdmin")
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
        <a class="navbar-brand" href="/admins/home">Admin Portal</a>
     </div>
     <!-- Top Menu Items -->
     <ul class="nav-ul nav navbar-right top-nav">
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
                                    <p class="message small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p class="message">Approval Request</p>
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
                                    <p class="message small text-muted"><i class="fa fa-clock-o"></i> 20th December 2014 at 2:00 AM</p>
                                    <p class="message">Error in logging in</p>
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
                                    <p class="message small text-muted"><i class="fa fa-clock-o"></i> 11th December 2014 at 6:00 PM</p>
                                    <p class="message">Thank you for adding.</p>
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
              <a href="/admins/home"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
           </li>
           <li class="active">
              <a href="/batches/approve"><i class="fa fa-fw fa-dashboard"></i> Approval</a>
           </li>
           <li class="active">
              <a href="/institutes"><i class="fa fa-fw fa-dashboard"></i> Institutes</a>
           </li>
           <li class="active">
              <a href="/users"><i class="fa fa-fw fa-dashboard"></i> Users</a>
           </li>
           <li class="active">
              <a href="/categories"><i class="fa fa-fw fa-dashboard"></i> Categories</a>
           </li><li class="active">
              <a href="/subcategories"><i class="fa fa-fw fa-dashboard"></i> Sub-Categories</a>
           </li>
           <li class="active">
              <a href="/locations"><i class="fa fa-fw fa-dashboard"></i> Locations</a>
           </li><li class="active">
              <a href="/localities"><i class="fa fa-fw fa-dashboard"></i> Localities</a>
           </li>
           <li class="active">
              <a href="/subscriptions"><i class="fa fa-fw fa-dashboard"></i> Subscriptions</a>
           </li><li class="active">
              <a href="/feedbacks"><i class="fa fa-fw fa-dashboard"></i> Feedbacks</a>
           </li>
            <li class="active">
              <a href="/admins"><i class="fa fa-fw fa-dashboard"></i> Main Admin</a>
           </li>
        </ul>
     </div>
     <!-- /.navbar-collapse -->
  </nav>
@show
