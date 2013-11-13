<?php
	$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$NombreTipoSesion = $_GET["NombreTipoSesion"];
	$DescripcionTipoSesion = $_GET["DescripcionTipoSesion"];
	
	mysqli_query($con,"INSERT INTO SAC_TipoSesion (NombreTipoSesion, DescripcionTipoSesion) VALUES ('$NombreTipoSesion', '$DescripcionTipoSesion')");

	mysqli_close($con);
?>