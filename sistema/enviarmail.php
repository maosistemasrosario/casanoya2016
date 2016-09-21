<?php
//$Cuerpo = "Aviso desde Página Web Delos-Vetas: se ha registrado la dirección: ".$_POST["mail"]." , para recepción de Newsletter.";
$Cuerpo = "Mensaje: ". $_POST["mensaje"]."\r De: ".$_POST["nombre"]."\r Teléfono: ".$_POST["telefono"]."\r E-Mail: ".$_POST["email"]."\r Consulta: ".$_POST["consulta"];
$headers = 'From: contacto@casanoyasrl.com.ar' . "\r\n" .
    'Reply-To: contacto@casanoyasrl.com.ar' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
//anibalschiaves@hotmail.com
$email=mail("casanoyagmc@gmail.com","Mensaje desde sitio casanoya.com.ar",$Cuerpo, $headers);
if ($email){
	echo "1";
	}
else{
	echo "0";
	}
?>