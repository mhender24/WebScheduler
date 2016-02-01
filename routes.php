<?php

function execute($controller, $action){
	require_once('controllers/'.$controller.'_controller.php');

	switch($controller){
		case 'employee':
			require_once('models/employee.php'); 
			$controller = new EmployeeController(); break;
		case 'floorplan':
			require_once('models/employee.php');
			require_once('models/section.php');
			require_once('models/section_history.php');
			$controller = new FloorPlanController(); break;
		case 'scheduler':
			require_once('models/day.php');
			require_once('models/week.php');
			require_once('models/schedule.php');
			require_once('models/employee.php');
			$controller = new SchedulerController(); break;
		case 'section':
			require_once('models/section.php');
			$controller = new SectionController(); break;
	}	
	$controller->{$action}();
}

execute($controller, $action);
