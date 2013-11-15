<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SAC</title>
<link rel="stylesheet" type="text/css" href="../estilos/EstilosGenericos.css">
<link rel="stylesheet" type="text/css" href="../estilos/TipoSesion.css">
<script src="../js/Salon.js"> </script>
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
					<li><a href="./AsignarPermisos.php">Permisos</a></li>
					<li><a href="./AsignarUsuarios.php">Usuarios</a></li>
					<li><a href="./CrearEventos.php">Eventos</a></li>
					<li><a href="./CrearTipoSesion.php">Tipos de Sesión</a></li>
					<li><a href="./CrearSalon.html">Salones</a></li>				
					<li><a href="../UsuarioGeneral/IniciarSesion.php" onclick="return cerrarSesion()">Cerrar Sesi&oacute;n</a></li>
				</ul>
			</div>
		</div><br>
		<div>
			<table align="center">
			<thead>
				<tr>
				<th><label>Nombre</label></th>
				<th><label>Descripci&oacute;n</label></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");
					
					if (mysqli_connect_errno())
					{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
							
					$result = mysqli_query($con,"SELECT * FROM `SAC_Salon`");
					
					while($row = mysqli_fetch_array($result))
					{	
						echo '<tr>';
						echo '<th>'. $row['NombreSalon'] .'</th>';
						echo '<th>'. $row['DescripcionSalon'] .'</th>';
						echo '</tr>';
					}					
					mysqli_close($con);
				?>	
			</tbody>
			</table><br>
			<div >
				<form id="formularionuevotiposesion">
				<fieldset>
				<div id="col1">
				<label>Nombre </label>
				<input type="text" id="NombreSalon"></input><div id="escondido"><label id="warning1">*Este es un campo requerido</label></div><br>
				<label>Descripci&oacute;n</label><br>
				<textarea id="DescripcionSalon"></textarea><div id="escondido"><label id="warning2">*Este es un campo requerido</label></div><br><br>
				</div>
				<input type="button" id="Guardar" value="Guardar" onclick="validar_campos()" class="TipoBoton3" />
			    </fieldset>
			    </form>
			</div>
		</div>
	</div>
</body>
</html>
