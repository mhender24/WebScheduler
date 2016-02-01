<?php


class Schedule{
	protected $startDate;

	public function __construct($start){
		$this->startDate = $start;
	}

	public function __get($key){
		return $this->startDate;
	}

	public function __set($key, $value){
		$this->$key = $value;
	}
	
	public static function getSchedule($id){
		$db = Database::getInstance();
		$sql = "Select * from schedule WHERE id = :id";
		$result = $db->prepare($sql);
		$result->execute(array(":id" => $id));
		return $result->fetch();
	}

	public static function getAllSchedules(){
		$db = Database::getInstance();
		$sql = "Select * from schedule";
		$result = $db->prepare($sql);
		$result->execute();
		return $result->fetchAll();
	}
	
	public static function insert(){
		$db = Database::getInstance();
		$sql = "INSERT INTO Schedule(startDate) VALUES(:startDate)";
		$result = $db->prepare($sql);
		$date = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['start'])));
		$result->execute(array(':startDate'=>$date));
		return $db->lastInsertId();
	}

	public function delete($id){
		$sql = "DELETE FROM Schedule WHERE id =". $id . " LIMIT 1";
		$result = $db->prepare($sql);
		$result->execute();
	}

	public static function update(){
		for($i = 0; $i < count($_POST['day_id_arr']);$i++)
			Day::update($i);
	}
}