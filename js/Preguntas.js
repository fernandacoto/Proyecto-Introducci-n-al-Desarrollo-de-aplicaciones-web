function mostrar_formulario()
{
	document.getElementById("formulario_pregunta").style.display = "block";
	document.getElementById("formulario_respuesta").style.display = "none";
}
function mostrar_formulario2(IdPregunta)
{
	document.getElementById("formulario_respuesta").style.display = "block";
	document.getElementById("formulario_pregunta").style.display = "none";
	var hidden = document.getElementById("IdPregunta");
	hidden.value = IdPregunta;
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
	document.getElementById("formulario_pregunta").style.display = "none";
}

function validarCampos()
{
	FormularioNuevaPregunta = document.getElementById("FormPregunta");
	
	if (FormularioNuevaPregunta.InputDescripcion.value.length == 0)
	{
		FormularioNuevaPregunta.InputDescripcion.focus();
    	alert('La descripcion de la pregunta es un campo requerido.');
    	return false;
	}else
	{
		document.forms["FormPregunta"].submit();
	}
}



function validarCamposResp()
{
	FormularioNuevaRespuesta = document.getElementById("FormRespuesta");
	
	if (FormularioNuevaRespuesta.InputRespuesta.value.length == 0)
	{
		FormularioNuevaRespuesta.InputRespuesta.focus();
    	alert('La respuesta de la pregunta es un campo requerido.');
    	return false;
	}else
	{
		document.forms["FormRespuesta"].submit();
	}
}