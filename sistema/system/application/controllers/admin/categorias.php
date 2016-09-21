<?php

class Categorias extends controller{
	
	function Categorias(){
		parent :: Controller();	
		$header['title'] = 'Panel de control - Categorias';
		$this->load->view('admin/header', $header);
		$this->load->view('admin/nav');
	}
	
	function index(){
		$this->_secure();
		$data['query'] = $this->_show();		
		$this->load->view('admin/categorias', $data);
				
	}
	
	function save(){
		if(isset($_POST['id'])){
			if(isset($_POST['vetas'])){
				$vetas = true;
			}else{
				$vetas = false;	
			}
			if(isset($_POST['delos'])){
				$delos = true;
			}else{
				$delos = false;	
			}
			
			$data = array(
				'categoria' => $_POST['categoria'],
				'delos' => $delos,
				'vetas' => $vetas
			);
			
			$this->db->where('id', $_POST['id']);
			$this->db->update('categorias', $data);
			redirect('admin/categorias','location');
			
		}else{
			
			if(isset($_POST['vetas'])){
				$vetas = true;
			}else{
				$vetas = false;	
			}
			if(isset($_POST['delos'])){
				$delos = true;
			}else{
				$delos = false;	
			}
			
			$data = array(
				'categoria' => $_POST['categoria'],
				'delos' => $delos,
				'vetas' => $vetas
			);
			$this->db->insert('categorias', $data);	
			redirect('admin/categorias','location');	
			
		}
	}
	
	function edit(){
		$data['query'] = $this->_show();
		$data['id'] = $this->uri->segment(4, 0);
		$data['value'] = $this->_traer_titulo($data['id']);
		
		
		$this->load->view('admin/categorias', $data);
	}
	
	function delete(){
		$id = $this->uri->segment(4);
		
		$this->db->delete('categorias', array('id' => $id));
		
		redirect('admin/categorias', 'location');
	}
	
	function _show(){
			$this->db->order_by('categoria asc');
			return $this->db->get('categorias');
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
	
	function _secure(){
		$username = $this->session->userdata('username');	
		if($username != 'admin'){
			redirect('admin/welcome', 'location');
		}
	}
	
}

?>