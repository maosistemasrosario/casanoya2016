<body>
	<div class="container-fluid">
<header>
		<div id="header-container">
			<a href="<?php echo base_url() ?>"><img id="logo" src="<?php echo base_url() ?>/images/logo.png"></img></a>
			
		</div>
		<div id="navbar">
			<ul>
				<li><a href="<?php echo base_url().'index.php/contacto'?>">Contacto</a></li>
				<li><a href="http://casanoyasrl.com.ar/novedades/" target="_blank">Promociones</a></li>
				<li><a href="<?php echo base_url().'index.php/empresa'?>">Empresa</a></li>
			</ul>
		</div>
		<div id="menu-container">
			<div id="menu"><a href="#"  onmouseover="abrirMenu();">CATEGORÍAS </a></div>
			<ul id="menu-nivel-1" ;>
				<?php
				for($i = 0; $i<count($categorias); $i++){
					if (count($categorias[$i])-1>0) {
						echo "<li id='opcion_producto' class='categoria' onmouseout='return false' onmouseover='return false'>";
						//if (count($categorias[$i])-1==1) {
						//	echo "<a href='".base_url()."index.php/categorias/".$categorias[$i][0]['id_sub']."/0'>".$categorias[$i]['categoria']."</a>";
						//} else {
						echo "<a id='cat' href='javascript:void(0)'>".$categorias[$i]['categoria']."</a>";
						echo "<ul id='menu-nivel-2'>";
						echo "<li id='opcion_categoria'><a href='".base_url()."index.php/categoria/".$categorias[$i][0]['id_cat']."/0'>".$categorias[$i]['categoria']."</a></li>";
						for($s=0; $s<(count($categorias[$i])-1); $s++){
							echo "<li id='opcion_subproducto' onmouseout='return false'>";
					
								echo "<a href='".base_url()."index.php/categorias/".$categorias[$i][$s]['id_sub']."/0'>".$categorias[$i][$s]['sub']."</a>";
					
							echo "</li>";
						}
						echo "</ul>";
						//}
						echo "</li>";
					}
				}
				?>
			<ul>
		</div>
		
	</header>           
	<section id="section-producto">
		

<div class="clearfix">
    	<!--<div class="logo"></div>-->
        <?php
			if ((count($productos)<2) && (!isset($productos[0]) || count($productos[0])-2<=5)) {
			echo "<script>﻿$(function(){";
			echo "$('#footer-producto').css({position: 'fixed'});";
			echo "});</script>";
			} else {
			echo "<script>﻿$(function(){";
			echo "$('#footer-telefono p').css({margin: '0'});";
			echo "});</script>";
			}
			for($i=0; $i<count($productos); $i++){
				echo "<div class='categorias'>";
					echo "<div class='articulos container-fluid'>";
						echo "<div class='row'>";
							echo "<div class='col-md-3 col-xs-12 col-sm-6'>";
								echo "<table class='table-categorias'>";
									echo "<tr>";
									echo "<td style='min-height: 40px;height: 40px;vertical-align: top;'>";
									echo "<ul class='menu-lateral'>";
									echo "<li><a href='".base_url()."'>HOME</a></li>";
									echo "<li><a href='".base_url()."index.php/categoria/".$categoria[$i]['id_cat']."/0'>".strtoupper($categoria[$i]['categoria'])."</a></li>";
									echo "<li><a href='".base_url()."index.php/categorias/".$id."/0'>".strtoupper($productos[$i]['title'])."</a></li>";
									echo "<li>MARCAS";
									echo "<ul class='submenu-lateral'>";
									for($j=0; $j<count($marcas); $j++){
										if ($brand==$marcas[$j]['id']) {
											echo "<li class='submenu-lateral-activa'>".$marcas[$j]['title']." (".$marcas[$j]['cantidad'].")</li>";
										} else {
											echo "<li><a href='".base_url()."index.php/categorias/".$id."/".$marcas[$j]['id']."'>".$marcas[$j]['title']." (".$marcas[$j]['cantidad'].")</a></li>";
										}
									}
									echo "</ul>";
									echo "</li>";
									echo "</ul>";
									echo "</td></tr>";
								echo "</table>";
							echo "</div>";
							echo "<div class='col-md-9 col-xs-12 col-sm-6'>";
								echo "<div class='row'>";
									echo "<div class='col-md-12 col-xs-12 col-sm-12' style=''>";
										echo "<div class='title table-producto-titulo'>";
											echo strtoupper($productos[$i]['title']);
											echo "<select name='ordenarPor' onchange='ordenarPor(this.value)'>";
												if ($order==0) {
													echo "<option value='0' selected='selected'>Marca </option>";
												} else {
													echo "<option value='0'>Marca </option>";
												}
												if ($order==1) {
													echo "<option value='1' selected='selected'>Precio </option>";
												} else {
													echo "<option value='1' >Precio </option>";
												}
											echo "</select>";
											echo "<label>Ordenar por:</label>";
										echo "</div>";
									echo "</div>";	
								echo "</div>";
								echo "<ul class='art clearfix row'>";
									for($e=0; $e<count($productos[$i])-2; $e++){
										echo "<div class='productos-cell col-md-4 col-xs-12 col-sm-6' style=''>";
											echo "<table class='table-producto'>";
												echo "<tr><td style='min-height: 40px;height: 40px;padding-bottom: 0px;'>";
																	
													if ($productos[$i][$e]['condicion']=='OFERTA!') {
														echo "<div class='oferta'>";
																 echo $productos[$i][$e]['condicion'];									
														echo "</div>";
													} elseif ($productos[$i][$e]['condicion']!='') { 
														echo "<div class='condiciones'>";
																 echo $productos[$i][$e]['condicion'];									
														echo "</div>";
												
													} 
												echo"</td></tr>";
														
												echo "<tr style='background-color: white;'>";
													echo "<td style='min-height: 230px;height: 230px;'>";
														echo "<a href='".base_url()."index.php/articulo/".$productos[$i][$e]['art_id']."/".$this->uri->segment(3)."'><img src='".base_url().$productos[$i][$e]['img'] ."'/></a>";
													echo "</td>";
												echo "</tr>";
												echo "<tr class='table-producto-titulo'>";
													echo "<td><p>".$productos[$i][$e]['marca']."</p></td>";
												echo "</tr>";
												echo "<tr class='table-producto-descripcion'>";
													echo "<td><p>".$productos[$i][$e]['nombre']."</p></td>";
												echo "</tr>";
												echo "<tr class='table-producto-precio'>";
													echo "<td><p><span>$ ".number_format ( $productos[$i][$e]['precio'] , 0, ",", "." )."</span></p></td>";
												echo "</tr>";
												echo "<tr><td style='min-height: 40px;height: 40px;'></td></tr>";
											echo "</table>";
										echo "</div>";
									}
								echo "</ul>";
							echo "</div>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
				echo "<script type='text/javascript'>";
					$count = intval(count($productos[$i]));
					$divisor = intval(3);
					$altura = floor($count/$divisor)*465 - ((floor($count/$divisor)-1)*5);
					echo "$('.table-categorias').css('height','".$altura."px')";
				echo "</script>";
			}
		?>
    </div>


	</section>
	
	<footer>
		<div id="footer-table">
			<div id="footer-row">
				<div id="footer-cell-0">
					<img src="<?php echo base_url() ?>/images/barcode.jpg">
				</div>
				<div id="footer-cell-1">
					<div style="display: table;"><div style="display: table-row;">
					<div id="nuestras-oficinas">NUESTRAS OFICINAS</div>
					<address>
						<ul>
							<li>H. Irigoyen e Independencia</li>
							<li>Arroyo Seco</li>
							<li>Santa Fe</li>
							<li>Tel: 03402-426500 // Cel:03402-15440232</li>
						</ul>
						<ul>
							<li>San Martín y E. Ríos</li>
							<li>Pueblo Esther</li>
							<li>Santa Fe</li>
							<li>Tel: 03402-499196</li>
						</ul>
					</address>
					</div></div>
				</div>
				<div id="footer-cell-2">
					<ul>
						<li><a href="https://www.facebook.com/Casa-Noya-SRL-146319082094418/?fref=ts" target="_blank"><img src="<?php echo base_url() ?>/images/facebook.png"></a></li>
						<li><a href="https://www.youtube.com/channel/UCkj0lDoOmtkC55DugKtv3iA" target="_blank"><img src="<?php echo base_url() ?>/images/youtube.png"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	</div>
	<script type="text/javascript">
		var bottomFooter = $("footer").position().top + $("footer").height();
		var windowHeight = window.innerHeight;
		var diff = windowHeight - bottomFooter;
		if (diff>0) {
			$("footer").css("position","absolute");
		}
		function ordenarPor(marca) {
			window.location = "<?php echo base_url().'index.php/categorias/'.$id.'/'.$brand.'/'?>"+marca;
		}
	</script>
</body>
</html>