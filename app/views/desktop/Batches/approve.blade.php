@extends("Layouts.Admin.layout")
@section("content")
	<table class="table">
	    <thead>
	       <tr>
	          <th>S.No.</th>
	          <th>Batch Name</th>
	          <th>Institute Name</th>
	          <th>Action</th>
	       </tr>
	    </thead>
	    <tbody>
	        <?php
	        	$i=0; 
	        ?>
	        @foreach($batches as $data)
	        <tr>
	            <td>{{++$i}}</td>
	            <td>{{$data->batch}}</td>
	            <td>{{$data->institute}}</td>
				<td>
					<a href="/batch/{{$data->id}}">
						<button type="button" class="btn btn-primary ">
							<span class="glyphicon glyphicon-user"></span>
							View
						</button>
					</a>
				</td>
				<td>
					<a href="/features/store/{{$data->id}}">
						<button type="button" class="btn">
							<span class="glyphicon glyphicon-star"></span>
							Feature It
						</button>
					</a>
				</td>
				<td>
					<a href="/batches/approve/{{$data->id}}">
						<button type="button" class="btn btn-success ">
							<span class="glyphicon glyphicon-pencil"></span>
							Approve
						</button>
					</a>
				</td>
				<td>
					@if($data->deleted_at)
						<a href="/batches/enable/{{$data->id}}">
							<button type="button" class="btn btn-info " input type="submit" value="Button">
								<span class="glyphicon glyphicon-open"></span> 
								Enable
							</button>
						</a>
					@else
						<a href="/batches/disable/{{$data->id}}">
							<button type="button" class="btn btn-warning ">
								<span class="glyphicon glyphicon-remove"></span> 
								Disable
							</button>
						</a>
					@endif
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
									<a href="/batches/delete/{{$data->id}}">
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
