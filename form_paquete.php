<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registar Paquete</title>
  </head>
  <body>
    <div class="">
      <h1>Store & Retail</h1>

      <p>Quiero Realizar Paquete!</p>
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

       ?>

        </select>
        <button type="button" name="enviar">Enviar</button>

  </body>
</html>
