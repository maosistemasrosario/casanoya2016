<body>
	<div class="container-fluid">
	<header>
		<div id="header-container">
			<a href="<?php echo base_url() ?>"><img id="logo" src="<?php echo base_url() ?>/images/logo.png"></img></a>
			<div id="menu"><a href="#" onclick="abrirMenu();">CATEGORÍAS <span class="pointer">><span></a></div>
			<ul id="menu-nivel-1">
				<?php
				for($i = 0; $i<count($categorias); $i++){
					if (count($categorias[$i])-1>0) {
						echo "<li id='opcion_producto' class='categoria'>";
						//if (count($categorias[$i])-1==1) {
						//	echo "<a href='".base_url()."index.php/categorias/".$categorias[$i][0]['id_sub']."/0'>".$categorias[$i]['categoria']."</a>";
						//} else {
						echo "<a id='cat' href='javascript:void(0)'>".$categorias[$i]['categoria']."</a>";
						echo "<ul id='menu-nivel-2'>";
						for($s=0; $s<(count($categorias[$i])-1); $s++){
							echo "<li id='opcion_subproducto'>";
					
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
		<div id="navbar">
			<ul>
				<li><a href="<?php echo base_url().'index.php/contacto'?>">Contacto</a></li>
				<li><a href="http://casanoyasrl.com.ar/novedades/" target="_blank">Promociones</a></li>
				<li><a href="<?php echo base_url().'index.php/empresa'?>">Empresa</a></li>
			<ul>
		</div>
		
	</header>           
	<section id="section-producto">
		

<div class="clearfix">
    	<!--<div class="logo"></div>-->
        <?php
			if ((count($marcas)<2) && (!isset($marcas[0]) || count($marcas[0])-2<=5)) {
			echo "<script>﻿$(function(){";
			echo "$('#footer-producto').css({position: 'fixed'});";
			echo "});</script>";
			} else {
			echo "<script>﻿$(function(){";
			echo "$('#footer-telefono p').css({margin: '0'});";
			echo "});</script>";
			}
			for($i=0; $i<count($marcas); $i++){
				echo "<div class='categorias'>";
					echo "<div class='title table-producto-titulo'>";
						echo strtoupper($marcas[$i]['title']);
					echo "</div>";
					echo "<div class='articulos container-fluid'>";
						echo "<ul class='art clearfix row'>";
							for($e=0; $e<count($marcas[$i])-2; $e++){
								echo "<div class='productos-cell col-md-3 col-xs-12 col-sm-6' style=''>";
									echo "<table class='table-producto'>";
										echo "<tr class='table-producto-descripcion'>";
											echo "<td><p>".$marcas[$i][$e]['nombre']."</p></td>";
										echo "</tr>";
										echo "<tr style='background-color: white;'>";
											echo "<td style='min-height: 150px;height: 150px;'>";
												echo "<a href='".base_url()."index.php/articulo/".$marcas[$i][$e]['art_id']."/".$this->uri->segment(3)."'><img src='".base_url().$marcas[$i][$e]['img'] ."'/></a>";
											echo "</td>";
										echo "</tr>";
										echo "<tr class='table-producto-precio'>";
											echo "<td><p>$ ".$marcas[$i][$e]['precio']."</p></td>";
										echo "</tr>";
									echo "</table>";
								echo "</div>";
							}
						echo "</ul>";
					echo "</div>";
				echo "</div>";
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
	</script>
</body>
</html>