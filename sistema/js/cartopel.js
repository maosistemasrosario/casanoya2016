$(function(){
	//$("li.productos ul").css({display: "none"}); // Opera Fix
	
	$("li.categoria").hover(function(){
			//$(this).addClass("selected");
			$(this).find('ul:first').css({visibility: "visible"}).show();					 
		},function(){
			//$(this).removeClass("selected");
			$(this).find('ul:first').css({visibility: "hidden"});
		});
	
	//$("ul.btn-categorias li ul").css({display: "none"}); // Opera Fix
	if (navigator.appName.indexOf("Explorer") > -1 && navigator.appVersion.indexOf("MSIE 8") > -1) {
		$("#the-pel").css({visibility : "visible"});
		$("nav").css({background : "none"});
	}
	if ($(window).height() < 720) {
		//$("article").css({'margin-top' : '5%'});
	}
});

function mostrarProductos() {
	if ($("#menu_productos").css("visibility")=="hidden") {
		$("aside").css({"z-index":10});
		$("#menu_productos").css({visibility: "visible"}).show();
	} else {
		$("aside").css({"z-index":-1});
		$("#menu_productos").css({visibility: "hidden"}).hide();
	}
}



