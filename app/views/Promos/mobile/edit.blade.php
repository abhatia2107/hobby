@extends('Layouts.mobile.layout')
@section('content')

    {{ Form::model($promo,['method'=>"PATCH", 'url'=>'promos/'.$promo->id, 'enctype'=>'multipart/form-data']) }}
        @include('Promos.mobile._form', ['submitButtonText'=>'Update  Promo Code'])
    {{ Form::close() }}
@stop