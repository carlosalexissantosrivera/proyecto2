<!doctype html>
<html>
<head>
<title>CARLOS</title>
  <meta charset="utf-8"/>

<link rel="stylesheet" href="editar1.css"/>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>

  <?php
      session_start(); //funcion para iniciar una sesion
      if(!isset($_SESSION["usuario"])){
        header("Location:iniciar_sesion.php");  //funcion para redirigir a una pagina web
      }
  ?>

  <header class="header">
    <br><h1>BIENVENIDO <?php  echo  $_SESSION["usuario"] . "<br><br>";  ?> </h1>
  </header>

  <?php
        include("conexion.php");
        if(!isset($_POST["bot_actualizar"])){ //click en el boton actualizar
          $Id=$_GET["Id"];
          $nom=$_GET["nom"];
          $ape=$_GET["ape"];
          $nac=$_GET["nac"];
           $eda=$_GET["eda"];
          $sex=$_GET["sex"];
           $tel=$_GET["tel"];
          $fac=$_GET["fac"];
          $car=$_GET["car"];
          $sem=$_GET["sem"];
        }else{
          $Id=$_POST["id"];
           $nom=$_POST["nom"];
          $ape=$_POST["ape"];
          $nac=$_POST["nac"];
          $eda=$_POST["eda"];
          $sex=$_POST["sex"];
           $tel=$_POST["tel"];
          $fac=$_POST["fac"];
          $car=$_POST["car"];
          $sem=$_POST["sem"];
          $sql="UPDATE contactos SET Nombre= :miNom, Apellido= :miApe, Nacimiento=:miNac, Edad= :miEda,
                                    Sexo=:miSex, Telefono=:miTel, Facebook=:miFac,Carrera= :miCar, Semestre=:miSem WHERE Id=:miId";
          $resultado=$base->prepare($sql);
          $resultado->execute(array("miId"=>$Id,":miNom"=>$nom, ":miApe"=>$ape,":miNac"=>$nac ,":miEda"=>$eda,

                      "miSex"=>$sex,"miTel"=>$tel, "miFac"=>$fac,":miCar"=>$car,":miSem"=>$sem));
          header("Location:iniciar_sesion2.php");
        }
?>
  
  <section class="section">
<form name="form1" method="post"  action="<?php echo $_SERVER['PHP_SELF'];?>"> 
  <table width="25%" border="0" align="center">

    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value="<?php echo $Id ?>" ></td>

    </tr>

    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" value="<?php echo $nom ?>" required></td>
      <td>Apellido</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape" value="<?php echo $ape ?>" required></td>
    </tr>

     <tr>
      <td>Nacimiento</td>
      <td><label for="nac"></label>
      <input type="text" name="nac" id="nac" value="<?php echo $nac ?>" ></td>
      <td>Edad</td>
      <td><label for="eda"></label>
      <input type="text" name="eda" id="eda" value="<?php echo $eda ?>" ></td>
    </tr>

     <tr>
      <td>Sexo</td>
      <td><label for="sex"></label>
      <input type="text" name="sex" id="sex" value="<?php echo $sex ?>" required ></td>
       <td>Telefono</td>
      <td><label for="tel"></label>
      <input type="text" name="tel" id="tel" value="<?php echo $tel ?>"  ></td>
    </tr>

      <tr>
      <td>Facebook</td>
      <td><label for="fac"></label>
      <input type="text" name="fac" id="fac" value="<?php echo $fac ?>" ></td>
      <td>Carrera</td>
      <td><label for="car"></label>
      <input type="text" name="car" id="car" value="<?php echo $car ?>" ></td>
    </tr>


     <tr>
      <td>Semestre</td>
      <td><label for="sem"></label>
      <input type="text" name="sem" id="sem" value="<?php echo $sem ?>" ></td>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>

   
  </table>
</form>
<p>&nbsp;</p>

</section>
<footer class="footer">
  </footer>
</body>
</html>