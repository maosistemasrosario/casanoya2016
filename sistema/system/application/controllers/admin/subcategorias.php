<?php

class Subcategorias extends controller{
	
	function Subcategorias(){
		parent :: Controller();	
		$header['title'] = 'Panel de control - Sub Categorias';
		$this->load->view('admin/header', $header);
		$this->load->view('admin/nav');
	}
	
	function index(){
		$this->_secure();
		$data['categorias'] = $this->_getCategorias();
		//$data['query'] = $this->_show();		
		$this->load->view('admin/subcategorias', $data);
				
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
			if(isset($_POST['activo'])){
				$activo = true;
			}else{
				$activo = false;	
			}
			
			$data = array(
				'subcategoria' => $_POST['subcategoria'],
				'delos' => $delos,
				'vetas' => $vetas,
				'id_cat' => $_POST['categoria'],
				'activo' => $activo
			);
			
			$this->db->where('id_sub', $_POST['id']);
			$this->db->update('subcategorias', $data);
			redirect('admin/subcategorias','location');
			
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
			if(isset($_POST['activo'])){
				$activo = true;
			}else{
				$activo = false;	
			}
			
			$data = array(
				'subcategoria' => $_POST['subcategoria'],
				'delos' => $delos,
				'vetas' => $vetas,
				'id_cat' => $_POST['categoria'],
				'activo' => $activo
			);
			$this->db->insert('subcategorias', $data);	
			redirect('admin/subcategorias','location');	
			
		}
	}
	
	function edit(){
		//$data['query'] = $this->_show();
		$data['id'] = $this->uri->segment(4, 0);
		$data['value'] = $this->_traer_titulo($data['id']);
		$data['categorias'] = $this->_getCategorias();
		$data['categoriasEdit'] = $this->_getCategoriasEdit($data['value']['id_cat']);
		
		$this->load->view('admin/subcategorias', $data);
	}
	
	function delete(){
		$id = $this->uri->segment(4);
		
		$this->db->delete('subcategorias', array('id_sub' => $id));
		
		redirect('admin/subcategorias', 'location');
	}
	
	function show($id){
			$this->db->where('id_cat', $id);
			$query = $this->db->get('subcategorias');
			$res = $query->result();
			$cat = array();
			if($res){
				foreach($res as $resul){
					$cat[] = array(
								'subcategoria' => $resul->subcategoria,
								'id' => $resul->id
							);
				}
			}
			
			echo json_encode($cat);
	}
	
	function _traer_titulo($id){
		$query = $this->db->query("select s.*, c.categoria, c.id from subcategorias s,categorias c where s.id_sub=$id and s.id_cat=c.id");
		$res = $query->result();	
		if($res){
			return array(
				'subcategoria' => $res[0]->subcategoria,
				'delos' => $res[0]->delos,
				'vetas' => $res[0]->vetas,
				'id_cat' => $res[0]->id_cat,
				'categoria' => $res[0]->categoria,
				'activo' => $res[0]->activo
				);
				
		}
	}
	
	function _getCategorias(){
		$this->db->order_by('categoria asc');
		//$this->db->where('delos', 1);
		//$this->db->where('vetas', 1);
		return $this->db->get('categorias');
	}
	
	function _getCategoriasEdit($id){
		$this->db->where('id', $id);
		$query = $this->db->get('categorias');
		$first = $query->result();
		
		$this->db->where('id !=', $id);
		$this->db->order_by('categoria asc');
		$query = $this->db->get('categorias');
		$second = $query->result();
		$all = array_merge($first, $second);
		//var_dump($all);
		return $all;	
	}
	
	function _secure(){
		$username = $this->session->userdata('username');	
		if($username != 'admin'){
			redirect('admin/welcome', 'location');
		}
	}
	
}

?>