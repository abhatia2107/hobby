<?php

class BookingsController extends \BaseController {

	/**
	 * Display a listing of bookings
	 *
	 * @return Response
	 */
	public function index()
	{
		$bookings = Booking::all();
		return View::make('Bookings.index', compact('bookings'));
	}

	/**
	 * Show the form for creating a new booking
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function create($id)
	{
		$user_id=Auth::id();
		$institute_id=$this->institute->getInstituteforUser($user_id);
		$batchDetails=Batch::find($id);
		// dd($batchDetails);
		return View::make('Bookings.create',compact('batchDetails','institute_id'));
	}

	/**
	 * Store a newly created booking in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Booking::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Booking::create($data);

		return Redirect::route('Bookings.index');
	}

	/**
	 * Display the specified booking.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$booking = Booking::findOrFail($id);

		return View::make('Bookings.show', compact('booking'));
	}

	/**
	 * Show the form for editing the specified booking.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$booking = Booking::find($id);

		return View::make('Bookings.edit', compact('booking'));
	}

	/**
	 * Update the specified booking in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$booking = Booking::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Booking::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$booking->update($data);

		return Redirect::route('Bookings.index');
	}

	/**
	 * Remove the specified booking from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Booking::destroy($id);

		return Redirect::route('Bookings.index');
	}

}
