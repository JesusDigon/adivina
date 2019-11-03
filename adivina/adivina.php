<!DOCTYPE html>
<html>
<head>
	<title>Adivina</title>
</head>
<body>
<div id="contenido">
	<?php
	$numeroS=rand(1,20);
	session_start();
	
	echo $_SESSION['NumeroSecreto'];
	print_r($_REQUEST);
	if(!isset($_REQUEST['orden'])){
		$_SESSION['NumeroSecreto']=$numeroS;
		$_SESSION['intentos']=5;
		include_once "formulario_adivina.html";
		echo "<p>Bienvenido, Intente adivinar en qué número estoy pensando (1-20), tiene 5 intentos: </p>";
		
	}else{
		switch ($_REQUEST['orden']) {
			case "jugar":
				if(is_numeric($_REQUEST['numero'])){
					if(($_REQUEST['numero']) != $_SESSION['NumeroSecreto']){
						if($_REQUEST['numero']>$_SESSION['NumeroSecreto']){
							echo"El número es más pequeño.";
							$_SESSION['intentos']--;
							include_once "formulario_adivina.php";
							
						}else{
							echo"El número es más grande.";
							$_SESSION['intentos']--;
							include_once "formulario_adivina.php";
						}
					}else{
						echo"Enhorabuena, lo ha acertado!";
						include_once "seguir.html";
					}
				}else{
					echo"Debe introducir un numero";
					include_once "formulario_adivina.php";

				}
			break;
	
			case "salir":
				session_destroy();
				include_once "adios.html";
				break;
			case "si":
				session_destroy();
				include_once "formulario_adivina.php";
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

