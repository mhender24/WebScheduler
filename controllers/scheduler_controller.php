<?php

class SchedulerController{
	
	public function createDay(){
		$db = Database::getInstance();
		$sql = "INSERT INTO Day(weekId, startTime, shiftDate) VALUES (:weekId, :startTime, shiftDate)";
		$result = $db->prepare($sql);
		$result->execute();
	}
	
	public function addSchedule(){
		require_once('views/add_schedule_view.php');
	}

	public function createSchedule(){
		$schedule = Schedule::insert();
		$employees = Employee::getAllEmployees();
		foreach($employees as $employee){
			Week::insert($employee['id'], $schedule);
		}
		require_once('views/home_view.php');
	}
	
	public function viewSchedules(){
		$schedules = Schedule::getAllSchedules();
		require_once('views/schedule_view.php');
	}
	
	public function viewDetailSchedule(){
		$employees = Employee::getAllEmployees();
		$schedule = Schedule::getSchedule($_GET['id']);
		$db = Database::getInstance();
		$sql = "Select employee.firstName, employee.lastName, day.shiftDate, day.startTime, day.id as day_id from day left join week on day.weekId = week.id left join employee on week.empId = employee.id
					WHERE day.shiftDate >= :start AND day.shiftDate <= :end ORDER BY employee.firstName, day.shiftDate;   ";
		$result = $db->prepare($sql);
		$result->execute(array(":start"=>$schedule['startDate'], ":end"=>date('Y-m-d', strtotime("+6 day", strtotime($schedule['startDate']))))); 
		$allEmpSchedule = $result->fetchAll(PDO::FETCH_ASSOC);
		require_once('views/schedule_detail_view.php');
	}
	
	public function updateDays(){
		Schedule::update();
		$this->viewDetailSchedule();
	}
	
}

//Select employee.firstName, employee.lastName, day.shiftDate, day.startTime, day.id as day_id from day left join week on day.weekId = week.id left join employee on week.empId = employee.id
//					ORDER BY employee.firstName, day.shiftDate; 