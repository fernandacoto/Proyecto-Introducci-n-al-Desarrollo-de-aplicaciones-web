function getCookie(c_name){
	var c_value = document.cookie;
	var c_start = c_value.indexOf(" " + c_name + "=");
	if (c_start == -1){
		c_start = c_value.indexOf(c_name + "=");
	}
		if (c_start == -1){
		c_value = null;
	}
	else{
		c_start = c_value.indexOf("=", c_start) + 1;
		var c_end = c_value.indexOf(";", c_start);
		if (c_end == -1){
		c_end = c_value.length;
	}
		c_value = unescape(c_value.substring(c_start,c_end));
	}
	return c_value;
}

function almacenarCookieUsuario(value){
	var exdays = 30;
	var c_name = 'username';
	var exdate=new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
	document.cookie=c_name + "=" + c_value;
	window.alert("Usuario:" + c_value + "almacenada" );
	window.location.href = "../UsuarioRegistrado/VerSesiones.html";
}

function cerrarSesion(){
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function checkCookie(){
	var username=getCookie("username");
	if (username!=null && username!=""){
	  alert("Identidad autorizada: " + username);
	}
	else{
			window.alert("Usted no posee una sesión abierta, inicie sesión para continuar");
			window.location.href = "../UsuarioGeneral/IniciarSesion.html";
	}
}
function validaciones_sesion()
{
	nombre_usuario = document.getElementById("nombre_usuario").value;
    contrasena = document.getElementById("contrasenna").value;
	nombre_usuario_valor = verificar_contenido(nombre_usuario, "warning5");
	contrasena_valor = verificar_contenido(contrasena, "warning6");
}
function verificar_contenido(elemento, label_desplegar)
{
	if (isEmpty(elemento)) {
		alert("Este campo es obligatorio");
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