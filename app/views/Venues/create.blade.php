<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>My Venues</title>
  </head>
  <body>
        <form name="venueform" id="venueform" role="form" action="/venues/store" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <label for="venuename" class="col-sm-3 control-label ">Venue Name&nbsp;<span style="color:red">*</span></label>
                        <div class="col-sm-8">
                            <input type="text"  class="form-control input1" name="venue"  id="venuename">
                        </div>
                    </div>

                </div><br>
                <div class="row">
                    <div class="form-group">
                        <label for="city1" class="col-sm-3 control-label ">City&nbsp;<span style="color:red">*</span></label>
                        <div class="col-sm-8">
                            <select  class="form-control " name="location"  id="city1"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select>
                        </div>
                    </div>

                </div><br>
                <div class="row">
                    <div class="form-group">
                    <div class="form-group">
                        <label for="venuename" class="col-sm-3 control-label ">Locality&nbsp;<span style="color:red">*</span></label>
                        <div class="col-sm-8">
                            <input type="text"  class="form-control input1" name="venue_locality"  id="locality">
                        </div>
                    </div>

                </div><br>
                <div class="row">
                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label ">Address&nbsp;<span style="color:red">*</span></label>
                        <div class="col-sm-8">
                            <input type="text"  class="form-control input1" name="venue_address"  id="address">
                        </div>
                    </div>

                </div><br>
                <div class="row">
                    <div class="form-group">
                        <label for="pincode" class="col-sm-3 control-label ">Pincode&nbsp;<span style="color:red">*</span></label>
                        <div class="col-sm-8">
                            <input type="text"  class="form-control input1" name="venue_pincode"  id="pincode">
                        </div>
                    </div>

                </div><br>
                <div class="row">
                    <div class="form-group">
                        <label for="mobile" class="col-sm-3 control-label ">mobile&nbsp;<span style="color:red">*</span></label>
                        <div class="col-sm-8">
                            <input type="tel"  class="form-control input1" name="venue_contact_no"  id="mobile">
                        </div>
                    </div>

                </div><br>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </body>
</html>