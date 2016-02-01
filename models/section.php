<?php

class Section{
	protected $name;

	public function __construct($sectionNum){
		$this->sectionNum = $sectionNum;
	}

	public function __get($key){
		return $this->$key;
	}

	public function __set($key, $value){
		$this->$key = $value;
	}

	public static function insert(){
		$db = Database::getInstance();
		$sql = "INSERT INTO Section(name) VALUES(:name)";
		$result = $db->prepare($sql);
		$result->execute(array(':name'=>$_POST['section_name']));
	}

	public function delete($id){
		$sql = "DELETE FROM Section WHERE id = ".$id." LIMIT 1";
		$result = $db->prepare($sql);
		$result->execute();
	}

	public static function getAllSections(){
		$db = Database::getInstance();
		$sql = 'SELECT * FROM section';
		$result = $db->prepare($sql);
		$result->execute();
		return $result->fetchAll();
	}
}