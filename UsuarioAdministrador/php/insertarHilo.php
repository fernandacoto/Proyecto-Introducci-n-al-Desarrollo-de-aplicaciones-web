<?php
	$nombreHilo= $_POST["nombreHilo"];
	$descripcionHilo= $_POST["descripcionHilo"];
	$lugarHilo= $_POST["lugarHilo"];
	$fechaHilo= $_POST["fechaHilo"];
	$idProyecto= $_POST["idProyecto"];
	
	$con=mysqli_connect("localhost","murena","murena","jsanchez");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	
	$query = sprintf("INSERT INTO `sac_hilo` (`IdHilo` ,`NombreHilo` ,`DescripcionHilo` ,`LugarHilo` ,`FechaHilo` ,`FK_IdEvento`)VALUES (NULL ,  '%s',  '%s',  '%s',  '%s',  '%s');",
    mysql_real_escape_string($nombreHilo),
    mysql_real_escape_string($descripcionHilo),
    mysql_real_escape_string($lugarHilo),
    mysql_real_escape_string($fechaHilo),
    mysql_real_escape_string($idProyecto)    
    );
	echo $query;
    $result = mysqli_query($con, $query);
    echo $result;
   	mysqli_close($con);
	$url = 'http://localhost/proyecto/Repositorio/UsuarioAdministrador/AdministradorHilos.php?idProyecto='.$idProyecto; 
	header( "Location: $url" );
?>