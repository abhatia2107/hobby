@extends("Layouts.mobile.Admin.layout")
@section("content")

	<nav>
		<ul class="nav-ul">
			<li class="nav-li" id="login">
				<!-- TO DO: Input box going out of bound. Check this. -->
				<a class="login-trigger">
					<button type="button" class="btn btn-success ">
						Add a Category <span>▼</span>
					</button>
				</a>
				<div id="login-content">
					<form action="/categories/store" enctype="multipart/form-data" method="post">						
						<fieldset id="inputs">
						<input id="username" type="text" name="category" placeholder="Category Name" required>  
						</fieldset>
						<fieldset id="actions">
							<button type="submit" id="submit" class="btn btn-success" >SUBMIT</button>
							<button type="button" id="cancel1" class="btn btn-warning">CANCEL</button>
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
				<th>Category Name</th>
				<th>Number of Subcategories</th>
				<th></th>
		   	</tr>
		</thead>
		<tbody>
		  	<?php
	        	$i=0; 
	        	$view=0;
	        ?>
	        @foreach($categories as $data)
		    <tr>
		        <td>{{++$i}}</td>
		        <td>{{$data->category}}</td>
		        <td>{{$data->category_no_of_subcategories}}</td>
		   		<td>
					@if($view)
					<a href="{{$tableName}}/show/{{$data->id}}">
						<button type="button" class="btn btn-success ">
							<span class="glyphicon glyphicon-user"></span>
							View
						</button>
					</a>
					@else
						<a  class="edit-trigger">
							<button type="button" class="btn btn-success ">
								<span class="glyphicon glyphicon-pencil"></span>
								Edit
							</button>
						</a>
						<div class="edit-content">
							<form  action="{{$tableName}}/update/{{$data->id}}" enctype="multipart/form-data" method="post">
								<fieldset id="inputs">
									<div class="form-group required">
										<input type="text" name="category" placeholder="Category Name"  required>
									</div>
								</fieldset>
								<fieldset id="actions">
									<input type="submit" class="btn btn-success"id="submit" value="Submit">
									<input type="button" class="btn btn-danger cancel2" id="cancel" value="Cancel">
								</fieldset>
							</form>
						</div>
					@endif
					</td>
					<td>
					@if(isset($data->deleted_at))
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