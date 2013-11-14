<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SAC</title>
<link rel="stylesheet" type="text/css" href="../estilos/EstilosGenericos.css">
<link rel="stylesheet" type="text/css" href="../estilos/AgregarRecursos.css">
<script src="../js/Recursos.js"> </script>
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
			<input type="button" id="Nuevo_recurso" value="Nuevo recurso" onclick="mostrar_formulario()"  class="TipoBoton1" /><br><br>
			<!--table align="center">
			<thead>
				<tr>
				<th><label>Recurso</label></th>
				<th><label>Tipo</label></th>
				<th><label>Usuario</label></th>
				<th><label>Eliminar</label></th>
				<th><label>Ver</label></th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<th><label>Recurso 1</label></th>
				<th><label>URL</label></th>
				<th><label>usuario 1</label></th>
				<th><button id="eliminar" class="TipoBoton2"><img src="../multimedia/BotonEliminar.png" height="30" width="30"></button></th>
				<th><button id="ver" class="TipoBoton2"><img src="../multimedia/BotonVerDetalle.png" height="30" width="30"></button></th>	
				</tr>
			</tbody>
			</table><br-->
			<?php
            
                //$idSesion =  $_GET["idSesion"];
		        $idSesion = 1;
                $con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");
                
                // Check connection
                if (mysqli_connect_errno($con))
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
                $result = mysqli_query($con, "SELECT * FROM SAC_Recurso WHERE FK_IdSesion = '".$idSesion."'");
                echo "<table align=\"center\"><thead>
					<tr>
					<th><label>Recurso</label></th>
					<th><label>Ver</label></th>
					<th><label>Eliminar</label></th>
					</tr>
				</thead><tbody>";
                while($row = mysqli_fetch_array($result))
                  {
                    echo "<tr><th><label>".$row['DetalleRecurso']."</label></th><th><input type =\"button\" onclick=\"abrirRecurso('".$row['TipoRecurso']."','".$row['DetalleRecurso']."')\" value =\"Ver\"></input></th>
                    <th><input type =\"button\" onclick=\"eliminarRecurso('".$row['IdRecurso']."')\" value =\"Eliminar\"></input></th></tr>";
                  }
                echo "</tbody></table><br>";
                mysqli_close($con);
            ?>
			<div id="formulario_recurso">
				<label>Tipo de recurso</label><br>
				<select id="recurso">
					<option>PDF</option>
					<option>URL</option>
				</select><br><br>
				<input type="button" id="continuar" onclick="mostrar_subform()" value="Continuar" class="TipoBoton1"><br>
				<div id="escondido1">
					<label>Cargar archivo</label><input type="file"/>
					<input type="button" class="TipoBoton3" id="Guardar" value="Guardar" onclick="guardar()">
				</div><br>
				<div id="escondido2">
					<label>Digite la url:</label><input type="text" id="txt_url" /><div id="warning1"><label>No se digit&oacute; la url</label></div>
					<input type="button" class="TipoBoton3" id="Guardar" value="Guardar" onclick="guardar()">
				</div>
			</div>
		</div>
	</div>
</body>
</html>
