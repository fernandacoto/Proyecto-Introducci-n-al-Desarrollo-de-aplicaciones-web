<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>SAC</title>
<link rel="stylesheet" type="text/css" href="../estilos/EstilosGenericos.css">
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
					<li><a href="./PerfilUsuario.html">Perfil</a></li>
					<li><a href="./CrearEventos.php">Eventos</a></li>
					<li><a href="./VerTipoSesiones.html">Tipos de Sesión</a></li>
					<li><a href="./VerSalones.html">Salones</a></li>
					<li><a href="../UsuarioGeneral/IniciarSesion.php" onclick="return cerrarSesion()">Cerrar Sesi&oacute;n</a></li>	
				</ul>
			</div>
		</div><br><br>		
		<div>
			<span class="auto-style1">
			<label class="Titulo1">Eventos</label></span><br>
		</div><br>
		<div>			
				<table align="center">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Lugar</th>
							<th>Fecha de inicio</th>
							<th>Fecha de fin</th>
							<th>Marcar favorito</th>
							<th>Ver hilos</th>
						<tr>
					</thead>
					<tbody>
						<?php
							$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");
							// Check connection
							if (mysqli_connect_errno())
							  {
							  echo "Failed to connect to MySQL: " . mysqli_connect_error();
							  }
						
							$result = mysqli_query($con,"SELECT * FROM SAC_Evento");
							while($row = mysqli_fetch_array($result)){
								$idEvento = $row['IdEvento'];	
								echo '<tr>';
								echo '<th>'. $row['NombreEvento'] .'</th>';
								echo '<th>'. $row['LugarEvento'] .'</th>';
								echo '<th>'. $row['FechaInicioEvento'] .'</th>';
								echo '<th>'. $row['FechaFinEvento'] .'</th>';			
								echo '<th> <button id="favorito" class="TipoBoton2"><img src="../multimedia/BotonFavorito.gif" height="30" width="30"></button> </th>';
								echo '<th> <a  href="./VerHilos.php?idProyecto='.$idEvento.'"> <img src="../multimedia/BotonVerDetalle.png" height="30" width="30"></a></th>';
								echo '</tr>';
							}					
							mysqli_close($con);
						?>

						
					</tbody>
				</table>

		</div>
	</div>
</body>

</html>
