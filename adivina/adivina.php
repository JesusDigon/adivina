<!DOCTYPE html>
<html>
<head>
	<title>Adivina</title>
</head>
<body>
<div id="contenido">
	<?php
	
	session_start();
	
	print_r($_REQUEST);
	if(!isset($_SESSION['NumeroSecreto'])){
	    $_SESSION['NumeroSecreto']=rand(1,20);
		$_SESSION['intentos']=5;
		echo "<p>Bienvenido, Intente adivinar en qué número estoy pensando (1-20): </p>";
		include_once "formulario_adivina.php";
		
		
	}else{
		switch ($_REQUEST['orden']) {
			case "jugar":
				if(is_numeric($_REQUEST['numero'])){
					if(($_REQUEST['numero']) != $_SESSION['NumeroSecreto']){
					  
			
						if($_REQUEST['numero']>$_SESSION['NumeroSecreto']){
							echo"El número es más pequeño.";
							$_SESSION['intentos']--;
							if($_SESSION['intentos']==0){
							    echo "<h1>Lo siento, has predido.<h1>";
							    include_once 'seguir.html';
							    exit();
							}
							include_once "formulario_adivina.php";
							
						}else{
							echo"El número es más grande.";
							$_SESSION['intentos']--;
							if($_SESSION['intentos']==0){
							    echo "<h1>Lo siento, has predido.<h1>";
							    include_once 'seguir.html';
							    exit();
							}
							include_once "formulario_adivina.php";
						}
					}else{
						echo"Enhorabuena, lo ha acertado!";
						include_once "seguir.html";
					}
				}else{
					echo"Debe introducir un numero";
					$_SESSION['intentos']--;
					if($_SESSION['intentos']==0){
					    echo "<h1>Lo siento, has predido.<h1>";
					    include_once 'seguir.html';
					    exit();
					}
					
					include_once "formulario_adivina.php";
				}
			break;
	
			case "salir":
				session_destroy();
				include_once "adios.html";
				break;
			case "si":
				session_destroy();
				header("Refresh:0");
				break;
			case "no":
				session_destroy();
				include_once "adios.html";
				break;
			}
		}
	?>
	
</div>
</body>
</html>
