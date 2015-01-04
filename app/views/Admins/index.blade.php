@extends("Layouts.Admin.layout")
@section("content")
	<nav>
		<ul class="nav-ul">
			<li class="nav-li" id="login">
				<!-- TO DO: CSS not working on login-trigger. Check this. -->
				<a class="login-trigger">
					<button type="button" class="btn btn-success ">
						Add an Admin <span>▼</span>
					</button>
				</a>
				<div id="login-content">
					<form action="/admins/store" enctype="multipart/form-data" method="post">
						<fieldset id="inputs">
							<input type="text" name="admin_user_id" placeholder="User ID" required>
							<input type="email" name="email" placeholder="Email address" required>   
						</fieldset>
						<fieldset id="actions">
							<input type="submit" id="submit" value="Add Admin">
							<input type="button" id="submit" value="Cancel">
						</fieldset>
					</form>
				</div>                     
			</li>
		</ul>
	</nav>

	 <table class="table">
	    <thead>
	       <tr>
	          <th>S.No.</th>
	          <th>Name (Job Title)</th>
	          <th>User ID</th>
	          <th></th>
	       </tr>
	    </thead>
	    <tbody>
	        <?php $i=0;?>
	        @foreach($admins as $data)
	        <tr>
	            <td>{{++$i}}</td>
	            <td>{{$data->user_first_name.' '.$data->user_last_name}}</td>
	            <td>{{$data->admin_user_id}}</td>
	            <td>
					<a href="#">
						<button type="button" class="btn btn-success ">
							<span class="glyphicon glyphicon-user"></span>
							View
						</button>
					</a>
					<!-- 
					<a href="#">
						<button type="button" class="btn btn-success ">
							<span class="glyphicon glyphicon-pencil"></span>
							View
						</button>
					</a> -->
				</td>
				<td>
					<a href="#">
						<button type="button" class="btn btn-info " input type="submit" value="Button">
							<span class="glyphicon glyphicon-open"></span> 
							Enable
						</button>
					</a>
				</td>
				<td>
					<a href="/delete">
						<button type="button" class="btn btn-warning ">
							<span class="glyphicon glyphicon-remove"></span> 
							Disable
						</button>
					</a>
				</td>
				<td>
					<!-- Remove modal -->
					<button class="btn btn-danger" data-toggle="modal" data-target="#removeModal">
						<span class="glyphicon glyphicon-trash"></span>
						Remove
					</button>
					<div id="removeModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h4 class="modal-title">
										Remove permanently
									</h4>
								</div>
								<div class="modal-body">
									<p class="message">Do you want to remove the particular admin?</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<a href="#">
										<button type="button" class="btn btn-primary">
											Remove
										</button>
									</a>
								</div>
							</div>
						</div>
					</div>
				</td>
			</tr>
	       @endforeach
	    </tbody>
	 </table>
@stop
@section("pagejquery")
    <!-- jQuery -->
    <script>
    $(document).ready(function(){
      $('.login-trigger').click(function(){
        $(this).next('#login-content').slideToggle();
        $(this).toggleClass('active');          
        
        if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
          else $(this).find('span').html('&#x25BC;')
        })
    });
    </script>
@stop