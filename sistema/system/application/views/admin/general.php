<div class="ui-helper-clearfix ui-widget-content" id="cont">
    <div id="cont_abm">
        <p>GENERAL:</p>
        <?php
			echo form_open('admin/general/save');
		?>
        	<?php
				if(isset($id) && $id != 0){
					echo form_hidden('id', $id);
			?>
            <?php
                if($value["inactivo"]){
            ?>
                <label>Desactivar el Sitio <input type="checkbox" name="inactivo" checked="checked" /></label><br />
            <?php
                }else{
            ?>
                <label>Desactivar el Sitio <input type="checkbox" name="inactivo" /></label><br />
                    
            <?php
                }
            ?>
                
            <?php }else{ ?>
                <label>Desactivar el Sitio <input type="checkbox" name="inactivo" checked="checked" /></label><br />
            <?php } ?>
            <br /><br />
            <input type="submit" class="ui-state-default" value="Guardar" />	
           <!-- <button class="ui-state-default" value="Guardar">Guardar</button>-->
        </form>
    </div>
</div>
</body>
</html>