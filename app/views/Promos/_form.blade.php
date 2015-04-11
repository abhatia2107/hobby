<div class="form-group">
    {{Form::label('promo_code', 'Promo Code')}}
    {{ Form::text('promo_code', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{Form::label('discount_percentage', 'Discount Percentage')}}
    {{ Form::text('discount_percentage', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{Form::label('cash_discount', 'Cash Discount')}}
    {{ Form::text('cash_discount', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{Form::label('max_discount', 'Max Discount')}}
    {{ Form::text('max_discount', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{Form::label('max_allowed_count', 'Max allowed usage')}}
    {{Form::text('max_allowed_count', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::label('valid_till', 'Valid Till')}}
    {{Form::input('date', 'valid_till', $promo->valid_till, ['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control'])}}
</div>