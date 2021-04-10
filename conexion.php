<?php
		try{
			$base=new PDO('mysql:host=localhost; dbname=agenda', 'root', ''); //conexion a la base de datos
			$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //propiedades de la conexion
			$base->exec("SET CHARACTER SET utf8"); //caracteres latino
			}catch(Exception $e){
				die('Error' . $e->GetMessage());
				echo "Linea del error" . $e->getLine();
			}
	?>