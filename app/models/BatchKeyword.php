<?php

class BatchKeyword extends \Eloquent {

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

	public static $rules = [
		'batch_id'=>'required|numeric',
		'keyword_id'=>'required|numeric',
	];
   	public function updateBatchKeyword($credentials,$id)
    {
        $updated=DB::table('batch_keyword')->where('id','=',$id)->update($credentials);
        return ($updated);
    } 

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