<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>SAC</title>
<link rel="stylesheet" type="text/css" href="../estilos/AdministradorHilos.css">
<link rel="stylesheet" type="text/css" href="../estilos/EstilosGenericos.css">
<script type="text/javascript" src="../js/AdministradorHilos.js"></script>
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
			</div><br>
			<div>
				<span class="auto-style1">
				<label class="Titulo1">Hilos<br></label></span><br>
			</div>
			<div id = "Botones">
				<button  onclick="location.href='./CrearEventos.php'" id="Volver">Volver</button><br>
				<button id="Nuevo" onclick="Mostrar()">Nuevo Hilo</button><br>
			</div>
			
			<div id="Tabla" class="Tabla">
				<table align="center">
				<thead>
					<tr>
						<th style="width: 93px">Nombre</th>
						<th>Lugar</th>
						<th>Fecha</th>
						<th>Editar</th>
						<th>Eliminar</th>
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
								echo '<th><button id="editar" class="TipoBoton2"><img src="../multimedia/BotonEditar.png" height="30" width="30"></button></th>';
								echo '<th><button id="eliminar" class="TipoBoton2"><img src="../multimedia/BotonEliminar.png" height="30" width="30"></button></th>';	
								echo '<th> <a  href="./CrearSesiones.php?idHilo='.$idHilo.'"> <img src="../multimedia/BotonVerDetalle.png" height="30" width="30"></a></th>';
								echo '</tr>';
							}					
							mysqli_close($con);
						?>				
				</table>
				<div id="Formulario" class ="oculto">
					<form id="formCrearHilo" name="formCrearHilo" class="FormSAC"  method="post" action="./php/insertarHilo.php">
						<Fieldset id="nuevoHilo">
							<legend id="legenda">Nuevo Hilo</legend>
							<input type="hidden" value="<?php if(isset($_GET['idProyecto'])) {echo  $_GET["idProyecto"];}?>" name="idProyecto">
							Nombre del Hilo: <input type="text" id="nombreHilo" name="nombreHilo"> <br><br>
							Descripción: <input type="text" id="descripcionHilo" name="descripcionHilo"><br><br>
							Lugar: <input type="text" id="lugarHilo" name="lugarHilo"><br><br>
							Fecha: <input type="text" id="fechaHilo" name="fechaHilo"><br><br>
							<button id="submitMiForm" name="" onclick="validarForm()">Guardar</button><br>
						</Fieldset>	
					</form>
				</div>
			</div>
			
		</div>
	</div>
</body>

</html>
