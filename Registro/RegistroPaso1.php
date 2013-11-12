<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SAC</title>
<link rel="stylesheet" type="text/css" href="../estilos/EstilosGenericos.css">
<link rel="stylesheet" type="text/css" href="../estilos/Registro.css">
<script src="../js/Registro.js"> </script>
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
					<li><a href="../UsuarioGeneral/IniciarSesion.php">Iniciar Sesión</a></li>
					<li><a href="../UsuarioGeneral/CrearEventos.html">Eventos</a></li>
					<li><a href="../UsuarioGeneral/VerTipoSesiones.html">Tipos de Sesión</a></li>
					<li><a href="../UsuarioGeneral/VerSalones.html">Salones</a></li>
				</ul>
			</div>
		</div><br>
		<div id="Registro">
			<form id="Paso" method ="POST" action ="./php/insertar_usuario.php" onSubmit = "return validar_paso_2()" enctype="multipart/form-data">
				<fieldset>
				<legend>Paso 1 de 2</legend>
				<table id="tablaRegistro">
					<tr>
					<td>
						<label>Nombre</label><br><br>
						<label>Apellido 1</label><br><br>
						<label>Apellido 2</label><br><br>
						<label>Correo electr&oacute;nico</label><br><br>
						<label>Provincia</label><br><br>
						<label>Trabajo</label><br><br>
						<label>Tipo de empresa</label><br><br>
					</td>
					<td>
						<input type="text" id="Nombre" name="Nombre"></input><div id="escondido"><label id="warning1">*Este es un campo requerido</label></div><br><br>
						<input type="text" id="Apellido 1" name="Apellido1"></input><div id="escondido"><label id="warning2">*Este es un campo requerido</label></div><br><br>
						<input type="text" id="Apellido 2" name="Apellido2"></input><div id="escondido"><label id="warning3">*Este es un campo requerido</label></div><br><br>
						<input type="text" id="Email" name="Email"></input><div id="escondido"><label id="warning4">*Este es un campo requerido</label></div><br><br>
						<select class="selects" id="Provincia" name="Provincias">
						    <?php
							$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");
							// Check connection
							if (mysqli_connect_errno())
							  {
							  echo "Failed to connect to MySQL: " . mysqli_connect_error();
							  }

							$result = mysqli_query($con,"SELECT * FROM SAC_Provincia");

							while($row = mysqli_fetch_array($result))
							  {
							  echo "<option value =". $row['IdProvincia'] .">".$row['NombreProvincia']."</option>";
							  }

							mysqli_close($con);
							?>
						</select><br><br>
						<select class="selects" id="Trabajo" name="Trabajo">
						  <option value="Privado">Privado</option>
						  <option value="Público">Público</option>
						</select><br><br>
						<select class="selects" id="Tipo_Empresa" name="Tipo_Empresa">
						  <option value="TI">TI</option>
						  <option value="Banca y Finanzas">Banca y Finanzas</option>
						  <option value="Educación">Educación</option>
						</select><br>

					</td>
					</tr>

				</table><br>
				<input type="button"id="BotonRegistro" value="Siguiente" onclick="validar_paso_1()"/>
				</fieldset>
			    
		</div>
		<!---->
		<div id="Registro_Paso2" class="Registro_Paso2">
				<fieldset>
				<legend  id="Registro">Paso 2 de 2</legend>
				<table id="tablaRegistro">
					<tr>
					<td>
						<label>Nombre de usuario</label><br><br>
						<label>Contrase&ntilde;a</label><br><br>
						<label>Confirmar contrase&ntilde;a</label>
					</td>
					<td>
						<input type="text" id="nombre_usuario" name="NombreUsuario"></input><div id="escondido"><label id="warning5">*Este es un campo requerido</label></div><br><br>
						<input type= "password" id="contrasenna" name="Contrasena"></input><div id="escondido"><label id="warning6">*Este es un campo requerido</label></div><br><br>
						<input type= "password" id="confirmacion"></input><div id="escondido"><label id="warning7">*Este es un campo requerido</label></div><div id="escondido2"><label id="warning8">Las contrase&ntilde;as no coninciden</label></div>
					</td>
					</tr>

				</table><br>
				<input type="submit" id="Finalizar" value="Finalizar" name="BotonEnviar" /><!--onclick="validar_paso_2()"-->
				</fieldset>
			</form>
		</div>
	</div>
</body>

</html>
