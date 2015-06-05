@extends('Layouts.layout')
@section('content')

    {{ Form::model($promo,['method'=>"PATCH", 'url'=>'promos/'.$promo->id, 'enctype'=>'multipart/form-data']) }}
        @include('Promos._form', ['submitButtonText'=>'Update  Promo Code'])
    {{ Form::close() }}
@stop