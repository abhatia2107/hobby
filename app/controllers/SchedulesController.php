<?php

class SchedulesController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 * GET /schedules/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$weekdays=$this->weekdays;
		$trial=$this->trial;
		$schedule_session_month=$this->schedule_session_month;
		return View::make($this->device.'.schedule',compact('schedule_session_month','trial','weekdays'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /schedules
	 *
	 * @return Response
	 */
	public function store($schedule_arr, $batch_id)
	{
		// var_dump($batch_id);
		// dd($schedule_arr);
		foreach ($schedule_arr as $i => $schedule) {
			$credentials=$schedule;
			// dd($schedule);
			$credentials['schedule_no_of_classes_in_week']=0;
			foreach($this->weekdays as $data){
				$credentials['schedule_class_on_'.$data]=0;
			}
			$errors=new Validator;
			$validator = Validator::make($credentials, Schedule::$rules);
			if($validator->fails())
			{
				$errors=$validator->messages();
			}
			if(!empty($credentials['schedule_class'])){
				foreach($credentials['schedule_class'] as $data){
					$credentials['schedule_no_of_classes_in_week']++;
					$credentials['schedule_class_on_'.$data]=1;
		    	}
			}
			else{
				$errors->class=Lang::get('batch.batch_class_empty');
			}
			if(!empty((array)$errors))
				return $errors;
			$credentials['schedule_batch_id']=$batch_id;
			unset($credentials["schedule_class"]);
			// dd($credentials);
			Schedule::create($credentials);
		}
	}

	/**
	 * Display the specified resource.
	 * GET /schedules/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /schedules/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($batch_id)
	{
		$scheduleForBatch=$this->schedule->getScheduleForBatch($batch_id);
		foreach ($scheduleForBatch as $key => $value) {
			$schedule_class=array();
			foreach($this->weekdays as $data){
				if($value['schedule_class_on_'.$data]){
					array_push($schedule_class,$data);
				}
				unset($scheduleForBatch[$key]['schedule_class_on_'.$data]);
			}
			$scheduleForBatch[$key]['schedule_class']=$schedule_class;
		}
		return $scheduleForBatch;
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /schedules/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($schedule_arr, $batch_id)
	{
		foreach ($schedule_arr as $i => $schedule) {			
			$credentials=$schedule;
			foreach($this->weekdays as $data){
				$credentials['schedule_class_on_'.$data]=0;
			}
			$errors=new Validator;
			$validator = Validator::make($credentials, Schedule::$rules);
			if($validator->fails())
			{
				$errors=$validator->messages();
			}
			if(!empty($credentials['schedule_class'])){
				foreach($credentials['schedule_class'] as $data){
					$credentials['schedule_class_on_'.$data]=1;
		    	}
			}
			else{
				$errors->class=Lang::get('batch.batch_class_empty');
			}
			if(!empty((array)$errors))
				return $errors;
			$credentials['schedule_batch_id']=$batch_id;
			unset($credentials["schedule_class"]);
			$this->schedule->updateSchedule($credentials);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /schedules/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($batch_id)
	{
		$schedule=Schedule::withTrashed()->where($schedule_batch_id,'=',$batch_id);
		if($schedule){
			$schedule->forceDelete();
		}
	}

}