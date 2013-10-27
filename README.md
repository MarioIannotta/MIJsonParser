MIJsonParser
============

Convert your arrays in valid json string.

Example :

		$mathematics = array(
		
		    "I" => "27",
		    "II" => "28",
		    "III" => "26"
		);
		
		$grades = array(
		
		    "OOP" => "30",
		    "Operating systems" => "28",
		    "Mathematics" => $mathematics
		);
		
		$student = array();
		
		$student['name'] = "Tizio";
		$student['surname'] = "Caio";
		$student['grades'] = $grades;
				
				
		require_once 'MIJsonParser.php';
		$json = new MIJsonParser;
		
		$json->get($student);
