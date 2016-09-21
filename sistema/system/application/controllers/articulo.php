<?php

class Articulo extends Controller{

	function Articulo(){
		parent::Controller();
		$this->load->model("botonera");
		
	}
	
	function index($id, $brand){
		$header['title'] = 'Casa Noya S.R.L.';
		$header['style'] = 'css/estilos.css';
		
		$query = $this->db->query("select subcatId from articulos where art_id=".$id."");
		$subcatId = $query->result();
		if(isset($subcatId[0]->subcatId)){
			$header['brand2'] = $brand;
			$header['subcatId'] = $subcatId[0]->subcatId;
		}
		
		$this->load->view('header', $header);
		
		$art = array();
		$query = $this->db->query("select a.*, m.marca, m.id, m.logo, lp.precio from articulos a left join listas_precios as lp on lp.art_id=a.art_id left join listas as l on l.listas_id=lp.listas_id, marcas m where a.art_id=".$id." and a.marcaId=m.id and l.isDefault=1 ");
		$result = $query->result();
		$art = array(
					'art_id' => $result[0]->art_id,
					'codigo' => $result[0]->codigo,
					'nombre' => $result[0]->nombre,
					'descrip' => $result[0]->description,
					'alto' => $result[0]->alto,
					'largo' => $result[0]->largo,
					'peso' => $result[0]->peso,
					'prof' => $result[0]->prof,
					'volumen' => $result[0]->volumen,
					'precio' => $result[0]->precio,
					'planos' => $result[0]->planos,
					'marca' => $result[0]->marca,
					'marca_id' => $result[0]->id,
					'brand' => $brand,
					'subcat_id' => $result[0]->subcatId, 
					'next' => '',
					'prev' => '',
					'formato' => $result[0]->formato,
					'embalaje' => $result[0]->embalaje,
					'logo' => $result[0]->logo,
					'precio' => $result[0]->precio
				);
		
		$query = $this->db->query("select * from img where artId=".$id." order by img_id ASC");
		foreach($query->result() as $row){
			$art['img'][] = $row->thumb;
		}
		
		$query = $this->db->query("select c.color, c.color_img from art_color ac, colores c where ac.artId=".$id." and ac.colorId=c.color_id");
		foreach($query->result() as $row){
			$art['colores'][] = array(
									'color_img' => $row->color_img,
									'color' => $row->color
								);
		}
		//get previus art id
		$query = $this->db->query("select art_id from articulos where 
		(nombre<'".$art['nombre']."' or (nombre='".$art['nombre']."' and art_id<'".$art['art_id']."'))
		and marcaId=".$art['marca_id']." and subcatId=".$art['subcat_id']." order by nombre desc, art_id desc limit 1");
		$prev = $query->result();
		if(isset($prev[0]->art_id)){
			$art['prev'] = 	$prev[0]->art_id;
		}
		
		//get next art id
		$query = $this->db->query("select art_id from articulos where 
		(nombre>'".$art['nombre']."' or (nombre='".$art['nombre']."' and art_id>'".$art['art_id']."'))
		and marcaId=".$art['marca_id']." and subcatId=".$art['subcat_id']." order by nombre asc, art_id asc limit 1");
		$next = $query->result();
		if(isset($next[0]->art_id)){
			$art['next'] = 	$next[0]->art_id;
		}
		
		$data['art'] = $art;
		$data['categorias'] = $this->botonera->cargarSubCategorias();
		$this->load->view('articulo', $data);
		
		
	}
	
	
}

?>