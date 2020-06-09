<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registrarme</title>
  </head>
  <body>

    <?php

        //Recibir Parametros del formulario
        $ident=$_POST["ide"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $fecNacimiento=$_POST["fecNacimiento"];
        $barrio=$_POST["barrio"];
        $email=$_POST["email"];

        require("DB_files/config.php");

        $conexion=mysqli_connect($db_host, $db_usurio, $db_contra);

      if(mysqli_connect_errno()){

          echo "Fallo al Conectar con la BBDD";

          exit();
      }
      //DB que queremos conectar
      mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BD");

      //incluir caracteres altinos
      mysqli_set_charset($conexion, "utf-8");

      $sql="INSERT INTO Cliente (Id, Nombre, Apellido, Fecha_Nacimiento, Barrio, Email)
            VALUES (?, ?, ?, ?, ?, ?)";
      //Obtener objeto clave
      $resultado=mysqli_prepare($conexion, $sql);
      //unir parametros que el user escribio con la sentecnia SQL
      //La 's' indica que la entrada va a ser tipo text
      //numero = 'i', decimal = 'd'
      //exito = True otherwise = False
      //Si el cuarto campo fuera entero: "sssis"
      $ok=mysqli_stmt_bind_param($resultado, "ssssss", $ident, $nombre, $apellido,
                                  $fecNacimiento, $barrio, $email);
      //Ejecutar la consulta
      //sobreescribir $ok
      $ok=mysqli_stmt_execute($resultado);

      if($ok==false){
        echo "Error al ejecutar la consulta!";
      }else{

        echo "Te has Registrado Exitosamente!";

        mysqli_stmt_close($resultado);
      }

     ?>

  </body>
</html>
