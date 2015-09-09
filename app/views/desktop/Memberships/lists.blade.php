@extends("Layouts.Admin.layout")
@section("content")
	<table class="table">
	    <thead>
	       <tr>
	          <th>S.No.</th>
	          <th>Name</th>
	          <th>Email ID</th>
	          <th>Contact No</th>
	          <th>Credits Given</th>
	          <th>Credits Left</th>
	          <th>Expiry</th>
	          <th>Payment</th>
	          <th>User ID</th>
	       </tr>
	    </thead>
	    <tbody>
	        <?php
	        	$i=0; 
	        	$view=1;
	        ?>
	        @foreach($memberships as $data)
	        <tr>
	            <td>{{++$i}}</td>
	            <td>{{$data->user_name}}</td>
	            <td>{{$data->email}}</td>
	            <td>{{$data->user_contact_no}}</td>
	            <td>{{$data->credits}}</td>
	            <td>{{$data->user_credits_left}}</td>
	            <td>{{$data->user_credits_expiry}}</td>
	            <td>{{$data->payment}}</td>
	            <td>{{$data->user_id}}</td>
			</tr>
	       @endforeach
	    </tbody>
	 </table>
@stop
