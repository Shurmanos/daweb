<?php
	include_once("crearBDBoletinb.php");
	session_start();
	//obtenemos la id de la página a la que vamos acceder, esta variable se la pasamos a través de la url
	$id = $_REQUEST['id'];
	
	include_once("modelo.php");
	
	//accedemos a la página que obtenemos a través de la ID
	switch($id){
		case 'comienzo':
			//inicializamos las variables
			$_SESSION['usuario'] = $_POST['usuario'];
			$_SESSION['aciertos'] = 0;
			$_SESSION['fallos'] = 0;
			$_SESSION['inicio'] = time();
			
			//conectamos con la BD para comprobar si el usuario existe, en caso de que exista le volvemos a pedir que inserte otro nombre
			$sql = selectComienzo();
			mysql_close($conexion);
			
			if(mysql_num_rows($sql) == 0){
				header('Location: pregunta1b.php');
			}else{
				header('Location: ejercicio8Boletin.php');
			}
			
			break;
			
		case 'pregunta1':
			//obtenemos la respuesta a la primera pregunta
			$respuesta = $_POST["respuesta"];
			
			//si la respuesta es correcta sumamos un acierto, sino le volvemos a pedir que conteste la pregunta una última vez
			if($respuesta == "d"){
				$_SESSION['aciertos'] = $_SESSION['aciertos'] + 1;
				//conectamos con la BD e insertamos el resultado
				$_SESSION['contesta1'] = date("d-m-y/h:i:s");
				$sql = insertPregunta('1');
				$_SESSION['contador'] = 0;
				header('Location: pregunta2b.php');
			}else{
				if($_SESSION['contador'] < 1){
					$_SESSION['fallos'] = $_SESSION['fallos'] + 1;
					$_SESSION['contador'] = $_SESSION['contador'] + 1;
					//conectamos con la BD e insertamos el resultado
					$_SESSION['contesta1'] = date("d-m-y/h:i:s");
					$sql = insertPregunta('1');
					
					header('Location: pregunta1b.php');
				}else{
					$_SESSION['contador'] = 0;
					header('Location: pregunta2b.php');
				}
			}
				
			break;
			
			
		case 'pregunta2':
		
		
			//obtenemos la respuesta a la primera pregunta
			$respuesta = $_POST["respuesta"];
			
			//si la respuesta es correcta sumamos un acierto, sino le volvemos a pedir que conteste la pregunta una última vez
			if($respuesta == "d"){
				$_SESSION['aciertos'] = $_SESSION['aciertos'] + 1;
				//conectamos con la BD e insertamos el resultado
				$_SESSION['contesta2'] = date("d-m-y/h:i:s");
				$sql = insertPregunta('2');
				$_SESSION['contador'] = 0;
				header('Location: pregunta3b.php');
			}else{
				if($_SESSION['contador'] < 1){
					$_SESSION['fallos'] = $_SESSION['fallos'] + 1;
					$_SESSION['contador'] = $_SESSION['contador'] + 1;
					//conectamos con la BD e insertamos el resultado
					$_SESSION['contesta2'] = date("d-m-y/h:i:s");
					$sql = insertPregunta('2');
					
					header('Location: pregunta2b.php');
				}else{
					$_SESSION['contador'] = 0;
					header('Location: pregunta3b.php');
				}
			}
				
			break;
			
			
		case 'pregunta3':
		
		
			//obtenemos la respuesta a la primera pregunta
			$respuesta = $_POST["respuesta"];
			
			//si la respuesta es correcta sumamos un acierto, sino le volvemos a pedir que conteste la pregunta una última vez
			if($respuesta == "b"){
				$_SESSION['aciertos'] = $_SESSION['aciertos'] + 1;
				//conectamos con la BD e insertamos el resultado
				$_SESSION['contesta3'] = date("d-m-y/h:i:s");
				$sql = insertPregunta('3');
				$_SESSION['contador'] = 0;
				header('Location: pregunta4b.php');
			}else{
				if($_SESSION['contador'] < 1){
					$_SESSION['fallos'] = $_SESSION['fallos'] + 1;
					$_SESSION['contador'] = $_SESSION['contador'] + 1;
					//conectamos con la BD e insertamos el resultado
					$_SESSION['contesta3'] = date("d-m-y/h:i:s");
					$sql = insertPregunta('3');
					
					header('Location: pregunta3b.php');
				}else{
					$_SESSION['contador'] = 0;
					header('Location: pregunta4b.php');
				}
			}
				
			break;
			
			
		case 'pregunta4':
		
		
			//obtenemos la respuesta a la primera pregunta
			$respuesta = $_POST["respuesta"];
			
			$_SESSION['fin'] = time();
			//Obtenemos el tiempo en segundos que ha tardado el usuario en resolver el juego
			$tiempo = $_SESSION['fin'] - $_SESSION['inicio'];
			
			//si la respuesta es correcta sumamos un acierto, sino le volvemos a pedir que conteste la pregunta una última vez
			if($respuesta == "a"){
				$_SESSION['aciertos'] = $_SESSION['aciertos'] + 1;
				//conectamos con la BD e insertamos el resultado
				$_SESSION['contesta4'] = date("d-m-y/h:i:s");
				$sql = mysql_query("INSERT INTO tiempo (usuario,pregunta,tiempo) VALUES ('".$_SESSION['usuario']."','4','".$_SESSION['contesta4']."')",$conexion);
				$_SESSION['contador'] = 0;
				$resultado = insertPregunta('4');
				header('Location: resultadob.php');
			}else{
				if($_SESSION['contador'] < 1){
					$_SESSION['fallos'] = $_SESSION['fallos'] + 1;
					$_SESSION['contador'] = $_SESSION['contador'] + 1;
					//conectamos con la BD e insertamos el resultado
					$_SESSION['contesta4'] = date("d-m-y/h:i:s");
					$sql = insertPregunta('4');
					
					header('Location: pregunta4b.php');
				}else{
					$_SESSION['contador'] = 0;
					$resultado = insertPregunta4();
					header('Location: resultadob.php');
				}
			}
				
			break;
	
	}
	mysql_close($conexion);
?>