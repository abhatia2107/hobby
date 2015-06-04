@section("navbarVendor")
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
                <li id="navbar-vendor-profile"><a href="/institutes/show/{{$institute_id}}">Institute Profile</a></li>
                <li id="navbar-vendor-batches"><a href="/batches">My Batches</a></li>
                <li id="navbar-vendor-venues"><a href="/venues">My Venues</a></li>
                <li id="navbar-vendor-createBatch"><a href="/batches/create">Create a Batch</a></li>
            </ul>
        </div>
    </div>
</nav>
@show