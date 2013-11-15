<?php
if (isset($_GET["Id"]))
{
	$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	$curso_nuevo = $_GET["Id"];
	mysqli_query($con,"DELETE FROM SAC_Recurso WHERE IdRecurso = '".$curso_nuevo."'");
	header ("Location: http://ic-itcr.ac.cr/~fcoto/SAC/UsuarioAdministrador/AgregarRecursos.php");
	mysqli_close($con);
 }
?>