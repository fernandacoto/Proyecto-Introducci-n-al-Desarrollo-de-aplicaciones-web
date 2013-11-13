<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SAC</title>
<link rel="stylesheet" type="text/css" href="../estilos/EstilosGenericos.css">
<link rel="stylesheet" type="text/css" href="../estilos/NuevaSesionAdministrador.css">
<script src="../js/SesionesAdministrador.js"> </script>
</head>

<body>
	<div id="Contenido">
		<div id="Header">	
			<div id="Banner">	
				<img border="0" src="../multimedia/banneropcional.gif" alt="Banner" width="100%" height="20%">
			</div>	
		</div>
		
		<div id="Contenido">
			<div id="MenuBar" class="MenuBar" >
				<ul>
					<li><a href="./AsignarPermisos.html">Permisos</a></li>
					<li><a href="./AsignarUsuarios.html">Usuarios</a></li>
					<li><a href="./CrearEventos.html">Eventos</a></li>
					<li><a href="./CrearTipoSesion.html">Tipos de Sesión</a></li>
					<li><a href="./CrearSalon.html">Salones</a></li>				
					<li><a href="../UsuarioGeneral/IniciarSesion.php" onclick="return cerrarSesion()">Cerrar Sesi&oacute;n</a></li>	
				</ul>
			</div>
		</div><br>
		<input type="button" id="NuevaSesion" value="Nueva sesi&oacute;n" onclick="mostrar_formulario()" class="TipoBoton1" />
		<input type="button" id="VerSesiones" value="Ver todas las sesiones" class="TipoBoton1">
		<input type="button" id="Volver" onclick="location.href='./AdministradorHilos.html'" value="Volver" class="TipoBoton1"><br><br>
		<div>
			<table align="center">
			<thead>
				<tr>
				<th><label>Nombre</label></th>
				<th><label>Hora de inicio</label></th>
				<th><label>Hora de finalizaci&oacute;n</label></th>
				<th><label>Tipo de sesi&oacute;n</label></th>
				<th><label>Sal&oacute;n</label></th>
				<th><label>Evento</label></th>
				<th><label>Favorito</label></th>
				<th><label>Editar</label></th>
				<th><label>Eliminar</label></th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<th><label>Sesi&oacute;n 1</label></th>
				<th><label>8:00am</label></th>
				<th><label>12:00md</label></th>
				<th><label>Taller</label></th>
				<th><label>B307</label></th>
				<th><label>Evento 1</label></th>
				<th><button id="favorito" class="TipoBoton2"><img src="../multimedia/BotonFavorito.gif" height="30" width="30"></button></th>
				<th><button id="editar" onclick="mostrar_formulario()" class="TipoBoton2"><img src="../multimedia/BotonEditar.png" height="30" width="30"></button></th>
				<th><button id="eliminar" class="TipoBoton2"><img src="../multimedia/BotonEliminar.png" height="30" width="30"></button></th>	
				</tr>
			</tbody>
			</table><br>
			<div >
				<form id="formularionuevasesion">
				<fieldset>
				<div id="col1">
				<label>Nombre de la sesi&oacute;n &nbsp;</label>
				<input type="text" id="nombre_sesion"></input><div id="escondido"><label id="warning1">*Este es un campo requerido</label></div><br>
				<label>Descripci&oacute;n</label><br>
				<textarea id="descripcion"></textarea><div id="escondido"><label id="warning2">*Este es un campo requerido</label></div><br><br>
				<label>Hilo &nbsp;</label>
				<select class="selects" id="Eventos">
					<option>Hilo1</option>
					<option>Hilo2</option>
				</select>
				</div><br>
				<div id="col2">
				<label>Hora de inicio &nbsp;</label>
				<input type="text" id="HI"></input><div id="escondido"><label id="warning3">*Este es un campo requerido</label></div><br><br>
				<label>Hora de finalizaci&oacute;n &nbsp;</label>
				<input type="text" id="HF"></input><div id="escondido"><label id="warning4">*Este es un campo requerido</label></div><br><br>
				<label>Tipo de sesi&oacute;n &nbsp;</label>
				<select class="selects" id="Tipo_sesion">
					<option>Taller</option>
					<option>Conferencia</option>
				</select><br><br>
				<label>Sal&oacute;n &nbsp;</label>
				<select class="selects" id="salon">
					<option>B3-07</option>
					<option>Laboratorio Tierra Media</option>
				</select><br>
				</div>
				<input type="button" id="Guardar" value="Guardar" onclick="validar_campos()" class="TipoBoton3" />
			    </fieldset>
			    </form>
			</div>
		</div>
	</div>
</body>
</html>
