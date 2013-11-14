<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SAC</title>
<link rel="stylesheet" type="text/css" href="../estilos/EstilosGenericos.css">
<link rel="stylesheet" type="text/css" href="../estilos/AgregarRecursos.css">
<script src="../js/Preguntas.js"> </script>
<script>
	function ir_Resp(idPregunta)
{
	window.location = 'http://localhost:8080/SAC/UsuarioRegistrado/Respuesta.php?IdPregunta=' + idPregunta;
}
</script>
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
					<li><a href="./PerfilUsuario.html">Perfil</a></li>
					<li><a href="./CrearEventos.html">Eventos</a></li>
					<li><a href="./VerTipoSesiones.html">Tipos de Sesión</a></li>
					<li><a href="./VerSalones.html">Salones</a></li>
					<li><a href="../UsuarioGeneral/IniciarSesion.php" onclick="return cerrarSesion()">Cerrar Sesi&oacute;n</a></li>	
				</ul>
			</div>
		</div> <br>
		<label class="Titulo1">Detalles de sesi&oacute;n &nbsp;</label>
		<label class="Titulo2">Sesion1</label><br><br>
		<div id="col1" width="20%">
			<label class="Titulo2">Menu
			</label>
			<table border="0">
			<tr>
				<td><a href="default.asp">1.Ponentes</a></td>
			</tr>
			<tr>
				<td><a href="default.asp">2.Comentarios</a></td>
			</tr>
			<tr>
				<td><a href="default.asp">3.Preguntas</a></td>
			</tr>
			<tr>
				<td><a href="default.asp">4.Notas</a></td>
			</tr>
			<tr>
				<td><a href="default.asp">5.Recursos</a></td>
			</tr>
			</table>
		</div><br>
		<div id="col2" width="80%">
			<input type="button" id="NuevaPregunta" value="NuevaPregunta" onclick="mostrar_formulario()"  class="TipoBoton1" /><br><br>
			<table align="center">
			<thead>
				<tr>
				<th><label>Pregunta</label></th>
				<th><label>Eliminar</label></th>
				<th><label>Dar respuesta</label></th>
				<th><label>Ir a respuesta</label></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$con=mysqli_connect("localhost","root","wcuadra", "jsanchez");
					// Check connection
					if (mysqli_connect_errno())
					{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					$IdSesion;
					if(isset($_GET['IdSesion']))
					{
						$IdSesion = $_GET['IdSesion'];
					}
					$IdUsuario;
					if(isset($_GET['IdUsuario']))
					{
						$IdUsuario = $_GET['IdUsuario'];
					}
					$query = sprintf("SELECT * FROM sac_pregunta P where P.FK_IdSesion = %s and P.FK_IdUsuario = %s", $IdSesion, $IdUsuario);
					$result2 = mysqli_query($con,$query);
					
					while($row2 = mysqli_fetch_array($result2))
					{
						echo '<tr>';
						echo "<th>" . $row2['DetallePregunta'] . "</th>";
						echo '<th> <button id="eliminar" class="TipoBoton2"><img src="../multimedia/BotonEliminar.png" height="30" width="30"></button> </th>';
						echo '<th> <button id="resp" onclick="mostrar_formulario2('. $row2['IdPregunta'] .')" class="TipoBoton2"><img src="../multimedia/BotonVerDetalle.png" height="30" width="30"></button></th>';
						echo '<th> <button id="ver" onclick="ir_Resp('. $row2['IdPregunta'] .')" class="TipoBoton2"><img src="../multimedia/BotonVerDetalle.png" height="30" width="30"></button></th>';
						echo "</tr>";
					}
					mysqli_close($con);
				?>
			</tbody>
			</table><br>
			<div id="formulario_pregunta">
				<form id="FormPregunta" method="post" action="./php/InsertarPregunta.php">
						<table>
							<tr>
								<td class="auto-style2" style="width: 113px">
								Pregunta:</td>
								<td class="auto-style2">
								<textarea id="InputDescripcion" name="S2" style="width: 24.6em; height: 146px;" class="auto-style3"> </textarea><br></td>
								<input type="hidden" value="<?php if(isset($_GET['IdSesion'])) {echo  $_GET['IdSesion'];}?>" name="IdSesion">
								<input type="hidden" value="<?php if(isset($_GET['IdUsuario'])) {echo  $_GET['IdUsuario'];}?>" name="IdUsuario">
							</tr>
							</table>
						<br>
						<input type="button" id="ButtonGuardarPregunta" value="Guardar" onclick="validarCampos()" class="TipoBoton3">
				</form>
			</div>
			<div id="formulario_respuesta">
				<form id="FormRespuesta" method="post" action="./php/InsertarRespuesta.php">
						<table>
							<tr>
								<td class="auto-style2" style="width: 113px">
								Respuesta:</td>
								<td class="auto-style2">
								<input type="hidden" value="" id="IdPregunta" name="IdPreguntaR"></input>
								<textarea id="InputRespuesta" name="InputRespuesta" style="width: 24.6em; height: 146px;" class="auto-style3"> </textarea><br></td>
								<input type="hidden" value="<?php if(isset($_GET['IdSesion'])) {echo  $_GET['IdSesion'];}?>" name="IdSesionResp">
								<input type="hidden" value="<?php if(isset($_GET['IdUsuario'])) {echo  $_GET['IdUsuario'];}?>" name="IdUsuarioResp">
							</tr>
							</table>
						<br>
						<input type="button" id="ButtonGuardarRespuesta" value="Guardar" onclick="validarCamposResp()" class="TipoBoton3">
				</form>
			</div>
		</div>
	</div>
</body>
</html>
