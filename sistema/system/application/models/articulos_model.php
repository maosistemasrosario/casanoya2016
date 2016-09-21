<?php

class Articulos_model extends Model{
	
	function Articulos_model(){
		parent::Model();	
	}
	
	function getArticulo($id){
		$query = $this->db->get_where("articulos", array("art_id"=>$id));
		return $query;
	}
	
	function getCategoriasEdit($id){
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
	
	function getSubCategoriasEdit($id){
		$this->db->where('id_sub', $id);
		$query = $this->db->get('subcategorias');
		$first = $query->result();
		
		$this->db->where('id_sub !=', $id);
		$this->db->order_by('subcategoria asc');
		$query = $this->db->get('subcategorias');
		$second = $query->result();
		$all = array_merge($first, $second);
		//var_dump($all);
		return $all;	
	}
	
	function getMarcasEdit($id){
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

	function getColoresEdit($id){
		$query = $this->db->query("select c.* from colores c, art_color ac where c.color_id=ac.colorId and ac.artId=$id");
		$first = $query->result();
		
		$query = $this->db->query("select colorId from art_color where artId=$id");
		$allArtId = $query->result();
		$restric = "";
		for($i=0; $i<count($allArtId); $i++){
			if($i != (count($allArtId)-1)){
				$restric .= " color_id!=".$allArtId[$i]->colorId." and";
			}else{
				$restric .= " color_id!=".$allArtId[$i]->colorId;
			}
		}
		if($restric != ""){
			$query = $this->db->query("select * from colores where ".$restric);
		}else{
			$query = $this->db->query("select * from colores");
		}
		$second = $query->result();
		$all = array(
					 'colores' =>array_merge($first, $second),
					 'cant' =>count($allArtId)
					 );
		return $all;
	}

	function getListasEdit($id){
		$query = $this->db->query("select l.*, p.precio from listas l left join listas_precios p on (l.listas_id=p.listas_id and p.art_id=".$id.") order by l.nombre");
		$all = $query->result();
		
		return $all;
	}
	
	function getImages($id){
		$query = $this->db->query("select * from img where artId=$id order by img_id ASC");
		return $query;
	}
}

?>