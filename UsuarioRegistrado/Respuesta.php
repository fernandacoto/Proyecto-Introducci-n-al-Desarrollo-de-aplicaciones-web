<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SAC</title>
<link rel="stylesheet" type="text/css" href="../estilos/EstilosGenericos.css">
<link rel="stylesheet" type="text/css" href="../estilos/AgregarRecursos.css">
<script src="../js/Preguntas.js"> </script>
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
		<label class="Titulo1">Respuestas de preguntas</label>
		<label class="Titulo2">Respuesta</label><br><br>
		<div id="col1" width="20%">
			<label class="Titulo2">Menu
			</label>
			<table border="0">
			<tr>
				<td><a href="#">1.Ponentes</a></td>
			</tr>
			<tr>
				<td><a href="./CrearComentario.html">2.Comentarios</a></td>
			</tr>
			<tr>
				<td>
				<?php 
				echo '<a href="http://ic-itcr.ac.cr/~fcoto/SAC/UsuarioRegistrado/CrearPregunta.php?idSesion="';
			      $idSesion;
			      if(isset($_GET['idSesion'])) {
			      
			       $idSesion =  $_GET['idSesion'];
			       echo $idSesion;
			      }
				  echo '" >5.Preguntas <a>';
				?></td>
			</tr>
			<tr>
				<td><a href="./CrearNota.html">4.Notas</a></td>
			</tr>
			<tr>
				<td>
				<?php 
				echo '<a href="http://ic-itcr.ac.cr/~fcoto/SAC/UsuarioRegistrado/VerRecursos.php?idSesion="';
			      $idSesion;
			      if(isset($_GET['idSesion'])) {
			      
			       $idSesion =  $_GET['idSesion'];
			       echo $idSesion;
			      }
				  echo '" >5.Recursos <a>';
				?></td>
			</tr>
			</table>
		</div><br>
		<div id="col2" width="80%">
			<table align="center">
			<thead>
				<tr>
				<th><label>Respuesta</label></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");
					// Check connection
					if (mysqli_connect_errno())
					{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					$IdPregunta;
					if(isset($_GET['IdPregunta']))
					{
						$IdPregunta = $_GET['IdPregunta'];
					}
					$query = sprintf("SELECT Respuesta FROM SAC_Pregunta P where P.IdPregunta = %s", $IdPregunta);
					$result2 = mysqli_query($con,$query);
					
					while($row2 = mysqli_fetch_array($result2))
					{
						echo '<tr>';
						echo "<th>" . $row2['Respuesta'] . "</th>";
						echo "</tr>";
					}
					mysqli_close($con);
				?>
			</tbody>
			</table><br>
			
			
		</div>
	</div>
</body>
</html>
