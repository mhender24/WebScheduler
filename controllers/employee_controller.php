<?php

class EmployeeController{
	public function add(){
		require_once('views/add_employee_view.php');
	}

	public function create(){
		Employee::insert();
		require_once('views/home_view.php');
	}
}