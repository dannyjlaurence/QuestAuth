<?php

class ApplicationConfiguration extends \Eloquent {

	// Don't forget to fill this array
	protected $fillable = [];

	public static $APP_START_DATE = "applicant_start_date";
	public static $APP_DUE_DATE = "applicant_due_date";
	public static $READ_START_DATE = "read_start_date";
	public static $READ_DUE_DATE = "read_due_date";
	public static $INTERVIEW_START_DATE = "interview_start_date";
	public static $INTERVIEW_DUE_DATE = "interview_due_date";

}