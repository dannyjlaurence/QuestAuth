<?php

class Score extends \Eloquent {
	protected $fillable = ['reviewer_id','reader_criteria_id','user_application_id','score','comment'];

	public function readerCriteria()
    {
        return $this->belongsTo('ReaderCriteria');
    }

   	public function reader()
    {
    	return $this->belongsTo('User','reviewer_id','id');
    }
}