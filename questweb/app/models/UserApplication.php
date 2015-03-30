<?php

class UserApplication extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['application_id','user_id','submitted'];

	public function application()
    {
        return $this->belongsTo('Application');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function readers()
    {
        return $this->belongsToMany('User','reader_assignments','user_application_id','reviewer_id');
    }

	public function questions()
    {
    	$app = $this->application;
        return $app->questions;
    }

    public function readerCriterias()
    {
        $app = $this->application;
        return $app->readerCriterias;
    }

    public function answers()
    {
    	return $this->hasMany('Answer');
    }

}