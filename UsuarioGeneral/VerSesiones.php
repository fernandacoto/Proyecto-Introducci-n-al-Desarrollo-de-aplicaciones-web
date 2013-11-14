<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SAC</title>
<link rel="stylesheet" type="text/css" href="../estilos/EstilosGenericos.css">
<link rel="stylesheet" type="text/css" href="../estilos/NuevaSesionAdministrador.css">
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
					<li><a href="./IniciarSesion.php">Iniciar Sesión</a></li>
					<li><a href="./CrearEventos.html">Eventos</a></li>
					<li><a href="./VerTipoSesiones.html">Tipos de Sesión</a></li>
					<li><a href="./VerSalones.html">Salones</a></li>		
				</ul>
			</div>
		</div><br>
		<label class="Titulo1">Sesiones del Hilo &nbsp;</label>
		<label class="Titulo2"></label><br><br>
		<div>
			<table align="center">
			<thead>
				<tr>
				<th><label>Nombre</label></th>
				<th><label>Hora de inicio</label></th>
				<th><label>Hora de finalizaci&oacute;n</label></th>
				<th><label>Tipo de sesi&oacute;n</label></th>
				<th><label>Sal&oacute;n</label></th>
				</tr>
			</thead>
			<tbody>
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
						}					
						mysqli_close($con);
					?>
				</tbody>
			</table><br>
	</div>
	<input type="button" onclick="location.href='./Hilos.html'" id="Volver" value="Volver" class="TipoBoton1"><br><br>
</body>
</html>
