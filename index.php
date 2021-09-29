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
            <div class="d-flex justify-content-beetween mt-3">
               <div class="">

               </div>
            </div>


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
                              <th> <span class="text-danger">Cancelado</span> </th>
                           <?php else: ?>
                              <th> <span class="text-warning">En proceso</span> </th>
                           <?php endif; ?>


                           <td><button class="btn btn-primary" type="button" value="<?php echo $reporte['id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>
                           <button class="btn btn-warning" type="button"  value="<?php echo $reporte['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                           <button class="btn btn-danger" type="button"  value="<?php echo $reporte['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button> </td>
                        </tr>
                     <?php endwhile; ?>
                  <?php else: ?>
                  <?php endif; ?>
               </tbody>
            </table>
         </main>
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
         <script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
         <script src="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" charset="utf-8"></script>
         <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" charset="utf-8"></script>
         <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
         <script src="js/script.js" charset="utf-8"></script>
   </body>
</html>
