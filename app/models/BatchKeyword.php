<?php

class BatchKeyword extends \Eloquent {

	protected $fillable = [
		'batch_id',
		'keyword_id',
	];


	public static $rules = [
		'batch_id'=>'required|numeric',
		'keyword_id'=>'required|numeric',
	];

/* 	public function deleteKeyword($keywordId)
 	{
 		DB::table('Batch_Keyword')->where('keyword_id',$keywordId)->delete();
 	}

 	public function getKeywordDetails($keywordId)
 	{
 		return DB::table('Batch_Keyword')->where('keyword_id',$keywordId)->get(array('batch_id'));
 	}

 	public function updateMethod($batchKeyword,$keywordId)
 	{
 		DB::table('Batch_Keyword')->where('keyword_id',$keywordId)->update($batchKeyword);
 	}
*/
}