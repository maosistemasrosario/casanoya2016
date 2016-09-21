<div class="ui-helper-clearfix ui-widget-content" id="cont_articulos">
    <div id="cont_abm">
        <p>CREAR OFERTA:</p>
        <?php
			echo form_open_multipart('admin/ofertas/save');
		?>
        	<?php
				if(isset($id) && $id != 0){
					//$ofe = $query->result();
					echo form_hidden('id', $id);
			?>	
            	Codigo <br />
				<input type="text" name="codigo" value="<?php echo $value['codigo'] ?>" class="ui-state-default" />
                <br /><br />
            	Nombre <br />
				<input type="text" name="nombre" value="<?php echo $value['nombre'] ?>" class="ui-state-default" />
                <br /><br />
                Descripci&oacute;n<br />
				<textarea class="ui-state-default descripcion" name="description"><?php echo $value['descripcion'] ?></textarea>
                <br /><br />
				<?php
					if($value['activa']){
				?>
                	<label>Activa <input type="checkbox" name="activa" checked="checked" /></label><br />
                <?php
					}else{
				?>
                	<label>Activa <input type="checkbox" name="activa" /></label><br />
                <?php
					}
				?>
                Imagen<br />
                <ul class="ui-helper-clearfix image_list">
				<?php
						echo "<li class='ui-helper-clearfix' id='".$id."'><img src='".base_url().$value['img']."' /><div class='ui-state-default ui-corner-all borrar'><a class='ui-icon ui-icon-trash' href='javascript:void(0)' onclick='deleteImg(".$id.")'></a></div></li>";	
				?>
                </ul>
                <br />
                <input type="file" name="img1" class="ui-state-default" /><br />
                <br />
                
            <?php }else{ ?>
            	Codigo <br />
				<input type="text" name="codigo" class="ui-state-default" />
                <br /><br />
            	Nombre <br />
				<input type="text" name="nombre" class="ui-state-default" />
                <br /><br />
            	Descripci&oacute;n<br />
				<textarea class="ui-state-default descripcion" name="description"></textarea>
                <br /><br />
				<label>Activa <input type="checkbox" name="activa" /></label><br /><br />
                Imagen<br />
				<input type="file" name="img1" class="ui-state-default" /><br />
                <br /><br />
            <?php } ?>
            	
                <br /><br />
                <input type="submit" class="ui-state-default" value="Guardar" />	
           <!-- <button class="ui-state-default" value="Guardar">Guardar</button>-->
        </form>
    </div>
    <div id="cont_lista">
    	<div class="titulo">
            <p>LISTA DE OFERTAS</p>
        </div>
        <ul class="lista">
            <!--<li class="ui-helper-clearfix"><div class="cont_item">hola</div><div class="ui-state-default ui-corner-all editar"><a class="ui-icon ui-icon-trash" href="?mod=borrar&id=2"></a></div><div class="ui-state-default ui-corner-all editar"><a class="ui-icon ui-icon-pencil" href="?mod=edit&id=2"></a></div></li>-->
          <?php
		  	if(isset($query)){
				foreach($query->result() as $row){
					echo "<li class=\"ui-helper-clearfix\"><div class=\"cont_item\">".htmlentities($row->nombre)."</div><div class=\"ui-state-default ui-corner-all editar\"><a class=\"ui-icon ui-icon-trash\" onclick='return confirmar()' href=\"".base_url()."index.php/admin/ofertas/delete/".$row->ofertas_id."\"></a></div><div class=\"ui-state-default ui-corner-all editar\"><a class=\"ui-icon ui-icon-pencil\" href=\"".base_url()."index.php/admin/ofertas/edit/".$row->ofertas_id."\"></a></div></li>";
				}
			}
		  ?>
        </ul>
    </div>
</div>
</body>
</html>