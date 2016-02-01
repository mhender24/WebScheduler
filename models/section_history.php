<?php

class SectionHistory{

	public function __construct(){
		//$this->employee = $emp;
		//$sections = array();
	}

	public function __get($key){
		return $this->$key;
	}

	public function __set($key, $value){
		$this->$key = $value;
	}

	public function getFrequency($empArr, $sectArr){
		$freqArr = $this->getHistory($empArr, $sectArr);
		print_r($freqArr);
		
	}

	public function getHistory($empArr, $sectArr){
		$db = Database::getInstance();
		$sql = "Select * from sectionHistory where( ";
		foreach($empArr as $emp){
			$sql .= "employeeId = " . $emp . ' OR ';
		}
		$sql .= 'employeeId = 0';  //quick fix, needs refactoring
		$sql .= ') AND (';
		foreach($sectArr as $sect){
			$sql .= 'sectionId = ' . $sect . ' OR ';
		}
		$sql .= 'sectionId = 0)';  //quick fix, needs refactoring
		$result = $db->prepare($sql);
		$result->execute();
		return $history = $result->fetchAll();
	}
}