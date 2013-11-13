function validarForm() {
  var e = document.getElementById("usuariosDrop");
  var texto = e.options[e.selectedIndex].value;
  if(texto=="--Seleccione uno--") { 
    formulario.usuariosDrop.focus();   
    alert('No has escogido el usuario a asignar'); 
    return false; 
  }else{
	alert(texto);
	document.forms["formularioAsignar"].submit();	
	}

}

