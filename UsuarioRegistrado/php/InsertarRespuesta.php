<?php
	$Respuesta= $_POST["InputRespuesta"];
	$IdSesion= $_POST["IdSesionResp"];
	$IdUsuario= $_POST["IdUsuarioResp"];
	$IdPregunta= $_POST["IdPreguntaR"];
	echo $IdSesion;
	echo $IdUsuario;
	echo $IdPregunta;
	$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	  echo $Respuesta;
	$query = sprintf("UPDATE SAC_Pregunta SET 'Respuesta'= '%s' where 'IdPregunta' = %s",
    $Respuesta,
	intval($IdPregunta)
    );
	echo $query;
    $result = mysqli_query($con, $query);
    echo $result;
   	mysqli_close($con);
	$url = 'http://ic-itcr.ac.cr/~fcoto/SAC/UsuarioRegistrado/CrearPregunta.php?IdSesion='.$IdSesion.'&IdUsuario='.$IdUsuario; 
	header( "Location: $url" );
?>

