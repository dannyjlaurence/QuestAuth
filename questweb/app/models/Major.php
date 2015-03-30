<?php

class Major extends \Eloquent {
	protected $fillable = [];

	public static $SMITH = "Robert H. Smith School of Business";
	public static $CMNS  = "College of Computer, Mathematical, and Natural Sciences";
	public static $ENGR  = "A. James Clark School of Engineering";

	public static $MAJORS = [
		["name" => "Accounting", "school" => "Robert H. Smith School of Business"],
		["name" => "Finance", "school" => "Robert H. Smith School of Business"],
		["name" => "Management", "school" => "Robert H. Smith School of Business"],
		["name" => "Information Systems", "school" => "Robert H. Smith School of Business"],
		["name" => "International Business", "school" => "Robert H. Smith School of Business"],
		["name" => "Supply Chain Management", "school" => "Robert H. Smith School of Business"],
		["name" => "Marketing", "school" => "Robert H. Smith School of Business"],
		["name" => "Operations Management", "school" => "Robert H. Smith School of Business"],

		["name" => "Astronomy", "school" => "College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Atmospheric and Oceanic Science", "school" => "College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Biochemistry", "school" => "College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Biological Sciences", "school" => "College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Chemistry", "school" => "College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Computer Science", "school" => "College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Environmental Sciences - Biodiversity and Conservation", "school" => "College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Environmental Sciences - Environmental Geosciences and Restoration", "school" => "College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Geology", "school" => "College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Mathematics", "school" => "College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Physics", "school" => "College of Computer, Mathematical, and Natural Sciences"],
		["name" => "Physical Sciences", "school" => "College of Computer, Mathematical, and Natural Sciences"],

		["name" => "Aerospace Engineering", "school" => "A. James Clark School of Engineering"],
		["name" => "Bioengineering", "school" => "A. James Clark School of Engineering"],
		["name" => "Chemical & Biomolecular Engineering", "school" => "A. James Clark School of Engineering"],
		["name" => "Civil & Environmental Engineering", "school" => "A. James Clark School of Engineering"],
		["name" => "Computer Engineering", "school" => "A. James Clark School of Engineering"],
		["name" => "Electrical Engineering", "school" => "A. James Clark School of Engineering"],
		["name" => "Fire Protection Engineering", "school" => "A. James Clark School of Engineering"],
		["name" => "Materials Science & Engineering", "school" => "A. James Clark School of Engineering"],
		["name" => "Mechanical Engineering", "school" => "A. James Clark School of Engineering"],
		["name" => "Other", "school" => ""]
	]; 
}