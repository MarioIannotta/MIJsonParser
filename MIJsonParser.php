<?php

//
//  MIJsonParser.php
//  MIJsonParser v.1.1
//
//  Created by Mario Iannotta on 09/11/13.
//
//	LINKS:
//  WebSite		https://www.marioiannotta.com/
//  Twitter		https://www.twitter.com/MarioIannotta
//  GitHub 		https://github.com/MarioIannotta/
//

	class MIJsonParser {  
	
		var $json, $errors, $n_recursion;
	
		function MIJsonParser() { 
		
			$this->json = ""; 
			$this->n_recursion = 0;
			$this->errors['no_parameter'] = '{ "error" : "Nothing to make." }';
			$this->errors['different_length'] = '{ "error" : "Keys and values must have the same number of elements." }';
			$this->errors['no_key'] = '{ "error" : "Keys and values must have the same number of elements." }';
			
		}
		
		function get() {
			
			switch (func_num_args()) {
				
				case 1 :
					$this->makeFromList(func_get_arg(0));
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
			
			$this->clear();
			
		}
		
		

		function makeFromList($list) {
			
			if ($this->isDictionary($list)) {
			
				$i = 0;
				$this->json .= '{';
					
				foreach ($list as $key => $value) {
				
				    $this->json .= $this->makeFromKeysAndValues($key, $value);
					if ($i++ + 1 < count($list)) $this->json .= ",";
				}
				
				$this->json .= '}';
					
				return;
				
			} else {
				
				if ($this->n_recursion == 0) $this->json = '"'.$this->getVarName($list).'":';
				$this->json .= '[';
				
				for ($i = 0; $i < count($list); $i++) {
				
					if (is_array($list[$i])) $this->makeFromList($list[$i]);
					else $this->json .= '"'.$list[$i].'"';
					
					if ($i +1 < count($list)) $this->json .= ',';
				}
				
				$this->json .= ']';
			}
			
		}
		
		function makeFromKeysAndValues($keys, $values) {
			
			if (!is_array($keys) && is_array($values)) {
				
				$this->json .= '"'.$keys.'":';
				$this->makeFromList($values);
				
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
			$this->n_recursion++;
		}
		
		function clear() {
			$this->json = "";
		}
		
		function isDictionary($array) {
			return (bool)count(array_filter(array_keys($array), 'is_string'));
		}
		
		function getVarName($var) {
		    foreach($GLOBALS as $var_name => $value) if ($value === $var) return $var_name;
		    return false;
		}
	}

?>