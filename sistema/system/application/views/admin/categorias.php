<div class="ui-helper-clearfix ui-widget-content" id="cont">
    <div id="cont_abm">
        <p>CREAR CATEGORIA:</p>
        <?php
			echo form_open('admin/categorias/save');
		?>
        	<?php
				if(isset($id) && $id != 0){
					echo form_hidden('id', $id);
			?>	
           		<input type="text" name="categoria" value="<?php echo $value['categoria'] ?>" class="ui-state-default" />
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
            	<input type="text" name="categoria" class="ui-state-default" />
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
            <p>LISTA DE CATEGORIA</p>
        </div>
        <ul class="lista">
            <!--<li class="ui-helper-clearfix"><div class="cont_item">hola</div><div class="ui-state-default ui-corner-all editar"><a class="ui-icon ui-icon-trash" href="?mod=borrar&id=2"></a></div><div class="ui-state-default ui-corner-all editar"><a class="ui-icon ui-icon-pencil" href="?mod=edit&id=2"></a></div></li>-->
          <?php
		  	if(isset($query)){
				foreach($query->result() as $row){
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
					echo "<li class=\"ui-helper-clearfix\"><div class=\"cont_item\">".htmlentities($row->categoria)."</div><div class=\"ui-state-default ui-corner-all editar\"><a class=\"ui-icon ui-icon-trash\" onclick='return confirmar()' href=\"".base_url()."index.php/admin/categorias/delete/".$row->id."\"></a></div><div class=\"ui-state-default ui-corner-all editar\"><a class=\"ui-icon ui-icon-pencil\" href=\"".base_url()."index.php/admin/categorias/edit/".$row->id."\"></a></div></li>";
				}
			}
		  ?>
        </ul>
    </div>
</div>
</body>
</html>