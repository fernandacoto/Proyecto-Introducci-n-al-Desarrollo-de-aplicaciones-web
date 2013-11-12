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

		$sql="INSERT INTO SAC_Usuario (NombreUsuario, Contrasena, NombrePersona, Apellido1, Apellido2, CorreoElectronico, TipoTrabajo, TipoEmpresa, FK_IdProvincia, FK_IdTipoUsuario)
		VALUES
		('$_POST[NombreUsuario]','$_POST[Contrasena]','$_POST[Nombre]','$_POST[Apellido1]','$_POST[Apellido2]','$_POST[Email]','$_POST[Trabajo]','$_POST[Tipo_Empresa]', '$_POST[Provincias]','2')";
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
	 header ("Location: http://ic-itcr.ac.cr/~fcoto/SAC/Registro/RegistroPaso1.php");
?>
