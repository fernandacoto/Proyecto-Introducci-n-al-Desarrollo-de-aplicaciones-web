<?php
	$nombresesion= $_POST["nombresesion"];
	$descripcion= $_POST["descripcion"];
	$Hilos= $_POST["Hilos"];
	$HoraInicio= $_POST["HoraInicio"];
	$HoraFin= $_POST["HoraFin"];
	$Tiposesion= $_POST["Tiposesion"];
	$salon= $_POST["salon"];
	$idHilo= $_POST["idHilo"];
	
	$con=mysqli_connect("localhost","murena","murena","jsanchez");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	
	$query = sprintf("INSERT INTO `jsanchez`.`sac_sesion` (`IdSesion`, `NombreSesion`, `DescripcionSesion`, `HoraInicioSesion`, `HoraFinSesion`, `FK_IdTipoSesion`, `FK_IdSalon`, `FK_IdHilo`) VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s');",
    mysql_real_escape_string($nombresesion),
    mysql_real_escape_string($descripcion),
    mysql_real_escape_string($HoraInicio),
    mysql_real_escape_string($HoraFin),
    mysql_real_escape_string($Tiposesion),
    mysql_real_escape_string($salon),
    mysql_real_escape_string($Hilos)    
    );
	echo $query;
    $result = mysqli_query($con, $query);
    echo $result;
   	mysqli_close($con);
   	
   	$url = 'http://localhost/proyecto/Repositorio/UsuarioAdministrador/CrearSesiones.php?idHilo='.$idHilo; 
	header( "Location: $url" );
?>