function mostrar_formulario () {
	document.getElementById("formularionuevotiposesion").style.display = "block";
}
function validar_campos()
{
	sesion = document.getElementById("NombreTipoSesion");
	descripcion = document.getElementById("DescripcionTipoSesion");
	sesion_valor = verificar_contenido(sesion.value, "warning1");
	descripcion_valor = verificar_contenido(descripcion.value, "warning2");
    if (sesion_valor && descripcion_valor)
    {
    	
		var xmlhttp;
		if (window.XMLHttpRequest)
		{
			xmlhttp=new XMLHttpRequest();
		}
		else
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
    
		xmlhttp.onreadystatechange=function()
		{
   
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				try
				{

				}
				catch (e)
				{
			
				}
			}
		}
		xmlhttp.open("GET","agregarTipoSesion.php?NombreTipoSesion=" + document.getElementById("NombreTipoSesion").value + "&DescripcionTipoSesion=" + document.getElementById("DescripcionTipoSesion").value,true);
		xmlhttp.send();
		
    	sesion.value = "";
    	descripcion.value = "";
    	document.getElementById("formularionuevotiposesion").style.display = "none";
		refrescarPagina();
    }

}

function refrescarPagina()
{
	window.location.replace('http://ic-itcr.ac.cr/~jsanchez_/Proyecto/UsuarioAdministrador/CrearTipoSesion.php');
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

function mostrarId() 
{
	alert(document.getElementById("1").id);
}

function borrarTipoSesion(IdTipoSesion)
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
    
	xmlhttp.onreadystatechange=function()
	{
   
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			try
			{

			}
			catch (e)
			{
			
			}
		}
	}
	xmlhttp.open("GET","borrarTipoSesion.php?IdTipoSesion=" + IdTipoSesion,true);
	xmlhttp.send();
	
	refrescarPagina();
}