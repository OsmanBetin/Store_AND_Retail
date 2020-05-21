<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formulario Registrar Productos</title>
  </head>
  <body>
    <div class="">
      <h1>Store & Retail</h1>

      <h2>Registrar Productos</h2>

      <p>Este Formulario Registra los Productos provenientes
      de los diferentes proveedores.</p>

      <p>Este formulario es de uso exclusivo del Administrador de
        la Tienda.</p>
    </div>

    <div class="">

      <form class="" action="registar_products.php" method="post">
        <label for="">Código <input type="text" name="idP" id="idP" value=""></label><br>
        <label for="">Nombre <input type="text" name="nombreP" id="nombreP" value=""></label><br>
        <label for="">Precio Unit <input type="text" name="precioUnit" id="precioUnit" value=""></label><br>
        <label for="">Id Marca <input type="text" name="IdMarca" id="IdMarca" value=""></label><br>
        <label for="">Id Clasificación <input type="text" name="IdClass" id="IdClass" value=""></label><br>
        <label for="">Id Proveedor <input type="text" name="IdProvee" id="IdProvee" value=""></label><br>

        <input type="submit" name="enviar" value="Guardar">

      </form>
    </div>

  </body>
</html>
