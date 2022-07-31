<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos - CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
  
    <h1>Carrito de Compras</h1>
    <?php 
    include_once("conexion.php"); 
    $result =  $_GLOBALS['conexion']->query("SELECT producto FROM productos");

    echo "Numero de productos: $result->num_rows";

    $result->close();

   // $_GLOBALS['conexion']->close();
    ?>
    <div class="container text-center">
        <div class="row">
          <div class="col-md-2">
           
          </div>
          <div class="col-md-8">
            <table class="table">
                <thead class=" table-primary">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Descricion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Accion</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  //include_once("conexion.php"); 
                  $query = "SELECT * FROM productos";
                  if($result =  $_GLOBALS['conexion']->query($query) )
                   {
                    while ($row = $result->fetch_assoc()) {

                      echo ' <tr>
                      <th scope="row">'.$row['codigo'].'</th>
                      <td>'.$row['producto'].'</td>
                      <td>
                      '.$row['descripcionCorta'].' 

                      </td>
                      <td> 
                      '.$row['precio'].' 
                      </td>

                      <td> 
                      <button type="button" class="btn btn-primary"  onClick="agregarCarrito('.$row['codigo'].');">
                                      <i class="fa fa-cart-plus" aria-hidden="true" style="color:white" data-bs-toggle="tooltip" data-bs-title="Agregar"></i>
                                  </button>
                                  </td>
                    </tr>';

                    }
                   $result->free();
                  }                             
                 
               
                   $_GLOBALS['conexion']->close();
                  ?>
                  
                 
                
                </tbody>
              </table>


            <br> 
         <table class="table" id="tablacarrito">
                <thead class=" table-primary">
                  <tr>
                  
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                   
                  </tr>
                </thead>
                <tbody id= "productoAgregado"> 
                </tbody>
              </table>


          
          </div>
          <div class="col-md-2">
         
             <h5>Total</h5>   
            <input type="text" id="totalCarrito" value="0" readonly/>
          </div>
        </div>
       
      </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>  
    <script src="https://use.fontawesome.com/e67d858369.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="text/javascript">
          const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
          const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

         

        function agregarCarrito(id){
              var id=id;
              $.ajax({      
                  data: {id: id},
                  url: 'valorProductoCarrito.php',
                  type: 'get',
                 // dataType : "json",
                  async: false,
                  error: function(X){
                        alert("ha ocurrido un error");            
                    },
                  success: function(respuesta){         
                    
                      //console.log(respuesta);
                     var panel = document.getElementById('productoAgregado');
                     panel.insertAdjacentHTML('beforeend',respuesta);

                     sumarTotal(id); 
                       
                    
                  }
                });  
        }

        function sumarTotal(id){
            var cantidad = document.getElementById('cantidad' + id).value;
            var precio= document.getElementById('precio' + id).value;
            var total= document.getElementById('totalCarrito');
            var valorTotal = total.value;
           
            var multiplicacion = (cantidad*precio);
            var suma = (parseInt(valorTotal) + parseInt(multiplicacion));
           // console.log( multiplicacion);
            total.value = suma;
            
        }        
           
        



         
    </script>  
</body>
</html>