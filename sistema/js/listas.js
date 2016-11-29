$(function(){
		   
	
});

function confirmar(){
	if(confirm("Esta seguro que desea eliminarlo?")){
		return true;
	}else{
		return false;	
	}
}

function listas_categorias(id){
	if(id != ""){
		var deLos = false;
		var vetas = false;
		
		$('#resp').ajaxStart(function() {
		  $("ul.lista").html("");
		  $(this).html("<br /><br />"+'Cargando lista...');
		});
		if($("#deLos").attr("checked") == true){
			deLos = true;	
		}
		if($("#vetas").attr("checked") == true){
			vetas = true;	
		}		
		
		$.getJSON(base_url+"admin/application/show/"+id+"/"+deLos+"/"+vetas, cargar_lista);
		$('#resp').ajaxStop(function() {
		  $(this).html('');
		});
	}
}

function cargar_lista(data){
	var lista = $("ul.lista");
	//lista.html("");
	for(var i = 0; i<data.length; i++){
		$("<li class='ui-helper-clearfix'><div class='cont_item'>"+data[i].subcategoria+"</div><div class='ui-state-default ui-corner-all editar'><a class='ui-icon ui-icon-trash' href='"+base_url+"admin/subcategorias/delete/"+data[i].id+"' onclick='return confirmar()'></a></div><div class='ui-state-default ui-corner-all editar'><a class='ui-icon ui-icon-pencil' href='"+base_url+"admin/subcategorias/edit/"+data[i].id+"'></a></div></li>").appendTo(lista);	
	}
}

var valores = {
	deLos:1,
	vetas:1,
	peticion:function(){
		var lista = $("#categorias");
		lista.ajaxStart(function(){
							$(this).attr('disabled','disabled');
								 });
		//$.getJSON(base_url+"admin/application/showCombo/", {'deLos':valores.deLos, 'vetas':valores.vetas}, cargar_combo);
		$.getJSON(base_url+"admin/application/showCombo/"+valores.deLos+"/"+valores.vetas, cargar_combo);
		lista.ajaxStop(function(){
							$(this).removeAttr('disabled');
								 });
	}
}

function cambiar_lista(l){
	var choose = l.id;
	var deLos = $("#deLos").attr("value");
	var vetas = $("#vetas").attr("value");
	
	if(choose == 'deLos' && valores.deLos == 1){
		valores.deLos = 0;
	}else if(choose == 'deLos' && valores.deLos == 0){
		valores.deLos = 1;
	}else if(choose == 'vetas' && valores.vetas == 1){
		valores.vetas = 0;
	}else if(choose == 'vetas' && valores.vetas == 0){
		valores.vetas = 1;
	}
	
	valores.peticion();
	
}

function cargar_combo(data){
	var lista = $("#categorias");
	lista.html("");
	$("<option value=''></option>").appendTo(lista);
	for(var i=0; i<data.length; i++){
		$("<option value='"+data[i].id+"'>"+data[i].categoria+"</option>").appendTo(lista);
	}
	
}

function listas_marcas(id){
	if(id != ""){		
		$('#resp').ajaxStart(function() {
		  $("ul.lista").html("");
		  $(this).html("<br /><br />"+'Cargando lista...');
		});		
		
		$.getJSON(base_url+"admin/application/show_marcas/"+id, cargar_lista_marcas);
		$('#resp').ajaxStop(function() {
		  $(this).html('');
		});
	}
}

function cargar_lista_marcas(data){
	var lista = $("ul.lista");
	//lista.html("");
	for(var i = 0; i<data.length; i++){
		$("<li class='ui-helper-clearfix'><div class='cont_item'>"+data[i].color+"</div><div class='ui-state-default ui-corner-all editar'><a class='ui-icon ui-icon-trash' href='"+base_url+"admin/colores/delete/"+data[i].id+"' onclick='return confirmar()'></a></div><div class='ui-state-default ui-corner-all editar'><a class='ui-icon ui-icon-pencil' href='"+base_url+"admin/colores/edit/"+data[i].id+"'></a></div></li>").appendTo(lista);	
	}
}

function listas_subcat(id){
	if(id != ""){		
		//$("#resp").ajaxStart(function() {
		  $("ul.lista").html("");
		  $("#resp").html("<br /><br />"+'Cargando lista...');
		//});		
		
		$.getJSON(base_url+"admin/application/show_subcat/"+id, cargar_lista_subcat);
		$('#resp').ajaxStop(function() {
		  $(this).html('');
		});
	}
}

/*function cargar_lista_subcat(data){
	var lista = $("ul.lista");
	//lista.html("");
	for(var i = 0; i<data.length; i++){
		$("<li class='ui-helper-clearfix'><div class='cont_item'>"+data[i].nombre+"</div><div class='ui-state-default ui-corner-all editar'><a class='ui-icon ui-icon-trash' href='"+base_url+"admin/articulos/delete/"+data[i].id+"' onclick='return confirmar()'></a></div><div class='ui-state-default ui-corner-all editar'><a class='ui-icon ui-icon-pencil' href='"+base_url+"admin/articulos/edit/"+data[i].id+"'></a></div></li>").appendTo(lista);	
	}
	$("#resp").html('');
}*/

function cargar_lista_subcat(data){
	var lista = $("table.lista");
	lista.html("");
	$('<tr><th>SEL.</th><th>MARCA</th><th>NOMBRE</th><th>CÓDIGO</th><th>PRECIO</th></tr>').appendTo(lista);
	for(var i = 0; i<data.length; i++){
		$("<tr><td><input type='checkbox' value='"+data[i].id+"' name='selected'></td><td>"+data[i].marca+"</td><td>"+data[i].nombre+"</td><td>"+data[i].codigo+"</td><td class='precio'>"+data[i].precio+"</td><td><div class='ui-state-default ui-corner-all editar'><a class='ui-icon ui-icon-trash' href='"+base_url+"admin/articulos/delete/"+data[i].id+"' onclick='return confirmar()'></a></div><div class='ui-state-default ui-corner-all editar'><a class='ui-icon ui-icon-pencil' href='"+base_url+"admin/articulos/edit/"+data[i].id+"'></a></div></td></tr>").appendTo(lista);	
	}
	$("#resp").html('');
	//$(".button-bottom").html("<input type='button' class='ui-state-default' onclick='borrarSel();' value='Borrar Sel.' />");
}

function borrarSel() {
	var lista = $("table.lista");
	var ids = "";
	lista.find("tr").each(function() {
		var check = $(this).find("input")[0];
		if (check) {if(check.checked) {if (ids!="") {ids+="-"};ids+=check.value}}}
	);
	alert(ids);
	$.getJSON(base_url+"admin/application/delete_articulos/"+ids);
		$('#resp').ajaxStop(function() {
		});
	//
}

function deleteImg(id){
	$.getJSON(base_url+"admin/application/deleteImg/"+id, responsFromDelete);
}

function responsFromDelete(data){
	var img = data.split("/");
	if(img[0] == "true"){
		$("li#"+img[1]).remove();
		
	}else{
		
	}
}

function deletePlano(id){
	$.getJSON(base_url+"admin/application/deletePlano/"+id, responsFromDeletePlano);
}

function responsFromDeletePlano(data){
	if(data == true){
		$("#verPlano").remove();
		$("#borrarPlano").remove();
	}else{
		
	}
}