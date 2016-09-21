<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Cartopel</title>
<?php
echo link_tag($style);
$brand = $this->uri->segment(1);
if($brand == 'categorias' || $brand == 'articulo' || $brand == 'destacados'){
	//echo link_tag($empresa);	
}
?>
<script type="text/javascript">
//<![CDATA[
base_url = '<?= base_url();?>';
//]]>
</script>
<script type="text/javascript" src="<?php echo base_url() ?>/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/js/coin-slider.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/js/cartopel.js"></script>
<link type="image/x-icon" rel="shortcut icon" href="<?php echo base_url() ?>/icono.png" >
<link rel="stylesheet" href="<?php echo base_url() ?>/css/coin-slider-styles.css" type="text/css" />
<link href="<?php echo base_url() ?>/css/estilos.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<!--<![endif]-->
	
<script type="text/javascript">
$(function(){
	//$(".color").css('opacity', 0.8);		   
});
function checkRegexp( mail ,regexp) {
	if ( !( regexp.test( mail ) ) ) {
		alert("La dirección de correo no es válida");
		document.getElementById('botnewslet').focus();
		document.getElementById('botnewslet').select();		
		return false;
	} else {
		return true;
	}
}
function limpiarCampos(){
	$("#txtNombre").val("");
	$("#txtEmail").val("");
	$("#txtConsulta").val("");
	$("#txtTelefono").val("");
	$("#txtMensaje").val("");
	$("#txtNombre").focus();
}
function validarMensaje() {
	if ($("#txtNombre").val()=="") {
		alert("Debe ingresar Nombre.")
		$("#txtNombre").focus();
		return false;
	}
	if ($("#txtEmail").val()=="") {
		alert("Debe ingresar E-mail.")
		$("#txtEmail").focus();
		return false;
	}
	if ($("#txtConsulta").val()=="") {
		alert("Debe ingresar Consulta.")
		$("#txtConsulta").focus();
		return false;
	}
	if ($("#txtMensaje").val()=="") {
		alert("Debe ingresar Mensaje.")
		$("#txtMensaje").focus();
		return false;
	}
	return true;
}
function EnviaMail(nombre, email, telefono, consulta, mensaje){
	//if (checkRegexp(correo,/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i)){
		$.post("<?php echo base_url(); ?>enviarmail.php",{nombre:nombre, email:email, telefono:telefono, consulta:consulta, mensaje:mensaje},function(data){
			if (data=="1"){
				alert("El mensaje se envió con éxito!");			
			}else{
				alert("Hubo un problema. Intente nuevamente en algunos minutos.");
			}
		});	
	//}
}
</script>
</head>