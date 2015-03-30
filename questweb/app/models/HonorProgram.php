<?php

class HonorProgram extends \Eloquent {
	protected $fillable = [];

	public static $PROGRAMS = [
		["name" => "University Honors", "school" => ""],
		["name" => "Gemstone", "school" => ""],
		["name" => "ACES", "school" => ""],
		["name" => "EIP", "school" => ""],
		["name" => "Honors Humanities", "school" => ""],
		["name" => "Digital Cultures & Creativity", "school" => ""],
		["name" => "Integrated Life Sciences", "school" => ""],
		["name" => "College Park Scholars", "school" => ""],
		["name" => "Smith Freshman Fellows", "school" => ""],
		["name" => "Flexus", "school" => ""],
		["name" => "Virtus", "school" => ""],
		["name" => "CIVICUS", "school" => ""],
		["name" => "Other", "school" => ""]
	]; 
}