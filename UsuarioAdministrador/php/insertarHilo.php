<?php
	$nombreHilo= $_POST["nombreHilo"];
	$descripcionHilo= $_POST["descripcionHilo"];
	$lugarHilo= $_POST["lugarHilo"];
	$fechaHilo= $_POST["fechaHilo"];
	$idProyecto= $_POST["idProyecto"];
	
	$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	
	$query = sprintf("INSERT INTO SAC_Hilo (`IdHilo` ,`NombreHilo` ,`DescripcionHilo` ,`LugarHilo` ,`FechaHilo` ,`FK_IdEvento`)VALUES (NULL ,  '%s',  '%s',  '%s',  '%s',  '%s');",
    $nombreHilo,
    $descripcionHilo,
    $lugarHilo,
    $fechaHilo,
    $idProyecto    
    );
	echo $query;
    $result = mysqli_query($con, $query);
    echo $result;
   	mysqli_close($con);
	$url = 'http://ic-itcr.ac.cr/~fcoto/SAC/UsuarioAdministrador/AdministradorHilos.php?idProyecto='.$idProyecto; 
	header( "Location: $url" );
?>