<?php

class Minor extends \Eloquent {
	protected $fillable = [];

	public static $SMITH = "Robert H. Smith School of Business";
	public static $CMNS = "College of Computer, Mathematical, and Natural Sciences";
	public static $ENGR = " A. James Clark School of Engineering";


	public static $MINORS = [
		["name" => "Business Analytics", "school" =>"Robert H. Smith School of Business"],

		["name" => "Astronomy", "school" =>"College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Meteorology", "school" =>"College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Atmospheric Science", "school" =>"College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Chemistry", "school" =>"College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Computer Science", "school" =>"College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Earth History", "school" =>"College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Earth Material Properties", "school" =>"College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Geophysics", "school" =>"College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Hydrology", "school" =>"College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Actuarial Mathematics", "school" =>"College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Mathematics", "school" =>"College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Statistics", "school" =>"College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Physics", "school" =>"College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Other", "school" => ""]
	]; 
}