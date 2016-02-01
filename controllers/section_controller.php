<?php

class SectionController{
	public function add(){
		require_once('views/add_section_view.php');
	}

	public function create(){
		Section::insert();
		require_once('views/home_view.php');
	}
}