<?php

class Batch extends \Eloquent {

    protected $guarded = [
        'id',
        'batch_class',
        'batch_photo',
        'batch_approved',
        'created_at',
        'updated_at',
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
        'batch_recurring'=>'required',
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
    ];

   public function updateBatch($credentials,$id)
    {
        $updated=DB::table('batches')->where('id','=',$id)->update($credentials);
        /*$updated=true;*/
        return ($updated);
    } 
    public function batches_list($id)
    {
        return DB::table('batches')->where('id','=',$id)->pluck('category');
    }

    public function getBatchForInstitute($batch_institute_id)
    {
        return DB::table('batches')->whereIn('batch_institute_id',$batch_institute_id)->get();
    }
    
    public function getBatchForCategory($batch_category_id)
    {
        return DB::table('batches')->where('batches.batch_category_id','=',$batch_category_id)->Join('institutes','institutes.id','=','batches.batch_institute_id')->Join('categories','categories.id','=','batches.batch_category_id')->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')->Join('locations', 'locations.id', '=', 'localities.locality_location_id')->select('*','batches.id as batch_id')->orderBy('batch_institute_id')->get();
    }
    public function getBatch($id)
    {
        return DB::table('batches')->where('batches.id','=',$id)->Join('institutes','institutes.id','=','batches.batch_institute_id')->Join('comments', 'institutes.id', '=', 'comments.comment_institute_id')->Join('categories','categories.id','=','batches.batch_category_id')->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')->Join('locations', 'locations.id', '=', 'localities.locality_location_id')->select('*','batches.id as batch_id')->get();
    }
       
}
