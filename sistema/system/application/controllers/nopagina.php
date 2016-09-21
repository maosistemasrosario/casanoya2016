<?php

class Nopagina extends Controller {

	function Nopagina()
	{

		parent::Controller();
		$this->load->model("botonera");
		$header['title'] = 'Cartopel';
		$header['style'] = 'css/estilos.css';
                $header['script'] = 'js/cartopel.js';
		$this->load->view('header', $header);

	}
	
	function index()
	{
        $data['categorias'] = $this->botonera->cargarSubCategorias();
		$data['productos'] = $this->botonera->cargarProductosDestacados();
		$data['ofertas'] = $this->botonera->cargarOfertas();
		$this->load->view('nopagina', $data);

	}
	
}

?>