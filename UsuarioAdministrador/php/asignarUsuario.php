<?php
	$usuariosDrop= $_POST["usuariosDrop"];
	$IdSesion= $_POST["IdSesion"];
	$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	
	$query = sprintf("INSERT INTO SAC_UsuarioXSesion (`FK_IdUsuario`,`FK_IdSesion`)VALUES ('%s',  '%s');",
    $usuariosDrop,
	$IdSesion
    );
	echo $query;
    $result = mysqli_query($con, $query);
    echo $result;
   	mysqli_close($con);
	$url = 'http://ic-itcr.ac.cr/~fcoto/SAC/UsuarioAdministrador/AsignarUsuarios.php?IdSesion='.$IdSesion; 
	header( "Location: $url" );
?>