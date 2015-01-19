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

    public static $rulesMessage = [
        'msgInputName' => 'required',
        'msgInputEmail'=>'required|email',
        'msgInputNumber'=>'required|regex:/[0-9]{10,11}/',
        'msgInputMessage'=>'required',
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
                ->orderBy('institute_rating','desc')
                ->get();

        else if(!$location_id)
            return $allBatches
                ->where('batches.batch_category_id','=',$category_id)
                ->skip($chunk)
                ->take(100)
                ->orderBy('institute_rating','desc')
                ->get();

        else if(!$category_id)
            return $allBatches
                ->where('venues.venue_location_id','=',$location_id)
                ->skip($chunk)
                ->take(100)
                ->orderBy('institute_rating','desc')
                ->get();

        else
            return $allBatches
                ->where('batches.batch_category_id','=',$category_id)
                ->where('venues.venue_location_id','=',$location_id)
                ->skip($chunk)
                ->take(100)
                ->orderBy('institute_rating','desc')
                ->get();
    }

    public function getBatchForFilter($subcategories,$localities,$trials,$chunk)
    {
        $allBatches=Batch::
                        Join('institutes','institutes.id','=','batches.batch_institute_id')
                        ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
                        ->Join('categories','categories.id','=','batches.batch_category_id')
                        ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
                        ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
                        ->Join('locations', 'locations.id', '=', 'venues.venue_location_id')
                        ->whereIn('venues.venue_locality_id',$localities)
                        ->whereIn('batches.batch_trial',$trials)
                        ->whereIn('batches.batch_subcategory_id',$subcategories)
                        ->skip($chunk)
                        ->take(100)
                        ->orderBy('institute_rating','desc')
                        ->select('*','batches.id as id','batches.deleted_at as deleted_at','batches.created_at as created_at','batches.updated_at as updated_at')
                        ->get();
        return $allBatches;
    }

    public function search($keyword,$category_id,$location_id,$chunk)
    {
        $allBatches=Batch::
            Join('institutes','institutes.id','=','batches.batch_institute_id')
            ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
            ->Join('categories','categories.id','=','batches.batch_category_id')
            ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
            ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
            ->Join('locations', 'locations.id', '=', 'venues.venue_location_id');
        if($category_id)
        {
            $allBatches=$allBatches
            ->where('batch_category_id','=',$category_id);
        }
        if($location_id)
        {
            $allBatches=$allBatches->where('venue_location_id','=',$location_id);
        }

        $allBatches
        ->where(function($query) use ($keyword)
        {
            $query
            ->where('batch','LIKE','%'.$keyword.'%')
            ->orWhere('institute','LIKE','%'.$keyword.'%')
            ->orWhere('locality','LIKE','%'.$keyword.'%')
            ->orWhere('location','LIKE','%'.$keyword.'%')
            ->orWhere('category','LIKE','%'.$keyword.'%')
            ->orWhere('subcategory','LIKE','%'.$keyword.'%');
        });
            $allBatches=$allBatches
                    ->orderBy('institute_rating','desc')
                    ->skip($chunk)
                    ->take(100)
                    ->select('*','batches.id as id','batches.deleted_at as deleted_at','batches.created_at as created_at','batches.updated_at as updated_at')
                    ->get();
       return ($allBatches);
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

    public function getBatchesForInstitute($batch_institute_id)
    {
        return Batch::where('batch_institute_id',$batch_institute_id)
                        ->Join('institutes','institutes.id','=','batches.batch_institute_id')
                        ->Join('categories','categories.id','=','batches.batch_category_id')
                        ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
                        ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
                        ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
                        ->Join('locations', 'locations.id', '=', 'venues.venue_location_id')
                        ->select('*','batches.id as id','batches.deleted_at as deleted_at','batches.created_at as created_at','batches.updated_at as updated_at')
                        ->orderBy('batches.created_at','desc')
                        ->get();
    }

    public function getBatchesForUser($batch_user_id)
    {
        $batches= Batch::where('batch_user_id','=',$batch_user_id)
                        ->Join('institutes','institutes.id','=','batches.batch_institute_id')
                        ->Join('categories','categories.id','=','batches.batch_category_id')
                        ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
                        ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
                        ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
                        ->Join('locations', 'locations.id', '=', 'venues.venue_location_id')
                        ->select('*','batches.id as id','batches.deleted_at as deleted_at','batches.created_at as created_at','batches.updated_at as updated_at')
                        ->orderBy('batches.created_at','desc')
                        ->get();
        return $batches;
    }
    
    public static function getInstituteForBatch($id)
    {
        $batch = Batch::withTrashed()->find($id);
        if($batch)
        {
            if(is_null($batch->deleted_at))
               return $batch->batch_institute_id;
            else
                return null;
        }
        else
            return false;
    }

    public static function getUserforBatch($id)
    {
        $batch= Batch::withTrashed()->find($id);
        if($batch){
            if(is_null($batch->deleted_at))
                return $batch->batch_user_id;
            else
                return null;
        }
        else
            return false;
    }


}
