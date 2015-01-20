<?php

class Price extends \Eloquent {
	protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public static $rules = [
        'price'=>'numeric|required',
        'price_no_of_classes'=>'required',
        'price_class_on_monday'=>'required',
        'price_class_on_tuesday'=>'required',
        'price_class_on_wednesday'=>'required',
        'price_class_on_thursday'=>'required',
        'price_class_on_friday'=>'required',
        'price_class_on_saturday'=>'required',
        'price_class_on_sunday'=>'required',
        'price_trial'=>'required',
    ];
}
