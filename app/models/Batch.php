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
    protected $pageSize=20;
/*
    public static $rules = [
        'batch'=>'required',
        'batch_category_id'=>'required',
        'batch_subcategory_id'=>'required',
        'batch_difficulty_level'=>'required',
        'batch_age_group'=>'required',
        'batch_gender_group'=>'required',
        'batch_venue_id'=>'required',
        'batch_approved'=>'boolean',
        'batch_trial'=>'required',
        'batch_single_price'=>'numeric',

    ];*/

    public static $rulesMessage = [
        'msgInputName' => 'required',
        'msgInputEmail'=>'required|email',
        'msgInputNumber'=>'required|regex:/[0-9]{10,11}/',
        'msgInputMessage'=>'required',
    ];

    public function schedules()
    {
        return $this->hasMany('Schedule','schedule_batch_id');
    }

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

    public function getBatchForCategoryLocation($category_id,$location_id)
    {
        //See join->on in detail from /docs/queries and improve this query.
        $allBatches=Batch::
                        Join('institutes','institutes.id','=','batches.batch_institute_id')
                        ->Join('categories','categories.id','=','batches.batch_category_id')
                        ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
                        ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
                        ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
                        ->Join('locations', 'locations.id', '=', 'venues.venue_location_id')
                        ->select('*','batches.id as id','batches.deleted_at as deleted_at','batches.created_at as created_at','batches.updated_at as updated_at')
                        ->where('batches.batch_approved','=','1');
        
        if(!$category_id&&!$location_id)
            return $allBatches
                ->orderBy('institute_rating','desc')
                ->paginate($this->pageSize);

        else if(!$location_id)
            return $allBatches
                ->where('batches.batch_category_id','=',$category_id)
                ->orderBy('institute_rating','desc')
                ->paginate($this->pageSize);

        else if(!$category_id)
            return $allBatches
                ->where('venues.venue_location_id','=',$location_id)
                ->orderBy('institute_rating','desc')
                ->paginate($this->pageSize);

        else
            return $allBatches
                ->where('batches.batch_category_id','=',$category_id)
                ->where('venues.venue_location_id','=',$location_id)
                ->orderBy('institute_rating','desc')
                ->paginate($this->pageSize);
    }

    public function getBatchForFilter($subcategories,$localities)
    {
        if(!is_numeric($subcategories[0])){
            $subcategories2=Subcategory::whereIn('subcategories.subcategory',$subcategories)->get();
            foreach ($subcategories2 as $key => $subcategory) {
                $subcategories[$key] = $subcategory->id;
            }
        }
        if(!is_numeric($localities[0])){
            $localities2=Locality::whereIn('localities.locality_url',$localities)->get();
            foreach ($localities2 as $key => $locality) {
                $localities[$key] = $locality->id;
            }
        }
        $allBatches=Batch::
                        Join('institutes','institutes.id','=','batches.batch_institute_id')
                        ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
                        ->Join('categories','categories.id','=','batches.batch_category_id')
                        ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
                        ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
                        ->Join('locations', 'locations.id', '=', 'venues.venue_location_id')
                        ->where('batches.batch_approved','=','1')
                        ->whereIn('venues.venue_locality_id',$localities)
                        ->whereIn('batches.batch_subcategory_id',$subcategories)
                        ->orderBy('institute_rating','desc')
                        ->select('*','batches.id as id','batches.deleted_at as deleted_at','batches.created_at as created_at','batches.updated_at as updated_at')
                        ->paginate($this->pageSize);
        return $allBatches;
    }

    public function search($keyword,$category_id,$location_id)
    {
        // $allBatches=Batch::all();
        // dd($allBatches[0]->schedules[0]);
        
        $allBatches=Batch::
            Join('institutes','institutes.id','=','batches.batch_institute_id')
            ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
            ->Join('categories','categories.id','=','batches.batch_category_id')
            ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
            ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
            ->Join('locations', 'locations.id', '=', 'venues.venue_location_id')
            ->where('batches.batch_approved','=','1');
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
        // dd($allBatches->get());
            $allBatches=$allBatches
                    ->orderBy('institute_rating','desc')
                    ->select('*','batches.id as id','batches.deleted_at as deleted_at','batches.created_at as created_at','batches.updated_at as updated_at')
                    ->paginate($this->pageSize);

        // dd($allBatches[0]);

       return ($allBatches);
    }

    public function getBatch($id)
    {
        if (is_numeric($id))
        {
            $column = 'id';
        }
        else
        {
            $column = 'batch'; // This is the name of the column you wish to search
        }
        
        //For incrementing batch view when someone open, show page.
        Batch::
        where('batches.'.$column,'=',$id)
        ->increment('batch_view');

        $batch= Batch:://find($id)
            where('batches.'.$column,'=',$id)
            ->where('batches.batch_approved','=','1')
            ->Join('institutes','institutes.id','=','batches.batch_institute_id')
            ->Join('categories','categories.id','=','batches.batch_category_id')
            ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
            ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
            ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
            ->Join('locations', 'locations.id', '=', 'localities.locality_location_id')
            ->select('*','batches.id as id','batches.deleted_at as deleted_at','batches.created_at as created_at','batches.updated_at as updated_at')
            ->get();
        if(empty($batch->toArray()))
            // App::abort(404);
            return null;
        else
            return $batch[0];
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
                        ->where('batches.batch_approved','=','1')
                        ->Join('institutes','institutes.id','=','batches.batch_institute_id')
                        ->Join('categories','categories.id','=','batches.batch_category_id')
                        ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
                        ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
                        ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
                        ->Join('locations', 'locations.id', '=', 'venues.venue_location_id')
                        ->select('*','batches.id as id','batches.deleted_at as deleted_at','batches.created_at as created_at','batches.updated_at as updated_at')
                        ->orderBy('batches.created_at','desc')
                        ->paginate($this->pageSize);
    }

    public function getBatchesForLocality($batch_locality_id)
    {     
        return Batch::where('venue_locality_id',$batch_locality_id)
                        ->where('batches.batch_approved','=','1')
                        ->Join('institutes','institutes.id','=','batches.batch_institute_id')
                        ->Join('categories','categories.id','=','batches.batch_category_id')
                        ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
                        ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
                        ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
                        ->Join('locations', 'locations.id', '=', 'venues.venue_location_id')
                        ->select('*','batches.id as id','batches.deleted_at as deleted_at','batches.created_at as created_at','batches.updated_at as updated_at')
                        ->orderBy('batches.created_at','desc')
                        ->paginate($this->pageSize);
    }

    public function getBatchesForSubcategory($batch_subcategory_id)
    {
        return Batch::where('batch_subcategory_id',$batch_subcategory_id)
                        ->where('batches.batch_approved','=','1')
                        ->Join('institutes','institutes.id','=','batches.batch_institute_id')
                        ->Join('categories','categories.id','=','batches.batch_category_id')
                        ->Join('subcategories','subcategories.id','=','batches.batch_subcategory_id')
                        ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
                        ->Join('localities', 'localities.id', '=', 'venues.venue_locality_id')
                        ->Join('locations', 'locations.id', '=', 'venues.venue_location_id')
                        ->select('*','batches.id as id','batches.deleted_at as deleted_at','batches.created_at as created_at','batches.updated_at as updated_at')
                        ->orderBy('batches.created_at','desc')
                        ->paginate($this->pageSize);
    }

    public function getInstitutesForSubcategoryInLocality($batch_subcategory_id, $venue_locality_id)
    {
        return Batch::where('batch_subcategory_id',$batch_subcategory_id)
                        ->where('batches.batch_approved','=','1')
                        ->where('venue_locality_id',$venue_locality_id)
                        ->Join('institutes','institutes.id','=','batches.batch_institute_id')
                        ->Join('venues', 'venues.id', '=', 'batches.batch_venue_id')
                        ->select('institutes.id as id','institute','institute_url')
                        ->take(12)
                        ->get();
    }

    public function getBatchesForUser($batch_user_id)
    {
        $batches= Batch::where('batch_user_id','=',$batch_user_id)
                        // ->where('batches.batch_approved','=','1')
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

    public static function isBatchApproved($id)
    {
        if (is_numeric($id))
        {
            $column = 'id';
        }
        else
        {
            $column = 'batch'; // This is the name of the column you wish to search
        }
        $batch=Batch::where('batches.'.$column,'=',$id)->first();
        if($batch->batch_approved)
            return true;
        else
            return false;
    }
}
