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
function abrirRecurso(Tipo,Detalle) {
	if(Tipo == 1)
	{
      window.open(Detalle, '_blank');
	}
	else
	{
		//alert(Detalle);
		var url = "http://ic-itcr.ac.cr/~fcoto/SAC/uploads/"
		window.open(url.concat(Detalle), '_blank');
	}
}
function eliminarRecurso(Id_recurso)
{
	var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
       xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("GET","../UsuarioAdministrador/php/eliminarRecurso.php?Id=" + Id_recurso ,true);
    xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    { //codigo que agrega option
	    try
		{
		// for IE earlier than version 8
			window.location = "http://ic-itcr.ac.cr/~fcoto/SAC/UsuarioAdministrador/AgregarRecursos.php";
		}
		catch (e)
		{
		}
    }
    }
    
    xmlhttp.send();
}