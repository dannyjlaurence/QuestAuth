<?php

class Application extends \Eloquent {
	protected $fillable = [];

	public function configurations()
    {
        return $this->hasMany('ApplicationConfiguration');
    }

    public function appStartDate(){
    	foreach($this->configurations as $config){
    		if($config->field_name == ApplicationConfiguration::$APP_START_DATE){
    			return date(DATE_RFC2822,strtotime($config->field_value));
    		}
    	}
    }

    public function appDueDate(){
    	foreach($this->configurations as $config){
    		if($config->field_name == ApplicationConfiguration::$APP_DUE_DATE){
    			return date(DATE_RFC2822,strtotime($config->field_value));
    		}
    	}
    }

    public function questions()
    {
        return $this->hasMany('Question');
    }

    public function readerCriterias()
    {
        return $this->hasMany('ReaderCriteria');
    }

}