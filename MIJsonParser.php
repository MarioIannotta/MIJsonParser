<?php

	class MIJsonParser {  
	
		var $json, $errors;
	
		function MIJsonParser() { 
		
			$this->json = ""; 
			$this->errors['no_parameter'] = '{ "error" : "Nothing to make." }';
			$this->errors['different_length'] = '{ "error" : "Keys and values must have the same number of elements." }';
			$this->errors['no_key'] = '{ "error" : "Keys and values must have the same number of elements." }';
			
		}
		
		function get() {
			
			switch (func_num_args()) {
				
				case 1 :
					$this->makeFromDictionary(func_get_arg(0));
					break;
				case 2 :
					$keys = func_get_arg(0);
					$values = func_get_arg(1);
					$this->makeFromKeysAndValues($keys, $values);
					break;
					
				default:
				
					$this->json = $this->errors['no_parameter'];
					break;
				
			}
			
			if ($this->json[0] != '{') $this->json = '{'.$this->json;
			if ($this->json[strlen($this->json) - 1] != '}') $this->json .= '}';
			
			echo $this->json;
			
		}
		
		function makeFromDictionary($dictionary) {
			
			$i = 0;
			$this->json .= '{';
				
			foreach ($dictionary as $key => $value) {
			
			    $this->json .= $this->makeFromKeysAndValues($key, $value);
				if ($i++ + 1 < count($dictionary)) $this->json .= ",";
			}
			
			$this->json .= '}';
				
			return;
			
		}
		
		function makeFromKeysAndValues($keys, $values) {
			
			if (!is_array($keys) && is_array($values)) {
				
				$this->json .= '"'.$keys.'":';
				
				$this->makeFromDictionary($values);
				
			} else  if (is_array($keys) && is_array($values)) {
			
				if (count($keys) != count($values)) {
				
					$this->json = $this->errors['different_length'];
					return;
				}
			
				$this->json .= '{';
				
				for ($i = 0; $i < count($keys); $i++) {
				
					$this->json .= '"'.$keys[$i].'":"'.$values[$i].'"';
					if ($i + 1 < count($keys)) $this->json .= ",";
				}
				
				$this->json .= '}';
				
				return; 
			
			} else {
				
				if (empty($keys)) {
				
					$this->json = $this->errors['no_key'];
					return;
				}
				
				$this->json .= '"'.$keys.'":"'.$values.'"';
				return;
			}
		}
	}

?>
