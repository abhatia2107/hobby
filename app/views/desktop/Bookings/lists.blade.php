@extends("Layouts.Admin.layout")
@section("content")
	<table class="table">
	    <thead>
	       <tr>
	          <th>S.No.</th>
	          <th>Name</th>
	          <th>Contact No</th>
	          <th>Batch</th>
	          <th>Credits Used</th>
	          <th>Payment</th>
	          <th>Booking Date</th>
	          <th>Created on</th>
	          <th>Trial/Paid</th>
	       </tr>
	    </thead>
	    <tbody>
	        <?php
	        	$i=0; 
	        	$view=1;
	        ?>
	        @foreach($bookings as $data)
	        <tr>
	            <td>{{++$i}}</td>
	            <td>{{$data->name}}</td>
	            <td>{{$data->contact_no}}</td>
	            <td>{{$data->batch}}</td>
	            <td>{{$data->credit_used}}</td>
	            <td>{{$data->payment}}</td>
	            <td>{{$data->booking_date}}</td>
	            <td>{{$data->created_at}}</td>
	            <td>
	            	@if($data->trial)
	            		{{Trial}}
	            	@else
	            		{{Paid}}
	            	@endif
	            	</td>
			</tr>
	       @endforeach
	    </tbody>
	 </table>
@stop
