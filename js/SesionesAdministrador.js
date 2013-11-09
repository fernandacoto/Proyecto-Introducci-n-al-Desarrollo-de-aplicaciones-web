function mostrar_formulario () {
	document.getElementById("formularionuevasesion").style.display = "block";
}

function validar_campos()
{
	sesion = document.getElementById("nombre_sesion");
	descripcion = document.getElementById("descripcion");
	hi = document.getElementById("HI");
	hf = document.getElementById("HF");
	sesion_valor = verificar_contenido(sesion.value, "warning1");
	descripcion_valor = verificar_contenido(descripcion.value, "warning2");
	hi_valor = verificar_contenido(hi.value, "warning3");
	hf_valor = verificar_contenido(hf.value, "warning4");
    if (sesion_valor && descripcion_valor && hi_valor && hf_valor)
    {
    	//Ir a insertar a la BD despues:
    	sesion.value = "";
    	descripcion.value = "";
    	hi.value = "";
    	hf.value = "";
    	document.getElementById("formularionuevasesion").style.display = "none";
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