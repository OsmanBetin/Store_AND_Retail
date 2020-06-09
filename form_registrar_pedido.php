<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registar Pedido</title>
  </head>
  <body>
    <div class="">
      <h1>Store & Retail</h1>

      <p>Quiero Realizar un Pedido!</p>
      <p>Este es un Formulario para agregar todos los Productos
        que un cliente desea comprar.</p>
    </div>

<!--      <form class="" action="index.html" method="post">  -->
<!--         <label for="">Código <input type="text" name="" value=""></label><br>  -->
<!--         <label for="">Nombre del Producto <input type="text" name="" value=""></label><br>   -->

<!-- select in HTML -->
    <select class="" name="">
      <option value="0">Seleccione Producto</option>

      <?php

        require("query_productos_lista.php");

      //  $ok=mysqli_stmt_bind_result($resultado, $Id, $nom_arti);

        //echo "Articulos encontrados: <br><br>";

      //  while(mysqli_stmt_fetch($resultado)){

          //echo $Id . " " . $nom_arti . " " . "<br>";
        //  echo '<option value="' . $Id . '">' . $nom_arti . '</option>';
        //}

       ?>

        </select>
        <button type="button" name="enviar">Enviar</button>
<!--      </form>   -->

  </body>
</html>
