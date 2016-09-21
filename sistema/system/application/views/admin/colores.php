<div class="ui-helper-clearfix ui-widget-content" id="cont">
    <div id="cont_abm">
        <p>CREAR COLOR:</p>
        <?php
			echo form_open_multipart('admin/colores/save');
		?>
        	<?php
				if(isset($id) && $id != 0){
					echo form_hidden('id', $id);
			?>	
            	<!--Marca
                <br /> 
              	<select name="marca">
                	<?php
						/*foreach($marcasEdit as $row){
							echo "<option value='$row->id'>$row->marca</option>";	
						}*/
					?>
                </select>
                <br /><br />-->
            	Color<br />
           		<input type="text" name="color" value="<?php echo $value['color'] ?>" class="ui-state-default" />
                <br /><br />
                <img src="<?php echo base_url().$value['color_img'] ?>" />
            <?php }else{ ?>
            	<!--Marca
                <br /> 
              	<select name="marca">
                	<?php
						
						/*foreach($marcas->result() as $row){
							echo "<option value='$row->id'>$row->marca</option>";	
						}*/
					?>
                </select>
                <br /><br />-->
            	Color <br />
				<input type="text" name="color" class="ui-state-default" />
                
            <?php } ?>
            	<br /><br />
                Imagen<br />
            	<input type="file" name="color-img" class="ui-state-default" />
                <br /><br />
                <input type="submit" class="ui-state-default" value="Guardar" />	
           <!-- <button class="ui-state-default" value="Guardar">Guardar</button>-->
        </form>
    </div>
    <div id="cont_lista">
    	<div class="titulo">
            <p>LISTA DE COLORES</p>
        </div>
        <!--<select name="marcas_lista" id="marcas" style="width:150px;" onchange="listas_marcas(this.value)">
			<option value=""></option>
			<?php
                /*foreach($marcas->result() as $row){
                    echo "<option value='$row->id'>$row->marca</option>";	
                }*/
            ?>
        </select>-->
        <div id="resp">
        
        </div>
        <ul class="lista">
            <?php
				foreach($colores->result() as $color){
					echo "<li class='ui-helper-clearfix'><div class='cont_item'>".$color->color."</div><div class='ui-state-default ui-corner-all editar'><a class='ui-icon ui-icon-trash' onclick='return confirmar()' href='".base_url()."index.php/admin/colores/delete/".$color->color_id."'></a></div><div class='ui-state-default ui-corner-all editar'><a class='ui-icon ui-icon-pencil' href='".base_url()."index.php/admin/colores/edit/".$color->color_id."'></a></div></li>";
				}
			?>
        </ul>
    </div>
</div>
</body>
</html>