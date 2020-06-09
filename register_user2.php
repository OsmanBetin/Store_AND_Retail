<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <style media="screen">
      table{
        width:50%;
        border:1px dotted #FF0000;
        margin:auto;
      }
    </style>

  </head>
  <body>

    <?php

    $ident=$_GET["ide"];
    $nombre=$_GET["nombre"];
    $apellido=$_GET["apellido"];
    $fecNacimiento=$_GET["fecNacimiento"];
    $barrio=$_GET["barrio"];
    $email=$_GET["email"];

    require("DB_files/config.php");

      //Usando funciones
      //Abrir conexion
      $conexion=mysqli_connect($db_host, $db_usurio, $db_contra);

      if(mysqli_connect_errno()){

          echo "Fallo al Conectar con la BBDD";

          exit();
      }
      //DB que queremos conectar
      mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BD");

      //incluir caracteres latinos
      mysqli_set_charset($conexion, "utf-8");

      //Este codigo se ejecuta una vez se abre la pagina
      //se verifica en la base de datos
      $query="INSERT INTO Cliente (Id, Nombre, Apellido, Fecha_Nacimiento, Barrio, Email)
               VALUES('$ident','$nombre', '$apellido','$fecNacimiento', '$barrio', '$email')";

      $resultados=mysqli_query($conexion, $query);

      if($resultados==false){

        echo "Error en la Consulta";
      }else{

        echo "Registro Guardado!<br><br>";

        echo "<table><tr><td>";

        echo "$ident" . "</td><td>";

        echo "$nombre" . "</td><td";

        echo "$apellido" . "</td><td>";

        echo "$fecNacimiento" . "</td><td>";

        echo "$barrio" . "</td><td>";

        echo "$email" . "</td></tr></table>";

      }
      //Cerramos la conexion a la BD
      mysqli_close($conexion);

      ?>

  </body>
</html>
