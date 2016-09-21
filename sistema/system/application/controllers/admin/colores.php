<?php

class Colores extends controller{
	
	function Colores(){
		parent :: Controller();	
		$header['title'] = 'Panel de control - Colores';
		$this->load->view('admin/header', $header);
		$this->load->view('admin/nav');
	}
	
	function index(){
		$this->_secure();
		//$data['marcas'] = $this->_getMarcas();
		$data['colores'] = $this->_getColores();
		//$data['query'] = $this->_show();		
		$this->load->view('admin/colores', $data);
	}
	
	function save(){
		if(isset($_POST['id'])){
			$config['upload_path'] = './images/colores';
			$config['allowed_types'] = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			$color_img = "color-img";
			
			if ( ! $this->upload->do_upload($color_img)){
				//$error = array('error' => $this->upload->display_errors());
				
				//$this->load->view('upload_form', $error);
				$data = array(
					'color' => $_POST['color'],
					'marcas_id' => 0
				);
				$this->db->query("update colores set color='".$data['color']."', marcas_id=".$data['marcas_id']." where color_id=".$_POST['id']."");	
				redirect('admin/colores','location');
			}else{
				$upload = $this->upload->data();
				
				$config2['image_library'] = 'gd2';
				$config2['source_image'] = './images/colores/'.$upload['file_name'];
				$config2['maintain_ratio'] = TRUE;
				$config2['width'] = 15;
				$config2['height'] = 15;
				
				$this->load->library('image_lib', $config2);
				
				$this->image_lib->resize();
				
				$data = array(
					'color' => $_POST['color'],
					'color_img' => 'images/colores/'.$upload['file_name'],
					'marcas_id' => 0
				);
				$this->db->query("update colores set color='".$data['color']."', marcas_id=".$data['marcas_id'].", color_img='".$data['color_img']."' where color_id=".$_POST['id']."");	
				redirect('admin/colores','location');
			}
			
		}else{
			
			$config['upload_path'] = './images/colores';
			$config['allowed_types'] = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			$color_img = "color-img";
			
			if ( ! $this->upload->do_upload($color_img)){
				$error = array('error' => $this->upload->display_errors());
				
				$this->load->view('upload_form', $error);
			}else{
				$upload = $this->upload->data();
				
				$config2['image_library'] = 'gd2';
				$config2['source_image'] = './images/colores/'.$upload['file_name'];
				$config2['maintain_ratio'] = TRUE;
				$config2['width'] = 15;
				$config2['height'] = 15;
				
				$this->load->library('image_lib', $config2);
				
				$this->image_lib->resize();
				
				$data = array(
					'color' => $_POST['color'],
					'color_img' => 'images/colores/'.$upload['file_name'],
					'marcas_id' => 0
				);
				$this->db->insert('colores', $data);	
				redirect('admin/colores','location');	
			}
		
			
			
		}
	}
	
	function edit(){
		//$data['query'] = $this->_show();
		$data['id'] = $this->uri->segment(4, 0);
		$data['value'] = $this->_traer_titulo($data['id']);
		//$data['marcas'] = $this->_getMarcas();
		//$data['marcasEdit'] = $this->_geMarcasEdit($data['value']['marca_id']);
		$data['colores'] = $this->_getColores();
		$this->load->view('admin/colores', $data);
	}
	
	function delete(){
		$id = $this->uri->segment(4);
		
		$query = $this->db->query("select color_img from colores where color_id=$id");
		$imgPath = $query->result();
		
		@unlink($imgPath[0]->color_img);
		
		$this->db->delete('colores', array('color_id' => $id));
		
		redirect('admin/colores', 'location');
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
		//$query = $this->db->query("select c.*, m.marca, m.id from colores c,marcas m where c.marcas_id=m.id and c.color_id=$id");
		$query = $this->db->query("select c.* from colores c where c.color_id=$id");
		$res = $query->result();	
		if($res){
			/*return array(
				'color' => $res[0]->color,
				'color_img' => $res[0]->color_img,
				'marca' => $res[0]->marca,
				'marca_id' => $res[0]->id
				);*/
			return array(
				'color' => $res[0]->color,
				'color_img' => $res[0]->color_img
				);
				
		}
	}
	
	function _getMarcas(){
		$this->db->order_by('marca asc');
		
		return $this->db->get('marcas');
	}
	
	function _getColores(){
		$this->db->order_by('color asc');
		return $this->db->get('colores');
	}
	
	function _geMarcasEdit($id){
		$this->db->where('id', $id);
		$query = $this->db->get('marcas');
		$first = $query->result();
		
		$this->db->where('id !=', $id);
		$this->db->order_by('marca asc');
		$query = $this->db->get('marcas');
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