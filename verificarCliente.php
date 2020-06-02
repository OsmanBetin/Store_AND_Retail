<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div class="">
      <h1>Store & Retail</h1>
    </div>

    <?php

      //Si el cliente esta en la BD que pase al FOrmulario Paquete
      //De lo Contrario debo enviarlo al Formulario Registrar Clinete (usrs1111)

      $idCliente=$_POST["id_cliente"];

      //echo "EL ID DEL CLIENTES ES " . $idCliente;

      require("DB_files/config.php");

      $conectar=mysqli_connect($db_host, $db_usurio, $db_contra);

      if(mysqli_connect_errno()){

        echo "Fallo al Conectar la Base de Datos";

        exit();

      }

      mysqli_select_db($conectar, $db_nombre) or die("No se Encuentra la DB");

      mysqli_set_charset($conectar, "utf-8");

      $query="SELECT Id, Nombre FROM Cliente WHERE Id = ?";

      //Obtener objeto clave
      $resultado=mysqli_prepare($conectar, $query);
      //unir parametros que el user escribio con la sentecnia SQL
      //La 's' indica que la entrada va a ser tipo text
      //numero = 'i', decimal = 'd'
      //exito = True otherwise = False

      $ok=mysqli_stmt_bind_param($resultado, "s", $idCliente);
      //Ejecutar la consulta
      //sobreescribir $ok

      $ok=mysqli_stmt_execute($resultado);

      if($ok==false){

        echo "Error al ejecutar la consulta!";

      }else{

        //si tiene exito
        //Asociar (crear) las variables para almacenar
        //los resultados de la consulta van aqui
        $ok=mysqli_stmt_bind_result($resultado, $idd, $nombree);

      }

      $myVar=mysqli_stmt_fetch($resultado);

      if($myVar>=1){

        header("location:form_registrar_pedido.php");

/*
        echo "Es UNO Y DEBE ENVIAR A REGISTRAR PEDIDO";

        echo "Articulos encontrados: <br><br>";

          echo $idd . " " . " " . $nombree . " " . "<br>";
*/
      }else{

        //echo "No es UNO Y DEBE ENVIARSE A REISTRAR USUARIO";

        header("location:form_registrar_users.php");

      }

        //Cerrar el objeto $resultado
        mysqli_stmt_close($resultado);

     ?>

  </body>
</html>
