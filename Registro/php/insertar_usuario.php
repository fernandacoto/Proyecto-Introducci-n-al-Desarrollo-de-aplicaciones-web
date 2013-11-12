<?php
	if (isset($_POST["BotonEnviar"]))
	{
		//print_r($_FILES);
		////////////////
		$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

		$sql="INSERT INTO SAC_Usuario (Nombre_Proyecto, Descripcion, Rol, Curso)
		VALUES
		('$_POST[nombre]','$_POST[descrip]','$_POST[rol]','$_POST[curso]')";
		if (!mysqli_query($con,$sql))
		  {
		  die('Error: ' . mysqli_error($con));
		  }
		mysqli_close($con);
	}
	else
	{
		print("No es valido");
	}
	 header ("Location: http://ic-itcr.ac.cr/~fcoto/SAC/RegistroPaso1.php");
?>
