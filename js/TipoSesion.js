function mostrar_formulario () {
	document.getElementById("formularionuevotiposesion").style.display = "block";
}
function validar_campos()
{
	sesion = document.getElementById("Tipo");
	descripcion = document.getElementById("descripcion");
	sesion_valor = verificar_contenido(sesion.value, "warning1");
	descripcion_valor = verificar_contenido(descripcion.value, "warning2");
    if (sesion_valor && descripcion_valor)
    {
    	//Ir a insertar a la BD despues:
    	sesion.value = "";
    	descripcion.value = "";
    	document.getElementById("formularionuevotiposesion").style.display = "none";
    }

}

function verificar_contenido(elemento, label_desplegar)
{
	if (isEmpty(elemento)) {
		document.getElementById(label_desplegar).style.display = "block";
		return false;
	}
	else
	{
		document.getElementById(label_desplegar).style.display = "none";
		return true;
	}
}

function isEmpty(str) {
    return (!str || 0 === str.length);
}