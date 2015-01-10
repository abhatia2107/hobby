<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Batch extends \Eloquent {

    use SoftDeletingTrait;

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
        'batch_price'=>'numeric'
    ];

    public function updateBatch($credentials,$id)
    {
        $updated=Batch::where('id','=',$id)->update($credentials);
        /*$updated=true;*/
        return ($updated);
    } 
    public function batches_list($id)
    {
        return Batch::where('id','=',$id)->pluck('category');
    }

   public function getBatchForInstitute($batch_institute_id)
    {
    return Batch::where('batch_institute_id',$batch_institute_id)
    ->Join('institutes','institutes.id','=','batches.batch_institute_id')
    ->Join('categories','categories.id','=','batches.batch_category_id')
    ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
    ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
    ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
    ->Join('locations', 'locations.id', '=', 'venues.venue_location_id')
    ->select('*','batches.id as id','batches.deleted_at as deleted_at','batches.created_at as created_at','batches.updated_at as updated_at')
    ->get();
    }
    
    public function getBatchForCategoryLocation($category_id,$location_id,$chunk)
    {
        //See join->on in detail from /docs/queries and improve this query.
        $allBatches=Batch::
                        Join('institutes','institutes.id','=','batches.batch_institute_id')
                        ->Join('categories','categories.id','=','batches.batch_category_id')
                        ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
                        ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
                        ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
                        ->Join('locations', 'locations.id', '=', 'venues.venue_location_id')
                        ->select('*','batches.id as id','batches.deleted_at as deleted_at','batches.created_at as created_at','batches.updated_at as updated_at');
        if(!$category_id&&!$location_id)
            return $allBatches
                ->skip($chunk)
                ->take(100)
                ->orderBy('institute_rating')
                ->get();

        else if(!$location_id)
            return $allBatches
                ->where('batches.batch_category_id','=',$category_id)
                ->skip($chunk)
                ->take(100)
                ->orderBy('institute_rating')
                ->get();

        else if(!$category_id)
            return $allBatches
                ->where('venues.venue_location_id','=',$location_id)
                ->skip($chunk)
                ->take(100)
                ->orderBy('institute_rating')
                ->get();

        else
            return $allBatches
                ->where('batches.batch_category_id','=',$category_id)
                ->where('venues.venue_location_id','=',$location_id)
                ->skip($chunk)
                ->take(100)
                ->orderBy('institute_rating')
                ->get();
    }

    public function getBatchForFilter($subcategories,$localities,$trials,$chunk)
    {
        $allBatches=Batch::
                        whereIn('batches.batch_trial',$trials)
                        ->whereIn('batches.batch_subcategory_id',$subcategories)
                        ->Join('institutes','institutes.id','=','batches.batch_institute_id')
                        ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
                        ->whereIn('venues.venue_locality_id',$localities)
                        ->Join('categories','categories.id','=','batches.batch_category_id')
                        ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
                        ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
                        ->Join('locations', 'locations.id', '=', 'venues.venue_location_id')
                        ->skip($chunk)
                        ->take(100)
                        ->orderBy('institute_rating')
                        ->select('*','batches.id as id','batches.deleted_at as deleted_at','batches.created_at as created_at','batches.updated_at as updated_at')
                        ->get();
        return $allBatches;
    }

    public function getBatch($id)
    {
        //For incrementing batch view when someone open, show page.
        Batch::
        where('batches.id','=',$id)
        ->increment('batch_view');

        return Batch::
            where('batches.id','=',$id)
            ->Join('institutes','institutes.id','=','batches.batch_institute_id')
            ->Join('categories','categories.id','=','batches.batch_category_id')
            ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
            ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
            ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
            ->Join('locations', 'locations.id', '=', 'localities.locality_location_id')
            ->select('*','batches.id as id','batches.deleted_at as deleted_at','batches.created_at as created_at','batches.updated_at as updated_at')
            ->get();
    }
 
    public function getBatchActive()
    {
        return Batch::
                where('batch_approved','=','1')
                ->count(); 
    }

    public function getBatchDisabled()
    {
        return Batch::
                onlyTrashed()
                ->count();
    }

    public function getPendingApprovals()
    {
        return Batch::
            where('batch_approved','=','0')
            ->count();
    } 

    public function getPendingApprovalsOneDay($date)
    {
        return Batch::
            where('batch_approved','=','0')
            ->where('created_at','>',$date)
            ->count();
    }

    public function getPendingBatches()
    {
        return Batch::
            where('batch_approved','=','0')
            ->Join('institutes','institutes.id','=','batches.batch_institute_id')
            ->select('*','batches.id as id','batches.deleted_at as deleted_at','batches.created_at as created_at','batches.updated_at as updated_at')
            ->get();
    }    

    public function approveBatch($id)
    {
        $updated=Batch::where('id','=',$id)
        ->update(array('batch_approved'=>1));
        return $updated;
    }  

    public function getBatchOneDay($date)
    {
        return Batch::where('created_at','>',$date)->count();
    }
/*
    public function search($keyword,$chunk)
    {
        $allBatches=Batch::chunk(200, function($batches)
                    {
                        $batchChunk=$batches[0];
                        // foreach ($batches as $batchChunk) {
                            $batchChunk->
                            where('batch','LIKE','%'.$this->keyword.'%')
                        ->Join('institutes',function($join){
                            $join->on('institutes.id','=','batches.batch_institute_id')
                            ->orWhere('institute','LIKE','%'.$this->keyword.'%');
                        })
                        ->Join('venues',function($join){
                            $join->on('venues.id', '=', 'batches.batch_venue_id')
                            ->orWhere('venue','LIKE','%'.$this->keyword.'%');
                        })
                        ->Join('categories',function($join){
                            $join->on('categories.id','=','batches.batch_category_id')
                            ->orWhere('category','LIKE','%'.$this->keyword.'%');
                        })
                        ->Join('subcategories',function($join){
                            $join->on('subcategories.id','=','batches.batch_subcategory_id')
                            ->orWhere('subcategory','LIKE','%'.$this->keyword.'%');
                        })
                        ->Join('localities',function($join){
                            $join->on('localities.id', '=', 'venues.venue_locality_id')
                            ->orWhere('locality','LIKE','%'.$this->keyword.'%');
                        })
                        ->Join('locations',function($join){
                            $join->on('locations.id', '=', 'venues.venue_location_id')
                            ->orWhere('location','LIKE','%'.$this->keyword.'%');
                        })
                        ->skip($this->chunk)
                        ->take(100)
                        ->orderBy('institute_rating')
                        ->select('*','batches.id as id','batches.deleted_at as deleted_at','batches.created_at as created_at','batches.updated_at as updated_at')
                        ->get();
                        // }
                    });
                        where('batch','LIKE','%'.$keyword.'%')
                        ->Join('institutes',function($join){
                            $join->on('institutes.id','=','batches.batch_institute_id')
                            ->orWhere('institute','LIKE','%'.$this->keyword.'%');
                        })
                        // ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
                        ->Join('venues',function($join){
                            $join->on('venues.id', '=', 'batches.batch_venue_id')
                            ->orWhere('venue','LIKE','%'.$this->keyword.'%');
                        })
                        // ->Join('categories','categories.id','=','batches.batch_category_id')
                        ->Join('categories',function($join){
                            $join->on('categories.id','=','batches.batch_category_id')
                            ->orWhere('category','LIKE','%'.$this->keyword.'%');
                        })
                        // ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
                        ->Join('subcategories',function($join){
                            $join->on('subcategories.id','=','batches.batch_subcategory_id')
                            ->orWhere('subcategory','LIKE','%'.$this->keyword.'%');
                        })
                        // ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
                        ->Join('localities',function($join){
                            $join->on('localities.id', '=', 'venues.venue_locality_id')
                            ->orWhere('locality','LIKE','%'.$this->keyword.'%');
                        })
                        // ->Join('locations', 'locations.id', '=', 'venues.venue_location_id')
                        ->Join('locations',function($join){
                            $join->on('locations.id', '=', 'venues.venue_location_id')
                            ->orWhere('location','LIKE','%'.$this->keyword.'%');
                        })
                        ->skip($chunk)
                        ->take(100)
                        ->orderBy('institute_rating')
                        ->select('*','batches.id as id','batches.deleted_at as deleted_at','batches.created_at as created_at','batches.updated_at as updated_at')
                        ->get();
        dd ($allBatches);
    }
*/
}