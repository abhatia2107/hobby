@section("navbar")
<nav class="navbar navbar-inverse" >
   <!--- <div class="container-fluid">
         <a class="btn btn-primary navbar-right" href="/batches">Host Panel</a>
        <!-- @if($loggedIn) -->
            <!-- <a class="btn btn-primary navbar-right" href="/batches">Host Panel</a> -->
        <!-- @else -->
            <!-- <button id="hostPanelLogin" class="btn btn-primary navbar-right" data-target="#loginModal" data-toggle="modal" href="/batches" >Host Panel{{$loggedIn}}</button>             -->
        <!-- @endif 
        <div class="navbar-header min-button">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                
            </button>   
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
            @if(isset($categories))
                @foreach($categories as $data)
                    <li id='NavItem{{$data->id}}'><a href="/filter/categories/{{$data->id}}/locations/@if(isset($location_id)){{$location_id}}@endif">{{$data->category}}</a></li>
                @endforeach
            @endif
            </ul>
        </div> 
    </div> -->
</nav>
@show