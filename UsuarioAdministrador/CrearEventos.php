<!DOCTYPE HTML>

<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>SAC</title>
<link rel="stylesheet" type="text/css" href="../estilos/EstilosGenericos.css">
<link rel="stylesheet" type="text/css" href="../estilos/EstilosCrearEvento.css">
<script src="../js/EventosAdministrador.js"> </script>


<style type="text/css">
.auto-style1 {
	font-family: "Century Schoolbook";
}
</style>
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
		</div><br><br>		
		<div>
			<span class="auto-style1">
			<label class="Titulo1">Eventos<br></label><br>
			<label class="Titulo2">Hilo 1<br></label></span><br>

		</div>
		<br>
		
		<div>
			<button type="button" id="BotonNuevoEvento" class="TipoBoton1" onclick="mostrarFormularioNuevoEvento()">Nuevo evento</button> 
		</div> <br>
		
		<div>			
				<table align="center">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Lugar</th>
							<th>Fecha de inicio</th>
							<th>Fecha de fin</th>
							<th>Favorito</th>
							<th>Editar</th>
							<th>Eliminar</th>
							<th>Ver hilos</th>
						<tr>
					</thead>
					<tbody>
					
						<?php
							$con=mysqli_connect("localhost","murena","murena","jsanchez");
							// Check connection
							if (mysqli_connect_errno())
							  {
							  echo "Failed to connect to MySQL: " . mysqli_connect_error();
							  }
							
							$result = mysqli_query($con,"SELECT * FROM `sac_evento`");
							while($row = mysqli_fetch_array($result)){
								$idEvento = $row['IdEvento'];	
								echo '<tr>';
								echo '<th>'. $row['NombreEvento'] .'</th>';
								echo '<th>'. $row['LugarEvento'] .'</th>';
								echo '<th>'. $row['FechaInicioEvento'] .'</th>';
								echo '<th>'. $row['FechaFinEvento'] .'</th>';
								echo '<th> <button id="favorito" class="TipoBoton2"><img src="../multimedia/BotonFavorito.gif" height="30" width="30"></button> </th>';
								echo '<th><button id="editar" class="TipoBoton2"><img src="../multimedia/BotonEditar.png" height="30" width="30"></button></th>';
								echo '<th><button id="eliminar" class="TipoBoton2"><img src="../multimedia/BotonEliminar.png" height="30" width="30"></button></th>';	
								echo '<th> <a  href="./AdministradorHilos.php?idProyecto='.$idEvento.'"> <img src="../multimedia/BotonVerDetalle.png" height="30" width="30"></a></th>';
								echo '</tr>';
							}					
							mysqli_close($con);
						?>
											
					</tbody>
				</table>

		</div> <br> <br> <br>
		
		<div id="DivNuevoEvento">
		<form id ="FormNuevoEvento" name="FormNuevoEvento" method="post" action="./php/insertarEvento.php">
			<table id="TablaNuevoEvento" "align="center">
					<tr>
						<td>
							<label class="label">Nombre<br></label>
						</td>
						<td>
							<input type="text" name="InputNombreEvento">
						</td>
					</tr>
					
					<tr>
						<td>
							<label class="label">Descripción<br></label>
						</td>
						<td>
							<textarea id="InputDescripcionEvento" name="InputDescripcionEvento"> </textarea>
						</td>
					</tr>
					
					<tr>
						<td>
							<label class="label" >Lugar<br></label>
						</td>
						<td>
							<input type="text" id="InputLugarEvento" name="InputLugarEvento">
						</td>
					</tr>

					<tr>
						<td>
							<label class="label">Fecha de inicio<br></label>
						</td>
						<td>
							<input type="date" id="InputFechaInicioEvento" name="InputFechaInicioEvento">
						</td>
					</tr>
					
					<tr>
						<td>
							<label class="label">Fecha de fin<br></label>
						</td>
						<td>
							<input type="date" id="InputFechaFinEvento" name="InputFechaFinEvento">
						</td>
					</tr>
					
					<tr>
						<td>
							<label class="label">Plazo para propuesta<br></label>
						</td>
						<td>
							<input type="text" id="InputPlazoPropuestaEvento" name="InputPlazoPropuestaEvento">
						</td>
						<td>
							<select id="SelectTipoPlazo" name="SelectTipoPlazo">
								<option value="Horas">Horas</option>
								<option value="Días">Días</option>
								<option value="Semanas">Semanas</option>
								<option value="Meses">Meses</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<br> <br>
							<input type="button" id="ButtonGuardarEvento" value="Guardar" class="TipoBoton3" onclick="validarCamposFormularioEventos()">
							<br> <br>
						</td>
					</tr>
			</table>		
		</form>
		</div>
	</div>
</body>

</html>

