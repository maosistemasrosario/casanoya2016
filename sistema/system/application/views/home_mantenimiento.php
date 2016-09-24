<body>
	<script type="text/javascript">
		$(function(){
			//$(".color").css('opacity', 0.8);	
			$(".rslides").responsiveSlides({
				speed: 1000,
				timeout: 5000,
				prevText: "<<",   // String: Text for the "previous" button
				nextText: ">>",
			});
			
		});
	</script>
	<div class="container-fluid">
	<header>
		<div id="header-container">
			<img id="logo" src="<?php echo base_url() ?>/images/logo.png"></img>
			
		</div>
		
		
	</header>
	<div id="ofertas">
		<ul class="rslides">
		<?php
			echo '<li><img src="'.base_url().'/images/mantenimiento.gif'.'" style=""></img></li>';
		?>
		</div>
		</ul>
	</div>
	
	</div>
	<script type="text/javascript">
		var bottomFooter = $("footer").position().top + $("footer").height();
		var windowHeight = window.innerHeight;
		var diff = windowHeight - bottomFooter;
		if (diff>0) {
			//$("footer").css("position","absolute");
		}
	</script>
</body>