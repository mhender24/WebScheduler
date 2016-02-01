<?php

include_once('database.php');

if(isset($_GET['controller'])&&isset($_GET['action'])){
	$controller = $_GET['controller'];
	$action = $_GET['action'];
}
else{
	$controller = 'floorplan';
	$action = 'home';
}

require_once('views/layout.php');