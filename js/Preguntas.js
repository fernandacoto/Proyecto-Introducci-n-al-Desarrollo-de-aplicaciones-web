function mostrar_formulario()
{
	document.getElementById("formulario_recurso").style.display = "block";
}

function mostrar_subform()
{ 
	if (document.getElementById("recurso").value == "URL")
	{
		document.getElementById("escondido2").style.display = "block";
		document.getElementById("escondido1").style.display = "none";
	}
	else
	{
		document.getElementById("escondido1").style.display = "block";
		document.getElementById("escondido2").style.display = "none";
	}
}

function guardar()
{
	document.getElementById("formulario_recurso").style.display = "none";
}

function validarCampos()
{
	FormularioNuevaPregunta = document.getElementById("FormPregunta");
	
	if (FormularioNuevaPregunta.InputDescripcion.value.length == 0)
	{
		FormularioNuevaPregunta.InputDescripcion.focus();
    	alert('La descripcion de la pregunta es un campo requerido.');
    	return false;
	}
}