@extends('Layouts.desktop.layout')
@section('content')

    {{ Form::model($promo=new Promo, ['url'=>'promos', 'enctype'=>'multipart/form-data']) }}
        @include('Promos.desktop._form', ['submitButtonText'=>'Add Promo Code'])
    {{ Form::close() }}
@stop