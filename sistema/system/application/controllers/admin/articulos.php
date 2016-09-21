<?php
ini_set('memory_limit', '256M');
class Articulos extends controller{
	
	function Articulos(){
		parent :: Controller();	
		$header['title'] = 'Panel de control - Articulos';
		$this->load->view('admin/header', $header);
		$this->load->view('admin/nav');
		
	}
	
	function index(){
		$this->_secure();
		$data['categorias'] = $this->_getCategorias();
		$data['subcategorias'] = $this->_getSubCategorias();
		$data['marcas'] = $this->_getMarcas();
		$data['colores'] = $this->_getColores();
		$data['listas'] = $this->_getListas();
		$this->load->view('admin/articulos', $data);
				
	}
	
	function save(){
		if(isset($_POST['id'])){
			$this->load->library('upload');
			$this->load->library('image_lib');
			
			$pdfPath = '';
			
			$query = $this->db->query("select planos from articulos where art_id=".$_POST['id']);
			$plano = $query->result();
			if($plano[0]->planos == ''){
				$configPdf['upload_path'] = './pdf';
				$configPdf['allowed_types'] = 'pdf';
				$this->upload->initialize($configPdf);
				$pdf = "pdf";
				if ( ! $this->upload->do_upload($pdf)){
					
				}else{
					$upload = $this->upload->data();
					$pdfPath = 'pdf/'.$upload['file_name'];
				}
			}else{
				$pdfPath = $plano[0]->planos;	
			}
			
			if(isset($_POST['destacado'])){
				$destacado = true;
			}else{
				$destacado = false;	
			}
			
			$desct_sec = 0;
			if(isset($_POST['delos']) && isset($_POST['vetas'])){
				$desct_sec = 3;
			}else if(isset($_POST['delos']) && !isset($_POST['vetas'])){
				$desct_sec = 1;	
			}else if(!isset($_POST['delos']) && isset($_POST['vetas'])){
				$desct_sec = 2;		
			}else if(!isset($_POST['delos']) && !isset($_POST['vetas'])){
				$desct_sec = 0;
			}
			
			$data = array(
					'catId' => $_POST['categorias'],
					'subcatId' => $_POST['subcategorias'],
					'codigo' => $_POST['codigo'],
					'nombre' => $_POST['nombre'],
					'marcaId' => $_POST['marca'],
					'formato' => $_POST['formato'],
					'embalaje' => $_POST['embalaje'],
					'planos' => $pdfPath,
					//'precio' => $_POST['precio'],
					'description' => $_POST['description'],
					'destacado' => $destacado,
					'desct_sec' => $desct_sec
				);
			
			$this->db->where('art_id',$_POST['id']);
			$this->db->update('articulos', $data);
			
			$this->db->delete('art_color', array('artId'=>$_POST['id']));
			if(isset($_POST['color'])){
				$color = $_POST['color'];
				for($i=0; $i<count($color); $i++){
					$this->db->insert('art_color', array('artId'=>$_POST['id'],'colorId'=>$color[$i]));	
				}
			}
			$this->db->delete('listas_precios', array('art_id'=>$_POST['id']));
			if(isset($_POST['lista'])){
				$lista = $_POST['lista'];
				$lista_id = $_POST['lista_id'];
				for($i=0; $i<count($lista); $i++){
					if ($lista[$i]!='')
						$this->db->insert('listas_precios', array('art_id'=>$_POST['id'],'listas_id'=>$lista_id[$i],'precio'=>$lista[$i]));	
				}
			}
			
			$query = $this->db->query("select * from img where artId=".$_POST['id']);
			$cant_img = $query->result();
			
			if(count($cant_img) < 4){
				$image1;
				$configImg['upload_path'] = './images/articulos';
				$configImg['allowed_types'] = 'gif|jpg|png';
				
				$this->upload->initialize($configImg);
				$img1 = "img1";
				if ( ! $this->upload->do_upload($img1)){
					
				}else{
					$upload = $this->upload->data();
					$image1 = $this->_makeImage($upload);
				}
				if(isset($image1)){
					$dataImg = array(
									 'org' => $image1['org'],
									 'big' => $image1['big'],
									 'sample' => $image1['sample'],
									 'thumb' => $image1['thumb'],
									 'destacado' => $image1['dest'],
									 'artId' => $_POST['id']
									 );
					$this->db->insert('img', $dataImg);
				}
			}
			
			redirect('admin/articulos/edit/'.$_POST['id'], 'location');
		}else{
			
			$image1;
			$image2;
			$image3;
			$image4;
			
			$pdfPath = '';
			
			$configImg['upload_path'] = './images/articulos';
			$configImg['allowed_types'] = 'gif|jpg|png';
			
			$configPdf['upload_path'] = './pdf';
			$configPdf['allowed_types'] = 'pdf';
			
			$this->load->library('upload');
			$this->load->library('image_lib');
			
			$this->upload->initialize($configPdf);
			$pdf = "pdf";
			if ( ! $this->upload->do_upload($pdf)){
				
			}else{
				$upload = $this->upload->data();
				$pdfPath = 'pdf/'.$upload['file_name'];
			}
			
			$this->upload->initialize($configImg);
			$img1 = "img1";
			if ( ! $this->upload->do_upload($img1)){
				
			}else{
				$upload = $this->upload->data();
				$image1 = $this->_makeImage($upload);
			}
			
			$this->upload->initialize($configImg);
			$img2 = "img2";
			if ( ! $this->upload->do_upload($img2)){
				
			}else{
				$upload = $this->upload->data();
				$image2 = $this->_makeImage($upload);
			}
			
			$this->upload->initialize($configImg);
			$img3 = "img3";
			if ( ! $this->upload->do_upload($img3)){
				
			}else{
				$upload = $this->upload->data();
				$image3 = $this->_makeImage($upload);
			}
			
			$this->upload->initialize($configImg);
			$img4 = "img4";
			if ( ! $this->upload->do_upload($img4)){
				
			}else{
				$upload = $this->upload->data();
				$image4 = $this->_makeImage($upload);
			}
			
			if(isset($_POST['destacado'])){
				$destacado = true;
			}else{
				$destacado = false;	
			}
			
			if(isset($_POST['delos'])){
				$dest_sec = 1;
			}else{
				$dest_sec = 0;	
			}
			
			if(isset($_POST['vetas'])){
				$dest_sec = 2;
			}else{
				$dest_sec = 0;	
			}
			
			$data = array(
					'catId' => $_POST['categorias'],
					'subcatId' => $_POST['subcategorias'],
					'codigo' => $_POST['codigo'],
					'nombre' => $_POST['nombre'],
					'marcaId' => $_POST['marca'],
					'formato' => $_POST['formato'],
					'embalaje' => $_POST['embalaje'],
					'planos' => $pdfPath,
					//'precio' => $_POST['precio'],
					'description' => $_POST['description'],
					'destacado' => $destacado,
					//'destacado' => $dest_sec
				);
			
			$this->db->insert('articulos', $data);
			$lastId = $this->db->insert_id();
			
			if(isset($_POST['color'])){
				$color = $_POST['color'];
				for($i=0; $i<count($color); $i++){
					$this->db->insert('art_color', array('artId'=>$lastId,'colorId'=>$color[$i]));	
				}
			}
			if(isset($_POST['lista'])){
				$lista = $_POST['lista'];
				$lista_id = $_POST['lista_id'];
				for($i=0; $i<count($lista); $i++){
					if ($lista[$i]!='')
						$this->db->insert('listas_precios', array('art_id'=>$lastId,'listas_id'=>$lista_id[$i],'precio'=>$lista[$i]));	
				}
			}
			if(isset($image1)){
				$dataImg = array(
								 'org' => $image1['org'],
								 'big' => $image1['big'],
								 'sample' => $image1['sample'],
								 'thumb' => $image1['thumb'],
								 'destacado' => $image1['dest'],
								 'artId' => $lastId
								 );
				$this->db->insert('img', $dataImg);
			}
			
			if(isset($image2)){
				$dataImg = array(
								 'org' => $image2['org'],
								 'big' => $image2['big'],
								 'sample' => $image2['sample'],
								 'thumb' => $image2['thumb'],
								 'destacado' => $image2['dest'],
								 'artId' => $lastId
								 );
				$this->db->insert('img', $dataImg);
			}
			
			if(isset($image3)){
				$dataImg = array(
								 'org' => $image3['org'],
								 'big' => $image3['big'],
								 'sample' => $image3['sample'],
								 'thumb' => $image3['thumb'],
								 'destacado' => $image3['dest'],
								 'artId' => $lastId
								 );
				$this->db->insert('img', $dataImg);
			}
			
			if(isset($image4)){
				$dataImg = array(
								 'org' => $image4['org'],
								 'big' => $image4['big'],
								 'sample' => $image4['sample'],
								 'thumb' => $image4['thumb'],
								 'destacado' => $image4['dest'],
								 'artId' => $lastId
								 );
				$this->db->insert('img', $dataImg);
			}
			
			redirect('admin/articulos','location');			
			
		}
	}
	
	function _makeImage($upload){
			$imgOrg = '';
			$imgBig = '';
			$imgSample = '';
			$imgThumb = '';
			$imgDestacado = '';
			$allImg = array();
			
			$imgOrg = 'images/articulos/'.$upload['file_name'];
			/*big*/
			$configImgBig['image_library'] = 'gd2';
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
			/*sample*/
			$configImgSample['image_library'] = 'gd2';
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
			$imgSample = 'images/articulos/'.$path[0].'_sample.'.$path[1];
			/*thumb*/
			$configImgThumb['image_library'] = 'gd2';
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
			$imgThumb = 'images/articulos/'.$path[0].'_thumb.'.$path[1];
			/*destacado*/
			$configImgDest['image_library'] = 'gd2';
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
			$imgDestacado = 'images/articulos/'.$path[0].'_dest.'.$path[1];
			
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
		$this->load->model("articulos_model");
		$id = $this->uri->segment(4);
		$data['query'] = $this->articulos_model->getArticulo($id);
		$catId = $data['query']->result();
		$data['categorias'] = $this->articulos_model->getCategoriasEdit($catId[0]->catId);
		$data['subcategorias'] = $this->_getSubCategorias();
		$subcatId = $data['query']->result();
		$data['subcategoriasEdit'] = $this->articulos_model->getSubCategoriasEdit($subcatId[0]->subcatId);
		$marcaId = $data['query']->result();
		$data['marcas'] = $this->articulos_model->getMarcasEdit($marcaId[0]->marcaId);
		$data['colores'] = $this->articulos_model->getColoresEdit($id);
		$data['images'] = $this->articulos_model->getImages($id);
		$data['listas'] = $this->articulos_model->getListasEdit($id);
		
		$this->load->view("admin/articulos", $data);
		//redirect('admin/articulos', 'location');
	}
	
	function delete(){
		$id = $this->uri->segment(4);
		
		$query = $this->db->query("select planos from articulos where art_id=$id");
		$planoPath = $query->result();
		@unlink($planoPath[0]->planos);
		
		$query = $this->db->query("select * from img where artId=$id");
		foreach($query->result() as $img){
			@unlink($img->org);
			@unlink($img->big);
			@unlink($img->sample);
			@unlink($img->thumb);
			@unlink($img->destacado);
		}
		
		$this->db->delete('articulos', array('art_id' => $id));
		$this->db->delete('img', array('artId' => $id));
		$this->db->delete('art_color', array('artId' => $id));
		$this->db->delete('listas_precios', array('art_id'=>$id));
		
		redirect('admin/articulos', 'location');
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
	
	function _getMarcas(){
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
	}
	
	function _secure(){
		$username = $this->session->userdata('username');	
		if($username != 'admin'){
			redirect('admin/welcome', 'location');
		}
	}
	
}

?>