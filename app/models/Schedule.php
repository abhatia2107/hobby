<?php

class Schedule extends \Eloquent {
	protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public static $rules = [
        'schedule_price'=>'numeric|required',
        'schedule_session_month'=>'required',
        'schedule_number'=>'required'   ,
        'schedule_class_on_monday'=>'required',
        'schedule_class_on_tuesday'=>'required',
        'schedule_class_on_wednesday'=>'required',
        'schedule_class_on_thursday'=>'required',
        'schedule_class_on_friday'=>'required',
        'schedule_class_on_saturday'=>'required',
        'schedule_class_on_sunday'=>'required',
    ];

    public function getScheduleForBatch($batch_id)
    {
        $scheduleForBatch= Schedule::where('schedule_batch_id',$batch_id)
        ->get()
        ->toArray();
        return $scheduleForBatch;
    }
    public function updateSchedule($credentials)
    {
        $id=$credentials['id'];
        $updated=Schedule::where('id','=',$id)->update($credentials);
        /*$updated=true;*/
        return ($updated);
    }
}

