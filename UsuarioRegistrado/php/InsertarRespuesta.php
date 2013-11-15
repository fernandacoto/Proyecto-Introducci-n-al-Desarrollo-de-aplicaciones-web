<?php
	$Respuesta= $_POST["InputRespuesta"];
	$IdSesion= $_POST["IdSesionResp"];
	$IdUsuario= $_POST["IdUsuarioResp"];
	$IdPregunta= $_POST["IdPreguntaR"];
	echo $IdSesion;
	echo $IdUsuario;
	echo $IdPregunta;
	$con=mysqli_connect("localhost","root","wcuadra","jsanchez");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	  echo $Respuesta;
	$query = sprintf("UPDATE `sac_pregunta` SET `Respuesta`= '%s' where `IdPregunta` = %s",
    $Respuesta,
	intval($IdPregunta)
    );
	echo $query;
    $result = mysqli_query($con, $query);
    echo $result;
   	mysqli_close($con);
	$url = 'http://localhost:8080/SAC/UsuarioRegistrado/CrearPregunta.php?IdSesion='.$IdSesion.'&IdUsuario='.$IdUsuario; 
	header( "Location: $url" );
?>

