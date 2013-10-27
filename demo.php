<?php

	$mathematics_grades = array(
		"I" => "27",
		"II" => "28",
		"III" => "26"
	);
			
	$grades = array(
		"OOP" => "30",
		"Operating systems" => "28",
		"Mathematics" => $mathematics_grades
	);
			
	$student = array(
		"name" => "John",
		"surname" => "Smith",
		"grades" => $grades
	);
			
					
	require_once 'MIJsonParser.php';
	$json = new MIJsonParser;
			
	$json->get($student);
	
?>
