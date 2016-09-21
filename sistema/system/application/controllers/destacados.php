<?php

class Destacados extends Controller{

	function Destacados(){
		parent::Controller();
		$this->load->model("botonera");
	}
	
	function index($brand){
		$header['title'] = 'DeLos Vetas';
		$header['style'] = 'css/front.css';
		if($brand == 0){
			$header['empresa'] = 'css/delos.css';
		}else{
			$header['empresa'] = 'css/vetas.css';	
		}
		$this->load->view('header', $header);
		
		$random = array();
		/*if($brand == 0){
			$sector = 'delos';
		}else{
			$sector = 'vetas';	
		}*/
		if($brand == 0){
			$sector = 1;
		}else{
			$sector = 2;	
		}
		
		//$query = $this->db->query("SELECT a.art_id FROM articulos a, subcategorias s where a.destacado=1 and a.subcatId=s.id_sub and ".$sector."=1");
		$query = $this->db->query("SELECT a.art_id FROM articulos a where a.destacado=1 and (desct_sec=".$sector." or desct_sec=3)");
		foreach($query->result() as $row){
			$random[] = $row->art_id;
		}

		$art = array();
		
		if(count($random) > 0){
			/*if(count($random) <= 4){
				$top = 	count($random);
			}else{
				$top = 4;	
			}
			
			$top = 1;*/
			
			$top = count($random);
			
			for($i = 0; $i < $top; $i++){			
				//echo $random[$i]."<br>";
				//$rand_key = array_rand($random);
				
				$query = $this->db->query("select a.art_id, a.nombre, a.codigo from articulos a where art_id=".$random[$i]."");	
				foreach($query->result() as $row){
					$query2 = $this->db->query("select big from img where artId=".$row->art_id." limit 1");
					$img = $query2->result();
					if(isset($img[0]->big)){
						$img = $img[0]->big;
					}else{
						$img = '';	
					}
					/*$query3 = $this->db->query("select thumb from img where artId=".$row->art_id."");
					$thumbs = array();
					$th = $query->result();
					if(isset($th->thumb)){
						foreach($query->result() as $t){
							$thumbs[] = $t->thumb;
						}
					}*/
					$art[] = array(
								'art_id' => $row->art_id,
								'nombre' => $row->nombre,
								'codigo' => $row->codigo,
								'img' => $img
							);
				}
				//unset($random[$rand_key]); 
				$random[$i] = array_values($random);
			}
		}
		
		$data['random'] = json_encode($art);
		$data['deLos'] = $this->botonera->cargarBtnDelos();
		$data['vetas'] = $this->botonera->cargarBtnVetas();
		$this->load->view('destacados', $data);
		
	}
	
	
}

?>