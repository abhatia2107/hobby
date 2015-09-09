@extends("Layouts.Admin.layout")
@section("content")
	<table class="table">
	    <thead>
	       <tr>
	          <th>S.No.</th>
	          <th>Name</th>
	          <th>Email ID</th>
	          <th>Contact No</th>
	          <th>Credits</th>
	          <th>Expiry</th>
	          <th>Wallet</th>
	          <th>Action</th>
	       </tr>
	    </thead>
	    <tbody>
	        <?php
	        	$i=0; 
	        	$view=1;
	        ?>
	        @foreach($users as $data)
	        <tr>
	            <td>{{++$i}}</td>
	            <td>{{$data->user_name}}</td>
	            <td>{{$data->email}}</td>
	            <td>{{$data->user_contact_no}}</td>
	            <td>{{$data->user_credits_left}}</td>
	            <td>{{$data->user_credits_expiry}}</td>
	            <td>{{$data->user_wallet}}</td>
				<td>
					@if($data->user_subscription_token)
						<a href="{{$tableName}}/unsubscribe/{{$data->id}}">
							<button type="button" class="btn btn-info ">
								<span class="glyphicon glyphicon-remove"></span>
								Unsubscribe
							</button>
						</a>
					@else
						<a href="{{$tableName}}/subscribe/{{$data->id}}">
							<button id="subscribe-button" type="button" class="btn btn-success ">
								<span class="glyphicon glyphicon-open"></span>
								Subscribe
							</button>
						</a>
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
					@endif
				</td>
			</tr>
	       @endforeach
	    </tbody>
	 </table>
@stop
