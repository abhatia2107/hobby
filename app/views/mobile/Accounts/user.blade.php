<table class="table">
	    <thead>
	       <tr>
	       	<th>Activity</th>
	        @foreach($account as $key => $value)
	          <th>{{$key}}</th>
	        @endforeach
	       </tr>
	    </thead>
		<tbody>
	        @foreach($account as $key => $value)
	        	@foreach($value as $key2 => $value2)
	        		<td>{{$key2}}</td>
	          		<tr>
	        			<td>{{$value2}}</td>
	        		</tr>
		        @endforeach
	        @endforeach
	    </tbody>
	 </table>