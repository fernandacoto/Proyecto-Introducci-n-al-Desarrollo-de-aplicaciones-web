<?php
				$IdPregunta=$_GET["pregunta"];
				echo $IdPregunta;
				$url = 'http://localhost:8080/SAC/UsuarioRegistrado/Respuesta.php?IdPregunta='.$IdPregunta; 
				header( "Location: $url" );
			?>