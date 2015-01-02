<?php $location_id =0;?>
<div class="clearfix">
    <div class=" col-sm-12 col-md-12 ">
        <nav class="navbar navbar-inverse" >
            <div class="container-fluid">
                <a class="navbar-brand btn btn-primary navbar-right" href="/batches/create">Submit Listing</a>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                
                    </button>
                    
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                    @if(isset($all_categories))
                        @foreach($all_categories as $data)
                            <li ><a href="/filter/categories/{{$data->id}}/locations/{{$location_id}}">{{$data->category}}</a></li>
                        @endforeach
                    @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!--Just In CASe
    <div class= "col-sm-2 col-md-2 ">
        <button class="btn btn-lg navbar_submit_listing" >Submit Listing</button>
    </div>-->
</div>