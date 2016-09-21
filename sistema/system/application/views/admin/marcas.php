<script type="text/javascript">
function restrict(ele){
	var ele = $(ele);
	if(ele.next('span').css('display') == 'none'){	
		ele.next('span').show();
	}else{
		ele.next('span').hide();	
		var marca_id = $("#id_marca").attr('value');
		var subcat_id = ele.attr('value');
		$.getJSON(base_url+"admin/application/deleteRestrict/"+subcat_id+"/"+marca_id, function(){});
	}
}

function saveRestrict(ele){
	var ele = jQuery(ele);
	var marca_id = $("#id_marca").attr('value');
	var subcat_id = ele.parent().prev('input').attr('value');
	var radioButton = ele.parent().find('input:checked').attr('value');
	var brand;
	if(radioButton == 'deLos'){
		brand = false;	
	}else if(radioButton == 'vetas'){
		brand = true;	
	}
	
	$.getJSON(base_url+"admin/application/saveRestrict/"+subcat_id+"/"+marca_id+"/"+brand, function(d){
																									if(d == "save"){
																										ele.hide();
																									}
																									});
}

function showSave(ele){
	var ele = $(ele);
	var a_ele;
	if(ele.attr('value') == 'deLos'){
		a_ele = ele.parent().next().next();		
	}else if(ele.attr('value') == 'vetas'){
		a_ele = ele.parent().next('a');	
	}
	
	if(a_ele.css('display') == 'none'){
		a_ele.show();	
	}
}

</script>
<div class="ui-helper-clearfix ui-widget-content marcas_seccion" id="cont">
    <div id="cont_abm">
        <p>CREAR MARCA:</p>
        <?php
			echo form_open_multipart('admin/marcas/save');
		?>
        	<?php
				if(isset($id) && $id != 0){
					//echo form_hidden('id', $id);
					echo "<input type='hidden' name='id' id='id_marca' value='$id' />";
			?>	
           		<input type="text" name="marca" value="<?php echo $value['marca'] ?>" class="ui-state-default" />
                <br />
                <br /><br />
                <?php
					if($value['logo'] != ''){
						echo "<img src='".base_url().$value['logo']."' /><br /><br />";	
					}
				?>
                <input type="file" name="logo" />
                <br /><br />
                 <ul class="subcategorias">
                <?php 
					/*foreach($subcat->result() as $k => $sub){
						echo "<li><input type='checkbox' name='subcategorias[]' value='$sub->id_sub' onclick='restrict(this)' />".$sub->subcategoria."&nbsp;&nbsp;|&nbsp;&nbsp;";
							echo "<span style='display:none;'><label><input type='radio' name='marca_$k' value='deLos' checked='checked' /> deLos</label> <label><input type='radio' name='marca_$k' value='vetas' /> vetas</label> <a href='javascript:void(0)' onclick='saveRestrict(this)'>Guardar</a></span>";
						echo "</li>";
					}*/			
					echo $subcat;
				?>
                </ul>
            <?php }else{ ?>
            	<input type="text" name="marca" class="ui-state-default" />
                <br />
                <br /><br />
                <input type="file" name="logo" />
            <?php } ?>
            <br /><br />
            <input type="submit" class="ui-state-default" value="Guardar" />	
           <!-- <button class="ui-state-default" value="Guardar">Guardar</button>-->
        </form>
    </div>
    <div id="cont_lista">
    	<div class="titulo">
            <p>LISTA DE MARCAS</p>
        </div>
        <ul class="lista">
            <!--<li class="ui-helper-clearfix"><div class="cont_item">hola</div><div class="ui-state-default ui-corner-all editar"><a class="ui-icon ui-icon-trash" href="?mod=borrar&id=2"></a></div><div class="ui-state-default ui-corner-all editar"><a class="ui-icon ui-icon-pencil" href="?mod=edit&id=2"></a></div></li>-->
          <?php
		  	if(isset($query)){
				foreach($query->result() as $row){
					echo "<li class=\"ui-helper-clearfix\"><div class=\"cont_item\">".htmlentities($row->marca)."</div><div class=\"ui-state-default ui-corner-all editar\"><a class=\"ui-icon ui-icon-trash\" onclick='return confirmar()' href=\"".base_url()."index.php/admin/marcas/delete/".$row->id."\"></a></div><div class=\"ui-state-default ui-corner-all editar\"><a class=\"ui-icon ui-icon-pencil\" href=\"".base_url()."index.php/admin/marcas/edit/".$row->id."\"></a></div></li>";
				}
			}
		  ?>
        </ul>
    </div>
</div>
</body>
</html>