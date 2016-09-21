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
				<li class="active-li"><a href="<?php echo base_url().'index.php/contacto'?>">Contacto</a></li>
				<li><a href="http://casanoyasrl.com.ar/novedades/" target="_blank">Promociones</a></li>
				<li><a href="<?php echo base_url().'index.php/empresa'?>">Empresa</a></li>
			<ul>
		</div>
		
	</header>  
	<div id="ofertas">
		<ul class="rslides">
			<li><img src="<?php echo base_url() ?>/images/contacto.png" style=""></img></li>
		</ul>
	</div>
	<section id="section-contacto">
			<div id="header-contacto" class="table-producto-titulo"><span>CONTACTO</span></div>
			<form>
				<table>
					<tr>
						<td><label>Nombre</label></td>
						<td><input type="text" id="txtNombre" name="txtNombre" size="40" autofocus class="input" ></td>
					</tr>
					<tr>
						<td><label>E-mail</label></td>
						<td><input type="text" id="txtEmail" name="txtEmail" size="40" class="input"></td>
					</tr>
					<tr>
						<td><label>Teléfono</label></td>
						<td><input type="text" id="txtTelefono" name="txtTelefono" size="40" class="input"></td>
					</tr>
					<tr>
						<td><label>Consulta</label></td>
						<td><input type="text" id="txtConsulta" name="txtConsulta" size="40" class="input"></td>
					</tr>
					<tr>
						<td><label>Mensaje</label></td>
						<td style="padding: 0.5em 0em;"><textarea rows="4" cols="31" class="input" id="txtMensaje"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="button" class="button" value="Cerrar" onclick="limpiarCampos()">
							<input type="button" class="button" value="Enviar" 
onclick="if (validarMensaje()) {EnviaMail($('#txtNombre').val(), $('#txtEmail').val(), $('#txtTelefono').val(), $('#txtConsulta').val(), $('#txtMensaje').val())}">
						</td>
					</tr>
				</table>
				
				</p>
				<p>
				
				</p>
				<p>
				
				</p>
				<p>
				
				</p>
				<p>
					
					
				</p>
			</form>
		
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
		$(function(){
			$(document).scrollTop(10000);
		});
	</script>
</body>