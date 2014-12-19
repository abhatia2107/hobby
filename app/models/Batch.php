<?php

class Batch extends \Eloquent {
	protected $table = 'Batches';
	protected $primaryKey = 'batch_id';

	protected $fillable = [
        	'batch',
                'batch_category_id',
                'batch_subcategory_id',
                'batch_accomplishment',
                'batch_institute_id',
                'batch_start_date',
                'batch_end_date',
                'batch_start_time',
                'batch_end_time',
                'batch_venue_id',
                'batch_difficulty_level',
                'batch_age_group',
                'batch_gender_group',
                'batch_price',
                'batch_recurring',
                'batch_approved',
                'batch_no_of_classes_in_week',
                'batch_class_on_monday',
                'batch_class_on_tuesday',
                'batch_class_on_wednesday',
                'batch_class_on_thursday',
                'batch_class_on_friday',
                'batch_class_on_saturday',
                'batch_class_on_sunday',
                'batch_trial',
                'batch_comment',
                'batch_tagline',
	];

	public static $rules = [
        	'batch'=>'required',
                'batch_category_id'=>'required',
                'batch_subcategory_id'=>'required',
                'batch_institute_id'=>'required',
                'batch_start_date'=>'required',
                'batch_end_date'=>'required',
                'batch_start_time'=>'required',
                'batch_end_time'=>'required',
                'batch_venue_id'=>'required',
                'batch_difficulty_level'=>'required',
                'batch_age_group'=>'required',
                'batch_gender_group'=>'required',
                'batch_recurring'=>'required|boolean',
                'batch_approved'=>'boolean',
                'batch_no_of_classes_in_week'=>'required',
                'batch_class_on_monday'=>'required',
                'batch_class_on_tuesday'=>'required',
                'batch_class_on_wednesday'=>'required',
                'batch_class_on_thursday'=>'required',
                'batch_class_on_friday'=>'required',
                'batch_class_on_saturday'=>'required',
                'batch_class_on_sunday'=>'required',
                'batch_trial'=>'required',
                'batch_comment'=>'alpha_num',
                'batch_tagline'=>'alpha_num',
	];
}