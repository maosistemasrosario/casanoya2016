<?php

class Empresa extends Controller{

	function Empresa(){
		parent::Controller();
		$this->load->model("botonera");
		$header['title'] = 'CasaNoya S.R.L.';
		$header['style'] = 'css/estilos.css';
		$this->load->view('header', $header);
	}
	
	function index(){
		$data['categorias'] = $this->botonera->cargarSubCategorias();
		if ($this->botonera->getSitioInactivo()) {
			$this->load->view('home_mantenimiento', $data);	
		} else {
			$this->load->view('empresa', $data);
		}
		
	}
	
}

?>