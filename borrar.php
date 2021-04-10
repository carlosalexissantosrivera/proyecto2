<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
	<?php
		include("conexion.php");//incluir el archivo
		$Id=$_GET["Id"];
		$base->query("DELETE FROM contactos WHERE Id='$Id'");
		header("Location:iniciar_sesion2.php");
	?>
</body>
</html>