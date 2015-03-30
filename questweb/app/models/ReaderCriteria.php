<?php

class ReaderCriteria extends \Eloquent {
	
	protected $fillable = [];

	public function items()
    {
        return $this->hasMany('ReaderCriteriaItem');
    }

}