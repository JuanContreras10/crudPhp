<?php 
    extract($_REQUEST);
    include("conexion.php");

    $query = "SELECT codigo,producto,precio FROM productos WHERE codigo = '$id'";
    if($result =  $_GLOBALS['conexion']->query($query) )
     {
        $row = $result->fetch_assoc();
     } 
     $contenido=' <tr>
     <td><input type="text" id="producto'.$row['codigo'].'" value="'.$row['producto'].'" readonly  /></td>
     <td><input type="text" id="precio'.$row['codigo'].'" value="'.$row['precio'].'" readonly/></td>
     <td><input type="number" id="cantidad'.$row['codigo'].'" value="1" onChange="sumarTotal('.$row['codigo'].');"/></td>
     </tr>';

     echo $contenido;
    
     

    
   $_GLOBALS['conexion']->close();

?>