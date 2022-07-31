
<?php

 $host = "localhost";
 $user = "root";
 $password = "";
 $bdd = "productoscrud";

  $conn = new mysqli($host, $user, $password, $bdd);
  
  if ($conn->connect_error) {
    die("ERROR: No se puede conectar al servidor: " . $conn->connect_error);
  } else {
    $_GLOBALS['conexion'] = $conn;
  }

  /*echo 'Conectado a la base de datos.<br>';

  $result = $conn->query("SELECT producto FROM productos");

  echo "Numero de resultados: $result->num_rows";

  $result->close();

  $conn->close();*/
?>