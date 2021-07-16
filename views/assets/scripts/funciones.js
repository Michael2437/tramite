function buscar_datos(consulta){
	$.ajax({
		url: 'buscaruser.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datosbuscados").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}

function miFunc() {
	var valor = document.getElementById("dni").value;
	if (valor != "") {
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
}

function buscar(consulta){
	$.ajax({
		url: 'nuevoexpediente.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datosbuscados").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}

function miFun() {
	var valor = document.getElementById("dni").value;
	if (valor != "") {
		buscar(valor);
	}else{
		buscar();
	}
}

function searchExp(consulta){
	$.ajax({
		url: 'buscarexpediente.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datosbuscados").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}

function buscarExp() {
	var valor = document.getElementById("nExp").value;
	if (valor != "") {
		searchExp(valor);
	}else{
		searchExp();
	}
}
/*Para tipo de usuario, normal y juridico, usuarioNuevo */
function buscar_archivos() {
	var combo = document.getElementById("tipo").value;
	$.ajax({
		url: 'ajax.php',
		type: 'POST',
		dataType: 'html',
		data: { consulta: combo },
	})
		.done(function (respuesta) {
			$("#selectorder").html(respuesta);
		})
		.fail(function () {
			console.log("error");
		});
    }

