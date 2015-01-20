<?php

class PricesController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 * GET /prices/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$weekdays=$this->weekdays;
		$trial=$this->trial;
		return View::make('price',compact('trial','weekdays'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /prices
	 *
	 * @return Response
	 */
	public function store()
	{
		$price_arr=Input::get('price');
		// dd($price_arr);
		$len=count($price_arr);
		for ($i=1; $i <= $len; $i++) { 
			$credentials=$price_arr[$i];
			// dd($price);
			foreach($this->weekdays as $data){
				$credentials['price_class_on_'.$data]=0;
			}
			$validator = Validator::make($credentials, Price::$rules);
			if($validator->fails())
			{
				$errors=$validator->messages()->toArray();
			}
			// dd($errors);
			if(!empty($credentials['price_class'])){
				foreach($credentials['price_class'] as $data){
					$credentials['price_class_on_'.$data]=1;
		    	}
			}
			else{
				$errors['class'][0]=Lang::get('batch.batch_no_of_class_error');	
			}
			$credentials['price_total_no_of_session']=$credentials['price_no_of_classes'];
			unset($credentials["batch_class"]);
			unset($credentials['price_no_of_classes']);
			Price::create($credentials);
		}
		// $error=$error->toArray();
		// var_dump(json_encode($error));
		// dd($credentials);
		// $errors=array_intersect_key($credentials,$errors);
		// $errors=json_encode($errors);
		// dd($errors);
		// return Redirect::back()->withInput()->with($errors);


	}

	/**
	 * Display the specified resource.
	 * GET /prices/{id}
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
	 * GET /prices/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /prices/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /prices/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}