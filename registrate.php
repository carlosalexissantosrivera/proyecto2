<!DOCTYPE html> 
<html lang="es">
<head>
	<title>CARLOS</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="registrate1.css"/>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
</head>

<body>
	<header class="header">
		<br><h1>REGISTRATE</h1>
	</header>

	<section class="section" >

		<br><a class="btn btn-outline-primary" href="index.html" role="button">MENU PRINCIPAL</a>
		<br><br>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<table border="0" align="center">
		<tr>
      	<td class="izq">Id: </td><td class="der"><input type="number" name="id" id="id" required></td>
    	</tr>

  		<tr>
      	<td class="izq">Usuario: </td><td class="der"><input type="text" name="usuario" id="usuario" required></td>
    	</tr>

    	<tr>
    	<td class="izq">Contraseña: </td><td class="der"><input type="password" name="password" id="password" required></td>
    	</tr>
    
    	<tr>
      		<td colspan="2"><input type="submit" name="enviando" id="enviando" value="REGISTRANDO"></td>
    	</tr>
  	</table>
	</form>		
	
	</section>

	<footer class="footer">

	</footer>

	<?php

	if(isset($_POST["enviando"])){
	
	$id=$_POST["id"];
	$usuario=$_POST["usuario"];
	$password=$_POST["password"];
	
	//$pass_cifrado=password_hash($contrasenia, PASSWORD_DEFAULT);
	$pass_cifrado=password_hash($password, PASSWORD_DEFAULT,array("cost"=>12));
	
	try{
		$base=new PDO('mysql:host=localhost; dbname=agenda', 'root', ''); //conexion a la base de datos
		$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  //propiedades de la conexion
		$base->exec("SET CHARACTER SET utf8"); //caracteres latinos
		$insertar="INSERT INTO administrador (id,usuario,password) VALUES (:id,:usuario,:password)"; //sentencia SQL
		$resultado=$base->prepare($insertar);
		$resultado->execute(array(":id"=>$id,":usuario"=>$usuario,":password"=>$pass_cifrado)); //$pass_cifrado //$contrasenia
		echo "<script languaje='javascript'>alert('Registro Exitoso'); location.href ='index.html';</script>";
		$resultado->closeCursor();
		}catch(Exception $e){
			die('Error: ' . $e->GetMessage());
		}finally{
			$base=null;
		}
	}
?>
</body>
</html>