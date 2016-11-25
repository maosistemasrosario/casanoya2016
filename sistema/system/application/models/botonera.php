<?php
class botonera extends Model{
	
	function botonera(){
		parent::Model();	
	}
	
	function cargarBtnDelos(){
		$query = $this->db->query("select * from categorias where delos=1 and categoria like '%Lanzamiento%'");
		$result = $query->result();
		$btn[] = array('categoria' => $result[0]->categoria);
		$resultSub = $this->db->query("select * from subcategorias where delos=1 and id_cat=".$result[0]->id." order by subcategoria ASC");
		$result = $resultSub->result();
		$btn[0][] = array(
						'sub' => $result[0]->subcategoria,
						'id_sub' => $result[0]->id_sub
					);
		
		$query = $this->db->query("select * from categorias where delos=1 and categoria not like '%Lanzamiento%' order by categoria ASC");
		//$btn = array();
		foreach($query->result() as $q=>$cat){
			$categoria = $cat->categoria;
			$btn[] =array('categoria' => $categoria);
			$querySub = $this->db->query("select * from subcategorias where delos=1 and id_cat=".$cat->id." order by subcategoria ASC");
			
			foreach($querySub->result() as $k=>$sub){
				$btn[$q+1][] = array(
								'sub' => $sub->subcategoria,
								'id_sub' => $sub->id_sub
								);
			}
		}
		return $btn;
	}
	
	function cargarBtnVetas(){
		$query = $this->db->query("select * from categorias where vetas=1 and categoria like '%Lanzamiento%'");
		$result = $query->result();
		$btn[] = array('categoria' => $result[0]->categoria);
		$resultSub = $this->db->query("select * from subcategorias where vetas=1 and id_cat=".$result[0]->id." order by subcategoria ASC");
		$result = $resultSub->result();
		$btn[0][] = array(
						'sub' => $result[0]->subcategoria,
						'id_sub' => $result[0]->id_sub
					);
		
		$query = $this->db->query("select * from categorias where vetas=1 and categoria not like '%Lanzamiento%' order by categoria ASC");
		//$btn = array();
		foreach($query->result() as $q=>$cat){
			$categoria = $cat->categoria;
			$btn[] =array('categoria' => $categoria);
			$querySub = $this->db->query("select * from subcategorias where vetas=1 and id_cat=".$cat->id." order by subcategoria ASC");
			
			foreach($querySub->result() as $k=>$sub){
				$btn[$q+1][] = array(
								'sub' => $sub->subcategoria,
								'id_sub' => $sub->id_sub
								);
			}
		}
		return $btn;
	}

        function cargarCategorias(){
                $query = $this->db->query("select * from categorias where categoria like '%Lanzamiento%'");
		$result = $query->result();
		$btn[] = array('categoria' => $result[0]->categoria, 'id' => 0);
		$query = $this->db->query("select * from categorias where categoria not like '%Lanzamiento%' order by categoria ASC");
		//$btn = array();
		foreach($query->result() as $q=>$cat){
			$categoria = $cat->categoria;
			$id = $cat->id;
			$btn[] =array('categoria' => $categoria, 'id' => $id);
		}
		return $btn;
        }
		
		function cargarProductosDestacados() {
			$query = $this->db->query("select a.art_id, a.nombre, s.subcategoria, a.condicion , a.porcentaje, lp.precio, m.marca from articulos as a left join listas_precios as lp on lp.art_id=a.art_id left join listas as l on l.listas_id=lp.listas_id inner join subcategorias as s on s.id_sub=a.subcatId inner join marcas as m on m.id = a.marcaId where a.destacado = 1 and l.isDefault=1 order by a.nombre");
			$btn = array();
			foreach($query->result() as $q=>$art){
				$id = $art->art_id;
				$condicion = "";
				if($art->condicion == "NUEVO") {
					$condicion = "NUEVO!";
				} else if ($art->condicion == "DESCUENTO") {
					$condicion = "- ".$art->porcentaje." %"; 
				} else if ($art->condicion == "OFERTA") {
					$condicion = "OFERTA!";
				}
				$query_img = $this->db->query("select big from img where artId = ".$id." order by img_id ASC limit 1");
				$result = $query_img->result();
				if (count($result)>0) {
					$btn[] =array('nombre'=>$art->nombre,'id' => $id, 'subcategoria' => $art->subcategoria, 'precio' => $art->precio, 'condicion' => $condicion , 'marca' => $art->marca, 'imagen' => $result[0]->big);
				} else {
					$btn[] =array('nombre'=>$art->nombre,'id' => $id, 'subcategoria' => $art->subcategoria, 'precio' => $art->precio, 'condicion' => $condicion , 'marca' => $art->marca, 'imagen' => '');
				}
			}
			return $btn;
		}
		
		function cargarOfertas() {
			$query = $this->db->query("select ofertas_id, nombre, img from ofertas where activa=1 order by codigo");
			$btn = array();
			foreach($query->result() as $q=>$art){
				$id = $art->ofertas_id;
				$btn[] =array('nombre'=>$art->nombre,'id' => $id, 'imagen' => $art->img);
			}
			return $btn;
		}

        function cargarSubCategorias(){
		
			$query = $this->db->query("select * from categorias where activo=1 order by nro_orden ASC, categoria ASC");
			$btn = array();
			foreach($query->result() as $q=>$cat){
				$categoria = strtolower($cat->categoria);
				$btn[] =array('categoria' => $categoria);
		
				$querySub = $this->db->query("select * from subcategorias where id_cat=".$cat->id." and activo=1 order by subcategoria ASC");
				
				foreach($querySub->result() as $k=>$sub){
					$btn[$q][] = array(
									'sub' => strtolower($sub->subcategoria),
									'id_sub' => $sub->id_sub
									);
				}
			}
			return $btn;
		}
		
		function getSubCategoria($id){
			$querySub = $this->db->query("select * from subcategorias where id_sub=".$id." order by subcategoria ASC");
			foreach($querySub->result() as $k=>$sub){
				$btn[] = array(
								'title' => strtolower($sub->subcategoria),
								'id' => $sub->id_sub
								);
			}
			return $btn;
		}
    
}

?>