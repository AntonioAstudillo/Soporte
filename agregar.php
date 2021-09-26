<?php require_once 'vistas/cabecera.php' ?>
<?php require_once 'utilidades/funciones.php'; ?>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h4 class="heading"><a href="index.php"><strong>Registrando</strong>Reporte<span></span></a></h4>
               <div class="container mt-4">
               <form class="" action="index.html" method="post">
                  <div class="row">
                     <div class="col-6">
                        <label for="">Número de Reporte</label>
                        <input class="form-control" type="text" name="" value="" placeholder="Número de reporte">
                     </div>
                     <div class="col-6">
                        <label for="">Id Equipo</label>
                        <input class="form-control" type="text" name="" value="" placeholder="Id de equipo">
                     </div>
                  </div>
                  <div class="row mt-3 ">
                     <div class="col-4">
                        <label for="">Número de Serial</label>
                        <input class="form-control" type="text" name="" value="" placeholder="Número de serial">
                     </div>

                     <div class="col-4">
                        <?php
                           $edificios = llenarEdificio();
                           $tam = count($edificios);
                           $i = 0;
                        ?>
                        <label for="">Edificio</label>
                        <select class="form-control" name="">
                           <option value="">Elige un edificio</option>
                           <?php while($i<$tam): ?>
                              <option class="form-control" value=""><?php echo $edificios[$i++];?></option>
                           <?php endwhile; ?>
                        </select>
                     </div>

                     <div class="col-4">
                        <label for="">Status</label>
                        <select class="form-control" name="">
                           <option value="">Activo</option>
                           <option value="">En proceso</option>
                           <option value="">Cancelado</option>
                        </select>

                     </div>
                  </div>

                  <div class="row mt-3">
                     <div class="col-12">
                        <textarea class="form-control" name="name" rows="8" cols="80" placeholder="Ingrese una descripción"></textarea>
                     </div>
                  </div>

                  <div class="row mt-3">
                     <div class="col-12">
                        <div class="container text-center">
                           <input type="submit" class="btn btn-primary font-weight-bold" name="" value="Guardar Datos">
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            </div>
         </div>
      </div>
<?php require_once 'vistas/encabezado.php'; ?>
