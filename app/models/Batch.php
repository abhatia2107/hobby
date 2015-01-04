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
        'batch_venue_id'=>'required',
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
    
    public function getBatchForCategoryLocation($category_id,$location_id,$chunk)
    {
        $allBatches=DB::table('batches')
        //                ->whereBetween('batches.id', array($chunk, $chunk+99))
                        ->Join('institutes','institutes.id','=','batches.batch_institute_id')
                        ->Join('categories','categories.id','=','batches.batch_category_id')
                        ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
                        ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
                        ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
                        ->Join('locations', 'locations.id', '=', 'venues.venue_location_id')
                        ->select('*','batches.id as batch_id');
        if(!$category_id&&!$location_id)
            return $allBatches
                ->take(100)
                ->orderBy('institute_rating')
                ->get();

        else if(!$location_id)
            return $allBatches
                ->where('batches.batch_category_id','=',$category_id)
                ->orderBy('institute_rating')
                ->get();

        else if(!$category_id)
            return $allBatches
                ->where('venues.venue_location_id','=',$location_id)
                ->orderBy('institute_rating')
                ->get();

        else
            return $allBatches
                ->where('batches.batch_category_id','=',$category_id)
                ->where('venues.venue_location_id','=',$location_id)
                ->orderBy('institute_rating')
                ->get();
    }
    public function getBatchForFilter($subcategories,$localities,$chunk)
    {

        $allBatches=DB::table('batches')
                        ->whereBetween('batches.id', array($chunk, $chunk+99))
                        ->Join('institutes','institutes.id','=','batches.batch_institute_id')
                        ->Join('categories','categories.id','=','batches.batch_category_id')
                        ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
                        ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
                        ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
                        ->Join('locations', 'locations.id', '=', 'venues.venue_location_id')
                        ->select('*','batches.id as batch_id');
/*        $chunk=0;*/
        if(!$subcategories[0]&&!$localities[0]){
            return $allBatches
                ->orderBy('institute_rating')
                ->get();
        }

        else if(!$localities[0]){
            return $allBatches
                ->whereIn('batches.batch_subcategory_id',$subcategories)
                ->orderBy('institute_rating')
                ->get();
        }

        else if(!$subcategories[0]){
            return $allBatches
                ->whereIn('venues.venue_locality_id',$localities)
                ->orderBy('institute_rating')
                ->get();
        }
        else{
            return $allBatches
                ->whereIn('batches.batch_subcategory_id',$subcategories)
                ->whereIn('venues.venue_locality_id',$localities)
                ->orderBy('institute_rating')
                ->get();
        }
    }

    public function getBatch($id)
    {
        return DB::table('batches')
            ->where('batches.id','=',$id)
            ->Join('institutes','institutes.id','=','batches.batch_institute_id')
            ->Join('categories','categories.id','=','batches.batch_category_id')
            ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
            ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
            ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
            ->Join('locations', 'locations.id', '=', 'localities.locality_location_id')
            ->select('*','batches.id as batch_id')
            ->get();
    }

    public function getRecentBatches($count_recent)
    {
        return DB::table('batches')
            ->orderBy('batches.created_at','desc')
            ->take($count_recent)
            ->Join('institutes','institutes.id','=','batches.batch_institute_id')
            ->Join('categories','categories.id','=','batches.batch_category_id')
            ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
            ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
            ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
            ->Join('locations', 'locations.id', '=', 'localities.locality_location_id')
            ->select('*','batches.id as batch_id')
            ->get();
    }
       
}
