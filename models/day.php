<?php

class Day{
	//protected $dayOfWeek;
	//protected $id;
	//protected $weekId;
	protected $startTime;
	protected $date; 
	protected $week;
	//protected $defaultStartTime;

	public function __construct(Week $week, $start, $date){
		//$this->dayOfWeek = $dayOfWeek;
		$this->startTime = $start;
		$this->date = $date;
		$this->week = $week;
	}

	public function __get($key){
		return $this->$key;
	}

	public function __set($key, $value){
		$this->$key = $value;
	}

	public static function insert($date, $weekId){
		$sql = "INSERT INTO Day VALUES(:startTime, :dayDate, :week)";
		$weekId = $week->id;
		$result = $db->prepare($sql);
		$result->execute(array(':startTime'=>$start, ':dayDate'=>$date, ':week'=>$weekId));
	}

	public function delete($id){
		$sql = "DELETE FROM Day WHERE id = ".$id." LIMIT 1";
		$result = $db->prepare($sql);
		$result->execute(array());
	}
	
	public static function update($iter){
		$db = Database::getInstance();
		$sql = "Update day SET startTime = :start WHERE id = :id";
		$result = $db->prepare($sql);
		if($_POST['start_time_arr'][$iter] == "X"){
			$start = null;
		}
		else{
			$start = date('H:i:s', strToTime($_POST['start_time_arr'][$iter]));
		}
		$result->execute(array(":start" => $start, ":id" =>$_POST['day_id_arr'][$iter]));
	}
}








/*
CREATE TABLE Schedule (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
startDate date NOT NULL
);

CREATE TABLE Employee ( 
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstName varchar(30) NOT NULL,
lastName varchar(30) NOT NULL
);

CREATE TABLE Week (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
empId INT(6) UNSIGNED NOT NULL,
scheduleID INT(6) UNSIGNED NOT NULL,
foreign key(empId) references Employee(id),
foreign key(scheduleId) references Schedule(id) 
);

CREATE TABLE Day (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
weekId INT(6) UNSIGNED NOT NULL,
startTime time,
shiftDate date NOT NULL,
foreign key(weekId) references Week(id)
);

CREATE TABLE Section ( 
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
empId INT(6) UNSIGNED NOT NULL,
sectionNum INT(3) NOT NULL,
foreign key(empId) references Employee(id)
);

id int(6) unsigned auto_increment primary key,
    sectionId int(3) unsigned not null,
    employeeId int(6) unsigned not null,
    foreign key(sectionId) references section(id),
    foreign key(employeeId) references employee(id)
*/
