<?php


class Week{
	//protected $id;
	protected $employee;
	protected $schedule;
	//protected $days;

	public function __construct(Employee $emp, Schedule $schedule){
		$this->employee = $emp;
		$this->schedule = $schedule;
		//$days = array();
	}

	public static function insert($empId, $schId){
		$db = Database::getInstance();
		$sql = "INSERT INTO Week(empId, scheduleId) VALUES(:empId, :scheduleId)";
		$result = $db->prepare($sql);
		$result->execute(array(':empId' => $empId, ':scheduleId' => $schId));
		Week::createDays($schId);
	}

	public static function delete($id){
		$sql = "DELETE FROM Week WHERE id =". $id." LIMIT 1";
		$result = $db->prepare($sql);
		$result->execute(array());
	}


	public static function createDays($schId){
		$db = Database::getInstance();
		$weekId = Week::getLastId();
		$schedule = Schedule::getSchedule($schId);
		$sql = "INSERT INTO day (weekId, startTime, shiftDate) VALUES (:weekId, :startTime, :shiftDate)";
		for($i = 0; $i < 7; $i++){
			$shift = date('Y-m-d', strToTime("+".$i." days", strToTime($schedule['startDate'])));
			$result = $db->prepare($sql);
			$result->execute(array(":weekId"=>$weekId, ":startTime"=>null, ":shiftDate"=>$shift));
		}
	}
	
	public static function getLastId(){
		$db = Database::getInstance();
		$sql = "SELECT id as week_id FROM Week WHERE id = LAST_INSERT_ID()";
		$result = $db->prepare($sql);
		$result->execute();
		$id = $result->fetch();
		return $id['week_id'];
	}
	
}