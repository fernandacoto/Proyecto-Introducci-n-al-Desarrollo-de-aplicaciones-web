<?php
	$nombresesion= $_POST["nombresesion"];
	$descripcion= $_POST["descripcion"];
	$Hilos= $_POST["Hilos"];
	$HoraInicio= $_POST["HoraInicio"];
	$HoraFin= $_POST["HoraFin"];
	$Tiposesion= $_POST["Tiposesion"];
	$salon= $_POST["salon"];
	$idHilo= $_POST["idHilo"];
	
	$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	
	$query = sprintf("INSERT INTO SAC_Sesion (`IdSesion`, `NombreSesion`, `DescripcionSesion`, `HoraInicioSesion`, `HoraFinSesion`, `FK_IdTipoSesion`, `FK_IdSalon`, `FK_IdHilo`) VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s');",
    $nombresesion,
    $descripcion,
    $HoraInicio,
    $HoraFin,
    $Tiposesion,
    $salon,
    $Hilos    
    );
	echo $query;
    $result = mysqli_query($con, $query);
    echo $result;
   	mysqli_close($con);
   	
   	$url = 'http://ic-itcr.ac.cr/~fcoto/SAC/UsuarioAdministrador/CrearSesiones.php?idHilo='.$idHilo; 
	header( "Location: $url" );
?>