<?php

  function generarFecha(){

    $anho=date("Y");
    $mes=date("m");
    $dia=date("d");
    $hora=date("H");
    $minuto=date("i");

    $fullDate=$anho."-".$mes."-".$dia." ".$hora.":".$minuto;
    return $fullDate;
    }

    function generarIdPeiddo(){

      //Generar ID Al Azar
      $numAzar = rand(1,1000);
      //echo "Numero al Azar " . $numAzar . "<br>";

      $numAzar2 = rand(0,25);
      //echo "Numero 2 al Azar" . $numAzar2 . "<br>";
      //Obetner Letra al Azar
      $alfab="ABCDEFGHIJKLMNOPQRSTUVWXYZ";

      $letra="";
      for($i=0; $i<strlen($alfab); $i++){

        if($numAzar2==$i){

          $punto=$alfab[$i];

          //echo "Letra al Azar " . $punto . "<br>";
          $letra=$punto;

        }
      }

      $codigo =  $letra . $numAzar;

      return $codigo;
}

$idpedido= generarIdPeiddo();

//PENDIENDE DE ESTRAER EL ID DEL CLINETE DESDE verificarCliente
$idCliente="1033";
$fecha = generarFecha();

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

$sql="INSERT INTO Pedido (Id, Id_Cliente, Fecha)
    VALUES (?, ?, ?)";
//Obtener objeto clave
$resultado=mysqli_prepare($conexion, $sql);
//unir parametros que el user escribio con la sentecnia SQL
//La 's' indica que la entrada va a ser tipo text
//numero = 'i', decimal = 'd'
//exito = True otherwise = False
//Si el cuarto campo fuera entero: "sssis"
$ok=mysqli_stmt_bind_param($resultado, "sss", $idpedido, $idCliente, $fecha);
//Ejecutar la consulta
//sobreescribir $ok
$ok=mysqli_stmt_execute($resultado);

if($ok==false){

  echo "Error al ejecutar la consulta!";

}else{

echo "Se ha Registrado Satisfactoriamente su Pedido!";

mysqli_stmt_close($resultado);

}

 ?>
