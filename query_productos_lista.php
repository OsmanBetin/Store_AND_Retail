<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Consulta de Productos para Listarlos</title>
  </head>
  <body>

<!-- select in HTML -->
<!--    <select class="" name="">  -->
<!--      <option value="0">Seleccione Producto:</option>  -->

    <?php

      //Si el cliente esta en la BD que pase al FOrmulario Paquete
      //De lo Contrario debo enviarlo al Formulario Registrar Clinete (usrs1111)

      //$idCliente=$_POST["id_cliente"];

      require("DB_files/config.php");

      $conectar=mysqli_connect($db_host, $db_usurio, $db_contra);

      if(mysqli_connect_errno()){

        echo "Fallo al Conectar la Base de Datos";

        exit();

      }

      mysqli_select_db($conectar, $db_nombre) or die("No se Encuentra la DB");

      mysqli_set_charset($conectar, "utf-8");

      $query="SELECT Id, Nombre FROM Producto";

      //Obtener objeto clave
      $resultado=mysqli_prepare($conectar, $query);
      //unir parametros que el user escribio con la sentecnia SQL
      //La 's' indica que la entrada va a ser tipo text
      //numero = 'i', decimal = 'd'
      //exito = True otherwise = False

      //$ok=mysqli_stmt_bind_param($resultado);
      //Ejecutar la consulta
      //sobreescribir $ok
      $ok=mysqli_stmt_execute($resultado);

    if($ok==false){

      echo "Error al ejecutar la consulta!";

    }else{
      //si tiene exito
      //Asociar (crear) las variables para almacenar
      //los resultados de la consulta
      $ok=mysqli_stmt_bind_result($resultado, $Id, $nom_arti);

      echo "Articulos encontrados: <br><br>";

      while(mysqli_stmt_fetch($resultado)){

        //echo $Id . " " . $nom_arti . " " . "<br>";
        echo '<option value="' . $Id . '">' . $nom_arti . '</option>';

      }
      //Cerrar el objeto $resultado
      mysqli_stmt_close($resultado);
    }

     ?>

<!-- select in HTML -->
<!--    </select>  -->
<!--    <button type="button" name="enviar">Enviar</button> -->

  </body>
</html>
