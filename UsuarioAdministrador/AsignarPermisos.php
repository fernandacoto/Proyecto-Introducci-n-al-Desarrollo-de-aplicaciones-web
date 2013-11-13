<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>SAC</title>
<link rel="stylesheet" type="text/css" href="../estilos/AsignarPermisos.css">
<script type="text/javascript" src="../js/AsignarUsuariosS.js"></script>
<script src="../js/jquery-1.8.1.min.js" type="text/javascript"></script>
</head>
<script type="text/javascript">
function asignar(IdUsuario, Seleccion)
{
	var valor=document.getElementById(Seleccion);
	var evento =valor.options[valor.selectedIndex].value;
	var xmlhttp;
		if (window.XMLHttpRequest)
		{
			xmlhttp=new XMLHttpRequest();
		}
		else
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
    
		xmlhttp.onreadystatechange=function()
		{
   
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				try
				{

				}
				catch (e)
				{
			
				}
			}
		}
		xmlhttp.open("GET","Asignar.php?usuario=" + IdUsuario + "&evento=" + evento,true);
		xmlhttp.send();
}
</script>

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
			
			<div id="Tabla">
				<span class="auto-style1">
				<label class="Titulo1"><br>Asignar&nbsp; Permisos Administrador</label></span><table align="center">
				<thead>
					<tr>
						<th>Nombre</th>
						<th id="HI">Correo</th>
						<th id="HF">Nombre Usuario</th>
						<th>Evento</th>
						<th>Asignar</th>
					</tr>
				</thead>
					<?php
					$con=mysqli_connect("localhost","root","wcuadra", "jsanchez");
					// Check connection
					if (mysqli_connect_errno())
					{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					$result1 = mysqli_query($con,"SELECT * FROM SAC_usuario");
					$cont = 0;
					while($row1 = mysqli_fetch_array($result1))
					{
						echo '<tr>';
						echo "<th>" . $row1['NombrePersona'] . "</th>";
						echo "<th>" . $row1['CorreoElectronico'] . "</th>";
						echo "<th>" . $row1['NombreUsuario'] . "</th>";
						$result2 = mysqli_query($con,"SELECT * FROM SAC_evento");
						echo "<th>";
						echo '<select id="'. $cont .'" name="Eventos">';
						echo '<option value="seleccione">--Seleccione uno--</option>';
						while($row2 = mysqli_fetch_array($result2))
						{
								echo '<option value=' . $row2['IdEvento'] .'>' . $row2['NombreEvento'] .'</option>';
						}
						echo '</select>';
						echo "</th>";
						echo "<th>";
						echo '<button class="TipoBoton2" onclick="asignar('. $row1['IdUsuario'] .', '. $cont .')">Asignar Permisos</button>';
						echo "</th>";
						echo "</tr>";
						$cont = $cont + 1;
					}
					mysqli_close($con);
					?>
				</table>
			</div>
		</div>
	</div>
</body>

</html>
