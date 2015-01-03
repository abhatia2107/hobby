<?php

class CommentsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /comments
	 *
	 * @return Response
	 */
	public function index()
	{
		$comments=Comment::all();
		return View::make('Comments.index',compact('comments'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /comments/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Comments.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /comments
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentianls=Input::all();
		$credentials['user_id']=Auth::id();
		$validator = Validator::make($credentianls, Comment::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$comment=Comment::create($credentianls);
		return Redirect::back()->with('success',Lang::get('comment.comment_updated'));
	}

	/**
	 * Display the specified resource.
	 * GET /comments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$commentDetails=Comment::find($id);
		return View::make('Comments.show',compact('commentDetails'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /comments/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$commentDetails=Comment::find($id);
		return View::make('Comments.create',compact('commentDetails'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /comments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$credentials=Input::all();
		$credentials['user_id']=Auth::id();
		$validator = Validator::make($credentials, Comment::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$updated=$this->comment->updateComment($credentials,$id);
		if ($updated) 
			return Redirect::back()->with('success',Lang::get('comment.comment_updated'));
		else
			return Redirect::to('/comments')->with('failure',Lang::get('comment.comment_already_failed'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /comments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$deleted=Comment::destroy($id);
		if($deleted)
			return Redirect::to('/comments')->with('success',Lang::get('comment.comment_deleted'));
		else
			return Redirect::to('/comments')->with('failure',Lang::get('comment.comment_delete_failed'));
	}

}