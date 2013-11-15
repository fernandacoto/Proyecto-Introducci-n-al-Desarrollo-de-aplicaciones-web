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
				<th><label>Favorito</label></th>
				<th><label>Editar</label></th>
				<th><label>Eliminar</label></th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<?php
						$con=mysqli_connect("localhost","murena","murena","jsanchez");
						// Check connection
						if (mysqli_connect_errno())
						  {
						  echo "Failed to connect to MySQL: " . mysqli_connect_error();
						  }
						$idHilo;
						if(isset($_GET['idHilo'])) {
							$idHilo=  $_GET["idHilo"];
						}
						$query  =  sprintf("SELECT S.NombreSesion, S.HoraInicioSesion, S.HoraFinSesion, T.NombreTipoSesion, Sa.DetalleSalon FROM sac_sesion S INNER JOIN sac_tiposesion T Inner Join sac_salon Sa on S.FK_idTipoSesion = T.idTipoSesion and S.FK_idSalon = Sa.IdSalon where S.FK_IdHilo = %s;",$idHilo);			
						$result = mysqli_query($con,$query);  
						while($row = mysqli_fetch_array($result)){	
							echo '<tr>';
							echo '<th>'. $row['NombreSesion'] .'</th>';
							echo '<th>'. $row['HoraInicioSesion'] .'</th>';
							echo '<th>'. $row['HoraFinSesion'] .'</th>';
							echo '<th>'. $row['NombreTipoSesion'] .'</th>';
							echo '<th>'. $row['DetalleSalon'] .'</th>';
							echo '<th><button id="favorito" class="TipoBoton2"><img src="../multimedia/BotonFavorito.gif" height="30" width="30"></button></th>';
							echo '<th><button id="editar" onclick="mostrar_formulario()" class="TipoBoton2"><img src="../multimedia/BotonEditar.png" height="30" width="30"></button></th>';	
							echo '<th><button id="eliminar" class="TipoBoton2"><img src="../multimedia/BotonEliminar.png" height="30" width="30"></button></th>';
						}					
						mysqli_close($con);
					?>	
				</tr>
			</tbody>
			</table><br>
			<div >
				<form id="formularionuevasesion" name="formularionuevasesion" class="FormSAC"  method="post" action="./php/insertarSesion.php">
				<fieldset>
					<div id="col1">
						<?php 
						$idEvento;
							if(isset($_GET['idHilo'])) {
								$idEvento =  $_GET["idHilo"];
							}
							echo '<input type="hidden" name="idHilo" id="idHilo" value="'.$idEvento.'">' ;
						?>
						<label>Nombre de la sesi&oacute;n &nbsp;</label>
						<input type="text" id="nombresesion" name="nombresesion"><div id="escondido"><label id="warning1">*Este es un campo requerido</label></div><br>
						<label>Descripci&oacute;n</label><br>
						<textarea id="descripcion" name="descripcion"></textarea><div id="escondido"><label id="warning2">*Este es un campo requerido</label></div><br><br>
						<label>Hilo &nbsp;</label>
						<?php
							$con=mysqli_connect("localhost","murena","murena", "jsanchez");
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
							$result2 = mysqli_query($con,"SELECT * FROM `sac_hilo`");
							echo '<select class="selects" id="Hilos" name="Hilos">';
							while($row2 = mysqli_fetch_array($result2))
							{
								echo '<option value=' . $row2['IdHilo'] .'>' . $row2['NombreHilo'] . '</option>';
							}
							echo '</select>';
							mysqli_close($con);
						?>
					</div><br>
						
					<div id="col2">
						<label>Hora de inicio &nbsp;</label>
						<input type="text" id="HoraInicio" name="HoraInicio">	<div id="escondido"><label id="warning3">*Este es un campo requerido</label></div><br><br>
						<label>Hora de finalizaci&oacute;n &nbsp;</label>
						<input type="text" id="HoraFin" name="HoraFin">	<div id="escondido"><label id="warning4">*Este es un campo requerido</label></div><br><br>
						<label>Tipo de sesi&oacute;n &nbsp;</label>
						<?php
							$con=mysqli_connect("localhost","murena","murena", "jsanchez");
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
							$result2 = mysqli_query($con,"SELECT * FROM `sac_tiposesion`");
							echo '<select class="selects" id="Tiposesion" name="Tiposesion">';
							while($row2 = mysqli_fetch_array($result2))
							{
								echo '<option value=' . $row2['IdTipoSesion'] .'>' . $row2['NombreTipoSesion'] . '</option>';
							}
							echo '</select>';
							mysqli_close($con);
						?>
						<br><br><label>Sal&oacute;n &nbsp;</label>
						<?php
							$con=mysqli_connect("localhost","murena","murena", "jsanchez");
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
							$result2 = mysqli_query($con,"SELECT * FROM `sac_salon`");
							echo '<select class="selects" id="salon" name="salon">';
							while($row2 = mysqli_fetch_array($result2))
							{
								echo '<option value=' . $row2['IdSalon'] .'>' . $row2['DetalleSalon'] . '</option>';
							}
							echo '</select>';
							mysqli_close($con);
						?>
					</div>
				<input type="button" id="Guardar" name="Guardar" value="Guardar" onclick="validar_campos()" class="TipoBoton3">
			    </fieldset>
			    </form>
			</div>
		</div>
	</div>
</body>
</html>
