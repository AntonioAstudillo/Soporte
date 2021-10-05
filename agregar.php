
<?php

require_once 'utilidades/funciones.php';
clearstatcache();
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Agregar Reporte</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.1/css/font-awesome.css">
      <link rel="stylesheet" href="css/estilos.css">
   </head>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h4 class="heading"><a href="index.php"><strong>Registrando</strong>Reporte<span></span></a></h4>
               <div class="container mt-4">
                  <form class="" action="modelos/agregar.php" method="post" autocomplete="off">
                     <div class="row">
                        <div class="col-6">
                           <label for="">Número de Reporte</label>
                           <input class="form-control" type="text" id="numReporte" name="numReporte" value="" placeholder="Número de reporte">
                        </div>
                        <div class="col-6">
                           <label for="">Id Equipo</label>
                           <input class="form-control" type="text" id="idEquipo" name="idEquipo" value="" placeholder="Id de equipo">
                        </div>
                     </div>
                     <div class="row mt-3 ">
                        <div class="col-4">
                           <label for="">Número de Serial</label>
                           <input class="form-control" type="text" id="numSerial" name="numSerial" value="" placeholder="Número de serial">
                        </div>

                        <div class="col-4">
                           <?php
                           $edificios = llenarEdificio();
                           $tam = count($edificios);
                           $i = 0;
                           ?>
                           <label for="">Edificio</label>
                           <select id="edificio" class="form-control" name="edificio">
                              <option value="0">Elige un edificio</option>
                              <?php while($i<$tam): ?>
                                 <option class="form-control" value="<?php echo $edificios[$i]; ?>"><?php echo $edificios[$i]; $i++; ?></option>
                              <?php endwhile; ?>
                           </select>
                        </div>

                        <div class="col-4">
                           <label for="">Status</label>
                           <select id="status" class="form-control" name="status">
                              <option value="1">Activo</option>
                              <option value="2">En proceso</option>
                              <option value="0">Cancelado</option>
                           </select>

                        </div>
                     </div>

                     <div class="row mt-3">
                        <div class="col-4">
                           <label for="nombre">Nombre</label>
                           <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre">
                        </div>
                        <div class="col-4">
                           <label for="nombre">Apellido Paterno</label>
                           <input type="text" class="form-control" name="apellidoP" placeholder="Ingrese apellido paterno">
                        </div>
                        <div class="col-4">
                           <label for="nombre">Apellido Materno</label>
                           <input type="text" class="form-control" name="apellidoM" placeholder="Ingrese apellido materno">
                        </div>
                     </div>

                     <div class="row mt-3">
                        <div class="col-12">
                           <textarea id="descripcion" class="form-control" name="descripcion" rows="8" cols="80" placeholder="Ingrese una descripción"></textarea>
                        </div>
                     </div>

                     <div class="row mt-3">
                        <div class="col-12">
                           <div class="container text-center">
                              <input id="guardar" type="submit" class="btn btn-primary font-weight-bold" name="" value="Guardar Datos">
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js" charset="utf-8"></script>
   <script src="js/validaciones.js" charset="utf-8"></script>
   </body>
</html>
