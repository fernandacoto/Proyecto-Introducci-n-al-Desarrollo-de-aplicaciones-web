<?php
	$DetalleRespuesta= htmlspecialchars($_POST["Resp"]);
	$IdSesion= $_POST["IdSesion"];
	$IdUsuario= $_POST["IdUsuario"];
	
	$con=mysqli_connect("localhost","root","wcuadra","jsanchez");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	$query = sprintf("INSERT INTO `sac_pregunta` (`DetallePregunta`, `Respuesta`,`FechaPregunta` ,`FK_IdUsuario` ,`FK_IdSesion`)VALUES ('%s',  NULL,  (Select SYSDATE()),  '%s',  '%s');",
    mysql_real_escape_string($DetallePregunta),
    mysql_real_escape_string($IdUsuario),
    mysql_real_escape_string($IdSesion)   
    );
	echo $query;
    $result = mysqli_query($con, $query);
    echo $result;
   	mysqli_close($con);
	$url = 'http://localhost:8080/SAC/UsuarioRegistrado/CrearPregunta.php?IdSesion='.$IdSesion.'&IdUsuario='.$IdUsuario; 
	header( "Location: $url" );
?>