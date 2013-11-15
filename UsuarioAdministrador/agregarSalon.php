<?php
	$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$NombreSalon = $_GET["NombreSalon"];
	$DescripcionSalon = $_GET["DescripcionSalon"];
	
	mysqli_query($con,"INSERT INTO SAC_Salon (NombreSalon, DescripcionSalon) VALUES ('$NombreSalon', '$DescripcionSalon')");

	mysqli_close($con);
?>