<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registrar Productos</title>
  </head>
  <body>

    <?php

        //Recibir Parametros del formulario
        $codigoP=$_POST["idP"];
        $nombreP=$_POST["nombreP"];
        $precioP=$_POST["precioUnit"];
        $IdMarca=$_POST["IdMarca"];
        $Idclassi=$_POST["IdClass"];
        $Idprovee=$_POST["IdProvee"];

        require("DB_files/config.php");

        $conexion=mysqli_connect($db_host, $db_usurio, $db_contra);

        if(mysqli_connect_errno()){

          echo "Fallo al Conectar con la BBDD";

          exit();
        }
      //DB que queremos conectar
      mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BD");

      //incluir caracteres Latinos
      mysqli_set_charset($conexion, "utf-8");

      $sql="INSERT INTO Producto (Id, Nombre, Precio_Unitario, Id_Marca, Id_Clasificacion, Id_Proveedor)
            VALUES (?, ?, ?, ?, ?, ?)";
      //Obtener objeto clave
      $resultado=mysqli_prepare($conexion, $sql);
      //unir parametros que el user escribio con la sentecnia SQL
      //La 's' indica que la entrada va a ser tipo text
      //numero = 'i', decimal = 'd'
      //exito = True otherwise = False
      //Si el cuarto campo fuera entero: "sssis"
      $ok=mysqli_stmt_bind_param($resultado, "ssdsss", $codigoP, $nombreP, $precioP,
                                  $IdMarca, $Idclassi, $Idprovee);
      //Ejecutar la consulta
      //sobreescribir $ok
      $ok=mysqli_stmt_execute($resultado);

      if($ok==false){

        echo "Error al ejecutar la consulta!";

      }else{

        echo "Se ha Agregado un Nuevo Producto!";

        mysqli_stmt_close($resultado);

      }

     ?>

  </body>
  
</html>
