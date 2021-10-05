<?php
require_once 'conexion/Conexion.php';
$objetoCon = new Conexion();
$reportes = $objetoCon->mostrarReportes();
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
   <meta charset="utf-8">
   <title>Registro Reportes</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.1/css/font-awesome.css">
   <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
   <header class="bg-dark p-3">
      <div class="">
         <p class="h1 text-white font-weight-bold text-center">Registro de Reportes</p>
      </div>
   </header>
   <main>
      <div class="container">
         <table id="tabla"  class="table table-bordered mt-1">
            <thead class="thead-dark">
               <tr>
                  <th><a href="agregar.php"><button class="btn btn-success text-center" type="button" name="button"><i class="fa fa-plus aling-text-center" aria-hidden="true"></i></button></a></th>
                  <th>Número de Reporte</th>
                  <th>ID Equipo</th>
                  <th>Edificio</th>
                  <th>Estado</th>
                  <th>Acción</th>
               </tr>
            </thead>
            <tbody>
               <?php if($reportes): ?>
                  <?php while($reporte = $reportes->fetch_assoc()): ?>
                     <tr>
                        <td></td>
                        <th> <?php echo $reporte['numReporte'];  ?> </th>
                        <th> <?php echo $reporte['idEquipo'];  ?> </th>
                        <th> <?php echo $reporte['edificio'];  ?> </th>

                        <?php if($reporte['estado'] == '1'):  ?>
                           <th> <span class="text-success">Activo</span></th>
                        <?php elseif($reporte['estado'] == '2'): ?>
                           <th> <span class="text-warning">En proceso</span> </th>
                        <?php else: ?>
                           <th> <span class="text-danger">Cancelado</span> </th>
                        <?php endif; ?>


                        <td>
                           <button id="btnVista" data-toggle="modal" data-target="#modalVista" class="btn btn-primary" type="button" value="<?php echo $reporte['id']; ?>"><i class="fa fa-eye" aria-hidden="true" value="<?php echo $reporte['id']; ?>"></i></button>
                           <button id="btnEditar" data-toggle="modal" data-target="#modalEditar"  class="btn btn-warning" type="button"  value="<?php echo $reporte['id']; ?>"><i  value="<?php echo $reporte['id']; ?>" class="fa fa-pencil" aria-hidden="true"></i></button>
                           <button id="btnEliminar" class="btn btn-danger" type="button"  value="<?php echo $reporte['id']; ?>"><i value="<?php echo $reporte['id']; ?>" class="fa fa-trash-o" aria-hidden="true"></i></button> </td>
                        </tr>
                     <?php endwhile; ?>
                  <?php else: ?>
                  <?php endif; ?>
               </tbody>
            </table>
            <!-- Modal Vista -->
            <div id="modalVista" class="modal fade" role="dialog">
               <div class="modal-dialog">
                  <!-- Contenido de modal-->
                  <div class="modal-content">
                     <div class="modal-header">
                        <div class="text-center">
                           <p class="text-info h1">Vista Reporte</p>
                        </div>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <div class="row">
                              <div class="col-6">
                                 <label for="numReporte">Número de reporte</label>
                                 <input id="numReporte" readonly class="form-control"  type="text" value="4859" >
                              </div>
                              <div class="col-6">
                                 <label for="idEquipo">Id Equipo</label>
                                 <input id="idEquipo" readonly class="form-control"  type="text" value="4859" >
                              </div>
                           </div>

                           <div class="row mt-3">
                              <div class="col-6">
                                 <label for="numSerial">Número de serial</label>
                                 <input id="numSerial" readonly class="form-control"  type="text" value="4859" >
                              </div>
                              <div class="col-6">
                                 <label for="status">Estado</label>
                                 <input id="status" readonly class="form-control"  type="text" value="4859" >
                              </div>
                           </div>

                           <div class="row mt-3">
                              <div class="col-6">
                                 <label for="hora">Hora</label>
                                 <input id="hora" readonly class="form-control"  type="text" value="4859" >
                              </div>
                              <div class="col-6">
                                 <label for="fecha">Fecha</label>
                                 <input id="fecha" readonly class="form-control"  type="text" value="4859" >
                              </div>
                           </div>

                           <div class="row mt-3">
                              <div class="col-9">
                                 <label for="nombre">Nombre Completo</label>
                                 <input readonly id="nombre"  class="form-control"  type="text" value="4859">
                              </div>
                              <div class="col-3">
                                 <label for="edificio">Edificio</label>
                                 <input readonly id="edificio"  class="form-control"  type="text" value="4859">
                              </div>
                           </div>

                           <div class="row mt-3">
                              <div class="col-12">
                                 <label for="descripcion">Descripción</label>
                                 <textarea  readonly class="form-control" id="descripcion" name="name" rows="4" cols="80"></textarea>
                              </div>
                           </div>

                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                     </div>
                  </div>
               </div>
            </div>

            <!-- Modal Editar -->
            <div id="modalEditar" class="modal fade" role="dialog">
               <div class="modal-dialog">
                  <!-- Contenido de modal-->
                  <div class="modal-content">
                     <div class="modal-header">
                        <div class="text-center">
                           <p class="text-info h1">Vista Edición</p>
                        </div>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <div class="row">
                              <div class="col-6">
                                 <input type="hidden" id="idPersona" value="0">
                                 <input type="hidden" id="idReporte" value="0">
                                 <label for="numReporteEditar">Número de reporte</label>
                                 <input id="numReporteEditar"  class="form-control"  type="text" value="4859" >
                              </div>
                              <div class="col-6">
                                 <label for="idEquipoEditar">Id Equipo</label>
                                 <input id="idEquipoEditar"  class="form-control"  type="text" value="4859" >
                              </div>
                           </div>

                           <div class="row mt-3">
                              <div class="col-6">
                                 <label for="numSerialEditar">Número de serial</label>
                                 <input id="numSerialEditar"  class="form-control"  type="text" value="4859" >
                              </div>
                              <div class="col-6">
                                 <label for="statusEditar">Estado</label>
                                 <input id="statusEditar"  class="form-control"  type="text" value="4859" >
                              </div>
                           </div>

                           <div class="row mt-3">
                              <div class="col-6">
                                 <label for="horaEditar">Hora</label>
                                 <input readonly id="horaEditar"  class="form-control"  type="text" value="4859" >
                              </div>
                              <div class="col-6">
                                 <label for="fechaEditar">Fecha</label>
                                 <input readonly id="fechaEditar"  class="form-control"  type="text" value="4859" >
                              </div>
                           </div>

                           <div class="row mt-3">
                              <div class="col-9">
                                 <label for="nombreEditar">Nombre Completo</label>
                                 <input  id="nombreEditar"  class="form-control"  type="text" value="4859">
                              </div>
                              <div class="col-3">
                                 <label for="edificioEditar">Edificio</label>
                                 <input  id="edificioEditar"  class="form-control"  type="text" value="4859">
                              </div>
                           </div>

                           <div class="row mt-3">
                              <div class="col-12">
                                 <label for="descripcionEditar">Descripción</label>
                                 <textarea  class="form-control" id="descripcionEditar" name="descripcion" rows="4" cols="80"></textarea>
                              </div>
                           </div>

                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" id="guardarCambios" class="btn btn-success">Guardar</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                     </div>
                  </div>
               </div>
            </div>
   </main>

         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
         <script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
         <script src="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" charset="utf-8"></script>
         <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" charset="utf-8"></script>
         <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" charset="utf-8"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.js" charset="utf-8"></script>
         <script src="js/script.js" charset="utf-8"></script>
         <script src="js/modales.js" charset="utf-8"></script>
      </body>
      </html>
