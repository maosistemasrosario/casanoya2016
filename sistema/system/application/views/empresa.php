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
	<div id="ofertas">
		<ul class="rslides">
			<li><img src="<?php echo base_url() ?>/images/empresa.png" style=""></img></li>
		</ul>
	</div>
	<section id="section-empresa">
		<p>Casa Noya S.R.L. es un negocio familiar que tuvo su origen en agosto de 1977 en la ciudad de Arroyo Seco y fue fundado por Don Leopoldo Noya, con el paso de los años se fueron incorporando, sus hijos: Mauricio, Cristian y Germán, que hicieron de esta lo que es hoy en dia. Marcamos como valor agregado el trato personalizado con nuestros clientes. </p>
		<p>Actualmente la empresa cuenta con una amplia gama de productos y stock de los mismos que Ud. puede consultar a través de nuestra Pág. Web. Realizamos envíos a todo el país. El centro de operaciones de nuestra empresa, se encuentra en la ciudad de Arroyo Seco y contamos con una sede en la ciudad de Pueblo Esther. El envió de la mercadería es sin cargo hasta 40 km de nuestro Centro de distribución. San Nicolas - Villa Constitución - Empalme Villa Constitución - Figuera - Villa Diego - Rosario y Gran Rosario. Confirmar costos y plazos de entregas por envíos de mercaderías a otras localidades</p>
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