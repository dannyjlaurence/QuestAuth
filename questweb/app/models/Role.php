<?php

class Role extends \Eloquent {
	protected $fillable = [];

	public static $APPLICANT = "Applicant";
	public static $READER = "Reader";
	public static $INTERVIEWER = "Interviewer";
	public static $QUALITY_GUILD = "Quality Guild";
}