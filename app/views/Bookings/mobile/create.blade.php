@extends('Layouts.mobile.layout')
@section('content')
<style type="text/css">
label {
    width:180px;
    clear:left;
    text-align:right;
    padding-right:10px;
}
</style>
    <div class="alert alert-info fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="fa fa-check-circle fa-fw fa-lg"></i>
        {{$success}}
        {{$posted['order_id']}}
    </div>
    <form action="/bookings" id="paymentsCreate" method="post" role="form" enctype="multipart/form-data">
        <input type="hidden" name="merchant_id" value="{{$posted['merchant_id']}}">
        <input type="hidden" name="order_id" value="{{$posted['order_id']}}">
        <input type="hidden" name="currency" value="{{$posted['currency']}}">
        <input type="hidden" name="amount" value="{{$posted['amount']}}">
        <input type="hidden" name="redirect_url" value="{{$posted['redirect_url']}}">
        <input type="hidden" name="cancel_url" value="{{$posted['cancel_url']}}">
        <input type="hidden" name="integration_type" value="{{$posted['integration_type']}}">
        <input type="hidden" name="language" value="{{$posted['language']}}">
        <input type="hidden" name="action" value="{{$posted['action']}}">
        <div class="row">
            <div class="form-group required">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <button type="Submit"class="btn-success" >Looks Good</button>
                </div>
            </div>
        </div>
    </form>
@stop
