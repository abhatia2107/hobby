@extends("Layouts.Admin.layout")
@section("content")
	<table class="table">
	    <thead>
	       <tr>
	          <th>S.No.</th>
	          <th>Contact No</th>
	          <th>Message</th>
	          <th>Remove</th>
	       </tr>
	    </thead>
	    <tbody>
	        <?php
	        	$i=0; 
	        ?>
	        @foreach($messages as $data)
	        <tr>
	            <td>{{++$i}}</td>
	            <td>{{$data->contact_no}}</td>
	            <td>{{$data->message}}</td>
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
									<a href="/message/delete/{{$data->id}}">
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
