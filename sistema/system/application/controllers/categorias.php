<?php

class Categorias extends Controller{

	function Categorias(){
		parent::Controller();
		$this->load->model("botonera");
	}
	
	function index($id, $brand){
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
			$query = $this->db->query("select a.art_id, a.nombre, a.codigo, lp.precio from articulos a left join listas_precios as lp on lp.art_id=a.art_id left join listas as l on l.listas_id=lp.listas_id where subcatId=".$id." and marcaId=".$marcas[$i]['id']." and l.isDefault=1 order by nombre ASC, art_id ASC");	
			
			foreach($query->result() as $row){
				$query2 = $this->db->query("select sample from img where artId=".$row->art_id." order by img_id ASC limit 1");
				$img = $query2->result();
				if(isset($img[0]->sample)){
					$img = $img[0]->sample;
				}else{
					$img = '';	
				}
				$marcas[$i][]=array(
							'art_id' => $row->art_id,
							'nombre' => $row->nombre,
							'codigo' => $row->codigo,
							'precio' => $row->precio,
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