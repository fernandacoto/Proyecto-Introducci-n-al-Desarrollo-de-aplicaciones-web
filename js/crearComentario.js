function mostrarFormularioNuevaPropuesta() 
{
	document.getElementById("FormularioPropuesta").style.display = "block";
}


function isNumber (o) {
  return ! isNaN (o-0) && o !== null && o.replace(/^\s\s*/, '') !== "" && o !== false;
}

function validarCampos() { //
	var horaInicio = document.getElementById("HoraInicio").value;	
	var minutoInicio = document.getElementById("MinutoInicio").value;
	var horaFin = document.getElementById("HoraFin").value;
	var minutoFin = document.getElementById("MinutoFin").value;
	var nombreSesion= document.getElementById("nombreSesion").value;
	var descripcion= document.getElementById("descripcion").value;
	var e = document.getElementById("tipoSesion");
	var tipoSesion= e.options[e.selectedIndex].value;
	var f = document.getElementById("meridianoInicio");
	var meridianoInicio= f.options[f.selectedIndex].value;
	var g = document.getElementById("meridianoFin");
	var meridianoFin= g.options[g.selectedIndex].value;

	if(isNumber(horaInicio)&&isNumber(minutoInicio)&&isNumber(horaFin)&&isNumber(minutoFin)){
		if(horaInicio<13&&horaFin<13&&minutoInicio<60&&minutoFin<60){
			if(nombreSesion.length>3 && descripcion.length>3){
				alert("Los datos ingresados son correctos");
			}
			else{
				alert("El nombre o la descripcion son muy cortos");
			}
		}
		else{
			alert("La hora que brindaste no es correcta");
		}
	}
	else{
		alert("La hora que brindaste posee caracteres invalidos");
	}

}
