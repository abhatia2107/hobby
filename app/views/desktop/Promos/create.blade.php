@extends('Layouts.layout')
@section('content')

    {{ Form::model($promo=new Promo, ['url'=>'promos', 'enctype'=>'multipart/form-data']) }}
        @include('Promos._form', ['submitButtonText'=>'Add Promo Code'])
    {{ Form::close() }}
@stop