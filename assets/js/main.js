$(document).ready(function(){
	//Estados y municipios
	
// Obtener estados
/*$.ajax({
	type: "POST",
	url: "procesar-estados.php",
	data: { estados : "Mexico" } 
	}).done(function(data){
	$("#jmr_contacto_estado").html(data);
	});
	// Obtener municipios
	$("#jmr_contacto_estado").change(function(){
	var estado = $("#jmr_contacto_estado option:selected").val();
	$.ajax({
	type: "POST",
	url: "procesar-estados.php",
	data: { municipios : estado } 
	}).done(function(data){
	$("#jmr_contacto_municipio").html(data);
	});
	});*/
	
	
	
	//Categorias header
	var categorias = $("#categorias");
	var lista=$("#lista");
	lista.hide();

	categorias.click(function(){
		lista.slideToggle("fast");
	});

	//Categorias registrar producto
	var categoria = $("#categoria");
	var subcategoria=$(".subcategoria");
	subcategoria.hide();
	categoria.change(function(){
		subcategoria.hide();
		$("#div_" + $(this).val()).show();
	});

	








	



});