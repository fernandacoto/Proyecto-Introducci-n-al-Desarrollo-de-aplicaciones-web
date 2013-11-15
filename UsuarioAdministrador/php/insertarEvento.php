<?php
	$InputNombreEvento= $_POST["InputNombreEvento"];
	$InputDescripcionEvento= $_POST["InputDescripcionEvento"];
	$InputLugarEvento= $_POST["InputLugarEvento"];
	$InputFechaInicioEvento= $_POST["InputFechaInicioEvento"];
	$InputFechaFinEvento= $_POST["InputFechaFinEvento"];
	$InputPlazoPropuestaEvento= $_POST["InputPlazoPropuestaEvento"];
	$SelectTipoPlazo= $_POST["SelectTipoPlazo"];
	$InputFechaFinEvento= $_POST["InputFechaFinEvento"];

	$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	$query = sprintf("INSERT INTO SAC_Evento (`IdEvento`, `NombreEvento`, `DescripcionEvento`, `LugarEvento`, `FechaInicioEvento`, `FechaFinEvento`, `PlazoPropuesta`, `TipoPlazoPropuesta`) VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s');",
    $InputNombreEvento,
    $InputDescripcionEvento,
    $InputFechaInicioEvento,
    $InputFechaFinEvento,
    $InputPlazoPropuestaEvento,
    $SelectTipoPlazo,
    $InputFechaFinEvento    
    );
	echo $query;
    $result = mysqli_query($con, $query);
    echo $result;
   	mysqli_close($con);
	$url = 'http://ic-itcr.ac.cr/~fcoto/SAC/UsuarioAdministrador/AdministradorEventos.php'; 
	header( "Location: $url" );
?>