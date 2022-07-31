<?php 
    extract($_REQUEST);
    include("conexion.php");

    $query = "INSERT INTO productos SET 
    producto = '$producto', 
    descripcionCorta = '$descripcionCorta',
    descripcionLarga = '$descripcionLarga',
    unidadMedida = '$unidadMedida',
    precio = '$precio'
    ";
   if ( $_GLOBALS['conexion']->query($query) === true){
    echo true;
   }else{
    echo $_GLOBALS['conexion']->error;
   }

    
   $_GLOBALS['conexion']->close();

?>