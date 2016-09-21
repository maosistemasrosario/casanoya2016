<?php

class Photos extends Controller {
	
	function Photos(){
		parent::Controller();
		
	}
	
	function index(){
		$this->load->view('header');
		$this->load->view('nav');
	}
}

?>