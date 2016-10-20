<?php
	//echo $marcas[1]['title'];
	//var_dump($marcas);
	/*var_dump($marcas[0][1]);
	echo $marcas[1]['title'];
	echo $marcas[1][0]['img'];*/
?>
<script type="text/javascript">
$(function(){
	//$("#vetas").css({opacity:0.8});
	//$("#delos").css({opacity:0.8});
	//$("#subcat").css({opacity:1});
	//$("#cat").css({opacity:1});
});

$(function(){
	setTimeout(long, 1000);	   
	
});

function long(){
	var alto = $(".cont_img").height();
	var height = (alto+20+15+53+20)-20;
	//alert("height: "+height);
	//alert("col height: "+$(".col_right").height());
	if(height > $(".col_right").height()){
		$(".col_right").css("height", height);
	}
}

function changeImg(l){
	var source = jQuery(l).find('img').attr('src');
	var cortar = source.split("_thumb");
	$(".cont_img").html("<a href='"+cortar[0]+cortar[1]+"' target='_blank'><img src='"+cortar[0]+"_big"+cortar[1]+"' /></a>");
	
}
</script>
<body>
<div class="container-fluid">
<?php
	echo "<script>﻿$(function(){";
	echo "$('#footer-telefono p').css({margin: '0'});";
	echo "});</script>";
?>
	<header>
		<div id="header-container">
			<a href="<?php echo base_url() ?>"><img id="logo" src="<?php echo base_url() ?>/images/logo.png"></img></a>
			<div id="menu"><a href="#" onmouseover="abrirMenu();">CATEGORÍAS </a></div>
			<ul id="menu-nivel-1">
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
		<div id="navbar">
			<ul>
				<li><a href="<?php echo base_url().'index.php/contacto'?>">Contacto</a></li>
				<li><a href="http://casanoyasrl.com.ar/novedades/" target="_blank">Promociones</a></li>
				<li><a href="<?php echo base_url().'index.php/empresa'?>">Empresa</a></li>
			<ul>
		</div>
		
	</header>           
	<section  id="section-producto">


    <div class="clearfix">
    	<div class="cont_art clearfix">
        	<div class="left_arrow">
            	<?php
					if($art['prev'] != ''){
						echo "<a title='Anterior articulo' href='". base_url() ."index.php/articulo/".$art['prev']."/".$art['brand']."'></a>";
					}
				?>
            <div class="right_arrow">
            	<?php
					if($art['next'] != ''){
						echo "<a title='Siguiente articulo' href='". base_url() ."index.php/articulo/".$art['next']."/".$art['brand']."'></a>";
					}
				?>            		
            </div>
            </div>
        	<div class="col_left">
            	<div class="cont_img">
                	<?php
						if(isset($art['img'])){
							$img = $art['img'][0];
							$div=explode("_thumb",$img);
							echo "<a href='".base_url().$div[0].$div[1]."' target='_blank'><img src='".base_url().$div[0]."_big".$div[1]."' /></a>";
						}else{
							echo "<img src='".base_url()."/images/sin-imagen_big.jpg' />";
						}
					?>
                	
                </div>
                <ul class="thumbs clearfix">
                	<?php
						if(isset($art['img'])){
							for($i=0; $i<count($art['img']); $i++){
								$img = $art['img'][$i];
								$div=explode("_thumb",$img);
								if($i != count($art['img'])-1){
									echo "<li><a href='javascript:void(0)' onclick='changeImg(this)'><img src='". base_url().$art['img'][$i] ."' /><img src='".base_url().$div[0]."_big".$div[1]."' style='display:none;' /></a></li>";	
								}else{
									echo "<li class='last'><a href='javascript:void(0)' onclick='changeImg(this)'><img src='". base_url().$art['img'][$i] ."' /><img src='".base_url().$div[0]."_big".$div[1]."' style='display:none;' /></a></a></li>";		
								}
							}
						}else{?>
							<li><a href='javascript:void(0)'><img src='<?php echo base_url() ?>images/sin-imagen_thumb.jpg' /></a></li>
                            <li><a href='javascript:void(0)'><img src='<?php echo base_url() ?>images/sin-imagen_thumb.jpg' /></a></li>
                            <li><a href='javascript:void(0)'><img src='<?php echo base_url() ?>images/sin-imagen_thumb.jpg' /></a></li>
                            <li class='last'><a href='javascript:void(0)'><img src='<?php echo base_url() ?>images/sin-imagen_thumb.jpg' /></a></li>	
                    <?php
						}
					?>
                </ul>
            </div>
            <div class="col_right">
            	<?php
				/*if($art['logo'] != ''){
            		echo "<div class='nombre'>";
						echo "<img src='".base_url().$art['logo']."' />";	
                	echo "</div>";
				}*/
				?>
				
				<div class="title">
                	<?php
						echo $art['marca'];
					?>
                </div>
                <table> 
                <tr>
                <td>
                         <div class="codigo">
					<?php
						echo $art['codigo'];
					?>
                         </div>       
                </td>
                </tr>
				<tr>
				<td style="font-weight: bold;">
					<div class="marca">
                	 	<?php
							echo $art['nombre'];
						?>
                	</div>  
				</td>
				</tr>
                <tr>
                <td>
                    <div class="precio">
                	 		$<?php
							 echo number_format ( $art['precio'] , 0, ",", "." ); ?>	    
                	</div>
					<!--<p><span>$ <?php echo number_format ( $art['precio'] , 0, ",", "." ); ?></span></p>-->
                </td>
                </tr>
				<tr>
                <td colspan="2"><div class="line" style="margin-top: 10px;"></div></td>
                </tr>
                <tr>
                <td style="padding: 10px 10px 10px 0px;">
                         <span class="descrip_Title">Descripci&oacute;n</span>       
                </td>
				</tr>
				<tr>
                <td>
                         <div class="descrip" style="width:240px">
                	 		<?php
						echo $art['descrip'];
					?>
                	 </div>       
                </td>
                </tr>
				</table>
                
            </div>
        </div>
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
	<script type="text/javascript">
		var bottomFooter = $("footer").position().top + $("footer").height();
		var windowHeight = window.innerHeight;
		var diff = windowHeight - bottomFooter;
		if (diff>0) {
			$("footer").css("position","absolute");
		}
	</script>
</div>
</body>