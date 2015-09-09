@extends("Layouts.Admin.layout")
@section("content")
	<table class="table">
	    <thead>
	       <tr>
	          <th>S.No.</th>
	          <th>Batch</th>
	          <th>Batch ID</th>
	          <th>Bookings</th>
	          <th>Hobbyix Price</th>
	          <th>Payment</th>
	          <th>Created on</th>
	       </tr>
	    </thead>
	    <tbody>
	        <?php
	        	$i=0; 
	        	$view=1;
	        ?>
	        @foreach($accounts as $data)
	        <tr>
	            <td>{{++$i}}</td>
	            <td>{{$data->batch}}</td>
	            <td>{{$data->batch_id}}</td>
	            <td>{{$data->bookings}}</td>
	            <td>{{$data->hobbyix_price}}</td>
	            <td>{{$data->payment}}</td>
	            <td>{{$data->created_at}}</td>
			</tr>
	       @endforeach
	    </tbody>
	 </table>
@stop
