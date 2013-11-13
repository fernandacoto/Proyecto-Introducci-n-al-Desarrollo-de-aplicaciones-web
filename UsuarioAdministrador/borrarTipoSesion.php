<?php
	$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$IdTipoSesion = $_GET["IdTipoSesion"];
	
	mysqli_query($con,"DELETE FROM SAC_TipoSesion WHERE IdTipoSesion='$IdTipoSesion'");

	mysqli_close($con);
?>