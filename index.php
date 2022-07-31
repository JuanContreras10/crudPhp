<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos - CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
   <!--modal crear -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Crear Producto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  id="crearForm">
                <div class="modal-body">
                        
                            <div class="row">
                                <div class="col">
                                  <label>Producto</label>
                                <input type="text" class="form-control" placeholder="Producto"  name="producto" id="producto" value="">
                                </div>
                                
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                  <label>Descripción Corta</label>
                                <input type="text" class="form-control" placeholder="Descripcion" value="" name="descripcionCorta" id="descripcionCorta" >
                                </div>
                                <div class="col">
                                  <label>Descripción Larga</label>
                                <input type="text" class="form-control" placeholder="Descripcion" value="" name="descripcionLarga" id="descripcionLarga" >
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                  <label>Unidad de medida</label>
                                <input type="text" class="form-control" placeholder="Pieza" value="" name="unidadMedida" id="unidadMedida">
                                </div>
                                <div class="col">
                                  <label>Precio</label>
                                <input type="text" class="form-control" placeholder="precio" value="" name="precio" id="precio">
                                </div>
                            </div>
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="accionModalForm('crearForm','crearProducto.php');">Crear</button>
                </div>
            </form>  
        </div>
        </div>
    </div>
    <!--modal Editar -->
    <div class="modal fade" id="editar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editar" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Editar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form  id="editarForm">
                <div class="modal-body">
                          <input type="hidden" name="codigoE" id="codigoE" >
                            <div class="row">
                                <div class="col">
                                  <label>Producto</label>
                                <input type="text" class="form-control" placeholder="Producto"  name="productoE" id="productoE" >
                                </div>
                                
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                  <label>Descripción Corta</label>
                                <input type="text" class="form-control" placeholder="Descripcion"  name="descripcionCortaE" id="descripcionCortaE" >
                                </div>
                                <div class="col">
                                  <label>Descripción Larga</label>
                                <input type="text" class="form-control" placeholder="Descripcion"  name="descripcionLargaE" id="descripcionLargaE" >
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                  <label>Unidad de medida</label>
                                <input type="text" class="form-control" placeholder="Pieza"  name="unidadMedidaE" id="unidadMedidaE">
                                </div>
                                <div class="col">
                                  <label>Precio</label>
                                <input type="text" class="form-control" placeholder="precio"  name="precioE" id="precioE">
                                </div>
                            </div>
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="accionModalForm('editarForm','editarProducto.php');">Editar</button>
                </div>
            </form>  
      </div>
      </div>
    </div>
    <!--modal borrar -->
    <div class="modal fade" id="borrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="borrar" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Borrar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <h2>¿Seguro que quieres borrar este producto?</h2>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <form id="borrarForm">
            <input type="hidden" name="borrarI" id="borrarI" >
          <button type="button" class="btn btn-danger" onclick="accionModalForm('borrarForm','borrarProducto.php');">Si, borrar</button>
          </form>
          </div>
      </div>
      </div>
    </div>
    <h1>Productos CRUD!</h1>
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                <i class="fa fa-plus" aria-hidden="true" style="color:white" data-bs-toggle="tooltip" data-bs-title="Crear"></i>
              </button>
          </div>
          <div class="col-md-8">
            <table class="table">
                <thead class=" table-primary">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Producto</th>
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
                          <row>
                            
                                  <button type="button" class="btn btn-primary"  onClick="modalEditar('.$row['codigo'].');">
                                      <i class="fa fa-pencil-square-o" aria-hidden="true" style="color:white" data-bs-toggle="tooltip" data-bs-title="Editar"></i>
                                  </button>
                            
                                  <button type="button" class="btn btn-danger"  onClick="modalBorrar('.$row['codigo'].');">
                                      <i class="fa fa-trash" aria-hidden="true"  style="color:white" data-bs-toggle="tooltip" data-bs-title="Borrar"></i>
                                  </button>
                            
                          </row>

                      </td>
                      
                    </tr>';

                    }
                   $result->free();
                  }                             
                 
               
                   $_GLOBALS['conexion']->close();
                  ?>
                  
                 
                
                </tbody>
              </table>
          </div>
          <div class="col-md-2">
            
          </div>
        </div>
       
      </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>  
    <script src="https://use.fontawesome.com/e67d858369.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="text/javascript">
          const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
          const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

          const myModal = document.getElementById('myModal');
          const myInput = document.getElementById('myInput');

          myModal.addEventListener('shown.bs.modal', () => {
          myInput.focus()
          });

        function modalEditar(id){
              var id=id;
              $.ajax({      
                  data: {id: id},
                  url: 'valorProducto.php',
                  type: 'get',
                  dataType : "json",
                  async: false,
                  error: function(X){
                        alert("ha ocurrido un error");            
                    },
                  success: function(respuesta){         
                    
                      //console.log(respuesta);
                      document.getElementById('codigoE').value=respuesta.codigo;
                      document.getElementById('productoE').value=respuesta.producto;
                      document.getElementById('descripcionCortaE').value=respuesta.descripcionCorta;
                      document.getElementById('descripcionLargaE').value=respuesta.descripcionLarga;
                      document.getElementById('unidadMedidaE').value=respuesta.unidadMedida;
                      document.getElementById('precioE').value=respuesta.precio;
                      $("#editar").modal("toggle");   
                    
                  }
                });  
        }

        function modalBorrar(id){
              var id=id;
              document.getElementById('borrarI').value=id;
              $("#borrar").modal("toggle");   
                    
        }      
             

        function accionModalForm(componente, accion){

                let params=$("#" + componente).serialize();
                let url=accion;
               

                   $.post(url,params,function(data){
                      if(data){      
                        $("." + componente).prop("value","");   
                        window.location.reload();                
                          alert("Se realizo la acción :D");
                                                
                      }else{
                          alert(data);
                      }
                  
                  });
              
            
               

         }

       
        $(document).ready(function(){

        $("#crearForm").submit(function(e){
            e.preventDefault();
        });
        $("#editarForm").submit(function(e){
            e.preventDefault();
        });
        $("#borrarForm").submit(function(e){
            e.preventDefault();
        })
        });


         
    </script>  
</body>
</html>