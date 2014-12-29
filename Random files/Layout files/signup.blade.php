@section("signup")
<div class="modal-dialog">
        <div class="modal-content">
            <form name="signUp" id="signUp" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel1">Sign-Up</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="first_name" class="col-sm-3 control-label ">First Name&nbsp;
                                <span style="color:red">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="text"   class="form-control " name="first_name"  id="first_name">
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="last_name"  class="col-sm-3 control-label ">Last Name&nbsp;

                            </label>
                            <div class="col-sm-8">
                                <input type="text"  class="form-control " name="last_name"  id="last_name">
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label ">Email&nbsp;
                                <span style="color:red">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="email"  placeholder="mymail@example.com" class="form-control " name="email"  id="email">
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="mobile" class="col-sm-3 control-label ">mobile&nbsp;<span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="tel"   class="form-control " name="mobile"  id="mobile">
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label ">Password&nbsp;
                                <span style="color:red">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="password"   class="form-control " name="password"  id="password">
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="form-group">
                            <label for="confpassword" class="col-sm-3 control-label ">Confirm Password&nbsp;
                                <span style="color:red">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="password"   class="form-control " name="confpassword"  id="confpassword">
                            </div>
                        </div>
                    </div><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
@show