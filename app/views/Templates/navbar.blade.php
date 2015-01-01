<div class="clearfix" style="margin-left:-15px">
    <div class=" col-sm-10 col-md-10 ">
        <nav class="navbar navbar-inverse" >
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        @if(isset($all_locations))
                            @foreach($all_categories as $data)
                                <li ><a href="/keywords/{{$data->id}}">{{$data->category}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class= "col-sm-2 col-md-2 ">
        <button class="btn btn-lg navbar_submit_listing" >Submit Listing</button>
    </div>
</div>