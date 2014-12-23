<div class="alert alert-block alert-danger fade in">
        <h4><i class="fa fa-times-circle fa-fw fa-lg"></i></h4>
        @foreach($institutes->all() as $institute)
            <p>{{ $institute }}<br></p>
        @endforeach
    </div>