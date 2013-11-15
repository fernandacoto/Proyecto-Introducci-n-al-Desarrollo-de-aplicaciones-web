<?php
if (isset($_POST["BotonEnviar"]))
{
	$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	$curso_nuevo = $_POST["url"];
	echo $curso_nuevo;
	mysqli_query($con,"INSERT INTO SAC_Recurso (DetalleRecurso, TipoRecurso) VALUES ('".$curso_nuevo."', '1')");
	mysqli_close($con);
 }
header ("Location: http://ic-itcr.ac.cr/~fcoto/SAC/UsuarioAdministrador/AgregarRecursos.php");
?>