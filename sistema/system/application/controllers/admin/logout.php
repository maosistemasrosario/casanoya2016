<?php

class Logout extends controller{

	function Logout(){
		parent :: Controller();	
		
	}
	
	function index(){
		$this->session->sess_destroy();
		redirect('admin/welcome', 'location');
	}
	
}

?>