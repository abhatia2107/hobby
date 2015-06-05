@foreach($category as $data)
    <p>{{ $data->category }}<br></p>
    @endforeach
    @foreach($categoryDetails as $data)
    <p>{{ $data->subcategory }}<br></p>
@endforeach
