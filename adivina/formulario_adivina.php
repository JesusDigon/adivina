<!DOCTYPE html>
<html>
<head>
	<title>Adivina</title>
</head>
<body>
<form action="adivina.php">
	<p><?php echo $_SESSION['intentos']?> Intentos restantes</p>
		<input type="text" name="numero" maxlength="2"><br>
		<input type="submit" name="orden" value="jugar" >
		<input type="submit" name="orden" value="salir">
	</form>
</body>
</html>