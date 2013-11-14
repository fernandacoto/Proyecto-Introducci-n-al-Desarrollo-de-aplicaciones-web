<?php
if (isset($_POST["BotonEnviar"]))
{
	$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	foreach($_FILES as $arch)
		{
			move_uploaded_file($arch["tmp_name"],
			"../uploads/" . $arch["name"]);
			mysqli_query($con,"INSERT INTO SAC_Recurso (DetalleRecurso, TipoRecurso) VALUES ('".$arch["name"]."', '2')");
		}
	header ("Location: http://ic-itcr.ac.cr/~fcoto/SAC/UsuarioAdministrador/AgregarRecursos.php");
	mysqli_close($con);
 }
?>