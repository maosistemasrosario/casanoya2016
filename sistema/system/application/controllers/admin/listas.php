<?php

class Listas extends controller{
	
	function Listas(){
		parent :: Controller();	
		$header['title'] = 'Panel de control - Listas';
		$this->load->view('admin/header', $header);
		$this->load->view('admin/nav');
	}
	
	function index(){
		$this->_secure();
		$data['query'] = $this->_show();		
		$this->load->view('admin/listas', $data);
				
	}

	function edit(){
		$data['query'] = $this->_show();
		$data['id'] = $this->uri->segment(4, 0);
		$data['value'] = $this->_traer_lista($data['id']);
		
		$this->load->view('admin/listas', $data);
	}

	function save(){
		if(isset($_POST['id'])){
			$nombre = $_POST['nombre'];
			$token = $_POST['id'];
			if(isset($_POST['isDefault'])){
				$isDefault = 1;
			}else{
				$isDefault = 0;	
			}
			$this->db->query("update listas set nombre = '$nombre', isDefault = $isDefault where listas_id = '$token'");
		} else {
			$nombre = $_POST['nombre'];
			$token = uniqid();
			if(isset($_POST['isDefault'])){
				$isDefault = true;
			}else{
				$isDefault = false;	
			}
			$this->db->query("insert into listas (token, nombre, isDefault) values('$token', '$nombre', $isDefault)");
		}
		
		redirect("admin/listas", 'location');
	}
	
	function delete(){
		$id = $this->uri->segment(4);
		
		$this->db->delete('listas', array('listas_id' => $id));
		
		redirect('admin/listas', 'location');
	}
	
	function _show(){
			$this->db->order_by('listas_id asc');
			return $this->db->get('listas');
	}
	
	function _traer_titulo($id){
		$query = $this->db->query("select * from categorias where id=$id");
		$res = $query->result();	
		if($res){
			return array(
				'categoria' => $res[0]->categoria,
				'delos' => $res[0]->delos,
				'vetas' => $res[0]->vetas
				);
				
		}
	}
	function _traer_lista($id){
		$query = $this->db->query("select * from listas where listas_id=$id");
		$res = $query->result();	
		if($res){
			if ($res[0]->isDefault==1) {
				$default = 'on';
			} else {
				$default = '';
			}
			return array(
				'nombre' => $res[0]->nombre,
				'isDefault' => $default
				);
				
		}
	}
	
	function _secure(){
		$username = $this->session->userdata('username');	
		if($username != 'admin'){
			redirect('admin/welcome', 'location');
		}
	}
	
}

?>