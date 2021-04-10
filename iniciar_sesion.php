<!DOCTYPE html> 
<html lang="es">
<head>
	<title>CARLOS</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="iniciar_sesion.css"/>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
</head>

<body>
	<header class="header">
		<br><h1>INICIAR SESION</h1>
	</header>

	<section class="section" >

		<br><a class="btn btn-outline-primary" href="index.html" role="button">MENU PRINCIPAL</a>
		<br><br>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<table border="0" align="center">
		
  		<tr>
      	<td class="izq">Usuario: </td><td class="der"><input type="text" name="usuario" id="usuario" required></td>
    	</tr>

    	<tr>
    	<td class="izq">Contraseña: </td><td class="der"><input type="password" name="password" id="password" required></td>
    	</tr>
    
    	<tr>
      		<td colspan="2"><input type="submit" name="enviar" id="enviar" value="ENTRANDO"></td>
    	</tr>
  	</table>
	</form>		
	
	</section>

	<footer class="footer">

	</footer>

	<?php

	if(isset($_POST["enviar"])){
	
	try{

		//htmlentities:convertir cualquier simbolo en HTML
		//addslashes:escapar cualquier caracter de ese tipo, para no tenerlo en cuenta
		$usuario=htmlentities(addslashes($_POST["usuario"]));
		$password=htmlentities(addslashes($_POST["password"]));
		$contador=0;

		$base=new PDO("mysql:host=localhost; dbname=agenda","root",""); //conexion a la base de datos
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   //propiedades de la conexion

		$sql="SELECT * FROM administrador WHERE usuario= :usuario"; //sentencia SQL 
		$resultado=$base->prepare($sql);
		$resultado->execute(array(":usuario"=>$usuario));
		while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){ //array asociativo
			//echo "Usuarios: " . $registro['USUARIOS'] . "Contraseña: " . $registro['PASSWORD'] . "<br>";
		if(password_verify($password, $registro['password'])){
			$contador++;
			$numero_registro=$resultado->rowCount(); //funcion que devuelve el numero de registro que devuelve una consulta

			if($numero_registro!=0){	
			echo "<script languaje='javascript'>alert('INICIANDO SESION...'); location.href ='iniciar_sesion2.php';</script>";		
				session_start();  //funcion para iniciar una sesion
				$_SESSION["usuario"]=$_POST["usuario"];  //variable global:para el nombre del usuario 
				
				//header("Location:iniciar_sesion2.php"); //funcion para redirigir a una pagina web
			}else  { 
				header("iniciar_sesion.php"); //funcion para redirigir a una pagina web
			}
		}


		}
		echo "<script languaje='javascript'>alert('VUELVE A INTENTARLO'); location.href ='iniciar_sesion.php';</script>";	
	}catch(Exception $e){
		die("Error:" . $e->getMessage());
	}

}
	?>
</body>
</html>