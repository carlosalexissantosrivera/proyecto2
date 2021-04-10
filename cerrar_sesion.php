<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>

	<?php
		session_start(); //funcion para iniciar una sesion
		session_destroy(); //funcion para destruir una  sesion
		header("location:iniciar_sesion.php"); //funcion para redirigir a una pagina web
	?>
	
</body>
</html>