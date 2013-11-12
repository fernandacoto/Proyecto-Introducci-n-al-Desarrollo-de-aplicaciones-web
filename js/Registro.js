function validar_paso_1()
{
	nombre = document.getElementById("Nombre");
	apellido1 = document.getElementById("Apellido 1");
	apellido2 = document.getElementById("Apellido 2");
	correo = document.getElementById("Email");
	nombre_valor = verificar_contenido(nombre.value, "warning1");
	apellido1_valor = verificar_contenido(apellido1.value, "warning2");
	apellido2_valor = verificar_contenido(apellido2.value, "warning3");
	email_valor = verificar_contenido(correo.value, "warning4");
	if (nombre_valor && apellido1_valor && apellido2_valor && correo)
	{
		document.getElementById("Registro_Paso2").className = 'Registro_Paso_mostrar';
		document.getElementById("Registro").style.display= 'none';
	}
}

function validar_paso_2()
{
	nombre_usuario = document.getElementById("nombre_usuario");
	contrasena = document.getElementById("contrasenna");
	confirmacion = document.getElementById("confirmacion");
	nombre_usuario_valor = verificar_contenido(nombre_usuario.value, "warning5");
	contrasena_valor = verificar_contenido(contrasena.value, "warning6");
	confirmacion_valor = verificar_contenido(confirmacion.value, "warning7");
	final_res = verificar_contrasenas(contrasena.value,confirmacion.value, "warning8");
	if (nombre_usuario_valor && contrasena_valor && confirmacion_valor && final_res) 
	{
		window.location.href = "../UsuarioGeneral/IniciarSesion.php";
	}
}

function verificar_contrasenas(contrasena_valor,confirmacion_valor,mensaje)
{
	if (contrasena_valor == confirmacion_valor)
	{
		document.getElementById(mensaje).style.display = "none";
		return true;
	}
	else
	{
		document.getElementById(mensaje).style.display = "block";
		return false;
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