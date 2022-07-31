<?php 
    extract($_REQUEST);
    include("conexion.php");

    $query = "SELECT * FROM productos WHERE codigo = '$id'";
    if($result =  $_GLOBALS['conexion']->query($query) )
     {
        $row = $result->fetch_assoc();
     }
     echo json_encode($row);
    
     

    
   $_GLOBALS['conexion']->close();

?>