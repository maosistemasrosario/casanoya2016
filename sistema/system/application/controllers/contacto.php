<?php

class Contacto extends Controller{

	function Contacto(){
		parent::Controller();
		$this->load->model("botonera");
		$this->load->library('email');
		$header['title'] = 'Cartopel';
		$header['style'] = 'css/estilos.css';
		$this->load->view('header', $header);
	}
	
	function index(){
		$data['categorias'] = $this->botonera->cargarSubCategorias();
		if ($this->botonera->getSitioInactivo()) {
			$this->load->view('home_mantenimiento', $data);	
		} else {
			$this->load->view('contacto', $data);
		}
	}
	
	function send(){
		$data['deLos'] = $this->botonera->cargarBtnDelos();
		$data['vetas'] = $this->botonera->cargarBtnVetas();
		if($_POST['nombre'] == '' || $_POST['empresa'] == '' || $_POST['email'] == '' || $_POST['telefono'] == '' || $_POST['localidad'] == ''){
			$data['obligatorio'] = true;
			$this->load->view('contacto', $data);
		}else{
			$nombre = $_POST['nombre'];
			$empresa = $_POST['empresa'];
			$email = $_POST['email'];
			$tel = $_POST['telefono'];
			$direccion = $_POST['direccion'];
			$cuit = $_POST['cuit'];
			$localidad = $_POST['localidad'];
			$pais = $_POST['pais'];
			$prov = $_POST['provincia'];
			$cp = $_POST['codigo'];
			$consulta = $_POST['consulta'];
			$mensaje = $_POST['mensaje'];
			$message = "
 Nombre y Apellido: $nombre
 
 Empresa: $empresa
 
 E-email: $email
 
 Telefono: $tel
 
 Direccion: $direccion
 
 Cuit: $cuit
 
 Localidad: $localidad
 
 Pais: $pais
 
 Provincia: $prov
 
 Codigo postal: $cp
 
 Consulta a: $consulta
 
 Mensaje: $mensaje
						";
			
			$this->email->from('Contacto Web', 'Contacto Web');
			$this->email->to('casanoyagmc@gmail.com');
			
			$this->email->subject('Contacto Web');
			$this->email->message($message);
			
			$this->email->send();
			
			$data['enviado'] = true;
			$this->load->view('contacto', $data);
		}
	}
	
}

?>