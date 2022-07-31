<?php 
    extract($_REQUEST);
    include("conexion.php");

    $query = "DELETE FROM productos WHERE codigo = '$borrarI'";
   if ( $_GLOBALS['conexion']->query($query) === true){
    echo true;
   }else{
    echo $_GLOBALS['conexion']->error;
   }

    
   $_GLOBALS['conexion']->close();

?>