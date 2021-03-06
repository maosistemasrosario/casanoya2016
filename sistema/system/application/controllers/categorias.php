<?php

class Categorias extends Controller{

	function Categorias(){
		parent::Controller();
		$this->load->model("botonera");
	}
	
	function index($id, $brand){
		$this->indexOrder($id, $brand, 0);
	}
	
	function indexOrder($id, $brand, $order){
		$this->indexMarca($id, $brand, $order, 0);
	}

	function indexMarca($id, $brand, $order){
		$header['title'] = 'Casa Noya S.R.L.';
		$header['style'] = 'css/estilos.css';
		
		$this->load->view('header', $header);
		
		$productos = $this->botonera->getSubCategoria($id);//array();
		$categoria = $this->botonera->getCategoriaFromSubcategoria($id);
		/*$marcas[] = array(
							'id' => '1',
							'title' => 'Todas las Marcas'
							);*/
		$art = array();
		
		for($i=0; $i<count($productos); $i++){
			$orderBy = 'marca';
			if ($order==1)
				$orderBy = 'precio';
			if ($brand==0) {
				$query = $this->db->query("select a.art_id, a.nombre, a.codigo, a.condicion, a.porcentaje, lp.precio, m.marca from articulos a left join listas_precios as lp on lp.art_id=a.art_id left join listas as l on l.listas_id=lp.listas_id left join marcas as m on m.id=a.marcaId where subcatId=".$id." and a.activo=1 and l.isDefault=1 order by ".$orderBy." ASC, nombre ASC, art_id ASC");	
			} else {
				$query = $this->db->query("select a.art_id, a.nombre, a.codigo, a.condicion, a.porcentaje, lp.precio, m.marca from articulos a left join listas_precios as lp on lp.art_id=a.art_id left join listas as l on l.listas_id=lp.listas_id left join marcas as m on m.id=a.marcaId where subcatId=".$id." and m.id =".$brand." and a.activo=1 and l.isDefault=1 order by ".$orderBy." ASC, nombre ASC, art_id ASC");	
			}
			
			foreach($query->result() as $row){
				$query2 = $this->db->query("select big from img where artId=".$row->art_id." order by img_id ASC limit 1");
				$img = $query2->result();
				if(isset($img[0]->big)){
					$img = $img[0]->big;
				}else{
					$img = '';	
				}

				$condicion = "";
				if($row->condicion == "NUEVO") {
					$condicion = "NUEVO!";
				} else if ($row->condicion == "DESCUENTO") {
					$condicion = "- ".$row->porcentaje." %"; 
				} else if ($row->condicion == "OFERTA") {
					$condicion = "OFERTA!";
				}

				$productos[$i][]=array(
							'art_id' => $row->art_id,
							'nombre' => $row->nombre,
							'codigo' => $row->codigo,
							'precio' => $row->precio,
							'marca'  => $row->marca,
							'condicion'  => $condicion,
							'img' => $img
						);
			}
		}

		$sql = "select a.marcaId, m.marca, count(*) as cant from articulos a left join listas_precios as lp on lp.art_id=a.art_id left join listas as l on l.listas_id=lp.listas_id, marcas m where subcatId=".$id." and a.marcaId=m.id and a.activo=1 and l.isDefault=1 group by a.marcaId order by m.marca ASC";
		
		$marcas = array();
		
		$query = $this->db->query($sql);
		foreach($query->result() as $marca){
			$marcas[] = array(
							'id' => $marca->marcaId,
							'title' => $marca->marca,
							'cantidad' => $marca->cant
							);
		}
		
		$data['marcas'] = $marcas;
		$data['productos'] = $productos;
		$data['categoria'] = $categoria;
		$data['art'] = $art;
		
		$data['categorias'] = $this->botonera->cargarSubCategorias();
		$data['id'] = $id;
		$data['brand'] = $brand;
		$data['order'] = $order;
		if ($this->botonera->getSitioInactivo()) {
			$this->load->view('home_mantenimiento', $data);	
		} else {
			$this->load->view('categorias', $data);
		}
	}

	function index_anterior($id, $brand){
		$header['title'] = 'Casa Noya S.R.L.';
		$header['style'] = 'css/estilos.css';
		
		
		$this->load->view('header', $header);

		
		$query3 = $this->db->query("select distinct idMarca, id_restrict from restrict_sub where idSubcat=$id and brand=$brand");
		$r = $query3->result();

		$restrict = array();
		if(isset($r[0]->idMarca)){
			foreach($r as $marca){
				$restrict[] = $marca->idMarca;
			}
		}else{
			$restrict = 0;	
		}
		
		//var_dump($restrict);
		
		$sql = "select distinct a.marcaId, m.marca from articulos a, marcas m where subcatId=$id and a.marcaId=m.id";
		/*for($i = 0; $i<count($restrict); $i++){
			if(isset($restrict[$i])){
				$sql.= " and m.id!=$restrict[$i]";
			}
		}*/
		
		$sql.= " order by m.marca ASC";
		
		$marcas = array();
		
		//$query = $this->db->query("select distinct a.marcaId, m.marca from articulos a, marcas m where subcatId=$id and a.marcaId=m.id and m.id!=$restrict[0] and m.id!=$restrict[1] order by m.marca ASC");	
		
		$query = $this->db->query($sql);
		foreach($query->result() as $marca){
			$marcas[] = array(
							'id' => $marca->marcaId,
							'title' => $marca->marca
							);
		}
		
		$art = array();
		
		for($i=0; $i<count($marcas); $i++){
			$query = $this->db->query("select a.art_id, a.nombre, a.codigo, lp.precio, m.marca from articulos a left join listas_precios as lp on lp.art_id=a.art_id left join listas as l on l.listas_id=lp.listas_id left join marcas as m on m.id=a.marcaId where subcatId=".$id." and marcaId=".$marcas[$i]['id']." and l.isDefault=1 order by nombre ASC, art_id ASC");	
			
			foreach($query->result() as $row){
				$query2 = $this->db->query("select big from img where artId=".$row->art_id." order by img_id ASC limit 1");
				$img = $query2->result();
				if(isset($img[0]->big)){
					$img = $img[0]->big;
				}else{
					$img = '';	
				}
				$marcas[$i][]=array(
							'art_id' => $row->art_id,
							'nombre' => $row->nombre,
							'codigo' => $row->codigo,
							'precio' => $row->precio,
							'marca'  => $row->marca,
							'img' => $img
						);
			}
		}
		
		$data['marcas'] = $marcas;
		$data['art'] = $art;
		
		$data['categorias'] = $this->botonera->cargarSubCategorias();
		$this->load->view('categorias', $data);
		
	}
	
	
}

?>