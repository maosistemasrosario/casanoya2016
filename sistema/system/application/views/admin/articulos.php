<script type="text/javascript">
$(function(){
	$("#colorPopUp").bind("click", function(){
		$("#colorOverlay, #colorCont").show("slow");										
	});	 
	$("#colorCerrar").bind("click", function(){
		var check = $('#color_list_popUp li input:checked').next();
		$("#cont_colores").html("");
		check.clone().appendTo("#cont_colores");
		
		$("#colorOverlay, #colorCont").hide();										
	});	 
});

function selectCheck(){
	var check = $('#color_list_popUp li input:checked').next();
	$("#cont_colores").html("");
	check.clone().appendTo("#cont_colores");
}
</script>

<div class="ui-helper-clearfix ui-widget-content" id="cont_articulos">
    <div id="cont_abm">
        <p>CREAR ARTICULO:</p>
        <?php
			echo form_open_multipart('admin/articulos/save');
		?>
        	<?php
				if(isset($query)){
					$art = $query->result();
					echo form_hidden('id', $art[0]->art_id);
			?>	
            	Categorias
                <br /> 
              	<select name="categorias">
                	<?php
						
						foreach($categorias as $row){
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
							echo "<option value='$row->id'>$row->categoria </option>";	
						}
					?>
                </select>
                <br /><br />
                Sub categorias
                <br /> 
              	<select name="subcategorias">
                	<?php
						
						foreach($subcategoriasEdit as $row){
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
							echo "<option value='$row->id_sub'>$row->subcategoria </option>";	
						}
					?>
                </select>
                <br /><br />
				<?php
					if($art[0]->activo){
				?>
                	<label>Activo <input type="checkbox" name="activo" checked="checked" /></label><br />
                <?php
					}else{
				?>
                	<label>Activo <input type="checkbox" name="activo" /></label><br />
                    
                <?php
					}
				?>
                <br /><br />
                <?php
					if($art[0]->destacado){
				?>
                	<label>Producto destacado? <input type="checkbox" name="destacado" checked="checked" /></label><br />
                <?php
					}else{
				?>
                	<label>Producto destacado? <input type="checkbox" name="destacado" /></label><br />
                    
                <?php
					}
				?>
                <br /><br />
				Tipo<br />
				<select name="condicion" style="width:120px">
                	<option value=''></option>
					<?php
						
						foreach($condicion as $row){
							if($art[0]->condicion == $row) {
								echo "<option value='$row' selected='selected'>$row</option>";	
							} else {
								echo "<option value='$row'>$row</option>";
							}
								
						}
					?>
                </select>
                <br /><br />
				Descuento <br />
				<input type="number" min="0" name="porcentaje" value="<?php echo $art[0]->porcentaje ?>" class="ui-state-default" step="any" style="width:50px" /> %
                <br /><br />
            	Codigo <br />
				<input type="text" name="codigo" value="<?php echo $art[0]->codigo ?>" class="ui-state-default" />
                <br /><br />
            	Nombre <br />
				<input type="text" name="nombre" value="<?php echo $art[0]->nombre ?>" class="ui-state-default" />
                <br /><br />
                Marca <br />
				<select name="marca">
                	
                	<?php
						
						foreach($marcas as $row){
							echo "<option value='$row->id'>$row->marca</option>";	
						}
					?>
                </select>
                <br /><br />
                Formato<br />
				<input type="text" name="formato" value="<?php echo $art[0]->formato ?>" class="ui-state-default" />
                <br /><br />
            	Embalaje<br />
				<input type="text" name="embalaje" value="<?php echo $art[0]->embalaje ?>"class="ui-state-default" />
                <br /><br />
            	Precios<br />
                <?php
			foreach($listas as $lista){
				echo "<label>".$lista->nombre."</label>"."<input type='text' name='lista[]' value='".$lista->precio."' class='ui-state-default' /><input type='hidden' name='lista_id[]' value='".$lista->listas_id."'/><br />";
									}
		?>
                <br /><br />
                Descripci&oacute;n<br />
				<textarea class="ui-state-default descripcion" name="description"><?php echo $art[0]->description ?></textarea>
                <br /><br />
                <span id="colorPopUp">Mostrar Colores</span><br />
                <div id="colorOverlay" class="ui-overlay" style="display:none;">
                    <div style="width: 302px; height: 382px; position: absolute; right:50%;margin:0 -150px 0 0;top: 380px;" class="ui-widget-shadow ui-corner-all"></div>
                 </div>
                <div id="colorCont" class="ui-widget ui-widget-content ui-corner-all" style="display:none;position: absolute; width: 280px; height: 359px; right:50%;margin:0 -150px 0 0;top: 380px; padding: 10px;">
                    <div style="background: none repeat scroll 0% 0% transparent; border: 0pt none;" class="ui-dialog-content ui-widget-content">
                        <div class="cont_all_colores">
                        	<ul id="color_list_popUp">
                                <?php
									foreach($colores['colores'] as $k => $color){
										if($k < $colores['cant']){
											echo "<li><label><input type='checkbox' name='color[]' value='".$color->color_id."' checked='checked' />".$color->color."<img src='".base_url().$color->color_img."' /></label></li>";
										}else{
											echo "<li><label><input type='checkbox' name='color[]' value='".$color->color_id."' />".$color->color."<img src='".base_url().$color->color_img."' /></label></li>";
										}
									}
								?>
                               
                            </ul>
                        	
                     
                        </div>
                        <script type="text/javascript">
							$(function(){selectCheck()});
						</script>
                        <div id="colorCerrar" class="cerrar_colores">
                        	Cerrar
                        </div>
                    </div>
				</div>
				<div id="cont_colores">
                	<ul id="color_list">
                	<?php
						/*foreach($colores['colores'] as $k => $color){
							if($k < $colores['cant']){
								echo "<li><label><input type='checkbox' name='color[]' value='".$color->color_id."' checked='checked' /><img src='".base_url().$color->color_img."' /></label></li>";
							}else{
								echo "<li><label><input type='checkbox' name='color[]' value='".$color->color_id."' /><img src='".base_url().$color->color_img."' /></label></li>";
							}
						}*/
					?>
                    </ul>
                </div>
                <br /><br />
                Imagenes<br />
                <ul class="ui-helper-clearfix image_list">
				<?php
					foreach($images->result() as $img){
						echo "<li class='ui-helper-clearfix' id='".$img->img_id."'><img src='".base_url().$img->thumb."' /><div class='ui-state-default ui-corner-all borrar'><a class='ui-icon ui-icon-trash' href='javascript:void(0)' onclick='deleteImg(".$img->img_id.")'></a></div></li>";	
					}
				?>
                </ul>
                <br />
                <input type="file" name="img1" class="ui-state-default" /><br />
                <br />
                Planos<br />
				<?php
					if($art[0]->planos !=''){
						echo "<a href='".base_url().$art[0]->planos."' id='verPlano' target='_blank'>Ver plano</a><br />";
						echo "<a href='javascript:void(0);' id='borrarPlano' onclick='deletePlano(".$art[0]->art_id.")'>Borrar plano</a><br />";
					}
				?>
                <input type="file" name="pdf" class="ui-state-default" />
                
            <?php }else{ ?>
            	Categorias
                <br /> 
              	<select name="categorias">
                	<option value=''></option>
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
							echo "<option value='$row->id'>$row->categoria </option>";	
						}
					?>
                </select>
                <br /><br />
                Sub categorias
                <br /> 
              	<select name="subcategorias">
                	<option value=''></option>
                	<?php
						
						foreach($subcategorias->result() as $row){
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
							echo "<option value='$row->id_sub'>$row->subcategoria </option>";	
						}
					?>
                </select>
                <br /><br />
				<label>Activo <input type="checkbox" name="activo" checked='checked' /></label>
                <br /><br />
                <label>Producto destacado? <input type="checkbox" name="destacado" /></label>
                <br /><br />
				Tipo <br />
				<select name="condicion" style="width:120px">
                	<option value=''></option>
					<?php
						
						foreach($condicion as $row){
							echo "<option value='$row'->$row</option>";	
						}
					?>
                </select>
                <br /><br />
				Descuento <br />
				<input type="number" min="0" name="porcentaje" value="" class="ui-state-default" step="any" style="width:50px" /> %
                <br /><br />
            	Codigo <br />
				<input type="text" name="codigo" class="ui-state-default" />
                <br /><br />
            	Nombre <br />
				<input type="text" name="nombre" class="ui-state-default" />
                <br /><br />
            	Marca <br />
				<select name="marca">
                	<option value=''></option>
                	<?php
						
						foreach($marcas->result() as $row){
							echo "<option value='$row->id'>$row->marca</option>";	
						}
					?>
                </select>
                <br /><br />
            	Formato <br />
				<input type="text" name="formato" class="ui-state-default" />
                <br /><br />
            	Embalaje <br />
				<input type="text" name="embalaje" class="ui-state-default" />
                <br /><br />
                Precios<br />
                <?php
			foreach($listas->result() as $lista){
				echo "<label>".$lista->nombre."</label>"."<input type='text' name='lista[]' class='ui-state-default' /><input type='hidden' name='lista_id[]' value='".$lista->listas_id."'/><br />";
									}
		?>
                <br /><br />
                Descripci&oacute;n<br />
				<textarea class="ui-state-default descripcion" name="description"></textarea>
                <br /><br />
                <span id="colorPopUp">Mostrar Colores</span><br />
                <div id="colorOverlay" class="ui-overlay" style="display:none;">
                    <div style="width: 302px; height: 382px; position: absolute;right:50%;margin:0 48px 0 0;top: 380px;" class="ui-widget-shadow ui-corner-all"></div>
                 </div>
                <div id="colorCont" class="ui-widget ui-widget-content ui-corner-all" style="display:none;position: absolute; width: 280px; height: 359px;right:50%;margin:0 56px 0 0;top: 388px; padding: 10px;">
                    <div style="background: none repeat scroll 0% 0% transparent; border: 0pt none;" class="ui-dialog-content ui-widget-content">
                        <div class="cont_all_colores">
                        	<ul id="color_list_popUp">
                            	<!--<li><label><input type='checkbox' name='color[]' value='cedro' />Cedro <img src='<?php //echo base_url() ?>images/colores/Cedro1.jpg' /></label></li>-->
                                <?php
									foreach($colores->result() as $color){
										echo "<li><label><input type='checkbox' name='color[]' value='".$color->color_id."' />".$color->color."<img src='".base_url().$color->color_img."' /></label></li>";
									}
								?>
                               
                            </ul>
                        	
                     
                        </div>
                        <div id="colorCerrar" class="cerrar_colores">
                        	Cerrar
                        </div>
                    </div>
				</div>
				<div id="cont_colores">
                	<ul id="color_list">
                	<?php
						/*foreach($colores->result() as $color){
							echo "<li><label><input type='checkbox' name='color[]' value='".$color->color_id."' /><img src='".base_url().$color->color_img."' /></label></li>";
						}*/
					?>
                    </ul>
                </div>
                <br /><br />
                Fotos<br />
				1- <input type="file" name="img1" class="ui-state-default" /><br />
                2- <input type="file" name="img2" class="ui-state-default" /><br />
                3- <input type="file" name="img3" class="ui-state-default" /><br />
                4- <input type="file" name="img4" class="ui-state-default" />
                <br /><br />
                Planos<br />
				<input type="file" name="pdf" class="ui-state-default" />
            <?php } ?>
            	
                <br /><br />
                <input type="submit" class="ui-state-default" value="Guardar" />	
           <!-- <button class="ui-state-default" value="Guardar">Guardar</button>-->
        </form>
    </div>
    <div id="cont_lista">
    	<div class="titulo">
            <p>LISTA DE SUBCATEGORIAS</p>
        </div>
        <select name="marcas_lista" id="marcas" style="width:150px;" onchange="listas_subcat(this.value)">
			<option value=""></option>
			<?php
                foreach($subcategorias->result() as $row){
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
					if (isset($subcategoria)) {
						if ($row->id_sub==$subcategoria) {
							echo "<option value='$row->id_sub' selected='selected'>$row->subcategoria </option>";	
						} else {
							echo "<option value='$row->id_sub'>$row->subcategoria </option>";	
						}
					} else {
						echo "<option value='$row->id_sub'>$row->subcategoria </option>";	
					}
					
				}
            ?>
        </select>
        <div id="resp">
        
        </div>
        <!--<ul class="lista">-->
            <!--<li class="ui-helper-clearfix"><div class="cont_item">hola</div><div class="ui-state-default ui-corner-all editar"><a class="ui-icon ui-icon-trash" href="?mod=borrar&id=2"></a></div><div class="ui-state-default ui-corner-all editar"><a class="ui-icon ui-icon-pencil" href="?mod=edit&id=2"></a></div></li>-->
        <!--</ul>-->
        <table class="lista">
        </table>
        <div class="button-bottom"></div>
        <script type="text/javascript">
        	$(document).ready(function() {
        		listas_subcat($("#marcas").val());
        	})
        </script>
    </div>
</div>
</body>
</html>