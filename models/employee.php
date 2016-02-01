<?php

class Employee{
	protected $firstName;
	protected $lastName;
	//protected $maxHours;
	//protected $week;
	//protected $type;
	//protected $availability;
	//protected $history;

	public function __construct($fName, $lName){ //, $max, Week $week, Availability $availability, SectionHistory $history){
		$this->firstName = $fName;
		$this->lastName = $lName;
		//$this->max = $max;
		//$this->week = $week
		//$this->availability = $availability;
		//$this->history = $history;
	}

	public function __get($key){
		return $this->$key;
	}

	public function __set($key, $value){
		$this->$key = $value;
	}

	public static function getAllEmployees(){
		$db = Database::getInstance();
		$sql = "Select * from Employee";
		$result = $db->prepare($sql);
		$result->execute();
		return $result->fetchAll();
	}

	public static function insert(){
		$db = Database::getInstance();
		$sql = "INSERT INTO Employee (firstName, lastName) VALUES(:f_name, :l_name)";
		$result = $db->prepare($sql);
		$result->execute(array(':f_name'=>$_POST['f_name'],':l_name'=>$_POST['l_name']));
	}
}