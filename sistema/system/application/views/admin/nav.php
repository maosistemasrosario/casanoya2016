<?php
	$sec = $this->uri->segment(2);
	$selected = "ui-tabs-selected ui-state-active";
	$marcas = "";
	$cat = "";
	$subCat = "";
	$colores = "";
	$articulos = "";
	//$precios = "";
	$ofertas = "";
	$listas = "";
	$general = "";
	
	if($sec == "marcas"){
		$marcas = $selected;	
	}else if($sec == "categorias"){
		$cat = $selected;
	}else if($sec == "subcategorias"){
		$subCat = $selected;
	}else if($sec == "colores"){
		$colores = $selected;
	}else if($sec == "articulos"){
		$articulos = $selected;
	//}else if($sec == "precios"){
	//	$precios = $selected;
	}else if($sec == "ofertas"){
		$ofertas = $selected;
	}else if($sec == "listas"){
		$listas = $selected;
	}else if($sec == "general"){
		$general = $selected;
	}	

?>

<div class="ui-widget-content ui-state-default ui-corner-all ui-helper-clearfix" id="cont_btn">
    <ul class="ui-helper-reset ui-helper-clearfix ui-corner-all" id="btn">
        <li class="ui-state-default ui-corner-top <?php echo $general; ?>"><a href="<?php echo base_url() ?>index.php/admin/general">General</a></li>
        <li class="ui-state-default ui-corner-top <?php echo $cat; ?>"><a href="<?php echo base_url() ?>index.php/admin/categorias">Categorias</a></li>
        <li class="ui-state-default ui-corner-top <?php echo $subCat; ?>"><a href="<?php echo base_url() ?>index.php/admin/subcategorias">Sub Categorias</a></li>
        <li class="ui-state-default ui-corner-top <?php echo $marcas; ?>"><a href="<?php echo base_url() ?>index.php/admin/marcas">Marcas</a></li>
        <li class="ui-state-default ui-corner-top <?php echo $articulos; ?>"><a href="<?php echo base_url() ?>index.php/admin/articulos">Articulos</a></li>
        <li class="ui-state-default ui-corner-top <?php echo $colores; ?>"><a href="<?php echo base_url() ?>index.php/admin/colores">Colores</a></li>
        <!--<li class="ui-state-default ui-corner-top <?php echo $precios; ?>"><a href="<?php echo base_url() ?>index.php/admin/precios/index/0">Precios</a></li>-->
		<li class="ui-state-default ui-corner-top <?php echo $ofertas; ?>"><a href="<?php echo base_url() ?>index.php/admin/ofertas">Ofertas</a></li>
        <li class="ui-state-default ui-corner-top <?php echo $listas; ?>"><a href="<?php echo base_url() ?>index.php/admin/listas">Listas</a></li>
    </ul>
	<a href="<?php echo base_url() ?>index.php/admin/logout" class="ui-helper-reset ui-button ui-button-text-icons ui-widget ui-state-default ui-corner-all" id="salir">Salir</a>
</div>