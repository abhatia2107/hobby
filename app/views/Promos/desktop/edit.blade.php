@extends('Layouts.desktop.layout')
@section('content')

    {{ Form::model($promo,['method'=>"PATCH", 'url'=>'promos/'.$promo->id, 'enctype'=>'multipart/form-data']) }}
        @include('Promos.desktop._form', ['submitButtonText'=>'Update  Promo Code'])
    {{ Form::close() }}
@stop