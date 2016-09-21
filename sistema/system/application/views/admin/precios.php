<script type="text/javascript">
	var alreadyValue;
	var newValue;

function getValue(ele){
	var ele = $(ele);
	alreadyValue = ele.attr("value");
}

function setValue(ele){
	var ele = $(ele);
	newValue = ele.attr("value");
	if(newValue != alreadyValue){
		var art_id = ele.attr("name");
		$.getJSON(base_url+"admin/application/precios/"+art_id+"/"+newValue, function(d){
																					//alert(typeof(d));  
																		 	if(d == true){
																				ele.css({'background':'green','color':'white'});	
																			}else{
																				ele.css({'background':'red','color':'white'});
																			}
																		 });
	}
}
	
</script>
<div class="ui-helper-clearfix ui-widget-content cont_precio" id="cont">
    <div id="cont_abm">
    	<p>PRECIOS:</p>
        <?php
			$secBrand = $this->uri->segment(4);
			$selected = "ui-tabs-selected ui-state-active";
			$delos = '';
			$vetas = '';
			if($secBrand == 0){
				$delos = $selected;
			}else if($secBrand == 1){
				$vetas = $selected;
			}
		?>
        <a href="<?php echo base_url() ?>index.php/admin/precios/index/0" class="ui-state-default ui-corner-all <?php echo $delos; ?> preciosDelos">deLos</a>
        <a href="<?php echo base_url() ?>index.php/admin/precios/index/1" class="ui-state-default ui-corner-all <?php echo $vetas; ?> preciosDelos">Vetas</a>
        <table cellpadding="0" class="precios" cellspacing="0" border="0">
        <?php
            for($i=0; $i<count($all); $i++){
                echo "<tr>";
                    echo "<td colspan=3 class='subcat'>".$all[$i]['title_sub']."</td>";
                echo "</tr>";
                for($e=0; $e<count($all[$i][0]); $e++){
                    echo "<tr>";
                        echo "<td class='marcas' colspan=3>".$all[$i][0][$e]['title']."</td>";
                    echo "</tr>";	
                    //echo $all[$i][0][$e]['title']."<br>";					
                    for($u = 0; $u < count($all[$i][0][$e])-2; $u++){
                        echo "<tr>";
                            echo "<td>".$all[$i][0][$e][$u]['codigo']."</td><td>".$all[$i][0][$e][$u]['nombre']."</td><td><input type='text' name='".$all[$i][0][$e][$u]['art_id']."' class='field_precio' onfocus='getValue(this)' onblur='setValue(this)' value='".$all[$i][0][$e][$u]['precio']."' /></td>";		
                        echo "</tr>";
                    }
                }
            }
        ?>
        </table>
    </div>
    <div id="cont_lista">
    </div>
</div>
</body>
</html>