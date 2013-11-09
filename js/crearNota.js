function mostrarFormularioNuevaNota() 
{
	document.getElementById("FormularioNota").style.display = "block";
}


function validarCamposNota() { //
	var textoNota = document.getElementById("textoNota").value;	
	if(textoNota.length>3){
		alert("La nota ingresada es correcta");
	}
	else{
		alert("La nota ingresada es muy corta");
	}
	
}
