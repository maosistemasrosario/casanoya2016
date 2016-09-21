<?php

class Marcas extends controller{
	
	function Marcas(){
		parent :: Controller();	
		$header['title'] = 'Panel de control - Marcas';
		$this->load->view('admin/header', $header);
		$this->load->view('admin/nav');
	}
	
	function index(){
		$this->_secure();
		$data['query'] = $this->_show();
		
		$this->load->view('admin/marcas', $data);
				
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
			
			$config['upload_path'] = './images/marcas';
			$config['allowed_types'] = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			$color_img = "logo";
			
			if ($_FILES['logo']['tmp_name']!='' && ! $this->upload->do_upload($color_img)){
				$data = array(
					'marca' => $_POST['marca'],
					'delos' => $delos,
					'vetas' => $vetas
				);
				
				$this->db->where('id', $_POST['id']);
				$this->db->update('marcas', $data);
				redirect('admin/marcas','location');
			}else{
				$upload = $this->upload->data();
				
				$config2['image_library'] = 'gd2';
				$config2['source_image'] = './images/marcas/'.$upload['file_name'];
				$config2['maintain_ratio'] = TRUE;
				$config2['width'] = 164;
				$config2['height'] = 55;
				$config['master_dim'] = "width";
				
				$this->load->library('image_lib', $config2);
				
				$this->image_lib->resize();
			
				$data = array(
					'marca' => $_POST['marca'],
					'delos' => $delos,
					'vetas' => $vetas,
					'logo' => 'images/marcas/'.$upload['file_name']
				);
				$this->db->where('id', $_POST['id']);
				$this->db->update('marcas', $data);
				redirect('admin/marcas','location');
			}
			
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
			
			$config['upload_path'] = './images/marcas';
			$config['allowed_types'] = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			$color_img = "logo";
			
			if ($_FILES['logo']['tmp_name']!='' && ! $this->upload->do_upload($color_img)){ 
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
				//$this->load->view('upload_form', $error);
			}else{
				$upload = $this->upload->data();
				
				$config2['image_library'] = 'gd2';
				$config2['source_image'] = './images/marcas/'.$upload['file_name'];
				$config2['maintain_ratio'] = TRUE;
				$config2['width'] = 164;
				$config2['height'] = 55;
				$config['master_dim'] = "width";
				
				$this->load->library('image_lib', $config2);
				
				$this->image_lib->resize();
			
				$data = array(
					'marca' => $_POST['marca'],
					'delos' => $delos,
					'vetas' => $vetas,
					'logo' => 'images/marcas/'.$upload['file_name']
				);
				$this->db->insert('marcas', $data);
				redirect('admin/marcas','location');	
			}
			
		}
	}
	
	function edit(){
		$data['query'] = $this->_show();
		$data['id'] = $this->uri->segment(4, 0);
		$data['value'] = $this->_traer_titulo($data['id']);
		$data['subcat'] = $this->_getSubCategorias($data['id']);
		
		$this->load->view('admin/marcas', $data);
	}
	
	function _getSubCategorias($idMarca){
		$query = $this->db->query("select r.*, s.subcategoria from restrict_sub r, subcategorias s where r.idMarca=$idMarca and r.idSubcat=s.id_sub");
		$r = '';
		$id_sub= array();
		
		foreach($query->result() as $k => $res){
			$id_sub[] = $res->idSubcat;
			$r.= "<li><input type='checkbox' name='subcategorias[]' value='$res->idSubcat' onclick='restrict(this)' checked='checked' />".$res->subcategoria."&nbsp;&nbsp;|&nbsp;&nbsp;";
							$r.= "<span style='display:inline;'>";
							if($res->brand == 0){
								$r.= "<label><input type='radio' onclick='showSave(this)' name='marca_$k' value='deLos' checked='checked' /> deLos</label> <label><input type='radio' name='marca_$k' onclick='showSave(this)' value='vetas' /> vetas</label>";
							}else{
								$r.= "<label><input type='radio' name='marca_$k' value='deLos' onclick='showSave(this)' /> deLos</label> <label><input type='radio' onclick='showSave(this)' name='marca_$k' checked='checked' value='vetas' /> vetas</label>";			
							}
							$r.= "<a href='javascript:void(0)' onclick='saveRestrict(this)'>Guardar</a></span>";
						$r.= "</li>";	
		}
		$r.= "<li>&nbsp;</li>";
		$query = $this->db->query("select * from subcategorias where id_sub not in('".implode("', '", $id_sub)."') order by subcategoria ASC");
		foreach($query->result() as $k => $res){
			$r.= "<li><input type='checkbox' name='subcategorias2[]' value='$res->id_sub' onclick='restrict(this)' />".$res->subcategoria."&nbsp;&nbsp;|&nbsp;&nbsp;";
							$r.= "<span style='display:none;'><label><input type='radio' name='marca2_$k' onclick='showSave(this)' value='deLos' checked='checked' /> deLos</label> <label><input type='radio' onclick='showSave(this)' name='marca2_$k' value='vetas' /> vetas</label> <a href='javascript:void(0)' onclick='saveRestrict(this)'>Guardar</a></span>";
						$r.= "</li>";	
		}
		return $r;
		//$this->db->order_by('subcategoria asc');
		//return $this->db->get('subcategorias');
	}
	
	function delete(){
		$id = $this->uri->segment(4);
		$query = $this->db->query("select logo from marcas where id=$id");
		$marca = $query->result();
		$logo = $marca[0]->logo;
		if ($logo!='') {
			@unlink($logo);
		}
		$this->db->delete('marcas', array('id' => $id));
		
		redirect('admin/marcas', 'location');
	}
	
	function _show(){
			return $this->db->get('marcas');
	}
	
	function _traer_titulo($id){
		$query = $this->db->query("select * from marcas where id=$id");
		$res = $query->result();	
		if($res){
			return array(
				'marca' => $res[0]->marca,
				'delos' => $res[0]->delos,
				'vetas' => $res[0]->vetas,
				'logo' => $res[0]->logo
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