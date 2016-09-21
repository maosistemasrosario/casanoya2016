<?php
class Precios extends controller{
	
	function Precios(){
		parent :: Controller();	
		$header['title'] = 'Panel de control - Precios';
		$this->load->view('admin/header', $header);
		$this->load->view('admin/nav');
		
	}
	
	function index($brand){
		$this->_secure();
		//$brand = 0;
		$data['all'] = $this->_getAll($brand);
		$this->load->view('admin/precios', $data);		
	}
	
	function _getAll($brand){
		
		
		if(!$brand){
			$query = $this->db->query("select * from subcategorias where delos=1 order by subcategoria ASC");
		}else{
			$query = $this->db->query("select * from subcategorias where vetas=1 order by subcategoria ASC");	
		}
		$all = array();
		foreach($query->result() as $sub){
			$all[] = array(
								'id_sub' => $sub->id_sub,
								'title_sub' => $sub->subcategoria
								);	
		}
		for($x = 0; $x<count($all); $x++){
			//echo $all[$x]['id_sub'];
			$query3 = $this->db->query("select distinct idMarca, id_restrict from restrict_sub where idSubcat=".$all[$x]['id_sub']." and brand=$brand");
			$r = $query3->result();
	
			$restrict = array();
			if(isset($r[0]->idMarca)){
				foreach($r as $marca){
					$restrict[] = $marca->idMarca;
				}
			}else{
				$restrict = 0;	
			}
			$sql = "select distinct a.marcaId, m.marca from articulos a, marcas m where subcatId=".$all[$x]['id_sub']." and a.marcaId=m.id";
			for($i = 0; $i<count($restrict); $i++){
				if(isset($restrict[$i])){
					$sql.= " and m.id!=$restrict[$i]";
				}
			}
			$sql.= " order by m.marca ASC";
			
			$marcas = array();
			
			$query = $this->db->query($sql);
			foreach($query->result() as $marca){
				$marcas[] = array(
								'id' => $marca->marcaId,
								'title' => $marca->marca
								);
			}
			
			for($i=0; $i<count($marcas); $i++){
			$query = $this->db->query("select a.art_id, a.nombre, a.codigo, b.precio from articulos a left join listas_precios b on (b.art_id=a.art_id and b.listas_id=".$brand.") where subcatId=".$all[$x]['id_sub']." and marcaId=".$marcas[$i]['id']." order by art_id ASC");	
			
			foreach($query->result() as $row){
					$query2 = $this->db->query("select sample from img where artId=".$row->art_id." limit 1");
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
			
			$all[$x][] = $marcas;
			
		}
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