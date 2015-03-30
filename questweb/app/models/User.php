<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	protected $fillable = ['username','password','name'];

	/**
	* Overrides the method to ignore the remember token.
	*/
	public function setAttribute($key, $value)
	{
		$isRememberTokenAttribute = $key == $this->getRememberTokenName();
		if (!$isRememberTokenAttribute)
		{
			parent::setAttribute($key, $value);
		}
	}

	/**
	* Don't want the remember token
	*/
    public function getRememberTokenName()
	{
		return null; // not supported
	}

	public function roles()
    {
        return $this->belongsToMany('Role');
    }

    public function majors()
    {
        return $this->belongsToMany('Major');
    }

    public function minors()
    {
        return $this->belongsToMany('Minor');
    }

    public function honorPrograms()
    {
        return $this->belongsToMany('HonorProgram');
    }

    public function userApplication()
    {
        return $this->hasOne('UserApplication');
    }

    public function applicationsToRead()
    {
    	return $this->belongsToMany('UserApplication', 'reader_assignments', 'reviewer_id', 'user_application_id');
    }

    public function hasApplicationToRead($app){
    	foreach ($this->applicationsToRead as $appToRead){
	    	if($appToRead->id == $app){
	    		return true;
	    	}
		}
		return false;
    }

    public function hasMajor($majorToCheck){
    	foreach ($this->majors as $major){
	    	if($major->id == $majorToCheck->id){
	    		return true;
	    	}
		}
		return false;
    }

    public function hasMinor($minorToCheck){
    	foreach ($this->minors as $minor){
	    	if($minor->id == $minorToCheck->id){
	    		return true;
	    	}
		}
		return false;
    }

    public function hasHonor($honorToCheck){
    	foreach ($this->honorPrograms as $honor){
	    	if($honor->id == $honorToCheck->id){
	    		return true;
	    	}
		}
		return false;
    }


    public function isApplicant()
    {
    	foreach ($this->roles as $role){
	    	if($role->description == Role::$APPLICANT){
	    		return true;
	    	}
		}
		return false;
    }

    public function isReader()
    {
    	foreach ($this->roles as $role){
	    	if($role->description == Role::$READER){
	    		return true;
	    	}
		}
		return false;
    }

    public function isReaderForApp($id)
    {
    	if($this->isReader()){
    		foreach($this->applicationsToRead as $app){
    			if($app->id == intval($id)){
    				return true;
    			}
    		}
    	}
		return false;
    }

    public function isInterviewer()
    {
    	foreach ($this->roles as $role){
	    	if($role->description == Role::$INTERVIEWER){
	    		return true;
	    	}
		}
		return false;
    }

    public function isQualityGuild()
    {
    	foreach ($this->roles as $role){
	    	if($role->description == Role::$QUALITY_GUILD){
	    		return true;
	    	}
		}
		return false;
    }

    public function getHomeLinks()
    {
    	$list = array();
    	$list = array_add($list, 'Profile', array(URL::route("register"), "fa-user"));

    	foreach ($this->roles as $role){
    		if($role->description == Role::$APPLICANT){
	    		$list = array_add($list, 'Apply', array(URL::route("UserApplications.index"), "fa-send"));
	    	}
    		if($role->description == Role::$READER){
	    		$list = array_add($list, 'Read', array(URL::route("read"), "fa-eye"));
	    	}
    		if($role->description == Role::$INTERVIEWER){
	    		$list = array_add($list, 'Interview', array(URL::route("interview"),  "fa-users"));
	    	}
	    	if($role->description == Role::$QUALITY_GUILD){
	    		$list = array_add($list, 'Admin', array(URL::route("admin"), "fa-glass"));
	    	}
		}

		return $list;
    }
}
