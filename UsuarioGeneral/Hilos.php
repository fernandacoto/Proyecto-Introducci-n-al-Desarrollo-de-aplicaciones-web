<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>SAC</title>
<link rel="stylesheet" type="text/css" href="../estilos/EstilosGenericos.css">
<script type="text/javascript" src="../js/Hilos.js"></script>
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
					<li><a href="./CrearEventos.php">Eventos</a></li>
					<li><a href="./VerTipoSesiones.html">Tipos de Sesión</a></li>
					<li><a href="./VerSalones.html">Salones</a></li>					
					<li><a href="../Registro/RegistroPaso1.php">Registrarse</a></li>
				</ul>
			</div><br>
			<div>
				<span class="auto-style1">
				<label class="Titulo1">Hilos<br></label></span><br>
			</div>
			<div id = "Botones">
				<button onclick="location.href='./CrearEventos.php'" class="TipoBoton1">Volver</button><br>
			</div>
			
			<div id="Tabla" class="Tabla">
				<table align="center">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Lugar</th>
						<th>Fecha</th>
						<th>Ver sesiones</th>
					</tr>
				</thead>
						<?php
							$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");
							// Check connection
							if (mysqli_connect_errno())
							  {
							  echo "Failed to connect to MySQL: " . mysqli_connect_error();
							  }
							$idEvento;
							if(isset($_GET['idProyecto'])) {
								$idEvento =  $_GET["idProyecto"];
							}
							$result = mysqli_query($con,'SELECT * FROM SAC_Hilo where FK_IdEvento ='.$idEvento.';');
							while($row = mysqli_fetch_array($result)){
								$idHilo = $row['IdHilo'];	
								echo '<tr>';
								echo '<th>'. $row['NombreHilo'] .'</th>';
								echo '<th>'. $row['LugarHilo'] .'</th>';
								echo '<th>'. $row['FechaHilo'] .'</th>';
								echo '<th> <a  href="./VerSesiones.php?idHilo='.$idHilo.'"> <img src="../multimedia/BotonVerDetalle.png" height="30" width="30"></a></th>';
								echo '</tr>';
							}					
							mysqli_close($con);
						?>						
		
				</table>
				
			</div>
			
		</div>
	</div>
</body>

</html>
