<!DOCTYPE html> 
<html lang="es">
<head>
	<title>CARLOS</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="iniciar_sesion2.css"/>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
	<script >
		$(document).ready(function(){ 
   		$('#amigos1').on('click',function(){
      	$('#amigos11').toggle();
   			});
		});

		$(document).ready(function(){ 
   		$('#amigas1').on('click',function(){
      	$('#iamigas11').toggle();
   			});
		});
	</script>

</head>

<body>

	<?php
			session_start(); //funcion para iniciar una sesion
			if(!isset($_SESSION["usuario"])){
				header("Location:iniciar_sesion.php");  //funcion para redirigir a una pagina web
			}
	?>

	<?php 
	include("conexion.php");
	
	/*$conexion=$base->query("SELECT * FROM DATOS_USUARIOS");
	$registros=$conexion->fetchAll(PDO::FETCH_OBJ);*/

  	///PAGINACION
  		$tamagno_paginas=30;
		    if(isset($_GET["pagina"])){
    			if($_GET["pagina"]==1){
      				header("Location:iniciar_sesion2.php");
    			}else{
      				$pagina=$_GET["pagina"];
    			}
   			}else{
      			$pagina=1;
    		}
    	$empezar_desde=($pagina-1)*$tamagno_paginas;
    	$sql_total="SELECT * FROM contactos";
    	$resultado=$base->prepare($sql_total);
    	$resultado->execute(array());
    	$num_filas=$resultado->rowCount();
    	$total_paginas=ceil($num_filas/$tamagno_paginas);
  	///////

		$registros=$base->query("SELECT * FROM contactos LIMIT $empezar_desde,$tamagno_paginas")->fetchAll(PDO::FETCH_OBJ);
			if(isset($_POST["cr"])){ //click en el boton insertar 
				$Id=$_POST["Id"];
				$Nombre=$_POST["Nombre"];
				$Apellido=$_POST["Apellido"];
				$Nacimiento=$_POST["Nacimiento"];
				$Edad=$_POST["Edad"];
				$Sexo=$_POST["Sexo"];
 				$Telefono=$_POST["Telefono"];
 				$Facebook=$_POST["Facebook"];
 				$Carrera=$_POST["Carrera"];
 				$Semestre=$_POST["Semestre"];
  				
  				$sql="INSERT INTO contactos(Id,Nombre,Apellido,Nacimiento,Edad,Sexo,Telefono,Facebook,Carrera,Semestre) VALUES (:Id,:Nombre,:Apellido,:Nacimiento,:Edad,:Sexo,:Telefono,:Facebook,:Carrera,:Semestre)";
  				$resultado=$base->prepare($sql);
  				$resultado->execute(array("Id"=>$Id,":Nombre"=>$Nombre,":Apellido"=>$Apellido,"Nacimiento"=>$Nacimiento,
  					":Edad"=>$Edad,"Sexo"=>$Sexo,"Telefono"=>$Telefono,"Facebook"=>$Facebook,":Carrera"=>$Carrera,"Semestre"=>$Semestre));
  				header("Location:iniciar_sesion2.php");
			}
		?>

	<header class="header">
		<br><h1>BIENVENIDO <?php	echo  $_SESSION["usuario"] . "<br><br>";	?> </h1>
	</header>

	<section class="section" >
		<br><a class="btn btn-outline-primary" href="cerrar_sesion.php" role="button">CERRAR SESION</a>
	</section>

	<section class="section2">
		<a class="btn btn-outline-primary" href="#" role="button" id="amigos1">CONTACTOS</a>
			
	</section>

	<section class="section3">

		<div id="amigos11" style="display:none">
			

		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"> 
  			<table width="50%" border="0" align="center">
    			<tr>
    				<td class="primera_fila">Id</td>
      				<td class="primera_fila">Nombre</td>
      				<td class="primera_fila">Apellido</td>
      				<td class="primera_fila">Nacimiento</td>
      				<td class="primera_fila">Edad</td>
      				<td class="primera_fila">Sexo</td>
      				<td class="primera_fila">Telefono</td>
      				<td class="primera_fila">Facebook</td>
      				<td class="primera_fila">Carrera</td>
      				<td class="primera_fila">Semestre</td>
      				<td class="sin">&nbsp;</td>
      				<td class="sin">&nbsp;</td>
    			</tr> 
   
   		<?php //arreglo con todos los datos
    		foreach($registros as $contactos):?>
  
 			  <tr>
 			  	<td><?php echo $contactos->Id?></td>
      			<td><?php echo $contactos->Nombre?></td>
      			<td><?php echo $contactos->Apellido?></td>
      			<td><?php echo $contactos->Nacimiento?></td>
      			<td><?php echo $contactos->Edad?></td>
      			<td><?php echo $contactos->Sexo?></td>
      			<td><?php echo $contactos->Telefono?></td>
      			<td><?php echo $contactos->Facebook?></td>
      			<td><?php echo $contactos->Carrera?></td>
      			<td><?php echo $contactos->Semestre?></td>

      			<td class="bot">
        			<a href="borrar.php?Id=<?php echo $contactos->Id?>">   
          			<input type='button' name='del' id='del' value='Borrar'></a>
      			</td>

      			<td class='bot'>
        			<a href="editar1.php?
        			Id=<?php echo $contactos->Id?> &  
        			nom=<?php echo $contactos->Nombre?>& 
        			ape=<?php echo $contactos->Apellido?> & 
        			nac=<?php echo $contactos->Nacimiento?> & 
        			eda=<?php echo $contactos->Edad?> & 
        			sex=<?php echo $contactos->Sexo?> &
        			tel=<?php echo $contactos->Telefono?> &
        			fac=<?php echo $contactos->Facebook?> &   
        			car=<?php echo $contactos->Carrera?> & 
        			sem=<?php echo $contactos->Semestre?> ">
         			<input type='button' name='up' id='up' value='Actualizar'></a>
      			</td>
			  </tr>       
  
  		<?php
    		endforeach;
 		?>
  
  				<tr>
  					<td><input type='text' name='Id' size='4' class='centrado'  ></td>
      				<td><input type='text' name='Nombre' size='7' class='centrado' ></td>
      				<td><input type='text' name='Apellido' size='7' class='centrado' ></td>
      				<td><input type='text' name='Nacimiento' size='8' class='centrado' ></td>
      				<td><input type='text' name='Edad' size='1' class='centrado' ></td>
      				<td><input type='text' name='Sexo' size='5' class='centrado'  ></td>
      				<td><input type='text' name='Telefono' size='8' class='centrado'  ></td>
      				<td><input type='text' name='Facebook' size='15' class='centrado'  ></td>
       				<td><input type='text' name='Carrera' size='12' class='centrado' ></td>
       				<td><input type='text' name='Semestre' size='1' class='centrado' ></td>
      				<td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
    			</tr> 

     			<tr>
     				<td><?php

  					////////////////paginacion
  						for($i=1;$i<=$total_paginas;$i++){
    						echo  "<a href='?pagina=" .$i . "'>" . $i . "</a> ";
  						}
  						?></td></tr> 
  			</table>
		</form>
	<p>&nbsp;</p>
		</div>

	</section>

	<footer class="footer">

	</footer>

	
</body>
</html>