<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO 8859-1" />-->
<script type="text/javascript" src="<?php echo base_url() ?>/js/jquery-1.4.2.min.js"></script>
<?php
	echo link_tag($style);
	
	$brand = '';
	if($all['brand'] == 0){
		$brand = 'deLos';
		$theme = 'css/delos.css';
	}else{
		$brand = 'vetas';
		$theme = 'css/vetas.css';
	}
	
	echo link_tag($theme);

?>
<title>Lista <?php echo $all['nombre'] ?></title>
</head>

<body>
<script type="application/javascript">
$(function(){
	var lan = $(".lanzamiento");	
	lan.clone().prependTo("table");
	lan.empty();
});
</script>
<div class="cont_list">
	<div id="title">
    	<?php
			
			echo "Lista ".$all['nombre'];
		?>
        
    </div>
<table cellpadding="0" class="precios" cellspacing="0" border="0">
        <?php
			for($i = 0; $i < count($all)-1; $i++){
				if (isset($all[$i])) {
				if($all[$i]['category'] != 'Lanzamientos'){
					echo "<tr>";
						echo "<td colspan=8 class='cat'>Categoria - ".$all[$i]['category']."</td>";
					echo "</tr>";
					
					for($x = 0; $x < count($all[$i]['subcategories']); $x++){
						echo "<tr>";
							echo "<td colspan=8 class='subcat'>".$all[$i]['subcategories'][$x]['title_sub']."</td>";
						echo "</tr>";
						
						for($y = 0; $y < count($all[$i]['subcategories'][$x][0]); $y++){
							echo "<tr>";
								echo "<td class='marcas' colspan=8>".$all[$i]['subcategories'][$x][0][$y]['title']."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td class='border border_right'>C&Oacute;DIGOS</td><td class='border border_right'>DESCRIPCI&Oacute;N</td><td class='border border_right'>PRECIO</td><td class='border border_bottom'>&nbsp;</td>";
							echo "</tr>";
							
							for($z = 0; $z < count($all[$i]['subcategories'][$x][0][$y])-2; $z++){
								//echo $all[$i]['subcategories'][$x][0][$y][$z]['codigo'];
								echo "<tr>";
									echo "<td class='border border_right'>".$all[$i]['subcategories'][$x][0][$y][$z]['codigo']."</td>";
									//for($c = 0; $c < count($all[$i]['subcategories'][$x][0][$y][$z]['color']); $c++){
									//	echo "<img src='".base_url().$all[$i]['subcategories'][$x][0][$y][$z]['color'][$c]['color_img']."' />&nbsp;&nbsp;&nbsp;";
									//}
									echo "</td><td class='border border_right'>".$all[$i]['subcategories'][$x][0][$y][$z]['description']."</td><td class='border border_right'>".$all[$i]['subcategories'][$x][0][$y][$z]['precio']."</td><td class='border border_bottom'><a href='".base_url()."index.php/articulo/".$all[$i]['subcategories'][$x][0][$y][$z]['art_id']."/0' target='_blank'>Ver m&aacute;s</a></td>";		
								echo "</tr>";
							}
							echo "<tr>";
								echo "<td class='border border_side' colspan=8> &nbsp; </td>";
							echo "</tr>";
							
						}
					}
				}else if($all[$i]['category'] == 'Lanzamientos'){
					echo "<tr class='lanzamiento'>";
						echo "<td colspan=8 class='cat'>Categoria - ".$all[$i]['category']."</td>";
					echo "</tr>";
					
					for($x = 0; $x < count($all[$i]['subcategories']); $x++){
						echo "<tr class='lanzamiento'>";
							echo "<td colspan=8 class='subcat'>".$all[$i]['subcategories'][$x]['title_sub']."</td>";
						echo "</tr>";
						
						for($y = 0; $y < count($all[$i]['subcategories'][$x][0]); $y++){
							echo "<tr class='lanzamiento'>";
								echo "<td class='marcas' colspan=8>".$all[$i]['subcategories'][$x][0][$y]['title']."</td>";
							echo "</tr>";
							echo "<tr class='lanzamiento'>";
								echo "<td class='border border_right'>C&Oacute;DIGOS</td><td class='border border_right colores_width'>COLORES</td><td class='border border_right'>DESCRIPCI&Oacute;N</td><td class='border border_right'>FORMATO</td><td class='border border_right'>EMBALAJE</td><td class='border border_right'>PRECIO</td><td class='border border_bottom'>&nbsp;</td>";
							echo "</tr>";
							
							for($z = 0; $z < count($all[$i]['subcategories'][$x][0][$y])-2; $z++){
								//echo $all[$i]['subcategories'][$x][0][$y][$z]['codigo'];
								echo "<tr class='lanzamiento'>";
									echo "<td class='border border_right'>".$all[$i]['subcategories'][$x][0][$y][$z]['codigo']."</td><td class='border border_right'>";
									for($c = 0; $c < count($all[$i]['subcategories'][$x][0][$y][$z]['color']); $c++){
										echo "<img src='".base_url().$all[$i]['subcategories'][$x][0][$y][$z]['color'][$c]['color_img']."' />&nbsp;&nbsp;&nbsp;";
									}
									echo "</td><td class='border border_right'>".$all[$i]['subcategories'][$x][0][$y][$z]['description']."</td><td class='border border_right'>".$all[$i]['subcategories'][$x][0][$y][$z]['formato']."</td><td class='border border_right'>".$all[$i]['subcategories'][$x][0][$y][$z]['embalaje']."</td><td class='border border_right'>".$all[$i]['subcategories'][$x][0][$y][$z]['precio']."</td><td class='border border_bottom'><a href='".base_url()."index.php/articulo/".$all[$i]['subcategories'][$x][0][$y][$z]['art_id']."/".$all['brand']."' target='_blank'>Ver m&aacute;s</a></td>";		
								echo "</tr>";
							}
							echo "<tr class='lanzamiento'>";
								echo "<td class='border border_side' colspan=8> &nbsp; </td>";
							echo "</tr>";
							
						}
					}
				}
				}
			}
            /*for($i=0; $i<count($all)-1; $i++){
				if($all[$i]['title_sub'] != 'Ver Todo'){
					echo "<tr>";
						echo "<td colspan=8 class='subcat'>".$all[$i]['title_sub']."</td>";
					echo "</tr>";
					for($e=0; $e<count($all[$i][0]); $e++){
						echo "<tr>";
							echo "<td class='marcas' colspan=8>".$all[$i][0][$e]['title']."</td>";
						echo "</tr>";	
						echo "<tr>";
							echo "<td class='border border_right'>C&Oacute;DIGOS</td><td class='border border_right colores_width'>COLORES</td><td class='border border_right'>DESCRIPCI&Oacute;N</td><td class='border border_right'>ALT</td><td class='border border_right'>LARGO</td><td class='border border_right'>PROF</td><td class='border border_right'>PRECIO</td><td class='border border_bottom'>&nbsp;</td>";
						echo "</tr>";
						//echo $all[$i][0][$e]['title']."<br>";					
						for($u = 0; $u < count($all[$i][0][$e])-2; $u++){
							echo "<tr>";
								echo "<td class='border border_right'>".$all[$i][0][$e][$u]['codigo']."</td><td class='border border_right'>";
								for($c = 0; $c < count($all[$i][0][$e][$u]['color']); $c++){
									echo "<img src='".base_url().$all[$i][0][$e][$u]['color'][$c]['color_img']."' />&nbsp;&nbsp;&nbsp;";
								}
								echo "</td><td class='border border_right'>".$all[$i][0][$e][$u]['description']."</td><td class='border border_right'>".$all[$i][0][$e][$u]['alto']."</td><td class='border border_right'>".$all[$i][0][$e][$u]['largo']."</td><td class='border border_right'>".$all[$i][0][$e][$u]['prof']."</td><td class='border border_right'>".$all[$i][0][$e][$u]['precio']."</td><td class='border border_bottom'><a href='".base_url()."index.php/articulo/".$all[$i][0][$e][$u]['art_id']."/".$all['brand']."' target='_blank'>Ver m&aacute;s</a></td>";		
							echo "</tr>";
						}
						echo "<tr>";
							echo "<td class='border border_side' colspan=8> &nbsp; </td>";
						echo "</tr>";
					}
				}else{
					
				}
            }*/
        ?>
        </table>
        
</div>
</body>
</html>