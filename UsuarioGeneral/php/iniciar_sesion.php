<?php
	$usuario = $_POST["nombre_usuario"];
	$password  = $_POST["contrasenna"];
	$con=mysqli_connect("terraba.ic-itcr.ac.cr","jsanchez","jsanchez","jsanchez");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	$query = sprintf("SELECT * FROM SAC_Usuario WHERE NombreUsuario =  '%s' AND Contrasena =  '%s'",
	$usuario,
   $password);
    $result = mysqli_query($con, $query);
   	$row = mysqli_fetch_array($result);
   	mysqli_close($con);
   	if( $row['IdUsuario'] != NULL){
   		if($row['FK_IdTipoUsuario'] == 1)
   		{
   			$url = 'http://ic-itcr.ac.cr/~fcoto/SAC/UsuarioAdministrador/CrearEventos.php'; 
   		}
   		if($row['FK_IdTipoUsuario'] == 2)
   		{
   			$url = 'http://ic-itcr.ac.cr/~fcoto/SAC/UsuarioRegistrado/CrearEventos.php'; 
   		}
		header( "Location: $url" );
		session_start();
		setcookie('usuario', $row['IdUsuario'], time()+86000);
	 	$_SESSION['user_id']= $row['IdUsuario'];
	    $_SESSION['logged_id']=True;

   	}else{
		$url = 'http://ic-itcr.ac.cr/~fcoto/SAC/UsuarioGeneral/IniciarSesion.php'; 
		header( "Location: $url" );
   	}
?>