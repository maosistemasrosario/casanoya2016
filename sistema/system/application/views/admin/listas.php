<div class="ui-helper-clearfix ui-widget-content" id="cont">
    <div id="cont_abm">
        <p>CREAR LISTAS:</p>
        <?php
			echo form_open('admin/listas/save');
		?>
			<?php
				if(isset($id) && $id != 0){
					echo form_hidden('id', $id);
			?>
				<input type="text" name="nombre"  class="ui-state-default" value="<?php echo $value['nombre'] ?>" /><br/>
				<?php
					if($value['isDefault']){
				?>
                	<label>Lista Default? <input type="checkbox" name="isDefault" checked="checked" /></label><br />
                <?php
					}else{
				?>
                	<label>Lista Default? <input type="checkbox" name="isDefault" /></label><br />
                <?php
					}
				?>
			<?php }else{ ?>
				<input type="text" name="nombre"  class="ui-state-default" /><br/>
				<label>Lista Default? <input type="checkbox" name="isDefault" /></label><br />
			<?php } ?>
       		<br /><br />
            <input type="submit" class="ui-state-default" value="Guardar" />	
           <!-- <button class="ui-state-default" value="Guardar">Guardar</button>-->
        </form>
    </div>
    <div id="cont_lista" class="listas">
    	<div class="titulo">
            <p>LISTAS</p>
        </div>
        <ul class="lista">
            <!--<li class="ui-helper-clearfix"><div class="cont_item">hola</div><div class="ui-state-default ui-corner-all editar"><a class="ui-icon ui-icon-trash" href="?mod=borrar&id=2"></a></div><div class="ui-state-default ui-corner-all editar"><a class="ui-icon ui-icon-pencil" href="?mod=edit&id=2"></a></div></li>-->
          <?php
		  	if(isset($query)){
				foreach($query->result() as $row){
					$mar = $row->nombre;
					/*
					if($row->brand == 0){
						$mar = "deLos";	
					}else if($row->brand == 1){
						$mar = "vetas";	
					}*/
					echo "<li class=\"ui-helper-clearfix\"><div class=\"cont_item\"><a href=\"".base_url()."index.php/listaPrecios/cargarLista/".htmlentities($row->token)."\" target=\"_blank\">".base_url()."index.php/listaPrecios/cargarLista/".htmlentities($row->token)." (".$mar.")</a></div><div class=\"ui-state-default ui-corner-all editar\"><a class=\"ui-icon ui-icon-trash\" onclick='return confirmar()' href=\"".base_url()."index.php/admin/listas/delete/".$row->listas_id."\"></a></div><div class=\"ui-state-default ui-corner-all editar\"><a class=\"ui-icon ui-icon-pencil\" href=\"".base_url()."index.php/admin/listas/edit/".$row->listas_id."\"></a></div></li>";
				}
			}
		  ?>
        </ul>
    </div>
</div>
</body>
</html>