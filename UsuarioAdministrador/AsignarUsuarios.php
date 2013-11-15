<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>SAC</title>
<link rel="stylesheet" type="text/css" href="../estilos/AsignarUsuariosS.css">
<script type="text/javascript" src="../js/AsignarUsuariosS.js"></script>
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
					<li><a href="./CrearEventos.hphp">Eventos</a></li>
					<li><a href="./CrearTipoSesion.php">Tipos de Sesión</a></li>
					<li><a href="./CrearSalon.html">Salones</a></li>				
					<li><a href="../UsuarioGeneral/IniciarSesion.php" onclick="return cerrarSesion()">Cerrar Sesi&oacute;n</a></li>	
				</ul>
			</div><br>
			<div>
				<span class="auto-style1">
				<label class="Titulo1"><br>Asignar Usuarios<br></label></span><br>
			</div>
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
			
			<div id="Tabla">
				<table align="center">
					<thead>
						<tr>
							<th>Nombre Usuario</th>
							<th>Usuario</th>
							<th>Correo</th>
						</tr>
					</thead>
					<?php
					$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");
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
					$query2 = sprintf("SELECT U.NombrePersona, U.NombreUsuario, U.CorreoElectronico FROM SAC_Usuario U inner join SAC_UsuarioXSesion US on U.IdUsuario = US.FK_IdUsuario where US.FK_IdSesion = %s", $IdSesion);
					$result1 = mysqli_query($con,$query2);
					while($row1 = mysqli_fetch_array($result1))
					{
						echo '<tr>';
						echo "<th>" . $row1['NombrePersona'] . "</th>";
						echo "<th>" . $row1['NombreUsuario'] . "</th>";
						echo "<th>" . $row1['CorreoElectronico'] . "</th>";
						echo "</tr>";
					}
					mysqli_close($con);
					?>
				</table>
			</div>
			<div id="dvForm" align= "center">
				<form id="formularioAsignar" method="post" action="./php/asignarUsuario.php">
				<fieldset>
				<legend id="legenda">Asignar</legend>
				<div id="col1">
				<input type="hidden" value="<?php if(isset($_GET['IdSesion'])) {echo  $_GET['IdSesion'];}?>" name="IdSesion">
				<text id="usuarios">Usuarios:</text>
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
					$result2 = mysqli_query($con,"SELECT * FROM sac_usuario U inner join sac_usuarioxsesion US on  U.IdUsuario = US.FK_IdUsuario where US.FK_IdSesion != %s", $IdSesion);
					echo '<select id="usuariosDrop" name="usuariosDrop">';
					echo '<option value="seleccione">--Seleccione uno--</option>';
					while($row2 = mysqli_fetch_array($result2))
					{
						echo '<option value=' . $row2['IdUsuario'] .'>' . $row2['NombrePersona'] . '</option>';
					}
					echo '</select>';
					mysqli_close($con);
				?>
				</div><br><br><br><br>
				<input type="button" id="btnAsignar" value="Asignar Usuario" onclick="validarForm()" class="TipoBoton3" />
			    </fieldset>
			    </form>
			</div>
		</div>
	</div>
</body>

</html>
