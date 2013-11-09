function Mostrar(){
				document.getElementById("Formulario").className = "noOculto";
			}
function validarForm(formulario) {
  if(formulario.nombre.value.length==0) { 
    formulario.nombre.focus();   
    alert('No has escrito el nombre del hilo'); 
    return false; 
  }
  if(formulario.descripcion.value.length==0) { 
    formulario.descripcion.focus();
    alert('No has escrito una descripción para el hilo');
    return false;
  }
  if(formulario.lugar.value.length=0) {
    formulario.lugar.focus();            
	alert('No has escrito un lugar para el hilo');
    return false;
  }
  if(formulario.fecha.value.length==0) {  
    formulario.fecha.focus();
    alert('No has escrito ninguna fecha para el hilo');
    return false;
  }
  return true;
}