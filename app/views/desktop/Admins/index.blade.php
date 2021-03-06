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
					<form action="{{secure_url('/admins/store')}}" enctype="multipart/form-data" method="post">
						<fieldset id="inputs">
							<input type="email" name="email" placeholder="Email address" required>   
							<input type="text" name="user_contact_no" placeholder="Mobile Number" required>
						</fieldset>
						<fieldset id="actions">
		                    <button type="submit" class="btn btn-success">Add Admin</button>
		                    <button type="button" id="cancel1" class="btn btn-warning " >Cancel</button>
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
	          <th>Name</th>
	          <th>Email</th>
	          <th>Mobile No.</th>
	          <th>Action</th>
	       </tr>
	    </thead>
	    <tbody>
	        <?php
	        	$i=0; 
	        	$view=1;
	        ?>
	        @foreach($admins as $data)
	        <tr>
	            <td>{{++$i}}</td>
	            <td>{{$data->user_name}}</td>
	            <td>{{$data->email}}</td>
	            <td>{{$data->user_contact_no}}</td>
				<td>
					@if($view)
					<a href="{{$tableName}}/show/{{$data->id}}">
						<button type="button" class="btn btn-success ">
							<span class="glyphicon glyphicon-user"></span>
							View
						</button>
					</a>
					@else
						<a href="{{$tableName}}/edit/{{$data->id}}">
							<button type="button" class="btn btn-success ">
								<span class="glyphicon glyphicon-pencil"></span>
								Edit
							</button>
						</a>
					@endif
					</td>
					<td>
					@if($data->deleted_at)
						<a href="{{$tableName}}/enable/{{$data->id}}">
							<button type="button" class="btn btn-info " input type="submit" value="Button">
								<span class="glyphicon glyphicon-open"></span> 
								Enable
							</button>
						</a>
					@else
						<a href="{{$tableName}}/disable/{{$data->id}}">
							<button type="button" class="btn btn-warning ">
								<span class="glyphicon glyphicon-remove"></span> 
								Disable
							</button>
						</a>
					</td>
					@endif
					<td>
					<!-- Remove modal -->
					<button class="btn btn-danger" data-toggle="modal" data-target="#removeModal{{$data->id}}">
						<span class="glyphicon glyphicon-trash"></span>
						Remove
					</button>
					<div id="removeModal{{$data->id}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h4 class="modal-title">
										Remove permanently
									</h4>
								</div>
								<div class="modal-body">
									<p class="message">Do you want to remove the particular entry?</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<a href="{{$tableName}}/delete/{{$data->id}}">
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
