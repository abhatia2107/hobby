@section("header")
<div class="row">
    <div class="col-md-4 col-sm-4 ">
        <img src="img/logo.PNG" class="img-responsive">
    </div>
    <div class="col-md-4 col-sm-4 ">
        <select class="combobox form-control" >
            <option></option>
            <option value="PA">Pennsylvania</option>
            <option value="CT">Connecticut</option>
            <option value="NY">New York</option>
            <option value="MD">Maryland</option>
            <option value="VA">Virginia</option>
        </select>
        <button style="float:right;margin-top:-32px;background-color:white" >
            <img  id="srcImg" src="img/Capture.PNG">
        </button>
    </div>
    <div class="col-md-1 col-sm-1  ">
            <button class="btn btn-primary btn_990" data-toggle="modal" data-target="#signupModal">Sign-Up</button>
    </div>
    <div class="col-md-1 col-sm-1  ">
            <button class="btn btn-primary btn_990" data-toggle="modal" data-target="#signinModal">Sign-In</button>
    </div>
        <div class="col-md-2 col-sm-2 ">
            <div class="btn-group" style="width:100%">
                <button style="width:100%" type="button" class="btn  dropdown-toggle btn-default" data-toggle="dropdown" aria-expanded="false" >
                                    City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Hyderabad</a></li>
                    <li><a href="#">Mumbai</a></li>
                    <li><a href="#">Delhi</a></li>
                    <li><a href="#">Chennai</a></li>
                    <li><a href="#">Kolkata</a></li>
                </ul>
            </div>
        </div>
    </div>
@show