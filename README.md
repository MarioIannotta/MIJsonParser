MIJsonParser
============

MIJsonParser is a simple tool that allow you to convert any type of array in one json string.

Example
============

Input :
	
	$Students = array(
	
		array(
			"Name" => "John",
			"Surname" => "Smith",
			"Grades" => array(
				"OOP" => "30",
				"Operating systems" => "28",
				"Mathematics" => array(
					"I" => "27",
					"II" => "28",
					"III" => "26"
				),
				"Books from the library" => array("Advanced OOP", "Vector analysis")
			)
		), 
		
		array(
			"Name" => "Frank",
			"Surname" => "Williams",
			"Grades" => array(
				"Economy" => "20",
				"Phisic" => array(
					"I" => "22",
					"II" => "23"
				),
				"Mathematics" => "20"
			)
		), 
		
		array(
			"Name" => "Mike",
			"Surname" => "Taylor",
			"Grades" => array(
				"Electrotechnical" => array(
					"Circuits" => "27",
					"EMF" => "25"
				),
				"Chemistry" => "24"
			)
		)
	);
		
			
					
	require_once 'MIJsonParser.php';
	$json = new MIJsonParser;
			
	$json->get($Students);

Output:

	{
	    "Students": [
	        {
	            "Name": "John",
	            "Surname": "Smith",
	            "Grades": {
	                "OOP": "30",
	                "Operating systems": "28",
	                "Mathematics": {
	                    "I": "27",
	                    "II": "28",
	                    "III": "26"
	                },
	                "Books from the library": [
	                    "Advanced OOP",
	                    "Vector analysis"
	                ]
	            }
	        },
	        {
	            "Name": "Frank",
	            "Surname": "Williams",
	            "Grades": {
	                "Economy": "20",
	                "Phisic": {
	                    "I": "22",
	                    "II": "23"
	                },
	                "Mathematics": "20"
	            }
	        },
	        {
	            "Name": "Mike",
	            "Surname": "Taylor",
	            "Grades": {
	                "Electrotechnical": {
	                    "Circuits": "27",
	                    "EMF": "25"
	                },
	                "Chemistry": "24"
	            }
	        }
	    ]
	}
