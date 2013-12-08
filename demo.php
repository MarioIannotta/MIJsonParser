<?php

//
//  demo.php
//  MIJsonParser v.1.1
//
//  Created by Mario Iannotta on 09/11/13.
//  https://www.marioiannotta.com/
//

	$Students = array(
	    array(
	        "Name" => "John",
	        "Surname" => "Smith",
	        "Grades" => array(
	            "OOP" => "30",
	            "Operating systems" => "28",
	            "Mathematics" => array("I" => "27", "II" => "28", "III" => "26"),
	            "Books from the library" => array("Advanced OOP", "Vector analysis")
	        )
	    ),
	    array(
	        "Name" => "Mike",
	        "Surname" => "Taylor",
	        "Grades" => array(
	            "Electrotechnical" => array("Circuits" => "27", "EMF" => "25"),
	            "Chemistry" => "24"
	        )
	    )
	);



	require_once 'MIJsonParser.php';
	$json = new MIJsonParser;
	
	$json->get($Students);
	
?>
