<?php
	$usuariosDrop= $_POST["usuariosDrop"];
	$IdSesion= $_POST["IdSesion"];
	$con=mysqli_connect("localhost","root","wcuadra","jsanchez");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	
	$query = sprintf("INSERT INTO `sac_usuarioxsesion` (`FK_IdUsuario`,`FK_IdSesion`)VALUES ('%s',  '%s');",
    mysql_real_escape_string($usuariosDrop),
	mysql_real_escape_string($IdSesion)
    );
	echo $query;
    $result = mysqli_query($con, $query);
    echo $result;
   	mysqli_close($con);
	$url = 'http://localhost:8080/SAC/UsuarioAdministrador/AsignarUsuarios.php?IdSesion='.$IdSesion; 
	header( "Location: $url" );
?>