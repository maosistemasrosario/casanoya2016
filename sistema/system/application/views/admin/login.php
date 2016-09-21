<div class="ui-helper-clearfix ui-widget-content" id="cont">
    <div class="ui-widget-content ui-corner-all ui-helper-clearfix" id="cont_log">
        <?php
			echo form_open('admin/welcome/login');
		?>
        	Usuario:<br />
			<input type="text" name="usuario" class="ui-state-default ingreso" />
            <br /><br />
            Password:<br />
			<input type="password" name="pass" class="ui-state-default ingreso" />
            <br /><br />
            <?php
				if($error){
					echo $error."<br /><br />"	;
				}
			?>
            <input type="submit" class="ui-state-default" name="entrar" value="ENTRAR" />
        </form>
    
	</div>
</div>