<?php

class General extends controller{
	
	function General(){
		parent :: Controller();	
		$header['title'] = 'Panel de control - General';
		$this->load->view('admin/header', $header);
		$this->load->view('admin/nav');
	}
	
	function index(){
		$this->_secure();
		$data['value'] = $this->_traer_titulo(1);
		$data['id'] = 1;
		$this->load->view('admin/general', $data);
				
	}
	
	function save(){
		if(isset($_POST['id'])){
			if(isset($_POST['inactivo'])){
				$inactivo = true;
			}else{
				$inactivo = false;	
			}

			$data = array(
				'inactivo' => $inactivo
			);
			
			$this->db->where('general_id', $_POST['id']);
			$this->db->update('general', $data);
			redirect('admin/general','location');
			
		}else{
			if(isset($_POST['inactivo'])){
				$inactivo = true;
			}else{
				$inactivo = false;	
			}
			
			$data = array(
				'inactivo' => $inactivo
			);
			$this->db->insert('general', $data);	
			redirect('admin/general','location');	
			
		}
	}
	
	function edit(){
		$data['query'] = $this->_show();
		$data['id'] = $this->uri->segment(4, 0);
		$data['value'] = $this->_traer_titulo($data['id']);
		
		
		$this->load->view('admin/general', $data);
	}
	
	function _show(){
			$this->db->order_by('categoria asc');
			return $this->db->get('general');
	}
	
	function _traer_titulo($id){
		$query = $this->db->query("select * from general where general_id=".$id);
		$res = $query->result();	
		if($res){
			return array(
				'general_id' => $res[0]->general_id,
				'inactivo' => $res[0]->inactivo
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