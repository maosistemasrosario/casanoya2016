<div class="ui-helper-clearfix ui-widget-content" id="cont">
    <div id="cont_abm">
        <p>CREAR SUBCATEGORIA:</p>
        <?php
			echo form_open('admin/subcategorias/save');
		?>
        	<?php
				if(isset($id) && $id != 0){
					echo form_hidden('id', $id);
			?>	
            	Categoria
                <br /> 
              	<select name="categoria">
                	<?php
						foreach($categoriasEdit as $row){
							$mar = "";
							/*
							if((int)$row->vetas == 1 && (int)$row->delos == 0){
								$mar = "vetas";	
							}else if((int)$row->delos == 1 && (int)$row->vetas == 0){
								$mar = "deLos";	
							}else if((int)$row->delos == 1 && (int)$row->vetas == 1){
								$mar = "deLos - vetas";	
							}
							*/
							//echo "<option value='$row->id'>$row->categoria ($mar)</option>";	
							echo "<option value='$row->id'>$row->categoria</option>";	
						}
					?>
                </select>
                <br /><br />
            	Sub-categoria <br />
           		<input type="text" name="subcategoria" value="<?php echo $value['subcategoria'] ?>" class="ui-state-default" />
                <br />
                <br />
            <?php
                if($value["activo"]){
            ?>
                <label>Activo <input type="checkbox" name="activo" checked="checked" /></label><br />
            <?php
                }else{
            ?>
                <label>Activo <input type="checkbox" name="activo" /></label><br />
                    
            <?php
                }
            ?>
                
            <?php }else{ ?>
            	Categoria
                <br />
              	<select name="categoria">
                	<?php
						
						foreach($categorias->result() as $row){
							$mar = "";
							/*
							if((int)$row->vetas == 1 && (int)$row->delos == 0){
								$mar = "vetas";	
							}else if((int)$row->delos == 1 && (int)$row->vetas == 0){
								$mar = "deLos";	
							}else if((int)$row->delos == 1 && (int)$row->vetas == 1){
								$mar = "deLos - vetas";	
							}
							*/
							echo "<option value='$row->id'>$row->categoria</option>";	
						}
					?>
                </select>
                <br /><br />
            	Sub-categoria <br />
				<input type="text" name="subcategoria" class="ui-state-default" />
                <br />
                <br />
                <label>Activo <input type="checkbox" name="activo" checked="checked" /></label><br />
                
            <?php } ?>
            <br /><br />
            <input type="submit" class="ui-state-default" value="Guardar" />	
           <!-- <button class="ui-state-default" value="Guardar">Guardar</button>-->
        </form>
    </div>
    <div id="cont_lista">
    	<div class="titulo">
            <p>LISTA DE SUBCATEGORIA</p>
        </div>
        <select name="categoria_lista" id="categorias" style="width:150px;" onchange="listas_categorias(this.value)">
			<option value=""></option>
			<?php
                foreach($categorias->result() as $row){
                    echo "<option value='$row->id'>$row->categoria</option>";	
                }
            ?>
        </select>
        
        <div id="resp">
        
        </div>
        <ul class="lista">
            <!--<li class="ui-helper-clearfix"><div class="cont_item">hola</div><div class="ui-state-default ui-corner-all editar"><a class="ui-icon ui-icon-trash" href="?mod=borrar&id=2"></a></div><div class="ui-state-default ui-corner-all editar"><a class="ui-icon ui-icon-pencil" href="?mod=edit&id=2"></a></div></li>-->
        </ul>
    </div>
</div>
</body>
</html>