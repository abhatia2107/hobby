@extends("Layouts.desktop.Admin.layout")
@section("content")
	<?php use Carbon\Carbon;?>
	<nav>
		<ul class="nav-ul">
			<li class="nav-li" id="login">
				<a href="/promos/create">
					<button type="button" class="btn btn-success ">
						Add a Promo Code
					</button>
				</a>
			</li>
		</ul>
	</nav>

	<table class="table">
		<thead>
		   	<tr>
				<th>S.No.</th>
				<th>Promo Code</th>
				<th>Count</th>
				<th>Max Allowed Count</th>
				<th>Action</th>
		   	</tr>
		</thead>
		<tbody>
		  	<?php
	        	$i=0; 
	        	$view=0;
	        ?>
	        @foreach($promos as $data)
		    <tr>
		        <td>{{++$i}}</td>
		        <td>{{$data->promo_code}}</td>
		        <td>{{$data->count}}</td>
		        <td>{{$data->max_allowed_count}}</td>
		        <td>
                    <a href="{{$tableName}}/{{$data->id}}">
                        <button type="button" class="btn btn-success ">
                            <span class="glyphicon glyphicon-user"></span>
                            View
                        </button>
                    </a>
                </td>
                <td>
                    <a href="/promos/{{$data->id}}/edit">
                        <button type="button" class="btn btn-success ">
                            <span class="glyphicon glyphicon-pencil"></span>
                            Edit
                        </button>
                    </a>
                </td>
                <td>
					@if(isset($data->deleted_at))
						<a href="{{$tableName}}/{{$data->id}}/enable">
							<button type="button" class="btn btn-info " input type="submit" value="Button">
								<span class="glyphicon glyphicon-open"></span> 
								Enable
							</button>
						</a>
					@else
						<a href="{{$tableName}}/{{$data->id}}/disable">
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
                                    {{ Form::open(array('route' => array('promos.destroy', $data->id), 'method' => 'delete')) }}
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    {{ Form::close() }}
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