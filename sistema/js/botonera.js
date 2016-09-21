$(function(){
	$("li.productos ul").css({display: "none"}); // Opera Fix
	
	$("li.productos, ul.sub-btn").hover(function(){
			$(this).addClass("selected");
			$(this).find('ul:first').css({visibility: "visible"}).show();					 
		},function(){
			$(this).removeClass("selected");
			$(this).find('ul:first').css({visibility: "hidden"});
		});
	
	$("ul.btn-categorias li ul").css({display: "none"}); // Opera Fix
	
	$("ul.btn-categorias li").hover(function(){
			$(this).addClass("selected");
			$(this).find('ul:first').css({visibility: "visible"}).show();					 
		},function(){
			$(this).removeClass("selected");
			$(this).find('ul:first').css({visibility: "hidden"});
		});
});

function showBtn(btn){
	delosStatus = $("#delos").css("display");	
	vetasStatus = $("#vetas").css("display");
	
	if(btn == 'delos'){
		$("#vetas").hide();
		$("#delos").fadeIn('slow');
		
	}else if(btn == 'vetas'){
		$("#delos").hide();
		$("#vetas").fadeIn('slow');
		
	}
}