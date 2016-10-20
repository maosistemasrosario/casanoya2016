<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Casa Noya S.R.L.</title>
<?php
echo link_tag($style);
?>
<script type="text/javascript">
//<![CDATA[
base_url = '<?= base_url();?>';

//]]>
</script>
<link href="<?php echo base_url() ?>/css/estilos.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>/css/responsiveslides.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<!--<![endif]-->
<script src="<?php echo base_url() ?>/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>/js/responsiveslides.min.js"></script>
<script src="<?php echo base_url() ?>/js/listas.js"></script>
<script type="text/javascript">
/*$(function(){
	//$(".color").css('opacity', 0.8);	
	$(".rslides").responsiveSlides({
		speed: 1000,
		timeout: 5000,
		prevText: "<<",   // String: Text for the "previous" button
		nextText: ">>",
	});
	
});*/
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
function abrirMenu() {
	var estado = $("#menu-nivel-1").css("display");
	if (estado =='none') {
		$("#menu-nivel-1").css("display","block");
		$(".pointer").html("v");
	} else {
		$("#menu-nivel-1").css("display","none");
		$(".pointer").html(">");
	}
}

$(function(){
	$('#menu-nivel-1').mouseleave(function(){
		abrirMenu();  
	});
});
</script>
</head>
