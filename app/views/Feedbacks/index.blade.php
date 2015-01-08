@extends("Layouts.Admin.layout")
@section("content")
<style type="text/css">
	.read-button{
		min-width: 7em;
	}
</style>
	 <table class="table">
	    <thead>
	       <tr>
	          <th>S.No.</th>
	          <th>Subject</th>
	          <th>Email</th>
	          <th>Action</th>
	       </tr>
	    </thead>
	    <tbody>
	        <?php 
	        	$i=0;
	        ?>
	        @foreach($feedbacks as $data)
	        <tr>
	            <td>{{++$i}}</td>
	            <td>{{$data->feedback_subject}}</td>
	            <td>{{$data->feedback_email}}</td>
	            <td>
					<a href="{{$tableName}}/{{$data->id}}">
						<button type="button" class="btn btn-success ">
							<span class="glyphicon glyphicon-user"></span>
							View
						</button>
					</a>
				</td>
				<td>
					@if($data->feedback_read)
						<a href="{{$tableName}}/unread/{{$data->id}}">
							<button type="button" class="btn btn-info read-button " input type="submit" value="Button">
								<span class="glyphicon glyphicon-open"></span> 
								Unread
							</button>
						</a>
					@else
						<a href="{{$tableName}}/read/{{$data->id}}">
							<button type="button" class="btn btn-warning read-button">
								<span class="glyphicon glyphicon-remove"></span> 
								Read
							</button>
						</a>
					@endif
				</td>
				<td>
					<a href="{{$tableName}}/done/{{$data->id}}">
						<button type="button" class="btn btn-success ">
							<span class="glyphicon glyphicon-user"></span>
							Done
						</button>
					</a>
				</td>
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
