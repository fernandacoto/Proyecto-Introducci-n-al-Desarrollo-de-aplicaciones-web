<?php
	$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$IdSalon = $_GET["IdSalon"];
	
	mysqli_query($con,"DELETE FROM SAC_Salon WHERE IdSalon='$IdSalon'");

	mysqli_close($con);
?>