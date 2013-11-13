<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SAC</title>
<link rel="stylesheet" type="text/css" href="../estilos/EstilosGenericos.css">
<link rel="stylesheet" type="text/css" href="InicioSesion.css">
<script type="text/javascript" src="../js/IniciarSesion.js"></script>
</head>

<body>
	<div id="Contenido">
		<div id="Header">	
			<div id="Banner">	
				<img border="0" src="../multimedia/banneropcional.gif" alt="Banner" width="100%" height="20%">
			</div>	
		</div>
		
		<div id="Contenido">
			<div id="MenuBar" class="MenuBar" >
				<ul>
					<li><a href="#IniciarSesion">Iniciar Sesión</a></li>
					<li><a href="./CrearEventos.html">Eventos</a></li>
					<li><a href="./VerTipoSesiones.html">Tipos de Sesión</a></li>
					<li><a href="./VerSalones.html">Salones</a></li>					
					<li><a href="../Registro/RegistroPaso1.html">Registrarse</a></li>						
					<li><a href="../UsuarioAdministrador/CrearEventos.html">Administrador</a></li>		
				</ul>
			</div>
		</div><br>
	</div>
	<div id="FondoInicioSesion" class="FondoInicioSesion">
		<div id="InicioSesion" class="InicioSesion">
			<?php
				require 'openid.php';
				try {
				    # Change 'localhost' to your domain name.
				    $openid = new LightOpenID('localhost');
				    if(!$openid->mode) {
				        if(isset($_POST['openid_identifier'])) {
				            $openid->identity = $_POST['openid_identifier'];
				            # The following two lines request email, full name, and a nickname
				            # from the provider. Remove them if you don't need that data.
				            $openid->required = array('contact/email');
				            $openid->optional = array('namePerson', 'namePerson/friendly');
				            header('Location: ' . $openid->authUrl());
				            
				        }
				?>
				<form action="" method="post">
				    <div class="auto-style1">
						<span class="Titulo1">Iniciar sesión</span><span class="Titulo2"><br>
						<br>OpenId:</span> <input type="text" name="openid_identifier" /><br>&nbsp;<br>
				    <button>Ingresar</button>
					</div>
				</form>
				<?php
				    } elseif($openid->mode == 'cancel') {
				        echo 'User has canceled authentication!';
				    } else {
				        echo 'User ' . ($openid->validate() ? $openid->identity . ' has ' : 'has not ') . 'logged in.';
						print_r($openid->getAttributes());
						echo '<script type="text/javascript">', 'almacenarCookieUsuario("',$openid->identity,'");', '</script>';
				    }
				} catch(ErrorException $e) {
				    echo $e->getMessage();
				}
			?>
			<div class="IS">
				<form  action="./php/iniciar_sesion.php"  method="POST" >
				<label>Nombre de usuario</label>
				<input type="text" id="nombre_usuario" name="nombre_usuario"></input><div id="escondido"><label id="warning5">*Este es un campo requerido</label></div><br><br>
				<label>Contrase&ntilde;a</label>
				<input type= "password" id="contrasenna" name="contrasenna"></input><div id="escondido"><label id="warning6">*Este es un campo requerido</label></div><br><br>
			    <input type="submit"  value="Ingresar" name = "BotonEnviar " />
			    </form>
			</div>
		</div>
	</div>
</body>
</html>
