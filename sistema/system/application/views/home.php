<body>
	<script type="text/javascript">
		$(function(){
			//$(".color").css('opacity', 0.8);	
			$(".rslides").responsiveSlides({
				speed: 1000,
				timeout: 5000,
				prevText: "<<",   // String: Text for the "previous" button
				nextText: ">>",
			});
			
		});
	</script>
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
	<?php
	if (isset($ofertas)) {
		echo '<div id="ofertas">';
		echo '<ul class="rslides">';
		for($i = 0; $i<count($ofertas); $i++){
			echo '<li><img src="'.base_url().$ofertas[$i]['imagen'].'" style=""></img></li>';
		}
		/*<li><img src="<?php echo base_url() ?>/images/madre.jpg" style=""></img></li>*/
		echo "</div>";
		echo "</ul>";
	}
	?>
	<?php
		if(isset($productos)){
			$cant = count($productos);
			$cant_rows = floor($cant / 4);
			$modulo = $cant % 4;
			if ($modulo==0)
				$bootstrap = 3;
			if ($modulo==1)
				$bootstrap = 12;
			if ($modulo==2)
				$bootstrap = 6;
			if ($modulo==3)
				$bootstrap = 4;
			if ($bootstrap==12) {
				$col_sm = 12;
			} else {
				$col_sm = 6;
			}
			if ($modulo>0) $cant_rows++;
			
	?>
	<div id="productos">
		<div id="productos-container" class="container-fluid">
		<?php
			for($i = 0; $i<$cant_rows; $i++){
				$cant_col = 3;
				if ($cant_rows==1)
					$cant_col = $bootstrap;
		?>
			<div class="productos-row row">
				<?php
					$iniciarEn = $i*4;
					if ($cant_rows==1 && $modulo>0) {
						$terminarEn = $iniciarEn+$modulo;
					} else {
						$terminarEn = $iniciarEn+4;
					}
					for ($j = $iniciarEn; $j<$terminarEn; $j++) {
						if(isset($productos[$j])){
				?>
				<div class="productos-cell col-md-<?php echo $cant_col ?> col-xs-12 col-sm-<?php echo $col_sm ?>" style="">
					<table class="table-producto">
						<tr><td style="min-height: 40px;height: 40px;"></td></tr>
						<tr style="background-color: white;">
							<td style="min-height: 230px;height: 230px;">
								<a href="<?php echo base_url()?>index.php/articulo/<?php echo $productos[$j]['id']; ?>/0"><img src="<?php echo base_url() ?><?php echo $productos[$j]['imagen']; ?>"></img></a>
							</td>
						</tr>
						<tr class="table-producto-titulo">
							<td><p><?php echo $productos[$j]['marca']; ?></p></td>
						</tr>
						<tr class="table-producto-descripcion">
							<td><p><?php echo $productos[$j]['nombre']; ?></p></td>
						</tr>
						<tr class="table-producto-precio">
							<td><p><span>$ <?php echo number_format ( $productos[$j]['precio'] , 0, ",", "." ); ?></span></p></td>
						</tr>
						<tr><td style="min-height: 40px;height: 40px;"></td></tr>
					</table>
				</div>
				<?php
						} else {
				?>	
				<div class="productos-cell col-md-<?php echo $cant_col ?> col-xs-12 col-sm-<?php echo $col_sm ?>" style=""></div>
				<?php		
						}
					}
				?>
			</div>
			<?php
				}
			?>
		</div>
	</div>
	<?php
		}
	?>
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
			//$("footer").css("position","absolute");
		}
	</script>
</body>