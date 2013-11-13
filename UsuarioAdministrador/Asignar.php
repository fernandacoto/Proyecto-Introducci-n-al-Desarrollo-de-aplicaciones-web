<?php
				$con=mysqli_connect("localhost","root","wcuadra", "jsanchez");
				// Check connection
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				$IdUsuario=$_GET["usuario"];
				echo $IdUsuario;
				$IdEvento=$_GET["evento"];
				echo $IdEvento;
				$query2 = sprintf("UPDATE sac_evento SET IdUsuarioAdministrador = %s WHERE IdEvento = %s", intval($IdUsuario), intval($IdEvento));
				$result = mysqli_query($con,$query2);
				echo $query2;
				mysqli_close($con);
			?>