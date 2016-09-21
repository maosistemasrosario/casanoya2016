<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();
		$header['title'] = 'Panel de control - deLos Vetas';
		$this->load->view('admin/header', $header);
	}
	
	function index()
	{
		$data['error'] = null;
		$this->load->view('admin/login', $data);
	}
	
	function login(){
		$user = $_POST['usuario'];
		$pass = md5($_POST['pass']);
		$query = $this->db->query("select * from admin where usuario='$user' and pass='$pass'");
		
		if($query->result()){
			$this->session->set_userdata('username', 'admin');
			redirect('admin/categorias');	
		}else{
			redirect('admin/welcome/error','location');	
		}
		
	}
	
	function error(){
		$data['error'] = "Error en el usuario y/o contrase&ntilde;a";
		$this->load->view('admin/login', $data);
	}
}
