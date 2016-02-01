<?php

class FloorPlanController{
	
	public function home(){
		require_once('views/home_view.php');
	}

	public function error(){
		require_once('views/error_view.php');
	}

	public function scheduler(){
		$employees = Employee::getAllEmployees();
		$sections = Section::getAllSections();
		require_once('views/floorplan_view.php');
	}

	public function create(){
		$section_history = new SectionHistory();
		$frequency = $section_history->getFrequency($_POST['selected_emp'], $_POST['selected_sections']);

	}
}