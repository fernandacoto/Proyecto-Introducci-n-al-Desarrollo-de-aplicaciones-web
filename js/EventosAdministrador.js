function mostrarFormularioNuevoEvento() 
{
	document.getElementById("DivNuevoEvento").style.display = "block";
}

function validarCamposFormularioEventos()
{	
	FormularioNuevoEvento = document.getElementById("FormNuevoEvento");
	
	if (FormularioNuevoEvento.InputNombreEvento.value.length == 0)
	{
		FormularioNuevoEvento.InputNombreEvento.focus();
    	alert('El nombre del evento es un campo requerido.');
    	return false;
	}
	
	if (FormularioNuevoEvento.InputDescripcionEvento.value.length == 0)
	{
		FormularioNuevoEvento.InputDescripcionEvento.focus();
    	alert('La descripcion del evento es un campo requerido.');
    	return false;
	}

	if (FormularioNuevoEvento.InputLugarEvento.value.length == 0)
	{
		FormularioNuevoEvento.InputLugarEvento.focus();
    	alert('El lugar del evento es un campo requerido.');
    	return false;
	}

	if (FormularioNuevoEvento.InputFechaInicioEvento.value.length == 0)
	{
		FormularioNuevoEvento.InputFechaInicioEvento.focus();
    	alert('La fecha de inicio del evento es un campo requerido.');
    	return false;
	}

	if (FormularioNuevoEvento.InputFechaFinEvento.value.length == 0)
	{
		FormularioNuevoEvento.InputFechaFinEvento.focus();
    	alert('La fecha de finalización del evento es un campo requerido.');
    	return false;
	}

	if (FormularioNuevoEvento.InputPlazoPropuestaEvento.value.length == 0)
	{
		FormularioNuevoEvento.InputPlazoPropuestaEvento.focus();
    	alert('El plazo para recibir propuestas para el evento es un campo requerido.');
    	return false;
	}

	
}