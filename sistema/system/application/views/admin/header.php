<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title ?></title>
<?php
echo link_tag('css/redmond/jquery-ui-1.8.1.custom.css');
echo link_tag('css/index.css');
echo link_tag('css/login.css');
?>
<script type="text/javascript">
//<![CDATA[
base_url = '<?= base_url();?>index.php/';
//]]>
</script>
<script src="<?php echo base_url() ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/js/listas.js?date=20161129&v=2"></script>
<script type="text/javascript">
$(function(){
	$('ul#btn li, #salir').hover(
		function() { $(this).addClass('ui-state-hover'); }, 
		function() { $(this).removeClass('ui-state-hover'); }
	);		   
});
</script>
<body>
<div class="ui-widget-header ui-corner-all" id="header">
PANEL DE CONTROL
</div>