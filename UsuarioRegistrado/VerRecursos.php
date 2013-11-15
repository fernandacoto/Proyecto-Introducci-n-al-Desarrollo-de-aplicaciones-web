<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SAC</title>
<link rel="stylesheet" type="text/css" href="../estilos/EstilosGenericos.css">
<link rel="stylesheet" type="text/css" href="../estilos/AgregarRecursos.css">
<script type="text/javascript" src="../js/VerRecursos.js"></script>
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
		</div> <br>
		<label class="Titulo1">Detalles de sesi&oacute;n &nbsp;</label>
		<?php
            
                //$idSesion =  $_GET["idSesion"];
		        $idSesion = 1;
                $con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");
                
                // Check connection
                if (mysqli_connect_errno($con))
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
                $result = mysqli_query($con, "SELECT * FROM SAC_Sesion WHERE IdSesion = '".$idSesion."'");
                while($row = mysqli_fetch_array($result))
                  {
                    echo "<label class=\"Titulo2\">".$row['NombreSesion']."</label><br><br>";
                  }
                mysqli_close($con);
            ?>
		
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
					</tr>
				</thead><tbody>";
                while($row = mysqli_fetch_array($result))
                  {
                    echo "<tr><th><label>".$row['DetalleRecurso']."</label></th><th><input type =\"button\" onclick=\"abrirRecurso('".$row['TipoRecurso']."','".$row['DetalleRecurso']."')\" value =\"Ver\"></input></th></tr>";
                  }
                echo "</tbody></table><br>";
                mysqli_close($con);
            ?>
		</div>
	</div>
</body>
</html>
