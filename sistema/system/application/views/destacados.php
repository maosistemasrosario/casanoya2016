<script type="text/javascript">
//<![CDATA[
brand = '<?= $this->uri->segment(2);?>';
var data = <?= $random; ?>;
var firstImg = "";
var first = true;
var pos = 0;
//]]>

$(function(){
	  if(data.length == 0){
		  firstImg = "images/sin-imagen_big.jpg";
		  
		  var img = $(".cont_art_desc img");
		  img.attr('src', base_url+firstImg);
		  
		  var linkImg = $(".cont_art_desc a");
		  linkImg.attr('href', base_url);
	  }else{
	  	  firstImg = data[0].img;
		  
		  var img = $(".cont_art_desc img");
		  img.attr('src', base_url+firstImg);
		  
		  var linkImg = $(".cont_art_desc a");
		  linkImg.attr('href', base_url+"index.php/articulo/"+data[0].art_id+"/"+brand);
		  setInterval(aleatoria, 6000);
	  }
	  
});

$(function(){
	//$("#vetas").css({opacity:0.8});
	//$("#delos").css({opacity:0.8});
	//$("#subcat").css({opacity:1});
	//$("#cat").css({opacity:1});
});

/*$(function(){
		   aleatoria();
		   });*/

/*function aleatoria(){
	$.getJSON(base_url+"index.php/admin/application/destacados/"+brand, resp);
}*/

function aleatoria(){
	if(data[pos].img == firstImg && first){
		first = false;
		if(pos < data.length && data.length > 1){
			pos = ++pos;
			var img = $(".cont_art_desc a img");
			img.attr('src', base_url+data[pos].img);
			
			var linkImg = $(".cont_art_desc a");
			linkImg.attr('href', base_url+"index.php/articulo/"+data[pos].art_id+"/"+brand);
		}else{
			pos = 0;	
		}
	}else{		
		pos = ++pos;
		if(pos < data.length){
			var img = $(".cont_art_desc a img");
			img.attr('src', base_url+data[pos].img);
			
			var linkImg = $(".cont_art_desc a");
			linkImg.attr('href', base_url+"index.php/articulo/"+data[pos].art_id+"/"+brand);
		}else{
			pos = 0;
			var img = $(".cont_art_desc a img");
			img.attr('src', base_url+data[pos].img);
			
			var linkImg = $(".cont_art_desc a");
			linkImg.attr('href', base_url+"index.php/articulo/"+data[pos].art_id+"/"+brand);
		}
	}
	
}

/*function resp(r){
	var allDivs = $(".art_desc");
	allDivs.animate({opacity: 0}, 1000, function(){
					for(var i = 0; i < allDivs.length; i++){
						var firstChild = $(allDivs[i]).children(".cont_art_desc");
						var secondChild = $(allDivs[i]).children(".art_nombre");
						if(r[i].img != '' || r[i].img != null){
							srcImg = base_url+r[i].img;	
						}else{
							srcImg = base_url+"images/sin-imagen_destacado.jpg";
						}
						
						firstChild.html("<a href='"+base_url+"index.php/articulo/"+r[i].art_id+"/"+brand+"'><img src='"+srcImg+"' /></a>");
						secondChild.html(r[i].nombre);
						
					}							 
												 
												 });
	
	allDivs.animate({opacity: 1}, 1000);
}*/

</script>

<!--<div id="home" class="content">-->
    <ul id="delos" class="btn-categorias" style="display:none;">
    	<li class="destacado delos">
        	<a class="destacados2" href="<?php echo base_url().'index.php/destacados/0'; ?>">DESTACADOS</a>
        </li>
    <?php
		for($i = 0; $i<count($deLos); $i++){
			echo "<li>";
				echo "<a href='javascript:void(0)'>".$deLos[$i]['categoria']."</a>";
				echo "<ul class='btn-subCategorias'>";
					for($s=0; $s<(count($deLos[$i])-1); $s++){
						echo "<li>";
						
							echo "<a href='".base_url()."index.php/categorias/".$deLos[$i][$s]['id_sub']."/0'>".$deLos[$i][$s]['sub']."</a>";
						
						echo "</li>";
					}
				echo "</ul>";
			echo "</li>";
		}
		
	?>
    </ul>
    <ul id="vetas" class="btn-categorias" style="display:none;">
    	<li class="destacado vetas2">
        	<a class="destacados2" href="<?php echo base_url().'index.php/destacados/1'; ?>">DESTACADOS</a>
        </li>
    <?php
		for($i = 0; $i<count($vetas); $i++){
			echo "<li>";
				echo "<a href='javascript:void(0)'>".$vetas[$i]['categoria']."</a>";
				echo "<ul class='btn-subCategorias'>";
					for($s=0; $s<(count($vetas[$i])-1); $s++){
						echo "<li>";
						
							echo "<a href='".base_url()."index.php/categorias/".$vetas[$i][$s]['id_sub']."/1'>".$vetas[$i][$s]['sub']."</a>";
							
						echo "</li>";
					}
				echo "</ul>";
			echo "</li>";
		}
		
	?>
    </ul>
    <div class="color clearfix" style="height:500px;">
    	<div class="logo"></div>
        <?php
			/*var_dump($random);
			echo array_rand($random);*/
			
		?>
        <div class="destacados">
        	
        </div>
        <?php
			//var_dump($random);
		?>
        <div class="cont_art_desc">
        <a href="">
        	<img src="" />
        </a>
        </div>
    </div>
<!--    
    <br style="clear:left" />
    <div id="bottom">
        <div class="logo_bottom">
            <?php
                $brand = $this->uri->segment(2);
                $link = '';
                if($brand == 0){
                    $link = base_url()."index.php/destacados/1";
                }else{
                    $link = base_url()."index.php/destacados/0";
                }
            ?>
            <a href="<?php echo $link; ?>"></a>
        </div>
        <p>
            Pueyrredon 150 &middot; 2000 Rosario &middot; Santa Fe. Argentina &middot; +54 0341 438 66 05
            <i>info@delos-vetas.com.ar</i> &middot; <strong>www.delos-vetas.com.ar</strong>
        </p>
    </div>
</div>
<a href="http://www.imagining4u.com/" target="_blank" id="imagining"></a>-->

</td>
<td style="background-image:url(<?php echo base_url()."images/bg.png";?>); background-repeat:repeat-x;"></td>
</tr>
<tr><td colspan="3">
    <div align="center" id="bottom">
    	<table align="center" width="897px" border="0" cellpadding="0" cellspacing="0" style="width:897px;">
        <tr>
        	<td width="20%" align="right" valign="middle">
            <input type="text" id="botnewslet" value="Para info inserte su mail"/>
            </td>
        	<td width="10%" align="center" valign="middle">
            <div id="botnewsenv" onclick="EnviaMail(document.getElementById('botnewslet').value);" style="cursor:pointer; outline:none;">ENVIAR</div>
            </td>
        	<td width="5%" align="center" valign="middle">
            <div id="botnewssep"></div>
            </td>            
        	<td width="65%" valign="middle">
                <p>
                    Pueyrredon 150 &middot; +54 0341 438 66 05<br />
                    2000 &middot; Rosario &middot; Santa Fe. Argentina 
                </p>
			</td>
            </tr>
        </table>
    </div>
</td></tr>   
</table>

</body>
</html>