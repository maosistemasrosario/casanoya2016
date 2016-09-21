<?php
ini_set('memory_limit', '256M');
class Ofertas extends controller{
	
	function Ofertas(){
		parent :: Controller();	
		$header['title'] = 'Panel de control - Ofertas';
		$this->load->view('admin/header', $header);
		$this->load->view('admin/nav');
		
	}
	
	function index(){
		$this->_secure();
		$data['query'] = $this->_show();
		$this->load->view('admin/ofertas', $data);
				
	}
	
	function save(){
		if(isset($_POST['id'])){
			$this->load->library('upload');
			$this->load->library('image_lib');
			
			$image1;
			$configImg['upload_path'] = './images/ofertas';
			$configImg['allowed_types'] = 'gif|jpg|png';
			
			$this->upload->initialize($configImg);
			$img1 = "img1";
			if ( ! $this->upload->do_upload($img1)){
				
			}else{
				$upload = $this->upload->data();
				$image1 = 'images/ofertas/'.$upload['file_name']; //$this->_makeImage($upload);
			}
			if(isset($image1)){
				$img1 = $image1;
			}
			if(isset($_POST['activa'])){
				$activa = true;
			}else{
				$activa = false;	
			}
			
			if ($img1=="img1") {
				$data = array(
					'codigo' => $_POST['codigo'],
					'nombre' => $_POST['nombre'],
					'descripcion' => $_POST['description'],
					'activa' => $activa,
					//'img'    => $img1
				);
			} else {
				$data = array(
					'codigo' => $_POST['codigo'],
					'nombre' => $_POST['nombre'],
					'descripcion' => $_POST['description'],
					'activa' => $activa,
					'img'    => $img1
				);
			}
			
			if ($img1!="img1") {
				$oferta = $this->show($_POST['id']);
			}
			$this->db->where('ofertas_id',$_POST['id']);
			$this->db->update('ofertas', $data);
			if ($img1!="img1") {
				unlink($oferta['img']);
			}
			
			redirect('admin/ofertas/edit/'.$_POST['id'], 'location');
		}else{
			$image1;
			$configImg['upload_path'] = './images/ofertas';
			$configImg['allowed_types'] = 'gif|jpg|png';
			
			$this->load->library('upload');
			$this->load->library('image_lib');
			
			$this->upload->initialize($configImg);
			$img1 = "img1";
			if ( ! $this->upload->do_upload($img1)){
				
			}else{
				$upload = $this->upload->data();
				$image1 = 'images/ofertas/'.$upload['file_name']; //$this->_makeImage($upload);
			}
			
			if(isset($image1)){
				$img1 = $image1;
			}
			if(isset($_POST['activa'])){
				$activa = true;
			}else{
				$activa = false;	
			}
			$data = array(
					'codigo' => $_POST['codigo'],
					'nombre' => $_POST['nombre'],
					'descripcion' => $_POST['description'],
					'img'    => $img1,
					'activa' => $activa
				);
			
			$this->db->insert('ofertas', $data);
			$lastId = $this->db->insert_id();
			
		}
		redirect('admin/ofertas/index/0','location');			
			
	}
	
	function _makeImage($upload){
			$imgOrg = '';
			/*$imgBig = '';
			$imgSample = '';
			$imgThumb = '';
			$imgDestacado = '';
			$allImg = array();*/
			
			$imgOrg = 'images/ofertas/'.$upload['file_name'];
			/*big*/
			/*$configImgBig['image_library'] = 'gd2';
			$configImgBig['source_image'] = './images/articulos/'.$upload['file_name'];
			$configImgBig['new_image'] = './images/articulos/'.$upload['file_name'];
			$configImgBig['create_thumb'] = TRUE;
			$configImgBig['thumb_marker'] = '_big';
			$configImgBig['maintain_ratio'] = TRUE;
			$configImgBig['master_dim'] = 'width';
			$configImgBig['width'] = 299;
			$configImgBig['height'] = 194;
			$this->image_lib->initialize($configImgBig);
			$this->image_lib->resize();
			$path = explode(".", $upload["file_name"]);
			$imgBig = 'images/articulos/'.$path[0].'_big.'.$path[1];
			*/
			/*sample*/
			/*$configImgSample['image_library'] = 'gd2';
			$configImgSample['source_image'] = './images/articulos/'.$upload['file_name'];
			$configImgSample['new_image'] = './images/articulos/'.$upload['file_name'];
			$configImgSample['create_thumb'] = TRUE;
			$configImgSample['thumb_marker'] = '_sample';
			$configImgSample['maintain_ratio'] = TRUE;
			list($ancho,$alto) = getimagesize('./images/articulos/'.$upload['file_name']);
			if($ancho > $alto){
				$configImgSample['master_dim'] = 'width';
			}else if($ancho < $alto){
				$configImgSample['master_dim'] = 'height';
			}
			$configImgSample['width'] = 138;
			$configImgSample['height'] = 90;
			$this->image_lib->initialize($configImgSample);
			$this->image_lib->resize();
			$path = explode(".", $upload["file_name"]);
			$imgSample = 'images/articulos/'.$path[0].'_sample.'.$path[1];*/
			/*thumb*/
			/*$configImgThumb['image_library'] = 'gd2';
			$configImgThumb['source_image'] = './images/articulos/'.$upload['file_name'];
			$configImgThumb['new_image'] = './images/articulos/'.$upload['file_name'];
			$configImgThumb['create_thumb'] = TRUE;
			$configImgThumb['thumb_marker'] = '_thumb';
			$configImgThumb['maintain_ratio'] = TRUE;
			list($ancho,$alto) = getimagesize('./images/articulos/'.$upload['file_name']);
			if($ancho > $alto){
				$configImgThumb['master_dim'] = 'width';
			}else if($ancho < $alto){
				$configImgThumb['master_dim'] = 'height';
			}
			$configImgThumb['width'] = 70;
			$configImgThumb['height'] = 60;
			$this->image_lib->initialize($configImgThumb);
			$this->image_lib->resize();
			$path = explode(".", $upload["file_name"]);
			$imgThumb = 'images/articulos/'.$path[0].'_thumb.'.$path[1];*/
			/*destacado*/
			/*$configImgDest['image_library'] = 'gd2';
			$configImgDest['source_image'] = './images/articulos/'.$upload['file_name'];
			$configImgDest['new_image'] = './images/articulos/'.$upload['file_name'];
			$configImgDest['create_thumb'] = TRUE;
			$configImgDest['thumb_marker'] = '_dest';
			$configImgDest['maintain_ratio'] = TRUE;
			list($ancho,$alto) = getimagesize('./images/articulos/'.$upload['file_name']);
			if($ancho > $alto){
				$configImgDest['master_dim'] = 'width';
			}else if($ancho < $alto){
				$configImgDest['master_dim'] = 'height';
			}
			$configImgDest['width'] = 192;
			$configImgDest['height'] = 125;
			$this->image_lib->initialize($configImgDest);
			$this->image_lib->resize();
			$path = explode(".", $upload["file_name"]);
			$imgDestacado = 'images/articulos/'.$path[0].'_dest.'.$path[1];*/
			
			$allImg = array(
						   'org' =>$imgOrg, 
						   'big' => $imgBig, 
						   'sample' =>$imgSample, 
						   'thumb' =>$imgThumb, 
						   'dest' =>$imgDestacado
						   );
			return $allImg;
	}
	
	function edit(){
		//$this->load->model("articulos_model");
		$id = $this->uri->segment(4);
		$data['id'] = $id;
		$data['query'] = $this->_show();
		$data['value'] = $this->show($id);
		/*$data['query'] = $this->articulos_model->getArticulo($id);
		$catId = $data['query']->result();
		$data['categorias'] = $this->articulos_model->getCategoriasEdit($catId[0]->catId);
		$data['subcategorias'] = $this->_getSubCategorias();
		$subcatId = $data['query']->result();
		$data['subcategoriasEdit'] = $this->articulos_model->getSubCategoriasEdit($subcatId[0]->subcatId);
		$marcaId = $data['query']->result();
		$data['marcas'] = $this->articulos_model->getMarcasEdit($marcaId[0]->marcaId);
		$data['colores'] = $this->articulos_model->getColoresEdit($id);
		$data['images'] = $this->articulos_model->getImages($id);
		$data['listas'] = $this->articulos_model->getListasEdit($id);*/
		
		$this->load->view("admin/ofertas", $data);
		//redirect('admin/articulos', 'location');
	}
	
	function delete(){
		$id = $this->uri->segment(4);
		
		
		$query = $this->db->query("select * from ofertas where ofertas_id=$id");
		foreach($query->result() as $ofe){
			@unlink($ofe->img);
		}
		
		$this->db->delete('ofertas', array('ofertas_id' => $id));
		
		redirect('admin/ofertas', 'location');
	}
	
	function show($id){
		$query = $this->db->query("select * from ofertas where ofertas_id=$id");
		$res = $query->result();	
		if($res){
			return array(
				'codigo' => $res[0]->codigo,
				'nombre' => $res[0]->nombre,
				'descripcion' => $res[0]->descripcion,
				'activa' => $res[0]->activa,
				'img' => $res[0]->img
				);
				
		}
	}
	
	function _traer_titulo($id){
		$query = $this->db->query("select c.*, m.marca, m.id from colores c,marcas m where c.marcas_id=m.id and c.color_id=$id");
		$res = $query->result();	
		if($res){
			return array(
				'color' => $res[0]->color,
				'color_img' => $res[0]->color_img,
				'marca' => $res[0]->marca,
				'marca_id' => $res[0]->id
				);
				
		}
	}
	
	/*function _getMarcas(){
		$this->db->order_by('marca asc');
		return $this->db->get('marcas');
	}
	
	function _getCategorias(){
		$this->db->order_by('categoria asc');
		return $this->db->get('categorias');
	}
	
	function _getSubCategorias(){
		$this->db->order_by('subcategoria asc');
		return $this->db->get('subcategorias');
	}
	
	function _getColores(){
		$this->db->order_by('color asc');
		return $this->db->get('colores');
	}

	function _getListas(){
		$this->db->order_by('nombre asc');
		return $this->db->get('listas');
	}*/
	
	function _secure(){
		$username = $this->session->userdata('username');	
		if($username != 'admin'){
			redirect('admin/welcome', 'location');
		}
	}
	
	function _show(){
			$this->db->order_by('codigo asc');
			return $this->db->get('ofertas');
	}
}

?>