@section("navbarVendor")
    <div class="row" >
        <div class=" col-sm-12 col-md-12">
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
                            <li ><a href="/institutes/show/{{$institute_id}}">Institute Profile</a></li>
                            <li ><a href="/batches">My Batches</a></li>
                            <li class="active"><a href="/venues">My Venues</a></li>
                            <li ><a href="/batches/create">Create a Batch</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
@show