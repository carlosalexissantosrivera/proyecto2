<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>

<?php

  include("conexion.php");
  
  if(!isset($_POST["bot_actualizar"])){ //click en el boton actualizar
  $celular=$_GET["celular"];
  $nombre=$_GET["nombre"];
  $apellido=$_GET["apellido"];
  $edad=$_GET["edad"];
  $carrera=$_GET["carrera"];
  }else{
    $celular=$_POST["celular"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $edad=$_POST["edad"];
    $carrera=$_POST["carrera"];
    $sql="UPDATE amigos SET celular= :celular, nombre= :nombre, apellido= :apellido, edad= :edad, carrera= :carrera WHERE celular=:celular";
    $resultado=$base->prepare($sql);
    $resultado->execute(array(":celular"=>$celular, ":nombre"=>$nombre, ":apellido"=>$apellido,":edad"=>$edad,":carrera"=>$carrera));
    header("Location:iniciar_sesion2.php");
  }
?>

<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td>Celular</td>
      <td><label for="celular"></label>
      <input type="text" name="celular" id="celular" value="<?php echo $celular ?>" required disabled></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nombre"></label>
      <input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>" required></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="apellido"></label>
      <input type="text" name="apellido" id="apellido" value="<?php echo $apellido ?>" required></td>
    </tr>
    <tr>
      <td>Edad</td>
      <td><label for="edad"></label>
      <input type="text" name="edad" id="edad" value="<?php echo $edad ?>" required></td>
    </tr>
    <tr>
      <td>Carrera</td>
      <td><label for="carrera"></label>
      <input type="text" name="carrera" id="carrera" value="<?php echo $carrera ?>" required></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>